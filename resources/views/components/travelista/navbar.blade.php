<nav x-data="{ mobileMenu: false, scrolled: false }" 
     @scroll.window="scrolled = window.pageYOffset > 20"
     :class="scrolled ? 'bg-slate-950/80 backdrop-blur-2xl py-4 border-b border-white/5 shadow-2xl' : 'bg-transparent py-8'"
     class="fixed top-0 left-0 right-0 z-[100] transition-all duration-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            <!-- Brand Identity -->
            <div class="flex items-center space-x-12">
                <a href="{{ auth()->check() ? route('home') : route('landing') }}" class="group flex items-center space-x-3.5">
                    <div class="w-11 h-11 bg-gradient-to-tr from-blue-600 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-600/40 group-hover:rotate-[360deg] transition-all duration-1000">
                        <span class="text-white font-black italic text-2xl tracking-tighter">T</span>
                    </div>
                    <div>
                        <span class="text-2xl font-black text-white uppercase tracking-tighter group-hover:text-blue-500 transition-colors block leading-none">TRAVELISTA</span>
                        <span class="text-[8px] font-bold text-slate-500 uppercase tracking-[0.25em] block mt-1">PREMIUM ESCAPES</span>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <div class="hidden lg:flex items-center space-x-8 ml-auto">
                    @auth
                        <x-nav-link-premium href="{{ route('home') }}" :active="request()->routeIs('home')">Home</x-nav-link-premium>
                        <x-nav-link-premium href="{{ route('destinations.index') }}" :active="request()->routeIs('destinations.index')">Destinations</x-nav-link-premium>
                        <x-nav-link-premium href="{{ route('packages.index') }}" :active="request()->routeIs('packages.index')">Packages</x-nav-link-premium>
                        <x-nav-link-premium href="{{ route('hotels.index') }}" :active="request()->routeIs('hotels.index')">Hotels</x-nav-link-premium>
                        
                        <!-- Planner Dropdown -->
                        <div class="relative py-2" x-data="{ plannerOpen: false }" @mouseenter="plannerOpen = true" @mouseleave="plannerOpen = false">
                            <button class="flex items-center space-x-1.5 text-[10px] font-black uppercase tracking-widest text-slate-300 hover:text-blue-400 transition-all focus:outline-none">
                                <span>Planner</span>
                                <svg class="w-3 h-3 transition-transform duration-300" :class="plannerOpen ? 'rotate-180 text-blue-500' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="plannerOpen" 
                                 style="display: none;"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 translate-y-4 scale-95"
                                 x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                                 x-transition:leave-end="opacity-0 translate-y-4 scale-95"
                                 class="absolute left-1/2 -translate-x-1/2 mt-4 w-80 bg-slate-900/95 backdrop-blur-3xl rounded-[2rem] border border-white/5 shadow-2xl p-6 z-50 space-y-4">
                                
                                <!-- Trip Planner -->
                                <a href="{{ route('trip-planner.index') }}#smart-planner" class="flex items-start space-x-4 p-3 rounded-2xl hover:bg-white/5 transition-all group/item">
                                    <div class="w-10 h-10 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 flex items-center justify-center shrink-0 group-hover/item:scale-110 group-hover/item:bg-emerald-600 group-hover/item:text-white transition-all duration-300">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                                    </div>
                                    <div>
                                        <p class="text-xs font-black text-white uppercase tracking-wider group-hover/item:text-emerald-400 transition-colors">Trip Planner</p>
                                        <p class="text-[9px] text-slate-400 font-medium leading-relaxed mt-0.5">Design custom day-by-day itineraries with our travel builder.</p>
                                    </div>
                                </a>

                                <!-- Expense Estimator -->
                                <a href="{{ route('trip-planner.index') }}#expense-estimator" class="flex items-start space-x-4 p-3 rounded-2xl hover:bg-white/5 transition-all group/item">
                                    <div class="w-10 h-10 rounded-xl bg-blue-500/10 border border-blue-500/20 text-blue-400 flex items-center justify-center shrink-0 group-hover/item:scale-110 group-hover/item:bg-blue-600 group-hover/item:text-white transition-all duration-300">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                    <div>
                                        <p class="text-xs font-black text-white uppercase tracking-wider group-hover/item:text-blue-400 transition-colors">Expense Estimator</p>
                                        <p class="text-[9px] text-slate-400 font-medium leading-relaxed mt-0.5">Forecast costs and manage budgets for your luxury trips.</p>
                                    </div>
                                </a>

                                <!-- Offers -->
                                <a href="{{ route('offers.index') }}" class="flex items-start space-x-4 p-3 rounded-2xl hover:bg-white/5 transition-all group/item">
                                    <div class="w-10 h-10 rounded-xl bg-amber-500/10 border border-amber-500/20 text-amber-400 flex items-center justify-center shrink-0 group-hover/item:scale-110 group-hover/item:bg-amber-600 group-hover/item:text-white transition-all duration-300">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                                    </div>
                                    <div>
                                        <p class="text-xs font-black text-white uppercase tracking-wider group-hover/item:text-amber-400 transition-colors">Curated Offers</p>
                                        <p class="text-[9px] text-slate-400 font-medium leading-relaxed mt-0.5">Explore premium seasonal packages and exclusive members discounts.</p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <x-nav-link-premium href="{{ route('contact') }}" :active="request()->routeIs('contact')">Contact</x-nav-link-premium>
                    @else
                        <x-nav-link-premium href="{{ request()->routeIs('landing') ? '#hero' : route('landing') }}">Home</x-nav-link-premium>
                        <x-nav-link-premium href="{{ request()->routeIs('landing') ? '#features' : route('landing').'#features' }}">Features</x-nav-link-premium>
                        <x-nav-link-premium href="{{ request()->routeIs('landing') ? '#destinations' : route('landing').'#destinations' }}">Destinations</x-nav-link-premium>
                        <x-nav-link-premium href="{{ request()->routeIs('landing') ? '#about' : route('landing').'#about' }}">About</x-nav-link-premium>
                        <x-nav-link-premium href="{{ route('contact') }}" :active="request()->routeIs('contact')">Contact</x-nav-link-premium>
                    @endauth
                </div>
            </div>

            <!-- Auth / Actions -->
            <div class="hidden lg:flex items-center space-x-6">
                @auth
                    @php
                        $unreadCount = auth()->user()->notifications()->unread()->count();
                    @endphp
                    <a href="{{ route('notifications.index') }}" class="relative w-12 h-12 glass rounded-2xl flex items-center justify-center text-white hover:text-blue-500 hover:border-blue-500/30 transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0a3 3 0 11-6 0h6z"></path></svg>
                        @if($unreadCount > 0)
                            <span class="absolute -top-1 -right-1 bg-rose-500 text-white text-[8px] font-black px-2 py-0.5 rounded-full">{{ $unreadCount }}</span>
                        @endif
                    </a>
                    
                    <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <button class="flex items-center space-x-3 glass pl-2 pr-4 py-2 rounded-2xl border-white/10 hover:bg-white/5 hover:border-blue-500/30 transition-all duration-300 focus:outline-none">
                            <img src="{{ auth()->user()->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name).'&background=3b82f6&color=fff' }}" class="w-10 h-10 rounded-xl object-cover ring-2 ring-blue-600/20" alt="{{ auth()->user()->name }}">
                            <div class="flex flex-col items-start leading-none ml-1 hidden sm:block">
                                <span class="text-[9px] text-slate-400 font-bold uppercase tracking-widest">Welcome</span>
                                <span class="text-[10px] font-black text-white uppercase tracking-widest">{{ \Illuminate\Support\Str::limit(auth()->user()->name, 12) }}</span>
                            </div>
                            <svg class="w-4 h-4 text-slate-500 transition-transform duration-300" :class="open ? 'rotate-180 text-blue-500' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        
                        <div x-show="open" 
                             style="display: none;"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 translate-y-4 scale-95"
                             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                             x-transition:leave-end="opacity-0 translate-y-4 scale-95"
                             class="absolute right-0 mt-4 w-72 bg-slate-900/95 backdrop-blur-3xl rounded-[2.5rem] border border-white/5 shadow-2xl p-6 z-50 space-y-6">
                            
                            <!-- User Info Segment -->
                            <div class="flex items-center space-x-4 border-b border-white/5 pb-4">
                                <img src="{{ auth()->user()->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name).'&background=3b82f6&color=fff' }}" class="w-12 h-12 rounded-2xl object-cover border-2 border-white/10" alt="">
                                <div class="overflow-hidden">
                                    <p class="text-sm font-black text-white uppercase tracking-tighter truncate">{{ auth()->user()->name }}</p>
                                    <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest truncate">{{ auth()->user()->email }}</p>
                                </div>
                            </div>

                            <!-- Wallet / Reward Quick Glance Stats -->
                            <div class="grid grid-cols-2 gap-3 bg-white/2 rounded-2xl border border-white/5 p-3 text-center">
                                <div>
                                    <p class="text-[8px] font-black text-slate-500 uppercase tracking-widest">Wallet</p>
                                    <p class="text-xs font-bold text-white mt-0.5">₹{{ number_format(auth()->user()->wallet_balance ?? 0) }}</p>
                                </div>
                                <div class="border-l border-white/5">
                                    <p class="text-[8px] font-black text-slate-500 uppercase tracking-widest">Rewards</p>
                                    <p class="text-xs font-bold text-white mt-0.5">{{ number_format(auth()->user()->reward_points ?? 0) }} pts</p>
                                </div>
                            </div>

                            <!-- Navigation Links -->
                            <div class="space-y-3">
                                @if(auth()->user()->role === 'admin')
                                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 p-2.5 rounded-xl hover:bg-white/5 text-[9px] font-black text-white uppercase tracking-widest transition-all group/sub">
                                        <div class="w-8 h-8 bg-blue-600/10 rounded-lg flex items-center justify-center text-blue-400 group-hover/sub:bg-blue-600 group-hover/sub:text-white transition-all"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg></div>
                                        <span>Command Center</span>
                                    </a>
                                @endif
                                <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 p-2.5 rounded-xl hover:bg-white/5 text-[9px] font-black text-white uppercase tracking-widest transition-all group/sub">
                                    <div class="w-8 h-8 bg-purple-600/10 rounded-lg flex items-center justify-center text-purple-400 group-hover/sub:bg-purple-600 group-hover/sub:text-white transition-all"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg></div>
                                    <span>My Portfolio</span>
                                </a>
                                <a href="{{ route('profile.edit') }}" class="flex items-center space-x-3 p-2.5 rounded-xl hover:bg-white/5 text-[9px] font-black text-white uppercase tracking-widest transition-all group/sub">
                                    <div class="w-8 h-8 bg-amber-600/10 rounded-lg flex items-center justify-center text-amber-400 group-hover/sub:bg-amber-600 group-hover/sub:text-white transition-all"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7zM17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg></div>
                                    <span>Profile Settings</span>
                                </a>
                                <div class="h-px bg-white/5 my-2"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center space-x-3 p-2.5 rounded-xl hover:bg-rose-500/10 text-[9px] font-black text-rose-500 uppercase tracking-widest transition-all text-left">
                                        <div class="w-8 h-8 bg-rose-600/10 rounded-lg flex items-center justify-center text-rose-400"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-6 0v-1m6-10V7a3 3 0 00-6 0v1"></path></svg></div>
                                        <span>End Session</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="flex items-center space-x-5">
                        <a href="{{ route('login') }}" class="text-[10px] font-black text-slate-300 hover:text-white uppercase tracking-widest transition-all">Sign In</a>
                        <a href="{{ route('register') }}" class="text-[10px] font-black text-white uppercase tracking-widest bg-gradient-to-r from-blue-600 to-indigo-600 hover:shadow-blue-600/40 rounded-xl px-5 py-2.5 transition-all shadow-lg hover:scale-[1.03] active:scale-95 duration-300">Sign Up</a>
                    </div>
                @endauth
            </div>

            <!-- Mobile Toggle -->
            <div class="lg:hidden flex items-center">
                <button @click="mobileMenu = !mobileMenu" class="w-12 h-12 glass rounded-xl flex items-center justify-center text-white">
                    <svg x-show="!mobileMenu" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    <svg x-show="mobileMenu" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenu" style="display: none;"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-full"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="lg:hidden glass border-t border-white/5 absolute top-full left-0 right-0 p-8 space-y-6 shadow-2xl">
        <div class="flex flex-col space-y-6">
            @auth
                <a href="{{ route('home') }}" class="text-xs font-black text-white uppercase tracking-widest">Home</a>
                <a href="{{ route('destinations.index') }}" class="text-xs font-black text-white uppercase tracking-widest">Destinations</a>
                <a href="{{ route('packages.index') }}" class="text-xs font-black text-white uppercase tracking-widest">Packages</a>
                <a href="{{ route('hotels.index') }}" class="text-xs font-black text-white uppercase tracking-widest">Hotels</a>
                <a href="{{ route('trip-planner.index') }}#smart-planner" class="text-xs font-black text-white uppercase tracking-widest">Trip Planner</a>
                <a href="{{ route('trip-planner.index') }}#expense-estimator" class="text-xs font-black text-white uppercase tracking-widest">Expense Estimator</a>
                <a href="{{ route('offers.index') }}" class="text-xs font-black text-white uppercase tracking-widest">Offers</a>
                <a href="{{ route('contact') }}" class="text-xs font-black text-white uppercase tracking-widest">Contact</a>
            @else
                <a href="{{ request()->routeIs('landing') ? '#hero' : route('landing') }}" class="text-xs font-black text-white uppercase tracking-widest">Home</a>
                <a href="{{ request()->routeIs('landing') ? '#features' : route('landing').'#features' }}" class="text-xs font-black text-white uppercase tracking-widest">Features</a>
                <a href="{{ request()->routeIs('landing') ? '#destinations' : route('landing').'#destinations' }}" class="text-xs font-black text-white uppercase tracking-widest">Destinations</a>
                <a href="{{ request()->routeIs('landing') ? '#about' : route('landing').'#about' }}" class="text-xs font-black text-white uppercase tracking-widest">About</a>
                <a href="{{ route('contact') }}" class="text-xs font-black text-white uppercase tracking-widest">Contact</a>
            @endauth
        </div>
        <div class="pt-6 border-t border-white/5 flex flex-col space-y-4">
            @auth
                <a href="{{ route('dashboard') }}" class="btn-luxury w-full text-center py-4">My Portfolio</a>
            @else
                <div class="grid grid-cols-2 gap-4">
                    <a href="{{ route('login') }}" class="glass border-white/10 rounded-xl text-center text-[10px] font-black text-white uppercase tracking-widest py-3">Sign In</a>
                    <a href="{{ route('register') }}" class="bg-blue-600 rounded-xl text-center text-[10px] font-black text-white uppercase tracking-widest py-3 shadow-lg shadow-blue-500/20">Sign Up</a>
                </div>
            @endauth
        </div>
    </div>
</nav>
