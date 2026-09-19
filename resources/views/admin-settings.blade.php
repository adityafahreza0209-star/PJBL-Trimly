<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Master Data & Settings - Trimly</title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Geist:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
  
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <style>
    [x-cloak] { display: none !important; }
  </style>
</head>
<body class="bg-background text-primary font-sans antialiased m-0">

  <div class="flex min-h-screen">
    
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
          <a href="{{ url('overview') }}" class="relative group w-11 h-11 rounded-xl grid place-items-center text-slate-400 no-underline text-2xl transition-colors hover:text-white hover:bg-white/10">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
            <span class="absolute opacity-0 group-hover:opacity-100 bg-primary text-white text-xs px-2 py-1 rounded shadow-lg left-14 transition-opacity z-50 whitespace-nowrap pointer-events-none">Overview</span>
          </a>
          <a href="{{ url('admin-settings') }}" class="relative group w-11 h-11 rounded-xl grid place-items-center text-accent bg-accent/10 no-underline text-2xl transition-colors hover:text-accent/80 hover:bg-accent/20">
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

    <div class="flex-1 min-w-0 flex flex-col">
      <!-- Topbar -->
      <header class="h-[88px] bg-white border-b border-border-light flex items-center justify-between px-6 lg:px-8 max-md:px-5 max-sm:h-auto max-sm:min-h-[88px] max-sm:py-4">
        <div>
          <p class="m-0 mb-1 text-[11px] font-bold tracking-[0.05em] uppercase text-slate-500">System Configuration</p>
          <h1 class="m-0 text-[24px] font-bold text-slate-900">Master Data & Settings</h1>
        </div>
        <div class="flex items-center gap-4">
          
          <x-button-outline size="normal" href="{{ url('login') }}" class="max-sm:text-xs max-sm:px-3">Sign Out</x-button-outline>
        </div>
      </header>

      <!-- Main Canvas -->
      <main class="max-w-[1040px] w-full mx-auto p-6 lg:p-8" x-data="{ activeTab: 'services', showAddModal: false, modalType: '' }">
        
        <!-- Tabs -->
        <div class="flex gap-8 border-b border-border-light mb-8 relative">
          <button type="button" 
                  @click="activeTab = 'services'" 
                  :class="activeTab === 'services' ? 'border-b-2 border-primary text-slate-900 font-bold' : 'text-slate-500 font-medium hover:text-slate-900'"
                  class="bg-transparent border-0 pb-4 text-sm cursor-pointer relative transition-colors">
            Service Menu
          </button>
          <button type="button" 
                  @click="activeTab = 'capsters'" 
                  :class="activeTab === 'capsters' ? 'border-b-2 border-primary text-slate-900 font-bold' : 'text-slate-500 font-medium hover:text-slate-900'"
                  class="bg-transparent border-0 pb-4 text-sm cursor-pointer relative transition-colors">
            Capster Profiles
          </button>
          <button type="button" 
                  @click="activeTab = 'operating_hours'" 
                  :class="activeTab === 'operating_hours' ? 'border-b-2 border-primary text-slate-900 font-bold' : 'text-slate-500 font-medium hover:text-slate-900'"
                  class="bg-transparent border-0 pb-4 text-sm cursor-pointer relative transition-colors">
            Operating Hours
          </button>
        </div>

        <!-- Tab 1: Service Menu -->
        <section x-show="activeTab === 'services'" x-cloak class="transition-all duration-200">
          <div class="flex items-end justify-between mb-6 max-md:flex-col max-md:items-start max-md:gap-4">
            <div>
              <h2 class="m-0 mb-1 text-[18px] font-semibold text-slate-900">Grooming Services</h2>
              <p class="m-0 text-slate-500 text-sm">Manage your service offerings, pricing, and durations.</p>
            </div>
            <x-button-primary size="normal" @click="showAddModal = true; modalType = 'service'">
              <span class="mr-1">+</span> Add New Service
            </x-button-primary>
          </div>
          
          <div class="flex flex-col gap-4">
            <!-- Service Card 1 -->
            <x-card padding="normal" class="p-6 bg-white flex items-center justify-between hover:border-slate-300 hover:shadow-md hover:-translate-y-0.5 transition-all">
              <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-slate-100 flex items-center justify-center text-xl text-primary shrink-0">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="6" cy="6" r="3"></circle><circle cx="6" cy="18" r="3"></circle><line x1="20" y1="4" x2="8.12" y2="15.88"></line><line x1="14.47" y1="14.48" x2="20" y2="20"></line><line x1="8.12" y1="8.12" x2="12" y2="12"></line></svg>
                </div>
                <div>
                  <h3 class="m-0 mb-1 text-base font-semibold text-slate-900">Gentleman's Fade</h3>
                  <p class="m-0 text-slate-500 text-sm">Haircut &bull; 45 min</p>
                </div>
              </div>
              <div class="flex items-center gap-8 max-md:flex-col max-md:items-end max-md:gap-3">
                <div class="flex flex-col items-end gap-1">
                  <span class="font-bold text-base text-slate-900">Rp 150.000</span>
                  <span class="text-xs px-2.5 py-0.5 rounded-full bg-accent/10 text-accent font-semibold">30% DP</span>
                </div>
                <div class="flex items-center gap-1.5">
                  <button type="button" class="bg-transparent border-0 text-slate-500 hover:text-slate-900 text-lg cursor-pointer w-8 h-8 rounded-lg grid place-items-center transition-colors hover:bg-slate-100" title="Edit">✎</button>
                  <button type="button" class="bg-transparent border-0 text-slate-400 hover:text-rose-500 cursor-pointer w-8 h-8 rounded-lg grid place-items-center transition-colors hover:bg-rose-50" title="Delete / Archive" aria-label="Delete">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M3 6h18"></path>
                      <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                      <line x1="10" y1="11" x2="10" y2="17"></line>
                      <line x1="14" y1="11" x2="14" y2="17"></line>
                    </svg>
                  </button>
                </div>
              </div>
            </x-card>
            <!-- Service Card 2 -->
            <x-card padding="normal" class="p-6 bg-white flex items-center justify-between hover:border-slate-300 hover:shadow-md hover:-translate-y-0.5 transition-all">
              <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-slate-100 flex items-center justify-center text-xl text-primary shrink-0">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22a7 7 0 0 0 7-7c0-2-1-3.9-3-5.5s-3.5-4-4-6.5c-.5 2.5-2 4.9-4 6.5C6 11.1 5 13 5 15a7 7 0 0 0 7 7z"></path></svg>
                </div>
                <div>
                  <h3 class="m-0 mb-1 text-base font-semibold text-slate-900">Classic Hot Towel Shave</h3>
                  <p class="m-0 text-slate-500 text-sm">Beard &bull; 30 min</p>
                </div>
              </div>
              <div class="flex items-center gap-8 max-md:flex-col max-md:items-end max-md:gap-3">
                <div class="flex flex-col items-end gap-1">
                  <span class="font-bold text-base text-slate-900">Rp 100.000</span>
                  <span class="text-xs px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-500 font-medium">No DP</span>
                </div>
                <div class="flex items-center gap-1.5">
                  <button type="button" class="bg-transparent border-0 text-slate-500 hover:text-slate-900 text-lg cursor-pointer w-8 h-8 rounded-lg grid place-items-center transition-colors hover:bg-slate-100" title="Edit">✎</button>
                  <button type="button" class="bg-transparent border-0 text-slate-400 hover:text-rose-500 cursor-pointer w-8 h-8 rounded-lg grid place-items-center transition-colors hover:bg-rose-50" title="Delete / Archive" aria-label="Delete">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M3 6h18"></path>
                      <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                      <line x1="10" y1="11" x2="10" y2="17"></line>
                      <line x1="14" y1="11" x2="14" y2="17"></line>
                    </svg>
                  </button>
                </div>
              </div>
            </x-card>
          </div>
        </section>

        <!-- Tab 2: Capster Profiles -->
        <section x-show="activeTab === 'capsters'" x-cloak class="transition-all duration-200">
          <div class="flex items-end justify-between mb-6 max-md:flex-col max-md:items-start max-md:gap-4">
            <div>
              <h2 class="m-0 mb-1 text-[18px] font-semibold text-slate-900">Capster Profiles</h2>
              <p class="m-0 text-slate-500 text-sm">Manage barbers, specializations, and commission splits.</p>
            </div>
            <x-button-primary size="normal" @click="showAddModal = true; modalType = 'capster'">
              <span class="mr-1">+</span> Add New Capster
            </x-button-primary>
          </div>
          
          <div class="flex flex-col gap-4">
            <!-- Capster Card 1 -->
            <x-card padding="normal" class="p-6 bg-white flex items-center justify-between hover:border-slate-300 hover:shadow-md hover:-translate-y-0.5 transition-all">
              <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-amber-100 text-amber-800 grid place-items-center font-bold text-sm shrink-0">FP</div>
                <div>
                  <h3 class="m-0 mb-1 text-base font-semibold text-slate-900">Fajar Pratama</h3>
                  <p class="m-0 text-slate-500 text-sm">Master Barber &bull; 0812-3333-4444</p>
                </div>
              </div>
              <div class="flex items-center gap-8 max-md:flex-col max-md:items-end max-md:gap-3">
                <div class="flex flex-col items-end gap-1">
                  <span class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Commission</span>
                  <x-badge variant="accent" type="pill">60%</x-badge>
                </div>
                <div class="flex items-center gap-1.5">
                  <button type="button" class="bg-transparent border-0 text-slate-500 hover:text-slate-900 text-lg cursor-pointer w-8 h-8 rounded-lg grid place-items-center transition-colors hover:bg-slate-100" title="Edit">✎</button>
                  <button type="button" class="bg-transparent border-0 text-slate-400 hover:text-rose-500 cursor-pointer w-8 h-8 rounded-lg grid place-items-center transition-colors hover:bg-rose-50" title="Delete / Archive" aria-label="Delete">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M3 6h18"></path>
                      <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                      <line x1="10" y1="11" x2="10" y2="17"></line>
                      <line x1="14" y1="11" x2="14" y2="17"></line>
                    </svg>
                  </button>
                </div>
              </div>
            </x-card>
            <!-- Capster Card 2 -->
            <x-card padding="normal" class="p-6 bg-white flex items-center justify-between hover:border-slate-300 hover:shadow-md hover:-translate-y-0.5 transition-all">
              <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-emerald-100 text-emerald-800 grid place-items-center font-bold text-sm shrink-0">RK</div>
                <div>
                  <h3 class="m-0 mb-1 text-base font-semibold text-slate-900">Rendra Kusuma</h3>
                  <p class="m-0 text-slate-500 text-sm">Senior Stylist &bull; 0812-5555-6666</p>
                </div>
              </div>
              <div class="flex items-center gap-8 max-md:flex-col max-md:items-end max-md:gap-3">
                <div class="flex flex-col items-end gap-1">
                  <span class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Commission</span>
                  <x-badge variant="accent" type="pill">50%</x-badge>
                </div>
                <div class="flex items-center gap-1.5">
                  <button type="button" class="bg-transparent border-0 text-slate-500 hover:text-slate-900 text-lg cursor-pointer w-8 h-8 rounded-lg grid place-items-center transition-colors hover:bg-slate-100" title="Edit">✎</button>
                  <button type="button" class="bg-transparent border-0 text-slate-400 hover:text-rose-500 cursor-pointer w-8 h-8 rounded-lg grid place-items-center transition-colors hover:bg-rose-50" title="Delete / Archive" aria-label="Delete">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M3 6h18"></path>
                      <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                      <line x1="10" y1="11" x2="10" y2="17"></line>
                      <line x1="14" y1="11" x2="14" y2="17"></line>
                    </svg>
                  </button>
                </div>
              </div>
            </x-card>
          </div>
        </section>

        <!-- Tab 3: Operating Hours -->
        <section x-show="activeTab === 'operating_hours'" x-cloak class="transition-all duration-200">
          <div class="flex items-end justify-between mb-6 max-md:flex-col max-md:items-start max-md:gap-4">
            <div>
              <h2 class="m-0 mb-1 text-[18px] font-semibold text-slate-900">Operating Hours</h2>
              <p class="m-0 text-slate-500 text-sm">Set your store's daily opening and closing times.</p>
            </div>
            <x-button-primary size="normal">
              Save Changes
            </x-button-primary>
          </div>
          
          <x-card padding="none" class="bg-white divide-y divide-border-light">
            @php
            $days = [
              ['id' => 'mon', 'name' => 'Monday', 'open' => true, 'start' => '09:00', 'end' => '21:00'],
              ['id' => 'tue', 'name' => 'Tuesday', 'open' => true, 'start' => '09:00', 'end' => '21:00'],
              ['id' => 'wed', 'name' => 'Wednesday', 'open' => true, 'start' => '09:00', 'end' => '21:00'],
              ['id' => 'thu', 'name' => 'Thursday', 'open' => true, 'start' => '09:00', 'end' => '21:00'],
              ['id' => 'fri', 'name' => 'Friday', 'open' => true, 'start' => '13:00', 'end' => '21:00'],
              ['id' => 'sat', 'name' => 'Saturday', 'open' => true, 'start' => '09:00', 'end' => '22:00'],
              ['id' => 'sun', 'name' => 'Sunday', 'open' => false, 'start' => '09:00', 'end' => '21:00'],
            ];
            @endphp

            @foreach($days as $day)
            <div class="flex items-center justify-between p-6 hover:bg-slate-50 transition-colors" x-data="{ isOpen: {{ $day['open'] ? 'true' : 'false' }} }">
              <div class="flex items-center gap-6 w-1/3 min-w-[200px]">
                <label class="relative inline-block w-11 h-6 cursor-pointer shrink-0">
                  <input type="checkbox" class="peer sr-only" x-model="isOpen">
                  <span class="absolute inset-0 bg-slate-200 rounded-full transition-colors peer-checked:bg-primary"></span>
                  <span class="absolute left-1 bottom-1 w-4 h-4 bg-white rounded-full transition-transform peer-checked:translate-x-5 shadow-sm"></span>
                </label>
                <span class="text-[14px] font-semibold transition-colors" :class="isOpen ? 'text-slate-900' : 'text-slate-400'">{{ $day['name'] }}</span>
              </div>
              <div class="flex flex-1 items-center gap-4 transition-opacity duration-200" :class="isOpen ? 'opacity-100' : 'opacity-30 pointer-events-none'">
                <div class="flex items-center gap-3 w-full max-w-[200px]">
                  <x-input type="time" value="{{ $day['start'] }}" class="w-full text-sm" x-bind:disabled="!isOpen" />
                </div>
                <span class="text-slate-400 font-medium">—</span>
                <div class="flex items-center gap-3 w-full max-w-[200px]">
                  <x-input type="time" value="{{ $day['end'] }}" class="w-full text-sm" x-bind:disabled="!isOpen" />
                </div>
              </div>
              <div class="w-1/4 text-right max-sm:hidden">
                <span class="text-xs font-semibold" :class="isOpen ? 'text-emerald-600' : 'text-slate-400'" x-text="isOpen ? 'Open' : 'Closed'"></span>
              </div>
            </div>
            @endforeach
          </x-card>
        </section>

        <!-- Reusable "Add New" Modal (Alpine.js) -->
        <div x-show="showAddModal" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             x-cloak
             class="fixed inset-0 bg-black/50 backdrop-blur-xs grid place-items-center p-5 z-50 overflow-y-auto"
             style="display: none;">
          
          <div @click.away="showAddModal = false"
               x-show="showAddModal"
               x-transition:enter="transition ease-out duration-200"
               x-transition:enter-start="opacity-0 scale-95 translate-y-2"
               x-transition:enter-end="opacity-100 scale-100 translate-y-0"
               x-transition:leave="transition ease-in duration-150"
               x-transition:leave-start="opacity-100 scale-100 translate-y-0"
               x-transition:leave-end="opacity-0 scale-95 translate-y-2"
               class="w-full max-w-[500px] bg-white rounded-2xl shadow-2xl border border-border-subtle overflow-hidden">
            
            <!-- Modal Header -->
            <div class="p-6 border-b border-border-light flex justify-between items-start bg-white">
              <div>
                <p class="m-0 mb-1 text-primary text-[10px] font-bold tracking-widest uppercase" x-text="modalType === 'service' ? 'Service Catalog' : 'Team Management'"></p>
                <h2 class="m-0 font-display font-semibold text-2xl tracking-tight" x-text="modalType === 'service' ? 'Add New Service' : 'Add New Capster'"></h2>
              </div>
              <button type="button" @click="showAddModal = false" class="border-0 bg-transparent text-gray-400 hover:text-primary text-[24px] leading-none cursor-pointer transition-colors p-1" aria-label="Close">&times;</button>
            </div>

            <!-- Modal Form Body -->
            <div class="p-6 bg-white overflow-y-auto max-h-[70vh]">
              <!-- Service Form -->
              <form x-show="modalType === 'service'" class="flex flex-col gap-4">
                <div class="flex flex-col gap-1.5">
                  <x-label>Service Name</x-label>
                  <x-input type="text" placeholder="e.g. Buzz Cut &amp; Wash" />
                </div>
                <div class="grid grid-cols-2 gap-4">
                  <div class="flex flex-col gap-1.5">
                    <x-label>Category / Type</x-label>
                    <select class="w-full bg-background border border-border-light rounded-lg py-2.5 px-3 text-sm text-primary outline-none focus:border-primary focus:ring-4 focus:ring-primary/10">
                      <option>Haircut</option>
                      <option>Beard &amp; Shave</option>
                      <option>Treatment</option>
                      <option>Coloring</option>
                    </select>
                  </div>
                  <div class="flex flex-col gap-1.5">
                    <x-label>Duration (mins)</x-label>
                    <select class="w-full bg-background border border-border-light rounded-lg py-2.5 px-3 text-sm text-primary outline-none focus:border-primary focus:ring-4 focus:ring-primary/10">
                      <option>30 mins</option>
                      <option>45 mins</option>
                      <option>60 mins</option>
                      <option>90 mins</option>
                    </select>
                  </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                  <div class="flex flex-col gap-1.5">
                    <x-label>Price (Rp)</x-label>
                    <x-input type="number" placeholder="150000" />
                  </div>
                  <div class="flex flex-col gap-1.5">
                    <x-label>DP Required (%)</x-label>
                    <x-input type="number" placeholder="30" min="0" max="100" />
                  </div>
                </div>
              </form>

              <!-- Capster Form -->
              <form x-show="modalType === 'capster'" class="flex flex-col gap-4">
                <div class="flex flex-col gap-1.5">
                  <x-label>Full Name</x-label>
                  <x-input type="text" placeholder="e.g. Arya Maulana" />
                </div>
                <div class="grid grid-cols-2 gap-4">
                  <div class="flex flex-col gap-1.5">
                    <x-label>Role / Title</x-label>
                    <select class="w-full bg-background border border-border-light rounded-lg py-2.5 px-3 text-sm text-primary outline-none focus:border-primary focus:ring-4 focus:ring-primary/10">
                      <option>Master Barber</option>
                      <option>Senior Stylist</option>
                      <option>Junior Barber</option>
                      <option>Color Specialist</option>
                    </select>
                  </div>
                  <div class="flex flex-col gap-1.5">
                    <x-label>Commission Split (%)</x-label>
                    <x-input type="number" placeholder="50" min="0" max="100" />
                  </div>
                </div>
                <div class="flex flex-col gap-1.5">
                  <x-label>Phone Number</x-label>
                  <x-input type="tel" placeholder="0812-XXXX-XXXX" />
                </div>
              </form>
            </div>

            <!-- Modal Footer -->
            <div class="flex justify-between items-center px-6 py-4 bg-surface border-t border-border-light">
              <button type="button" @click="showAddModal = false" class="text-xs text-gray-500 hover:text-primary bg-transparent border-0 cursor-pointer p-0 font-medium">Cancel</button>
              <x-button-primary size="normal" @click="showAddModal = false">Save Data</x-button-primary>
            </div>

          </div>
        </div>

      </main>
    </div>
  </div>
</body>
</html>
