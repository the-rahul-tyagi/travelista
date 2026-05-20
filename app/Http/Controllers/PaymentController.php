<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\Notification;
use App\Models\BookingStatusHistory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class PaymentController extends Controller
{
    public function verify(Request $request)
    {
        $api = new Api(
            config('services.razorpay.key') ?? env('RAZORPAY_KEY'),
            config('services.razorpay.secret') ?? env('RAZORPAY_SECRET')
        );

        try {
            $attributes = [
                'razorpay_order_id' => $request->razorpay_order_id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature' => $request->razorpay_signature
            ];

            $api->utility->verifyPaymentSignature($attributes);

            $booking = Booking::findOrFail($request->booking_id);

            DB::transaction(function () use ($booking, $request) {
                $booking->update(['status' => 'confirmed']);

                BookingStatusHistory::create([
                    'booking_id' => $booking->id,
                    'status' => 'confirmed',
                    'note' => 'Payment verified successfully via Razorpay',
                    'created_by' => $booking->user_id,
                ]);

                Payment::create([
                    'booking_id' => $booking->id,
                    'payment_id' => $request->razorpay_payment_id,
                    'order_id' => $request->razorpay_order_id,
                    'amount' => $booking->total_price,
                    'currency' => 'INR',
                    'status' => 'success',
                    'method' => 'razorpay'
                ]);

                // Update room inventory / tour seats availability
                if ($booking->bookable_type === \App\Models\Hotel::class || $booking->bookable_type === 'App\Models\Hotel') {
                    $roomsNeeded = max(1, (int) ceil($booking->travelers / 2));
                    if ($booking->room_category_id) {
                        $category = \App\Models\HotelRoomCategory::find($booking->room_category_id);
                        if ($category) {
                            $category->decrement('rooms_available', $roomsNeeded);
                        }
                    } else {
                        $booking->bookable->decrement('available_rooms', $roomsNeeded);
                    }
                }

                if ($booking->bookable_type === \App\Models\TourPackage::class || $booking->bookable_type === 'App\Models\TourPackage') {
                    $booking->bookable->decrement('available_seats', $booking->travelers);
                }

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
                }
            });

            Notification::create([
                'id' => (string) Str::uuid(),
                'type' => 'payment_success',
                'notifiable_type' => get_class($booking->user),
                'notifiable_id' => $booking->user_id,
                'data' => [
                    'booking_id' => $booking->id,
                    'reference' => $booking->booking_reference,
                ],
            ]);

            try {
                Mail::to($booking->user->email)->send(new \App\Mail\BookingConfirmedMail($booking));
            } catch (\Exception $e) {
                Log::warning('Booking confirmation email failed: ' . $e->getMessage());
            }

            return response()->json([
                'success' => true, 
                'message' => 'Payment verified successfully',
                'redirect' => route('payment.success', ['booking' => $booking->id])
            ]);

        } catch (\Exception $e) {
            Log::error('Razorpay payment verification error: ' . $e->getMessage());
            return response()->json([
                'status' => 'error', 
                'message' => 'Payment verification failed: ' . $e->getMessage(),
                'redirect_url' => route('payment.failure', ['booking' => $request->booking_id])
            ], 400);
        }
    }
}
