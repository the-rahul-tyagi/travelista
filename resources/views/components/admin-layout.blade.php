<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' || (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) }" x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Master Control - TRAVELISTA PREMIA</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- AOS Animations -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js" defer></script>

    @stack('styles')
</head>
<body class="font-sans antialiased bg-slate-50 text-slate-900 dark:bg-slate-950 dark:text-slate-200 selection:bg-blue-500/30 selection:text-blue-800 dark:selection:text-blue-200 transition-colors duration-300" x-data="{ sidebarOpen: window.innerWidth >= 1024, mobileMenuOpen: false }">
    <div class="min-h-screen flex overflow-hidden">
        
        <!-- Mobile Overlay -->
        <div x-show="mobileMenuOpen" class="fixed inset-0 z-[90] bg-slate-900/50 backdrop-blur-sm lg:hidden" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="mobileMenuOpen = false"></div>

        <!-- Luxury Sidebar -->
        <aside :class="sidebarOpen ? 'w-80' : 'w-24'" class="bg-white/80 dark:bg-slate-900/40 backdrop-blur-3xl border-r border-slate-200 dark:border-white/5 flex-shrink-0 flex flex-col relative z-[100] transition-all duration-300 ease-in-out fixed lg:static inset-y-0 left-0 transform lg:transform-none" :class="mobileMenuOpen ? 'translate-x-0' : '-translate-x-full'">
            
            <div class="p-6 lg:p-10 flex items-center justify-between">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center group overflow-hidden whitespace-nowrap">
                    <div class="w-12 h-12 flex-shrink-0 bg-blue-600 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-600/30 group-hover:rotate-12 transition-transform duration-500">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <span x-show="sidebarOpen" x-transition:enter="transition ease-out duration-300 delay-100" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0" class="ml-3 text-2xl font-black text-slate-900 dark:text-white tracking-tighter uppercase">PREMIA</span>
                </a>
            </div>

            <nav class="flex-grow px-4 lg:px-6 space-y-2 py-4 overflow-y-auto custom-scrollbar overflow-x-hidden">
                <div x-show="sidebarOpen" class="text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest px-4 pb-4 transition-opacity">Menu</div>
                <div x-show="!sidebarOpen" class="h-8"></div>
                
                @php
                    $navItems = [
                        ['route' => 'admin.dashboard',            'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6', 'label' => 'Command Center', 'color' => 'blue'],
                        ['route' => 'admin.bookings.index',        'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z', 'label' => 'Bookings', 'color' => 'emerald'],
                        ['route' => 'admin.users.index',           'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z', 'label' => 'Travelers', 'color' => 'indigo'],
                        ['route' => 'admin.destinations.index',    'icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z', 'label' => 'Destinations', 'color' => 'cyan'],
                        ['route' => 'admin.hotels.index',          'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4', 'label' => 'Hotels', 'color' => 'amber'],
                        ['route' => 'admin.packages.index',        'icon' => 'M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9', 'label' => 'Packages', 'color' => 'purple'],
                        ['route' => 'admin.payments.index',        'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'label' => 'Payments', 'color' => 'sky'],
                        ['route' => 'admin.coupons.index',         'icon' => 'M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z', 'label' => 'Coupons', 'color' => 'rose'],
                        ['route' => 'admin.offers.index',          'icon' => 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z', 'label' => 'Offers', 'color' => 'emerald'],
                        ['route' => 'admin.reviews.index',         'icon' => 'M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z', 'label' => 'Reviews', 'color' => 'amber'],
                        ['route' => 'admin.blogs.index',           'icon' => 'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 12h6m-6-4h6', 'label' => 'Blog', 'color' => 'cyan'],
                        ['route' => 'admin.support.adminIndex',    'icon' => 'M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z', 'label' => 'Support Queue', 'color' => 'red'],
                    ];
                @endphp

                @foreach($navItems as $item)
                    @if(\Route::has($item['route']))
                    <x-admin.nav-link :href="route($item['route'])" :active="request()->routeIs(Str::before($item['route'], '.index').'*')" :color="$item['color']">
                        <x-slot:icon><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"></path></svg></x-slot:icon>
                        {{ $item['label'] }}
                    </x-admin.nav-link>
                    @endif
                @endforeach
            </nav>

            <div class="p-4 lg:p-8 border-t border-slate-200 dark:border-white/5 bg-slate-100/50 dark:bg-slate-900/60 overflow-hidden whitespace-nowrap">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center px-4 lg:px-6 py-4 text-rose-500 hover:bg-rose-50 dark:hover:bg-rose-500/10 rounded-2xl transition-all font-black text-xs uppercase tracking-widest group">
                        <svg class="w-5 h-5 flex-shrink-0 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        <span x-show="sidebarOpen" class="ml-3 transition-opacity">Secure Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Workspace -->
        <main class="flex-grow flex flex-col h-screen overflow-hidden relative dark:bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] bg-fixed transition-colors duration-300">
            <!-- Premium Header -->
            <header class="h-20 lg:h-24 bg-white/80 dark:bg-slate-950/80 backdrop-blur-2xl border-b border-slate-200 dark:border-white/5 flex items-center justify-between px-6 lg:px-12 sticky top-0 z-50 flex-shrink-0 transition-colors duration-300">
                <div class="flex items-center space-x-4 lg:space-x-8">
                    <!-- Hamburger / Sidebar Toggle -->
                    <button @click="window.innerWidth >= 1024 ? sidebarOpen = !sidebarOpen : mobileMenuOpen = true" class="p-2 text-slate-500 hover:text-blue-600 transition-colors focus:outline-none bg-slate-100 dark:bg-slate-800 rounded-xl lg:bg-transparent lg:dark:bg-transparent">
                        <svg class="w-6 h-6 lg:w-7 lg:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                    <h2 class="text-xl lg:text-2xl font-black text-slate-800 dark:text-white uppercase tracking-tighter hidden md:block">{{ $header ?? '' }}</h2>
                </div>
                
                <div class="flex items-center space-x-4 lg:space-x-8">
                    <!-- Flash messages inline -->
                    @if(session('success'))
                        <div class="hidden lg:flex items-center space-x-2 bg-white/10 dark:bg-slate-800/50 px-4 py-2 rounded-xl border border-emerald-500/20 text-emerald-500 dark:text-emerald-400 text-xs font-bold shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif

                    <!-- Actions Panel -->
                    <div class="flex items-center space-x-2 lg:space-x-4 border-r border-slate-200 dark:border-white/10 pr-4 lg:pr-8">
                        <!-- Dark/Light Toggle -->
                        <button @click="darkMode = !darkMode" class="p-2.5 text-slate-500 dark:text-slate-400 hover:text-amber-500 dark:hover:text-amber-400 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 rounded-xl transition-all relative">
                            <svg x-show="darkMode" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            <svg x-show="!darkMode" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                        </button>
                    </div>

                    <!-- Profile -->
                    <div class="flex items-center space-x-4 cursor-pointer group" x-data="{ profileOpen: false }" @click="profileOpen = !profileOpen" @click.outside="profileOpen = false">
                        <div class="text-right hidden sm:block">
                            <p class="text-sm font-black text-slate-800 dark:text-white uppercase tracking-widest group-hover:text-blue-600 transition-colors">{{ Auth::user()->name }}</p>
                            <p class="text-[10px] font-bold text-blue-600 dark:text-blue-500 uppercase tracking-tighter">System Admin</p>
                        </div>
                        <div class="relative">
                            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=3b82f6&color=fff" class="w-10 h-10 lg:w-12 lg:h-12 rounded-2xl border-2 border-white dark:border-slate-800 group-hover:border-blue-600 transition-all shadow-xl" alt="">
                            <div class="absolute inset-0 bg-blue-600/20 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            
                            <!-- Dropdown -->
                            <div x-show="profileOpen" x-transition.opacity.scale.origin.top.right x-cloak class="absolute right-0 mt-4 w-48 bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/10 rounded-2xl shadow-2xl py-2 z-50">
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-xs font-bold text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-white/5 hover:text-slate-900 dark:hover:text-white uppercase tracking-widest transition-colors">Edit Profile</a>
                                <div class="h-px bg-slate-200 dark:bg-white/10 my-2"></div>
                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-xs font-bold text-rose-500 hover:bg-rose-50 dark:hover:bg-rose-500/10 uppercase tracking-widest transition-colors">Sign Out</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div class="flex-grow overflow-y-auto p-6 lg:p-12 xl:p-16 w-full custom-scrollbar">
                <div class="max-w-[1600px] mx-auto pb-24">
                    {{ $slot }}
                </div>
            </div>
        </main>
    </div>

    <!-- Inject Alpine x-cloak style -->
    <style>
        [x-cloak] { display: none !important; }
        
        /* Custom Scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(100, 116, 139, 0.3);
            border-radius: 10px;
        }
        .dark .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.1);
        }
    </style>

    <!-- AOS Init -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 700, once: true, offset: 50 });
        
        // Prevent mouse scroll wheel from accidentally changing values on focused number inputs
        document.addEventListener('wheel', function(e) {
            if (document.activeElement && document.activeElement.type === 'number') {
                document.activeElement.blur();
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
