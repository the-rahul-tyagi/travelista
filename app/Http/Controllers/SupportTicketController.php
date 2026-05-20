<?php

namespace App\Http\Controllers;

use App\Models\SupportTicket;
use App\Models\SupportTicketReply;
use Illuminate\Http\Request;
use Exception;

class SupportTicketController extends Controller
{
    /**
     * Display a listing of the user's support tickets.
     */
    public function index()
    {
        $tickets = auth()->user()->tickets()->latest()->get();
        return view('support.index', compact('tickets'));
    }

    /**
     * Store a newly created support ticket in database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'category' => 'required|string|in:Booking,Billing,Technical,Feedback,Other',
            'priority' => 'required|string|in:low,medium,high',
            'message' => 'required|string',
        ]);

        try {
            auth()->user()->tickets()->create($validated);
            return redirect()->route('support.index')->with('success', 'Support ticket created successfully! Our team will review it shortly.');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Failed to create support ticket. Please try again.');
        }
    }

    /**
     * Display the specified support ticket and its reply thread.
     */
    public function show(SupportTicket $ticket)
    {
        // Check authorization: User must own the ticket, or be an admin
        if (auth()->user()->role !== 'admin' && auth()->id() !== $ticket->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $ticket->load('replies.user', 'user');
        
        // If an admin opens it and it's 'open', mark it as 'in_progress'
        if (auth()->user()->role === 'admin' && $ticket->status === 'open') {
            $ticket->update(['status' => 'in_progress']);
        }

        return view('support.show', compact('ticket'));
    }

    /**
     * Add a reply to the ticket thread.
     */
    public function reply(Request $request, SupportTicket $ticket)
    {
        // Check authorization: User must own the ticket, or be an admin
        if (auth()->user()->role !== 'admin' && auth()->id() !== $ticket->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'message' => 'required|string',
        ]);

        try {
            $ticket->replies()->create([
                'user_id' => auth()->id(),
                'message' => $validated['message'],
            ]);

            // If a user replies, ensure status is marked as 'open' or 'in_progress' (re-opened if resolved)
            if (auth()->user()->role !== 'admin') {
                if (in_array($ticket->status, ['resolved', 'closed'])) {
                    $ticket->update(['status' => 'open']);
                }
            } else {
                // If admin replies, change status to 'in_progress' to show they are active
                if ($ticket->status === 'open') {
                    $ticket->update(['status' => 'in_progress']);
                }
            }

            return back()->with('success', 'Your reply has been added successfully!');
        } catch (Exception $e) {
            return back()->with('error', 'Failed to add reply. Please try again.');
        }
    }

    /**
     * Admin: Display all support tickets.
     */
    public function adminIndex()
    {
        // Ensure only admin has access
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $tickets = SupportTicket::with('user')->latest()->get();
        return view('admin.support.index', compact('tickets'));
    }

    /**
     * Admin: Update support ticket status.
     */
    public function updateStatus(Request $request, SupportTicket $ticket)
    {
        // Ensure only admin has access
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'status' => 'required|string|in:open,in_progress,resolved,closed',
        ]);

        try {
            $ticket->update(['status' => $validated['status']]);
            return back()->with('success', 'Ticket status updated to ' . ucfirst($validated['status']) . ' successfully!');
        } catch (Exception $e) {
            return back()->with('error', 'Failed to update ticket status.');
        }
    }
}
