<x-admin-layout>
<div class="space-y-8 lg:space-y-12">
        <!-- Dashboard Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6" data-aos="fade-down">
            <div>
                <h1 class="text-3xl lg:text-4xl font-black text-slate-900 dark:text-white uppercase tracking-tighter">Command <span class="text-blue-600 italic">Center</span></h1>
                <p class="text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest mt-2">Overseeing Indian Tourism Operations</p>
            </div>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('admin.bookings.index') }}" class="btn-luxury py-3 px-6 text-xs text-center !bg-gradient-to-r !from-emerald-600/90 !to-emerald-500/90 hover:!from-emerald-600 hover:!to-emerald-500">Manage Bookings</a>
                <button class="btn-luxury py-3 px-6 text-xs text-center">Download Report</button>
            </div>
        </div>

        <!-- Comprehensive Analytics Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 lg:gap-8">
            <!-- Revenue -->
            <x-luxury-card class="group hover:border-blue-600/30" data-aos="fade-up" data-aos-delay="0">
                <div class="w-12 h-12 bg-blue-100 dark:bg-blue-600/20 rounded-2xl flex items-center justify-center mb-6 text-blue-600 dark:text-blue-500 group-hover:scale-110 transition-transform shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <p class="text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-2">Total Revenue</p>
                <h3 class="text-2xl lg:text-3xl font-black text-slate-900 dark:text-white tracking-tighter">₹{{ number_format($stats['total_revenue']) }}</h3>
            </x-luxury-card>
            <!-- Users -->
            <x-luxury-card class="group hover:border-emerald-600/30" data-aos="fade-up" data-aos-delay="100">
                <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-600/20 rounded-2xl flex items-center justify-center mb-6 text-emerald-600 dark:text-emerald-500 group-hover:scale-110 transition-transform shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <div class="flex justify-between items-end">
                    <div>
                        <p class="text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-2">Total Users</p>
                        <h3 class="text-2xl lg:text-3xl font-black text-slate-900 dark:text-white tracking-tighter">{{ number_format($stats['total_users']) }}</h3>
                    </div>
                    <div class="text-right">
                        <p class="text-[10px] font-bold text-emerald-600 dark:text-emerald-400 bg-emerald-100 dark:bg-emerald-900/30 px-2 py-1 rounded-lg">+{{ $stats['recent_users'] }} this week</p>
                    </div>
                </div>
            </x-luxury-card>
            <!-- Bookings -->
            <x-luxury-card class="group hover:border-purple-600/30" data-aos="fade-up" data-aos-delay="200">
                <div class="w-12 h-12 bg-purple-100 dark:bg-purple-600/20 rounded-2xl flex items-center justify-center mb-6 text-purple-600 dark:text-purple-500 group-hover:scale-110 transition-transform shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <div class="flex justify-between items-end">
                    <div>
                        <p class="text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-2">Total Bookings</p>
                        <h3 class="text-2xl lg:text-3xl font-black text-slate-900 dark:text-white tracking-tighter">{{ number_format($stats['total_bookings']) }}</h3>
                    </div>
                    <div class="text-right">
                        <p class="text-[10px] font-bold text-blue-600 dark:text-blue-400 bg-blue-100 dark:bg-blue-900/30 px-2 py-1 rounded-lg">{{ $stats['confirmed_bookings'] }} Confirmed</p>
                    </div>
                </div>
            </x-luxury-card>
            <!-- Pending -->
            <x-luxury-card class="group hover:border-amber-600/30" data-aos="fade-up" data-aos-delay="300">
                <div class="w-12 h-12 bg-amber-100 dark:bg-amber-600/20 rounded-2xl flex items-center justify-center mb-6 text-amber-600 dark:text-amber-500 group-hover:scale-110 transition-transform shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div class="flex justify-between items-end">
                    <div>
                        <p class="text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-2">Pending Actions</p>
                        <h3 class="text-2xl lg:text-3xl font-black text-slate-900 dark:text-white tracking-tighter">{{ number_format($stats['pending_bookings']) }}</h3>
                    </div>
                </div>
            </x-luxury-card>
        </div>

        <!-- Deep Analytics row -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 lg:gap-6">
            <div class="bg-white/80 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-[2rem] p-6 text-center shadow-sm">
                <p class="text-[10px] uppercase tracking-widest text-slate-500 dark:text-slate-400 font-black mb-1">Hotel Bookings</p>
                <p class="text-3xl font-black text-slate-900 dark:text-white">{{ $stats['hotel_bookings'] }}</p>
            </div>
            <div class="bg-white/80 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-[2rem] p-6 text-center shadow-sm">
                <p class="text-[10px] uppercase tracking-widest text-slate-500 dark:text-slate-400 font-black mb-1">Package Bookings</p>
                <p class="text-3xl font-black text-slate-900 dark:text-white">{{ $stats['package_bookings'] }}</p>
            </div>
            <div class="bg-white/80 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-[2rem] p-6 text-center shadow-sm">
                <p class="text-[10px] uppercase tracking-widest text-slate-500 dark:text-slate-400 font-black mb-1">Active Users</p>
                <p class="text-3xl font-black text-slate-900 dark:text-white">{{ $stats['active_users'] }}</p>
            </div>
            <div class="bg-white/80 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-[2rem] p-6 text-center shadow-sm">
                <p class="text-[10px] uppercase tracking-widest text-slate-500 dark:text-slate-400 font-black mb-1">Cancellations</p>
                <p class="text-3xl font-black text-rose-500">{{ $stats['cancelled_bookings'] }}</p>
            </div>
        </div>

        <!-- Charts & Activity -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
            <!-- Analytics Graph -->
            <div class="lg:col-span-2 glass p-6 lg:p-10 rounded-[3rem] lg:rounded-[4rem]" data-aos="fade-right">
                <div class="flex items-center justify-between mb-8">
                    <h3 class="text-xl lg:text-2xl font-black text-slate-900 dark:text-white uppercase tracking-tighter">Growth <span class="text-blue-600 italic">Dynamics</span></h3>
                    <div class="flex space-x-4">
                        <span class="flex items-center text-[10px] font-black text-blue-600 dark:text-blue-400 uppercase tracking-widest bg-blue-50 dark:bg-transparent px-2 py-1 rounded-md"><div class="w-2 h-2 rounded-full bg-blue-500 mr-2"></div> Revenue</span>
                        <span class="flex items-center text-[10px] font-black text-purple-600 dark:text-purple-400 uppercase tracking-widest bg-purple-50 dark:bg-transparent px-2 py-1 rounded-md"><div class="w-2 h-2 rounded-full bg-purple-500 mr-2"></div> Bookings</span>
                    </div>
                </div>
                <div class="h-64 lg:h-80 w-full relative">
                    <canvas id="growthChart"></canvas>
                </div>
            </div>

            <!-- Recent Bookings -->
            <div class="glass rounded-[3rem] lg:rounded-[4rem] overflow-hidden flex flex-col" data-aos="fade-left">
                <div class="p-6 lg:p-8 border-b border-slate-200 dark:border-white/5 bg-slate-50/50 dark:bg-transparent">
                    <h3 class="text-xl font-black text-slate-900 dark:text-white uppercase tracking-tighter">Live <span class="text-emerald-600 italic">Transactions</span></h3>
                </div>
                <div class="flex-grow overflow-y-auto">
                    @forelse($recentBookings as $booking)
                    <div class="p-6 border-b border-slate-100 dark:border-white/5 hover:bg-slate-50 dark:hover:bg-white/5 transition-colors">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center space-x-3">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($booking->user->name ?? 'User') }}&background=1e293b&color=fff" class="w-10 h-10 rounded-xl shadow-md" alt="">
                                <div>
                                    <span class="text-xs font-black text-slate-900 dark:text-white uppercase tracking-widest block">{{ $booking->user->name ?? 'User' }}</span>
                                    <span class="text-[9px] text-slate-500 uppercase tracking-widest font-bold">{{ $booking->bookable->name ?? 'Unknown' }}</span>
                                </div>
                            </div>
                            <span class="text-[9px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">{{ $booking->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="flex items-center justify-between pl-13">
                            <span class="text-[11px] font-black text-blue-600 dark:text-blue-500 uppercase tracking-widest bg-blue-50 dark:bg-blue-900/20 px-2 py-1 rounded-md">₹{{ number_format($booking->total_price) }}</span>
                            <span class="text-[9px] font-black {{ $booking->status === 'confirmed' ? 'text-emerald-600 dark:text-emerald-500 bg-emerald-50 dark:bg-emerald-900/20' : ($booking->status === 'cancelled' ? 'text-rose-600 dark:text-rose-500 bg-rose-50 dark:bg-rose-900/20' : 'text-amber-600 dark:text-amber-500 bg-amber-50 dark:bg-amber-900/20') }} uppercase tracking-widest px-3 py-1 rounded-full">{{ $booking->status }}</span>
                        </div>
                    </div>
                    @empty
                    <div class="p-20 text-center text-slate-400 font-bold italic">No live operations.</div>
                    @endforelse
                </div>
                <a href="{{ route('admin.bookings.index') }}" class="p-6 text-center text-[10px] font-black text-blue-600 uppercase tracking-widest hover:bg-blue-50 dark:hover:bg-white/5 transition-all block bg-white dark:bg-white/5">View All Transactions</a>
            </div>
        </div>

        <!-- Inventory Stats -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 lg:gap-8">
            <div class="glass p-6 lg:p-8 flex items-center justify-between rounded-[2rem] lg:rounded-[3rem]">
                <div>
                    <p class="text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-1">Destinations Database</p>
                    <h3 class="text-3xl font-black text-slate-900 dark:text-white tracking-tighter">{{ $stats['total_destinations'] }} <span class="text-sm text-slate-500 dark:text-slate-400 font-medium tracking-normal">locations</span></h3>
                </div>
                <div class="w-12 h-12 bg-slate-100 dark:bg-white/5 rounded-full flex items-center justify-center text-slate-500 dark:text-slate-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
            </div>
            <div class="glass p-6 lg:p-8 flex items-center justify-between rounded-[2rem] lg:rounded-[3rem]">
                <div>
                    <p class="text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-1">Tour Packages</p>
                    <h3 class="text-3xl font-black text-slate-900 dark:text-white tracking-tighter">{{ $stats['total_packages'] }} <span class="text-sm text-slate-500 dark:text-slate-400 font-medium tracking-normal">active</span></h3>
                </div>
                <div class="w-12 h-12 bg-slate-100 dark:bg-white/5 rounded-full flex items-center justify-center text-slate-500 dark:text-slate-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"></path></svg>
                </div>
            </div>
            <div class="glass p-6 lg:p-8 flex items-center justify-between rounded-[2rem] lg:rounded-[3rem]">
                <div>
                    <p class="text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-1">Partner Hotels</p>
                    <h3 class="text-3xl font-black text-slate-900 dark:text-white tracking-tighter">{{ $stats['total_hotels'] }} <span class="text-sm text-slate-500 dark:text-slate-400 font-medium tracking-normal">properties</span></h3>
                </div>
                <div class="w-12 h-12 bg-slate-100 dark:bg-white/5 rounded-full flex items-center justify-center text-slate-500 dark:text-slate-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
            </div>
        </div>

        <!-- Activity Logs & Popularity -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
            <div class="lg:col-span-2 glass p-6 lg:p-10 rounded-[3rem] lg:rounded-[4rem]" data-aos="fade-up">
                <h3 class="text-xl lg:text-2xl font-black text-slate-900 dark:text-white uppercase tracking-tighter mb-8">Admin <span class="text-blue-600 italic">Activity</span></h3>
                <div class="space-y-4">
                    @forelse($recentActivities as $activity)
                        <div class="flex items-center justify-between bg-white/60 dark:bg-white/5 p-4 rounded-2xl border border-slate-200 dark:border-white/5 hover:shadow-md transition-shadow">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 rounded-xl bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-500 dark:text-slate-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <div>
                                    <p class="text-xs font-black text-slate-900 dark:text-white uppercase tracking-widest">{{ str_replace('_', ' ', $activity->action) }}</p>
                                    <p class="text-[10px] text-slate-500 font-bold mt-0.5">{{ $activity->admin->name ?? 'Admin' }} • {{ $activity->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest bg-slate-100 dark:bg-slate-800 px-2 py-1 rounded-md">#{{ $activity->id }}</span>
                        </div>
                    @empty
                        <p class="text-slate-500 text-center py-8">No recent activity yet.</p>
                    @endforelse
                </div>
            </div>

            <div class="glass p-6 lg:p-10 rounded-[3rem] lg:rounded-[4rem]" data-aos="fade-up" data-aos-delay="100">
                <h3 class="text-xl font-black text-slate-900 dark:text-white uppercase tracking-tighter mb-8">Trending <span class="text-emerald-600 dark:text-emerald-500 italic">Demand</span></h3>
                <div class="space-y-8">
                    <div>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-4 flex items-center"><svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg> Destinations</p>
                        @foreach($topDestinations as $item)
                            <div class="flex items-center justify-between text-sm font-bold text-slate-700 dark:text-slate-200 mb-3 bg-white/50 dark:bg-transparent p-2 dark:p-0 rounded-lg">
                                <span>{{ $item->bookable->name ?? 'Destination' }}</span>
                                <span class="text-emerald-600 dark:text-emerald-400 font-black bg-emerald-50 dark:bg-emerald-900/30 px-2 py-0.5 rounded-md text-xs">{{ $item->total }}</span>
                            </div>
                        @endforeach
                    </div>
                    <div>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-4 flex items-center"><svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg> Packages</p>
                        @foreach($topPackages as $item)
                            <div class="flex items-center justify-between text-sm font-bold text-slate-700 dark:text-slate-200 mb-3 bg-white/50 dark:bg-transparent p-2 dark:p-0 rounded-lg">
                                <span>{{ $item->bookable->name ?? 'Package' }}</span>
                                <span class="text-blue-600 dark:text-blue-400 font-black bg-blue-50 dark:bg-blue-900/30 px-2 py-0.5 rounded-md text-xs">{{ $item->total }}</span>
                            </div>
                        @endforeach
                    </div>
                    <div>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-4 flex items-center"><svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg> Hotels</p>
                        @foreach($topHotels as $item)
                            <div class="flex items-center justify-between text-sm font-bold text-slate-700 dark:text-slate-200 mb-3 bg-white/50 dark:bg-transparent p-2 dark:p-0 rounded-lg">
                                <span>{{ $item->bookable->name ?? 'Hotel' }}</span>
                                <span class="text-amber-600 dark:text-amber-400 font-black bg-amber-50 dark:bg-amber-900/30 px-2 py-0.5 rounded-md text-xs">{{ $item->total }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('dashboardChart', () => ({
                init() {
                    const chartData = @json($chartData);
                    const ctx = document.getElementById('growthChart');
                    
                    if (!ctx) return;

                    // A helper to determine colors based on current dark mode state
                    const isDark = () => document.documentElement.classList.contains('dark');
                    
                    const chart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: chartData.labels,
                            datasets: [
                                {
                                    label: 'Revenue (₹)',
                                    data: chartData.revenue,
                                    borderColor: '#3b82f6',
                                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                                    fill: true,
                                    tension: 0.4,
                                    borderWidth: 3,
                                    pointBackgroundColor: '#3b82f6',
                                    pointBorderColor: '#fff',
                                    pointBorderWidth: 2,
                                    pointRadius: 4,
                                    pointHoverRadius: 6,
                                    yAxisID: 'y'
                                },
                                {
                                    label: 'Bookings',
                                    data: chartData.bookings,
                                    borderColor: '#8b5cf6',
                                    backgroundColor: 'transparent',
                                    borderDash: [5, 5],
                                    fill: false,
                                    tension: 0.4,
                                    borderWidth: 3,
                                    pointBackgroundColor: '#8b5cf6',
                                    pointBorderColor: '#fff',
                                    pointBorderWidth: 2,
                                    pointRadius: 4,
                                    pointHoverRadius: 6,
                                    yAxisID: 'y1'
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            interaction: {
                                mode: 'index',
                                intersect: false,
                            },
                            plugins: { 
                                legend: { display: false },
                                tooltip: {
                                    backgroundColor: isDark() ? 'rgba(15, 23, 42, 0.9)' : 'rgba(255, 255, 255, 0.9)',
                                    titleColor: isDark() ? '#fff' : '#0f172a',
                                    bodyColor: isDark() ? '#cbd5e1' : '#475569',
                                    borderColor: isDark() ? 'rgba(255,255,255,0.1)' : 'rgba(0,0,0,0.1)',
                                    borderWidth: 1,
                                    padding: 12,
                                    boxPadding: 6,
                                    usePointStyle: true,
                                    callbacks: {
                                        label: function(context) {
                                            let label = context.dataset.label || '';
                                            if (label) label += ': ';
                                            if (context.datasetIndex === 0) {
                                                label += '₹' + context.parsed.y.toLocaleString();
                                            } else {
                                                label += context.parsed.y;
                                            }
                                            return label;
                                        }
                                    }
                                }
                            },
                            scales: {
                                x: { 
                                    grid: { display: false, drawBorder: false }, 
                                    ticks: { color: isDark() ? '#64748b' : '#94a3b8', font: { weight: 'bold', size: 10 } } 
                                },
                                y: { 
                                    type: 'linear',
                                    display: true,
                                    position: 'left',
                                    grid: { color: isDark() ? 'rgba(255,255,255,0.05)' : 'rgba(0,0,0,0.05)', drawBorder: false }, 
                                    ticks: { 
                                        color: '#3b82f6', 
                                        font: { weight: 'bold', size: 10 },
                                        callback: function(value) { return '₹' + (value/1000) + 'k'; }
                                    } 
                                },
                                y1: {
                                    type: 'linear',
                                    display: true,
                                    position: 'right',
                                    grid: { drawOnChartArea: false, drawBorder: false },
                                    ticks: { color: '#8b5cf6', font: { weight: 'bold', size: 10 }, stepSize: 1 }
                                }
                            }
                        }
                    });

                    // Watch for dark mode changes using MutationObserver on HTML class
                    const observer = new MutationObserver(() => {
                        const dark = isDark();
                        chart.options.plugins.tooltip.backgroundColor = dark ? 'rgba(15, 23, 42, 0.9)' : 'rgba(255, 255, 255, 0.9)';
                        chart.options.plugins.tooltip.titleColor = dark ? '#fff' : '#0f172a';
                        chart.options.plugins.tooltip.bodyColor = dark ? '#cbd5e1' : '#475569';
                        chart.options.plugins.tooltip.borderColor = dark ? 'rgba(255,255,255,0.1)' : 'rgba(0,0,0,0.1)';
                        chart.options.scales.x.ticks.color = dark ? '#64748b' : '#94a3b8';
                        chart.options.scales.y.grid.color = dark ? 'rgba(255,255,255,0.05)' : 'rgba(0,0,0,0.05)';
                        chart.update();
                    });
                    observer.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });
                }
            }));
        });
    </script>
    <div x-data="dashboardChart"></div>
    @endpush
</x-admin-layout>
