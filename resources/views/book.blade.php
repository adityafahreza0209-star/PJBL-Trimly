<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>Doctor Barber — Booking Portal</title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Geist:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
  
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <style>
    [x-cloak] { display: none !important; }
  </style>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-primary leading-relaxed bg-background antialiased">

  <div 
    class="w-full min-h-screen flex flex-col bg-background"
    x-data="{ 
      showPaymentModal: false, 
      showTrackModal: false,
      selectedMethod: 'qris',
      timeLeft: 893,
      timer: null,
      get formattedTime() {
        const m = Math.floor(this.timeLeft / 60);
        const s = this.timeLeft % 60;
        return m + ':' + (s < 10 ? '0' : '') + s;
      },
      startTimer() {
        clearInterval(this.timer);
        this.timeLeft = 893;
        this.timer = setInterval(() => {
          if (this.timeLeft > 0) {
            this.timeLeft--;
          } else {
            clearInterval(this.timer);
          }
        }, 1000);
      }
    }"
  >
    
    <!-- Tenant Header -->
    <header class="w-full border-b border-border-light">
      <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 xl:px-16 py-6 flex items-center justify-between">
        <div class="flex items-center gap-4">
          <a href="{{ url('/') }}" class="flex items-center justify-center w-10 h-10 border border-border-light rounded-full hover:bg-gray-50 hover:border-gray-300 transition-colors">
            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
          </a>
          <div class="flex flex-col">
            <h1 class="font-serif text-2xl lg:text-3xl font-semibold leading-tight text-primary">Doctor Barber<span class="text-accent">.</span></h1>
            <p class="text-sm text-primary/70">Malang, Jawa Timur</p>
          </div>
        </div>
        <x-button-outline id="btnOpenHistory" class="py-2 px-4 text-sm font-semibold rounded-md">Riwayat & Tiket</x-button-outline>
      </div>
    </header>

    <div class="w-full max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8 pt-8 pb-24 px-6 sm:px-8 lg:px-12 xl:px-16">
      
      <!-- Left Column: Booking Flow (8 cols) -->
      <main class="w-full lg:col-span-8">

        <!-- Track Booking Header -->
        <div class="flex justify-between items-center mb-8 pb-4 border-b border-border-light">
          <h1 class="text-xl font-serif font-bold text-primary">CukurHub.</h1>
          <button @click="showTrackModal = true" class="text-sm font-medium text-slate-600 bg-white border border-slate-300 hover:bg-slate-50 px-4 py-2 rounded-lg shadow-sm transition-all cursor-pointer">
            Cari Tiket / Riwayat
          </button>
        </div>

      <!-- Step 1: Capster & Service -->
      <section id="step1">
        <h2 class="font-serif text-2xl font-medium mb-6 text-primary">01. Select Capster</h2>
        
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
          <label class="cursor-pointer group">
            <input type="radio" name="capster" value="Fajar Pratama" class="peer hidden" checked>
            <div class="flex flex-col items-center p-6 border border-border-light rounded-md transition-colors bg-surface hover:border-slate-400 peer-checked:border-primary peer-checked:ring-1 peer-checked:ring-primary peer-checked:bg-primary/5 peer-checked:hover:border-primary peer-checked:hover:ring-primary relative">
              <div class="w-14 h-14 rounded-full bg-white flex items-center justify-center font-serif font-semibold text-xl mb-4 text-primary border border-gray-200">FP</div>
              <div class="text-center">
                <div class="font-bold">Fajar P.</div>
                <div class="text-xs text-primary/70 mt-1">Master Barber</div>
              </div>
              <button type="button" class="absolute top-2 right-2 p-1.5 rounded-full text-gray-400 hover:bg-gray-100 hover:text-primary transition-colors" onclick="openCapsterProfile('Fajar P.', 'Master Barber', 'Fajar memiliki lebih dari 10 tahun pengalaman...', ['Skin Fade', 'Classic Pompadour', 'Hot Towel Shave'], 'FP', event)" aria-label="Lihat Profil">
                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
              </button>
            </div>
          </label>
          
          <label class="cursor-pointer group">
            <input type="radio" name="capster" value="Aditya Wijaya" class="peer hidden">
            <div class="flex flex-col items-center p-6 border border-border-light rounded-md transition-colors bg-surface hover:border-slate-400 peer-checked:border-primary peer-checked:ring-1 peer-checked:ring-primary peer-checked:bg-primary/5 peer-checked:hover:border-primary peer-checked:hover:ring-primary relative">
              <div class="w-14 h-14 rounded-full bg-white flex items-center justify-center font-serif font-semibold text-xl mb-4 text-primary border border-gray-200">AW</div>
              <div class="text-center">
                <div class="font-bold">Aditya W.</div>
                <div class="text-xs text-primary/70 mt-1">Senior Stylist</div>
              </div>
              <button type="button" class="absolute top-2 right-2 p-1.5 rounded-full text-gray-400 hover:bg-gray-100 hover:text-primary transition-colors" onclick="openCapsterProfile('Aditya W.', 'Senior Stylist', 'Gaya modern dan tekstur adalah keahlian Aditya.', ['French Crop', 'Mullet', 'Coloring'], 'AW', event)" aria-label="Lihat Profil">
                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
              </button>
            </div>
          </label>
          
          <label class="cursor-pointer group">
            <input type="radio" name="capster" value="Rendra Kusuma" class="peer hidden">
            <div class="flex flex-col items-center p-6 border border-border-light rounded-md transition-colors bg-surface hover:border-slate-400 peer-checked:border-primary peer-checked:ring-1 peer-checked:ring-primary peer-checked:bg-primary/5 peer-checked:hover:border-primary peer-checked:hover:ring-primary relative">
              <div class="w-14 h-14 rounded-full bg-white flex items-center justify-center font-serif font-semibold text-xl mb-4 text-primary border border-gray-200">RK</div>
              <div class="text-center">
                <div class="font-bold">Rendra K.</div>
                <div class="text-xs text-primary/70 mt-1">Senior Stylist</div>
              </div>
              <button type="button" class="absolute top-2 right-2 p-1.5 rounded-full text-gray-400 hover:bg-gray-100 hover:text-primary transition-colors" onclick="openCapsterProfile('Rendra K.', 'Senior Stylist', 'Ahli dalam menata rambut tipis menjadi lebih bervolume.', ['Beard Trimming', 'Executive Contour', 'Thin Hair'], 'RK', event)" aria-label="Lihat Profil">
                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
              </button>
            </div>
          </label>
          
          <label class="cursor-pointer group">
            <input type="radio" name="capster" value="Any Available" class="peer hidden">
            <div class="flex flex-col items-center p-6 border border-border-light rounded-md transition-colors bg-surface hover:border-slate-400 peer-checked:border-primary peer-checked:ring-1 peer-checked:ring-primary peer-checked:bg-primary/5 peer-checked:hover:border-primary peer-checked:hover:ring-primary">
              <div class="w-14 h-14 rounded-full bg-primary text-white flex items-center justify-center font-serif font-semibold text-xl mb-4 border border-border-light">?</div>
              <div class="text-center">
                <div class="font-bold">Any Available</div>
                <div class="text-xs text-primary/70 mt-1">Fastest Slot</div>
              </div>
            </div>
          </label>
        </div>

        <h2 class="font-serif text-2xl font-medium mb-6 mt-14 text-primary">02. Select Service</h2>
        
        <div class="flex flex-col gap-4">
          <label class="cursor-pointer">
            <input type="radio" name="service" value="Cukur Reguler" data-price="25000" data-dp="10000" data-duration="30 MINS" class="peer hidden" checked>
            <div class="flex justify-between items-start p-6 border border-border-light rounded-md transition-colors bg-surface hover:border-slate-400 peer-checked:border-primary peer-checked:ring-1 peer-checked:ring-primary peer-checked:bg-primary/5 peer-checked:hover:border-primary peer-checked:hover:ring-primary">
              <div>
                <div class="font-bold text-lg mb-1 service-name">Cukur Reguler</div>
                <div class="text-sm text-primary/70 mb-3 max-w-[90%]">Potong rambut rapi standar, styling dengan pomade.</div>
                <x-badge variant="neutral" class="px-2.5 py-1 text-xs font-semibold">30 MINS • DP Rp 10.000</x-badge>
              </div>
              <div class="font-bold text-lg whitespace-nowrap">Rp 25.000</div>
            </div>
          </label>

          <label class="cursor-pointer">
            <input type="radio" name="service" value="Cukur + Keramas + Pijat" data-price="35000" data-dp="15000" data-duration="45 MINS" class="peer hidden">
            <div class="flex justify-between items-start p-6 border border-border-light rounded-md transition-colors bg-surface hover:border-slate-400 peer-checked:border-primary peer-checked:ring-1 peer-checked:ring-primary peer-checked:bg-primary/5 peer-checked:hover:border-primary peer-checked:hover:ring-primary">
              <div>
                <div class="font-bold text-lg mb-1 service-name">Cukur + Keramas + Pijat</div>
                <div class="text-sm text-primary/70 mb-3 max-w-[90%]">Paket komplit: potong rambut, cuci rambut, dan pijat relaksasi ringan.</div>
                <x-badge variant="neutral" class="px-2.5 py-1 text-xs font-semibold">45 MINS • DP Rp 15.000</x-badge>
              </div>
              <div class="font-bold text-lg whitespace-nowrap">Rp 35.000</div>
            </div>
          </label>

          <label class="cursor-pointer">
            <input type="radio" name="service" value="Trim Kumis & Jenggot" data-price="15000" data-dp="5000" data-duration="15 MINS" class="peer hidden">
            <div class="flex justify-between items-start p-6 border border-border-light rounded-md transition-colors bg-surface hover:border-slate-400 peer-checked:border-primary peer-checked:ring-1 peer-checked:ring-primary peer-checked:bg-primary/5 peer-checked:hover:border-primary peer-checked:hover:ring-primary">
              <div>
                <div class="font-bold text-lg mb-1 service-name">Trim Kumis & Jenggot</div>
                <div class="text-sm text-primary/70 mb-3 max-w-[90%]">Cukur dan rapikan area kumis serta jenggot.</div>
                <x-badge variant="neutral" class="px-2.5 py-1 text-xs font-semibold">15 MINS • DP Rp 5.000</x-badge>
              </div>
              <div class="font-bold text-lg whitespace-nowrap">Rp 15.000</div>
            </div>
          </label>
        </div>
      </section>

      <!-- Step 2: Date & Time & Client Info -->
      <section id="step2" class="mt-14">
        <h2 class="font-serif text-2xl font-medium mb-6 text-primary">03. Date & Time</h2>
        
        <div id="emergencyAlert" class="hidden bg-red-50 border border-red-400 text-red-800 p-4 rounded-md mb-6">
          <div class="font-bold mb-1 flex items-center gap-2"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg> Studio Sedang Tutup Darurat</div>
          <div class="text-sm">Mohon maaf, studio saat ini sedang tutup sementara karena keadaan darurat. Pemesanan slot waktu dinonaktifkan.</div>
        </div>
        
        <div class="w-full overflow-x-auto pb-4 scrollbar-hide">
          <div class="flex gap-3" id="dateScroll">
            <!-- Dynamically populated via JS -->
          </div>
        </div>
        
        <div class="grid grid-cols-[repeat(auto-fill,minmax(90px,1fr))] gap-3 mt-6" id="timeGrid">
          <!-- Dynamically populated buttons via JS -->
        </div>

        <h2 class="font-serif text-2xl font-medium mb-6 mt-14 text-primary">04. Your Details</h2>
        <div class="flex flex-col gap-5">
          <div class="flex flex-col gap-2">
            <x-label for="clientName" class="font-bold">Full Name</x-label>
            <x-input type="text" id="clientName" placeholder="e.g. Arya Maulana" />
          </div>
          <div class="flex flex-col gap-2">
            <x-label for="clientPhone" class="font-bold">WhatsApp Number</x-label>
            <x-input type="tel" id="clientPhone" placeholder="0812-XXXX-XXXX" />
          </div>
        </div>
      </section>
      
      <div class="h-44 lg:hidden"></div>
      </main>

      <!-- Right Column: Order Summary (4 cols) -->
      <aside class="fixed bottom-0 left-0 w-full z-50 lg:static lg:col-span-4 lg:z-auto">
        <div class="bg-primary text-white lg:rounded-2xl lg:shadow-lg lg:h-fit lg:sticky lg:top-8 p-6 lg:p-8 flex flex-col justify-between border-t border-white/10 lg:border-t-0 shadow-2xl lg:shadow-xl">
          <div>
            <div class="hidden lg:flex justify-between items-center pb-6 mb-8 border-b border-white/15">
              <h2 class="font-serif text-2xl font-medium text-white">Order Summary</h2>
              <span class="text-[10px] uppercase tracking-widest bg-white/10 px-2.5 py-1 rounded text-white/80 font-semibold">Protected by Trimly OS</span>
            </div>
            
            <div class="hidden lg:flex flex-col gap-6 mb-8 pb-8 border-b border-white/15">
              <div class="flex justify-between items-start">
                <span class="text-sm text-white/70">Capster</span>
                <span class="font-bold text-white" id="summCapster">Fajar P.</span>
              </div>
              <div class="flex justify-between items-start">
                <span class="text-sm text-white/70">Service</span>
                <div class="flex flex-col items-end">
                  <span class="font-bold text-white" id="summService">Cukur Reguler</span>
                  <span class="text-xs text-white/50 mt-1" id="summDuration">30 MINS</span>
                </div>
              </div>
              <div class="flex justify-between items-start">
                <span class="text-sm text-white/70">Date & Time</span>
                <div class="flex flex-col items-end">
                  <span class="font-bold text-white" id="summDate">Thu, 28 Aug</span>
                  <span class="text-xs text-white/50 mt-1" id="summTime">Select a time</span>
                </div>
              </div>
            </div>
            
            <div class="flex flex-col gap-1 mb-4 lg:gap-4 lg:mb-8">
              <div class="flex justify-between items-center text-sm lg:text-base text-white/80">
                <span>Total Service</span>
                <span class="font-bold text-white" id="summTotal">Rp 25.000</span>
              </div>
              <div class="flex justify-between items-center text-lg lg:text-xl">
                <span class="font-bold text-white">Required DP</span>
                <span class="font-bold text-accent" id="summDP">Rp 10.000</span>
              </div>
              <p class="hidden lg:block text-sm text-white/60">Remaining balance of <span id="summRemaining" class="text-white font-medium">Rp 15.000</span> will be paid at the studio.</p>
            </div>
          </div>
          
          <div class="pt-2 lg:pt-0">
            <button 
              type="button"
              class="w-full flex justify-center items-center gap-2 bg-white text-primary font-semibold text-base p-4 rounded-md hover:bg-gray-100 transition-all shadow-md cursor-pointer disabled:bg-white/35 disabled:text-primary/40 disabled:cursor-not-allowed disabled:hover:bg-white/35 disabled:shadow-none" 
              id="btnCheckout"
              disabled
              @click.prevent="if ($el.disabled) return; showPaymentModal = true; startTimer()"
            >
              <span>Lock Schedule & Pay DP</span>
              <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
            </button>
          </div>
        </div>
      </aside>
    </div>

  <!-- TRACK BOOKING MODAL -->
  <div 
    x-show="showTrackModal" 
    x-cloak
    x-transition.opacity 
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4"
  >
    <div class="bg-white rounded-3xl max-w-sm w-full shadow-2xl overflow-hidden" @click.outside="showTrackModal = false">
      <div class="flex justify-between items-center px-6 py-4 border-b border-border-light">
        <h3 class="font-bold text-lg text-primary">Cari Status Booking</h3>
        <button type="button" @click="showTrackModal = false" class="text-slate-400 hover:text-primary transition-colors text-xl leading-none cursor-pointer">&times;</button>
      </div>
      <div class="p-6 space-y-4">
        <div>
          <label class="block text-sm font-bold text-primary mb-1">Nomor WhatsApp</label>
          <input type="text" placeholder="Contoh: 08123456789" class="w-full border border-slate-300 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-shadow">
        </div>
        <div>
          <label class="block text-sm font-bold text-primary mb-1">Kode Order (Opsional)</label>
          <input type="text" placeholder="Contoh: TRM-X892A" class="w-full border border-slate-300 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-shadow">
        </div>
      </div>
      <div class="px-6 pb-6">
        <x-button-primary fullWidth="true" @click="showTrackModal = false" class="justify-center">Cek Status Antrean</x-button-primary>
      </div>
    </div>
  </div>

  <!-- MIDTRANS PAYMENT SIMULATION MODAL (Alpine.js) -->
  <div 
    x-show="showPaymentModal" 
    x-cloak 
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4"
    @keydown.escape.window="showPaymentModal = false"
  >
    <div 
      x-show="showPaymentModal"
      x-transition:enter="transition ease-out duration-300"
      x-transition:enter-start="opacity-0 scale-95 translate-y-4"
      x-transition:enter-end="opacity-100 scale-100 translate-y-0"
      x-transition:leave="transition ease-in duration-200"
      x-transition:leave-start="opacity-100 scale-100 translate-y-0"
      x-transition:leave-end="opacity-0 scale-95 translate-y-4"
      @click.outside="showPaymentModal = false"
      class="bg-white rounded-3xl max-w-md w-full shadow-2xl flex flex-col max-h-[90vh] overflow-hidden border border-border-subtle"
    >
      <!-- Modal Header -->
      <div class="flex justify-between items-center px-6 py-4 border-b border-border-subtle shrink-0">
        <div class="flex items-center gap-2.5">
          <div class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></div>
          <span class="font-bold text-base text-primary">Secure Payment via Midtrans</span>
        </div>
        <button 
          type="button" 
          @click="showPaymentModal = false" 
          class="w-8 h-8 rounded-full flex items-center justify-center text-slate-400 hover:text-primary hover:bg-slate-100 transition-colors text-xl leading-none cursor-pointer"
          aria-label="Close modal"
        >
          &times;
        </button>
      </div>

      <!-- Scrollable Content -->
      <div class="p-6 overflow-y-auto space-y-6 flex-1">
        <!-- Countdown Alert Banner -->
        <div class="bg-orange-50 text-accent border border-orange-200/60 rounded-xl px-4 py-3 flex items-center justify-between text-sm shadow-xs">
          <div class="flex items-center gap-2">
            <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="font-medium text-xs sm:text-sm">Complete payment in</span>
          </div>
          <span class="font-mono font-bold text-accent text-sm" x-text="formattedTime">14:53</span>
        </div>

        <!-- Merchant & Amount Details -->
        <div class="text-center py-2 bg-slate-50/70 rounded-2xl border border-slate-100 p-4">
          <div class="font-serif font-bold text-base text-primary">Doctor Barber</div>
          <div class="text-xs text-slate-500 mt-0.5">Ref: <span class="font-mono font-semibold text-primary">DOC-8899</span></div>
          <div class="text-3xl font-serif font-bold text-primary mt-2" id="modalDpAmount">Rp 10.000</div>
          <div class="text-[11px] text-slate-400 mt-1 uppercase tracking-wider font-medium">Down Payment (DP)</div>
        </div>

        <!-- Payment Method Selector -->
        <div>
          <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Select Method</label>
          <div class="space-y-2.5">
            <!-- QRIS Option -->
            <div 
              @click="selectedMethod = 'qris'" 
              class="p-3.5 rounded-xl border transition-all cursor-pointer flex items-center justify-between"
              :class="selectedMethod === 'qris' ? 'border-2 border-primary bg-primary/5 ring-1 ring-primary/20 shadow-sm' : 'border-slate-200 hover:border-slate-300 bg-white'"
            >
              <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg flex items-center justify-center font-bold text-xs" :class="selectedMethod === 'qris' ? 'bg-primary text-white' : 'bg-slate-100 text-slate-700'">
                  QR
                </div>
                <div>
                  <div class="font-bold text-sm text-primary">QRIS</div>
                  <div class="text-xs text-slate-500">GoPay, OVO, ShopeePay, AstraPay, Dana</div>
                </div>
              </div>
              <div class="w-4 h-4 rounded-full border flex items-center justify-center" :class="selectedMethod === 'qris' ? 'border-primary' : 'border-slate-300'">
                <div x-show="selectedMethod === 'qris'" class="w-2 h-2 rounded-full bg-primary"></div>
              </div>
            </div>

            <!-- BCA Virtual Account Option -->
            <div 
              @click="selectedMethod = 'bca'" 
              class="p-3.5 rounded-xl border transition-all cursor-pointer flex items-center justify-between"
              :class="selectedMethod === 'bca' ? 'border-2 border-primary bg-primary/5 ring-1 ring-primary/20 shadow-sm' : 'border-slate-200 hover:border-slate-300 bg-white'"
            >
              <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg flex items-center justify-center font-bold text-[10px]" :class="selectedMethod === 'bca' ? 'bg-primary text-white' : 'bg-slate-100 text-slate-700'">
                  BCA
                </div>
                <div>
                  <div class="font-bold text-sm text-primary">BCA Virtual Account</div>
                  <div class="text-xs text-slate-500">Instant verification via myBCA / KlikBCA</div>
                </div>
              </div>
              <div class="w-4 h-4 rounded-full border flex items-center justify-center" :class="selectedMethod === 'bca' ? 'border-primary' : 'border-slate-300'">
                <div x-show="selectedMethod === 'bca'" class="w-2 h-2 rounded-full bg-primary"></div>
              </div>
            </div>

            <!-- Mandiri Virtual Account Option -->
            <div 
              @click="selectedMethod = 'mandiri'" 
              class="p-3.5 rounded-xl border transition-all cursor-pointer flex items-center justify-between"
              :class="selectedMethod === 'mandiri' ? 'border-2 border-primary bg-primary/5 ring-1 ring-primary/20 shadow-sm' : 'border-slate-200 hover:border-slate-300 bg-white'"
            >
              <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg flex items-center justify-center font-bold text-[9px]" :class="selectedMethod === 'mandiri' ? 'bg-primary text-white' : 'bg-slate-100 text-slate-700'">
                  MDR
                </div>
                <div>
                  <div class="font-bold text-sm text-primary">Mandiri Virtual Account</div>
                  <div class="text-xs text-slate-500">Livin' by Mandiri & ATM transfer</div>
                </div>
              </div>
              <div class="w-4 h-4 rounded-full border flex items-center justify-center" :class="selectedMethod === 'mandiri' ? 'border-primary' : 'border-slate-300'">
                <div x-show="selectedMethod === 'mandiri'" class="w-2 h-2 rounded-full bg-primary"></div>
              </div>
            </div>
          </div>
        </div>

        <!-- Conditional Method Details -->
        <!-- QRIS Box -->
        <div x-show="selectedMethod === 'qris'" x-transition class="flex flex-col items-center justify-center p-6 bg-slate-50 rounded-2xl border border-dashed border-slate-200 text-center">
          <div class="bg-white p-3 rounded-xl shadow-sm border border-slate-200 mb-3">
            <svg viewBox="0 0 100 100" class="w-36 h-36 mx-auto text-primary" fill="currentColor">
              <rect width="100" height="100" fill="white"/>
              <path d="M10 10h30v30h-30zM15 15v20h20v-20zM20 20h10v10h-10zM60 10h30v30h-30zM65 15v20h20v-20zM70 20h10v10h-10zM10 60h30v30h-30zM15 65v20h20v-20zM20 70h10v10h-10zM45 10h10v10h-10zM45 25h10v10h-10zM10 45h10v10h-10zM25 45h20v10h-20zM50 45h10v20h-10zM65 45h25v10h-25zM45 60h10v10h-10zM60 60h10v10h-10zM75 60h15v15h-15zM45 75h10v15h-10zM60 75h10v10h-10zM70 85h20v10h-20z" fill="#14221D"/>
            </svg>
          </div>
          <span class="text-xs font-medium text-slate-600">Scan with any supported e-Wallet or Mobile Banking</span>
        </div>

        <!-- BCA VA Box -->
        <div x-show="selectedMethod === 'bca'" x-transition class="p-5 bg-slate-50 rounded-2xl border border-slate-200 text-center space-y-2">
          <span class="text-xs text-slate-500 font-medium">BCA Virtual Account Number</span>
          <div class="text-xl font-mono font-bold text-primary tracking-wider select-all">8277 0812 3456 7890</div>
          <p class="text-[11px] text-slate-400">Account Name: TRIMLY / DOCTOR BARBER</p>
        </div>

        <!-- Mandiri VA Box -->
        <div x-show="selectedMethod === 'mandiri'" x-transition class="p-5 bg-slate-50 rounded-2xl border border-slate-200 text-center space-y-2">
          <span class="text-xs text-slate-500 font-medium">Mandiri Virtual Account Number</span>
          <div class="text-xl font-mono font-bold text-primary tracking-wider select-all">8890 8012 3456 7890</div>
          <p class="text-[11px] text-slate-400">Company Code: 88908 (Trimly Gateway)</p>
        </div>
      </div>

      <!-- Sticky Modal Footer -->
      <div class="p-5 bg-slate-50 border-t border-border-subtle shrink-0">
        <x-button-primary href="{{ url('/booking-success') }}" :fullWidth="true" class="py-3.5 text-sm rounded-xl font-semibold shadow-sm">
          Simulate Successful Payment
          <svg viewBox="0 0 24 24" class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="9 18 15 12 9 6"></polyline>
          </svg>
        </x-button-primary>
      </div>
    </div>
  </div>

  <script src="{{ asset('js/portal.js') }}"></script>
  <!-- DRAWER: RIWAYAT & TIKET -->
  <div class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[200] flex items-end justify-center opacity-0 pointer-events-none transition-opacity" id="drawerBookingHistory">
    <div class="w-full max-w-lg bg-surface rounded-t-2xl transform translate-y-full transition-transform duration-300 flex flex-col max-h-[90vh]">
      <div class="p-6 border-b border-border-light flex justify-between items-center shrink-0">
        <h2 class="font-serif text-xl font-semibold text-primary m-0">Riwayat Booking Saya</h2>
        <button class="text-2xl text-primary hover:text-gray-600 leading-none" id="closeHistoryDrawer">&times;</button>
      </div>
      <div class="p-6 flex-1 overflow-y-auto">
        <div class="mb-8">
          <x-label class="block mb-2 text-primary font-semibold text-sm">Nomor WhatsApp Terdaftar</x-label>
          <div class="flex gap-2">
            <x-input type="tel" class="flex-1" placeholder="0812-XXXX-XXXX" />
            <x-button-outline class="whitespace-nowrap px-4 text-sm font-semibold">Cari Booking</x-button-outline>
          </div>
        </div>
        
        <div class="flex flex-col gap-4">
          <!-- Upcoming -->
          <div class="border border-border-light rounded-md overflow-hidden bg-surface">
            <div class="bg-green-50 p-3 border-b border-border-light">
              <x-badge class="bg-green-100 text-green-800 border-green-200">DP Paid / Confirmed</x-badge>
            </div>
            <div class="p-4">
              <div class="font-bold text-base text-primary mb-1">Fajar Pratama • Gentleman's Fade</div>
              <div class="text-sm text-gray-600 mb-4">Sat, 29 Aug 2026 - 14:00 WIB</div>
              <a href="{{ url('ticket') }}" class="block w-full text-center rounded-md p-3 bg-primary hover:bg-[#c55b34] text-white font-semibold transition-colors">Buka E-Ticket Digital</a>
            </div>
          </div>
          
          <!-- Completed -->
          <div class="border border-border-light rounded-md overflow-hidden bg-surface">
            <div class="bg-gray-50 p-3 border-b border-border-light">
              <x-badge class="bg-gray-200 text-gray-700">Completed</x-badge>
            </div>
            <div class="p-4">
              <div class="font-bold text-base text-primary mb-1">Aditya Wijaya • Executive Fade</div>
              <div class="text-sm text-gray-600 mb-4">Sat, 15 Aug 2026 - 10:00 WIB</div>
              <a href="{{ url('ticket') }}" class="block w-full text-center rounded-md p-3 border border-primary text-primary font-semibold hover:bg-gray-50 transition-colors">Lihat Tiket & Beri Ulasan</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- CAPSTER PROFILE MODAL -->
  <div class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[200] flex items-center justify-center opacity-0 pointer-events-none transition-opacity" id="capsterProfileModal">
    <div class="bg-surface rounded-2xl p-6 w-[90%] max-w-[400px] relative">
      <button class="absolute top-4 right-4 text-2xl text-gray-500 hover:text-gray-800 leading-none" id="closeCapsterProfileModal">&times;</button>
      
      <div class="text-center mt-4">
        <div id="modalCapsterAvatar" class="w-20 h-20 rounded-full bg-primary text-white flex items-center justify-center text-3xl mx-auto mb-4 font-serif font-semibold">FP</div>
        <h2 class="font-bold text-2xl mb-1 text-primary" id="modalCapsterName">Fajar P.</h2>
        <p class="text-primary font-bold mb-5" id="modalCapsterRole">Master Barber</p>
        
        <p id="modalCapsterBio" class="text-gray-600 text-sm leading-relaxed mb-6">
          Bio.
        </p>
        
        <div class="text-left">
          <h3 class="font-bold text-sm mb-3 text-primary uppercase tracking-wider">Keahlian & Spesialisasi</h3>
          <div id="modalCapsterSkills" class="flex flex-wrap gap-2">
            <!-- Rendered via JS -->
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    if(urlParams.has('emergency')) {
      const alert = document.getElementById('emergencyAlert');
      if (alert) {
          alert.classList.remove('hidden');
      }
      const timeGrid = document.getElementById('timeGrid');
      if(timeGrid) {
        timeGrid.innerHTML = '<div class="col-span-full text-center text-red-500 p-8 border border-dashed border-red-400 rounded-md">Semua slot dinonaktifkan.</div>';
      }
      const datePills = document.querySelectorAll('#dateScroll .date-pill'); // Assuming JS adds .date-pill
      datePills.forEach(pill => {
        pill.classList.add('opacity-50', 'pointer-events-none');
      });
      const btn = document.getElementById('btnCheckout');
      if(btn) btn.disabled = true;
    }
  });
</script>

<script>
  function openCapsterProfile(name, role, bio, skills, avatar, event) {
    if(event) {
      event.preventDefault();
      event.stopPropagation();
    }
    document.getElementById('modalCapsterName').textContent = name;
    document.getElementById('modalCapsterRole').textContent = role;
    document.getElementById('modalCapsterBio').textContent = bio;
    document.getElementById('modalCapsterAvatar').textContent = avatar;
    
    const skillsContainer = document.getElementById('modalCapsterSkills');
    skillsContainer.innerHTML = '';
    skills.forEach(skill => {
      const span = document.createElement('span');
      span.textContent = skill;
      span.className = 'bg-gray-100 text-primary px-3 py-1.5 rounded-full text-xs font-semibold border border-gray-200';
      skillsContainer.appendChild(span);
    });
    
    document.getElementById('capsterProfileModal').classList.remove('opacity-0', 'pointer-events-none');
  }

  document.addEventListener('DOMContentLoaded', function() {
    const capsterModal = document.getElementById('capsterProfileModal');
    const closeCapsterModal = document.getElementById('closeCapsterProfileModal');
    
    if(closeCapsterModal) {
      closeCapsterModal.addEventListener('click', function() {
        capsterModal.classList.add('opacity-0', 'pointer-events-none');
      });
    }
    
    if(capsterModal) {
      capsterModal.addEventListener('click', function(e) {
        if(e.target === capsterModal) {
          capsterModal.classList.add('opacity-0', 'pointer-events-none');
        }
      });
    }

    const btnSimulateSuccess = document.getElementById('btnSimulateSuccess');
    if (btnSimulateSuccess) {
      btnSimulateSuccess.addEventListener('click', function() {
        window.location.href = '{{ url('/ticket') }}';
      });
    }
  });
</script>
