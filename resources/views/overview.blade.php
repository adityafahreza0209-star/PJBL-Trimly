<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Overview & Analytics - Trimly</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Geist:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-primary font-sans antialiased">
  <div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
  <aside class="w-[76px] bg-primary h-screen sticky top-0 flex flex-col justify-between shrink-0 max-sm:w-[57px] z-40">
    <div class="flex flex-col items-center w-full">
      <a class="h-[88px] w-full grid place-items-center no-underline font-serif font-bold text-3xl text-white border-b border-primary/20" href="{{ url('/dashboard') }}">T<span class="text-accent">.</span></a>
        <nav class="flex flex-col gap-4 pt-7 w-full items-center">
          <a href="{{ url('dashboard') }}#schedule" class="relative group w-11 h-11 rounded-xl grid place-items-center text-slate-400 no-underline text-2xl transition-colors hover:text-white hover:bg-white/10">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            <span class="absolute opacity-0 group-hover:opacity-100 bg-primary text-white text-xs px-2 py-1 rounded shadow-lg left-14 transition-opacity z-50 whitespace-nowrap pointer-events-none">Live Schedule</span>
          </a>
          <a href="{{ url('bookings') }}" class="relative group w-11 h-11 rounded-xl grid place-items-center text-slate-400 no-underline text-2xl transition-colors hover:text-white hover:bg-white/10">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
            <span class="absolute opacity-0 group-hover:opacity-100 bg-primary text-white text-xs px-2 py-1 rounded shadow-lg left-14 transition-opacity z-50 whitespace-nowrap pointer-events-none">All Bookings</span>
          </a>
          <a href="{{ url('payments') }}" class="relative group w-11 h-11 rounded-xl grid place-items-center text-slate-400 no-underline text-2xl transition-colors hover:text-white hover:bg-white/10">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
            <span class="absolute opacity-0 group-hover:opacity-100 bg-primary text-white text-xs px-2 py-1 rounded shadow-lg left-14 transition-opacity z-50 whitespace-nowrap pointer-events-none">Payments</span>
          </a>
          <a href="{{ url('leave-requests') }}" class="relative group w-11 h-11 rounded-xl grid place-items-center text-slate-400 no-underline text-2xl transition-colors hover:text-white hover:bg-white/10">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
            <span class="absolute opacity-0 group-hover:opacity-100 bg-primary text-white text-xs px-2 py-1 rounded shadow-lg left-14 transition-opacity z-50 whitespace-nowrap pointer-events-none">Leave Requests</span>
          </a>
          <a href="{{ url('reviews') }}" class="relative group w-11 h-11 rounded-xl grid place-items-center text-slate-400 no-underline text-2xl transition-colors hover:text-white hover:bg-white/10">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
            <span class="absolute opacity-0 group-hover:opacity-100 bg-primary text-white text-xs px-2 py-1 rounded shadow-lg left-14 transition-opacity z-50 whitespace-nowrap pointer-events-none">Reviews</span>
          </a>
          <a href="{{ url('overview') }}" class="relative group w-11 h-11 rounded-xl grid place-items-center text-accent bg-accent/10 no-underline text-2xl transition-colors hover:text-accent/80 hover:bg-accent/20">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
            <span class="absolute opacity-0 group-hover:opacity-100 bg-primary text-white text-xs px-2 py-1 rounded shadow-lg left-14 transition-opacity z-50 whitespace-nowrap pointer-events-none">Overview</span>
          </a>
          <a href="{{ url('admin-settings') }}" class="relative group w-11 h-11 rounded-xl grid place-items-center text-slate-400 no-underline text-2xl transition-colors hover:text-white hover:bg-white/10">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
            <span class="absolute opacity-0 group-hover:opacity-100 bg-primary text-white text-xs px-2 py-1 rounded shadow-lg left-14 transition-opacity z-50 whitespace-nowrap pointer-events-none">Studio Settings</span>
          </a>
        </nav>
    </div>
    <div class="py-6 flex justify-center w-full border-t border-white/10">
      <a href="{{ url('admin-account') }}" class="relative group w-9 h-9 rounded-full bg-white grid place-items-center font-display font-bold text-base text-primary no-underline hover:ring-2 hover:ring-white/20 transition-all hover:scale-105">
        A
        <span class="absolute opacity-0 group-hover:opacity-100 bg-primary text-white text-xs px-2 py-1 rounded shadow-lg left-14 transition-opacity z-50 whitespace-nowrap pointer-events-none">Account</span>
      </a>
    </div>
  </aside>

    <div class="flex-1 flex flex-col overflow-hidden bg-surface">
      <header class="flex flex-col sm:flex-row items-start sm:items-center justify-between px-6 lg:px-8 py-6 border-b border-border-light bg-white">
        <div>
          <p class="text-[11px] font-bold tracking-[0.05em] uppercase text-slate-500 mb-1">Analytics &amp; Reports</p>
          <h1 class="text-[24px] font-bold text-slate-900">Business Overview</h1>
        </div>
        <div class="flex items-center gap-4 mt-4 sm:mt-0">
          <div class="flex items-center gap-2 px-4 py-2 bg-slate-100 rounded-lg cursor-pointer hover:bg-slate-200 transition-colors">
            <span class="font-semibold text-sm text-slate-700">{{ now()->format('F Y') }}</span>
            <span class="text-xs text-slate-500">▾</span>
          </div>
          <x-button-outline>Download Report</x-button-outline>
        </div>
      </header>

      @if($subscriptionStatus === 'trial')
      <div class="bg-amber-50 border-b border-amber-100 px-6 lg:px-8 py-2.5 flex items-center justify-between">
        <div class="flex items-center gap-2 text-sm text-amber-800 font-medium">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
          <span>{{ $daysLeft }} days left in your free trial</span>
        </div>
        <a href="{{ url('admin-settings') }}" class="text-xs font-bold bg-amber-500 text-white px-3 py-1.5 rounded-md hover:bg-amber-600 transition-colors cursor-pointer no-underline shadow-sm">Upgrade Now</a>
      </div>
      @endif

      <main class="flex-1 overflow-y-auto p-6 lg:p-8">
        <!-- KPI Row -->
        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
          <x-card class="p-6 bg-white shadow-sm border border-border-light relative overflow-hidden">
            <svg class="absolute top-6 right-6 w-10 h-10 text-slate-200 opacity-50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
            <div class="text-[11px] font-bold uppercase tracking-[0.05em] text-slate-500 mb-2 relative">Gross Revenue</div>
            <div class="text-[28px] font-bold text-slate-900 mb-2 relative leading-tight">Rp {{ number_format($grossRevenue, 0, ',', '.') }}</div>
            @if($revenueChangePercent !== null && $revenueChangePercent > 0)
              <div class="text-xs font-medium text-emerald-600 flex items-center gap-1 relative">&uarr; {{ $revenueChangePercent }}% <span class="text-slate-500 font-normal">vs last month</span></div>
            @elseif($revenueChangePercent !== null && $revenueChangePercent < 0)
              <div class="text-xs font-medium text-rose-600 flex items-center gap-1 relative">&darr; {{ abs($revenueChangePercent) }}% <span class="text-slate-500 font-normal">vs last month</span></div>
            @elseif($revenueChangePercent !== null && $revenueChangePercent == 0)
              <div class="text-xs font-medium text-slate-500 flex items-center gap-1 relative">0% <span class="text-slate-500 font-normal">vs last month</span></div>
            @else
              <div class="text-xs font-normal text-slate-500 relative">vs last month</div>
            @endif
          </x-card>
          <x-card class="p-6 bg-white shadow-sm border border-border-light relative overflow-hidden">
            <svg class="absolute top-6 right-6 w-10 h-10 text-slate-200 opacity-50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
            <div class="text-[11px] font-bold uppercase tracking-[0.05em] text-slate-500 mb-2 relative">Total Bookings</div>
            <div class="text-[28px] font-bold text-slate-900 mb-2 relative leading-tight">{{ number_format($totalBookings, 0, ',', '.') }}</div>
            @if($bookingsChangePercent !== null && $bookingsChangePercent > 0)
              <div class="text-xs font-medium text-emerald-600 flex items-center gap-1 relative">&uarr; {{ $bookingsChangePercent }}% <span class="text-slate-500 font-normal">vs last month</span></div>
            @elseif($bookingsChangePercent !== null && $bookingsChangePercent < 0)
              <div class="text-xs font-medium text-rose-600 flex items-center gap-1 relative">&darr; {{ abs($bookingsChangePercent) }}% <span class="text-slate-500 font-normal">vs last month</span></div>
            @elseif($bookingsChangePercent !== null && $bookingsChangePercent == 0)
              <div class="text-xs font-medium text-slate-500 flex items-center gap-1 relative">0% <span class="text-slate-500 font-normal">vs last month</span></div>
            @else
              <div class="text-xs font-normal text-slate-500 relative">vs last month</div>
            @endif
          </x-card>
          <x-card class="p-6 bg-white shadow-sm border border-border-light relative overflow-hidden">
            <svg class="absolute top-6 right-6 w-10 h-10 text-slate-200 opacity-50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
            <div class="text-[11px] font-bold uppercase tracking-[0.05em] text-slate-500 mb-2 relative">Average Ticket Size</div>
            <div class="text-[28px] font-bold text-slate-900 mb-2 relative leading-tight">Rp {{ number_format($avgTicketSize, 0, ',', '.') }}</div>
            @if($avgTicketChangePercent !== null && $avgTicketChangePercent > 0)
              <div class="text-xs font-medium text-emerald-600 flex items-center gap-1 relative">&uarr; {{ $avgTicketChangePercent }}% <span class="text-slate-500 font-normal">vs last month</span></div>
            @elseif($avgTicketChangePercent !== null && $avgTicketChangePercent < 0)
              <div class="text-xs font-medium text-rose-600 flex items-center gap-1 relative">&darr; {{ abs($avgTicketChangePercent) }}% <span class="text-slate-500 font-normal">vs last month</span></div>
            @elseif($avgTicketChangePercent !== null && $avgTicketChangePercent == 0)
              <div class="text-xs font-medium text-slate-500 flex items-center gap-1 relative">0% <span class="text-slate-500 font-normal">vs last month</span></div>
            @else
              <div class="text-xs font-normal text-slate-500 relative">vs last month</div>
            @endif
          </x-card>
          <x-card class="p-6 bg-white shadow-sm border border-border-light relative overflow-hidden">
            <svg class="absolute top-6 right-6 w-10 h-10 text-slate-200 opacity-50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
            <div class="text-[11px] font-bold uppercase tracking-[0.05em] text-slate-500 mb-2 relative">New Customers</div>
            <div class="text-[28px] font-bold text-slate-900 mb-2 relative leading-tight">{{ number_format($newCustomers, 0, ',', '.') }}</div>
            @if($newCustomersChangePercent !== null && $newCustomersChangePercent > 0)
              <div class="text-xs font-medium text-emerald-600 flex items-center gap-1 relative">&uarr; {{ $newCustomersChangePercent }}% <span class="text-slate-500 font-normal">vs last month</span></div>
            @elseif($newCustomersChangePercent !== null && $newCustomersChangePercent < 0)
              <div class="text-xs font-medium text-rose-600 flex items-center gap-1 relative">&darr; {{ abs($newCustomersChangePercent) }}% <span class="text-slate-500 font-normal">vs last month</span></div>
            @elseif($newCustomersChangePercent !== null && $newCustomersChangePercent == 0)
              <div class="text-xs font-medium text-slate-500 flex items-center gap-1 relative">0% <span class="text-slate-500 font-normal">vs last month</span></div>
            @else
              <div class="text-xs font-normal text-slate-500 relative">vs last month</div>
            @endif
          </x-card>
        </section>

        <!-- 12-Column Strict Grid Container -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
          <!-- Main Chart Area (lg:col-span-8) -->
          <div class="lg:col-span-8 flex flex-col gap-6">
            <x-card padding="none" class="bg-white shadow-sm border border-border-light overflow-hidden">
              <div class="px-6 py-4 border-b border-border-light flex items-center justify-between">
                <h2 class="text-[18px] font-semibold text-slate-900">Revenue Trends</h2>
                <div class="flex bg-slate-100 p-1 rounded-lg">
                  <button type="button" class="px-3 py-1 text-xs font-semibold rounded-md bg-white shadow-sm text-slate-900">Weekly</button>
                  <button type="button" class="px-3 py-1 text-xs font-medium rounded-md text-slate-500 hover:text-slate-900 transition-colors">Monthly</button>
                </div>
              </div>
              <div class="p-6 h-80 relative flex items-end pt-10">
                <!-- Premium CSS Bar Chart -->
                <div class="w-full h-full flex relative">
                  <div class="flex flex-col justify-between h-full text-xs text-slate-500 font-medium pr-4 w-12 border-r border-border-light">
                    @foreach($chartScales as $scaleLabel)
                      <span>{{ $scaleLabel }}</span>
                    @endforeach
                  </div>
                  <div class="flex-1 flex items-end justify-around h-full relative pl-4 pb-6">
                    <div class="absolute inset-0 pl-4 flex flex-col justify-between pointer-events-none">
                      <i class="w-full border-t border-slate-100"></i>
                      <i class="w-full border-t border-slate-100"></i>
                      <i class="w-full border-t border-slate-100"></i>
                      <i class="w-full border-t border-slate-200"></i>
                    </div>
                    @foreach($weeklyRevenue as $label => $val)
                      @php
                        $isHighest = ($weeklyRevenueMax > 0 && $val === $weeklyRevenueMax);
                        $barHeight = $weeklyHeights[$label] ?? 5;
                      @endphp
                      <div class="relative w-12 md:w-16 h-full flex items-end group" title="{{ $label }}: Rp {{ number_format($val, 0, ',', '.') }}">
                        @if($isHighest)
                          <div class="w-full bg-accent rounded-t-sm shadow-md transition-all duration-300" style="height: {{ $barHeight }}%;"></div>
                          <span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-xs font-bold text-accent">{{ $label }}</span>
                        @else
                          <div class="w-full bg-slate-200 rounded-t-sm transition-all duration-300 group-hover:bg-accent/50" style="height: {{ $barHeight }}%;"></div>
                          <span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-xs text-slate-500 font-medium">{{ $label }}</span>
                        @endif
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </x-card>

            <x-card padding="none" class="bg-white shadow-sm border border-border-light overflow-hidden">
              <div class="px-6 py-4 border-b border-border-light">
                <h2 class="text-[18px] font-semibold text-slate-900">Capster Performance</h2>
              </div>
              <div class="divide-y divide-border-light">
                @forelse($topCapsters as $index => $capster)
                  @php
                    $colors = ['bg-amber-700', 'bg-emerald-600', 'bg-slate-500'];
                    $color = $colors[$index % count($colors)];
                  @endphp
                  <div class="flex items-center gap-4 px-6 py-4 hover:bg-slate-50 transition-colors">
                    <div class="w-10 h-10 rounded-full {{ $color }} text-white flex items-center justify-center font-bold text-sm shrink-0">{{ $capster['initials'] }}</div>
                    <div class="flex-1 min-w-0">
                      <h4 class="text-sm font-semibold text-slate-900">{{ $capster['name'] }}</h4>
                      <p class="text-xs text-slate-500">{{ $capster['cuts'] }} Cuts</p>
                    </div>
                    <div class="w-1/3 min-w-[120px]">
                      <div class="text-sm font-semibold text-slate-900 text-right mb-1">Rp {{ number_format($capster['revenue'], 0, ',', '.') }}</div>
                      <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
                        <div class="h-full bg-accent rounded-full" style="width: {{ $capster['bar_percent'] }}%;"></div>
                      </div>
                    </div>
                  </div>
                @empty
                  <div class="px-6 py-8 text-center text-sm text-slate-500">
                    Belum ada data kinerja capster bulan ini.
                  </div>
                @endforelse
              </div>
            </x-card>
          </div>

          <!-- Side Column (lg:col-span-4) -->
          <div class="lg:col-span-4 flex flex-col gap-6">
            <x-card padding="none" class="bg-white shadow-sm border border-border-light overflow-hidden">
              <div class="px-6 py-4 border-b border-border-light">
                <h2 class="text-[18px] font-semibold text-slate-900">Top Services</h2>
              </div>
              <div class="p-6">
                <ul class="flex flex-col gap-4">
                  @forelse($topServices as $index => $service)
                    <li class="flex items-center gap-4">
                      @if($index === 0)
                        <span class="w-8 h-8 rounded-full bg-accent/15 text-accent flex items-center justify-center font-bold text-xs shrink-0">{{ $index + 1 }}</span>
                      @else
                        <span class="w-8 h-8 rounded-full bg-slate-100 text-slate-700 flex items-center justify-center font-bold text-xs shrink-0">{{ $index + 1 }}</span>
                      @endif
                      <div class="flex-1 min-w-0">
                        <strong class="block text-sm font-semibold text-slate-900">{{ $service['name'] }}</strong>
                        <small class="block text-xs text-slate-500">{{ $service['booking_count'] }} bookings</small>
                      </div>
                    </li>
                  @empty
                    <li class="text-sm text-slate-500 text-center py-4">Belum ada data layanan bulan ini.</li>
                  @endforelse
                </ul>
              </div>
            </x-card>

            <div class="bg-primary text-white rounded-xl shadow-sm p-6 relative overflow-hidden">
              <div class="absolute -right-10 -top-10 w-32 h-32 bg-white opacity-10 rounded-full blur-2xl"></div>
              <div class="relative z-10">
                <h3 class="text-[18px] font-semibold text-white mb-2">Optimize Schedule</h3>
                <p class="text-sm text-slate-300 mb-6 leading-relaxed">Mondays and Tuesdays have 40% lower booking rates per August. Consider setting up happy hour promos.</p>
                <x-button-accent class="w-full justify-center">Set up Promo</x-button-accent>
              </div>
            </div>
          </div>
        </div>

      </main>
    </div>
  </div>
</body>
</html>
