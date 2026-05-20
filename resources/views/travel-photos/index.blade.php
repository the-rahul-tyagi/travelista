<x-dashboard-layout>
    <div class="space-y-12" x-data="{ lightboxOpen: false, activeImage: '', activeTitle: '', activeCaption: '', activeLocation: '' }">
        <!-- Header -->
        <div class="glass p-12 rounded-[4rem] border-white/5 relative overflow-hidden group animate-fade-in" data-aos="fade-up">
            <div class="absolute -right-20 -top-20 w-80 h-80 bg-blue-600/10 rounded-full blur-[100px] group-hover:bg-blue-600/20 transition-all duration-1000"></div>
            <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-8">
                <div>
                    <h2 class="text-4xl font-black text-white uppercase tracking-tighter mb-2">Expedition <span class="text-blue-500 italic">Portfolio</span></h2>
                    <p class="text-xs font-bold text-slate-400">Capture, archive, and showcase your luxury travels across India. Share your visual diaries.</p>
                </div>
                <div>
                    <span class="px-6 py-3 bg-blue-500/10 text-blue-400 border border-blue-500/20 text-[10px] font-black rounded-full uppercase tracking-widest">
                        Visual Diaries Active
                    </span>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="p-6 bg-emerald-500/10 border border-emerald-500/20 rounded-3xl text-emerald-400 text-sm font-bold flex items-center space-x-3">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="p-6 bg-rose-500/10 border border-rose-500/20 rounded-3xl text-rose-400 text-sm font-bold flex items-center space-x-3">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        <!-- Main Layout Split -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Upload Side Panel -->
            <div class="glass p-10 rounded-[3.5rem] border-white/5 shadow-2xl h-fit" data-aos="fade-right">
                <h3 class="text-xl font-black text-white uppercase tracking-tighter mb-8">Publish new <span class="text-blue-500 italic">Expedition Photo</span></h3>
                
                <form action="{{ route('travel-photos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Drag & Drop Uploader UI wrapper -->
                    <div>
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-3">Select Image</label>
                        <div class="relative group cursor-pointer w-full bg-white/5 hover:bg-white/10 border-2 border-dashed border-white/10 hover:border-blue-500/50 rounded-2xl p-8 flex flex-col items-center justify-center transition-all duration-300">
                            <input type="file" name="image" required accept="image/*"
                                   class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                   onchange="document.getElementById('file-preview-name').innerText = this.files[0] ? this.files[0].name : 'No file selected'">
                            
                            <svg class="w-8 h-8 text-slate-400 group-hover:text-blue-500 transition-colors mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span class="text-xs text-slate-400 text-center font-bold" id="file-preview-name">Click to choose image or drag here</span>
                            <span class="text-[9px] text-slate-500 uppercase font-black tracking-widest mt-2">JPEG, PNG, WEBP (Max 5MB)</span>
                        </div>
                        @error('image')
                            <p class="text-rose-500 text-xs mt-1 font-bold">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="title" class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Title</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}"
                               class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-white text-sm focus:outline-none focus:border-blue-500 transition-colors"
                               placeholder="e.g. Majestic Taj Mahal Sunrise">
                        @error('title')
                            <p class="text-rose-500 text-xs mt-1 font-bold">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="location" class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Location</label>
                        <div class="relative">
                            <input type="text" id="location" name="location" value="{{ old('location') }}"
                                   class="w-full bg-white/5 border border-white/10 rounded-2xl pl-12 pr-5 py-4 text-white text-sm focus:outline-none focus:border-blue-500 transition-colors"
                                   placeholder="e.g. Agra, Uttar Pradesh">
                            <svg class="w-5 h-5 text-slate-500 absolute left-4 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        @error('location')
                            <p class="text-rose-500 text-xs mt-1 font-bold">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="caption" class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Caption / Memory</label>
                        <textarea id="caption" name="caption" rows="4"
                                  class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-white text-sm focus:outline-none focus:border-blue-500 transition-colors"
                                  placeholder="Describe the mood, journey, or memory of this photograph...">{{ old('caption') }}</textarea>
                        @error('caption')
                            <p class="text-rose-500 text-xs mt-1 font-bold">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="w-full btn-luxury py-4 text-[10px] tracking-widest font-black uppercase rounded-2xl flex items-center justify-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                        <span>Publish Photo</span>
                    </button>
                </form>
            </div>

            <!-- Photos Portfolio Grid -->
            <div class="lg:col-span-2 space-y-8 h-fit">
                <div class="glass p-8 rounded-[3rem] border-white/5 flex items-center justify-between">
                    <h3 class="text-xl font-black text-white uppercase tracking-tighter">My Uploaded <span class="text-emerald-500 italic">Memories</span></h3>
                    <span class="text-xs text-slate-500 font-bold uppercase tracking-widest">{{ $photos->count() }} Photos total</span>
                </div>

                @if($photos->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                        @foreach($photos as $photo)
                            <div class="glass rounded-3xl border-white/5 overflow-hidden shadow-xl group relative h-80 cursor-pointer flex flex-col justify-end"
                                 data-aos="fade-up"
                                 @click="lightboxOpen = true; activeImage = '{{ $photo->url }}'; activeTitle = '{{ addslashes($photo->title) }}'; activeCaption = '{{ addslashes($photo->caption) }}'; activeLocation = '{{ addslashes($photo->location) }}'">
                                
                                <!-- Background Image with zoom hover -->
                                <img src="{{ $photo->url }}" 
                                     class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 z-0" 
                                     alt="{{ $photo->title }}">
                                
                                <!-- Card Glass Overlay on bottom -->
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/20 to-transparent opacity-80 group-hover:opacity-90 transition-opacity duration-300 z-10"></div>
                                
                                <!-- Text Details Content -->
                                <div class="relative z-20 p-6 space-y-1 text-left w-full">
                                    @if($photo->location)
                                        <span class="inline-flex items-center text-[8px] font-black uppercase bg-blue-500/20 text-blue-400 border border-blue-500/30 px-2 py-0.5 rounded">
                                            <svg class="w-3.5 h-3.5 mr-1 text-blue-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                            {{ $photo->location }}
                                        </span>
                                    @endif
                                    <h4 class="text-sm font-black text-white uppercase tracking-tighter truncate group-hover:text-blue-500 transition-colors">
                                        {{ $photo->title }}
                                    </h4>
                                    <p class="text-[10px] text-slate-400 truncate leading-relaxed">
                                        {{ $photo->caption ?? 'No description added.' }}
                                    </p>
                                </div>

                                <!-- Delete Trigger form inside card -->
                                <form action="{{ route('travel-photos.destroy', $photo) }}" method="POST" 
                                      class="absolute top-4 right-4 z-30 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                                      @click.stop>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure you want to remove this memory?')"
                                            class="w-8 h-8 rounded-full bg-slate-950/80 border border-white/10 text-rose-500 flex items-center justify-center hover:bg-rose-500 hover:text-white transition-colors"
                                            title="Delete Photo">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="glass p-20 rounded-[3.5rem] border-white/5 text-center">
                        <div class="w-16 h-16 bg-slate-900 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-600 border border-white/5">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <p class="text-slate-400 font-bold italic text-sm">Your Travel Photo Gallery is empty.</p>
                        <p class="text-xs text-slate-600 mt-1">Publish your first travel snapshot using the form on the left.</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Overlay Image Lightbox Zoom Modal (Interactive Alpine.js) -->
        <template x-if="lightboxOpen">
            <div class="fixed inset-0 bg-slate-950/95 z-[999] flex items-center justify-center p-8 backdrop-blur-md animate-fade-in"
                 @keydown.escape.window="lightboxOpen = false"
                 @click="lightboxOpen = false">
                <button class="absolute top-6 right-6 text-slate-400 hover:text-white transition-colors" @click="lightboxOpen = false">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
                
                <div class="max-w-4xl w-full flex flex-col md:flex-row bg-slate-900 border border-white/10 rounded-[2.5rem] overflow-hidden shadow-2xl" @click.stop>
                    <div class="w-full md:w-3/5 bg-black flex items-center justify-center h-80 md:h-[32rem]">
                        <img :src="activeImage" class="max-h-full max-w-full object-contain" alt="">
                    </div>
                    
                    <div class="w-full md:w-2/5 p-10 flex flex-col justify-center space-y-6 text-left">
                        <div class="space-y-2">
                            <span class="inline-flex items-center text-[10px] font-black uppercase bg-blue-500/20 text-blue-400 border border-blue-500/30 px-3 py-1 rounded" x-show="activeLocation">
                                <svg class="w-4 h-4 mr-1 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <span x-text="activeLocation"></span>
                            </span>
                            <h3 class="text-2xl font-black text-white uppercase tracking-tighter leading-none" x-text="activeTitle"></h3>
                        </div>
                        <p class="text-sm leading-relaxed text-slate-300 whitespace-pre-line" x-text="activeCaption || 'No memory description recorded.'"></p>
                    </div>
                </div>
            </div>
        </template>
    </div>
</x-dashboard-layout>
