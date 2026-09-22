<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Dashboard — {{ $barbershop->name }}</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Geist:wght@400;500;600;700&family=Outfit:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <style>
    [x-cloak] { display: none !important; }
  </style>
</head>
<body class="bg-surface text-primary font-sans antialiased m-0">
<div class="flex min-h-screen">
  <aside class="w-[76px] bg-primary h-screen sticky top-0 flex flex-col justify-between shrink-0 max-sm:w-[57px] z-40">
    <div class="flex flex-col items-center w-full">
      <a class="h-[88px] w-full grid place-items-center no-underline font-serif font-bold text-3xl text-white border-b border-primary/20" href="{{ url('/dashboard') }}">T<span class="text-accent">.</span></a>
        <nav class="flex flex-col gap-4 pt-7 w-full items-center">
          <a href="{{ url('dashboard') }}#schedule" class="relative group w-11 h-11 rounded-xl grid place-items-center text-accent bg-accent/10 no-underline text-2xl transition-colors hover:text-accent/80 hover:bg-accent/20">
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
          <a href="{{ url('overview') }}" class="relative group w-11 h-11 rounded-xl grid place-items-center text-slate-400 no-underline text-2xl transition-colors hover:text-white hover:bg-white/10">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
            <span class="absolute opacity-0 group-hover:opacity-100 bg-primary text-white text-xs px-2 py-1 rounded shadow-lg left-14 transition-opacity z-50 whitespace-nowrap pointer-events-none">Overview</span>
          </a>
          <a href="{{ url('admin-settings') }}" class="relative group w-11 h-11 rounded-xl grid place-items-center text-slate-400 no-underline text-2xl transition-colors hover:text-white hover:bg-white/10">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
            <span class="absolute opacity-0 group-hover:opacity-100 bg-primary text-white text-xs px-2 py-1 rounded shadow-lg left-14 transition-opacity z-50 whitespace-nowrap pointer-events-none">Studio Settings</span>
          </a>
        </nav>
    </div>
    <div class="py-6 flex justify-center w-full">
      <a href="{{ url('admin-account') }}" class="relative group w-9 h-9 rounded-full bg-white grid place-items-center font-display font-bold text-base text-primary no-underline hover:ring-2 hover:ring-white/20 transition-all hover:scale-105">
        A
        <span class="absolute opacity-0 group-hover:opacity-100 bg-primary text-white text-xs px-2 py-1 rounded shadow-lg left-14 transition-opacity z-50 whitespace-nowrap pointer-events-none">Account</span>
      </a>
    </div>
  </aside>
  <div class="flex-1 min-w-0 flex flex-col">
    <header class="h-[72px] bg-white border-b border-border-light flex justify-between items-center px-6 lg:px-8 max-sm:h-auto max-sm:min-h-[72px] max-sm:py-4">
      <div class="flex items-center gap-3 text-[13px] text-slate-500 font-medium">
        <span class="font-bold text-slate-700">{{ $barbershop->name }}</span>
        <span class="text-slate-300">|</span>
        <div class="flex items-center gap-2">
          <button type="button" class="text-slate-400 hover:text-slate-800 transition-colors bg-transparent border-0 cursor-pointer p-0">&lt;</button>
          <div id="currentDate">Memuat tanggal...</div>
          <button type="button" class="text-slate-400 hover:text-slate-800 transition-colors bg-transparent border-0 cursor-pointer p-0">&gt;</button>
          <span class="text-[11px] uppercase font-bold tracking-wider bg-slate-100 px-2 py-0.5 rounded text-slate-600 ml-1 cursor-pointer hover:bg-slate-200 transition-colors">Today</span>
        </div>
        <span class="ml-2 px-2 py-0.5 text-[10px] uppercase font-bold tracking-wider bg-primary/5 text-primary rounded-full hidden sm:inline-block">Front Desk</span>
      </div>
      <div class="flex items-center gap-5">
        <x-button-accent class="text-xs py-2 px-4 shadow-sm hidden md:flex items-center gap-2" onclick="document.getElementById('walkInModal').classList.remove('opacity-0', 'pointer-events-none')">
          <span>New Walk-in</span>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
        </x-button-accent>
        
        <!-- Notification Bell & Dropdown -->
        <div class="relative" x-data="{ showNotifications: false }">
          <button type="button" 
                  @click="showNotifications = !showNotifications" 
                  class="relative cursor-pointer group flex items-center justify-center w-10 h-10 rounded-full hover:bg-slate-100 transition-colors border-0 bg-transparent" 
                  aria-label="Toggle notifications">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-slate-400 group-hover:text-primary transition-colors">
              <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
              <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
            </svg>
            <span class="absolute top-0 right-0 h-2 w-2 rounded-full bg-accent animate-pulse"></span>
          </button>

          <!-- Notification Dropdown Panel -->
          <div x-show="showNotifications" 
               @click.away="showNotifications = false" 
               x-transition 
               x-cloak
               class="absolute right-0 mt-4 w-80 bg-white rounded-2xl shadow-xl border border-border-subtle z-50 overflow-hidden" 
               style="display: none;">
            
            <div class="p-4 border-b border-border-light flex items-center justify-between bg-white">
              <span class="text-sm font-bold text-primary">Notifications</span>
              <button type="button" class="text-xs text-primary hover:underline bg-transparent border-0 cursor-pointer p-0 font-medium">Mark all as read</button>
            </div>

            <div class="divide-y divide-border-light max-h-80 overflow-y-auto">
              <!-- Unread state -->
              <div class="bg-surface border-l-4 border-accent p-4 flex items-start gap-3 cursor-pointer hover:bg-slate-100/70 transition-colors">
                <div class="w-8 h-8 rounded-full bg-accent/10 flex items-center justify-center shrink-0 text-accent mt-0.5">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                  </svg>
                </div>
                <div class="flex-1 min-w-0">
                  <p class="text-[14px] text-primary leading-snug m-0">
                    <strong class="font-semibold text-accent">New Booking:</strong> Arya Maulana has locked a slot with Fajar P. at 15:00.
                  </p>
                  <span class="text-[10px] text-gray-400 mt-1 block">5 minutes ago</span>
                </div>
              </div>

              <!-- Read state -->
              <div class="bg-white p-4 flex items-start gap-3 text-muted cursor-pointer hover:bg-slate-50 transition-colors">
                <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center shrink-0 text-slate-400 mt-0.5">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                    <line x1="12" y1="9" x2="12" y2="13"></line>
                    <line x1="12" y1="17" x2="12.01" y2="17"></line>
                  </svg>
                </div>
                <div class="flex-1 min-w-0">
                  <p class="text-[14px] text-slate-500 leading-snug m-0">
                    <strong class="font-medium text-slate-700">Leave Request:</strong> Rendra K. requested sick leave for tomorrow.
                  </p>
                  <span class="text-[10px] text-slate-400 mt-1 block">2 hours ago</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="group flex items-center gap-3 text-slate-500 bg-white border border-slate-200 py-1.5 px-3 rounded-lg hover:bg-slate-50 transition-colors {{ ($barbershop->is_emergency_closed ?? false) ? 'is-active !bg-red-500 !text-white !border-red-600 hover:!bg-red-600' : '' }} [&.is-active]:bg-red-500 [&.is-active]:text-white [&.is-active]:border-red-600 [&.is-active]:hover:bg-red-600 cursor-pointer" id="emergencyControl" onclick="document.getElementById('emergencyToggle').click()">
          <span class="text-[11px] font-bold uppercase tracking-wider max-sm:hidden">Emergency Close</span>
          <button type="button" class="w-[36px] h-[20px] p-0 border-0 rounded-full {{ ($barbershop->is_emergency_closed ?? false) ? '!bg-red-700' : 'bg-slate-200' }} group-[.is-active]:bg-red-700 cursor-pointer relative transition-all" id="emergencyToggle" aria-label="Aktifkan Emergency Close" aria-pressed="{{ ($barbershop->is_emergency_closed ?? false) ? 'true' : 'false' }}" onclick="event.stopPropagation()">
            <i class="absolute left-[2px] top-[2px] w-[16px] h-[16px] rounded-full bg-white transition-transform {{ ($barbershop->is_emergency_closed ?? false) ? 'translate-x-[16px]' : '' }} group-[.is-active]:translate-x-[16px] shadow-sm"></i>
          </button>
        </div>
      </div>
    </header>

    @php
        $status_langganan = 'trial'; // mock: 'trial' or 'aktif'
        $days_left = 14;
    @endphp
    @if($status_langganan === 'trial')
    <div class="bg-amber-50 border-b border-amber-100 px-6 lg:px-8 py-2.5 flex items-center justify-between">
      <div class="flex items-center gap-2 text-sm text-amber-800 font-medium">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
        <span>{{ $days_left }} days left in your free trial</span>
      </div>
      <a href="{{ url('admin-settings') }}" class="text-xs font-bold bg-amber-500 text-white px-3 py-1.5 rounded-md hover:bg-amber-600 transition-colors cursor-pointer no-underline shadow-sm">Upgrade Now</a>
    </div>
    @endif

    <main class="max-w-[1480px] mx-auto p-6 lg:p-8 pb-12 w-full">
      @if(session('success'))
      <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm font-medium flex items-center justify-between shadow-sm">
        <div class="flex items-center gap-2.5">
          <svg class="w-5 h-5 text-emerald-600 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
          <span>{{ session('success') }}</span>
        </div>
        <button type="button" onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700 bg-transparent border-0 cursor-pointer p-1 text-lg leading-none">&times;</button>
      </div>
      @endif

      <section class="flex justify-between items-end mb-8 max-md:flex-col max-md:items-start max-md:gap-4" id="overview">
        <div>
          <h1 class="m-0 text-[24px] font-bold text-slate-900">Good morning, {{ Auth::user()->name ?? 'Admin' }}.</h1>
          <p class="mt-1 mb-0 text-[14px] text-slate-500">Cabang: <strong class="text-slate-700 font-semibold">{{ $barbershop->name }}</strong> — Pantau alur layanan dan kelola antrean hari ini.</p>
        </div>
        <div class="flex gap-3 items-center {{ ($barbershop->is_emergency_closed ?? false) ? 'text-red-600' : 'text-emerald-600' }} text-[13px] font-semibold" id="storeStatusContainer">
          <b class="w-2 h-2 rounded-full {{ ($barbershop->is_emergency_closed ?? false) ? 'bg-red-500 shadow-[0_0_0_3px_#fee2e2]' : 'bg-emerald-500 shadow-[0_0_0_3px_#ddf2e7]' }}" id="storeStatusDot"></b>
          <span id="storeStatus">{{ ($barbershop->is_emergency_closed ?? false) ? 'Emergency mode' : 'Store open' }}</span>
          <em class="not-italic text-slate-400 font-normal border-l border-border-light pl-3">09:00—21:00</em>
        </div>
      </section>

      <!-- 4 Kartu Metrik Ringkasan Utama -->
      <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <x-card class="p-6 bg-white shadow-sm border border-border-light relative overflow-hidden">
          <svg class="absolute top-6 right-6 w-10 h-10 text-slate-200 opacity-50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
          <div class="text-[11px] font-bold uppercase tracking-[0.05em] text-slate-500 mb-2 relative">Estimasi Pemasukan Hari Ini</div>
          <div class="text-[26px] leading-tight font-bold text-slate-900 mb-2 relative">Rp {{ number_format($todayRevenue, 0, ',', '.') }}</div>
          <div class="text-xs text-emerald-600 font-semibold relative">Booking DP &amp; Lunas</div>
        </x-card>
        <x-card class="p-6 bg-white shadow-sm border border-border-light relative overflow-hidden">
          <svg class="absolute top-6 right-6 w-10 h-10 text-slate-200 opacity-50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
          <div class="text-[11px] font-bold uppercase tracking-[0.05em] text-slate-500 mb-2 relative">Total Janji Temu Hari Ini</div>
          <div class="text-[26px] leading-tight font-bold text-slate-900 mb-2 relative">{{ $todayBookingsCount }}</div>
          <div class="text-xs text-slate-500 relative">Janji temu aktif</div>
        </x-card>
        <x-card class="p-6 bg-white shadow-sm border border-border-light relative overflow-hidden">
          <svg class="absolute top-6 right-6 w-10 h-10 text-slate-200 opacity-50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
          <div class="text-[11px] font-bold uppercase tracking-[0.05em] text-slate-500 mb-2 relative">Kapster Aktif</div>
          <div class="text-[26px] leading-tight font-bold text-slate-900 mb-2 relative">{{ $activeCapstersCount }}</div>
          <div class="text-xs text-slate-500 relative">Siap melayani hari ini</div>
        </x-card>
        <x-card class="p-6 bg-white shadow-sm border border-border-light relative overflow-hidden">
          <svg class="absolute top-6 right-6 w-10 h-10 text-slate-200 opacity-50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
          <div class="text-[11px] font-bold uppercase tracking-[0.05em] text-slate-500 mb-2 relative">Nama Barbershop</div>
          <div class="text-[22px] leading-tight font-bold text-slate-900 mb-2 relative truncate" title="{{ $barbershop->name }}">{{ $barbershop->name }}</div>
          <div class="text-xs text-emerald-600 font-semibold relative">Paket: {{ ucfirst($barbershop->paket_dipilih ?? 'Pro') }}</div>
        </x-card>
      </section>

      <!-- Live Schedule Matrix Section with Alpine.js Appointment State -->
      <div x-data="{ 
        showAppointmentModal: false, 
        selectedBooking: { 
          id: '', 
          code: '', 
          customer: '', 
          phone: '', 
          status: '', 
          payment_status: '', 
          service: '', 
          price: '', 
          time: '', 
          capster: '', 
          dp: '', 
          updateUrl: '' 
        } 
      }">
        <section class="bg-white border border-border-light rounded-xl shadow-sm p-6" id="schedule">
          <div class="flex justify-between items-end max-md:flex-col max-md:items-start max-md:gap-4">
            <div>
              <p class="m-0 mb-1 text-[11px] font-bold uppercase tracking-[0.05em] text-slate-500">Live operations</p>
              <h2 class="m-0 text-[18px] font-semibold text-slate-900">Live Schedule Matrix</h2>
            </div>
            <div class="flex gap-4 text-slate-600 text-xs font-medium flex-wrap">
              <span class="flex items-center gap-1.5"><i class="w-2.5 h-2.5 rounded-sm border-2 border-dashed border-slate-300"></i>Available</span>
              <span class="flex items-center gap-1.5"><i class="w-2.5 h-2.5 rounded-sm bg-yellow-100 border border-yellow-300"></i>Confirmed / DP</span>
              <span class="flex items-center gap-1.5"><i class="w-2.5 h-2.5 rounded-sm bg-slate-900 border border-slate-900"></i>In-Chair (Sedang Cukur)</span>
              <span class="flex items-center gap-1.5"><i class="w-2.5 h-2.5 rounded-sm bg-slate-100 border border-slate-300"></i>Completed (Selesai)</span>
            </div>
          </div>
          <p class="text-slate-500 text-xs mt-2 mb-4">Matriks jadwal interval 30 menit. Klik booking aktif untuk melihat detail, pelunasan, atau menyelesaikan layanan.</p>

          @php
            $times = [];
            $start = \Carbon\Carbon::createFromTime(9, 0);
            $end = \Carbon\Carbon::createFromTime(21, 0);
            while ($start <= $end) {
                $times[] = $start->format('H:i');
                $start->addMinutes(30);
            }
          @endphp

          <div class="overflow-x-auto w-full border border-border-light rounded-lg bg-white shadow-sm">
            <table class="w-full text-left border-collapse min-w-[1400px]">
              <thead class="bg-slate-50/75 border-b border-border-light">
                <tr>
                  <th class="sticky left-0 bg-slate-50 z-20 px-5 py-3.5 text-xs font-bold uppercase tracking-wider text-slate-700 min-w-[220px] max-w-[220px] border-r border-border-light shadow-[2px_0_4px_rgba(0,0,0,0.02)]">
                    CAPSTER / CHAIR
                  </th>
                  @foreach($times as $time)
                    <th class="px-3 py-3 text-xs font-semibold text-slate-600 text-center border-r border-border-light min-w-[120px]">
                      {{ $time }}
                    </th>
                  @endforeach
                </tr>
              </thead>
              <tbody class="divide-y divide-border-light">
                @forelse($activeCapsters as $capster)
                  @php
                    $initials = collect(explode(' ', $capster->user->name ?? 'C'))
                        ->map(fn($part) => strtoupper(substr($part, 0, 1)))
                        ->take(2)
                        ->join('');
                    $colors = [
                      'bg-primary/10 text-primary border border-primary/20',
                      'bg-amber-100 text-amber-800 border border-amber-300',
                      'bg-emerald-100 text-emerald-800 border border-emerald-300',
                      'bg-blue-100 text-blue-800 border border-blue-300',
                      'bg-purple-100 text-purple-800 border border-purple-300'
                    ];
                    $avatarColor = $colors[$loop->index % count($colors)];

                    // Ambil booking untuk kapster ini pada hari ini
                    $capsterBookings = $todayAppointments->filter(function($item) use ($capster, $loop, $activeCapsters) {
                        if ($item->capster_id == $capster->id) {
                            return true;
                        }
                        if (is_null($item->capster_id) && $loop->first) {
                            return true;
                        }
                        return false;
                    });
                  @endphp
                  <tr class="hover:bg-slate-50/40 transition-colors">
                    <!-- Kolom Identitas Kapster (Sticky di kiri) -->
                    <td class="sticky left-0 bg-white z-10 border-r border-border-light px-5 py-3 min-w-[220px] max-w-[220px] shadow-[2px_0_4px_rgba(0,0,0,0.02)]">
                      <div class="flex gap-3.5 items-center">
                        <div class="w-10 h-10 rounded-full shrink-0 grid place-items-center text-xs font-bold {{ $avatarColor }}">{{ $initials }}</div>
                        <div class="min-w-0">
                          <strong class="block text-sm font-semibold text-slate-900 truncate">{{ $capster->user->name ?? 'Capster' }}</strong>
                          <span class="block text-xs text-slate-500 mt-0.5 truncate">Chair {{ $loop->iteration }} @if($capster->specialization) · {{ $capster->specialization }} @endif</span>
                        </div>
                      </div>
                    </td>

                    <!-- Kolom Slot Waktu Tiap 30 Menit -->
                    @foreach($times as $time)
                      @php
                        $booking = $capsterBookings->first(function($b) use ($time) {
                            return \Carbon\Carbon::parse($b->start_time)->format('H:i') === $time;
                        });

                        if ($booking) {
                            // Warna background sesuai status alur operasional:
                            // * completed: Abu-abu (selesai)
                            // * in_chair: Hitam/Gelap (sedang dicukur)
                            // * confirmed / pending / dp_paid: Kuning (menunggu giliran)
                            if ($booking->booking_status === 'completed') {
                                $cardStyle = 'bg-slate-100 text-slate-600 border border-slate-300 hover:bg-slate-200';
                            } elseif ($booking->booking_status === 'in_chair') {
                                $cardStyle = 'bg-slate-900 text-white border border-slate-900 hover:bg-slate-800 shadow-sm';
                            } elseif ($booking->booking_status === 'pending' || $booking->booking_status === 'confirmed') {
                                $cardStyle = 'bg-yellow-100 text-yellow-800 border border-yellow-300 hover:bg-yellow-200 shadow-sm';
                            } else {
                                $cardStyle = 'bg-slate-50 text-slate-700 border border-slate-200 hover:bg-slate-100';
                            }
                        }
                      @endphp
                      <td class="px-2 py-2.5 border-r border-border-light min-w-[120px] h-[76px] align-middle text-center">
                        @if($booking)
                          <button type="button" 
                            title="{{ $booking->customer->name ?? 'Guest' }} — {{ $booking->service->name ?? 'Layanan' }} ({{ \Carbon\Carbon::parse($booking->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($booking->end_time)->format('H:i') }})"
                            @click="selectedBooking = { 
                              id: '{{ $booking->id }}',
                              code: '{{ $booking->booking_code }}',
                              customer: '{{ addslashes($booking->customer->name ?? 'Guest') }}',
                              phone: '{{ $booking->customer->phone_number ?? '-' }}',
                              status: '{{ $booking->booking_status }}',
                              payment_status: '{{ $booking->payment_status }}',
                              service: '{{ addslashes($booking->service->name ?? 'Layanan') }}',
                              price: 'Rp {{ number_format($booking->total_amount, 0, ',', '.') }}',
                              time: '{{ \Carbon\Carbon::parse($booking->start_time)->format('H:i') }} — {{ \Carbon\Carbon::parse($booking->end_time)->format('H:i') }}',
                              capster: '{{ addslashes($capster->user->name ?? 'Any Available') }}',
                              dp: 'Rp {{ number_format($booking->dp_amount ?? 0, 0, ',', '.') }}',
                              updateUrl: '{{ route('admin.bookings.updateStatus', $booking->id) }}'
                            }; showAppointmentModal = true"
                            class="w-full whitespace-nowrap overflow-hidden text-ellipsis px-3 py-2 rounded-md block text-sm font-medium text-left cursor-pointer transition-all hover:scale-[1.02] hover:shadow-md {{ $cardStyle }}">
                            <span class="block truncate font-semibold leading-tight">{{ $booking->customer->name ?? 'Guest' }}</span>
                            <span class="block truncate text-[11px] opacity-80 leading-tight mt-0.5">{{ $booking->service->name ?? 'Layanan' }} ({{ \Carbon\Carbon::parse($booking->start_time)->format('H:i') }})</span>
                          </button>
                        @endif
                      </td>
                    @endforeach
                  </tr>
                @empty
                  <tr>
                    <td colspan="{{ count($times) + 1 }}" class="p-12 text-center text-slate-400">
                      <div class="flex flex-col items-center justify-center gap-2">
                        <svg class="w-10 h-10 text-slate-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                        <span class="text-sm font-semibold text-slate-700">Belum ada kapster aktif</span>
                        <span class="text-xs text-slate-400">Silakan daftarkan kapster di menu Studio Settings untuk menampilkan jadwal kapster hari ini.</span>
                        <a href="{{ route('admin.settings') }}" class="mt-2 text-xs font-semibold px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors no-underline">Kelola Kapster</a>
                      </div>
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </section>

        <!-- Smart Appointment Details Modal (Alpine.js) -->
        <div x-show="showAppointmentModal" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             x-cloak
             class="fixed inset-0 bg-primary/60 backdrop-blur-sm grid place-items-center p-5 z-50 overflow-y-auto" 
             id="appointmentModal"
             style="display: none;">
          
          <div @click.away="showAppointmentModal = false" 
               x-show="showAppointmentModal"
               x-transition:enter="transition ease-out duration-200"
               x-transition:enter-start="opacity-0 scale-95 translate-y-2"
               x-transition:enter-end="opacity-100 scale-100 translate-y-0"
               x-transition:leave="transition ease-in duration-150"
               x-transition:leave-start="opacity-100 scale-100 translate-y-0"
               x-transition:leave-end="opacity-0 scale-95 translate-y-2"
               class="w-full max-w-[560px] bg-white rounded-2xl shadow-2xl border border-border-subtle overflow-hidden">
            
            <!-- Modal Header -->
            <div class="flex justify-between items-start p-6 border-b border-border-light bg-white">
              <div>
                <p class="m-0 mb-1 text-slate-500 text-xs font-semibold tracking-wider uppercase">Appointment Details</p>
                <div class="flex items-center gap-2.5">
                  <h2 class="m-0 text-xl font-bold text-slate-900" x-text="selectedBooking.customer">Nama Pelanggan</h2>
                  <span class="text-xs font-mono font-bold text-slate-600 bg-slate-100 px-2 py-0.5 rounded" x-text="'#' + selectedBooking.code"></span>
                </div>
              </div>
              <div class="flex items-center gap-2">
                <!-- Status Indicators -->
                <span x-show="selectedBooking.payment_status === 'dp_paid'" class="text-xs font-semibold text-amber-800 flex items-center gap-1.5 bg-amber-50 border border-amber-200 px-2.5 py-1 rounded-lg">
                  <svg class="w-3.5 h-3.5 text-amber-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="20" height="14" x="2" y="5" rx="2"/><line x1="2" x2="22" y1="10" y2="10"/></svg> DP Paid
                </span>
                <span x-show="selectedBooking.payment_status === 'paid'" class="text-xs font-semibold text-emerald-800 flex items-center gap-1.5 bg-emerald-50 border border-emerald-200 px-2.5 py-1 rounded-lg">
                  <svg class="w-3.5 h-3.5 text-emerald-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg> Paid
                </span>
                <span x-show="selectedBooking.status === 'confirmed' || selectedBooking.status === 'pending'" class="text-xs font-semibold text-yellow-800 flex items-center gap-1.5 bg-yellow-100 border border-yellow-300 px-2.5 py-1 rounded-lg">
                  <svg class="w-3.5 h-3.5 text-yellow-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg> Confirmed
                </span>
                <span x-show="selectedBooking.status === 'in_chair'" class="text-xs font-semibold text-white flex items-center gap-1.5 bg-slate-900 border border-slate-900 px-2.5 py-1 rounded-lg">
                  <svg class="w-3.5 h-3.5 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 10v4h10v-4" /><path d="M5 14h14" /><path d="M12 14v4" /><path d="M8 21h8" /><path d="M9 10V5a3 3 0 0 1 6 0v5" /></svg> In-Chair
                </span>
                <span x-show="selectedBooking.status === 'completed'" class="text-xs font-semibold text-slate-600 flex items-center gap-1.5 bg-slate-100 border border-slate-200 px-2.5 py-1 rounded-lg">
                  <svg class="w-3.5 h-3.5 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> Completed
                </span>
                <span x-show="selectedBooking.status === 'cancelled'" class="text-xs font-semibold text-rose-700 flex items-center gap-1.5 bg-rose-50 border border-rose-200 px-2.5 py-1 rounded-lg">
                  <svg class="w-3.5 h-3.5 text-rose-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg> Cancelled
                </span>

                <!-- Close Button -->
                <button type="button" @click="showAppointmentModal = false" class="border-0 bg-transparent text-gray-400 hover:text-primary text-[24px] leading-none cursor-pointer transition-colors p-1" aria-label="Close">&times;</button>
              </div>
            </div>

            <!-- Modal Body -->
            <div class="p-6 bg-white">
              <!-- Customer & Capster summary card -->
              <div class="flex items-center gap-3 pb-5 border-b border-border-light">
                <div class="w-11 h-11 rounded-full grid place-items-center text-xs font-bold bg-primary/10 text-primary border border-primary/20 shrink-0" 
                     x-text="selectedBooking.customer ? selectedBooking.customer.split(' ').map(n=>n[0]).join('').slice(0,2).toUpperCase() : 'CU'">
                </div>
                <div class="flex-1 min-w-0">
                  <strong class="block text-base text-primary font-bold" x-text="selectedBooking.customer"></strong>
                  <span class="block text-gray-500 text-xs mt-0.5" x-text="'No. HP: ' + selectedBooking.phone"></span>
                </div>
                <div class="text-right">
                  <span class="inline-block text-xs font-medium text-slate-700 bg-slate-100 px-2.5 py-1 rounded-md" x-text="selectedBooking.time + ' WIB'"></span>
                </div>
              </div>

              <!-- Financial / Pricing Details -->
              <div class="py-2 divide-y divide-border-light text-sm">
                <div class="flex justify-between py-3 text-gray-500">
                  <span>Layanan</span>
                  <span class="font-semibold text-primary" x-text="selectedBooking.service"></span>
                </div>
                <div class="flex justify-between py-3 text-gray-500">
                  <span>Total Biaya</span>
                  <span class="font-bold text-slate-900" x-text="selectedBooking.price"></span>
                </div>
                <div class="flex justify-between py-3 text-gray-500">
                  <span>DP Terbayar (Midtrans)</span>
                  <span class="font-semibold text-accent" x-text="selectedBooking.dp || 'Rp 0'"></span>
                </div>
                <div class="flex justify-between py-3 text-gray-500">
                  <span>Capster Ditunjuk</span>
                  <span class="font-medium text-primary" x-text="selectedBooking.capster"></span>
                </div>
              </div>
            </div>

            <!-- Modal Footer: QUICK ACTION BUTTONS -->
            <div class="flex flex-col sm:flex-row flex-wrap justify-between items-center gap-4 px-6 py-5 bg-slate-50/80 rounded-b-xl border-t border-border-light">
              <!-- Left side: Close button -->
              <div class="w-full sm:w-auto text-left">
                <button type="button" 
                        @click="showAppointmentModal = false" 
                        class="text-xs text-slate-500 hover:text-slate-800 bg-transparent border-0 cursor-pointer p-0 font-semibold transition-colors">
                  Tutup
                </button>
              </div>

              <!-- Right side: Quick Action Forms -->
              <div class="flex items-center gap-2.5 w-full sm:w-auto justify-end flex-wrap">
                <!-- 1. Kondisi: Status masih confirmed / pending (Belum dicukur) -->
                <template x-if="selectedBooking.status === 'confirmed' || selectedBooking.status === 'pending'">
                  <div class="flex items-center gap-2">
                    <!-- Tombol Batalkan Booking -->
                    <form :action="selectedBooking.updateUrl" method="POST" class="inline m-0" onsubmit="return confirm('Apakah Anda yakin ingin membatalkan booking ini?')">
                      @csrf
                      @method('PATCH')
                      <input type="hidden" name="status" value="cancelled">
                      <input type="hidden" name="action" value="mark_cancelled">
                      <button type="submit" class="px-3.5 py-2 text-xs font-semibold rounded-lg bg-rose-50 text-rose-700 hover:bg-rose-100 border border-rose-200 transition-colors inline-flex items-center gap-1.5 cursor-pointer">
                        Batalkan
                      </button>
                    </form>

                    <!-- Tombol Mulai Layanan (In-Chair) -->
                    <form :action="selectedBooking.updateUrl" method="POST" class="inline m-0">
                      @csrf
                      @method('PATCH')
                      <input type="hidden" name="status" value="in_chair">
                      <input type="hidden" name="action" value="mark_in_chair">
                      <button type="submit" class="px-4 py-2 text-xs font-semibold rounded-lg bg-slate-900 text-white hover:bg-slate-800 transition-colors inline-flex items-center gap-1.5 cursor-pointer shadow-sm">
                        <svg class="w-3.5 h-3.5 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 10v4h10v-4" /><path d="M5 14h14" /><path d="M12 14v4" /><path d="M8 21h8" /><path d="M9 10V5a3 3 0 0 1 6 0v5" /></svg>
                        Mulai Layanan (In-Chair)
                      </button>
                    </form>
                  </div>
                </template>

                <!-- 2. Kondisi: Status sedang in_chair (Pelanggan di kursi/sedang cukur) -->
                <template x-if="selectedBooking.status === 'in_chair'">
                  <div class="flex items-center gap-2">
                    <!-- Jika belum lunas: 1 Tombol Praktis "Selesaikan & Tandai Lunas" -->
                    <template x-if="selectedBooking.payment_status !== 'paid'">
                      <form :action="selectedBooking.updateUrl" method="POST" class="inline-flex items-center gap-2 m-0">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="completed">
                        <input type="hidden" name="payment_status" value="paid">
                        <input type="hidden" name="action" value="complete_and_pay">
                        <select name="payment_method" class="text-xs py-1.5 px-2 border border-slate-300 rounded-lg bg-white text-slate-700 shadow-sm focus:ring-1 focus:ring-emerald-500 focus:border-emerald-500 cursor-pointer">
                          <option value="cash">Cash</option>
                          <option value="qris_static">QRIS Static</option>
                        </select>
                        <button type="submit" class="px-4 py-2 text-xs font-semibold rounded-lg bg-emerald-600 text-white hover:bg-emerald-700 transition-colors inline-flex items-center gap-1.5 cursor-pointer shadow-sm whitespace-nowrap">
                          <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                          Selesaikan &amp; Tandai Lunas
                        </button>
                      </form>
                    </template>

                    <!-- Jika sudah lunas sejak awal: Tombol "Selesaikan Layanan" -->
                    <template x-if="selectedBooking.payment_status === 'paid'">
                      <form :action="selectedBooking.updateUrl" method="POST" class="inline m-0">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="completed">
                        <input type="hidden" name="action" value="mark_completed">
                        <button type="submit" class="px-4 py-2 text-xs font-semibold rounded-lg bg-slate-900 text-white hover:bg-slate-800 transition-colors inline-flex items-center gap-1.5 cursor-pointer shadow-sm">
                          <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                          Selesaikan Layanan
                        </button>
                      </form>
                    </template>
                  </div>
                </template>

                <!-- 3. Kondisi Fallback: Jika sudah completed tapi belum paid -->
                <template x-if="selectedBooking.status === 'completed' && selectedBooking.payment_status !== 'paid'">
                  <form :action="selectedBooking.updateUrl" method="POST" class="inline-flex items-center gap-2 m-0">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="payment_status" value="paid">
                    <input type="hidden" name="action" value="mark_paid">
                    <select name="payment_method" class="text-xs py-1.5 px-2 border border-slate-300 rounded-lg bg-white text-slate-700 shadow-sm focus:ring-1 focus:ring-emerald-500 focus:border-emerald-500 cursor-pointer">
                      <option value="cash">Cash</option>
                      <option value="qris_static">QRIS Static</option>
                    </select>
                    <button type="submit" class="px-3.5 py-2 text-xs font-semibold rounded-lg bg-emerald-600 text-white hover:bg-emerald-700 transition-colors inline-flex items-center gap-1.5 cursor-pointer shadow-sm whitespace-nowrap">
                      <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                      Tandai Lunas
                    </button>
                  </form>
                </template>

                <!-- 4. Kondisi: Status sudah completed & paid -->
                <template x-if="selectedBooking.status === 'completed' && selectedBooking.payment_status === 'paid'">
                  <span class="text-xs font-semibold text-emerald-700 bg-emerald-50 border border-emerald-200 px-3 py-1.5 rounded-lg inline-flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-emerald-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                    Selesai &amp; Lunas
                  </span>
                </template>
              </div>
            </div>

          </div>
        </div>
      </div>
    </main>
  </div>
</div>

<div class="fixed inset-0 bg-primary/60 backdrop-blur-sm grid place-items-center p-5 opacity-0 pointer-events-none transition-all duration-200 z-20" id="walkInModal">
  <x-card padding="none" bgColor="bg-surface" class="w-full max-w-[480px] transform translate-y-2 scale-95 transition-all duration-200 overflow-hidden">
    <div class="flex justify-between items-start p-6 border-b border-border-light">
      <div>
        <p class="m-0 mb-1 text-slate-700 text-xs font-semibold tracking-wider uppercase">Quick booking</p>
        <h2 class="m-0 text-xl font-bold text-slate-900">New Walk-In Booking</h2>
      </div>
      <button class="border-0 bg-transparent text-slate-500 hover:text-slate-800 text-2xl leading-none cursor-pointer" data-close>×</button>
    </div>
    <form id="walkInForm">
      <div class="p-6">
        <div id="walkInSlot" class="hidden"></div>
        <div class="mb-4">
          <x-label>Nama Pelanggan</x-label>
          <x-input name="customer" required placeholder="Contoh: Arga Pratama" class="mt-2" />
        </div>
        <div class="mb-4">
          <x-label>Nomor HP <small class="font-normal text-gray-500">(opsional)</small></x-label>
          <x-input name="phone" inputmode="tel" placeholder="08xx xxxx xxxx" class="mt-2" />
        </div>
        <div class="mb-4">
          <x-label>Pilihan Layanan</x-label>
          <select name="service" class="w-full bg-background border border-border-light rounded-md text-primary py-2.5 px-3 mt-2 outline-none focus:border-primary focus:ring-4 focus:ring-primary/10">
            <option>Fade — Rp 100.000</option>
            <option>Classic + Wash — Rp 150.000</option>
            <option>Gentleman's Cut — Rp 175.000</option>
            <option>Trimly Trim — Rp 125.000</option>
          </select>
        </div>
      </div>
      <div class="flex justify-between items-center px-6 py-4 bg-background border-t border-border-light">
        <button type="button" class="border-0 bg-transparent text-gray-500 text-xs font-semibold cursor-pointer" data-close>Batal</button>
        <x-button-primary size="normal">Kunci Slot &amp; Mulai Layanan <span class="text-lg ml-2 leading-none">→</span></x-button-primary>
      </div>
    </form>
  </x-card>
</div>

<div id="settlementModal" class="hidden"></div>
<div class="fixed right-6 bottom-6 bg-primary text-white py-3 px-4 rounded-md flex gap-2.5 items-center text-xs shadow-lg transform translate-y-5 opacity-0 pointer-events-none transition-all duration-200 z-30" id="toast">
  <b class="w-5 h-5 rounded-full grid place-items-center bg-green-500 text-[11px]">✓</b><span id="toastMessage"></span>
</div>
<script src="{{asset('js/dashboard.js')}}"></script>
</body>
</html>
