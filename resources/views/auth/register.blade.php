<x-app-layout>
    <div class="min-h-screen flex items-center justify-center pt-32 pb-16 px-4 sm:px-6 lg:pt-36 lg:pb-24 relative overflow-hidden" 
         x-data="{ 
             step: 1, 
             name: '', 
             email: '', 
             referral_code: '',
             password: '', 
             password_confirmation: '',
             profilePreview: null 
         }">
        <!-- Premium Radial Gradient Background & Abstract Grid -->
        <div class="absolute inset-0 bg-[#020617]"></div>
        
        <!-- Interactive Tech Grid Pattern Overlay -->
        <div class="absolute inset-0 bg-[radial-gradient(#1e293b_1px,transparent_1px)] [background-size:24px_24px] opacity-35"></div>
        
        <!-- Sleek Animated Floating Spheres -->
        <div class="absolute -top-40 -right-40 w-[500px] h-[500px] bg-emerald-600/10 rounded-full blur-[120px] animate-pulse pointer-events-none"></div>
        <div class="absolute -bottom-40 -left-40 w-[500px] h-[500px] bg-teal-600/10 rounded-full blur-[120px] animate-pulse pointer-events-none" style="animation-delay: 2s;"></div>
        <div class="absolute top-1/2 right-1/3 w-[300px] h-[300px] bg-cyan-600/5 rounded-full blur-[100px] animate-pulse pointer-events-none" style="animation-delay: 4s;"></div>

        <!-- Main Register Card with Symmetry Glassmorphism (Reversed split) -->
        <div class="max-w-5xl w-full flex flex-col lg:flex-row-reverse card-luxury-glass !p-0 overflow-hidden shadow-2xl relative z-10 border-white/10" data-aos="zoom-in">
            
            <!-- Right Side: Immersive Cinematic Image & Step Guidance -->
            <div class="hidden lg:block lg:w-1/2 relative overflow-hidden group/image">
                <img src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?auto=format&fit=crop&q=80&w=1200" 
                     class="w-full h-full object-cover transition-transform duration-[20000ms] group-hover/image:scale-105" 
                     alt="Adventure Roadtrip">
                <!-- Deep overlay gradients for cinematic realism -->
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-900/40 to-slate-950/20"></div>
                
                <!-- Elegant Glass Overlay Badge (Dynamic guide text based on Step) -->
                <div class="absolute bottom-8 left-8 right-8 glass backdrop-blur-md rounded-2xl p-6 border-white/10 shadow-lg translate-y-2 group-hover/image:translate-y-0 transition-transform duration-700">
                    <!-- Progress Bar inside overlay -->
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-[9px] font-black text-emerald-400 uppercase tracking-widest block">Passport Status</span>
                        <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest block" x-text="'Step ' + step + ' of 3'"></span>
                    </div>
                    <div class="h-1 bg-white/5 rounded-full overflow-hidden mb-4">
                        <div class="h-full bg-gradient-to-r from-emerald-500 to-teal-500 transition-all duration-500" :style="'width: ' + (step * 33.33) + '%'"></div>
                    </div>
                    
                    <h2 class="text-2xl font-bold text-white mb-2 leading-tight uppercase tracking-tight">
                        <span x-show="step === 1">Establishing <br><span class="text-gradient">Your Identity.</span></span>
                        <span x-show="step === 2">Fortifying <br><span class="text-gradient">Security.</span></span>
                        <span x-show="step === 3">Preparing <br><span class="text-gradient">For Departure.</span></span>
                    </h2>
                    <p class="text-slate-400 font-medium text-xs leading-relaxed" 
                       x-text="step === 1 ? 'Start your high-end travel portfolio by filling out your permanent identity details and custom referral code.' : (step === 2 ? 'Establish an ultra-secure access passcode to protect your booking data, luxury itinerary planner, and wallet coins.' : 'Confirm your credentials and sign the terms of adventure to activate your premium Travelista passport.')"></p>
                </div>
            </div>

            <!-- Left Side: Wizard Stepper Form -->
            <div class="w-full lg:w-1/2 p-8 lg:p-14 bg-slate-950/40 backdrop-blur-3xl flex flex-col justify-center border-r border-white/5">
                
                <!-- Stepper Progress Wizard -->
                <div class="flex items-center justify-between mb-10 relative">
                    <!-- Connecting Progress Bar Line -->
                    <div class="absolute top-1/2 left-0 right-0 h-1 bg-white/5 -translate-y-1/2 rounded-full z-0"></div>
                    <div class="absolute top-1/2 left-0 h-1 bg-gradient-to-r from-emerald-500 to-teal-500 -translate-y-1/2 rounded-full z-0 transition-all duration-500" 
                         :style="step === 1 ? 'width: 20%' : (step === 2 ? 'width: 60%' : 'width: 100%')"></div>

                    <!-- Step 1 Indicator -->
                    <div class="relative z-10 flex flex-col items-center cursor-pointer" @click="step = 1">
                        <div class="w-9 h-9 rounded-full flex items-center justify-center transition-all duration-500 border-2"
                             :class="step >= 1 ? 'bg-slate-950 border-emerald-500 text-emerald-400 shadow-[0_0_15px_rgba(16,185,129,0.3)]' : 'bg-slate-900 border-white/10 text-slate-500'">
                            <!-- User SVG -->
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <span class="text-[8px] font-black uppercase tracking-widest mt-2" :class="step >= 1 ? 'text-emerald-400' : 'text-slate-500'">Identity</span>
                    </div>

                    <!-- Step 2 Indicator -->
                    <div class="relative z-10 flex flex-col items-center cursor-pointer" @click="if(name && email) step = 2">
                        <div class="w-9 h-9 rounded-full flex items-center justify-center transition-all duration-500 border-2"
                             :class="step >= 2 ? 'bg-slate-950 border-emerald-500 text-emerald-400 shadow-[0_0_15px_rgba(16,185,129,0.3)]' : 'bg-slate-900 border-white/10 text-slate-500'">
                            <!-- Lock SVG -->
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                        <span class="text-[8px] font-black uppercase tracking-widest mt-2" :class="step >= 2 ? 'text-emerald-400' : 'text-slate-500'">Security</span>
                    </div>

                    <!-- Step 3 Indicator -->
                    <div class="relative z-10 flex flex-col items-center cursor-pointer" @click="if(name && email && password) step = 3">
                        <div class="w-9 h-9 rounded-full flex items-center justify-center transition-all duration-500 border-2"
                             :class="step >= 3 ? 'bg-slate-950 border-emerald-500 text-emerald-400 shadow-[0_0_15px_rgba(16,185,129,0.3)]' : 'bg-slate-900 border-white/10 text-slate-500'">
                            <!-- Embark SVG -->
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <span class="text-[8px] font-black uppercase tracking-widest mt-2" :class="step >= 3 ? 'text-emerald-400' : 'text-slate-500'">Embark</span>
                    </div>
                </div>

                <!-- Registration Form -->
                <form method="POST" action="{{ route('register') }}" class="space-y-6" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- Form Error Validation Messages -->
                    @if($errors->any())
                        <div class="bg-rose-600/10 border border-rose-600/20 rounded-2xl p-4 mb-4">
                            <div class="flex gap-2.5 mb-2">
                                <svg class="w-4 h-4 text-rose-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span class="text-xs font-black text-rose-500 uppercase tracking-widest">Verification Blocked</span>
                            </div>
                            <ul class="list-disc list-inside text-[11px] font-bold text-rose-400/90 space-y-1">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <!-- STEP 1: IDENTITY -->
                    <div x-show="step === 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-8" x-transition:enter-end="opacity-100 translate-x-0" class="space-y-5">
                        
                        <!-- Circular Passport Photo Upload slot -->
                        <div class="flex flex-col items-center justify-center mb-6">
                            <div class="relative group/avatar cursor-pointer">
                                <div class="w-24 h-24 rounded-full bg-white/5 border-2 border-dashed border-white/10 flex items-center justify-center overflow-hidden group-hover/avatar:border-emerald-500/50 group-hover/avatar:bg-white/10 transition-all duration-300 shadow-inner">
                                    <template x-if="!profilePreview">
                                        <svg class="w-8 h-8 text-slate-600 group-hover/avatar:text-slate-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    </template>
                                    <template x-if="profilePreview">
                                        <img :src="profilePreview" class="w-full h-full object-cover animate-fade-in">
                                    </template>
                                </div>
                                <input type="file" name="profile_image" class="absolute inset-0 opacity-0 cursor-pointer" @change="const file = $event.target.files[0]; if(file) { profilePreview = URL.createObjectURL(file); }">
                                <div class="absolute -bottom-1 -right-1 w-8 h-8 bg-emerald-600 rounded-full flex items-center justify-center text-white shadow-lg shadow-emerald-600/30 group-hover/avatar:scale-110 transition-transform">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                </div>
                            </div>
                            <p class="text-[9px] font-black text-slate-500 uppercase tracking-widest mt-3">Upload Portrait Passport Photo</p>
                        </div>

                        <!-- Full Name Input -->
                        <div class="space-y-2">
                            <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest block px-1">Full Legal Name</label>
                            <div class="relative group/input flex items-center rounded-2xl bg-white/5 border border-white/10 focus-within:border-emerald-500 focus-within:ring-2 focus-within:ring-emerald-500/20 transition-all duration-300">
                                <div class="pl-4 text-slate-400 group-focus-within/input:text-emerald-500 transition-colors">
                                    <!-- User SVG -->
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                                <input type="text" name="name" x-model="name" required 
                                       class="w-full bg-transparent border-none px-4 py-3.5 text-white text-sm focus:ring-0 transition-all font-bold placeholder-slate-600 outline-none" 
                                       placeholder="Johnathan Doe">
                            </div>
                        </div>

                        <!-- Email Address Input -->
                        <div class="space-y-2">
                            <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest block px-1">Passport Email Address</label>
                            <div class="relative group/input flex items-center rounded-2xl bg-white/5 border border-white/10 focus-within:border-emerald-500 focus-within:ring-2 focus-within:ring-emerald-500/20 transition-all duration-300">
                                <div class="pl-4 text-slate-400 group-focus-within/input:text-emerald-500 transition-colors">
                                    <!-- Envelope SVG -->
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                </div>
                                <input type="email" name="email" x-model="email" required 
                                       class="w-full bg-transparent border-none px-4 py-3.5 text-white text-sm focus:ring-0 transition-all font-bold placeholder-slate-600 outline-none" 
                                       placeholder="name@domain.com">
                            </div>
                        </div>

                        <!-- Referral Code Input -->
                        <div class="space-y-2">
                            <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest block px-1">Referral Invitation Code (Optional)</label>
                            <div class="relative group/input flex items-center rounded-2xl bg-white/5 border border-white/10 focus-within:border-emerald-500 focus-within:ring-2 focus-within:ring-emerald-500/20 transition-all duration-300">
                                <div class="pl-4 text-slate-400 group-focus-within/input:text-emerald-500 transition-colors">
                                    <!-- Ticket/Tag SVG -->
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2zM9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                                </div>
                                <input type="text" name="referral_code" x-model="referral_code" 
                                       class="w-full bg-transparent border-none px-4 py-3.5 text-white text-sm focus:ring-0 transition-all font-bold placeholder-slate-600 outline-none" 
                                       placeholder="TRV-XXXXXX">
                            </div>
                        </div>

                        <!-- Stepper Next Action -->
                        <button type="button" @click="if(name && email) step = 2" 
                                class="btn-luxury w-full py-4 text-xs !from-emerald-600 !to-teal-600 hover:!shadow-emerald-600/30 rounded-2xl mt-4 cursor-pointer flex items-center justify-center gap-2">
                            <span>Proceed to Security</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>


                    </div>

                    <!-- STEP 2: SECURITY -->
                    <div x-show="step === 2" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-8" x-transition:enter-end="opacity-100 translate-x-0" class="space-y-5">
                        
                        <!-- Access Passcode Input -->
                        <div class="space-y-2">
                            <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest block px-1">Create Access Passcode</label>
                            <div class="relative group/input flex items-center rounded-2xl bg-white/5 border border-white/10 focus-within:border-emerald-500 focus-within:ring-2 focus-within:ring-emerald-500/20 transition-all duration-300">
                                <div class="pl-4 text-slate-400 group-focus-within/input:text-emerald-500 transition-colors">
                                    <!-- Key SVG -->
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m-5 0a5 5 0 015 5m-5-5a5 5 0 00-5 5m5-5v4m0 0l-3-3m3 3l3-3"></path></svg>
                                </div>
                                <input type="password" name="password" x-model="password" required 
                                       class="w-full bg-transparent border-none px-4 py-3.5 text-white text-sm focus:ring-0 transition-all font-bold placeholder-slate-600 outline-none" 
                                       placeholder="••••••••">
                            </div>
                            
                            <!-- Premium Interactive Strength Meter Dashboard -->
                            <div class="space-y-1.5 px-1 pt-1">
                                <div class="grid grid-cols-4 gap-2">
                                    <div class="h-1.5 rounded-full bg-slate-800 transition-all duration-500" :class="password.length > 3 ? 'bg-red-500' : ''"></div>
                                    <div class="h-1.5 rounded-full bg-slate-800 transition-all duration-500" :class="password.length > 7 ? 'bg-amber-500' : ''"></div>
                                    <div class="h-1.5 rounded-full bg-slate-800 transition-all duration-500" :class="password.length > 10 ? 'bg-blue-500' : ''"></div>
                                    <div class="h-1.5 rounded-full bg-slate-800 transition-all duration-500" :class="password.length > 12 ? 'bg-emerald-500' : ''"></div>
                                </div>
                                <div class="flex items-center justify-between text-[8px] font-black uppercase tracking-widest">
                                    <span class="text-slate-500">Passcode Rating</span>
                                    <span :class="password.length < 8 ? 'text-red-500' : (password.length < 12 ? 'text-blue-400' : 'text-emerald-400')" 
                                          x-text="password.length < 8 ? 'Vulnerable' : (password.length < 12 ? 'Secure Standard' : 'Military Grade')"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Confirm Password Input -->
                        <div class="space-y-2">
                            <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest block px-1">Re-enter Passcode for confirmation</label>
                            <div class="relative group/input flex items-center rounded-2xl bg-white/5 border border-white/10 focus-within:border-emerald-500 focus-within:ring-2 focus-within:ring-emerald-500/20 transition-all duration-300">
                                <div class="pl-4 text-slate-400 group-focus-within/input:text-emerald-500 transition-colors">
                                    <!-- Shield check SVG -->
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                </div>
                                <input type="password" name="password_confirmation" x-model="password_confirmation" required 
                                       class="w-full bg-transparent border-none px-4 py-3.5 text-white text-sm focus:ring-0 transition-all font-bold placeholder-slate-600 outline-none" 
                                       placeholder="••••••••">
                            </div>
                        </div>

                        <!-- Navigation Controls -->
                        <div class="flex gap-4 pt-4">
                            <button type="button" @click="step = 1" 
                                    class="w-1/3 py-4 rounded-2xl bg-white/5 text-slate-400 font-black text-[9px] uppercase tracking-widest border border-white/5 hover:bg-white/10 hover:text-white transition-all cursor-pointer">
                                Back
                            </button>
                            <button type="button" @click="if(password && password === password_confirmation && password.length >= 8) step = 3" 
                                    class="w-2/3 py-4 rounded-2xl bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-black text-[9px] uppercase tracking-widest hover:shadow-lg hover:shadow-emerald-600/20 active:translate-y-0.5 transition-all cursor-pointer flex items-center justify-center gap-1.5"
                                    :disabled="password !== password_confirmation || password.length < 8"
                                    :class="password === password_confirmation && password.length >= 8 ? 'opacity-100' : 'opacity-50 cursor-not-allowed'">
                                <span>Final Review</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </button>
                        </div>
                    </div>

                    <!-- STEP 3: EMBARKATION -->
                    <div x-show="step === 3" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-8" x-transition:enter-end="opacity-100 translate-x-0" class="space-y-5">
                        
                        <!-- Summary Passport Certificate dashboard -->
                        <div class="glass p-5 rounded-3xl border-white/5 space-y-4 shadow-2xl relative overflow-hidden bg-gradient-to-br from-slate-900/80 to-slate-950/90">
                            <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-emerald-500/5 rounded-full blur-xl pointer-events-none"></div>
                            
                            <div class="border-b border-white/5 pb-3">
                                <span class="text-[8px] font-black text-slate-500 uppercase tracking-widest block">Traveler Passport Preview</span>
                            </div>

                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-full border border-white/10 bg-white/5 overflow-hidden flex items-center justify-center shrink-0">
                                    <template x-if="profilePreview">
                                        <img :src="profilePreview" class="w-full h-full object-cover">
                                    </template>
                                    <template x-if="!profilePreview">
                                        <svg class="w-6 h-6 text-emerald-500/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    </template>
                                </div>
                                <div class="min-w-0">
                                    <p class="text-xs font-black text-white truncate" x-text="name || 'Anonymous Traveler'"></p>
                                    <p class="text-[9px] font-bold text-slate-500 truncate" x-text="email || 'No email provided'"></p>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-3 pt-2">
                                <div class="flex items-center space-x-2 bg-emerald-500/5 border border-emerald-500/10 rounded-xl p-2.5">
                                    <div class="w-6 h-6 bg-emerald-600/20 rounded-md flex items-center justify-center text-emerald-400 shrink-0">
                                        <!-- Checkmark SVG -->
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    </div>
                                    <div class="min-w-0">
                                        <span class="text-[7px] font-black text-slate-500 uppercase tracking-widest block leading-none mb-1">Passport Profile</span>
                                        <p class="text-[9px] font-bold text-emerald-400 truncate">Identity Ready</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2 bg-blue-500/5 border border-blue-500/10 rounded-xl p-2.5">
                                    <div class="w-6 h-6 bg-blue-600/20 rounded-md flex items-center justify-center text-blue-400 shrink-0">
                                        <!-- Lock check SVG -->
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                    </div>
                                    <div class="min-w-0">
                                        <span class="text-[7px] font-black text-slate-500 uppercase tracking-widest block leading-none mb-1">Encrypted Access</span>
                                        <p class="text-[9px] font-bold text-blue-400 truncate">Secured Portal</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Agreement Checkbox -->
                        <div class="flex items-start py-2">
                            <input type="checkbox" required id="agree_terms"
                                   class="w-4.5 h-4.5 rounded-lg bg-white/5 border border-white/10 text-emerald-600 focus:ring-emerald-600/30 focus:ring-offset-slate-950 accent-emerald-600 transition-all cursor-pointer shrink-0 mt-0.5">
                            <label for="agree_terms" class="ml-3 text-[9px] font-black text-slate-500 uppercase tracking-widest leading-relaxed cursor-pointer select-none">
                                I solemnly agree to the <a href="#" class="text-emerald-500 hover:text-emerald-400 transition-colors underline decoration-emerald-500/30">Terms of Curated Adventure</a> &amp; guidelines.
                            </label>
                        </div>

                        <!-- Embarkation Controls -->
                        <div class="flex gap-4">
                            <button type="button" @click="step = 2" 
                                    class="w-1/3 py-4 rounded-2xl bg-white/5 text-slate-400 font-black text-[9px] uppercase tracking-widest border border-white/5 hover:bg-white/10 hover:text-white transition-all cursor-pointer">
                                Back
                            </button>
                            <button type="submit" 
                                    class="w-2/3 py-4 rounded-2xl bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-black text-[9px] uppercase tracking-widest hover:shadow-lg hover:shadow-emerald-600/30 active:-translate-y-0.5 hover:-translate-y-0.5 transition-all cursor-pointer flex items-center justify-center gap-1.5">
                                <span>Begin Journey</span>
                                <svg class="w-4 h-4 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                            </button>
                        </div>
                    </div>

                    <!-- Sign In Anchor -->
                    <p class="text-center text-[9px] font-black text-slate-500 uppercase tracking-widest pt-4">
                        Already possess passport portal access? <a href="{{ route('login') }}" class="text-emerald-500 hover:text-emerald-400 ml-1.5 transition-colors underline decoration-emerald-500/30 hover:decoration-emerald-400">Sign In instead</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
