<x-app-layout>
    <div class="min-h-screen flex items-center justify-center pt-32 pb-16 px-4 sm:px-6 lg:pt-36 lg:pb-24 relative overflow-hidden" x-data="{ showPass: false }">
        <!-- Premium Radial Gradient Background & Abstract Grid -->
        <div class="absolute inset-0 bg-[#020617]"></div>
        
        <!-- Interactive Tech Grid Pattern Overlay -->
        <div class="absolute inset-0 bg-[radial-gradient(#1e293b_1px,transparent_1px)] [background-size:24px_24px] opacity-35"></div>
        
        <!-- Sleek Animated Floating Spheres -->
        <div class="absolute -top-40 -left-40 w-[500px] h-[500px] bg-blue-600/10 rounded-full blur-[120px] animate-pulse pointer-events-none"></div>
        <div class="absolute -bottom-40 -right-40 w-[500px] h-[500px] bg-purple-600/10 rounded-full blur-[120px] animate-pulse pointer-events-none" style="animation-delay: 2s;"></div>
        <div class="absolute top-1/2 left-1/3 w-[300px] h-[300px] bg-indigo-500/5 rounded-full blur-[100px] animate-pulse pointer-events-none" style="animation-delay: 4s;"></div>

        <!-- Main Login Card with Luxury Glassmorphism -->
        <div class="max-w-5xl w-full flex flex-col lg:flex-row card-luxury-glass !p-0 overflow-hidden shadow-2xl relative z-10 border-white/10" data-aos="zoom-in">
            
            <!-- Left Side: Immersive Cinematic Image -->
            <div class="hidden lg:block lg:w-1/2 relative overflow-hidden group/image">
                <img src="https://images.unsplash.com/photo-1544644181-1484b3fdfc62?auto=format&fit=crop&q=80&w=1200" 
                     class="w-full h-full object-cover animate-slow-zoom transition-transform duration-[20000ms]" 
                     alt="Luxury Resort Destination">
                <!-- Deep overlay gradients for cinematic realism -->
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-900/40 to-slate-950/20"></div>
                
                <!-- Elegant Glass Overlay Badge (Floating Quote) -->
                <div class="absolute bottom-8 left-8 right-8 glass backdrop-blur-md rounded-2xl p-6 border-white/10 shadow-lg translate-y-2 group-hover/image:translate-y-0 transition-transform duration-700">
                    <span class="text-xs font-black text-blue-400 uppercase tracking-widest block mb-2">Member Privilege</span>
                    <h2 class="text-2xl font-bold text-white mb-2 leading-tight uppercase tracking-tight">Your gateway to <br><span class="text-gradient">exceptional worlds.</span></h2>
                    <p class="text-slate-400 font-medium text-xs leading-relaxed">Sign in to unlock personalized premium travel itineraries and five-star luxury retreats worldwide.</p>
                </div>
            </div>

            <!-- Right Side: Exquisite Form -->
            <div class="w-full lg:w-1/2 p-8 lg:p-14 bg-slate-950/40 backdrop-blur-3xl flex flex-col justify-center border-l border-white/5">
                <!-- Brand Logo & Greeting -->
                <div class="mb-10 text-center lg:text-left">
                    <div class="flex items-center justify-center lg:justify-start gap-3 mb-4">
                        <div class="w-8 h-8 rounded-lg bg-blue-600 flex items-center justify-center shadow-lg shadow-blue-600/30">
                            <span class="text-white font-black italic text-base">T</span>
                        </div>
                        <span class="text-lg font-black tracking-[0.3em] text-white">TRAVELISTA</span>
                    </div>
                    <h1 class="text-3xl font-black text-white uppercase tracking-tight mb-2">Welcome Back</h1>
                    <p class="text-slate-500 font-bold uppercase tracking-widest text-[9px] flex items-center justify-center lg:justify-start gap-1.5">
                        <span class="inline-block w-1.5 h-1.5 rounded-full bg-blue-500 animate-ping"></span>
                        Enter your credentials to access passport portal
                    </p>
                </div>

                <!-- Form -->
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf
                    
                    <!-- Email Input Container -->
                    <div class="space-y-2">
                        <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest block px-1">Passport Email Address</label>
                        <div class="relative group/input flex items-center rounded-2xl bg-white/5 border border-white/10 focus-within:border-blue-500 focus-within:ring-2 focus-within:ring-blue-500/20 transition-all duration-300">
                            <div class="pl-4 text-slate-400 group-focus-within/input:text-blue-500 transition-colors">
                                <!-- Envelope SVG -->
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <input type="email" name="email" value="{{ old('email') }}" required autofocus 
                                   class="w-full bg-transparent border-none px-4 py-3.5 text-white text-sm focus:ring-0 transition-all font-bold placeholder-slate-600 outline-none" 
                                   placeholder="name@domain.com">
                        </div>
                        @error('email')
                            <div class="flex items-center gap-1.5 px-1 mt-1 text-red-500">
                                <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                <p class="text-xs font-bold">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>

                    <!-- Password Input Container -->
                    <div class="space-y-2">
                        <div class="flex items-center justify-between px-1">
                            <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest block">Access Passcode</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-[9px] font-black text-blue-500 uppercase tracking-widest hover:text-blue-400 transition-colors">Forgot?</a>
                            @endif
                        </div>
                        <div class="relative group/input flex items-center rounded-2xl bg-white/5 border border-white/10 focus-within:border-blue-500 focus-within:ring-2 focus-within:ring-blue-500/20 transition-all duration-300">
                            <div class="pl-4 text-slate-400 group-focus-within/input:text-blue-500 transition-colors">
                                <!-- Lock SVG -->
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            <input :type="showPass ? 'text' : 'password'" name="password" required 
                                   class="w-full bg-transparent border-none px-4 py-3.5 text-white text-sm focus:ring-0 transition-all font-bold placeholder-slate-600 outline-none" 
                                   placeholder="••••••••">
                            <button type="button" @click="showPass = !showPass" class="pr-4 text-slate-500 hover:text-white transition-colors outline-none cursor-pointer">
                                <svg x-show="!showPass" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                <svg x-show="showPass" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"></path></svg>
                            </button>
                        </div>
                        @error('password')
                            <div class="flex items-center gap-1.5 px-1 mt-1 text-red-500">
                                <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                <p class="text-xs font-bold">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>

                    <!-- Remember Me Option -->
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" 
                               class="w-4.5 h-4.5 rounded-lg bg-white/5 border border-white/10 text-blue-600 focus:ring-blue-600/30 focus:ring-offset-slate-950 accent-blue-600 transition-all cursor-pointer">
                        <label for="remember" class="ml-2.5 text-[9px] font-black text-slate-400 uppercase tracking-widest cursor-pointer hover:text-slate-300 transition-colors">Keep my passport logged in</label>
                    </div>

                    <!-- Access Button -->
                    <button type="submit" class="btn-luxury w-full py-4 text-xs group cursor-pointer flex items-center justify-center gap-2">
                        <span>Authenticate Portal</span>
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>


                    <!-- Navigation Footer link -->
                    <p class="text-center text-[9px] font-black text-slate-500 uppercase tracking-widest mt-6">
                        No official passport yet? <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-400 ml-1.5 transition-colors underline decoration-blue-500/30 hover:decoration-blue-400">Request Credentials</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <style>
        @keyframes slow-zoom {
            0% { transform: scale(1); }
            100% { transform: scale(1.08); }
        }
        .animate-slow-zoom {
            animation: slow-zoom 25s ease-in-out infinite alternate;
        }
    </style>
</x-app-layout>
