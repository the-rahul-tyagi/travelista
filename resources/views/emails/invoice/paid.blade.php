# Invoice Receipt

Dear {{ $booking->user->name }},

Thank you for your payment! Your transaction has been processed successfully. Please find the details of your receipt and invoice summary below.

### 💳 Transaction Summary:
*   **Invoice Number:** `{{ $booking->invoice->invoice_number ?? 'INV-' . $booking->id }}`
*   **Booking Reference:** `{{ $booking->booking_reference }}`
*   **Subtotal:** ₹{{ number_format($booking->subtotal ?? ($booking->total_price / 1.18), 2) }}
*   **Tax (GST 18%):** ₹{{ number_format($booking->tax_amount ?? ($booking->total_price - ($booking->total_price / 1.18)), 2) }}
*   **Total Amount Paid:** ₹{{ number_format($booking->total_price, 2) }}
*   **Payment Status:** **PAID**

Your digital PDF receipt is stored in your secure account. You can download your official tax invoice using the button below.

<x-mail::button :url="route('bookings.show', $booking)">
Download Tax Invoice
</x-mail::button>

Thank you for choosing TRAVELISTA. We look forward to creating unforgettable luxury travel experiences for you.

Warm regards,  
**TRAVELISTA Elite Concierge**
