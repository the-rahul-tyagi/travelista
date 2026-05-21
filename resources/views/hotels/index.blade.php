<x-app-layout>
    @php
        $activeCategory = request('category');

        $themeColors = [
            'Luxury' => [
                'text' => 'text-amber-500',
                'bg' => 'bg-amber-500',
                'border' => 'border-amber-500/20',
                'glow' => 'bg-amber-600/5',
                'badge_text' => 'text-amber-400',
                'badge_border' => 'border-amber-500/20',
                'indicator' => 'text-amber-500',
                'btn_bg' => '!bg-amber-600 hover:!bg-amber-500 shadow-lg shadow-amber-600/20',
                'shadow' => 'hover:shadow-amber-500/10',
                'title_hover' => 'group-hover:text-amber-450',
                'focus_input' => 'focus-within:border-amber-500/50 focus-within:shadow-[0_0_25px_rgba(245,158,11,0.2)]',
                'gradient' => 'from-amber-600 to-yellow-600 shadow-amber-600/30',
                'title_gradient' => 'from-amber-400 via-yellow-400 to-amber-500',
                'icon' => '<svg class="w-3.5 h-3.5 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>'
            ],
            'Premium' => [
                'text' => 'text-purple-500',
                'bg' => 'bg-purple-500',
                'border' => 'border-purple-500/20',
                'glow' => 'bg-purple-600/5',
                'badge_text' => 'text-purple-400',
                'badge_border' => 'border-purple-500/20',
                'indicator' => 'text-purple-500',
                'btn_bg' => '!bg-purple-600 hover:!bg-purple-500 shadow-lg shadow-purple-600/20',
                'shadow' => 'hover:shadow-purple-500/10',
                'title_hover' => 'group-hover:text-purple-450',
                'focus_input' => 'focus-within:border-purple-500/50 focus-within:shadow-[0_0_25px_rgba(168,85,247,0.2)]',
                'gradient' => 'from-purple-600 to-indigo-600 shadow-purple-600/30',
                'title_gradient' => 'from-purple-400 via-indigo-400 to-purple-500',
                'icon' => '<svg class="w-3.5 h-3.5 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>'
            ],
            'Boutique' => [
                'text' => 'text-rose-500',
                'bg' => 'bg-rose-500',
                'border' => 'border-rose-500/20',
                'glow' => 'bg-rose-600/5',
                'badge_text' => 'text-rose-400',
                'badge_border' => 'border-rose-500/20',
                'indicator' => 'text-rose-500',
                'btn_bg' => '!bg-rose-600 hover:!bg-rose-500 shadow-lg shadow-rose-600/20',
                'shadow' => 'hover:shadow-rose-500/10',
                'title_hover' => 'group-hover:text-rose-450',
                'focus_input' => 'focus-within:border-rose-500/50 focus-within:shadow-[0_0_25px_rgba(244,63,94,0.2)]',
                'gradient' => 'from-rose-600 to-pink-600 shadow-rose-600/30',
                'title_gradient' => 'from-rose-400 via-pink-400 to-rose-500',
                'icon' => '<svg class="w-3.5 h-3.5 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>'
            ],
            'Budget' => [
                'text' => 'text-blue-500',
                'bg' => 'bg-blue-500',
                'border' => 'border-blue-500/20',
                'glow' => 'bg-blue-600/5',
                'badge_text' => 'text-blue-400',
                'badge_border' => 'border-blue-500/20',
                'indicator' => 'text-blue-500',
                'btn_bg' => '!bg-blue-600 hover:!bg-blue-500 shadow-lg shadow-blue-600/20',
                'shadow' => 'hover:shadow-blue-500/10',
                'title_hover' => 'group-hover:text-blue-450',
                'focus_input' => 'focus-within:border-blue-500/50 focus-within:shadow-[0_0_25px_rgba(59,130,246,0.2)]',
                'gradient' => 'from-blue-600 to-cyan-600 shadow-blue-600/30',
                'title_gradient' => 'from-blue-400 via-cyan-400 to-blue-500',
                'icon' => '<svg class="w-3.5 h-3.5 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>'
            ]
        ];

        $defaultColorTheme = [
            'text' => 'text-amber-500',
            'bg' => 'bg-amber-500',
            'border' => 'border-amber-500/20',
            'glow' => 'bg-amber-600/5',
            'badge_text' => 'text-amber-400',
            'badge_border' => 'border-amber-400/25',
            'indicator' => 'text-amber-500',
            'btn_bg' => '!bg-amber-600 hover:!bg-amber-500 shadow-lg shadow-amber-600/20',
            'shadow' => 'hover:shadow-amber-500/10',
            'title_hover' => 'group-hover:text-amber-450',
            'focus_input' => 'focus-within:border-amber-500/50 focus-within:shadow-[0_0_25px_rgba(245,158,11,0.2)]',
            'gradient' => 'from-amber-600 to-yellow-600 shadow-amber-600/30',
            'title_gradient' => 'from-amber-400 via-yellow-400 to-amber-500',
        ];

        $activeTheme = $themeColors[$activeCategory] ?? $defaultColorTheme;
    @endphp

    <!-- Cinematic Shorter Hero -->
    <section class="relative h-[55vh] w-full flex items-center justify-center pt-24 overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&q=80&w=2000" class="w-full h-full object-cover scale-105 animate-slow-zoom" alt="Signature Sanctuaries">
            <!-- Sleek luxury gradient overlays -->
            <div class="absolute inset-0 bg-gradient-to-b from-slate-950/40 via-slate-950/60 to-slate-950"></div>
            <!-- Glassmorphic ambient light glow -->
            <div class="absolute inset-0 {{ $activeTheme['glow'] }} backdrop-blur-[1px]"></div>
        </div>

        <!-- Centered title -->
        <div class="relative z-10 text-center px-4 max-w-4xl w-full flex flex-col items-center">
            
            <!-- Floating Badge -->
            <div data-aos="zoom-out" data-aos-duration="1000" class="mb-4">
                <span class="inline-flex items-center space-x-2 px-5 py-2 glass rounded-full text-[9px] font-black uppercase tracking-[0.4em] {{ $activeTheme['badge_text'] }} {{ $activeTheme['badge_border'] }} shadow-lg floating">
                    <svg class="w-3.5 h-3.5 {{ $activeTheme['badge_text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    <span>Elite Accommodations</span>
                </span>
            </div>

            <!-- Main Headline -->
            <h1 data-aos="fade-up" data-aos-duration="1000" class="text-4xl md:text-6xl font-black text-white uppercase tracking-tighter leading-none mb-3">
                INDIAN <span class="text-transparent bg-clip-text bg-gradient-to-r {{ $activeTheme['title_gradient'] }} italic font-light font-serif lowercase tracking-normal">sanctuaries</span>
            </h1>

            <p data-aos="fade-up" data-aos-delay="100" class="text-xs md:text-sm text-slate-400 font-medium max-w-lg mx-auto leading-relaxed">
                Find refuge in extraordinary architectural treasures. Filter by sanctuary tiers, features, and values.
            </p>
        </div>
    </section>

    <!-- Main Content Section with Sidebar Filters -->
    <section id="hotels-grid" class="py-16 bg-slate-950 relative border-t border-white/5 scroll-mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex flex-col lg:flex-row gap-12" x-data="{ mobileFiltersOpen: false }">
                
                <!-- Mobile Filters Toggle Button -->
                <div class="lg:hidden flex items-center justify-between glass p-4 rounded-2xl border border-white/5 bg-slate-950/40 w-full mb-2">
                    <span class="text-xs font-black uppercase text-white tracking-wider flex items-center">
                        <svg class="w-4 h-4 mr-2 {{ $activeTheme['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                        Filter Sanctuaries
                    </span>
                    <button @click="mobileFiltersOpen = !mobileFiltersOpen" type="button" class="px-5 py-2.5 rounded-xl border border-white/10 glass text-[9px] font-black uppercase tracking-widest text-white hover:bg-white/5 transition-all cursor-pointer">
                        <span x-text="mobileFiltersOpen ? 'Hide Filters' : 'Show Filters'"></span>
                    </button>
                </div>

                <!-- Sidebar Filters Column -->
                <aside class="w-full lg:w-1/4 lg:sticky lg:top-28 self-start transition-all duration-300 z-30"
                       :class="mobileFiltersOpen ? 'block' : 'hidden lg:block'"
                       data-aos="fade-right">
                    
                    <div class="glass border-white/10 bg-slate-950/40 rounded-[2rem] p-6 md:p-8 space-y-8 shadow-2xl relative overflow-hidden backdrop-blur-xl border-t-2 {{ str_replace('text-', 'border-', $activeTheme['indicator']) }}">
                        
                        <div>
                            <h3 class="text-sm font-black text-white uppercase tracking-wider">Filter Stays</h3>
                            <p class="text-[10px] text-slate-500 font-medium mt-1">Refine stay locations and properties</p>
                        </div>

                        <!-- Single GET Form containing all inputs -->
                        <form action="{{ route('hotels.index') }}" method="GET" class="space-y-6">
                            
                            <!-- Search Box -->
                            <div class="space-y-2">
                                <label class="text-[9px] font-black uppercase tracking-widest text-slate-400">Search</label>
                                <div class="glass flex items-center p-1.5 rounded-2xl border border-white/10 {{ $activeTheme['focus_input'] }} transition-all duration-500 bg-slate-950/60 backdrop-blur-xl">
                                    <div class="pl-3 text-slate-400">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                    </div>
                                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Sanctuary name or city..." class="w-full bg-transparent border-none px-3 py-2 text-xs font-black uppercase tracking-wider text-white placeholder-slate-650 focus:ring-0 outline-none">
                                </div>
                            </div>

                            <!-- Hidden field for Category -->
                            <input type="hidden" name="category" id="category-filter-input" value="{{ request('category') }}">

                            <!-- Sanctuary Tier (Vertical Category Selection) -->
                            <div class="space-y-3">
                                <label class="text-[9px] font-black uppercase tracking-widest text-slate-400 block">Sanctuary Tier</label>
                                <div class="flex flex-col gap-2">
                                    @php
                                        $isAllSelected = !request('category');
                                    @endphp
                                    <button type="button" onclick="document.getElementById('category-filter-input').value = ''; this.closest('form').submit();" class="w-full inline-flex items-center justify-between px-4 py-3 rounded-xl border text-left transition-all duration-300 {{ $isAllSelected ? 'bg-gradient-to-r from-amber-600 to-yellow-600 text-white border-transparent shadow-lg shadow-amber-600/30 font-black' : 'glass border-white/5 text-slate-400 hover:text-white hover:bg-white/5 font-bold' }} text-[9px] uppercase tracking-widest hover:scale-[1.02] active:scale-[0.98] cursor-pointer">
                                        <span class="flex items-center">
                                            <svg class="w-3.5 h-3.5 mr-2.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                                            All Categories
                                        </span>
                                        @if($isAllSelected)
                                            <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span>
                                        @endif
                                    </button>

                                    @foreach(['Luxury', 'Premium', 'Boutique', 'Budget'] as $cat)
                                        @php
                                            $isSelected = request('category') === $cat;
                                            $catTheme = $themeColors[$cat] ?? $defaultColorTheme;
                                            $bgClass = $isSelected ? 'bg-gradient-to-r ' . $catTheme['gradient'] . ' text-white border-transparent shadow-lg font-black' : 'glass border-white/5 text-slate-400 hover:text-white hover:bg-white/5 font-bold';
                                        @endphp
                                        <button type="button" onclick="document.getElementById('category-filter-input').value = '{{ $cat }}'; this.closest('form').submit();" class="w-full inline-flex items-center justify-between px-4 py-3 rounded-xl border text-left transition-all duration-300 {{ $bgClass }} text-[9px] uppercase tracking-widest hover:scale-[1.02] active:scale-[0.98] cursor-pointer">
                                            <span class="flex items-center">
                                                {!! $catTheme['icon'] !!}
                                                {{ $cat }}
                                            </span>
                                            @if($isSelected)
                                                <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span>
                                            @endif
                                        </button>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Property Type Filter (Toggle Pills) -->
                            <div class="space-y-3">
                                <label class="text-[9px] font-black uppercase tracking-widest text-slate-400 block">Property Type</label>
                                <div class="grid grid-cols-2 gap-2">
                                    @php
                                        $selectedType = request('type');
                                    @endphp
                                    <label class="cursor-pointer">
                                        <input type="radio" name="type" value="" {{ !$selectedType ? 'checked' : '' }} onchange="this.closest('form').submit()" class="sr-only">
                                        <div class="text-center py-2 px-3 rounded-xl border text-[8px] uppercase tracking-widest transition-all duration-300 {{ !$selectedType ? 'bg-gradient-to-r ' . $activeTheme['gradient'] . ' text-white border-transparent shadow-lg font-black' : 'glass border-white/5 text-slate-400 hover:text-white hover:bg-white/5 font-bold' }}">
                                            All Types
                                        </div>
                                    </label>
                                    @foreach(['Resort', 'Villas', 'Budget', 'Luxury'] as $t)
                                        @php
                                            $isTypeSelected = $selectedType === $t;
                                        @endphp
                                        <label class="cursor-pointer">
                                            <input type="radio" name="type" value="{{ $t }}" {{ $isTypeSelected ? 'checked' : '' }} onchange="this.closest('form').submit()" class="sr-only">
                                            <div class="text-center py-2 px-3 rounded-xl border text-[8px] uppercase tracking-widest transition-all duration-300 {{ $isTypeSelected ? 'bg-gradient-to-r ' . $activeTheme['gradient'] . ' text-white border-transparent shadow-lg font-black' : 'glass border-white/5 text-slate-400 hover:text-white hover:bg-white/5 font-bold' }}">
                                                {{ $t }}
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Min Rating Filter (Toggle Pills) -->
                            <div class="space-y-3">
                                <label class="text-[9px] font-black uppercase tracking-widest text-slate-400 block">Minimum Rating</label>
                                <div class="grid grid-cols-2 gap-2">
                                    @php
                                        $selectedRating = request('rating');
                                    @endphp
                                    <label class="cursor-pointer">
                                        <input type="radio" name="rating" value="" {{ !$selectedRating ? 'checked' : '' }} onchange="this.closest('form').submit()" class="sr-only">
                                        <div class="text-center py-2 px-3 rounded-xl border text-[8px] uppercase tracking-widest transition-all duration-300 {{ !$selectedRating ? 'bg-gradient-to-r ' . $activeTheme['gradient'] . ' text-white border-transparent shadow-lg font-black' : 'glass border-white/5 text-slate-400 hover:text-white hover:bg-white/5 font-bold' }}">
                                            Any Rating
                                        </div>
                                    </label>
                                    @foreach([5, 4, 3] as $star)
                                        @php
                                            $isRatingSelected = $selectedRating == $star;
                                        @endphp
                                        <label class="cursor-pointer">
                                            <input type="radio" name="rating" value="{{ $star }}" {{ $isRatingSelected ? 'checked' : '' }} onchange="this.closest('form').submit()" class="sr-only">
                                            <div class="flex items-center justify-center space-x-1 py-2 px-3 rounded-xl border text-[8px] uppercase tracking-widest transition-all duration-300 {{ $isRatingSelected ? 'bg-gradient-to-r ' . $activeTheme['gradient'] . ' text-white border-transparent shadow-lg font-black' : 'glass border-white/5 text-slate-400 hover:text-white hover:bg-white/5 font-bold' }}">
                                                <span class="flex items-center text-amber-500 shrink-0">
                                                    @for($i=0; $i<$star; $i++)
                                                        <svg class="w-2 h-2 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                                    @endfor
                                                </span>
                                                <span class="shrink-0">& Up</span>
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Price Range Slider + Number Sync (Alpine.js) -->
                            <div class="space-y-3" x-data="{ maxPrice: {{ request('price_max') ?: 100000 }} }">
                                <div class="flex justify-between items-center">
                                    <label class="text-[9px] font-black uppercase tracking-widest text-slate-400">Max Price/Night</label>
                                    <span class="text-xs font-black text-white" x-text="'₹' + Number(maxPrice).toLocaleString('en-IN')"></span>
                                </div>
                                <div class="space-y-3">
                                    <input type="range" min="1000" max="100000" step="1000" x-model="maxPrice" name="price_max" class="w-full accent-{{ str_replace('text-', '', $activeTheme['indicator']) }} bg-slate-900 h-1.5 rounded-lg appearance-none cursor-pointer">
                                    <div class="glass flex items-center p-1.5 rounded-2xl border border-white/10 {{ $activeTheme['focus_input'] }} transition-all duration-500 bg-slate-950/60 backdrop-blur-xl">
                                        <div class="pl-3 text-slate-400 text-xs font-bold">₹</div>
                                        <input type="number" min="1000" max="100000" x-model="maxPrice" class="w-full bg-transparent border-none px-3 py-1.5 text-xs font-black uppercase tracking-wider text-white placeholder-slate-650 focus:ring-0 outline-none">
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="pt-4 border-t border-white/5 flex flex-col gap-2">
                                <button type="submit" class="btn-luxury w-full py-3.5 rounded-xl !text-[9px] {{ $activeTheme['btn_bg'] }} flex items-center justify-center space-x-2">
                                    <span>Apply Filters</span>
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </button>
                                @if(request()->anyFilled(['search', 'category', 'type', 'rating', 'price_max']))
                                    <a href="{{ route('hotels.index') }}" class="text-[9px] font-black text-slate-500 hover:text-white uppercase tracking-widest transition-colors text-center py-2">
                                        Clear Filters
                                    </a>
                                @endif
                            </div>

                        </form>

                    </div>
                </aside>

                <!-- Hotel Grid Column -->
                <main class="w-full lg:w-3/4">
                    
                    <!-- Search Results Info Header -->
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-10 pb-6 border-b border-white/5" data-aos="fade-up">
                        <div>
                            <p class="text-xs text-slate-400 font-medium">
                                Showing <span class="text-white font-black">{{ $hotels->total() }}</span> elite sanctuaries
                                @if(request('category'))
                                    under <span class="{{ $activeTheme['badge_text'] }} font-black uppercase tracking-wider">{{ request('category') }}</span>
                                @endif
                            </p>
                        </div>
                        <div class="flex items-center space-x-3 text-[9px] font-black uppercase tracking-widest">
                            <span class="text-slate-500">Sorted By:</span>
                            <span class="text-white bg-white/5 border border-white/10 px-3 py-1.5 rounded-lg">Featured Tiers</span>
                        </div>
                    </div>

                    <!-- Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                        @forelse($hotels as $hotel)
                            @php
                                $hCat = $hotel->category;
                                $hTheme = $themeColors[$hCat] ?? $defaultColorTheme;
                            @endphp
                            <a href="{{ route('hotels.show', $hotel->slug) }}" class="group card-glare relative h-[480px] rounded-[2.5rem] overflow-hidden border border-white/5 hover:border-white/10 shadow-2xl transition-all duration-700 hover:-translate-y-3 {{ $hTheme['shadow'] }}" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                                <!-- Image -->
                                <img src="{{ $hotel->image_url }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105" alt="{{ $hotel->name }}" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&q=80&w=1000'">
                                
                                <!-- Rich Dark Overlays -->
                                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-slate-950/40 to-slate-950 transition-opacity duration-500 group-hover:opacity-90"></div>
                                
                                <!-- Premium Category Badge -->
                                <div class="absolute top-6 left-6 z-20 flex flex-col gap-2">
                                    <span class="inline-flex items-center px-4 py-1.5 glass rounded-xl text-[8px] font-black {{ $hTheme['badge_text'] }} uppercase tracking-widest border {{ $hTheme['badge_border'] }} shadow-lg backdrop-blur-md">
                                        {{ $hotel->category }}
                                    </span>
                                    <span class="inline-flex items-center px-3 py-1 glass rounded-lg text-[8px] font-black text-amber-400 uppercase tracking-widest border border-amber-400/20 shadow-lg backdrop-blur-md">
                                        {{ $hotel->type }}
                                    </span>
                                </div>

                                <!-- Rating Badge -->
                                <div class="absolute top-6 right-6 z-20 flex items-center bg-white/5 border border-white/10 px-2.5 py-1 rounded-xl backdrop-blur-md shadow-lg">
                                    <svg class="w-3 h-3 text-amber-500 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    <span class="text-[9px] font-black text-white ml-1.5">{{ $hotel->rating }}.0</span>
                                </div>

                                <!-- Card Content -->
                                <div class="absolute inset-0 p-8 flex flex-col justify-end z-10">
                                    <div class="transform translate-y-6 group-hover:translate-y-0 transition-transform duration-500 ease-out">
                                        
                                        <!-- Meta (Destination Name) -->
                                        <div class="flex items-center justify-between mb-3 opacity-80 group-hover:opacity-100 transition-opacity duration-300">
                                            <div class="flex items-center text-slate-300">
                                                <svg class="w-3.5 h-3.5 {{ $hTheme['text'] }} mr-1.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                                                <span class="text-[9px] font-black uppercase tracking-widest truncate">{{ $hotel->destination->name ?? 'Exotic Location' }}</span>
                                            </div>
                                        </div>

                                        <!-- Title -->
                                        <h3 class="text-lg md:text-xl font-black text-white uppercase tracking-tighter mb-2 leading-tight {{ $hTheme['title_hover'] }} transition-colors">
                                            {{ $hotel->name }}
                                        </h3>
                                        
                                        <!-- Description -->
                                        <p class="text-slate-400 text-xs font-medium leading-relaxed mb-4 opacity-0 group-hover:opacity-100 transition-all duration-500 line-clamp-2">
                                            {{ $hotel->description }}
                                        </p>

                                        <!-- Amenities Mini-Icons -->
                                        <div class="flex items-center space-x-3 mb-5 opacity-0 group-hover:opacity-100 transition-all duration-500">
                                            <div class="flex items-center justify-center w-7 h-7 bg-white/5 rounded-lg text-slate-400 hover:text-white transition-colors" title="High-Speed Wi-Fi">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"></path></svg>
                                            </div>
                                            <div class="flex items-center justify-center w-7 h-7 bg-white/5 rounded-lg text-slate-400 hover:text-white transition-colors" title="Luxury Pool">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path></svg>
                                            </div>
                                            <div class="flex items-center justify-center w-7 h-7 bg-white/5 rounded-lg text-slate-400 hover:text-white transition-colors" title="Spa & Wellness">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                            </div>
                                        </div>
                                        
                                        <!-- Price & Action Button -->
                                        <div class="opacity-0 group-hover:opacity-100 transition-all duration-500 flex items-center justify-between pt-2 border-t border-white/5">
                                            <div>
                                                <p class="text-[8px] font-black text-slate-500 uppercase tracking-widest">Starting From</p>
                                                <p class="text-base font-black text-white tracking-tighter">₹{{ number_format($hotel->price_per_night) }} <span class="text-[8px] text-slate-500 uppercase font-bold">/ Night</span></p>
                                            </div>
                                            <div class="btn-luxury px-5 py-3 !text-[8.5px] {{ $hTheme['btn_bg'] }} text-center flex items-center space-x-1.5">
                                                <span>Explore</span>
                                                <svg class="w-3 h-3 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div class="col-span-1 md:col-span-2 xl:col-span-3 text-center py-20 glass rounded-[2rem] border-white/5 max-w-md mx-auto px-6" data-aos="fade-up">
                                <div class="w-12 h-12 bg-amber-600/10 rounded-xl flex items-center justify-center text-amber-500 mx-auto mb-4">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path></svg>
                                </div>
                                <p class="text-base text-slate-300 font-black uppercase tracking-tight">No Sanctuaries Found</p>
                                <p class="text-xs text-slate-500 mt-2 font-medium">We couldn't find any sanctuaries matching your criteria. Try adjusting filters or search terms.</p>
                                <a href="{{ route('hotels.index') }}" class="btn-luxury px-6 py-3 mt-6 inline-block !text-[8px] !bg-amber-600 hover:!bg-amber-500 shadow-amber-600/20">Reset Filters</a>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    @if($hotels->hasPages())
                        <div class="pt-16 flex justify-center">
                            {{ $hotels->appends(request()->query())->links() }}
                        </div>
                    @endif

                </main>

            </div>

        </div>
    </section>

    <style>
        @keyframes slow-zoom {
            0% { transform: scale(1); }
            100% { transform: scale(1.08); }
        }
        .animate-slow-zoom {
            animation: slow-zoom 20s ease-in-out infinite alternate;
        }
    </style>
</x-app-layout>
