<x-app-layout>
    <!-- Cinematic Hero Section -->
    <section class="relative h-[55vh] w-full flex items-center justify-center pt-24 overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?auto=format&fit=crop&q=80&w=2000" class="w-full h-full object-cover scale-105 animate-slow-zoom" alt="Trip Planner Banner">
            <div class="absolute inset-0 bg-gradient-to-b from-slate-950/40 via-slate-950/60 to-slate-950"></div>
            <div class="absolute inset-0 bg-emerald-600/5 backdrop-blur-[1px]"></div>
        </div>
        <div class="relative z-10 text-center px-4 max-w-5xl w-full flex flex-col items-center" data-aos="fade-up">
            <!-- Floating Badge -->
            <div class="mb-5">
                <span class="inline-flex items-center space-x-2 px-5 py-2 glass rounded-full text-[9px] font-black uppercase tracking-[0.4em] text-emerald-400 border border-emerald-500/20 shadow-lg floating">
                    <svg class="w-3.5 h-3.5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                    <span>Intelligent Travel</span>
                </span>
            </div>
            
            <!-- Main Headline -->
            <h1 class="text-4xl md:text-7xl lg:text-8xl font-black text-white uppercase tracking-tighter leading-[0.9] mb-4">
                Smart <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 via-teal-400 to-emerald-500 italic font-light font-serif lowercase tracking-normal">planner</span>
            </h1>
            <p class="text-sm md:text-base text-slate-300/80 font-medium max-w-xl mx-auto leading-relaxed">
                Design your customized expedition and estimate costs in real-time. Craft your dream gateway based on preferences and parameters.
            </p>
        </div>
    </section>

    <!-- Trip Planner & Expense Calculator -->
    <section class="py-32 bg-slate-950 border-t border-white/5 relative" x-data="tripPlanner()">
        <!-- Decorative Background Gradients -->
        <div class="absolute top-1/4 left-0 w-96 h-96 bg-emerald-500/5 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute bottom-1/4 right-0 w-96 h-96 bg-blue-500/5 rounded-full blur-[120px] pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
                
                <!-- Smart Planner Card -->
                <div id="smart-planner" class="scroll-mt-28 glass p-8 md:p-12 rounded-[3.5rem] border border-white/5 shadow-2xl relative bg-slate-950/40 backdrop-blur-xl">
                    <!-- Title & Badge -->
                    <div class="mb-10 flex justify-between items-start">
                        <div>
                            <span class="text-[9px] font-black text-emerald-500 uppercase tracking-[0.3em] block mb-2">Architect Plan</span>
                            <h2 class="text-3xl md:text-4xl font-black text-white uppercase tracking-tighter">
                                Smart <span class="text-emerald-500 italic">Planner</span>
                            </h2>
                        </div>
                        <div class="w-10 h-10 rounded-2xl bg-emerald-500/10 flex items-center justify-center text-emerald-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        </div>
                    </div>

                    <form @submit.prevent="submitPlan" class="space-y-8 relative">
                        <!-- Loading State Overlay -->
                        <div x-show="loadingPlanner" class="absolute inset-0 -m-8 md:-m-12 bg-slate-950/70 backdrop-blur-md rounded-[3.5rem] z-20 flex flex-col items-center justify-center" style="display: none;">
                            <div class="w-14 h-14 border-4 border-emerald-500 border-t-transparent rounded-full animate-spin mb-4"></div>
                            <span class="text-[10px] font-black text-emerald-400 uppercase tracking-[0.3em] animate-pulse">Generating Expedition Blueprint...</span>
                        </div>

                        <div class="space-y-6">
                            <!-- Budget Input & Slider -->
                            <div class="group">
                                <div class="flex justify-between items-center mb-3">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] group-hover:text-emerald-400 transition-colors">Max Budget (INR)</label>
                                    <span class="text-[9px] font-bold text-slate-500">₹1K - ₹500K Range</span>
                                </div>
                                <div class="space-y-4">
                                    <div class="glass flex items-center p-2 rounded-2xl border border-white/15 focus-within:border-emerald-500/50 focus-within:shadow-[0_0_20px_rgba(16,185,129,0.15)] transition-all bg-slate-950/60 relative">
                                        <span class="pl-4 pr-1 text-slate-400 font-bold">₹</span>
                                        <input type="number" x-model.number="planner.budget" min="1000" max="500000" class="w-full bg-transparent border-none px-3 py-2 text-sm font-bold text-white focus:ring-0 outline-none" required>
                                    </div>
                                    <div class="flex items-center space-x-4">
                                        <span class="text-[9px] font-black text-slate-600 uppercase">1K</span>
                                        <input type="range" x-model.number="planner.budget" min="1000" max="500000" step="5000" class="w-full accent-emerald-500 h-1 bg-slate-900 rounded-lg cursor-pointer appearance-none border border-white/5">
                                        <span class="text-[9px] font-black text-slate-650 uppercase">500K</span>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Days Stepper -->
                                <div class="group">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3 block">Duration (Days)</label>
                                    <div class="glass flex items-center justify-between p-2 rounded-2xl border border-white/15 bg-slate-950/60">
                                        <button type="button" @click="if (planner.days > 1) planner.days--" class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-white hover:bg-emerald-500/20 hover:text-emerald-400 hover:border-emerald-500/30 transition-all font-black text-lg shadow-inner">-</button>
                                        <span class="text-sm font-black text-white" x-text="planner.days + ' Days'"></span>
                                        <button type="button" @click="if (planner.days < 30) planner.days++" class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-white hover:bg-emerald-500/20 hover:text-emerald-400 hover:border-emerald-500/30 transition-all font-black text-lg shadow-inner">+</button>
                                    </div>
                                </div>

                                <!-- Preferred State Dropdown -->
                                <div class="group">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3 block group-hover:text-emerald-405 transition-colors">Preferred State</label>
                                    <div class="glass flex items-center p-2 rounded-2xl border border-white/15 focus-within:border-emerald-500/50 bg-slate-950/60 relative">
                                        <select x-model="planner.state_id" class="w-full bg-transparent border-none px-3 py-2 text-xs font-black uppercase tracking-wider text-white focus:ring-0 outline-none select-custom cursor-pointer" required>
                                            <option value="" disabled class="bg-slate-950 text-slate-500">Select a state</option>
                                            @foreach($states as $state)
                                                <option value="{{ $state->id }}" class="bg-slate-950 text-white">{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Travel Type Selection Tiles -->
                            <div>
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3 block">Travel Style</label>
                                <div class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-5 gap-3">
                                    @php
                                        $styles = [
                                            'adventure' => ['label' => 'Adventure', 'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>'],
                                            'honeymoon' => ['label' => 'Romantic', 'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>'],
                                            'family' => ['label' => 'Family', 'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 01-9-3.812M13.914 8.054a4 4 0 014.137 0M18.914 11.106A4 4 0 0121 15.105a1 1 0 01-1 1h-2"></path></svg>'],
                                            'religious' => ['label' => 'Spiritual', 'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>'],
                                            'budget' => ['label' => 'Budget', 'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>']
                                        ];
                                    @endphp
                                    @foreach($styles as $key => $style)
                                        <button type="button" @click="planner.travel_type = '{{ $key }}'" 
                                            :class="planner.travel_type === '{{ $key }}' ? 'border-emerald-500/50 bg-emerald-500/10 text-emerald-400 shadow-[0_0_15px_rgba(16,185,129,0.1)]' : 'border-white/5 bg-slate-900/40 text-slate-400 hover:border-white/10 hover:bg-slate-900/60'"
                                            class="flex flex-col items-center justify-center p-3 rounded-2xl border text-center transition-all duration-300 hover:scale-[1.05] active:scale-[0.98] group/tile">
                                            <div class="mb-1.5 shrink-0 transition-transform duration-300 group-hover/tile:scale-110" :class="planner.travel_type === '{{ $key }}' ? 'text-emerald-400' : 'text-slate-500 group-hover/tile:text-slate-300'">
                                                {!! $style['icon'] !!}
                                            </div>
                                            <span class="text-[9px] font-black uppercase tracking-wider whitespace-nowrap">{{ $style['label'] }}</span>
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="relative overflow-hidden w-full py-5 rounded-[2rem] text-xs font-black uppercase tracking-[0.2em] text-white transition-all duration-500 hover:-translate-y-1 active:translate-y-0.5 bg-gradient-to-r from-emerald-600 to-teal-500 shadow-lg shadow-emerald-500/25 hover:shadow-emerald-500/40">
                            Generate Travel Plan
                        </button>
                    </form>
                </div>

                <!-- Expense Estimator Card -->
                <div id="expense-estimator" class="scroll-mt-28 glass p-8 md:p-12 rounded-[3.5rem] border border-white/5 shadow-2xl relative bg-slate-950/40 backdrop-blur-xl">
                    <!-- Title & Badge -->
                    <div class="mb-10 flex justify-between items-start">
                        <div>
                            <span class="text-[9px] font-black text-blue-500 uppercase tracking-[0.3em] block mb-2">Cost Analyst</span>
                            <h3 class="text-3xl md:text-4xl font-black text-white uppercase tracking-tighter">
                                Expense <span class="text-blue-500 italic">Estimator</span>
                            </h3>
                        </div>
                        <div class="w-10 h-10 rounded-2xl bg-blue-500/10 flex items-center justify-center text-blue-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        </div>
                    </div>

                    <form @submit.prevent="calculateExpense" class="space-y-8 relative">
                        <!-- Loading State Overlay -->
                        <div x-show="loadingCalculator" class="absolute inset-0 -m-8 md:-m-12 bg-slate-950/70 backdrop-blur-md rounded-[3.5rem] z-20 flex flex-col items-center justify-center" style="display: none;">
                            <div class="w-14 h-14 border-4 border-blue-500 border-t-transparent rounded-full animate-spin mb-4"></div>
                            <span class="text-[10px] font-black text-blue-400 uppercase tracking-[0.3em] animate-pulse">Analyzing Travel Variables...</span>
                        </div>

                        <div class="space-y-6">
                            <!-- Budget Input & Slider -->
                            <div class="group">
                                <div class="flex justify-between items-center mb-3">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] group-hover:text-blue-400 transition-colors">Assigned Budget (INR)</label>
                                    <span class="text-[9px] font-bold text-slate-500">₹1K - ₹500K Range</span>
                                </div>
                                <div class="space-y-4">
                                    <div class="glass flex items-center p-2 rounded-2xl border border-white/15 focus-within:border-blue-500/50 focus-within:shadow-[0_0_20px_rgba(59,130,246,0.15)] transition-all bg-slate-950/60 relative">
                                        <span class="pl-4 pr-1 text-slate-400 font-bold">₹</span>
                                        <input type="number" x-model.number="calculator.budget" min="1000" max="500000" class="w-full bg-transparent border-none px-3 py-2 text-sm font-bold text-white focus:ring-0 outline-none" required>
                                    </div>
                                    <div class="flex items-center space-x-4">
                                        <span class="text-[9px] font-black text-slate-605 uppercase">1K</span>
                                        <input type="range" x-model.number="calculator.budget" min="1000" max="500000" step="5000" class="w-full accent-blue-500 h-1 bg-slate-900 rounded-lg cursor-pointer appearance-none border border-white/5">
                                        <span class="text-[9px] font-black text-slate-655 uppercase">500K</span>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Days Stepper -->
                                <div class="group">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3 block">Duration (Days)</label>
                                    <div class="glass flex items-center justify-between p-2 rounded-2xl border border-white/15 bg-slate-950/60">
                                        <button type="button" @click="if (calculator.days > 1) calculator.days--" class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-white hover:bg-blue-500/20 hover:text-blue-400 hover:border-blue-500/30 transition-all font-black text-lg shadow-inner">-</button>
                                        <span class="text-sm font-black text-white" x-text="calculator.days + ' Days'"></span>
                                        <button type="button" @click="if (calculator.days < 30) calculator.days++" class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-white hover:bg-blue-500/20 hover:text-blue-400 hover:border-blue-500/30 transition-all font-black text-lg shadow-inner">+</button>
                                    </div>
                                </div>

                                <!-- Travelers Stepper -->
                                <div class="group">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3 block">Total Explorers</label>
                                    <div class="glass flex items-center justify-between p-2 rounded-2xl border border-white/15 bg-slate-950/60">
                                        <button type="button" @click="if (calculator.travelers > 1) calculator.travelers--" class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-white hover:bg-blue-500/20 hover:text-blue-400 hover:border-blue-500/30 transition-all font-black text-lg shadow-inner">-</button>
                                        <span class="text-sm font-black text-white" x-text="calculator.travelers + (calculator.travelers > 1 ? ' Guests' : ' Guest')"></span>
                                        <button type="button" @click="if (calculator.travelers < 20) calculator.travelers++" class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-white hover:bg-blue-500/20 hover:text-blue-400 hover:border-blue-500/30 transition-all font-black text-lg shadow-inner">+</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Travel Type Selection Tiles (Blue Theme) -->
                            <div>
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3 block">Travel Style</label>
                                <div class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-5 gap-3">
                                    @foreach($styles as $key => $style)
                                        <button type="button" @click="calculator.travel_type = '{{ $key }}'" 
                                            :class="calculator.travel_type === '{{ $key }}' ? 'border-blue-500/50 bg-blue-500/10 text-blue-400 shadow-[0_0_15px_rgba(59,130,246,0.1)]' : 'border-white/5 bg-slate-900/40 text-slate-400 hover:border-white/10 hover:bg-slate-900/60'"
                                            class="flex flex-col items-center justify-center p-3 rounded-2xl border text-center transition-all duration-300 hover:scale-[1.05] active:scale-[0.98] group/tile">
                                            <div class="mb-1.5 shrink-0 transition-transform duration-300 group-hover/tile:scale-110" :class="calculator.travel_type === '{{ $key }}' ? 'text-blue-400' : 'text-slate-500 group-hover/tile:text-slate-300'">
                                                {!! $style['icon'] !!}
                                            </div>
                                            <span class="text-[9px] font-black uppercase tracking-wider whitespace-nowrap">{{ $style['label'] }}</span>
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="relative overflow-hidden w-full py-5 rounded-[2rem] text-xs font-black uppercase tracking-[0.2em] text-white transition-all duration-500 hover:-translate-y-1 active:translate-y-0.5 bg-gradient-to-r from-blue-600 to-indigo-650 shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40">
                            Calculate Estimate
                        </button>

                        <!-- Receipt Invoice Breakdown -->
                        <div x-show="calculationFetched" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100" class="glass p-6 md:p-8 rounded-[2.5rem] border border-white/10 mt-8 bg-slate-950/60 shadow-inner relative overflow-hidden" style="display: none;">
                            <div class="absolute top-0 right-0 w-24 h-24 bg-blue-500/5 rounded-full blur-2xl"></div>
                            
                            <div class="flex items-center justify-between pb-4 border-b border-white/10 mb-6">
                                <span class="text-[10px] font-black text-blue-400 uppercase tracking-[0.2em]">Estimate Invoice</span>
                                <span class="text-[8px] font-black text-slate-500 uppercase tracking-widest">Real-time calculations</span>
                            </div>

                            <div class="space-y-4">
                                <!-- Item: Accommodation -->
                                <div class="space-y-1.5">
                                    <div class="flex justify-between items-center text-xs">
                                        <div class="flex items-center text-slate-400 font-bold uppercase tracking-wider text-[9px]">
                                            <svg class="w-3.5 h-3.5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                            <span>Accommodation</span>
                                        </div>
                                        <span class="font-black text-white" x-text="formatCurrency(calculation.hotel_cost)"></span>
                                    </div>
                                    <div class="h-1 bg-slate-900 rounded-full overflow-hidden">
                                        <div class="h-full bg-blue-500 rounded-full transition-all duration-500" :style="'width: ' + ((calculation.hotel_cost / (calculation.estimated_total || 1)) * 100) + '%'"></div>
                                    </div>
                                </div>

                                <!-- Item: Transport -->
                                <div class="space-y-1.5">
                                    <div class="flex justify-between items-center text-xs">
                                        <div class="flex items-center text-slate-400 font-bold uppercase tracking-wider text-[9px]">
                                            <svg class="w-3.5 h-3.5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                                            <span>Transit & Logistics</span>
                                        </div>
                                        <span class="font-black text-white" x-text="formatCurrency(calculation.transport_cost)"></span>
                                    </div>
                                    <div class="h-1 bg-slate-900 rounded-full overflow-hidden">
                                        <div class="h-full bg-blue-500 rounded-full transition-all duration-500" :style="'width: ' + ((calculation.transport_cost / (calculation.estimated_total || 1)) * 100) + '%'"></div>
                                    </div>
                                </div>

                                <!-- Item: Food -->
                                <div class="space-y-1.5">
                                    <div class="flex justify-between items-center text-xs">
                                        <div class="flex items-center text-slate-400 font-bold uppercase tracking-wider text-[9px]">
                                            <svg class="w-3.5 h-3.5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                            <span>Fine Dining</span>
                                        </div>
                                        <span class="font-black text-white" x-text="formatCurrency(calculation.food_cost)"></span>
                                    </div>
                                    <div class="h-1 bg-slate-900 rounded-full overflow-hidden">
                                        <div class="h-full bg-blue-500 rounded-full transition-all duration-500" :style="'width: ' + ((calculation.food_cost / (calculation.estimated_total || 1)) * 100) + '%'"></div>
                                    </div>
                                </div>

                                <!-- Item: Activities -->
                                <div class="space-y-1.5">
                                    <div class="flex justify-between items-center text-xs">
                                        <div class="flex items-center text-slate-400 font-bold uppercase tracking-wider text-[9px]">
                                            <svg class="w-3.5 h-3.5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <span>Recreation</span>
                                        </div>
                                        <span class="font-black text-white" x-text="formatCurrency(calculation.activity_cost)"></span>
                                    </div>
                                    <div class="h-1 bg-slate-900 rounded-full overflow-hidden">
                                        <div class="h-full bg-blue-500 rounded-full transition-all duration-500" :style="'width: ' + ((calculation.activity_cost / (calculation.estimated_total || 1)) * 100) + '%'"></div>
                                    </div>
                                </div>

                                <!-- GST Taxes -->
                                <div class="pt-4 border-t border-white/5 flex justify-between items-center text-xs">
                                    <span class="text-slate-500 font-bold uppercase tracking-wider text-[9px]">Taxes & Fees (18% GST)</span>
                                    <span class="font-black text-emerald-400" x-text="formatCurrency(calculation.taxes)"></span>
                                </div>
                            </div>

                            <!-- Total Glow Card -->
                            <div class="mt-8 flex justify-between items-center p-6 rounded-[1.8rem] border border-blue-500/20 bg-blue-500/5 relative overflow-hidden">
                                <div class="absolute inset-0 bg-gradient-to-r from-blue-600/10 to-indigo-600/10"></div>
                                <div class="relative z-10">
                                    <p class="text-[9px] font-black text-blue-400 uppercase tracking-widest mb-1">Estimated Total</p>
                                    <p class="text-[8px] text-slate-500 font-bold italic">Standard luxury rate package</p>
                                </div>
                                <span class="relative z-10 text-3xl font-black text-white tracking-tighter" x-text="formatCurrency(calculation.estimated_total)"></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Suggestions Results Area -->
            <div x-show="resultsFetched" x-transition:enter="transition ease-out duration-700 delay-100" x-transition:enter-start="opacity-0 transform translate-y-10" x-transition:enter-end="opacity-100 transform translate-y-0" class="mt-32" style="display: none;" id="planner-results">
                
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-16 pb-8 border-b border-white/5">
                    <div>
                        <span class="text-[9px] font-black text-emerald-500 uppercase tracking-[0.3em] block mb-2">Curated Blueprint</span>
                        <h3 class="text-3xl md:text-5xl font-black text-white uppercase tracking-tighter">Your Travel <span class="text-emerald-500 italic">Blueprint</span></h3>
                    </div>
                    <span class="inline-flex items-center space-x-2 px-5 py-2.5 glass rounded-xl text-[9px] font-black uppercase tracking-widest text-emerald-400 border border-emerald-400/20 self-start md:self-auto">
                        <svg class="w-3.5 h-3.5 text-emerald-400 animate-pulse" fill="currentColor" viewBox="0 0 20 20"><path d="M11 3a1 1 0 10-2 0v1a1 1 0 102 0V3zM15.657 5.757a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM5.05 6.464a1 1 0 10-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM5 10a1 1 0 01-1 1H3a1 1 0 110-2h1a1 1 0 011 1zM8 16v-1a1 1 0 112 0v1a1 1 0 11-2 0zM5.657 13.05a1 1 0 10-1.414 1.414l.707.707a1 1 0 001.414-1.414l-.707-.707zM14.343 14.343a1 1 0 011.414 0l.707.707a1 1 0 01-1.414 1.414l-.707-.707a1 1 0 010-1.414z"></path></svg>
                        <span>Custom AI Matches</span>
                    </span>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 items-stretch">
                    <!-- Destinations Match -->
                    <div class="glass p-8 md:p-10 rounded-[3.5rem] border border-white/5 shadow-2xl flex flex-col h-full hover:border-emerald-500/30 transition-all duration-500 bg-slate-950/40 backdrop-blur-xl">
                        <div class="flex items-center space-x-4 mb-8">
                            <div class="w-12 h-12 rounded-2xl bg-emerald-500/10 flex items-center justify-center text-emerald-500">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                            </div>
                            <h4 class="text-md font-black text-white uppercase tracking-widest">Recommended Gateways</h4>
                        </div>
                        
                        <div class="space-y-6 flex-grow">
                            <template x-if="!results.suggestions?.destinations?.length">
                                <div class="text-center py-10">
                                    <p class="text-xs text-slate-500 font-bold uppercase tracking-wider">No matching gateways found.</p>
                                </div>
                            </template>
                            
                            <template x-for="dest in results.suggestions?.destinations" :key="dest.id">
                                <div class="group relative h-48 rounded-3xl overflow-hidden border border-white/5 hover:border-emerald-500/30 transition-all duration-500">
                                    <!-- Image with fallback -->
                                    <img :src="dest.image_url" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Destination cover" onerror="this.src='https://images.unsplash.com/photo-1506929113670-b43135c8d33d?auto=format&fit=crop&q=80&w=1000'">
                                    
                                    <!-- Dark Gradient Overlay -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/30 to-transparent"></div>
                                    
                                    <!-- Content bottom pinned -->
                                    <div class="absolute inset-0 p-5 flex flex-col justify-end z-10">
                                        <div class="flex items-center text-[8px] font-black uppercase text-emerald-400 tracking-widest mb-1">
                                            <svg class="w-3 h-3 text-emerald-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                                            <span x-text="dest.location"></span>
                                        </div>
                                        <h5 class="text-lg font-black text-white uppercase tracking-tight mb-2 group-hover:text-emerald-300 transition-colors" x-text="dest.name"></h5>
                                        <a :href="`/destinations/${dest.slug}`" class="inline-flex items-center text-[9px] font-black text-white hover:text-emerald-400 uppercase tracking-widest transition-colors">
                                            <span>Explore Sanctuary</span>
                                            <svg class="w-3.5 h-3.5 ml-1.5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                        </a>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- Packages Match -->
                    <div class="glass p-8 md:p-10 rounded-[3.5rem] border border-white/5 shadow-2xl flex flex-col h-full hover:border-blue-500/30 transition-all duration-500 bg-slate-950/40 backdrop-blur-xl">
                        <div class="flex items-center space-x-4 mb-8">
                            <div class="w-12 h-12 rounded-2xl bg-blue-500/10 flex items-center justify-center text-blue-500">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <h4 class="text-md font-black text-white uppercase tracking-widest">Suggested Expeditions</h4>
                        </div>

                        <div class="space-y-6 flex-grow">
                            <template x-if="!results.suggestions?.packages?.length">
                                <div class="text-center py-10">
                                    <p class="text-xs text-slate-500 font-bold uppercase tracking-wider">No matching packages found.</p>
                                </div>
                            </template>

                            <template x-for="pkg in results.suggestions?.packages" :key="pkg.id">
                                <div class="group relative h-48 rounded-3xl overflow-hidden border border-white/5 hover:border-blue-500/30 transition-all duration-500">
                                    <!-- Image with fallback -->
                                    <img :src="pkg.image_url" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Package cover" onerror="this.src='https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&q=80&w=1000'">
                                    
                                    <!-- Dark Gradient Overlay -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/30 to-transparent"></div>
                                    
                                    <!-- Tags -->
                                    <div class="absolute top-4 right-4 z-10 flex space-x-2">
                                        <span class="px-2.5 py-1 text-[8px] font-black uppercase text-blue-400 bg-slate-950/70 border border-blue-500/30 rounded-lg backdrop-blur-sm" x-text="pkg.duration_days + ' Days'"></span>
                                    </div>

                                    <!-- Content bottom pinned -->
                                    <div class="absolute inset-0 p-5 flex flex-col justify-end z-10">
                                        <span class="text-[9px] font-black text-blue-450 uppercase tracking-widest" x-text="formatCurrency(pkg.price)"></span>
                                        <h5 class="text-md font-black text-white uppercase tracking-tight mb-2 group-hover:text-blue-300 transition-colors line-clamp-1" x-text="pkg.name"></h5>
                                        <a :href="`/packages/${pkg.slug}`" class="inline-flex items-center text-[9px] font-black text-white hover:text-blue-400 uppercase tracking-widest transition-colors">
                                            <span>View Expedition</span>
                                            <svg class="w-3.5 h-3.5 ml-1.5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                        </a>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- Hotels Match -->
                    <div class="glass p-8 md:p-10 rounded-[3.5rem] border border-white/5 shadow-2xl flex flex-col h-full hover:border-amber-500/30 transition-all duration-500 bg-slate-950/40 backdrop-blur-xl">
                        <div class="flex items-center space-x-4 mb-8">
                            <div class="w-12 h-12 rounded-2xl bg-amber-500/10 flex items-center justify-center text-amber-500">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                            <h4 class="text-md font-black text-white uppercase tracking-widest">Luxury Sanctuaries</h4>
                        </div>

                        <div class="space-y-6 flex-grow">
                            <template x-if="!results.suggestions?.hotels?.length">
                                <div class="text-center py-10">
                                    <p class="text-xs text-slate-500 font-bold uppercase tracking-wider">No matching stays found.</p>
                                </div>
                            </template>

                            <template x-for="hotel in results.suggestions?.hotels" :key="hotel.id">
                                <div class="group relative h-48 rounded-3xl overflow-hidden border border-white/5 hover:border-amber-500/30 transition-all duration-500">
                                    <!-- Image with fallback -->
                                    <img :src="hotel.image_url" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Hotel cover" onerror="this.src='https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&q=80&w=1000'">
                                    
                                    <!-- Dark Gradient Overlay -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/30 to-transparent"></div>
                                    
                                    <!-- Stars Badge -->
                                    <div class="absolute top-4 right-4 z-10 flex text-amber-400 bg-slate-950/70 border border-amber-500/20 px-2 py-0.5 rounded-lg backdrop-blur-sm">
                                        <template x-for="star in getStars(hotel.rating || hotel.star_rating)">
                                            <svg class="w-2.5 h-2.5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                        </template>
                                    </div>

                                    <!-- Content bottom pinned -->
                                    <div class="absolute inset-0 p-5 flex flex-col justify-end z-10">
                                        <span class="text-[9px] font-black text-amber-450 uppercase tracking-widest"><span x-text="formatCurrency(hotel.price_per_night)"></span>/night</span>
                                        <h5 class="text-md font-black text-white uppercase tracking-tight mb-2 group-hover:text-amber-300 transition-colors line-clamp-1" x-text="hotel.name"></h5>
                                        <a :href="`/hotels/${hotel.slug}`" class="inline-flex items-center text-[9px] font-black text-white hover:text-amber-400 uppercase tracking-widest transition-colors">
                                            <span>Reserve Stay</span>
                                            <svg class="w-3.5 h-3.5 ml-1.5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                        </a>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>

                <!-- Activities Tag Cloud -->
                <div class="glass p-8 md:p-10 rounded-[3.5rem] border border-white/5 mt-10 shadow-2xl bg-slate-950/40 backdrop-blur-xl">
                    <div class="flex items-center space-x-3 mb-6">
                        <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <h4 class="text-xs font-black text-slate-400 uppercase tracking-widest">Recommended Recreational Pursuits</h4>
                    </div>
                    
                    <div class="flex flex-wrap gap-3">
                        <template x-if="!results.suggestions?.activities?.length">
                            <p class="text-sm text-slate-500 font-medium">No custom activities suggested.</p>
                        </template>
                        
                        <template x-for="activity in results.suggestions?.activities" :key="activity">
                            <span class="px-6 py-3 text-[9px] font-black text-slate-400 uppercase tracking-widest bg-slate-900/40 hover:bg-emerald-500/10 hover:text-emerald-400 hover:border-emerald-500/35 rounded-2xl border border-white/5 transition-all cursor-default" x-text="activity"></span>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Script logic for Planner -->
    <script>
        function tripPlanner() {
            return {
                planner: { budget: 50000, days: 5, travel_type: 'adventure', state_id: {{ $states->first()->id ?? 1 }} },
                calculator: { budget: 50000, days: 5, travel_type: 'adventure', travelers: 2 },
                results: { suggestions: { destinations: [], packages: [], hotels: [], activities: [] } },
                calculation: { hotel_cost: 0, transport_cost: 0, food_cost: 0, activity_cost: 0, taxes: 0, estimated_total: 0 },
                calculationFetched: false,
                loadingPlanner: false,
                loadingCalculator: false,
                resultsFetched: false,
                
                formatCurrency(val) {
                    return '₹' + Number(val || 0).toLocaleString('en-IN');
                },
                getStars(rating) {
                    let count = Math.round(rating || 5);
                    return Array(count).fill(0);
                },
                
                submitPlan() {
                    this.loadingPlanner = true;
                    fetch("{{ route('trip-planner.store') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(this.planner)
                    })
                    .then(res => res.json())
                    .then(data => { 
                        this.results = data; 
                        this.resultsFetched = true;
                        this.loadingPlanner = false;
                        setTimeout(() => {
                            document.getElementById('planner-results').scrollIntoView({ behavior: 'smooth', block: 'start' });
                        }, 100);
                    })
                    .catch((err) => {
                        console.error("Planner error:", err);
                        this.loadingPlanner = false;
                        alert("An error occurred while generating the plan. Please check your inputs.");
                    });
                },
                
                calculateExpense() {
                    this.loadingCalculator = true;
                    fetch("{{ route('trip-planner.calculate') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(this.calculator)
                    })
                    .then(res => res.json())
                    .then(data => { 
                        this.calculation = data.expense || data; 
                        this.calculationFetched = true;
                        this.loadingCalculator = false;
                    })
                    .catch((err) => {
                        console.error("Calculator error:", err);
                        this.loadingCalculator = false;
                        alert("An error occurred during calculation.");
                    });
                }
            };
        }
    </script>
</x-app-layout>
