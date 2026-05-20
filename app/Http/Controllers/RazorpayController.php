<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Notification;
use App\Models\User;
use App\Models\Hotel;
use App\Models\HotelRoomCategory;
use App\Models\TourPackage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RazorpayController extends Controller
{
    private $api;

    public function __construct()
    {
        $this->api = new Api(
            config('services.razorpay.key'),
            config('services.razorpay.secret')
        );
    }

    public function initiatePayment(Booking $booking)
    {
        if ($booking->user_id !== auth()->id()) {
            abort(403);
        }

        // Razorpay expects amount in paise (multiply by 100)
        $amountInPaise = round($booking->total_price * 100);

        try {
            $order = $this->api->order->create([
                'receipt' => $booking->booking_reference,
                'amount' => $amountInPaise,
                'currency' => 'INR',
                'payment_capture' => 1 // Auto-capture payment
            ]);

            return view('payments.checkout', [
                'booking' => $booking,
                'order' => $order,
                'razorpayKey' => config('services.razorpay.key')
            ]);
        } catch (\Exception $e) {
            Log::error('Razorpay Order Creation Failed: ' . $e->getMessage());
            return back()->with('error', 'Unable to initiate payment with Razorpay: ' . $e->getMessage());
        }
    }

    public function verifyPayment(Request $request, Booking $booking)
    {
        if ($booking->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'razorpay_payment_id' => 'required|string',
            'razorpay_order_id' => 'required|string',
            'razorpay_signature' => 'required|string',
        ]);

        $signature = $request->razorpay_signature;
        $paymentId = $request->razorpay_payment_id;
        $orderId = $request->razorpay_order_id;

        try {
            // Verify signature using the SDK utility
            $attributes = [
                'razorpay_order_id' => $orderId,
                'razorpay_payment_id' => $paymentId,
                'razorpay_signature' => $signature
            ];

            $this->api->utility->verifyPaymentSignature($attributes);

            // Transaction block to keep data operations safe
            DB::transaction(function () use ($booking, $paymentId, $orderId) {
                // Update booking status
                $booking->update([
                    'status' => 'confirmed'
                ]);

                // Record status history
                $booking->statusHistories()->create([
                    'status' => 'confirmed',
                    'note' => 'Payment processed successfully via Razorpay',
                    'created_by' => auth()->id()
                ]);

                // Save Payment details
                Payment::create([
                    'booking_id' => $booking->id,
                    'payment_id' => $paymentId,
                    'order_id' => $orderId,
                    'amount' => $booking->total_price,
                    'currency' => 'INR',
                    'status' => 'success',
                    'method' => 'razorpay'
                ]);

                // Update inventory/seats
                $this->applyAvailability($booking);

                // Generate Invoice
                $this->generateInvoice($booking);
            });

            // Create notification for user
            $this->createNotification($booking->user, 'booking_confirmed', [
                'booking_id' => $booking->id,
                'reference' => $booking->booking_reference,
            ]);

            // Notify Admins
            $admins = User::where('role', 'admin')->get();
            foreach ($admins as $admin) {
                $this->createNotification($admin, 'admin_booking_confirmed', [
                    'booking_id' => $booking->id,
                    'reference' => $booking->booking_reference,
                    'user' => $booking->user->name
                ]);
            }

            // Send confirmation mail
            try {
                Mail::to($booking->user->email)->send(new \App\Mail\BookingConfirmedMail($booking));
            } catch (\Exception $e) {
                Log::warning('Email delivery failed: ' . $e->getMessage());
            }

            return redirect()->route('payment.success', ['booking' => $booking->id])
                ->with('success', 'Your payment was successful and booking is confirmed!');

        } catch (\Exception $e) {
            Log::error('Razorpay Signature Verification Failed: ' . $e->getMessage());
            
            // Record status history as failed
            $booking->statusHistories()->create([
                'status' => 'pending',
                'note' => 'Razorpay payment failed or signature verification failed.',
                'created_by' => auth()->id()
            ]);

            return redirect()->route('payment.failure', ['booking' => $booking->id])
                ->with('error', 'Payment verification failed: ' . $e->getMessage());
        }
    }

    private function applyAvailability(Booking $booking): void
    {
        if ($booking->bookable_type === Hotel::class || $booking->bookable_type === 'App\Models\Hotel') {
            $roomsNeeded = max(1, (int) ceil($booking->travelers / 2));
            if ($booking->room_category_id) {
                $category = HotelRoomCategory::find($booking->room_category_id);
                if ($category) {
                    $category->decrement('rooms_available', $roomsNeeded);
                }
            } else {
                $booking->bookable->decrement('available_rooms', $roomsNeeded);
            }
        }

        if ($booking->bookable_type === TourPackage::class || $booking->bookable_type === 'App\Models\TourPackage') {
            $booking->bookable->decrement('available_seats', $booking->travelers);
        }
    }

    private function generateInvoice(Booking $booking)
    {
        if (!$booking->invoice) {
            $subtotal = $booking->subtotal ?? $booking->total_price;
            $taxAmount = $booking->tax_amount ?? round($subtotal * 0.18, 2);
            $total = $subtotal + $taxAmount;

            \App\Models\Invoice::create([
                'invoice_number' => 'INV-' . date('Ymd') . '-' . strtoupper(Str::random(6)),
                'booking_id' => $booking->id,
                'user_id' => $booking->user_id,
                'subtotal' => $subtotal,
                'tax_amount' => $taxAmount,
                'total_amount' => $total,
                'status' => 'paid',
                'due_date' => now()->addDays(7)->toDateString(),
            ]);

            try {
                Mail::to($booking->user->email)->send(new \App\Mail\InvoiceMail($booking));
            } catch (\Exception $e) {
                Log::warning('Invoice Email delivery failed: ' . $e->getMessage());
            }
        }
    }

    private function createNotification($user, string $type, array $data): void
    {
        Notification::create([
            'id' => (string) Str::uuid(),
            'type' => $type,
            'notifiable_type' => get_class($user),
            'notifiable_id' => $user->id,
            'data' => $data,
        ]);
    }
}
