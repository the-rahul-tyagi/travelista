<x-app-layout>
    <!-- Full-screen Cinematic Hero with Search and Filters -->
    <section class="relative h-screen w-full flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&q=80&w=2000" class="w-full h-full object-cover scale-105 animate-slow-zoom" alt="Luxury Travel">
            <!-- Sleek luxury gradient overlays -->
            <div class="absolute inset-0 bg-gradient-to-b from-slate-950/50 via-slate-950/60 to-slate-950"></div>
            <!-- Glassmorphic ambient light glow -->
            <div class="absolute inset-0 bg-blue-600/5 backdrop-blur-[2px]"></div>
        </div>

        <!-- Centered interactive dashboard -->
        <div class="relative z-10 text-center px-4 max-w-5xl w-full flex flex-col items-center">
            
            <!-- Floating Badge -->
            <div data-aos="zoom-out" data-aos-duration="1000" class="mb-5">
                <span class="inline-flex items-center space-x-2 px-5 py-2 glass rounded-full text-[9px] font-black uppercase tracking-[0.4em] text-blue-400 border border-blue-500/20 shadow-lg floating">
                    <svg class="w-3.5 h-3.5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                    <span>Elite Gateways</span>
                </span>
            </div>

            <!-- Main Headline -->
            <h1 data-aos="fade-up" data-aos-duration="1000" class="text-4xl md:text-7xl lg:text-8xl font-black text-white uppercase tracking-tighter leading-[0.9] mb-4">
                PROFOUND <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-indigo-400 to-blue-500 italic font-light font-serif lowercase tracking-normal">journeys</span>
            </h1>

            <p data-aos="fade-up" data-aos-delay="100" class="text-sm md:text-base text-slate-300/80 font-medium max-w-xl mx-auto leading-relaxed mb-10">
                Immerse yourself in nature’s finest creations. Search and filter through our catalog of luxury-tier destinations.
            </p>

            <!-- Search & Filters Glass Dashboard -->
            <div data-aos="fade-up" data-aos-delay="200" class="glass w-full p-6 md:p-8 rounded-[2.5rem] border border-white/10 shadow-2xl backdrop-blur-xl bg-slate-950/40 space-y-6">
                <!-- Search Form -->
                <form action="{{ route('destinations.index') }}" method="GET" class="relative w-full group">
                    <div class="glass flex items-center p-2 rounded-[2rem] border border-white/10 focus-within:border-blue-500/50 focus-within:shadow-[0_0_25px_rgba(59,130,246,0.2)] transition-all duration-500 bg-slate-950/60 backdrop-blur-xl">
                        <div class="pl-4 pr-1.5 text-blue-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search curated gateways by name or location..." class="w-full bg-transparent border-none px-3 py-2 text-xs font-black uppercase tracking-wider text-white placeholder-slate-500 focus:ring-0 outline-none">
                        
                        <!-- Keep category param in search if selected -->
                        @if(request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif

                        <button type="submit" class="btn-luxury px-8 py-3.5 rounded-[1.7rem] !text-[10px] shadow-lg shadow-blue-600/20 shrink-0">Find Gateway</button>
                    </div>
                </form>

                @php
                    $categories = [
                        'Mountains' => [
                            'icon' => '<svg class="w-3.5 h-3.5 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21h18M3 21l8-16 8 16M3 21l8-10 8 10"></path></svg>'
                        ],
                        'Beaches' => [
                            'icon' => '<svg class="w-3.5 h-3.5 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>'
                        ],
                        'Nature' => [
                            'icon' => '<svg class="w-3.5 h-3.5 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3a9 9 0 00-9 9m9-9a9 9 0 019 9M3 12a9 9 0 009 9m-9-9c1.657 0 3-4.03 3-9s-1.343-9-3-9"></path></svg>'
                        ],
                        'Heritage' => [
                            'icon' => '<svg class="w-3.5 h-3.5 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"></path></svg>'
                        ],
                        'Adventure' => [
                            'icon' => '<svg class="w-3.5 h-3.5 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>'
                        ],
                        'Religious' => [
                            'icon' => '<svg class="w-3.5 h-3.5 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2v20M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"></path></svg>'
                        ]
                    ];
                @endphp

                <!-- Category Filters -->
                <div class="flex flex-wrap items-center justify-center gap-3.5 pt-2">
                    <a href="{{ route('destinations.index', request()->only('search')) }}" class="inline-flex items-center px-5 py-2.5 rounded-xl border {{ !request('category') ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white border-transparent shadow-lg shadow-blue-600/30' : 'glass border-white/5 text-slate-400 hover:text-white hover:bg-white/5' }} text-[9px] font-black uppercase tracking-widest transition-all duration-300 hover:scale-[1.03] active:scale-[0.98]">
                        <svg class="w-3.5 h-3.5 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                        <span>All</span>
                    </a>

                    @foreach($categories as $catName => $meta)
                        @php
                            $isSelected = request('category') === $catName;
                            $bgClass = $isSelected ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white border-transparent shadow-lg shadow-blue-600/30' : 'glass border-white/5 text-slate-400 hover:text-white hover:bg-white/5';
                        @endphp
                        <!-- Keep search param in category link if set -->
                        <a href="{{ route('destinations.index', array_merge(request()->only('search'), ['category' => $catName])) }}" class="inline-flex items-center px-5 py-2.5 rounded-xl border {{ $bgClass }} text-[9px] font-black uppercase tracking-widest transition-all duration-300 hover:scale-[1.03] active:scale-[0.98]">
                            {!! $meta['icon'] !!}
                            <span>{{ $catName }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Bouncing Scroll Down Indicator -->
        <a href="#gateways-grid" class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 flex flex-col items-center hover:opacity-80 transition-opacity">
            <span class="text-[8px] font-black uppercase tracking-[0.3em] text-slate-500 mb-2">Scroll to explore</span>
            <div class="w-6 h-10 border border-white/20 rounded-full p-1 flex justify-center">
                <div class="w-1.5 h-2.5 bg-blue-500 rounded-full animate-bounce"></div>
            </div>
        </a>
    </section>

    <!-- Destination Cards Grid Section -->
    <section id="gateways-grid" class="py-32 bg-slate-950 relative border-t border-white/5 scroll-mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="text-center mb-20" data-aos="fade-up">
                <span class="text-[10px] font-black text-blue-500 uppercase tracking-[0.3em] block mb-3">Elite Portfolio</span>
                <h2 class="text-3xl md:text-5xl font-black text-white uppercase tracking-tighter">
                    Available <span class="text-blue-500 italic">Gateways</span>
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-transparent via-blue-600 to-transparent mx-auto mt-6"></div>
            </div>

            <!-- Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @forelse($destinations as $destination)
                    @php
                        // Set unique category shadow/glow classes
                        $categoryColors = [
                            'Mountains' => 'hover:shadow-blue-500/10',
                            'Beaches' => 'hover:shadow-amber-500/10',
                            'Nature' => 'hover:shadow-emerald-500/10',
                            'Heritage' => 'hover:shadow-indigo-500/10',
                            'Adventure' => 'hover:shadow-rose-500/10',
                            'Religious' => 'hover:shadow-purple-500/10'
                        ];
                        $shadowClass = $categoryColors[$destination->category] ?? 'hover:shadow-blue-500/10';
                    @endphp
                    <div class="group card-glare relative h-[480px] rounded-[2.5rem] overflow-hidden border border-white/5 hover:border-white/10 shadow-2xl transition-all duration-700 hover:-translate-y-3 {{ $shadowClass }}" data-aos="fade-up" data-aos-delay="{{ $loop->index * 70 }}">
                        <!-- Image -->
                        <img src="{{ $destination->image_url }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105" alt="{{ $destination->name }}" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1506929113670-b43135c8d33d?auto=format&fit=crop&q=80&w=1000'">
                        
                        <!-- Rich Dark Overlays -->
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-slate-950/40 to-slate-950 transition-opacity duration-500 group-hover:opacity-90"></div>
                        
                        <!-- Premium Category Badge -->
                        <div class="absolute top-6 left-6 z-20">
                            <span class="inline-flex items-center px-4 py-1.5 glass rounded-xl text-[8px] font-black text-blue-400 uppercase tracking-widest border border-blue-400/25 shadow-lg backdrop-blur-md">
                                {{ $destination->category }}
                            </span>
                        </div>

                        <!-- Card Content -->
                        <div class="absolute inset-0 p-8 flex flex-col justify-end z-10">
                            <div class="transform translate-y-6 group-hover:translate-y-0 transition-transform duration-500 ease-out">
                                
                                <!-- Meta (Location, Stars) -->
                                <div class="flex items-center justify-between mb-3.5 opacity-80 group-hover:opacity-100 transition-opacity duration-300">
                                    <div class="flex items-center text-slate-300 whitespace-nowrap overflow-hidden">
                                        <svg class="w-3.5 h-3.5 text-blue-500 mr-1.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                                        <span class="text-[9px] font-black uppercase tracking-widest truncate max-w-[150px]">{{ $destination->location }}</span>
                                    </div>
                                    <div class="flex items-center bg-white/5 border border-white/10 px-2.5 py-0.5 rounded-full backdrop-blur-md shrink-0">
                                        <svg class="w-2.5 h-2.5 text-amber-500 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                        <span class="text-[8px] font-black text-white ml-1.5">4.9</span>
                                    </div>
                                </div>

                                <!-- Title -->
                                <h3 class="text-2xl md:text-3xl font-black text-white uppercase tracking-tighter mb-3 leading-none group-hover:text-blue-400 transition-colors">
                                    {{ $destination->name }}
                                </h3>
                                
                                <!-- Description -->
                                <p class="text-slate-400 text-xs font-medium leading-relaxed mb-6 opacity-0 group-hover:opacity-100 transition-all duration-500 line-clamp-2">
                                    {{ $destination->description }}
                                </p>
                                
                                <!-- Action Button -->
                                <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-center pt-2">
                                    <a href="{{ route('destinations.show', $destination->slug) }}" class="btn-luxury w-full py-3.5 !text-[9px] text-center flex items-center justify-center space-x-2">
                                        <span>Explore Destination</span>
                                        <svg class="w-3.5 h-3.5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-32 glass rounded-[3rem] border-white/5 max-w-xl mx-auto px-8" data-aos="fade-up">
                        <div class="w-16 h-16 bg-blue-600/10 rounded-2xl flex items-center justify-center text-blue-500 mx-auto mb-6">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path></svg>
                        </div>
                        <p class="text-xl text-slate-300 font-black uppercase tracking-tight">No Gateways Found</p>
                        <p class="text-xs text-slate-400 mt-2 font-medium">We couldn't find any destinations matching your criteria. Try adjusting filters or search term.</p>
                        <a href="{{ route('destinations.index') }}" class="btn-luxury px-8 py-3.5 mt-8 inline-block !text-[9px]">Reset Filters</a>
                    </div>
                @endforelse
            </div>
            
            <!-- Pagination -->
            @if($destinations->hasPages())
                <div class="pt-24 flex justify-center">{{ $destinations->links() }}</div>
            @endif
        </div>
    </section>
</x-app-layout>
