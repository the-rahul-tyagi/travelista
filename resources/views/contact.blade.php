<x-app-layout>
    <div class="min-h-screen bg-slate-950 pt-48 pb-32 relative overflow-hidden" x-data="{ 
        name: '{{ old('name') }}', 
        email: '{{ old('email') }}', 
        subject: '{{ old('subject') }}', 
        message: '{{ old('message') }}',
        nameValid() { return this.name.trim().length >= 3; },
        emailValid() { return this.email.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/); },
        subjectValid() { return this.subject.trim().length >= 3; },
        messageValid() { return this.message.trim().length >= 10; },
        get charsLeft() { return 500 - this.message.length; }
    }">
        <!-- Background Decor -->
        <div class="absolute top-0 right-0 w-full h-full bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-20 pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <div class="text-center mb-20" data-aos="fade-down">
                <span class="text-[11px] font-black uppercase tracking-[0.6em] text-blue-500 mb-6 block">Concierge Desk</span>
                <h1 class="text-5xl md:text-7xl font-black text-white uppercase tracking-tighter leading-tight mb-6">Get In <span class="text-blue-600 italic">Touch</span></h1>
                <p class="text-lg text-slate-400 max-w-2xl mx-auto font-medium">Our expert travel curators are available 24/7 to help you design your perfect luxury escape.</p>
            </div>

            <!-- Top Section: Contact Info & Form -->
            <div class="flex flex-col lg:flex-row gap-12 mb-32">
                <!-- Contact Info Cards & Online Curators -->
                <div class="w-full lg:w-1/3 space-y-6" data-aos="fade-right">
                    
                    <!-- Direct Line -->
                    <div class="glass p-8 rounded-[2.5rem] border-white/5 group hover:border-blue-600/30 transition-all duration-500 flex items-center space-x-6">
                        <div class="w-12 h-12 bg-blue-600/10 text-blue-500 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-blue-600 group-hover:text-white transition-all shadow-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-black text-white mb-1 uppercase tracking-tighter">Direct Line</h4>
                            <p class="text-slate-400 text-xs font-bold tracking-widest">+1 (888) TRAVEL-LUXE</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="glass p-8 rounded-[2.5rem] border-white/5 group hover:border-purple-600/30 transition-all duration-500 flex items-center space-x-6">
                        <div class="w-12 h-12 bg-purple-600/10 text-purple-500 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-purple-600 group-hover:text-white transition-all shadow-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-black text-white mb-1 uppercase tracking-tighter">Global Email</h4>
                            <a href="mailto:contactus@travelista.com" class="text-slate-400 text-xs font-bold tracking-widest hover:text-purple-400 transition-colors">contactus@travelista.com</a>
                        </div>
                    </div>

                    <!-- Premium Active Curators Desk -->
                    <div class="glass p-8 rounded-[2.5rem] border-white/5 space-y-6">
                        <div class="flex items-center justify-between pb-2 border-b border-white/5">
                            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Active Curators</p>
                            <span class="flex h-2 w-2 relative">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                            </span>
                        </div>
                        
                        <div class="space-y-4">
                            <!-- Aditya Verma -->
                            <div @click="subject = 'Elite expedition inquiry with Aditya Verma'; $nextTick(() => document.getElementById('subject-field').focus())"
                                 class="p-4 rounded-2xl bg-white/[0.02] border border-white/5 cursor-pointer hover:border-blue-500/40 hover:bg-blue-600/[0.03] transition-all duration-300 flex items-center justify-between group">
                                <div class="flex items-center space-x-3">
                                    <div class="relative">
                                        <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-blue-600 to-indigo-600 flex items-center justify-center text-white font-black text-xs shadow-md">
                                            AV
                                        </div>
                                        <span class="absolute -bottom-1 -right-1 w-2.5 h-2.5 bg-emerald-500 border-2 border-slate-950 rounded-full"></span>
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-black text-white group-hover:text-blue-400 transition-colors uppercase tracking-tight">Aditya Verma</h4>
                                        <p class="text-[9px] text-slate-400 font-bold uppercase tracking-wider">Highlands & North</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="px-2 py-0.5 bg-blue-600/10 border border-blue-500/20 rounded-lg text-[8px] font-black text-blue-400 uppercase tracking-widest group-hover:bg-blue-600 group-hover:text-white transition-all">Select</span>
                                </div>
                            </div>

                            <!-- Suraj Kumar -->
                            <div @click="subject = 'Coastal Curation package by Suraj Kumar'; $nextTick(() => document.getElementById('subject-field').focus())"
                                 class="p-4 rounded-2xl bg-white/[0.02] border border-white/5 cursor-pointer hover:border-purple-500/40 hover:bg-purple-600/[0.03] transition-all duration-300 flex items-center justify-between group">
                                <div class="flex items-center space-x-3">
                                    <div class="relative">
                                        <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-purple-600 to-indigo-600 flex items-center justify-center text-white font-black text-xs shadow-md">
                                            SK
                                        </div>
                                        <span class="absolute -bottom-1 -right-1 w-2.5 h-2.5 bg-emerald-500 border-2 border-slate-950 rounded-full"></span>
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-black text-white group-hover:text-purple-400 transition-colors uppercase tracking-tight">Suraj Kumar</h4>
                                        <p class="text-[9px] text-slate-400 font-bold uppercase tracking-wider">Coastal & Island</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="px-2 py-0.5 bg-purple-600/10 border border-purple-500/20 rounded-lg text-[8px] font-black text-purple-400 uppercase tracking-widest group-hover:bg-purple-600 group-hover:text-white transition-all">Select</span>
                                </div>
                            </div>

                            <!-- Simran Kaur -->
                            <div @click="subject = 'Royal Rajasthan Heritage with Simran Kaur'; $nextTick(() => document.getElementById('subject-field').focus())"
                                 class="p-4 rounded-2xl bg-white/[0.02] border border-white/5 cursor-pointer hover:border-emerald-500/40 hover:bg-emerald-600/[0.03] transition-all duration-300 flex items-center justify-between group">
                                <div class="flex items-center space-x-3">
                                    <div class="relative">
                                        <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-emerald-600 to-teal-600 flex items-center justify-center text-white font-black text-xs shadow-md">
                                            SK
                                        </div>
                                        <span class="absolute -bottom-1 -right-1 w-2.5 h-2.5 bg-emerald-500 border-2 border-slate-950 rounded-full"></span>
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-black text-white group-hover:text-emerald-400 transition-colors uppercase tracking-tight">Simran Kaur</h4>
                                        <p class="text-[9px] text-slate-400 font-bold uppercase tracking-wider">Palaces & Heritage</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="px-2 py-0.5 bg-emerald-600/10 border border-emerald-500/20 rounded-lg text-[8px] font-black text-emerald-400 uppercase tracking-widest group-hover:bg-emerald-600 group-hover:text-white transition-all">Select</span>
                                </div>
                            </div>
                        </div>

                        <!-- Mini Social Bar -->
                        <div class="flex items-center justify-center space-x-3 pt-4 border-t border-white/5">
                            <!-- Facebook -->
                            <a href="#" class="w-8 h-8 bg-white/5 rounded-full flex items-center justify-center text-slate-400 hover:bg-blue-600 hover:text-white transition-all" title="Facebook">
                                <span class="sr-only">Facebook</span>
                                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                                    <path d="M9 8H7v3h2v9h4v-9h3.6l.4-3H13V6c0-.5.5-1 1-1h2V1H13C9.7 1 9 2.5 9 5v3z"/>
                                </svg>
                            </a>
                            <!-- Twitter / X -->
                            <a href="#" class="w-8 h-8 bg-white/5 rounded-full flex items-center justify-center text-slate-400 hover:bg-blue-600 hover:text-white transition-all" title="Twitter">
                                <span class="sr-only">Twitter</span>
                                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                                    <path d="M18.2 2.25h3.3l-7.2 8.2 8.5 11.3H16.2l-5.2-6.8-5.9 6.8H1.8l7.7-8.8L1.3 2.25H8l4.7 6.2 5.5-6.2zm-1.2 17.3h1.8L7.1 4.1H5.1l11.9 15.45z"/>
                                </svg>
                            </a>
                            <!-- Instagram -->
                            <a href="#" class="w-8 h-8 bg-white/5 rounded-full flex items-center justify-center text-slate-400 hover:bg-blue-600 hover:text-white transition-all" title="Instagram">
                                <span class="sr-only">Instagram</span>
                                <svg class="w-3.5 h-3.5 fill-none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                    <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"></path>
                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                </svg>
                            </a>
                            <!-- LinkedIn -->
                            <a href="#" class="w-8 h-8 bg-white/5 rounded-full flex items-center justify-center text-slate-400 hover:bg-blue-600 hover:text-white transition-all" title="LinkedIn">
                                <span class="sr-only">LinkedIn</span>
                                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.779-1.75-1.75s.784-1.75 1.75-1.75 1.75.779 1.75 1.75-.784 1.75-1.75 1.75zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                </div>

                <!-- Contact Form -->
                <div class="w-full lg:w-2/3" data-aos="fade-left">
                    <div class="glass p-10 lg:p-16 rounded-[3.5rem] border-white/5 relative overflow-hidden shadow-2xl">
                        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600"></div>
                        
                        @if(session('success'))
                            <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-2xl text-sm font-bold text-center animate-pulse">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 text-red-400 rounded-2xl text-sm font-bold text-center">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('contact.send') }}" method="POST" class="space-y-8">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <!-- Name -->
                                <div class="space-y-2 group">
                                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest px-2 group-focus-within:text-blue-500 transition-colors">Your Name</label>
                                    <div class="relative">
                                        <input type="text" name="name" x-model="name" class="w-full bg-white/5 border border-white/5 rounded-2xl px-6 py-4 text-white focus:border-blue-600 transition-all font-bold placeholder-slate-600"
                                               :class="nameValid() ? 'border-emerald-500/30 ring-2 ring-emerald-500/10' : (name.length > 0 ? 'border-red-500/30 ring-2 ring-red-500/10' : '')"
                                               placeholder="Alexander Graham" required>
                                        <div class="absolute right-4 top-1/2 -translate-y-1/2 flex items-center pointer-events-none">
                                            <template x-if="nameValid()">
                                                <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            </template>
                                        </div>
                                    </div>
                                    @error('name')<span class="text-xs text-red-400 font-bold px-2">{{ $message }}</span>@enderror
                                </div>

                                <!-- Email -->
                                <div class="space-y-2 group">
                                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest px-2 group-focus-within:text-blue-500 transition-colors">Email Address</label>
                                    <div class="relative">
                                        <input type="email" name="email" x-model="email" class="w-full bg-white/5 border border-white/5 rounded-2xl px-6 py-4 text-white focus:border-blue-600 transition-all font-bold placeholder-slate-600"
                                               :class="emailValid() ? 'border-emerald-500/30 ring-2 ring-emerald-500/10' : (email.length > 0 ? 'border-red-500/30 ring-2 ring-red-500/10' : '')"
                                               placeholder="alex@premium.com" required>
                                        <div class="absolute right-4 top-1/2 -translate-y-1/2 flex items-center pointer-events-none">
                                            <template x-if="emailValid()">
                                                <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            </template>
                                        </div>
                                    </div>
                                    @error('email')<span class="text-xs text-red-400 font-bold px-2">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <!-- Subject -->
                            <div class="space-y-2 group">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest px-2 group-focus-within:text-blue-500 transition-colors">Subject</label>
                                <div class="relative">
                                    <input type="text" name="subject" x-model="subject" id="subject-field" class="w-full bg-white/5 border border-white/5 rounded-2xl px-6 py-4 text-white focus:border-blue-600 transition-all font-bold placeholder-slate-600"
                                           :class="subjectValid() ? 'border-emerald-500/30 ring-2 ring-emerald-500/10' : (subject.length > 0 ? 'border-red-500/30 ring-2 ring-red-500/10' : '')"
                                           placeholder="Designing My Next Adventure">
                                    <div class="absolute right-4 top-1/2 -translate-y-1/2 flex items-center pointer-events-none">
                                        <template x-if="subjectValid()">
                                            <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        </template>
                                    </div>
                                </div>
                                @error('subject')<span class="text-xs text-red-400 font-bold px-2">{{ $message }}</span>@enderror
                            </div>

                            <!-- Message -->
                            <div class="space-y-2 group">
                                <div class="flex justify-between items-center px-2">
                                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest group-focus-within:text-blue-500 transition-colors">Message</label>
                                    <span class="text-[9px] font-bold text-slate-500 tracking-wider" :class="charsLeft < 50 ? 'text-red-400' : ''">
                                        <span x-text="charsLeft"></span>/500 characters
                                    </span>
                                </div>
                                <div class="relative">
                                    <textarea name="message" rows="5" x-model="message" maxlength="500" class="w-full bg-white/5 border border-white/5 rounded-2xl px-6 py-4 text-white focus:border-blue-600 transition-all font-bold placeholder-slate-600"
                                              :class="messageValid() ? 'border-emerald-500/30 ring-2 ring-emerald-500/10' : (message.length > 0 ? 'border-red-500/30 ring-2 ring-red-500/10' : '')"
                                              placeholder="Tell us about your dream destination..." required></textarea>
                                    <div class="absolute right-4 bottom-4 flex items-center pointer-events-none">
                                        <template x-if="messageValid()">
                                            <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        </template>
                                    </div>
                                </div>
                                @error('message')<span class="text-xs text-red-400 font-bold px-2">{{ $message }}</span>@enderror
                            </div>

                            <button type="submit" class="btn-luxury w-full py-5 text-sm shadow-lg shadow-blue-500/20">Send Inquiry</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Interactive Map Section -->
            <div class="mb-32" data-aos="fade-up">
                <div class="text-center mb-10">
                    <h2 class="text-3xl font-black text-white uppercase tracking-tighter">Global <span class="text-blue-600 italic">Headquarters</span></h2>
                </div>
                <div class="glass p-4 rounded-[3.5rem] border-white/5 shadow-2xl h-[500px] relative overflow-hidden">
                    <div id="map" class="w-full h-full rounded-[3rem] z-0 relative"></div>
                    
                    <!-- Floating Dashboard Navigation Overlay -->
                    <div class="absolute bottom-6 left-6 right-6 md:left-auto md:right-8 md:bottom-8 z-[400] glass-dark p-6 rounded-[2.5rem] border border-white/10 shadow-2xl max-w-xs w-full backdrop-blur-md">
                        <h4 class="text-[9px] font-black text-blue-500 uppercase tracking-widest mb-3">Navigate Hubs</h4>
                        <div class="flex flex-col space-y-2">
                            <button type="button" onclick="focusHub('punjab')" class="flex items-center justify-between text-left p-3 rounded-2xl bg-white/5 hover:bg-blue-600/20 border border-white/5 hover:border-blue-500/30 transition-all group">
                                <span class="text-xs font-black text-white uppercase tracking-tight">Punjab HQ</span>
                                <span class="text-[9px] font-bold text-blue-400 tracking-wider">Chandigarh</span>
                            </button>
                            <button type="button" onclick="focusHub('mumbai')" class="flex items-center justify-between text-left p-3 rounded-2xl bg-white/5 hover:bg-purple-600/20 border border-white/5 hover:border-purple-500/30 transition-all group">
                                <span class="text-xs font-black text-white uppercase tracking-tight">Mumbai Hub</span>
                                <span class="text-[9px] font-bold text-purple-400 tracking-wider">Coastal West</span>
                            </button>
                            <button type="button" onclick="focusHub('delhi')" class="flex items-center justify-between text-left p-3 rounded-2xl bg-white/5 hover:bg-emerald-600/20 border border-white/5 hover:border-emerald-500/30 transition-all group">
                                <span class="text-xs font-black text-white uppercase tracking-tight">Delhi Liaison</span>
                                <span class="text-[9px] font-bold text-emerald-400 tracking-wider">Capital HQ</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="max-w-4xl mx-auto" x-data="{ active: null }" data-aos="fade-up">
                <div class="text-center mb-10">
                    <h2 class="text-3xl font-black text-white uppercase tracking-tighter">Common <span class="text-blue-600 italic">Queries</span></h2>
                </div>
                <div class="space-y-4">
                    @foreach([
                        ['q' => 'How quickly will a curator respond to my inquiry?', 'a' => 'Our dedicated concierge team operates 24/7 and typically responds within 2-4 hours to all luxury expedition inquiries.'],
                        ['q' => 'Do you handle bespoke corporate travel?', 'a' => 'Yes, we specialize in organizing elite corporate retreats, board meetings, and incentive travel programs globally.'],
                        ['q' => 'Can I request a callback instead of email?', 'a' => 'Absolutely. Simply include your phone number and preferred time zone in the message body.'],
                    ] as $index => $faq)
                    <div class="glass rounded-3xl border-white/5 overflow-hidden transition-all duration-300"
                         :class="active === {{ $index }} ? 'border-blue-500/20 ring-1 ring-blue-500/10' : ''">
                        <button @click="active = active === {{ $index }} ? null : {{ $index }}" class="w-full p-8 flex items-center justify-between text-left hover:bg-white/5 transition-colors">
                            <span class="text-base font-black text-white uppercase tracking-tighter" :class="active === {{ $index }} ? 'text-blue-400' : ''">{{ $faq['q'] }}</span>
                            <div class="w-8 h-8 glass rounded-xl flex items-center justify-center text-blue-500 transform transition-transform duration-500" :class="active === {{ $index }} ? 'rotate-180 bg-blue-600 text-white' : ''">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </button>
                        <div x-show="active === {{ $index }}" x-collapse>
                            <div class="px-8 pb-8 pt-2">
                                <p class="text-slate-400 font-medium text-sm leading-relaxed">{{ $faq['a'] }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var map = L.map('map').setView([30.7333, 76.7794], 5); // Centered on Chandigarh/Punjab region

            L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
                subdomains: 'abcd',
                maxZoom: 20
            }).addTo(map);

            var customIcon = L.divIcon({
                className: 'custom-div-icon',
                html: "<div class='w-6 h-6 bg-blue-600 rounded-full border-4 border-slate-900 shadow-[0_0_15px_rgba(37,99,235,0.8)] animate-pulse'></div>",
                iconSize: [24, 24],
                iconAnchor: [12, 12]
            });

            var customIconPurple = L.divIcon({
                className: 'custom-div-icon',
                html: "<div class='w-6 h-6 bg-purple-600 rounded-full border-4 border-slate-900 shadow-[0_0_15px_rgba(139,92,246,0.8)] animate-pulse'></div>",
                iconSize: [24, 24],
                iconAnchor: [12, 12]
            });

            var customIconEmerald = L.divIcon({
                className: 'custom-div-icon',
                html: "<div class='w-6 h-6 bg-emerald-600 rounded-full border-4 border-slate-900 shadow-[0_0_15px_rgba(16,185,129,0.8)] animate-pulse'></div>",
                iconSize: [24, 24],
                iconAnchor: [12, 12]
            });

            // Markers store
            var markers = {};

            markers['punjab'] = L.marker([30.7333, 76.7794], {icon: customIcon}).addTo(map)
                .bindPopup('<div class="text-slate-900 font-bold p-2 text-center"><h3 class="uppercase tracking-widest text-xs text-blue-600">Travelista Global HQ</h3><p class="text-[10px] text-slate-500 mt-1">Lux Square, 101 Global City,<br>Punjab, India</p></div>');
            
            markers['mumbai'] = L.marker([19.0760, 72.8777], {icon: customIconPurple}).addTo(map)
                .bindPopup('<div class="text-slate-900 font-bold p-2 text-center"><h3 class="uppercase tracking-widest text-xs text-purple-600">Mumbai Experience Hub</h3><p class="text-[10px] text-slate-500 mt-1">Marine Drive Boulevard,<br>Mumbai, India</p></div>');

            markers['delhi'] = L.marker([28.6139, 77.2090], {icon: customIconEmerald}).addTo(map)
                .bindPopup('<div class="text-slate-900 font-bold p-2 text-center"><h3 class="uppercase tracking-widest text-xs text-emerald-600">Delhi Liaison Office</h3><p class="text-[10px] text-slate-500 mt-1">Connaught Luxury Plaza,<br>New Delhi, India</p></div>');

            window.focusHub = function(hubName) {
                if (markers[hubName]) {
                    var marker = markers[hubName];
                    map.flyTo(marker.getLatLng(), 14, {
                        duration: 2.5,
                        easeLinearity: 0.25
                    });
                    setTimeout(function() {
                        marker.openPopup();
                    }, 2400);
                }
            };
        });
    </script>
    @endpush
</x-app-layout>
