<x-app-layout>
    @php
        $hCat = $hotel->category;

        $themeColors = [
            'Luxury' => [
                'text' => 'text-amber-500',
                'bg' => 'bg-amber-500',
                'border' => 'border-amber-500/20',
                'glow' => 'bg-amber-600/5',
                'badge_text' => 'text-amber-400',
                'badge_border' => 'border-amber-500/20',
                'indicator' => 'text-amber-500',
                'btn_bg' => 'from-amber-600 to-yellow-600 shadow-amber-600/20 hover:from-amber-500 hover:to-yellow-500',
                'focus_input' => 'focus-within:border-amber-500/50 focus-within:shadow-[0_0_25px_rgba(245,158,11,0.2)]',
                'gradient' => 'from-amber-600 to-yellow-600 shadow-amber-600/30',
                'title_gradient' => 'from-amber-400 via-yellow-400 to-amber-500',
                'shadow' => 'shadow-amber-500/10',
            ],
            'Premium' => [
                'text' => 'text-purple-500',
                'bg' => 'bg-purple-500',
                'border' => 'border-purple-500/20',
                'glow' => 'bg-purple-600/5',
                'badge_text' => 'text-purple-400',
                'badge_border' => 'border-purple-500/20',
                'indicator' => 'text-purple-500',
                'btn_bg' => 'from-purple-600 to-indigo-600 shadow-purple-600/20 hover:from-purple-500 hover:to-indigo-500',
                'focus_input' => 'focus-within:border-purple-500/50 focus-within:shadow-[0_0_25px_rgba(168,85,247,0.2)]',
                'gradient' => 'from-purple-600 to-indigo-600 shadow-purple-600/30',
                'title_gradient' => 'from-purple-400 via-indigo-400 to-purple-500',
                'shadow' => 'shadow-purple-500/10',
            ],
            'Boutique' => [
                'text' => 'text-rose-500',
                'bg' => 'bg-rose-500',
                'border' => 'border-rose-500/20',
                'glow' => 'bg-rose-600/5',
                'badge_text' => 'text-rose-400',
                'badge_border' => 'border-rose-500/20',
                'indicator' => 'text-rose-500',
                'btn_bg' => 'from-rose-600 to-pink-600 shadow-rose-600/20 hover:from-rose-500 hover:to-pink-500',
                'focus_input' => 'focus-within:border-rose-500/50 focus-within:shadow-[0_0_25px_rgba(244,63,94,0.2)]',
                'gradient' => 'from-rose-600 to-pink-600 shadow-rose-600/30',
                'title_gradient' => 'from-rose-400 via-pink-400 to-rose-500',
                'shadow' => 'shadow-rose-500/10',
            ],
            'Budget' => [
                'text' => 'text-blue-500',
                'bg' => 'bg-blue-500',
                'border' => 'border-blue-500/20',
                'glow' => 'bg-blue-600/5',
                'badge_text' => 'text-blue-400',
                'badge_border' => 'border-blue-500/20',
                'indicator' => 'text-blue-500',
                'btn_bg' => 'from-blue-600 to-cyan-600 shadow-blue-600/20 hover:from-blue-500 hover:to-cyan-500',
                'focus_input' => 'focus-within:border-blue-500/50 focus-within:shadow-[0_0_25px_rgba(59,130,246,0.2)]',
                'gradient' => 'from-blue-600 to-cyan-600 shadow-blue-600/30',
                'title_gradient' => 'from-blue-400 via-cyan-400 to-blue-500',
                'shadow' => 'shadow-blue-500/10',
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
            'btn_bg' => 'from-amber-600 to-yellow-600 shadow-amber-600/20 hover:from-amber-500 hover:to-yellow-500',
            'focus_input' => 'focus-within:border-amber-500/50 focus-within:shadow-[0_0_25px_rgba(245,158,11,0.2)]',
            'gradient' => 'from-amber-600 to-yellow-600 shadow-amber-600/30',
            'title_gradient' => 'from-amber-400 via-yellow-400 to-amber-500',
            'shadow' => 'shadow-amber-500/10',
        ];

        $activeTheme = $themeColors[$hCat] ?? $defaultColorTheme;
        $initialPrice = $hotel->roomCategories->count() ? $hotel->roomCategories->first()->price_per_night : $hotel->price_per_night;
    @endphp

    <!-- Cinematic Header -->
    <section class="relative h-[75vh] overflow-hidden">
        <img src="{{ $hotel->image_url }}" class="w-full h-full object-cover animate-slow-zoom" alt="{{ $hotel->name }}" onerror="this.src='https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&q=80&w=2000'">
        <!-- Dark ambient overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/20 to-transparent"></div>
        <div class="absolute inset-0 {{ $activeTheme['glow'] }} backdrop-blur-[1px]"></div>

        <!-- Floating Glass Back Button -->
        <a href="{{ route('hotels.index') }}" class="absolute top-8 left-8 z-30 inline-flex items-center space-x-3 px-5 py-2.5 glass rounded-full text-[10px] font-black uppercase tracking-widest text-white hover:{{ $activeTheme['text'] }} transition-all duration-300 shadow-lg border border-white/5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            <span>Back to Sanctuaries</span>
        </a>

        <!-- Content Overlay -->
        <div class="absolute inset-0 flex items-center justify-center text-center px-4">
            <div data-aos="zoom-in">
                <!-- Stars -->
                <div class="flex items-center justify-center space-x-1.5 mb-6">
                    @for($i=0; $i<$hotel->rating; $i++)
                        <svg class="w-5 h-5 text-amber-500 fill-current drop-shadow-[0_0_10px_rgba(245,158,11,0.8)]" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    @endfor
                </div>

                <h1 class="text-5xl md:text-8xl font-black text-white uppercase tracking-tighter mb-8 leading-none max-w-4xl mx-auto">{{ $hotel->name }}</h1>
                
                <div class="flex items-center justify-center space-x-8">
                    <div class="flex items-center space-x-3">
                        <span class="inline-block px-5 py-2 glass rounded-full text-[9px] font-black uppercase tracking-widest {{ $activeTheme['text'] }} {{ $activeTheme['border'] }}">{{ $hotel->category }}</span>
                    </div>
                    <div class="w-px h-6 bg-white/20"></div>
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 {{ $activeTheme['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                        <span class="text-xs font-black text-white uppercase tracking-widest">{{ $hotel->location }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bouncing Scroll Down Indicator -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 flex flex-col items-center hover:opacity-80 transition-opacity">
            <span class="text-[8px] font-black uppercase tracking-[0.3em] text-slate-500 mb-2">Scroll to explore</span>
            <div class="w-6 h-10 border border-white/20 rounded-full p-1 flex justify-center">
                <div class="w-1.5 h-2.5 bg-amber-500 rounded-full animate-bounce"></div>
            </div>
        </div>
    </section>

    <!-- Main Content Section -->
    <section class="py-24 bg-slate-950 relative border-t border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-16">
                
                <!-- Left: Stay Details -->
                <div class="w-full lg:w-2/3 space-y-20">
                    
                    <!-- Narrative Description -->
                    <section data-aos="fade-up">
                        <h2 class="text-4xl font-black text-white uppercase tracking-tighter mb-8">The <span class="{{ $activeTheme['text'] }} italic">Narrative</span></h2>
                        <p class="text-xl text-slate-400 font-medium leading-relaxed mb-12">{{ $hotel->description }}</p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <div class="glass p-8 rounded-[2.5rem] border border-white/5 hover:border-white/10 transition-all duration-300">
                                <span class="text-[10px] font-black {{ $activeTheme['text'] }} uppercase tracking-widest mb-2 block">Sanctuary Tier</span>
                                <p class="text-white font-bold uppercase tracking-widest">{{ $hotel->category }} Stay</p>
                            </div>
                            <div class="glass p-8 rounded-[2.5rem] border border-white/5 hover:border-white/10 transition-all duration-300">
                                <span class="text-[10px] font-black {{ $activeTheme['text'] }} uppercase tracking-widest mb-2 block">Property Type</span>
                                <p class="text-white font-bold uppercase tracking-widest">{{ $hotel->type }}</p>
                            </div>
                            <div class="glass p-8 rounded-[2.5rem] border border-white/5 hover:border-white/10 transition-all duration-300">
                                <span class="text-[10px] font-black {{ $activeTheme['text'] }} uppercase tracking-widest mb-2 block">Sanctuary Rating</span>
                                <p class="text-white font-bold uppercase tracking-widest flex items-center">
                                    {{ $hotel->rating }}.0
                                    <svg class="w-3.5 h-3.5 text-amber-500 fill-current ml-2" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                </p>
                            </div>
                        </div>
                    </section>

                    <!-- Interactive Photo Gallery with Alpine Lightbox -->
                    @if($hotel->images)
                    <section data-aos="fade-up" x-data="{ isOpen: false, activeImg: '' }">
                        <h2 class="text-4xl font-black text-white uppercase tracking-tighter mb-10">Visual <span class="{{ $activeTheme['text'] }} italic">Gallery</span></h2>
                        
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                            @foreach(json_decode($hotel->images, true) as $img)
                                <div class="h-48 overflow-hidden rounded-[2.5rem] border border-white/5 hover:border-white/10 transition-all duration-300">
                                    <img src="{{ asset($img) }}" @click="activeImg = '{{ asset($img) }}'; isOpen = true" class="w-full h-full object-cover hover:scale-110 transition-transform duration-700 cursor-pointer" alt="Hotel Image">
                                </div>
                            @endforeach
                        </div>

                        <!-- Fullscreen Lightbox Modal -->
                        <div x-show="isOpen" 
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-200"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950/90 backdrop-blur-md p-4" 
                             style="display: none;"
                             @keydown.escape.window="isOpen = false">
                            
                            <!-- Close Button -->
                            <button @click="isOpen = false" class="absolute top-6 right-6 w-12 h-12 glass rounded-full flex items-center justify-center text-white hover:text-rose-500 transition-colors z-50">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>

                            <!-- Lightbox Image Wrapper -->
                            <div class="relative max-w-5xl max-h-[85vh] w-full h-full flex items-center justify-center" @click.away="isOpen = false">
                                <img :src="activeImg" class="max-w-full max-h-full object-contain rounded-2xl shadow-2xl border border-white/10" alt="Expedition Image">
                            </div>
                        </div>
                    </section>
                    @endif

                    <!-- Premium Amenities Grid -->
                    <section data-aos="fade-up">
                        <h2 class="text-4xl font-black text-white uppercase tracking-tighter mb-10">Premium <span class="{{ $activeTheme['text'] }} italic">Amenities</span></h2>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                            @foreach(['Infinity Pool', 'Luxury Spa', 'Fine Dining', 'Fitness Center', 'Private Beach', '24/7 Concierge', 'Valet Parking', 'Smart Rooms'] as $amenity)
                            <div class="glass p-6 rounded-3xl border border-white/5 text-center group hover:border-{{ str_replace('text-', '', $activeTheme['text']) }}/30 transition-all duration-500">
                                <div class="w-12 h-12 bg-white/5 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-gradient-to-r {{ $activeTheme['gradient'] }} transition-colors">
                                    <svg class="w-6 h-6 text-{{ str_replace('text-', '', $activeTheme['text']) }} group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest group-hover:text-white transition-colors">{{ $amenity }}</span>
                            </div>
                            @endforeach
                        </div>
                    </section>

                    <!-- Luxury Suites Section -->
                    <section data-aos="fade-up">
                        <h2 class="text-4xl font-black text-white uppercase tracking-tighter mb-10">Luxury <span class="{{ $activeTheme['text'] }} italic">Suites</span></h2>
                        <div class="space-y-8">
                            @if($hotel->roomCategories->count())
                                @foreach($hotel->roomCategories as $category)
                                <div class="glass flex flex-col md:flex-row rounded-[3rem] overflow-hidden border border-white/5 group hover:border-{{ str_replace('text-', '', $activeTheme['text']) }}/30 transition-all duration-700">
                                    <div class="w-full md:w-1/3 h-56 md:h-auto min-h-[200px] overflow-hidden relative">
                                        <img src="https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&q=80&w=600" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000" alt="{{ $category->name }}" onerror="this.src='https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&q=80&w=600'">
                                        <div class="absolute top-4 left-4">
                                            <span class="px-3 py-1 glass rounded-xl text-[8px] font-black text-white uppercase tracking-widest border border-white/10 shadow-lg">{{ $category->rooms_available }} Rooms Left</span>
                                        </div>
                                    </div>
                                    <div class="p-8 md:p-10 flex-grow flex flex-col justify-between">
                                        <div>
                                            <div class="flex items-start justify-between gap-4 mb-2">
                                                <h4 class="text-2xl font-black text-white uppercase tracking-tighter">{{ $category->name }}</h4>
                                                <span class="text-xl font-black text-white tracking-tighter shrink-0">₹{{ number_format($category->price_per_night) }}<span class="text-[9px] text-slate-500 font-bold uppercase tracking-widest ml-1">/ Night</span></span>
                                            </div>
                                            <p class="text-xs text-slate-400 mb-6 font-medium">Bespoke comfort with premium linens, sensory lighting, and high-end sanitation protocols.</p>
                                        </div>
                                        <div class="flex items-center justify-between pt-6 border-t border-white/5">
                                            <div class="flex items-center space-x-4">
                                                <span class="inline-flex items-center text-[9px] font-black text-slate-500 uppercase tracking-widest">
                                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                                    King Bed
                                                </span>
                                                <span class="inline-flex items-center text-[9px] font-black text-slate-500 uppercase tracking-widest">
                                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"></path></svg>
                                                    WiFi
                                                </span>
                                            </div>
                                            <button type="button" onclick="selectRoomCategory({{ $category->id }}, {{ $category->price_per_night }})" class="px-5 py-2.5 rounded-xl border border-white/10 glass text-[9px] font-black uppercase tracking-widest text-white hover:bg-white/5 transition-all cursor-pointer">
                                                Select Suite
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <!-- Fallback mock cards if roomCategories doesn't exist or is empty -->
                                @foreach(['Presidential Suite', 'Deluxe Ocean Room', 'Panoramic View Room'] as $room)
                                <div class="glass flex flex-col md:flex-row rounded-[3rem] overflow-hidden border border-white/5 group hover:border-{{ str_replace('text-', '', $activeTheme['text']) }}/30 transition-all duration-700">
                                    <div class="w-full md:w-1/3 h-56 md:h-auto min-h-[200px] overflow-hidden relative">
                                        <img src="https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&q=80&w=600" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000" alt="">
                                    </div>
                                    <div class="p-8 md:p-10 flex-grow flex flex-col justify-between">
                                        <div>
                                            <div class="flex items-start justify-between gap-4 mb-2">
                                                <h4 class="text-2xl font-black text-white uppercase tracking-tighter">{{ $room }}</h4>
                                                <span class="text-xl font-black text-white tracking-tighter shrink-0">₹{{ number_format($hotel->price_per_night) }}<span class="text-[9px] text-slate-500 font-bold uppercase tracking-widest ml-1">/ Night</span></span>
                                            </div>
                                            <p class="text-xs text-slate-400 mb-6 font-medium">Experience unprecedented luxury with panoramic views and bespoke services.</p>
                                        </div>
                                        <div class="flex items-center justify-between pt-6 border-t border-white/5">
                                            <div class="flex items-center space-x-4">
                                                <span class="inline-flex items-center text-[9px] font-black text-slate-500 uppercase tracking-widest">
                                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                                    King Bed
                                                </span>
                                                <span class="inline-flex items-center text-[9px] font-black text-slate-500 uppercase tracking-widest">
                                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"></path></svg>
                                                    WiFi
                                                </span>
                                            </div>
                                            <span class="text-[9px] font-black {{ $activeTheme['text'] }} uppercase tracking-widest">Active Stay Option</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </section>

                    <!-- Other Sanctuaries Slider -->
                    <section data-aos="fade-up">
                        <h2 class="text-4xl font-black text-white uppercase tracking-tighter mb-12">Other <span class="{{ $activeTheme['text'] }} italic">Sanctuaries</span></h2>
                        <div class="swiper stay-slider overflow-visible">
                            <div class="swiper-wrapper">
                                @foreach(\App\Models\Hotel::where('id', '!=', $hotel->id)->take(4)->get() as $otherHotel)
                                <div class="swiper-slide !h-auto">
                                    <div class="glass group card-glare rounded-[3.5rem] overflow-hidden border border-white/5 h-full flex flex-col hover:border-white/10 hover:shadow-2xl transition-all duration-500">
                                        <div class="relative h-72 overflow-hidden">
                                            <img src="{{ $otherHotel->image_url }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110" alt="{{ $otherHotel->name }}">
                                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 to-transparent"></div>
                                            <div class="absolute bottom-6 left-6">
                                                <span class="px-5 py-2 glass rounded-xl text-[10px] font-black text-white uppercase tracking-widest">{{ $otherHotel->type }}</span>
                                            </div>
                                        </div>
                                        <div class="p-10 flex flex-col flex-grow">
                                            <h3 class="text-2xl font-black text-white uppercase tracking-tighter mb-4 group-hover:text-amber-500 transition-colors truncate">{{ $otherHotel->name }}</h3>
                                            <p class="text-slate-400 text-sm font-medium mb-10 flex-grow leading-relaxed">{{ Str::limit($otherHotel->description, 100) }}</p>
                                            <div class="flex items-center justify-between pt-8 border-t border-white/5 mt-auto">
                                                <div>
                                                    <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest">From</p>
                                                    <p class="text-3xl font-black text-white tracking-tighter">₹{{ number_format($otherHotel->price_per_night) }}</p>
                                                </div>
                                                <a href="{{ route('hotels.show', $otherHotel->slug) }}" class="w-16 h-16 glass rounded-2xl flex items-center justify-center text-white hover:bg-amber-600 transition-all">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination !-bottom-12"></div>
                        </div>
                    </section>

                </div>

                <!-- Right: Sticky Booking Calculator Widget -->
                <div class="w-full lg:w-1/3" id="booking-card-container">
                    <div class="sticky top-32 space-y-12" data-aos="fade-left">
                        <!-- Reservation Card -->
                        <div class="glass p-12 rounded-[4rem] border border-white/5 shadow-2xl relative overflow-hidden">
                            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r {{ $activeTheme['gradient'] }}"></div>
                            
                            <div class="mb-10 flex items-end justify-between">
                                <div>
                                    <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.3em] mb-2">Base Daily Rate</p>
                                    <h3 class="text-4xl font-black text-white tracking-tighter">₹{{ number_format($hotel->price_per_night) }} <span class="text-xs text-slate-500 uppercase tracking-widest">/ Night</span></h3>
                                </div>
                            </div>

                            <!-- Availability Badge -->
                            <div class="glass p-6 rounded-3xl border border-white/5 mb-8 flex justify-between items-center bg-slate-950/40">
                                <div>
                                    <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1">Availability</p>
                                    <p class="text-2xl font-black text-white">{{ $hotel->available_rooms }} stays left</p>
                                    <p class="text-[9px] text-slate-500 font-bold uppercase tracking-widest mt-1">Capacity: {{ $hotel->total_rooms }} rooms</p>
                                </div>
                                <span class="inline-flex items-center px-3 py-1.5 glass rounded-xl text-[9px] font-black text-white uppercase tracking-widest border border-white/10 bg-white/5">
                                    {{ round(($hotel->available_rooms / max(1, $hotel->total_rooms)) * 100) }}% Left
                                </span>
                            </div>

                            <!-- Form Wrapper -->
                            <form action="{{ route('bookings.store') }}" method="POST" id="bookingForm" class="space-y-6" 
                                x-data="hotelBooking({{ $initialPrice }})"
                                x-init="$watch('travelers', value => { if(couponCode) validateCoupon(); }); $watch('price', value => { if(couponCode) validateCoupon(); })">
                                @csrf
                                
                                @if ($errors->any())
                                <div class="glass p-6 rounded-2xl border-rose-500/20 bg-rose-500/10 mb-6 text-rose-400 text-xs font-bold space-y-2">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                        <span class="uppercase tracking-wider">Booking Action Failed</span>
                                    </div>
                                    <ul class="list-disc list-inside mt-2 space-y-1">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <input type="hidden" name="bookable_type" value="Hotel">
                                <input type="hidden" name="bookable_id" value="{{ $hotel->id }}">
                                <input type="hidden" name="nights" x-model="nights">

                                <!-- Check In / Out Dates -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="space-y-3">
                                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-2">Check-In</label>
                                        <input type="date" name="start_date" x-model="startDate" @change="calculateNights" required min="{{ date('Y-m-d') }}" class="w-full bg-white/5 border border-white/5 focus:border-{{ $activeTheme['indicator'] }}/50 text-white focus:ring-0 rounded-2xl px-4 py-4 transition-all font-bold text-xs">
                                    </div>
                                    <div class="space-y-3">
                                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-2">Check-Out</label>
                                        <input type="date" name="end_date" x-model="endDate" @change="calculateNights" required min="{{ date('Y-m-d', strtotime('+1 day')) }}" class="w-full bg-white/5 border border-white/5 focus:border-{{ $activeTheme['indicator'] }}/50 text-white focus:ring-0 rounded-2xl px-4 py-4 transition-all font-bold text-xs">
                                    </div>
                                </div>

                                <!-- Travelers Count -->
                                <div class="space-y-3">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-2">Travelers</label>
                                    <div class="flex items-center space-x-4 bg-white/5 rounded-2xl px-6 py-2 border border-white/5">
                                        <button type="button" @click="travelers = Math.max(1, travelers - 1); calculateNights();" class="w-10 h-10 flex items-center justify-center text-slate-500 hover:text-white transition-colors">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M20 12H4"></path></svg>
                                        </button>
                                        <input type="number" name="travelers" x-model="travelers" @input="calculateNights(); validateCoupon();" min="1" max="10" class="flex-grow bg-transparent border-none text-center text-xl font-black text-white focus:ring-0">
                                        <button type="button" @click="travelers = Math.min(10, travelers + 1); calculateNights();" class="w-10 h-10 flex items-center justify-center text-slate-500 hover:text-white transition-colors">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                        </button>
                                    </div>
                                </div>

                                <!-- Coupon Code -->
                                <div class="space-y-3">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-2">Coupon Code</label>
                                    <div class="relative">
                                        <input type="text" name="coupon_code" x-model="couponCode" @input.debounce.500ms="validateCoupon" class="w-full bg-white/5 border border-white/5 rounded-2xl px-6 py-4 text-white focus:ring-0 focus:border-{{ $activeTheme['indicator'] }}/50 transition-all font-bold placeholder-slate-650 uppercase" placeholder="SUMMER25">
                                        <button type="button" @click="validateCoupon" class="absolute right-2 top-2 bottom-2 bg-gradient-to-r {{ $activeTheme['gradient'] }} hover:opacity-95 text-white text-[9px] font-black uppercase tracking-widest px-5 rounded-xl transition-all shadow-md" x-text="isValidatingCoupon ? '...' : 'Apply'"></button>
                                    </div>
                                    <p x-show="couponMessage" :class="couponValid ? 'text-emerald-500' : 'text-rose-500'" class="text-[10px] font-bold px-2 mt-2 uppercase tracking-widest" x-text="couponMessage" style="display: none;"></p>
                                </div>

                                <!-- Room Category Select -->
                                @if($hotel->roomCategories->count())
                                <div class="space-y-3">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-2">Room Category</label>
                                    <select id="room-category-select" name="room_category_id" @change="price = parseFloat($event.target.selectedOptions[0].dataset.rate); validateCoupon();" class="w-full bg-white/5 border border-white/5 rounded-2xl px-6 py-4 text-white focus:ring-0 focus:border-{{ $activeTheme['indicator'] }}/50 transition-all font-bold text-xs select-custom">
                                        @foreach($hotel->roomCategories as $category)
                                            <option value="{{ $category->id }}" data-rate="{{ $category->price_per_night }}" class="bg-slate-950 text-white">
                                                {{ $category->name }} - ₹{{ number_format($category->price_per_night) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif

                                <!-- Dynamic Price Summary -->
                                <div class="glass p-6 rounded-3xl border border-white/5 space-y-4 my-6 bg-slate-950/40">
                                    <div class="flex justify-between text-xs font-bold text-slate-400">
                                        <span>Rate per night</span>
                                        <span class="text-white" x-text="'₹' + price.toLocaleString('en-IN')"></span>
                                    </div>
                                    <div class="flex justify-between text-xs font-bold text-slate-400">
                                        <span>Nights</span>
                                        <span class="text-white" x-text="nights"></span>
                                    </div>
                                    <div class="flex justify-between text-xs font-bold text-slate-400">
                                        <span>Rooms Needed</span>
                                        <span class="text-white" x-text="roomsNeeded"></span>
                                    </div>
                                    <div x-show="discountAmount > 0" style="display: none;" class="flex justify-between text-xs font-bold text-emerald-400">
                                        <span>Discount</span>
                                        <span x-text="'-₹' + discountAmount.toLocaleString('en-IN')"></span>
                                    </div>
                                    <div class="flex justify-between text-xs font-bold text-slate-400">
                                        <span>Taxes (18%)</span>
                                        <span class="text-white" x-text="'₹' + taxAmount.toLocaleString('en-IN')"></span>
                                    </div>
                                    <div class="border-t border-white/10 pt-4 flex justify-between items-end">
                                        <span class="text-xs font-black text-white uppercase tracking-widest">Total</span>
                                        <span class="text-2xl font-black text-white" x-text="'₹' + grandTotal.toLocaleString('en-IN')"></span>
                                    </div>
                                </div>

                                <!-- Reserve Button -->
                                @auth
                                <button type="submit" class="w-full py-5 text-xs font-black uppercase tracking-widest flex items-center justify-center space-x-3 bg-gradient-to-r {{ $activeTheme['gradient'] }} text-white hover:opacity-95 rounded-2xl transition-all shadow-xl">
                                    <span>Reserve Your Stay</span>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </button>
                                @else
                                <a href="{{ route('login') }}" class="w-full py-5 text-xs font-black uppercase tracking-widest flex items-center justify-center space-x-3 bg-gradient-to-r {{ $activeTheme['gradient'] }} text-white hover:opacity-95 rounded-2xl transition-all shadow-xl text-center">
                                    <span>Login to Reserve</span>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                                @endauth
                            </form>

                            <!-- Wishlist Toggle -->
                            @auth
                            <button onclick="toggleWishlist('Hotel', {{ $hotel->id }}, this)" type="button" class="w-full mt-4 glass py-4 rounded-2xl text-center text-xs font-black uppercase tracking-widest hover:text-rose-500 transition-colors flex items-center justify-center space-x-2 border border-white/5 {{ Auth::user()->wishlist()->where('wishable_type', 'Hotel')->where('wishable_id', $hotel->id)->exists() ? 'text-rose-500' : 'text-slate-500' }}">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"></path></svg>
                                <span>{{ Auth::user()->wishlist()->where('wishable_type', 'Hotel')->where('wishable_id', $hotel->id)->exists() ? 'Remove from Favorites' : 'Add to Favorites' }}</span>
                            </button>
                            @endauth
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Interactive Lightbox & Room Selection Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Swiper('.stay-slider', {
                slidesPerView: 1,
                spaceBetween: 30,
                pagination: { el: '.swiper-pagination', clickable: true },
                breakpoints: {
                    640: { slidesPerView: 1.5 },
                    1024: { slidesPerView: 2 },
                }
            });
        });

        function selectRoomCategory(id, rate) {
            const select = document.getElementById('room-category-select');
            if (select) {
                select.value = id;
                select.dispatchEvent(new Event('change', { bubbles: true }));
                document.getElementById('booking-card-container').scrollIntoView({ behavior: 'smooth' });
            }
        }
    </script>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('hotelBooking', (price) => ({
                price: price,
                travelers: 1,
                startDate: '',
                endDate: '',
                nights: 1,
                couponCode: '',
                discountAmount: 0,
                isValidatingCoupon: false,
                couponMessage: '',
                couponValid: false,
                
                calculateNights() {
                    if (this.startDate && this.endDate) {
                        const start = new Date(this.startDate);
                        const end = new Date(this.endDate);
                        const diffTime = Math.abs(end - start);
                        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                        this.nights = diffDays > 0 ? diffDays : 1;
                        this.validateCoupon();
                    }
                },
                
                get roomsNeeded() {
                    return Math.max(1, Math.ceil(this.travelers / 2));
                },
                get baseTotal() {
                    return this.price * this.nights * this.roomsNeeded;
                },
                get subtotal() {
                    return Math.max(0, this.baseTotal - this.discountAmount);
                },
                get taxAmount() {
                    return this.subtotal * 0.18;
                },
                get grandTotal() {
                    return this.subtotal + this.taxAmount;
                },
                
                validateCoupon() {
                    if(!this.couponCode) {
                        this.discountAmount = 0;
                        this.couponMessage = '';
                        this.couponValid = false;
                        return;
                    }
                    
                    this.isValidatingCoupon = true;
                    this.couponMessage = 'Validating...';
                    
                    fetch('{{ route('coupons.validate') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]') ? document.querySelector('meta[name="csrf-token"]').content : '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            code: this.couponCode,
                            amount: this.baseTotal
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        this.isValidatingCoupon = false;
                        if(data.valid) {
                            this.discountAmount = data.discount;
                            this.couponValid = true;
                            this.couponMessage = data.message;
                        } else {
                            this.discountAmount = 0;
                            this.couponValid = false;
                            this.couponMessage = data.message;
                        }
                    })
                    .catch(error => {
                        this.isValidatingCoupon = false;
                        this.discountAmount = 0;
                        this.couponValid = false;
                        this.couponMessage = 'Error validating coupon';
                    });
                }
            }))
        });
    </script>

    @auth
    <script>
        function toggleWishlist(type, id, btn) {
            fetch("{{ route('wishlist.toggle') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ wishable_type: type, wishable_id: id })
            })
            .then(res => res.json())
            .then(data => {
                const span = btn.querySelector('span');
                span.textContent = data.status === 'added' ? 'Remove from Favorites' : 'Add to Favorites';
                btn.classList.toggle('text-rose-500', data.status === 'added');
            });
        }
    </script>
    @endauth

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
