<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Kasir — The Noble Barber</title>
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
        <span class="font-bold text-slate-700">The Noble Barber</span>
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

        <div class="group flex items-center gap-3 text-slate-500 bg-white border border-slate-200 py-1.5 px-3 rounded-lg hover:bg-slate-50 transition-colors [&.is-active]:bg-red-500 [&.is-active]:text-white [&.is-active]:border-red-600 [&.is-active]:hover:bg-red-600 cursor-pointer" id="emergencyControl" onclick="document.getElementById('emergencyToggle').click()">
          <span class="text-[11px] font-bold uppercase tracking-wider max-sm:hidden">Emergency Close</span>
          <button type="button" class="w-[36px] h-[20px] p-0 border-0 rounded-full bg-slate-200 group-[.is-active]:bg-red-700 cursor-pointer relative transition-all" id="emergencyToggle" aria-label="Aktifkan Emergency Close" aria-pressed="false" onclick="event.stopPropagation()">
            <i class="absolute left-[2px] top-[2px] w-[16px] h-[16px] rounded-full bg-white transition-transform group-[.is-active]:translate-x-[16px] shadow-sm"></i>
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
      <section class="flex justify-between items-end mb-8 max-md:flex-col max-md:items-start max-md:gap-4" id="overview">
        <div>
          <h1 class="m-0 text-[24px] font-bold text-slate-900">Good morning, Admin.</h1>
          <p class="mt-1 mb-0 text-[14px] text-slate-500">Pantau alur layanan dan jaga setiap kursi tetap bergerak.</p>
        </div>
        <div class="flex gap-3 items-center text-emerald-600 text-[13px] font-semibold">
          <b class="w-2 h-2 rounded-full bg-emerald-500 shadow-[0_0_0_3px_#ddf2e7]"></b>
          <span id="storeStatus">Store open</span>
          <em class="not-italic text-slate-400 font-normal border-l border-border-light pl-3">09:00—21:00</em>
        </div>
      </section>
      <section class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
        <x-card class="p-6 bg-white shadow-sm border border-border-light relative overflow-hidden">
          <svg class="absolute top-6 right-6 w-10 h-10 text-slate-200 opacity-50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
          <div class="text-[11px] font-bold uppercase tracking-[0.05em] text-slate-500 mb-2 relative">Today's Revenue</div>
          <div class="text-[28px] leading-tight font-bold text-slate-900 mb-2 relative">Rp 4.250.000</div>
          <div class="text-xs text-emerald-600 font-semibold relative">↑ 12,8% <span class="font-normal text-slate-500 ml-1">dari kemarin</span></div>
        </x-card>
        <x-card class="p-6 bg-white shadow-sm border border-border-light relative overflow-hidden">
          <svg class="absolute top-6 right-6 w-10 h-10 text-slate-200 opacity-50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
          <div class="text-[11px] font-bold uppercase tracking-[0.05em] text-slate-500 mb-2 relative">Locked Midtrans DP</div>
          <div class="text-[28px] leading-tight font-bold text-slate-900 mb-2 relative">Rp 1.500.000</div>
          <div class="text-xs text-slate-500 relative">8 booking terkonfirmasi</div>
        </x-card>
        <x-card class="p-6 bg-white shadow-sm border border-border-light relative overflow-hidden">
          <svg class="absolute top-6 right-6 w-10 h-10 text-slate-200 opacity-50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
          <div class="text-[11px] font-bold uppercase tracking-[0.05em] text-slate-500 mb-2 relative">Capacity Today</div>
          <div class="text-[28px] leading-tight font-bold text-slate-900 mb-2 relative">68<span class="text-xl ml-0.5 text-slate-500 font-normal">%</span></div>
          <div class="text-xs text-slate-500 relative">18 dari 27 slot terisi</div>
        </x-card>
      </section>
      <!-- Live Schedule Matrix Section with Alpine.js Appointment State -->
      <div x-data="{ showAppointmentModal: false, selectedBooking: { customer: '', status: '', service: '', time: '', capster: '', dp: '' } }">
        <section class="bg-white border border-border-light rounded-xl shadow-sm p-6" id="schedule">
          <div class="flex justify-between items-end max-md:flex-col max-md:items-start max-md:gap-4">
            <div>
              <p class="m-0 mb-1 text-[11px] font-bold uppercase tracking-[0.05em] text-slate-500">Live operations</p>
              <h2 class="m-0 text-[18px] font-semibold text-slate-900">Live Schedule Matrix</h2>
            </div>
            <div class="flex gap-4 text-slate-600 text-xs font-medium flex-wrap">
              <span class="flex items-center gap-1.5"><i class="w-2.5 h-2.5 rounded-sm border-2 border-dashed border-slate-300"></i>Available</span>
              <span class="flex items-center gap-1.5"><i class="w-2.5 h-2.5 rounded-sm bg-amber-100 border border-amber-300"></i>DP Paid</span>
              <span class="flex items-center gap-1.5"><i class="w-2.5 h-2.5 rounded-sm bg-primary border border-primary"></i>In-Chair</span>
              <span class="flex items-center gap-1.5"><i class="w-2.5 h-2.5 rounded-sm bg-slate-100 border border-slate-300"></i>Completed</span>
            </div>
          </div>
          <p class="text-slate-500 text-xs mt-2 mb-4">Klik slot kosong untuk walk-in baru. Klik booking aktif untuk pelunasan.</p>
          <div class="border border-border-light rounded-lg overflow-auto bg-white">
            <div class="flex min-w-[980px] h-[48px] border-b border-border-light bg-slate-50/50">
              <div class="w-[220px] shrink-0 border-r border-border-light px-6 py-3 text-xs font-bold uppercase tracking-wider text-slate-700 flex items-center">CAPSTER / CHAIR</div>
              <div class="flex-1 min-w-[800px] grid grid-cols-[repeat(13,1fr)]">
                @for($h=9;$h<=21;$h++)
                  <div class="py-3 px-2 text-slate-600 text-xs font-semibold border-r border-border-light flex items-center justify-center">{{sprintf('%02d:00',$h)}}</div>
                @endfor
              </div>
            </div>
            <div class="flex flex-col min-w-[980px]">
              @php 
              $rows=[
                ['Fajar','Chair 1','FA','bg-primary/20 text-primary', [
                  ['bg-slate-100 text-slate-400 border-slate-200',0,15.38,'Bagas P.','Fade','0812 3456 7890','09:00 — 11:00','completed','Rp 30.000'],
                  ['bg-amber-100 text-amber-800 border-amber-200',30.76,15.38,'Reza R.','Classic + Wash','0821 9999 8888','13:00 — 15:00','dp_paid','Rp 50.000'],
                  ['bg-primary border-primary text-white',61.52,15.38,'Nico A.','Trimly Trim','0857 2000 1122','17:00 — 19:00','in_chair','Rp 40.000']
                ]],
                ['Aditya','Chair 2','AD','bg-orange-100 text-orange-800', [
                  ['bg-slate-100 text-slate-400 border-slate-200',7.69,15.38,'Dion W.','Trimly Trim','0855 1122 3344','10:00 — 12:00','completed','Rp 35.000'],
                  ['bg-amber-100 text-amber-800 border-amber-200',46.14,15.38,'Alex T.','Fade','0877 6655 4433','15:00 — 17:00','dp_paid','Rp 50.000']
                ]],
                ['Rendra','Chair 3','RE','bg-green-100 text-green-700', [
                  ['bg-primary border-primary text-white',15.38,15.38,'Bima K.','Gentleman’s Cut','0819 6644 2200','11:00 — 13:00','in_chair','Rp 50.000'],
                  ['bg-slate-100 text-slate-400 border-slate-200',69.21,15.38,'Rafi M.','Fade','0822 3311 9090','18:00 — 20:00','completed','Rp 30.000']
                ]]
              ]; 
              @endphp
              @foreach($rows as $row)
                <div class="flex h-[96px] border-b border-border-light last:border-0" data-chair="{{$row[1]}}">
                  <div class="w-[220px] shrink-0 border-r border-border-light flex gap-3.5 items-center px-6 py-4">
                    <div class="w-10 h-10 rounded-full shrink-0 grid place-items-center text-xs font-bold {{$row[3]}}">{{$row[2]}}</div>
                    <div class="min-w-0">
                      <strong class="block text-sm font-semibold text-slate-900 truncate">{{$row[0]}}</strong>
                      <span class="block text-xs text-slate-500 mt-0.5">{{$row[1]}}</span>
                    </div>
                  </div>
                  <div class="flex-1 min-w-[800px] relative">
                    <div class="absolute inset-0 grid grid-cols-[repeat(13,1fr)] pointer-events-none">
                      @for($i=0;$i<13;$i++)<i class="border-r border-border-light"></i>@endfor
                    </div>
                    @foreach($row[4] as $a)
                      <button type="button" 
                        title="{{ $a[3] }} — {{ $a[4] }} ({{ $a[6] }})"
                        @click="selectedBooking = { 
                          customer: '{{ $a[3] }}', 
                          status: '{{ $a[7] }}', 
                          service: '{{ $a[4] }}', 
                          time: '{{ $a[6] }}', 
                          capster: '{{ $row[0] }} ({{ $row[1] }})', 
                          dp: '{{ $a[8] ?? 'Rp 50.000' }}' 
                        }; showAppointmentModal = true"
                        class="absolute top-[16px] h-[64px] rounded-lg text-left px-4 flex items-center border cursor-pointer overflow-hidden transition-all hover:ring-2 hover:ring-offset-2 hover:ring-primary hover:-translate-y-0.5 hover:shadow-md {{ $a[0] }}" 
                        style="left:{{$a[1]}}%;width:{{$a[2]}}%" 
                        data-status="{{$a[7]}}" 
                        data-customer="{{$a[3]}}" 
                        data-phone="{{$a[5]}}" 
                        data-service="{{$a[4]}}" 
                        data-time="{{$a[6]}}">
                        <b class="block text-[13px] font-semibold whitespace-nowrap overflow-hidden text-ellipsis">{{$a[3]}}</b>
                      </button>
                    @endforeach
                  </div>
                </div>
              @endforeach
            </div>
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
               class="w-full max-w-[600px] bg-white rounded-2xl shadow-2xl border border-border-subtle overflow-hidden">
            
            <!-- Modal Header -->
            <div class="flex justify-between items-start p-6 border-b border-border-light bg-white">
              <div>
                <p class="m-0 mb-1 text-slate-700 text-xs font-semibold tracking-wider uppercase">Appointment Details</p>
                <h2 class="m-0 text-xl font-bold text-slate-900" x-text="selectedBooking.customer">Nama Pelanggan</h2>
              </div>
              <div class="flex items-center gap-3">
                <!-- Status Badges -->
                <span x-show="selectedBooking.status === 'dp_paid'" class="px-2.5 py-1 text-xs font-semibold rounded-full bg-amber-100 text-amber-800 border border-amber-200 flex items-center gap-1.5">
                  <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> DP Paid
                </span>
                <span x-show="selectedBooking.status === 'in_chair'" class="px-2.5 py-1 text-xs font-semibold rounded-full bg-primary text-white border border-primary flex items-center gap-1.5">
                  <span class="w-1.5 h-1.5 rounded-full bg-accent animate-pulse"></span> In-Chair
                </span>
                <span x-show="selectedBooking.status === 'completed'" class="px-2.5 py-1 text-xs font-semibold rounded-full bg-slate-100 text-slate-500 border border-slate-200 flex items-center gap-1.5">
                  <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Completed
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
                  <span class="block text-gray-500 text-xs mt-0.5" x-text="selectedBooking.service + ' · ' + selectedBooking.capster"></span>
                </div>
                <div class="text-right">
                  <span class="inline-block text-xs font-medium text-slate-600 bg-slate-100 px-2.5 py-1 rounded-md" x-text="selectedBooking.time"></span>
                </div>
              </div>

              <!-- Financial / Pricing Details -->
              <div class="py-2 divide-y divide-border-light text-sm">
                <div class="flex justify-between py-3.5 text-gray-500">
                  <span>Layanan</span>
                  <span class="font-medium text-primary" x-text="selectedBooking.service"></span>
                </div>
                <div class="flex justify-between py-3.5 text-gray-500">
                  <span>DP Terbayar (Midtrans)</span>
                  <span class="font-semibold text-accent" x-text="selectedBooking.dp || 'Rp 50.000'"></span>
                </div>
                <div class="flex justify-between py-3.5 text-gray-500">
                  <span>Capster &amp; Kursi</span>
                  <span class="font-medium text-primary" x-text="selectedBooking.capster"></span>
                </div>
                <div class="flex justify-between py-3.5 text-gray-500">
                  <span>Estimasi Durasi</span>
                  <span class="font-medium text-primary">60 menit</span>
                </div>
              </div>

              <!-- Quick Payment Method Selection for In-Chair Pelunasan -->
              <div x-show="selectedBooking.status === 'in_chair'" class="mt-2 pt-3 border-t border-border-light">
                <fieldset class="border-0 p-0 m-0">
                  <legend class="text-xs font-bold mb-2.5 text-primary">Metode Pembayaran Pelunasan</legend>
                  <div class="flex gap-2">
                    <label class="cursor-pointer group flex-1">
                      <input type="radio" name="payment_method" checked class="peer sr-only">
                      <span class="flex items-center justify-center border border-border-light py-2 px-3 rounded-lg text-gray-600 text-xs peer-checked:border-primary peer-checked:bg-primary/5 peer-checked:text-primary peer-checked:font-bold transition-all">Tunai / Cash</span>
                    </label>
                    <label class="cursor-pointer group flex-1">
                      <input type="radio" name="payment_method" class="peer sr-only">
                      <span class="flex items-center justify-center border border-border-light py-2 px-3 rounded-lg text-gray-600 text-xs peer-checked:border-primary peer-checked:bg-primary/5 peer-checked:text-primary peer-checked:font-bold transition-all">QRIS Toko</span>
                    </label>
                  </div>
                </fieldset>
              </div>
            </div>

            <!-- Modal Footer: DYNAMIC BUTTONS -->
            <div class="flex flex-col sm:flex-row flex-wrap justify-between items-center gap-4 px-6 py-5 bg-white rounded-b-xl border-t border-border-light">
              <!-- Left side: Cancel Booking (Refund DP) only if dp_paid -->
              <div class="w-full sm:w-auto text-left">
                <button type="button" 
                        x-show="selectedBooking.status === 'dp_paid'" 
                        @click="showAppointmentModal = false" 
                        class="text-xs text-red-600 hover:text-red-700 hover:underline bg-transparent border-0 cursor-pointer p-0 font-medium transition-colors">
                  Cancel Booking (Refund DP)
                </button>
                <button type="button" 
                        x-show="selectedBooking.status !== 'dp_paid'" 
                        @click="showAppointmentModal = false" 
                        class="text-xs text-gray-500 hover:text-primary bg-transparent border-0 cursor-pointer p-0 font-medium transition-colors">
                  Tutup
                </button>
              </div>

              <!-- Right side: Conditional Action Buttons -->
              <div class="flex items-center gap-3 w-full sm:w-auto justify-end">
                <!-- IF status === 'dp_paid' -->
                <template x-if="selectedBooking.status === 'dp_paid'">
                  <div class="flex items-center gap-3">
                    <x-button-outline size="normal" @click="showAppointmentModal = false" class="text-xs py-2 px-3.5 whitespace-nowrap">
                      Reschedule Slot
                    </x-button-outline>
                    <x-button-accent size="normal" @click="selectedBooking.status = 'in_chair'; showAppointmentModal = false" class="text-xs py-2 px-4 shadow-sm whitespace-nowrap">
                      Mulai Layanan (In-Chair)
                    </x-button-accent>
                  </div>
                </template>

                <!-- IF status === 'in_chair' -->
                <template x-if="selectedBooking.status === 'in_chair'">
                  <x-button-primary size="normal" @click="selectedBooking.status = 'completed'; showAppointmentModal = false" class="text-xs py-2 px-4 shadow-sm whitespace-nowrap">
                    Selesaikan &amp; Pelunasan <span class="text-sm ml-1 leading-none">→</span>
                  </x-button-primary>
                </template>

                <!-- IF status === 'completed' -->
                <template x-if="selectedBooking.status === 'completed'">
                  <x-button-outline size="normal" @click="showAppointmentModal = false" class="text-xs py-2 px-4 whitespace-nowrap">
                    Tutup
                  </x-button-outline>
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
