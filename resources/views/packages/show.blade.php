<x-app-layout>
    @php
        $pkgCat = $package->category;

        $themeColors = [
            'Adventure' => [
                'text' => 'text-rose-500',
                'bg' => 'bg-rose-500',
                'border' => 'border-rose-500/20',
                'glow' => 'bg-rose-600/5',
                'badge_text' => 'text-rose-400',
                'badge_border' => 'border-rose-500/20',
                'scroll_dot' => 'bg-rose-500',
                'indicator' => 'text-rose-500',
                'heading_text' => 'text-rose-500',
                'heading_via' => 'via-rose-600',
                'shadow' => 'shadow-rose-500/10',
                'btn_bg' => 'from-rose-600 to-red-600 shadow-rose-600/20 hover:from-rose-500 hover:to-red-500',
                'focus_input' => 'focus-within:border-rose-500/50 focus-within:shadow-[0_0_25px_rgba(244,63,94,0.2)]',
                'focus_input_direct' => 'focus:ring-rose-500 focus:border-rose-500',
                'gradient' => 'from-rose-600 to-red-600 shadow-rose-600/30',
                'title_gradient' => 'from-rose-400 via-red-400 to-rose-500',
            ],
            'Family' => [
                'text' => 'text-blue-500',
                'bg' => 'bg-blue-500',
                'border' => 'border-blue-500/20',
                'glow' => 'bg-blue-600/5',
                'badge_text' => 'text-blue-400',
                'badge_border' => 'border-blue-500/20',
                'scroll_dot' => 'bg-blue-500',
                'indicator' => 'text-blue-500',
                'heading_text' => 'text-blue-500',
                'heading_via' => 'via-blue-600',
                'shadow' => 'shadow-blue-500/10',
                'btn_bg' => 'from-blue-600 to-indigo-600 shadow-blue-600/20 hover:from-blue-500 hover:to-indigo-500',
                'focus_input' => 'focus-within:border-blue-500/50 focus-within:shadow-[0_0_25px_rgba(59,130,246,0.2)]',
                'focus_input_direct' => 'focus:ring-blue-500 focus:border-blue-500',
                'gradient' => 'from-blue-600 to-indigo-600 shadow-blue-600/30',
                'title_gradient' => 'from-blue-400 via-indigo-400 to-blue-500',
            ],
            'Honeymoon' => [
                'text' => 'text-pink-500',
                'bg' => 'bg-pink-500',
                'border' => 'border-pink-500/20',
                'glow' => 'bg-pink-600/5',
                'badge_text' => 'text-pink-400',
                'badge_border' => 'border-pink-500/20',
                'scroll_dot' => 'bg-pink-500',
                'indicator' => 'text-pink-500',
                'heading_text' => 'text-pink-500',
                'heading_via' => 'via-pink-600',
                'shadow' => 'shadow-pink-500/10',
                'btn_bg' => 'from-pink-600 to-rose-600 shadow-pink-600/20 hover:from-pink-500 hover:to-rose-500',
                'focus_input' => 'focus-within:border-pink-500/50 focus-within:shadow-[0_0_25px_rgba(236,72,153,0.2)]',
                'focus_input_direct' => 'focus:ring-pink-500 focus:border-pink-500',
                'gradient' => 'from-pink-600 to-rose-600 shadow-pink-600/30',
                'title_gradient' => 'from-pink-400 via-rose-400 to-pink-500',
            ],
            'Budget' => [
                'text' => 'text-amber-500',
                'bg' => 'bg-amber-500',
                'border' => 'border-amber-500/20',
                'glow' => 'bg-amber-600/5',
                'badge_text' => 'text-amber-400',
                'badge_border' => 'border-amber-500/20',
                'scroll_dot' => 'bg-amber-500',
                'indicator' => 'text-amber-500',
                'heading_text' => 'text-amber-500',
                'heading_via' => 'via-amber-600',
                'shadow' => 'shadow-amber-500/10',
                'btn_bg' => 'from-amber-600 to-yellow-600 shadow-amber-600/20 hover:from-amber-500 hover:to-yellow-500',
                'focus_input' => 'focus-within:border-amber-500/50 focus-within:shadow-[0_0_25px_rgba(245,158,11,0.2)]',
                'focus_input_direct' => 'focus:ring-amber-500 focus:border-amber-500',
                'gradient' => 'from-amber-600 to-yellow-600 shadow-amber-600/30',
                'title_gradient' => 'from-amber-400 via-yellow-400 to-amber-500',
            ],
            'Premium' => [
                'text' => 'text-purple-500',
                'bg' => 'bg-purple-500',
                'border' => 'border-purple-500/20',
                'glow' => 'bg-purple-600/5',
                'badge_text' => 'text-purple-400',
                'badge_border' => 'border-purple-500/20',
                'scroll_dot' => 'bg-purple-500',
                'indicator' => 'text-purple-500',
                'heading_text' => 'text-purple-500',
                'heading_via' => 'via-purple-600',
                'shadow' => 'shadow-purple-500/10',
                'btn_bg' => 'from-purple-600 to-indigo-600 shadow-purple-600/20 hover:from-purple-500 hover:to-indigo-500',
                'focus_input' => 'focus-within:border-purple-500/50 focus-within:shadow-[0_0_25px_rgba(168,85,247,0.2)]',
                'focus_input_direct' => 'focus:ring-purple-500 focus:border-purple-500',
                'gradient' => 'from-purple-600 to-indigo-600 shadow-purple-600/30',
                'title_gradient' => 'from-purple-400 via-indigo-400 to-purple-500',
            ],
        ];

        $defaultColorTheme = [
            'text' => 'text-emerald-500',
            'bg' => 'bg-emerald-500',
            'border' => 'border-emerald-500/20',
            'glow' => 'bg-emerald-600/5',
            'badge_text' => 'text-emerald-400',
            'badge_border' => 'border-emerald-400/25',
            'scroll_dot' => 'bg-emerald-500',
            'indicator' => 'text-emerald-500',
            'heading_text' => 'text-emerald-500',
            'heading_via' => 'via-emerald-600',
            'shadow' => 'shadow-emerald-500/10',
            'btn_bg' => 'from-emerald-600 to-teal-600 shadow-emerald-600/20 hover:from-emerald-500 hover:to-teal-500',
            'focus_input' => 'focus-within:border-emerald-500/50 focus-within:shadow-[0_0_25px_rgba(16,185,129,0.2)]',
            'focus_input_direct' => 'focus:ring-emerald-500 focus:border-emerald-500',
            'gradient' => 'from-emerald-600 to-teal-600 shadow-emerald-600/30',
            'title_gradient' => 'from-emerald-400 via-teal-400 to-emerald-500',
        ];

        $activeTheme = $themeColors[$pkgCat] ?? $defaultColorTheme;
    @endphp

    <!-- Cinematic Header -->
    <div class="relative h-[80vh] overflow-hidden">
        <img src="{{ $package->image_url }}" class="w-full h-full object-cover animate-slow-zoom" alt="{{ $package->name }}" onerror="this.src='https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&q=80&w=2000'">
        <!-- Dark ambient overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/20 to-transparent"></div>
        <div class="absolute inset-0 {{ $activeTheme['glow'] }} backdrop-blur-[1px]"></div>

        <!-- Floating Glass Back Button -->
        <a href="{{ route('packages.index') }}" class="absolute top-8 left-8 z-30 inline-flex items-center space-x-3 px-5 py-2.5 glass rounded-full text-[10px] font-black uppercase tracking-widest text-white hover:{{ $activeTheme['text'] }} transition-all duration-300 shadow-lg border border-white/5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            <span>Back to Expeditions</span>
        </a>

        <!-- Content Overlay -->
        <div class="absolute inset-0 flex items-center justify-center text-center px-4">
            <div data-aos="zoom-in">
                <span class="inline-block px-6 py-2 glass rounded-full text-[10px] font-black uppercase tracking-[0.5em] {{ $activeTheme['text'] }} {{ $activeTheme['border'] }} mb-8">{{ $package->category }} Expedition</span>
                <h1 class="text-5xl md:text-8xl font-black text-white uppercase tracking-tighter mb-8 leading-none max-w-4xl mx-auto">{{ $package->name }}</h1>
                
                <div class="flex items-center justify-center space-x-8">
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 {{ $activeTheme['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="text-xs font-black text-white uppercase tracking-widest">{{ $package->duration_days }} Days / {{ $package->duration_days - 1 }} Nights</span>
                    </div>
                    <div class="w-px h-6 bg-white/20"></div>
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 {{ $activeTheme['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                        <span class="text-xs font-black text-white uppercase tracking-widest">{{ $package->destination->name ?? 'Global Gateway' }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bouncing Scroll Down Indicator -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 flex flex-col items-center hover:opacity-80 transition-opacity">
            <span class="text-[8px] font-black uppercase tracking-[0.3em] text-slate-500 mb-2">Scroll to explore</span>
            <div class="w-6 h-10 border border-white/20 rounded-full p-1 flex justify-center">
                <div class="w-1.5 h-2.5 {{ $activeTheme['scroll_dot'] }} rounded-full animate-bounce"></div>
            </div>
        </div>
    </div>

    <!-- Main Container -->
    <div class="max-w-7xl mx-auto px-4 py-24">
        <div class="flex flex-col lg:flex-row gap-20">
            <!-- Left: Journey Details -->
            <div class="w-full lg:w-2/3 space-y-24">
                
                <!-- Overview -->
                <section data-aos="fade-up">
                    <h2 class="text-4xl font-black text-white uppercase tracking-tighter mb-8">The <span class="{{ $activeTheme['text'] }} italic">Narrative</span></h2>
                    <p class="text-xl text-slate-400 font-medium leading-relaxed mb-12">{{ $package->description }}</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="glass p-8 rounded-[2.5rem] border border-white/5 hover:border-white/10 transition-all duration-300">
                            <span class="text-[10px] font-black {{ $activeTheme['text'] }} uppercase tracking-widest mb-2 block">Duration</span>
                            <p class="text-white font-bold uppercase tracking-widest">{{ $package->duration_days }} Days / {{ $package->duration_days - 1 }} Nights</p>
                        </div>
                        <div class="glass p-8 rounded-[2.5rem] border border-white/5 hover:border-white/10 transition-all duration-300">
                            <span class="text-[10px] font-black {{ $activeTheme['text'] }} uppercase tracking-widest mb-2 block">Expedition Category</span>
                            <p class="text-white font-bold uppercase tracking-widest">{{ $package->category }}</p>
                        </div>
                        <div class="glass p-8 rounded-[2.5rem] border border-white/5 hover:border-white/10 transition-all duration-300">
                            <span class="text-[10px] font-black {{ $activeTheme['text'] }} uppercase tracking-widest mb-2 block">Available Seats</span>
                            <p class="text-white font-bold uppercase tracking-widest">{{ $package->available_seats }} / {{ $package->total_seats }} Left</p>
                        </div>
                    </div>
                </section>

                <!-- Interactive Photo Gallery with Alpine Lightbox -->
                @if($package->images)
                <section data-aos="fade-up" x-data="{ isOpen: false, activeImg: '' }">
                    <h2 class="text-4xl font-black text-white uppercase tracking-tighter mb-12">Visual <span class="{{ $activeTheme['text'] }} italic">Journey</span></h2>
                    
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                        @foreach(json_decode($package->images, true) as $img)
                            <div class="h-56 overflow-hidden rounded-[2.5rem] border border-white/5 hover:border-white/10 transition-all duration-300">
                                <img src="{{ asset($img) }}" @click="activeImg = '{{ asset($img) }}'; isOpen = true" class="w-full h-full object-cover hover:scale-110 transition-transform duration-700 cursor-pointer" alt="Package Image">
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

                <!-- Interactive Itinerary -->
                <section data-aos="fade-up">
                    <h2 class="text-4xl font-black text-white uppercase tracking-tighter mb-16">The <span class="{{ $activeTheme['text'] }} italic">Expedition Path</span></h2>
                    
                    <div class="space-y-0 relative">
                        <div class="absolute left-6 top-0 bottom-0 w-px bg-gradient-to-b {{ $activeTheme['text'] }} to-transparent"></div>
                        @if(is_array($package->itinerary))
                            @foreach($package->itinerary as $i => $day)
                            <div class="relative pl-24 pb-16 group" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                                <!-- Day Dot -->
                                <div class="absolute left-0 w-12 h-12 glass rounded-2xl flex items-center justify-center border border-white/10 group-hover:bg-slate-900 group-hover:border-{{ $activeTheme['text'] }} transition-all z-10">
                                    <span class="text-xs font-black text-white group-hover:{{ $activeTheme['text'] }}">{{ $i + 1 }}</span>
                                </div>
                                <!-- Itinerary Box -->
                                <div class="glass p-10 rounded-[3rem] border border-white/5 group-hover:border-white/10 shadow-lg {{ $activeTheme['shadow'] }} transition-all duration-500">
                                    <span class="text-[9px] font-black {{ $activeTheme['text'] }} uppercase tracking-widest mb-2 block">Day {{ $i + 1 }}</span>
                                    <h4 class="text-xl font-black text-white uppercase tracking-tighter">{{ $day }}</h4>
                                </div>
                            </div>
                            @endforeach
                        @else
                            @for($i=1; $i<=$package->duration_days; $i++)
                            <div class="relative pl-24 pb-16 group" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                                <!-- Day Dot -->
                                <div class="absolute left-0 w-12 h-12 glass rounded-2xl flex items-center justify-center border border-white/10 group-hover:bg-slate-900 group-hover:border-{{ $activeTheme['text'] }} transition-all z-10">
                                    <span class="text-xs font-black text-white group-hover:{{ $activeTheme['text'] }}">{{ $i }}</span>
                                </div>
                                <!-- Itinerary Box -->
                                <div class="glass p-10 rounded-[3rem] border border-white/5 group-hover:border-white/10 shadow-lg {{ $activeTheme['shadow'] }} transition-all duration-500">
                                    <span class="text-[9px] font-black {{ $activeTheme['text'] }} uppercase tracking-widest mb-2 block">Day {{ $i }}</span>
                                    <h4 class="text-xl font-black text-white uppercase tracking-tighter">
                                        @if($i==1) Arrival & Luxury Transfer @elseif($i==$package->duration_days) Final Farewell @else Guided Expedition {{ $i }} @endif
                                    </h4>
                                </div>
                            </div>
                            @endfor
                        @endif
                    </div>
                </section>

                <!-- Inclusions / Exclusions -->
                <section data-aos="fade-up">
                    <div class="glass p-16 rounded-[4rem] border border-white/5 relative overflow-hidden">
                        <div class="absolute -right-24 -bottom-24 w-72 h-72 rounded-full {{ $activeTheme['glow'] }} blur-3xl opacity-30 pointer-events-none"></div>
                        <h2 class="text-4xl font-black text-white uppercase tracking-tighter mb-12">Expedition <span class="{{ $activeTheme['text'] }} italic">Inclusions</span></h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <!-- Inclusions List -->
                            <ul class="space-y-6">
                                @php $inclusions = is_array($package->inclusions) ? $package->inclusions : ['Luxury Accommodation', 'All Meals', 'Private Guide', 'Premium Transport', 'Travel Insurance']; @endphp
                                @foreach($inclusions as $inc)
                                <li class="flex items-center space-x-4">
                                    <div class="w-6 h-6 bg-emerald-600/20 rounded-lg flex items-center justify-center text-emerald-500 shrink-0">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                    </div>
                                    <span class="text-xs font-black text-white uppercase tracking-widest">{{ $inc }}</span>
                                </li>
                                @endforeach
                            </ul>
                            <!-- Exclusions List -->
                            <ul class="space-y-6 opacity-40">
                                @foreach(['International Flights', 'Personal Shopping', 'Spa Premium Upgrades'] as $exc)
                                <li class="flex items-center space-x-4">
                                    <div class="w-6 h-6 bg-white/5 rounded-lg flex items-center justify-center text-slate-500 shrink-0">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    </div>
                                    <span class="text-xs font-black text-slate-400 uppercase tracking-widest line-through">{{ $exc }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </section>

                <!-- Other Expeditions Slider -->
                <section data-aos="fade-up">
                    <h2 class="text-4xl font-black text-white uppercase tracking-tighter mb-12">Other <span class="{{ $activeTheme['text'] }} italic">Expeditions</span></h2>
                    <div class="swiper tour-slider overflow-visible">
                        <div class="swiper-wrapper">
                            @foreach(\App\Models\TourPackage::where('id', '!=', $package->id)->take(4)->get() as $otherPkg)
                            <div class="swiper-slide !h-auto">
                                <div class="glass group card-glare rounded-[3.5rem] overflow-hidden border border-white/5 h-full flex flex-col hover:border-white/10 hover:shadow-2xl transition-all duration-500">
                                    <div class="relative h-72 overflow-hidden">
                                        <img src="{{ $otherPkg->image_url }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110" alt="{{ $otherPkg->name }}">
                                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 to-transparent"></div>
                                        <div class="absolute bottom-6 left-6">
                                            <span class="px-5 py-2 glass rounded-xl text-[10px] font-black text-white uppercase tracking-widest">{{ $otherPkg->duration_days }} Days Expedition</span>
                                        </div>
                                    </div>
                                    <div class="p-10 flex flex-col flex-grow">
                                        <h3 class="text-2xl font-black text-white uppercase tracking-tighter mb-4 group-hover:text-blue-600 transition-colors truncate">{{ $otherPkg->name }}</h3>
                                        <p class="text-slate-400 text-sm font-medium mb-10 flex-grow leading-relaxed">{{ Str::limit($otherPkg->description, 100) }}</p>
                                        <div class="flex items-center justify-between pt-8 border-t border-white/5 mt-auto">
                                            <div>
                                                <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest">From</p>
                                                <p class="text-3xl font-black text-white tracking-tighter">₹{{ number_format($otherPkg->price) }}</p>
                                            </div>
                                            <a href="{{ route('packages.show', $otherPkg->slug) }}" class="w-16 h-16 glass rounded-2xl flex items-center justify-center text-white hover:bg-emerald-600 transition-all">
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

            <!-- Right: Sticky Booking Widget -->
            <div class="w-full lg:w-1/3">
                <div class="sticky top-32 space-y-12" data-aos="fade-left">
                    <!-- Reservation Card -->
                    <div class="glass p-12 rounded-[4rem] border border-white/5 shadow-2xl relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r {{ $activeTheme['gradient'] }}"></div>
                        
                        <div class="mb-10">
                            <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.3em] mb-2">Total Investment</p>
                            <h3 class="text-4xl font-black text-white tracking-tighter">₹{{ number_format($package->price) }} <span class="text-sm text-slate-500 uppercase tracking-widest">/ pp</span></h3>
                        </div>

                        <!-- Availability Badge -->
                        <div class="glass p-6 rounded-3xl border border-white/5 mb-8 flex justify-between items-center bg-slate-950/40">
                            <div>
                                <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1">Seats Available</p>
                                <p class="text-2xl font-black text-white">{{ $package->available_seats }} / {{ $package->total_seats }}</p>
                            </div>
                            <span class="inline-flex items-center px-3 py-1.5 glass rounded-xl text-[9px] font-black text-white uppercase tracking-widest border {{ $activeTheme['badge_border'] }} bg-white/5">
                                {{ round(($package->available_seats / $package->total_seats) * 100) }}% Left
                            </span>
                        </div>

                        <!-- Form Wrapper -->
                        <form action="{{ route('bookings.store') }}" method="POST" id="bookingForm" class="space-y-6" 
                            x-data="{ 
                                travelers: 1, 
                                price: {{ $package->price }},
                                couponCode: '',
                                discountAmount: 0,
                                taxes: 0,
                                isValidatingCoupon: false,
                                couponMessage: '',
                                couponValid: false,
                                
                                get subtotal() {
                                    return Math.max(0, (this.travelers * this.price) - this.discountAmount);
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
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                        },
                                        body: JSON.stringify({
                                            code: this.couponCode,
                                            amount: this.travelers * this.price
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
                            }"
                            x-init="$watch('travelers', value => { if(couponCode) validateCoupon(); })">
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

                            <input type="hidden" name="bookable_type" value="TourPackage">
                            <input type="hidden" name="bookable_id" value="{{ $package->id }}">

                            <!-- Start Date -->
                            <div class="space-y-3">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-2">Expedition Start</label>
                                <input type="date" name="start_date" required min="{{ date('Y-m-d') }}" class="w-full bg-white/5 border border-white/5 focus:border-{{ $activeTheme['indicator'] }}/50 text-white focus:ring-0 rounded-2xl px-6 py-4 transition-all font-bold">
                            </div>

                            <!-- Travelers Count -->
                            <div class="space-y-3">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-2">Explorers Count</label>
                                <div class="flex items-center space-x-4 bg-white/5 rounded-2xl px-6 py-2 border border-white/5">
                                    <button type="button" @click="travelers = Math.max(1, travelers - 1)" class="w-10 h-10 flex items-center justify-center text-slate-500 hover:text-white transition-colors">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M20 12H4"></path></svg>
                                    </button>
                                    <input type="number" name="travelers" x-model="travelers" min="1" max="10" class="flex-grow bg-transparent border-none text-center text-xl font-black text-white focus:ring-0">
                                    <button type="button" @click="travelers = Math.min(10, travelers + 1)" class="w-10 h-10 flex items-center justify-center text-slate-500 hover:text-white transition-colors">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                    </button>
                                </div>
                            </div>

                            <!-- Coupon Code -->
                            <div class="space-y-3">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-2">Coupon Code</label>
                                <div class="relative">
                                    <input type="text" name="coupon_code" x-model="couponCode" @change="validateCoupon" class="w-full bg-white/5 border border-white/5 rounded-2xl px-6 py-4 text-white focus:ring-0 focus:border-{{ $activeTheme['indicator'] }}/50 transition-all font-bold placeholder-slate-600" placeholder="TRAVEL20">
                                    <button type="button" @click="validateCoupon" class="absolute right-2 top-2 bottom-2 bg-gradient-to-r {{ $activeTheme['gradient'] }} hover:opacity-95 text-white text-[9px] font-black uppercase tracking-widest px-5 rounded-xl transition-all shadow-md" x-text="isValidatingCoupon ? '...' : 'Apply'"></button>
                                </div>
                                <p x-show="couponMessage" :class="couponValid ? 'text-emerald-500' : 'text-rose-500'" class="text-xs font-bold px-2" x-text="couponMessage" style="display: none;"></p>
                            </div>

                            <!-- Dynamic Pricing Table -->
                            <div class="glass p-6 rounded-3xl border border-white/5 space-y-4 my-6 bg-slate-950/40">
                                <div class="flex justify-between text-xs font-bold text-slate-400">
                                    <span>Base Package <span x-text="'(x'+travelers+')'"></span></span>
                                    <span class="text-white" x-text="'₹' + (travelers * price).toLocaleString('en-IN')"></span>
                                </div>
                                
                                <div x-show="discountAmount > 0" style="display: none;" class="flex justify-between text-xs font-bold text-emerald-400">
                                    <span>Coupon Discount</span>
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

                            <!-- Buttons -->
                            @auth
                            <button type="submit" class="w-full py-5 text-xs font-black uppercase tracking-widest flex items-center justify-center space-x-3 bg-gradient-to-r {{ $activeTheme['gradient'] }} text-white hover:opacity-95 rounded-2xl transition-all shadow-xl">
                                <span>Reserve Expedition</span>
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
                        <button onclick="toggleWishlist('TourPackage', {{ $package->id }}, this)" class="w-full mt-4 glass py-4 rounded-2xl text-center text-xs font-black text-slate-500 uppercase tracking-widest hover:text-rose-500 transition-colors flex items-center justify-center space-x-2 border border-white/5">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                            <span>Add to Wishlist</span>
                        </button>
                        @endauth
                    </div>

                    <!-- Popular Destinations Hub -->
                    <div class="glass p-10 rounded-[3rem] border border-white/5">
                        <h4 class="text-xs font-black text-white uppercase tracking-widest mb-8">Popular Destinations</h4>
                        <div class="space-y-6">
                            @foreach(\App\Models\Destination::take(3)->get() as $dest)
                            <a href="{{ route('destinations.show', $dest->slug) }}" class="flex items-center space-x-4 group">
                                <div class="w-16 h-16 rounded-2xl overflow-hidden flex-shrink-0">
                                    <img src="{{ $dest->image_url }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="{{ $dest->name }}">
                                </div>
                                <div class="flex-grow">
                                    <h5 class="text-sm font-black text-white uppercase tracking-tighter group-hover:text-emerald-500 transition-colors">{{ $dest->name }}</h5>
                                    <p class="text-[9px] font-black text-slate-600 uppercase tracking-widest">Explore Destination</p>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Swiper and Wishlist Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Swiper('.tour-slider', {
                slidesPerView: 1,
                spaceBetween: 30,
                pagination: { el: '.swiper-pagination', clickable: true },
                breakpoints: {
                    640: { slidesPerView: 1.5 },
                    1024: { slidesPerView: 2 },
                }
            });
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
                span.textContent = data.status === 'added' ? 'Remove from Wishlist' : 'Add to Wishlist';
                btn.classList.toggle('text-rose-500', data.status === 'added');
            });
        }
    </script>
    @endauth
</x-app-layout>
