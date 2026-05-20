<x-admin-layout>
    <div class="space-y-12">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-8" data-aos="fade-down">
            <div>
                <h1 class="text-4xl font-black text-white uppercase tracking-tighter">Support <span class="text-blue-600 italic">Command</span></h1>
                <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mt-2">Manage Customer Enquiries and Concierge Requests</p>
            </div>
            <div>
                <span class="px-6 py-3 bg-blue-500/10 text-blue-400 border border-blue-500/20 text-[10px] font-black rounded-full uppercase tracking-widest animate-pulse">
                    Live Queue Operations
                </span>
            </div>
        </div>

        @if(session('success'))
            <div class="p-6 bg-emerald-500/10 border border-emerald-500/20 rounded-3xl text-emerald-400 text-sm font-bold flex items-center space-x-3">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <!-- Tickets Table / List -->
        <div class="glass rounded-[3.5rem] border-white/5 overflow-hidden shadow-2xl" data-aos="fade-up">
            <div class="p-12 border-b border-white/5 flex flex-col md:flex-row md:items-center justify-between gap-6">
                <h3 class="text-2xl font-black text-white uppercase tracking-tighter">Active support <span class="text-blue-600 italic">queue</span></h3>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-white/2">
                            <th class="px-12 py-8 text-[10px] font-black text-slate-500 uppercase tracking-widest">Reference</th>
                            <th class="px-12 py-8 text-[10px] font-black text-slate-500 uppercase tracking-widest">Customer</th>
                            <th class="px-12 py-8 text-[10px] font-black text-slate-500 uppercase tracking-widest">Ticket Details</th>
                            <th class="px-12 py-8 text-[10px] font-black text-slate-500 uppercase tracking-widest">Priority</th>
                            <th class="px-12 py-8 text-[10px] font-black text-slate-500 uppercase tracking-widest">Status</th>
                            <th class="px-12 py-8 text-[10px] font-black text-slate-500 uppercase tracking-widest text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @forelse($tickets as $ticket)
                        <tr class="group hover:bg-white/2 transition-colors">
                            <td class="px-12 py-8">
                                <span class="text-xs font-black text-slate-400">#{{ str_pad($ticket->id, 5, '0', STR_PAD_LEFT) }}</span>
                            </td>
                            <td class="px-12 py-8">
                                <div class="flex items-center space-x-4">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($ticket->user->name) }}&background=1e293b&color=fff" class="w-10 h-10 rounded-full border border-white/10" alt="">
                                    <div>
                                        <p class="font-black text-white text-sm uppercase tracking-tighter">{{ $ticket->user->name }}</p>
                                        <p class="text-[9px] text-slate-500 uppercase font-black tracking-widest">{{ $ticket->user->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-12 py-8 max-w-xs">
                                <div class="flex items-center space-x-2 mb-2">
                                    <span class="text-[8px] font-black bg-blue-500/20 text-blue-400 border border-blue-500/30 px-2 py-0.5 rounded uppercase tracking-widest">
                                        {{ $ticket->category }}
                                    </span>
                                    <span class="text-[8px] text-slate-500 font-bold uppercase tracking-widest shrink-0">
                                        {{ $ticket->created_at->diffForHumans() }}
                                    </span>
                                </div>
                                <h4 class="font-black text-white text-sm uppercase tracking-tighter truncate">{{ $ticket->subject }}</h4>
                                <p class="text-[10px] text-slate-400 truncate mt-1">{{ $ticket->message }}</p>
                            </td>
                            <td class="px-12 py-8">
                                <span class="px-3 py-1 rounded-full text-[8px] font-black border uppercase tracking-widest
                                    {{ $ticket->priority === 'high' ? 'bg-rose-500/10 text-rose-400 border-rose-500/20' : '' }}
                                    {{ $ticket->priority === 'medium' ? 'bg-amber-500/10 text-amber-400 border-amber-500/20' : '' }}
                                    {{ $ticket->priority === 'low' ? 'bg-slate-500/10 text-slate-400 border-white/5' : '' }}
                                ">
                                    {{ $ticket->priority }}
                                </span>
                            </td>
                            <td class="px-12 py-8">
                                <span class="px-4 py-1.5 rounded-full text-[9px] font-black border uppercase tracking-widest
                                    {{ $ticket->status === 'open' ? 'bg-blue-500/10 text-blue-400 border-blue-500/20' : '' }}
                                    {{ $ticket->status === 'in_progress' ? 'bg-amber-500/10 text-amber-400 border-amber-500/20' : '' }}
                                    {{ $ticket->status === 'resolved' ? 'bg-emerald-500/10 text-emerald-500 border-emerald-500/20' : '' }}
                                    {{ $ticket->status === 'closed' ? 'bg-slate-500/10 text-slate-400 border-white/5' : '' }}
                                ">
                                    {{ str_replace('_', ' ', $ticket->status) }}
                                </span>
                            </td>
                            <td class="px-12 py-8 text-right">
                                <div class="flex items-center justify-end space-x-3">
                                    <a href="{{ route('admin.support.show', $ticket) }}" class="btn-luxury py-2.5 px-5 text-[9px] font-black uppercase tracking-widest rounded-xl">
                                        Open Thread
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-12 py-24 text-center text-slate-500 font-bold italic">No active support tickets in queue. Excellent operations!</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
