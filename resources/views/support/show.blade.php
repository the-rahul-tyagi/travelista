<x-dynamic-component :component="auth()->user()->role === 'admin' ? 'admin-layout' : 'dashboard-layout'">
    <div class="space-y-12 max-w-5xl mx-auto">
        <!-- Back Navigation & Header -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6">
            <a href="{{ auth()->user()->role === 'admin' ? route('admin.support.adminIndex') : route('support.index') }}" 
               class="text-xs font-black text-slate-500 hover:text-white uppercase tracking-widest transition-colors flex items-center shrink-0">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to Tickets
            </a>

            <!-- Admin Actions Header -->
            @if(auth()->user()->role === 'admin')
                <div class="flex items-center space-x-4">
                    <form action="{{ route('admin.support.updateStatus', $ticket) }}" method="POST" class="flex items-center space-x-3">
                        @csrf
                        <label for="status" class="text-[10px] font-black text-slate-500 uppercase tracking-widest shrink-0">Admin Ticket Status:</label>
                        <select id="status" name="status" onchange="this.form.submit()"
                                class="bg-white/5 border border-white/10 rounded-xl px-4 py-2 text-xs text-white focus:outline-none focus:border-blue-500">
                            <option value="open" {{ $ticket->status === 'open' ? 'selected' : '' }} class="bg-slate-900">Open</option>
                            <option value="in_progress" {{ $ticket->status === 'in_progress' ? 'selected' : '' }} class="bg-slate-900">In Progress</option>
                            <option value="resolved" {{ $ticket->status === 'resolved' ? 'selected' : '' }} class="bg-slate-900">Resolved</option>
                            <option value="closed" {{ $ticket->status === 'closed' ? 'selected' : '' }} class="bg-slate-900">Closed</option>
                        </select>
                    </form>
                </div>
            @endif
        </div>

        @if(session('success'))
            <div class="p-6 bg-emerald-500/10 border border-emerald-500/20 rounded-3xl text-emerald-400 text-sm font-bold flex items-center space-x-3">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="p-6 bg-rose-500/10 border border-rose-500/20 rounded-3xl text-rose-400 text-sm font-bold flex items-center space-x-3">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        <!-- Ticket Card Overview -->
        <div class="glass p-10 rounded-[3.5rem] border-white/5 relative overflow-hidden group">
            <div class="absolute -right-20 -top-20 w-80 h-80 bg-blue-600/5 rounded-full blur-[100px] transition-all duration-1000"></div>
            
            <div class="relative z-10 space-y-6">
                <div class="flex flex-wrap items-center gap-3">
                    <span class="text-[9px] font-black bg-blue-500/10 text-blue-400 border border-blue-500/20 px-3 py-1 rounded-full uppercase tracking-widest">
                        {{ $ticket->category }}
                    </span>
                    <span class="text-[9px] font-black {{ $ticket->priority === 'high' ? 'bg-rose-500/10 text-rose-400 border-rose-500/20' : ($ticket->priority === 'medium' ? 'bg-amber-500/10 text-amber-400 border-amber-500/20' : 'bg-slate-500/10 text-slate-400 border-white/5') }} px-3 py-1 rounded-full uppercase tracking-widest border border-white/5">
                        {{ $ticket->priority }} Priority
                    </span>
                    <span class="px-4 py-1.5 rounded-full text-[9px] font-black border uppercase tracking-widest
                        {{ $ticket->status === 'open' ? 'bg-blue-500/10 text-blue-400 border-blue-500/20' : '' }}
                        {{ $ticket->status === 'in_progress' ? 'bg-amber-500/10 text-amber-400 border-amber-500/20' : '' }}
                        {{ $ticket->status === 'resolved' ? 'bg-emerald-500/10 text-emerald-500 border-emerald-500/20' : '' }}
                        {{ $ticket->status === 'closed' ? 'bg-slate-500/10 text-slate-400 border-white/5' : '' }}
                    ">
                        {{ str_replace('_', ' ', $ticket->status) }}
                    </span>
                    <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest ml-auto">
                        Ref: #{{ str_pad($ticket->id, 5, '0', STR_PAD_LEFT) }}
                    </span>
                </div>

                <div class="border-b border-white/5 pb-6">
                    <h2 class="text-3xl font-black text-white uppercase tracking-tighter mb-4">{{ $ticket->subject }}</h2>
                    <div class="flex items-center space-x-3 text-xs text-slate-400">
                        <span>Submitted by <span class="font-bold text-white">{{ $ticket->user->name }}</span></span>
                        <span>•</span>
                        <span>{{ $ticket->created_at->format('M d, Y @ h:i A') }} ({{ $ticket->created_at->diffForHumans() }})</span>
                    </div>
                </div>

                <!-- Original Ticket Message -->
                <div class="bg-white/2 border border-white/5 rounded-3xl p-8 space-y-4">
                    <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Initial Issue Details</p>
                    <p class="text-sm leading-relaxed text-slate-200 whitespace-pre-line">{{ $ticket->message }}</p>
                </div>
            </div>
        </div>

        <!-- Chat / Reply Thread -->
        <div class="space-y-6">
            <h3 class="text-xl font-black text-white uppercase tracking-tighter">Correspondence <span class="text-blue-500 italic">Timeline</span></h3>
            
            <div class="space-y-6">
                @forelse($ticket->replies as $reply)
                    @php
                        $isAdminReply = $reply->user->role === 'admin';
                    @endphp
                    <div class="flex {{ $isAdminReply ? 'justify-start' : 'justify-end' }}">
                        <div class="max-w-2xl w-full glass p-6 rounded-3xl border-white/5 relative {{ $isAdminReply ? 'border-l-4 border-l-blue-500 bg-blue-950/10' : 'bg-slate-900/30' }}">
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-xs font-black uppercase tracking-widest {{ $isAdminReply ? 'text-blue-400' : 'text-slate-400' }}">
                                    {{ $reply->user->name }}
                                    @if($isAdminReply)
                                        <span class="text-[9px] bg-blue-500/20 text-blue-400 border border-blue-500/30 px-2 py-0.5 rounded ml-2 uppercase font-black">Agent</span>
                                    @endif
                                </span>
                                <span class="text-[9px] font-bold text-slate-500 uppercase tracking-widest">
                                    {{ $reply->created_at->diffForHumans() }}
                                </span>
                            </div>
                            <p class="text-sm leading-relaxed text-slate-300 whitespace-pre-line">
                                {{ $reply->message }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-12 bg-white/2 rounded-3xl border border-white/5">
                        <p class="text-slate-500 text-xs italic font-bold">No replies yet. Please wait while our travel support experts review your request.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Reply Form -->
        @if($ticket->status !== 'closed')
            <div class="glass p-10 rounded-[3.5rem] border-white/5 shadow-2xl">
                <h3 class="text-xl font-black text-white uppercase tracking-tighter mb-6">Write a <span class="text-blue-500 italic">Reply</span></h3>
                
                <form action="{{ auth()->user()->role === 'admin' ? route('admin.support.reply', $ticket) : route('support.reply', $ticket) }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div>
                        <textarea name="message" id="message" rows="5" required
                                  class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-white text-sm focus:outline-none focus:border-blue-500 transition-colors"
                                  placeholder="Type your message here..."></textarea>
                        @error('message')
                            <p class="text-rose-500 text-xs mt-1 font-bold">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="btn-luxury py-4 px-10 text-[10px] tracking-widest font-black uppercase rounded-2xl flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                            <span>Send Reply</span>
                        </button>
                    </div>
                </form>
            </div>
        @else
            <div class="p-8 bg-slate-900/50 border border-white/5 rounded-3xl text-center">
                <p class="text-slate-500 text-sm font-bold">This ticket is marked as **Closed**. If you still need help, please submit a new ticket in the Support Center.</p>
            </div>
        @endif
    </div>
</x-dynamic-component>
