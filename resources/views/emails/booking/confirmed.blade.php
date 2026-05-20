# Booking Confirmed!

Dear {{ $booking->user->name }},

We are thrilled to inform you that your booking with **TRAVELISTA** is confirmed! Your upcoming luxury journey has been successfully reserved.

### 📋 Booking Details:
*   **Booking Reference:** `{{ $booking->booking_reference }}`
*   **Destination/Stay:** {{ $booking->bookable->name }}
*   **Start Date:** {{ \Carbon\Carbon::parse($booking->start_date)->format('d M Y') }}
*   **End Date:** {{ $booking->end_date ? \Carbon\Carbon::parse($booking->end_date)->format('d M Y') : 'N/A' }}
*   **Travelers:** {{ $booking->travelers }}
*   **Total Price:** ₹{{ number_format($booking->total_price, 2) }}

You can view your detailed dynamic itinerary and manage your booking directly from your user profile dashboard.

<x-mail::button :url="route('bookings.show', $booking)">
View Booking Details
</x-mail::button>

If you have any questions or require custom concierge services, please don't hesitate to reach out to our elite travel support team.

Warm regards,  
**TRAVELISTA Elite Concierge**
