<x-dashboard-layout>
    <div class="space-y-12">
        <!-- Header -->
        <div class="glass p-12 rounded-[4rem] border-white/5 relative overflow-hidden group" data-aos="fade-up">
            <div class="absolute -right-20 -top-20 w-80 h-80 bg-blue-600/10 rounded-full blur-[100px] group-hover:bg-blue-600/20 transition-all duration-1000"></div>
            <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-8">
                <div>
                    <h2 class="text-4xl font-black text-white uppercase tracking-tighter mb-2">Concierge & <span class="text-blue-500 italic">Support Center</span></h2>
                    <p class="text-xs font-bold text-slate-400">Need assistance? Open a ticket, and our luxury travel experts will resolve your issue promptly.</p>
                </div>
                <div>
                    <span class="px-6 py-3 bg-blue-500/10 text-blue-400 border border-blue-500/20 text-[10px] font-black rounded-full uppercase tracking-widest">
                        24/7 Premium Support Active
                    </span>
                </div>
            </div>
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

        <!-- Main Support Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Ticket Creation Form -->
            <div class="glass p-10 rounded-[3.5rem] border-white/5 shadow-2xl h-fit" data-aos="fade-right">
                <h3 class="text-xl font-black text-white uppercase tracking-tighter mb-8">Submit a New <span class="text-blue-500 italic">Ticket</span></h3>
                
                <form action="{{ route('support.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label for="subject" class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Subject</label>
                        <input type="text" id="subject" name="subject" required value="{{ old('subject') }}"
                               class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-white text-sm focus:outline-none focus:border-blue-500 transition-colors"
                               placeholder="Brief description of the issue">
                        @error('subject')
                            <p class="text-rose-500 text-xs mt-1 font-bold">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="category" class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Category</label>
                            <select id="category" name="category" required
                                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-slate-300 text-sm focus:outline-none focus:border-blue-500 transition-colors">
                                <option value="Booking" class="bg-slate-900">Booking</option>
                                <option value="Billing" class="bg-slate-900">Billing</option>
                                <option value="Technical" class="bg-slate-900">Technical</option>
                                <option value="Feedback" class="bg-slate-900">Feedback</option>
                                <option value="Other" class="bg-slate-900">Other</option>
                            </select>
                            @error('category')
                                <p class="text-rose-500 text-xs mt-1 font-bold">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="priority" class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Priority</label>
                            <select id="priority" name="priority" required
                                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-slate-300 text-sm focus:outline-none focus:border-blue-500 transition-colors">
                                <option value="low" class="bg-slate-900">Low</option>
                                <option value="medium" selected class="bg-slate-900">Medium</option>
                                <option value="high" class="bg-slate-900">High</option>
                            </select>
                            @error('priority')
                                <p class="text-rose-500 text-xs mt-1 font-bold">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="message" class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Message</label>
                        <textarea id="message" name="message" rows="5" required
                                  class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-white text-sm focus:outline-none focus:border-blue-500 transition-colors"
                                  placeholder="Describe your issue in detail. Add package reference if applicable.">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-rose-500 text-xs mt-1 font-bold">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="w-full btn-luxury py-4 text-[10px] tracking-widest font-black uppercase rounded-2xl flex items-center justify-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                        <span>Submit Ticket</span>
                    </button>
                </form>
            </div>

            <!-- Existing Tickets Thread -->
            <div class="lg:col-span-2 glass rounded-[3.5rem] border-white/5 overflow-hidden shadow-2xl h-fit" data-aos="fade-left">
                <div class="p-10 border-b border-white/5">
                    <h3 class="text-xl font-black text-white uppercase tracking-tighter">Your Support <span class="text-emerald-500 italic">History</span></h3>
                </div>
                
                <div class="divide-y divide-white/5">
                    @forelse($tickets as $ticket)
                        <div class="p-8 hover:bg-white/2 transition-colors flex flex-col md:flex-row md:items-center justify-between gap-6 group">
                            <div class="flex-grow space-y-2">
                                <div class="flex items-center space-x-3">
                                    <span class="text-[9px] font-black bg-blue-500/10 text-blue-400 border border-blue-500/20 px-3 py-1 rounded-full uppercase tracking-widest">
                                        {{ $ticket->category }}
                                    </span>
                                    <span class="text-[9px] font-black {{ $ticket->priority === 'high' ? 'bg-rose-500/10 text-rose-400 border-rose-500/20' : ($ticket->priority === 'medium' ? 'bg-amber-500/10 text-amber-400 border-amber-500/20' : 'bg-slate-500/10 text-slate-400 border-white/5') }} px-3 py-1 rounded-full uppercase tracking-widest border">
                                        {{ $ticket->priority }} Priority
                                    </span>
                                </div>
                                <h4 class="text-xl font-black text-white uppercase tracking-tighter group-hover:text-blue-500 transition-colors">
                                    {{ $ticket->subject }}
                                </h4>
                                <p class="text-xs text-slate-400 line-clamp-2 max-w-xl">
                                    {{ $ticket->message }}
                                </p>
                                <div class="text-[9px] font-black text-slate-500 uppercase tracking-widest flex items-center space-x-2 pt-2">
                                    <span>Ref: #{{ str_pad($ticket->id, 5, '0', STR_PAD_LEFT) }}</span>
                                    <span>•</span>
                                    <span>Opened {{ $ticket->created_at->diffForHumans() }}</span>
                                </div>
                            </div>

                            <div class="flex flex-row md:flex-col items-center md:items-end justify-between md:justify-center gap-4 shrink-0">
                                <span class="px-4 py-1.5 rounded-full text-[9px] font-black border uppercase tracking-widest
                                    {{ $ticket->status === 'open' ? 'bg-blue-500/10 text-blue-400 border-blue-500/20' : '' }}
                                    {{ $ticket->status === 'in_progress' ? 'bg-amber-500/10 text-amber-400 border-amber-500/20' : '' }}
                                    {{ $ticket->status === 'resolved' ? 'bg-emerald-500/10 text-emerald-500 border-emerald-500/20' : '' }}
                                    {{ $ticket->status === 'closed' ? 'bg-slate-500/10 text-slate-400 border-white/5' : '' }}
                                ">
                                    {{ str_replace('_', ' ', $ticket->status) }}
                                </span>
                                
                                <a href="{{ route('support.show', $ticket) }}" class="btn-luxury py-3 px-6 text-[9px] uppercase tracking-widest font-black rounded-xl">
                                    View Thread
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-20">
                            <div class="w-16 h-16 bg-slate-900 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-600 border border-white/5">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 10c0 3.866-3.582 7-8 7a8.969 8.969 0 01-4.906-1.438L2 17l1.437-3.094A7.967 7.967 0 012 10c0-3.866 3.582-7 8-7s8 3.134 8 7z"></path></svg>
                            </div>
                            <p class="text-slate-400 font-bold italic text-sm">No support tickets found.</p>
                            <p class="text-xs text-slate-600 mt-1">If you experience issues, create a ticket using the form on the left.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
