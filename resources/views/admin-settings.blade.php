<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
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
          
          <x-button-outline type="button" size="normal" class="max-sm:text-xs max-sm:px-3" onclick="window.dispatchEvent(new CustomEvent('open-logout-modal'))">Sign Out</x-button-outline>
        </div>
      </header>

      <!-- Main Canvas -->
      <main class="max-w-[1040px] w-full mx-auto p-6 lg:p-8" x-data="{ activeTab: 'services', showAddModal: false, modalType: '' }">
        
                @if(session('status'))
          <div class="mb-4 p-4 rounded-md bg-green-50 border border-green-200 text-green-700 text-sm font-medium">
            {{ session('status') }}
          </div>
        @endif
        @if($errors->any())
          <div class="mb-4 p-4 rounded-md bg-red-50 border border-red-200 text-red-700 text-sm">
            <ul class="list-disc pl-5 m-0">
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        
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
            @forelse($services as $service)
            <x-card padding="normal" class="p-6 bg-white flex items-center justify-between hover:border-slate-300 hover:shadow-md hover:-translate-y-0.5 transition-all">
              <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-slate-100 flex items-center justify-center text-xl text-primary shrink-0">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="6" cy="6" r="3"></circle><circle cx="6" cy="18" r="3"></circle><line x1="20" y1="4" x2="8.12" y2="15.88"></line><line x1="14.47" y1="14.48" x2="20" y2="20"></line><line x1="8.12" y1="8.12" x2="12" y2="12"></line></svg>
                </div>
                <div>
                  <h3 class="m-0 mb-1 text-base font-semibold text-slate-900">{{ $service->name }}</h3>
                  <p class="m-0 text-slate-500 text-sm">{{ $service->category }} &bull; {{ $service->duration_minutes }} min</p>
                </div>
              </div>
              <div class="flex items-center gap-8 max-md:flex-col max-md:items-end max-md:gap-3">
                <div class="flex flex-col items-end gap-1">
                  <span class="font-bold text-base text-slate-900">Rp {{ number_format($service->price, 0, ',', '.') }}</span>
                  <span class="text-xs px-2.5 py-0.5 rounded-full bg-accent/10 text-accent font-semibold">DP Rp {{ number_format($service->dp_amount, 0, ',', '.') }}</span>
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
            @empty
            <div class="text-center py-6 text-slate-500">
               Belum ada layanan yang ditambahkan. Klik tombol "Add New Service" di atas untuk menambahkan.
            </div>
            @endforelse
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
            @forelse($capsters as $capster)
            <x-card padding="normal" class="p-6 bg-white flex items-center justify-between hover:border-slate-300 hover:shadow-md hover:-translate-y-0.5 transition-all">
              <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-slate-100 text-slate-800 grid place-items-center font-bold text-sm shrink-0 uppercase">{{ substr($capster->user->name, 0, 2) }}</div>
                <div>
                  <h3 class="m-0 mb-1 text-base font-semibold text-slate-900">{{ $capster->user->name }}</h3>
                  <p class="m-0 text-slate-500 text-sm">{{ $capster->specialization }} &bull; {{ $capster->user->phone_number }}</p>
                </div>
              </div>
              <div class="flex items-center gap-8 max-md:flex-col max-md:items-end max-md:gap-3">
                <div class="flex flex-col items-end gap-1">
                  <span class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Commission</span>
                  <x-badge variant="accent" type="pill">{{ $capster->commission_split }}%</x-badge>
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
            @empty
            <div class="text-center py-6 text-slate-500">
               Belum ada capster yang didaftarkan. Klik tombol "Add New Capster" di atas untuk menambahkan.
            </div>
            @endforelse
          </div>
          </section>

        <!-- Tab 3: Operating Hours -->
        @php
          $dayNames = [
            0 => 'Sunday',
            1 => 'Monday',
            2 => 'Tuesday',
            3 => 'Wednesday',
            4 => 'Thursday',
            5 => 'Friday',
            6 => 'Saturday',
          ];
          $sortedHours = $operatingHours->sortBy(fn($h) => $h->day_of_week == 0 ? 7 : $h->day_of_week)->values();
        @endphp
        <section x-show="activeTab === 'operating_hours'" 
                 x-cloak 
                 class="transition-all duration-200"
                 x-data="{
                   hours: [
                     @foreach($sortedHours as $hour)
                     {
                       day_of_week: {{ $hour->day_of_week }},
                       name: '{{ $dayNames[$hour->day_of_week] ?? 'Day ' . $hour->day_of_week }}',
                       is_open: {{ $hour->is_open ? 'true' : 'false' }},
                       start_time: '{{ $hour->start_time ? substr($hour->start_time, 0, 5) : '09:00' }}',
                       end_time: '{{ $hour->end_time ? substr($hour->end_time, 0, 5) : '21:00' }}'
                     },
                     @endforeach
                   ],
                   saving: false,
                   isEmergencyClosed: {{ ($barbershop->is_emergency_closed ?? false) ? 'true' : 'false' }},
                   copyMondayToSaturday() {
                     const monday = this.hours.find(h => h.day_of_week === 1);
                     if (!monday) return;
                     this.hours.forEach(h => {
                       if (h.day_of_week >= 2 && h.day_of_week <= 6) {
                         h.is_open = Boolean(monday.is_open);
                         h.start_time = monday.start_time;
                         h.end_time = monday.end_time;
                       }
                     });
                     this.showToast('Jadwal Senin berhasil disalin ke Selasa - Sabtu.', true);
                   },
                   async saveOperatingHours() {
                     this.saving = true;
                     try {
                       const res = await fetch('{{ route('admin.settings.operatingHours') }}', {
                         method: 'POST',
                         headers: {
                           'Content-Type': 'application/json',
                           'Accept': 'application/json',
                           'X-CSRF-TOKEN': '{{ csrf_token() }}'
                         },
                         body: JSON.stringify({ hours: this.hours })
                       });
                       const data = await res.json();
                       if (res.ok) {
                         this.showToast(data.message || 'Jam operasional berhasil disimpan.', true);
                       } else {
                         let err = data.message || 'Gagal menyimpan jam operasional.';
                         if (data.errors) {
                           err = Object.values(data.errors).flat().join(' ');
                         }
                         this.showToast(err, false);
                       }
                     } catch (e) {
                       this.showToast('Terjadi kesalahan jaringan saat menyimpan.', false);
                     } finally {
                       this.saving = false;
                     }
                   },
                   async toggleEmergency() {
                     const nextState = !this.isEmergencyClosed;
                     if (nextState && !confirm('Aktifkan mode darurat? Portal booking online akan ditutup sementara.')) {
                       return;
                     }
                     try {
                       const res = await fetch('{{ route('admin.settings.emergencyClose') }}', {
                         method: 'POST',
                         headers: {
                           'Content-Type': 'application/json',
                           'Accept': 'application/json',
                           'X-CSRF-TOKEN': '{{ csrf_token() }}'
                         },
                         body: JSON.stringify({ is_emergency_closed: nextState })
                       });
                       const data = await res.json();
                       if (res.ok) {
                         this.isEmergencyClosed = data.is_emergency_closed;
                         this.showToast(data.message, true);
                       } else {
                         this.showToast(data.message || 'Gagal mengubah status mode darurat.', false);
                       }
                     } catch (e) {
                       this.showToast('Terjadi kesalahan jaringan.', false);
                     }
                   },
                   showToast(msg, success = true) {
                     const toastEl = document.getElementById('settingsToast');
                     const msgEl = document.getElementById('settingsToastMessage');
                     const iconEl = document.getElementById('settingsToastIcon');
                     if (toastEl && msgEl) {
                       msgEl.textContent = msg;
                       if (iconEl) {
                         iconEl.textContent = success ? '✓' : '!';
                         iconEl.className = `w-5 h-5 rounded-full grid place-items-center text-[11px] font-bold ${success ? 'bg-emerald-500' : 'bg-red-500'}`;
                       }
                       toastEl.classList.remove('opacity-0', 'pointer-events-none', 'translate-y-5');
                       toastEl.classList.add('opacity-100', 'translate-y-0');
                       clearTimeout(window.__settingsToastTimer);
                       window.__settingsToastTimer = setTimeout(() => {
                         toastEl.classList.remove('opacity-100', 'translate-y-0');
                         toastEl.classList.add('opacity-0', 'pointer-events-none', 'translate-y-5');
                       }, 3500);
                     }
                   }
                 }">
          <div class="flex items-end justify-between mb-6 max-md:flex-col max-md:items-start max-md:gap-4">
            <div>
              <h2 class="m-0 mb-1 text-[18px] font-semibold text-slate-900">Operating Hours</h2>
              <p class="m-0 text-slate-500 text-sm">Set your store's daily opening and closing times.</p>
            </div>
            <div class="flex items-center gap-3">
              <div class="group flex items-center gap-3 text-slate-500 bg-white border border-slate-200 py-1.5 px-3 rounded-lg hover:bg-slate-50 transition-colors cursor-pointer" 
                   id="emergencyControl" 
                   :class="isEmergencyClosed ? 'is-active !bg-red-500 !text-white !border-red-600 hover:!bg-red-600' : ''"
                   @click="toggleEmergency()">
                <span class="text-[11px] font-bold uppercase tracking-wider max-sm:hidden" :class="isEmergencyClosed ? '!text-white' : 'text-slate-500'">Emergency Close</span>
                <button type="button" 
                        class="w-[36px] h-[20px] p-0 border-0 rounded-full bg-slate-200 cursor-pointer relative transition-all" 
                        :class="isEmergencyClosed ? '!bg-red-700' : 'bg-slate-200'"
                        id="emergencyToggle" 
                        aria-label="Aktifkan Emergency Close" 
                        :aria-pressed="isEmergencyClosed ? 'true' : 'false'" 
                        @click.stop="toggleEmergency()">
                  <i class="absolute left-[2px] top-[2px] w-[16px] h-[16px] rounded-full bg-white transition-transform shadow-sm"
                     :class="isEmergencyClosed ? 'translate-x-[16px]' : ''"></i>
                </button>
              </div>
              <x-button-primary type="button" size="normal" @click="saveOperatingHours()" x-bind:disabled="saving">
                <span x-text="saving ? 'Saving...' : 'Save Changes'">Save Changes</span>
              </x-button-primary>
            </div>
          </div>
          
          <x-card padding="none" class="bg-white divide-y divide-border-light">
            @foreach($sortedHours as $i => $hour)
            <div class="flex items-center justify-between p-6 hover:bg-slate-50 transition-colors">
              <div class="flex items-center gap-6 w-1/3 min-w-[200px]">
                <label class="relative inline-block w-11 h-6 cursor-pointer shrink-0">
                  <input type="checkbox" class="peer sr-only" x-model="hours[{{ $i }}].is_open">
                  <span class="absolute inset-0 bg-slate-200 rounded-full transition-colors peer-checked:bg-primary"></span>
                  <span class="absolute left-1 bottom-1 w-4 h-4 bg-white rounded-full transition-transform peer-checked:translate-x-5 shadow-sm"></span>
                </label>
                <div class="flex flex-col items-start gap-1">
                  <span class="text-[14px] font-semibold transition-colors" :class="hours[{{ $i }}].is_open ? 'text-slate-900' : 'text-slate-400'">{{ $dayNames[$hour->day_of_week] ?? 'Day ' . $hour->day_of_week }}</span>
                  @if($hour->day_of_week === 1)
                  <button type="button" 
                          @click="copyMondayToSaturday()" 
                          class="inline-flex items-center gap-1.5 text-[11px] font-semibold text-accent hover:text-accent/80 bg-accent/10 hover:bg-accent/20 px-2 py-0.5 rounded transition-colors cursor-pointer border-0" 
                          title="Salin jam buka & tutup Senin ke Selasa-Sabtu">
                    <svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                    Samakan ke Senin-Sabtu
                  </button>
                  @endif
                </div>
              </div>
              <div class="flex flex-1 items-center gap-4 transition-opacity duration-200" :class="hours[{{ $i }}].is_open ? 'opacity-100' : 'opacity-30 pointer-events-none'">
                <div class="flex items-center gap-3 w-full max-w-[200px]">
                  <x-input type="time" x-model="hours[{{ $i }}].start_time" value="{{ $hour->start_time ? substr($hour->start_time, 0, 5) : '09:00' }}" class="w-full text-sm" x-bind:disabled="!hours[{{ $i }}].is_open" />
                </div>
                <span class="text-slate-400 font-medium">—</span>
                <div class="flex items-center gap-3 w-full max-w-[200px]">
                  <x-input type="time" x-model="hours[{{ $i }}].end_time" value="{{ $hour->end_time ? substr($hour->end_time, 0, 5) : '21:00' }}" class="w-full text-sm" x-bind:disabled="!hours[{{ $i }}].is_open" />
                </div>
              </div>
              <div class="w-1/4 text-right max-sm:hidden">
                <span class="text-xs font-semibold" :class="hours[{{ $i }}].is_open ? 'text-emerald-600' : 'text-slate-400'" x-text="hours[{{ $i }}].is_open ? 'Open' : 'Closed'"></span>
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
              <form x-show="modalType === 'service'" action="{{ route('admin.services.store') }}" method="POST" class="flex flex-col gap-4">
                @csrf
                <div class="flex flex-col gap-1.5">
                  <x-label>Service Name</x-label>
                  <x-input type="text" name="name" value="{{ old('name') }}" placeholder="e.g. Buzz Cut &amp; Wash" required />
                </div>
                <div class="grid grid-cols-2 gap-4">
                  <div class="flex flex-col gap-1.5">
                    <x-label>Category / Type</x-label>
                    <x-input type="text" name="category" value="{{ old('category', 'Haircut') }}" placeholder="e.g. Haircut, Shave" required />
                  </div>
                  <div class="flex flex-col gap-1.5">
                    <x-label>Duration (mins)</x-label>
                    <x-input type="number" name="duration_minutes" value="{{ old('duration_minutes', 45) }}" min="5" placeholder="e.g. 45" required />
                  </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                  <div class="flex flex-col gap-1.5">
                    <x-label>Price (Rp)</x-label>
                    <x-input type="number" name="price" value="{{ old('price') }}" placeholder="e.g. 150000" min="0" required />
                  </div>
                  <div class="flex flex-col gap-1.5">
                    <x-label>Down Payment (Rp)</x-label>
                    <x-input type="number" name="dp_amount" value="{{ old('dp_amount') }}" placeholder="e.g. 50000" min="0" required />
                  </div>
                </div>
                <div class="flex flex-col gap-1.5">
                  <x-label>Description (Optional)</x-label>
                  <textarea name="description" rows="2" class="w-full rounded-md border border-border-light bg-surface px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary" placeholder="Penjelasan singkat layanan...">{{ old('description') }}</textarea>
                </div>

                <!-- Footer specifically for Service Form -->
                <div class="flex justify-between items-center pt-6 mt-2 border-t border-border-light">
                  <button type="button" @click="showAddModal = false" class="text-xs text-gray-500 hover:text-primary bg-transparent border-0 cursor-pointer p-0 font-medium">Cancel</button>
                  <x-button-primary type="submit" size="normal">Save Service</x-button-primary>
                </div>
              </form>

              <!-- Capster Form -->
              <form x-show="modalType === 'capster'" action="{{ route('admin.capsters.store') }}" method="POST" class="flex flex-col gap-4">
                @csrf
                <div class="flex flex-col gap-1.5">
                  <x-label>Full Name</x-label>
                  <x-input type="text" name="name" value="{{ old('name') }}" placeholder="e.g. Arya Maulana" required />
                </div>
                <div class="flex flex-col gap-1.5">
                  <x-label>Phone Number (WhatsApp)</x-label>
                  <x-input type="tel" name="phone_number" value="{{ old('phone_number') }}" placeholder="0812-XXXX-XXXX" required />
                </div>
                <div class="flex flex-col gap-1.5">
                  <x-label>Secure PIN / Password</x-label>
                  <x-input type="password" name="password" placeholder="Minimal 8 karakter" required />
                </div>
                <div class="grid grid-cols-2 gap-4">
                  <div class="flex flex-col gap-1.5">
                    <x-label>Specialization</x-label>
                    <select name="specialization" required class="w-full bg-background border border-border-light rounded-lg py-2.5 px-3 text-sm text-primary outline-none focus:border-primary focus:ring-4 focus:ring-primary/10">
                      <option value="Master Barber">Master Barber</option>
                      <option value="Senior Stylist">Senior Stylist</option>
                      <option value="Junior Barber">Junior Barber</option>
                      <option value="Color Specialist">Color Specialist</option>
                    </select>
                  </div>
                  <div class="flex flex-col gap-1.5">
                    <x-label>Commission Split (%)</x-label>
                    <x-input type="number" name="commission_split" value="{{ old('commission_split', 50) }}" placeholder="50" min="0" max="100" required />
                  </div>
                </div>

                <!-- Footer specifically for Capster Form -->
                <div class="flex justify-between items-center pt-6 mt-2 border-t border-border-light">
                  <button type="button" @click="showAddModal = false" class="text-xs text-gray-500 hover:text-primary bg-transparent border-0 cursor-pointer p-0 font-medium">Cancel</button>
                  <x-button-primary type="submit" size="normal">Save Capster</x-button-primary>
                </div>
              </form>
            </div>



          </div>
        </div>

      </main>
    </div>
  </div>
  <div class="fixed right-6 bottom-6 bg-primary text-white py-3 px-4 rounded-md flex gap-2.5 items-center text-xs shadow-lg transform translate-y-5 opacity-0 pointer-events-none transition-all duration-200 z-50" id="settingsToast">
    <b class="w-5 h-5 rounded-full grid place-items-center bg-emerald-500 text-[11px] font-bold" id="settingsToastIcon">✓</b>
    <span id="settingsToastMessage"></span>
  </div>
  @include('partials.logout-modal')
</body>
</html>
