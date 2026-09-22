<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trimly — The Operating System for Premier Barbershops</title>
  <meta name="description" content="Digitize your barbershop with Trimly. Automate Midtrans down payments, prevent no-shows, and manage your capster roster efficiently.">

  <!-- Google Fonts: Playfair Display (Serif) and Geist (Sans-serif) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Geist:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
  
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-primary font-sans antialiased">

  @include('partials.header')

  <main class="pt-20">
    <section class="relative pt-16 pb-28 lg:pt-24 lg:pb-36 overflow-hidden bg-background isolate" id="hero">
      <!-- Subtle ambient background gradients -->
      <div class="absolute top-0 right-0 w-96 h-96 bg-accent/5 rounded-full blur-3xl pointer-events-none z-0"></div>
      <div class="absolute bottom-10 left-10 w-80 h-80 bg-primary/5 rounded-full blur-3xl pointer-events-none z-0"></div>
      
      <div class="max-w-[1240px] mx-auto px-6 lg:px-8 grid lg:grid-cols-12 gap-12 lg:gap-8 items-center">
        <!-- Hero Left Column: Copy & Actions -->
        <div class="lg:col-span-6 xl:col-span-6 z-10">
          

          <h1 class="font-serif text-[clamp(2.4rem,4.2vw,3.9rem)] font-medium leading-[1.12] tracking-[-0.02em] mb-6 text-primary" data-i18n="hero.title">
            The Operating System for Premier Barbershops.
          </h1>

          <p class="text-[1.08rem] text-primary/75 mb-8 leading-relaxed max-w-xl" data-i18n="hero.subtitle">
            Eliminate no-shows permanently. Trimly automates Midtrans down payments, synchronizes your capster schedule, and delivers a frictionless booking experience straight from your Instagram bio.
          </p>

          <div class="flex flex-col sm:flex-row gap-4 mb-8">
            <x-button-accent size="large" href="{{ url('register') }}" class="shadow-sm hover:shadow text-center justify-center" data-i18n="hero.cta1">Start Your 14-Day Free Trial</x-button-accent>
            <x-button-outline size="large" href="{{ url('book') }}" variant="secondary" class="text-center justify-center" data-i18n="hero.cta2">View Demo Portal</x-button-outline>
          </div>

          <!-- Trust Badges Row -->
          <div class="pt-4 border-t border-border-light flex flex-wrap items-center gap-y-2 gap-x-6 text-xs text-primary/70 font-medium">
            <div class="flex items-center gap-1.5">
              <svg class="w-4 h-4 text-emerald-600" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              <span data-i18n="hero.trust1">5-Minute Setup</span>
            </div>
            <div class="flex items-center gap-1.5">
              <svg class="w-4 h-4 text-emerald-600" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              <span data-i18n="hero.trust2">No Dedicated EDC Terminal</span>
            </div>
            <div class="flex items-center gap-1.5">
              <svg class="w-4 h-4 text-emerald-600" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              <span data-i18n="hero.trust3">Instant Gateway Integration</span>
            </div>
          </div>
        </div>
        
        <!-- Hero Right Column: Human Capster Photo + Live POS Mockup Composite -->
        <div class="lg:col-span-6 xl:col-span-6 relative">
          <!-- Real Barber Action Photograph with Rounded Corners and Warm Glow -->
          <div class="relative w-full rounded-3xl overflow-hidden shadow-2xl border border-border-light max-w-lg mx-auto aspect-[4/3] group">
            <img 
              src="https://images.unsplash.com/photo-1503951914875-452162b0f3f1?auto=format&fit=crop&w=1000&q=80" 
              alt="Master Barber Styling Client at Studio" 
              class="w-full h-full object-cover object-center transform group-hover:scale-105 transition-transform duration-700"
            />
            <div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-primary/20 to-transparent"></div>
            <div class="absolute bottom-4 left-5 text-white z-10">
              <span class="text-xs uppercase tracking-widest font-semibold text-accent block" data-i18n="hero.experience_tag">Studio Experience</span>
              <p class="font-serif text-lg font-medium" data-i18n="hero.experience_desc">Exclusive Service, Guaranteed Schedules</p>
            </div>
          </div>

          <!-- Overlapping Floating Live POS Dashboard Mockup Card -->
          <div class="relative lg:absolute lg:-bottom-12 lg:-left-10 w-full max-w-md bg-white/95 backdrop-blur-md rounded-2xl shadow-2xl border border-border-light overflow-hidden z-20 mt-6 lg:mt-0">
            <!-- Mockup Header -->
            <div class="h-10 bg-surface border-b border-border-light flex items-center px-4 justify-between">
              <div class="flex gap-1.5">
                <span class="w-2.5 h-2.5 rounded-full bg-red-400"></span>
                <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span>
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
              </div>
              <div class="text-[0.7rem] text-primary/50 font-mono">admin.trimly.com/noble-barber/live</div>
              <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800 border border-emerald-200">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse mr-1"></span> LIVE POS
              </span>
            </div>

            <div class="p-4 space-y-3 bg-white">
              <!-- KPI Row -->
              <div class="grid grid-cols-2 gap-2.5">
                <div class="bg-surface p-2.5 rounded-xl border border-border-light">
                  <div class="flex justify-between items-center text-[0.7rem] text-primary/70 mb-0.5">
                    <span data-i18n="hero.revenue_today">Today's Revenue</span>
                    <span class="text-emerald-700 font-bold bg-emerald-50 px-1.5 py-0.5 rounded text-[10px]">+28.4%</span>
                  </div>
                  <div class="text-base font-bold text-primary font-mono">Rp 4.850.000</div>
                  <div class="text-[10px] text-primary/60" data-i18n="hero.revenue_served">18 Served • 0 No-Shows</div>
                </div>

                <div class="bg-primary/5 p-2.5 rounded-xl border border-primary/10">
                  <div class="flex justify-between items-center text-[0.7rem] text-primary/70 mb-0.5">
                    <span data-i18n="hero.dp_secured">Secured Midtrans DP</span>
                    <span class="inline-flex items-center gap-1 text-accent font-bold text-[10px] font-mono" data-i18n="hero.dp_locked"><svg class="w-3 h-3 text-accent" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>100% LOCKED</span>
                  </div>
                  <div class="text-base font-bold text-accent font-mono">Rp 1.450.000</div>
                  <div class="text-[10px] text-primary/60" data-i18n="hero.dp_settle">Settled directly to BCA</div>
                </div>
              </div>

              <!-- Mini Chair Schedule Item -->
              <div class="bg-surface rounded-xl p-2.5 border border-border-light flex items-center justify-between text-xs">
                <div class="flex items-center gap-2.5">
                  <div class="w-7 h-7 rounded-full bg-primary text-white flex items-center justify-center font-bold text-[10px]">FP</div>
                  <div>
                    <div class="font-bold text-primary leading-tight">Chair 01 • Fajar P.</div>
                    <div class="text-[10px] text-primary/60">Executive Fade (In-Service)</div>
                  </div>
                </div>
                <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                  DP Rp 50.000 (QRIS)
                </span>
              </div>
            </div>
          </div>

          <!-- Top-Right Floating Pill: Zero No-Shows -->
          <div class="absolute -top-4 right-2 sm:right-6 bg-white/95 backdrop-blur-md px-3.5 py-2 rounded-full shadow-lg border border-border-light flex items-center gap-2 text-xs font-bold text-primary z-30">
            <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-ping"></span>
            <span data-i18n="hero.zero_noshows">99.4% Zero No-Shows</span>
          </div>
        </div>
      </div>
    </section>

    <!-- SOCIAL PROOF SECTION (MOKA & KASIR PINTAR CLEAN LOGO ROW) -->
    <section class="py-12 border-y border-border-light bg-slate-50">
      <div class="max-w-[1240px] mx-auto px-6 lg:px-8 text-center mb-16">
        <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
          <p class="text-xs font-bold uppercase tracking-widest text-primary/70" data-i18n="proof.trusted">
            Trusted by 120+ Premier Barbershops & Grooming Studios
          </p>
          <span class="hidden sm:inline text-primary/30">|</span>
          <div class="flex items-center gap-1 text-amber-400 text-xs font-semibold">
            <span class="flex items-center gap-0.5">
              @for($s = 0; $s < 5; $s++)
                <svg class="w-4 h-4 text-amber-400" viewBox="0 0 24 24" fill="currentColor">
                  <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                </svg>
              @endfor
            </span>
            <span class="text-primary/70 font-medium ml-1" data-i18n="proof.satisfaction">4.9/5 Partner Satisfaction</span>
          </div>
        </div>
      </div>
      
      <div class="max-w-[1240px] mx-auto px-6 lg:px-8 mb-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div class="bg-white rounded-2xl shadow-sm border border-slate-200/60 p-6">
            <div class="flex items-center gap-1 text-amber-400 mb-4">
              @for($s = 0; $s < 5; $s++)
                <svg class="w-4 h-4 text-amber-400" viewBox="0 0 24 24" fill="currentColor">
                  <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                </svg>
              @endfor
            </div>
            <div class="text-sm font-bold text-slate-900">Andi Saputra</div>
            <p class="text-sm text-slate-600 mt-4 leading-relaxed">"Sistem Midtrans DP dari Trimly benar-benar menghilangkan no-show di studio kami. Sangat direkomendasikan!"</p>
          </div>
          <div class="bg-white rounded-2xl shadow-sm border border-slate-200/60 p-6">
            <div class="flex items-center gap-1 text-amber-400 mb-4">
              @for($s = 0; $s < 5; $s++)
                <svg class="w-4 h-4 text-amber-400" viewBox="0 0 24 24" fill="currentColor">
                  <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                </svg>
              @endfor
            </div>
            <div class="text-sm font-bold text-slate-900">Budi Santoso</div>
            <p class="text-sm text-slate-600 mt-4 leading-relaxed">"Sangat mudah diatur dan antarmuka pemesanan untuk pelanggan sangat rapi tanpa perlu install aplikasi."</p>
          </div>
          <div class="bg-white rounded-2xl shadow-sm border border-slate-200/60 p-6">
            <div class="flex items-center gap-1 text-amber-400 mb-4">
              @for($s = 0; $s < 5; $s++)
                <svg class="w-4 h-4 text-amber-400" viewBox="0 0 24 24" fill="currentColor">
                  <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                </svg>
              @endfor
            </div>
            <div class="text-sm font-bold text-slate-900">Rizky Maulana</div>
            <p class="text-sm text-slate-600 mt-4 leading-relaxed">"Fitur matrix kapster membantu operasional kasir kami. Hanya kurang beberapa laporan custom saja."</p>
          </div>
        </div>
      </div>
        
        <div class="grid grid-cols-2 md:grid-cols-5 gap-8 lg:gap-12 items-center justify-center opacity-70 grayscale hover:grayscale-0 transition-all duration-300">
          <!-- Studio 1 -->
          <div class="flex items-center justify-center gap-2 group cursor-default">
            <span class="w-8 h-8 rounded-full border border-primary/20 flex items-center justify-center font-serif text-sm font-bold text-primary group-hover:border-accent group-hover:text-accent transition-colors">N</span>
            <div class="text-left">
              <span class="font-serif text-[1.1rem] font-bold text-primary tracking-tight block leading-tight">The Noble</span>
              <span class="text-[9px] uppercase tracking-wider text-primary/60">Barber Co. • JKT</span>
            </div>
          </div>

          <!-- Studio 2 -->
          <div class="flex items-center justify-center gap-2 group cursor-default">
            <span class="w-8 h-8 rounded-full border border-primary/20 flex items-center justify-center font-serif text-sm font-bold text-primary group-hover:border-accent group-hover:text-accent transition-colors">G</span>
            <div class="text-left">
              <span class="font-serif text-[1.1rem] font-bold text-primary tracking-tight block leading-tight">Gentleman</span>
              <span class="text-[9px] uppercase tracking-wider text-primary/60">& Sons • BDG</span>
            </div>
          </div>

          <!-- Studio 3 -->
          <div class="flex items-center justify-center gap-2 group cursor-default">
            <span class="w-8 h-8 rounded-full border border-primary/20 flex items-center justify-center font-serif text-sm font-bold text-primary group-hover:border-accent group-hover:text-accent transition-colors">C</span>
            <div class="text-left">
              <span class="font-serif text-[1.1rem] font-bold text-primary tracking-tight block leading-tight">Crown & Blade</span>
              <span class="text-[9px] uppercase tracking-wider text-primary/60">Club • SBY</span>
            </div>
          </div>

          <!-- Studio 4 -->
          <div class="flex items-center justify-center gap-2 group cursor-default">
            <span class="w-8 h-8 rounded-full border border-primary/20 flex items-center justify-center font-serif text-sm font-bold text-primary group-hover:border-accent group-hover:text-accent transition-colors">S</span>
            <div class="text-left">
              <span class="font-serif text-[1.1rem] font-bold text-primary tracking-tight block leading-tight">Sharp & Co.</span>
              <span class="text-[9px] uppercase tracking-wider text-primary/60">Grooming • BALI</span>
            </div>
          </div>

          <!-- Studio 5 -->
          <div class="col-span-2 md:col-span-1 flex items-center justify-center gap-2 group cursor-default">
            <span class="w-8 h-8 rounded-full border border-primary/20 flex items-center justify-center font-serif text-sm font-bold text-primary group-hover:border-accent group-hover:text-accent transition-colors">D</span>
            <div class="text-left">
              <span class="font-serif text-[1.1rem] font-bold text-primary tracking-tight block leading-tight">Doctor Barber</span>
              <span class="text-[9px] uppercase tracking-wider text-primary/60">Society • MLG</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CORE FEATURES SECTION (KASIR PINTAR & MOKA ALTERNATING VISUAL BLOCKS) -->
    <section class="py-24 bg-background" id="features">
      <div class="max-w-[1240px] mx-auto px-6 lg:px-8">
        <div class="flex flex-col items-center justify-center text-center max-w-3xl mx-auto mb-16">
          <h2 class="font-serif text-[clamp(2.1rem,3.6vw,3rem)] font-medium tracking-[-0.01em] text-primary leading-[1.15] text-center" data-i18n="features.title">
            Built exclusively to scale modern grooming businesses.
          </h2>
          <p class="text-[1.05rem] text-primary/70 mt-4 leading-relaxed max-w-2xl" data-i18n="features.subtitle">
            An all-in-one platform combining front-desk POS management and a dedicated bio-link booking portal to eliminate empty chairs and streamline daily operations.
          </p>
        </div>
        
        <div class="space-y-20 lg:space-y-28">
          <!-- Feature 1: Mandatory DP Engine (Copy Left, Mockup Right) -->
          <div class="grid lg:grid-cols-12 gap-12 lg:gap-16 items-center">
            <div class="lg:col-span-6 space-y-5">
              <div class="w-14 h-14 rounded-2xl bg-accent/10 border border-accent/20 flex items-center justify-center text-accent shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <rect x="2" y="4" width="20" height="16" rx="2"/>
                  <line x1="2" y1="10" x2="22" y2="10"/>
                  <path d="M7 15h.01M11 15h2"/>
                </svg>
              </div>
              <div class="inline-block text-xs font-bold uppercase tracking-wider text-accent" data-i18n="features.f1_tag">Automated Payment Gateway</div>
              <h3 class="font-serif text-[clamp(1.75rem,2.8vw,2.3rem)] font-medium text-primary leading-tight" data-i18n="features.f1_title">
                Mandatory DP Engine
              </h3>
              <p class="text-primary/75 leading-relaxed text-base" data-i18n="features.f1_desc">
                Require a custom 30% to 50% down payment to lock a chair. Integrated directly with Midtrans for instant QRIS, Virtual Account, and e-wallet settlements to your studio's bank account.
              </p>
              
              <ul class="space-y-3 pt-2 text-sm text-primary/80">
                <li class="flex items-start gap-3">
                  <span class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-xs shrink-0 mt-0.5">✓</span>
                  <span data-i18n="features.f1_point1"><strong>100% No-Show Elimination:</strong> Appointment slots are officially secured only after down payment is verified by the system.</span>
                </li>
                <li class="flex items-start gap-3">
                  <span class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-xs shrink-0 mt-0.5">✓</span>
                  <span data-i18n="features.f1_point2"><strong>Direct Settlement:</strong> Down payment funds settle directly into your studio's designated commercial bank account.</span>
                </li>
                <li class="flex items-start gap-3">
                  <span class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-xs shrink-0 mt-0.5">✓</span>
                  <span data-i18n="features.f1_point3"><strong>Instant Digital Pass:</strong> Clients instantly receive an automated booking summary and QR check-in pass.</span>
                </li>
              </ul>
            </div>
            
            <div class="lg:col-span-6">
              <!-- Mockup: Payment Simulation Modal Style -->
              <div class="bg-surface rounded-3xl p-6 lg:p-8 border border-border-light shadow-xl relative overflow-hidden">
                <div class="flex justify-between items-center pb-4 border-b border-border-light mb-6">
                  <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span class="text-xs font-bold uppercase tracking-wider text-primary" data-i18n="features.f1_mock_title">Midtrans Secure Checkout</span>
                  </div>
                  <span class="text-xs font-mono font-bold text-accent bg-accent/10 px-2.5 py-1 rounded-full">Time Remaining: 14:32</span>
                </div>

                <!-- DP Payment Card Preview -->
                <div class="bg-white rounded-2xl p-6 border border-border-light shadow-sm text-center mb-6">
                  <span class="text-xs text-primary/60 font-medium uppercase tracking-wider block mb-1" data-i18n="features.f1_mock_dp">Down Payment (DP) Secured</span>
                  <div class="text-3xl lg:text-4xl font-serif font-bold text-primary mb-2">Rp 50.000</div>
                  <div class="inline-flex items-center gap-1.5 text-xs text-emerald-700 bg-emerald-50 border border-emerald-200 px-3 py-1 rounded-full font-semibold">
                    <svg class="w-3.5 h-3.5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    <span data-i18n="features.f1_mock_settle">Instant Automated Settlement</span>
                  </div>
                </div>

                <!-- Payment Methods Grid Mock -->
                <div class="grid grid-cols-3 gap-3 text-center">
                  <div class="p-3 bg-white rounded-xl border-2 border-primary shadow-xs flex flex-col items-center justify-center">
                    <span class="text-xs font-bold text-primary">QRIS</span>
                    <span class="text-[10px] text-primary/60 mt-0.5">GoPay / OVO / Dana</span>
                  </div>
                  <div class="p-3 bg-white rounded-xl border border-border-light flex flex-col items-center justify-center opacity-80">
                    <span class="text-xs font-bold text-primary">BCA VA</span>
                    <span class="text-[10px] text-primary/60 mt-0.5">Virtual Account</span>
                  </div>
                  <div class="p-3 bg-white rounded-xl border border-border-light flex flex-col items-center justify-center opacity-80">
                    <span class="text-xs font-bold text-primary">Mandiri</span>
                    <span class="text-[10px] text-primary/60 mt-0.5">Bank Transfer</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Feature 2: Dedicated Bio-Link Portal (Mockup Left, Copy Right) -->
          <div class="grid lg:grid-cols-12 gap-12 lg:gap-16 items-center">
            <div class="lg:col-span-6 order-2 lg:order-1">
              <!-- Smartphone Frame Mockup with Customer Booking UI -->
              <div class="max-w-sm mx-auto bg-primary rounded-[2.5rem] p-3 shadow-2xl border-4 border-primary/40">
                <div class="bg-background rounded-[2rem] overflow-hidden border border-border-light">
                  <!-- Phone Notch Bar -->
                  <div class="h-6 bg-surface flex items-center justify-center px-6">
                    <span class="w-16 h-3 bg-primary/20 rounded-full"></span>
                  </div>
                  
                  <!-- Portal Preview Body -->
                  <div class="p-5 space-y-4">
                    <div class="flex items-center justify-between pb-3 border-b border-border-light">
                      <div>
                        <div class="font-serif font-bold text-sm text-primary">Doctor Barber.</div>
                        <div class="text-[10px] text-primary/60">Malang, East Java</div>
                      </div>
                      <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-accent text-white">Open</span>
                    </div>

                    <!-- Capster Pills -->
                    <div>
                      <div class="text-[11px] font-bold text-primary mb-2">Select Barber</div>
                      <div class="grid grid-cols-3 gap-2">
                        <div class="p-2 rounded-xl bg-primary text-white text-center">
                          <div class="w-6 h-6 rounded-full bg-white/20 text-white font-bold text-[10px] mx-auto mb-1 flex items-center justify-center">FP</div>
                          <div class="text-[10px] font-bold">Fajar P.</div>
                        </div>
                        <div class="p-2 rounded-xl bg-surface border border-border-light text-center">
                          <div class="w-6 h-6 rounded-full bg-primary/10 text-primary font-bold text-[10px] mx-auto mb-1 flex items-center justify-center">AW</div>
                          <div class="text-[10px] font-bold text-primary">Aditya W.</div>
                        </div>
                        <div class="p-2 rounded-xl bg-surface border border-border-light text-center">
                          <div class="w-6 h-6 rounded-full bg-primary/10 text-primary font-bold text-[10px] mx-auto mb-1 flex items-center justify-center">?</div>
                          <div class="text-[10px] font-bold text-primary">Fastest</div>
                        </div>
                      </div>
                    </div>

                    <!-- Service Card -->
                    <div class="p-3 bg-surface rounded-xl border-2 border-primary flex justify-between items-center">
                      <div>
                        <div class="text-xs font-bold text-primary">Classic Cut</div>
                        <div class="text-[10px] text-primary/60">30 MINS • DP IDR 10,000</div>
                      </div>
                      <span class="text-xs font-bold text-primary font-mono">Rp 25.000</span>
                    </div>

                    <button type="button" class="w-full py-2.5 rounded-xl bg-primary text-white text-xs font-bold text-center block shadow-sm">
                      Lock Appointment & Pay DP
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <div class="lg:col-span-6 order-1 lg:order-2 space-y-5">
              <div class="w-14 h-14 rounded-2xl bg-primary/10 border border-primary/20 flex items-center justify-center text-primary shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <rect x="5" y="2" width="14" height="20" rx="2" ry="2"/>
                  <line x1="12" y1="18" x2="12.01" y2="18"/>
                  <circle cx="12" cy="10" r="4"/>
                  <polyline points="12 8 12 10 14 10"/>
                </svg>
              </div>
              <div class="inline-block text-xs font-bold uppercase tracking-wider text-primary/70" data-i18n="features.f2_tag">Seamless Client Experience</div>
              <h3 class="font-serif text-[clamp(1.75rem,2.8vw,2.3rem)] font-medium text-primary leading-tight" data-i18n="features.f2_title">
                Dedicated Bio-Link Portal
              </h3>
              <p class="text-primary/75 leading-relaxed text-base" data-i18n="features.f2_desc">
                Clients book in 15 seconds without installing an app. Place your branded <code class="bg-slate-100 text-primary font-mono px-1.5 py-0.5 rounded text-sm border border-slate-200">trimly.com/your-shop</code> link in your Instagram bio to convert followers into confirmed, paid appointments instantly.
              </p>

              <ul class="space-y-3 pt-2 text-sm text-primary/80">
                <li class="flex items-start gap-3">
                  <span class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-xs shrink-0 mt-0.5">✓</span>
                  <span data-i18n="features.f2_point1"><strong>Zero App Downloads:</strong> Runs friction-free inside Instagram, TikTok, and WhatsApp in-app browsers.</span>
                </li>
                <li class="flex items-start gap-3">
                  <span class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-xs shrink-0 mt-0.5">✓</span>
                  <span data-i18n="features.f2_point2"><strong>Real-Time Slot Sync:</strong> Clients view only available open chairs with zero scheduling overlaps.</span>
                </li>
                <li class="flex items-start gap-3">
                  <span class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-xs shrink-0 mt-0.5">✓</span>
                  <span data-i18n="features.f2_point3"><strong>Bespoke Studio Branding:</strong> Showcase your custom identity, barber team, and signature services.</span>
                </li>
              </ul>
            </div>
          </div>

          <!-- Feature 3: Capster & Shift Management (Copy Left, Mockup Right) -->
          <div class="grid lg:grid-cols-12 gap-12 lg:gap-16 items-center">
            <div class="lg:col-span-6 space-y-5">
              <div class="w-14 h-14 rounded-2xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-amber-600 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                  <circle cx="9" cy="7" r="4"/>
                  <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                  <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
              </div>
              <div class="inline-block text-xs font-bold uppercase tracking-wider text-amber-600" data-i18n="features.f3_tag">Roster & Commission Operations</div>
              <h3 class="font-serif text-[clamp(1.75rem,2.8vw,2.3rem)] font-medium text-primary leading-tight" data-i18n="features.f3_title">
                Capster & Shift Management
              </h3>
              <p class="text-primary/75 leading-relaxed text-base" data-i18n="features.f3_desc">
                Monitor active chairs, manage capster leave requests, and automate tiered split-commission calculations based on real-time transaction data.
              </p>

              <ul class="space-y-3 pt-2 text-sm text-primary/80">
                <li class="flex items-start gap-3">
                  <span class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-xs shrink-0 mt-0.5">✓</span>
                  <span data-i18n="features.f3_point1"><strong>Automated Commission Splits:</strong> Configure tiered percentage (60/40) or flat-rate splits with complete transparency.</span>
                </li>
                <li class="flex items-start gap-3">
                  <span class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-xs shrink-0 mt-0.5">✓</span>
                  <span data-i18n="features.f3_point2"><strong>Live Chair Matrix:</strong> Monitor barbers currently cutting, taking breaks, or ready for walk-ins.</span>
                </li>
                <li class="flex items-start gap-3">
                  <span class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-xs shrink-0 mt-0.5">✓</span>
                  <span data-i18n="features.f3_point3"><strong>Automated Daily Closeout:</strong> Export transaction breakdowns per barber without manual tallying.</span>
                </li>
              </ul>
            </div>

            <div class="lg:col-span-6">
              <!-- Mockup: Capster Matrix & Commission Split Card -->
              <div class="bg-surface rounded-3xl p-6 lg:p-8 border border-border-light shadow-xl space-y-4">
                <div class="flex justify-between items-center pb-3 border-b border-border-light">
                  <div class="font-bold text-sm text-primary">Live Barber Shift & Roster</div>
                  <span class="text-xs text-primary/60">Day Shift (10:00 - 21:00)</span>
                </div>

                <!-- Capster 1 -->
                <div class="bg-white rounded-2xl p-4 border border-border-light shadow-xs flex items-center justify-between">
                  <div class="flex items-center gap-3">
                    <div class="w-11 h-11 rounded-full bg-primary text-white flex items-center justify-center font-bold text-sm">FP</div>
                    <div>
                      <div class="font-bold text-sm text-primary">Fajar Pratama (Chair 01)</div>
                      <div class="text-xs text-primary/60">Executive Fade • Done in 12 min</div>
                    </div>
                  </div>
                  <div class="text-right">
                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">In-Service</span>
                    <div class="text-xs font-bold text-primary mt-1">7 Sessions Today</div>
                  </div>
                </div>

                <!-- Capster 2 -->
                <div class="bg-white rounded-2xl p-4 border border-border-light shadow-xs flex items-center justify-between">
                  <div class="flex items-center gap-3">
                    <div class="w-11 h-11 rounded-full bg-accent text-white flex items-center justify-center font-bold text-sm">AW</div>
                    <div>
                      <div class="font-bold text-sm text-primary">Aditya Wijaya (Chair 02)</div>
                      <div class="text-xs text-primary/60">Next: 15:30 (DP Verified)</div>
                    </div>
                  </div>
                  <div class="text-right">
                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-amber-100 text-amber-800">Booked</span>
                    <div class="text-xs font-bold text-primary mt-1">5 Sessions Today</div>
                  </div>
                </div>

                <!-- Commission Split Summary Box -->
                <div class="bg-primary/5 rounded-2xl p-4 border border-primary/10">
                  <div class="flex justify-between items-center text-xs mb-2">
                    <span class="font-bold text-primary">Automated Split Calculation (60% Barber / 40% Studio)</span>
                    <span class="font-mono font-bold text-accent">100% Reconciled</span>
                  </div>
                  <div class="w-full bg-slate-200 h-2.5 rounded-full overflow-hidden flex">
                    <div class="bg-accent h-full w-[60%]"></div>
                    <div class="bg-primary h-full w-[40%]"></div>
                  </div>
                  <div class="flex justify-between text-[11px] text-primary/70 mt-2">
                    <span>Barber Payout: IDR 2,910,000</span>
                    <span>Studio Revenue: IDR 1,940,000</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION 4: INDUSTRY SPECIFIC CONCEPTS (KASIR PINTAR INDUSTRY GRID) -->
    <section class="py-24 bg-surface/50 border-t border-border-light" id="industry">
      <div class="max-w-[1240px] mx-auto px-6 lg:px-8">
        <div class="flex flex-col items-center justify-center text-center max-w-3xl mx-auto mb-16">
          <h2 class="font-serif text-[clamp(2.1rem,3.6vw,3rem)] font-medium tracking-[-0.01em] text-primary leading-[1.15] text-center" data-i18n="industry.title">
            Tailored for Every Modern Grooming Studio
          </h2>
          <p class="text-[1.05rem] text-primary/70 mt-4 leading-relaxed max-w-2xl" data-i18n="industry.subtitle">
            From classic barbershops to modern grooming lounges, Trimly adapts to your unique workflow, team size, and booking volume.
          </p>
        </div>

        <!-- 4-Card Visual Photo Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
          <!-- Card 1: Classic Barbershop -->
          <div class="group relative rounded-3xl overflow-hidden shadow-lg border border-border-light bg-white flex flex-col h-[400px]">
            <div class="relative w-full h-[220px] overflow-hidden">
              <img 
                src="https://images.unsplash.com/photo-1599351431202-1e0f0137899a?auto=format&fit=crop&w=800&q=80" 
                alt="Heritage Classic Barbershop" 
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
              <span class="absolute top-3 left-3 bg-white/95 backdrop-blur-sm text-primary text-[10px] uppercase font-bold tracking-wider px-2.5 py-1 rounded-full" data-i18n="industry.c1_badge">
                Heritage
              </span>
            </div>
            <div class="p-5 flex flex-col flex-1 justify-between">
              <div>
                <h3 class="font-serif text-lg font-bold text-primary mb-2" data-i18n="industry.c1_title">Classic Barbershop</h3>
                <p class="text-xs text-primary/70 leading-relaxed" data-i18n="industry.c1_desc">
                  Focus on precision scissor cuts, skin fades, beard trims, and traditional hot-towel shaves in a vintage setting.
                </p>
              </div>
              <div class="pt-3 border-t border-border-light text-[11px] font-semibold text-accent flex items-center justify-between">
                <span data-i18n="industry.c1_tag">Traditional • Hot Towel</span>
                <span>→</span>
              </div>
            </div>
          </div>

          <!-- Card 2: Modern Grooming Studio -->
          <div class="group relative rounded-3xl overflow-hidden shadow-lg border border-border-light bg-white flex flex-col h-[400px]">
            <div class="relative w-full h-[220px] overflow-hidden">
              <img 
                src="https://images.unsplash.com/photo-1622286342621-4bd786c2447c?auto=format&fit=crop&w=800&q=80" 
                alt="Modern Grooming Studio" 
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
              <span class="absolute top-3 left-3 bg-white/95 backdrop-blur-sm text-primary text-[10px] uppercase font-bold tracking-wider px-2.5 py-1 rounded-full" data-i18n="industry.c2_badge">
                High Volume
              </span>
            </div>
            <div class="p-5 flex flex-col flex-1 justify-between">
              <div>
                <h3 class="font-serif text-lg font-bold text-primary mb-2" data-i18n="industry.c2_title">Modern Grooming Studio</h3>
                <p class="text-xs text-primary/70 leading-relaxed" data-i18n="industry.c2_desc">
                  Built for high-volume urban studios with dynamic multi-barber rosters and friction-free bio-link reservations.
                </p>
              </div>
              <div class="pt-3 border-t border-border-light text-[11px] font-semibold text-accent flex items-center justify-between">
                <span data-i18n="industry.c2_tag">Express Booking • Modern Fade</span>
                <span>→</span>
              </div>
            </div>
          </div>

          <!-- Card 3: Men's Salon & Hair Studio -->
          <div class="group relative rounded-3xl overflow-hidden shadow-lg border border-border-light bg-white flex flex-col h-[400px]">
            <div class="relative w-full h-[220px] overflow-hidden">
              <img 
                src="https://images.unsplash.com/photo-1621605815971-fbc98d665033?auto=format&fit=crop&w=800&q=80" 
                alt="Men's Salon and Hair Studio" 
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
              <span class="absolute top-3 left-3 bg-white/95 backdrop-blur-sm text-primary text-[10px] uppercase font-bold tracking-wider px-2.5 py-1 rounded-full" data-i18n="industry.c3_badge">
                Multi-Service
              </span>
            </div>
            <div class="p-5 flex flex-col flex-1 justify-between">
              <div>
                <h3 class="font-serif text-lg font-bold text-primary mb-2" data-i18n="industry.c3_title">Men's Salon & Hair Studio</h3>
                <p class="text-xs text-primary/70 leading-relaxed" data-i18n="industry.c3_desc">
                  Manage multi-step appointments, custom hair coloring, perm treatments, scalp therapies, and styling consultations.
                </p>
              </div>
              <div class="pt-3 border-t border-border-light text-[11px] font-semibold text-accent flex items-center justify-between">
                <span data-i18n="industry.c3_tag">Coloring • Perm • Hair Spa</span>
                <span>→</span>
              </div>
            </div>
          </div>

          <!-- Card 4: Gentlemen's Spa & Grooming -->
          <div class="group relative rounded-3xl overflow-hidden shadow-lg border border-border-light bg-white flex flex-col h-[400px]">
            <div class="relative w-full h-[220px] overflow-hidden">
              <img 
                src="https://images.unsplash.com/photo-1512690459411-b9245aed614b?auto=format&fit=crop&w=800&q=80" 
                alt="Gentlemen's Spa and Grooming" 
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
              <span class="absolute top-3 left-3 bg-white/95 backdrop-blur-sm text-primary text-[10px] uppercase font-bold tracking-wider px-2.5 py-1 rounded-full" data-i18n="industry.c4_badge">
                Premium Spa
              </span>
            </div>
            <div class="p-5 flex flex-col flex-1 justify-between">
              <div>
                <h3 class="font-serif text-lg font-bold text-primary mb-2" data-i18n="industry.c4_title">Gentlemen's Spa & Grooming</h3>
                <p class="text-xs text-primary/70 leading-relaxed" data-i18n="industry.c4_desc">
                  Private VIP suite management, combo grooming packages, master therapist booking, and exclusive time slots.
                </p>
              </div>
              <div class="pt-3 border-t border-border-light text-[11px] font-semibold text-accent flex items-center justify-between">
                <span data-i18n="industry.c4_tag">Beard Spa • Facial • Massage</span>
                <span>→</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- 3-STEP WORKFLOW STEPPER SECTION (VISUAL CARDS WITH UI MINI-PREVIEWS) -->
    <section class="py-24 bg-white border-t border-border-light" id="workflow">
      <div class="max-w-[1240px] mx-auto px-6 lg:px-8">
        <div class="flex flex-col items-center justify-center text-center max-w-3xl mx-auto mb-16">
          <h2 class="font-serif text-[clamp(2.1rem,3.6vw,3rem)] font-medium tracking-[-0.01em] text-primary leading-[1.15] text-center" data-i18n="workflow.title">
            Streamline your barbershop in 3 simple steps.
          </h2>
          <p class="text-[1.05rem] text-primary/70 mt-4 leading-relaxed max-w-2xl" data-i18n="workflow.subtitle">
            Zero complex onboarding. From workspace creation to receiving your first secured down payment, start running in minutes.
          </p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
          <!-- Step 1 Card -->
          <div class="bg-surface rounded-3xl p-7 border border-border-light shadow-sm flex flex-col justify-between group hover:border-primary/40 hover:shadow-md transition-all">
            <div>
              <div class="flex items-center justify-between mb-6">
                <span class="font-serif text-3xl font-bold text-accent">01.</span>
                <div class="w-10 h-10 rounded-xl bg-accent/10 border border-accent/20 flex items-center justify-center text-accent">
                  <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="4" y1="21" x2="4" y2="14"/>
                    <line x1="4" y1="10" x2="4" y2="3"/>
                    <line x1="12" y1="21" x2="12" y2="12"/>
                    <line x1="12" y1="8" x2="12" y2="3"/>
                    <line x1="20" y1="21" x2="20" y2="16"/>
                    <line x1="20" y1="12" x2="20" y2="3"/>
                    <line x1="1" y1="14" x2="7" y2="14"/>
                    <line x1="9" y1="8" x2="15" y2="8"/>
                    <line x1="17" y1="16" x2="23" y2="16"/>
                  </svg>
                </div>
              </div>

              <h3 class="font-serif text-xl font-bold mb-3 text-primary" data-i18n="workflow.s1_title">Setup Studio & Capsters</h3>
              <p class="text-sm text-primary/75 leading-relaxed mb-6" data-i18n="workflow.s1_desc">
                Input your signature grooming menu, configure custom DP rates, assign chair rosters, and connect your studio Midtrans merchant account in 5 minutes.
              </p>
            </div>

            <!-- Mini UI Snippet -->
            <div class="bg-white rounded-2xl p-3.5 border border-border-light shadow-xs space-y-2 text-xs">
              <div class="flex items-center justify-between text-primary font-bold">
                <span>Roster & Menu Config</span>
                <span class="text-[10px] text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full font-semibold">Active</span>
              </div>
              <div class="flex justify-between items-center text-[11px] text-primary/70 pt-1 border-t border-slate-100">
                <span>Classic Cut</span>
                <span class="font-mono font-bold text-primary">DP IDR 10,000</span>
              </div>
              <div class="text-[10px] text-primary/60">3 Active Barber Chairs Ready</div>
            </div>
          </div>
          
          <!-- Step 2 Card -->
          <div class="bg-surface rounded-3xl p-7 border border-border-light shadow-sm flex flex-col justify-between group hover:border-primary/40 hover:shadow-md transition-all">
            <div>
              <div class="flex items-center justify-between mb-6">
                <span class="font-serif text-3xl font-bold text-accent">02.</span>
                <div class="w-10 h-10 rounded-xl bg-primary/10 border border-primary/20 flex items-center justify-center text-primary">
                  <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/>
                    <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>
                  </svg>
                </div>
              </div>

              <h3 class="font-serif text-xl font-bold mb-3 text-primary" data-i18n="workflow.s2_title">Share Dedicated Bio-Link</h3>
              <p class="text-sm text-primary/75 leading-relaxed mb-6" data-i18n="workflow.s2_desc">
                Place your branded <code class="bg-white text-primary font-mono px-1.5 py-0.5 rounded border border-border-light text-xs font-semibold">trimly.com/your-shop</code> URL on your Instagram bio, Google Maps, and WhatsApp auto-responder for frictionless client self-booking.
              </p>
            </div>

            <!-- Mini UI Snippet -->
            <div class="bg-white rounded-2xl p-3.5 border border-border-light shadow-xs space-y-2 text-xs">
              <div class="flex items-center gap-2">
                <div class="w-6 h-6 rounded-full bg-gradient-to-tr from-amber-500 via-rose-500 to-purple-600 flex items-center justify-center text-white text-[10px] font-bold">IG</div>
                <span class="font-bold text-primary text-[11px]">Instagram Bio Link</span>
              </div>
              <div class="bg-surface p-2 rounded-lg font-mono text-[11px] text-accent flex justify-between items-center">
                <span>trimly.com/doctor-barber</span>
                <span class="text-[10px] bg-accent/10 px-1.5 py-0.5 rounded text-accent font-bold">15 Seconds</span>
              </div>
            </div>
          </div>
          
          <!-- Step 3 Card -->
          <div class="bg-surface rounded-3xl p-7 border border-border-light shadow-sm flex flex-col justify-between group hover:border-primary/40 hover:shadow-md transition-all">
            <div>
              <div class="flex items-center justify-between mb-6">
                <span class="font-serif text-3xl font-bold text-accent">03.</span>
                <div class="w-10 h-10 rounded-xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-emerald-700">
                  <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    <path d="M9 12l2 2 4-4"/>
                  </svg>
                </div>
              </div>

              <h3 class="font-serif text-xl font-bold mb-3 text-primary" data-i18n="workflow.s3_title">Receive Guaranteed Bookings</h3>
              <p class="text-sm text-primary/75 leading-relaxed mb-6" data-i18n="workflow.s3_desc">
                Clients lock appointment slots with automated down payments. Midtrans settles funds directly to your studio account while zero ghost no-shows occur.
              </p>
            </div>

            <!-- Mini UI Snippet -->
            <div class="bg-white rounded-2xl p-3.5 border border-border-light shadow-xs space-y-2 text-xs">
              <div class="flex items-center justify-between">
                <span class="font-bold text-primary text-[11px]">Confirmed Appointment</span>
                <span class="text-[10px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full">DP Verified</span>
              </div>
              <div class="flex justify-between items-center text-[11px] text-primary/70 pt-1 border-t border-slate-100">
                <span>Zero No-Show Guarantee</span>
                <span class="font-mono font-bold text-emerald-700">100% Locked</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ROI CALCULATOR SECTION (PRESERVED DARK GREEN WITH VISUAL FINANCIAL OVERLAY) -->
    <section class="py-24 bg-primary relative overflow-hidden isolate" id="roi-calculator">
      <!-- Background Ambient Glow -->
      <div class="absolute -top-24 -left-24 w-96 h-96 bg-accent/10 rounded-full blur-3xl pointer-events-none"></div>
      
      <div class="max-w-[1240px] mx-auto px-6 lg:px-8 grid lg:grid-cols-12 gap-16 lg:gap-12 items-center">
        <!-- Left Column: Copy & Barbershop Cashier Visual -->
        <div class="lg:col-span-6 space-y-8">
          <div>
            <h2 class="font-serif text-[clamp(2.1rem,3.5vw,3rem)] font-medium tracking-[-0.01em] text-white leading-[1.15] mb-4" data-i18n="roi.title">
              How much are ghost no-shows costing your studio?
            </h2>
            <p class="text-[1.05rem] text-white/75 leading-relaxed" data-i18n="roi.subtitle">
              Unsecured bookings cost the average Indonesian barbershop 18% in lost chair revenue monthly. Calculate how much Trimly's automated DP engine recovers for you.
            </p>
          </div>

          <!-- Front Desk Visual with Floating Metric Badges -->
          <div class="relative rounded-2xl overflow-hidden border border-white/15 shadow-2xl h-56 group">
            <img 
              src="https://images.unsplash.com/photo-1521590832167-7bcbfaa6381f?auto=format&fit=crop&w=800&q=80" 
              alt="Barbershop Reception & Cashier Counter" 
              class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
            />
            <div class="absolute inset-0 bg-gradient-to-r from-primary/95 via-primary/80 to-primary/40"></div>
            
            <div class="absolute inset-0 p-5 flex flex-col justify-between z-10">
              <div class="flex justify-between items-start">
                <span class="text-[11px] font-bold uppercase tracking-wider text-accent bg-white/10 backdrop-blur-sm px-2.5 py-1 rounded-full border border-white/10" data-i18n="roi.front_desk">
                  Front Desk Performance
                </span>
                <span class="text-xs text-white/80 font-mono font-bold" data-i18n="roi.dp_settled">100% DP Settled</span>
              </div>

              <div class="space-y-2">
                <div class="inline-flex items-center gap-2 bg-emerald-500/20 backdrop-blur-md px-3 py-1.5 rounded-xl border border-emerald-400/30 text-emerald-300 text-xs font-semibold">
                  <span>▲</span>
                  <span data-i18n="roi.net_margin">+28.4% Net Margin Recovered</span>
                </div>
                <div class="text-xs text-white/80 block" data-i18n="roi.dp_verified">
                  Down payments verified immediately via QRIS and Virtual Accounts.
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Right Column: Interactive Range Sliders Card -->
        <div class="lg:col-span-6 bg-white/5 backdrop-blur-md p-8 lg:p-10 rounded-3xl border border-white/15 shadow-2xl">
          <div class="mb-6">
            <div class="flex justify-between items-center mb-2.5">
              <div class="font-semibold text-white text-sm" data-i18n="roi.label_chairs">Active Chairs / Capsters</div>
              <div class="font-semibold text-accent font-mono text-base" id="valChairs">4 Chairs</div>
            </div>
            <input type="range" id="inputChairs" min="1" max="15" value="4" class="w-full h-2 bg-white/20 rounded-full appearance-none cursor-pointer outline-none [&::-webkit-slider-thumb]:appearance-none [&::-webkit-slider-thumb]:w-5 [&::-webkit-slider-thumb]:h-5 [&::-webkit-slider-thumb]:rounded-full [&::-webkit-slider-thumb]:bg-accent [&::-webkit-slider-thumb]:border-2 [&::-webkit-slider-thumb]:border-white [&::-webkit-slider-thumb]:shadow-md">
          </div>
          
          <div class="mb-6">
            <div class="flex justify-between items-center mb-2.5">
              <div class="font-semibold text-white text-sm" data-i18n="roi.label_price">Average Service Price (IDR)</div>
              <div class="font-semibold text-accent font-mono text-base" id="valPrice">Rp 120.000</div>
            </div>
            <input type="range" id="inputPrice" min="50000" max="400000" step="10000" value="120000" class="w-full h-2 bg-white/20 rounded-full appearance-none cursor-pointer outline-none [&::-webkit-slider-thumb]:appearance-none [&::-webkit-slider-thumb]:w-5 [&::-webkit-slider-thumb]:h-5 [&::-webkit-slider-thumb]:rounded-full [&::-webkit-slider-thumb]:bg-accent [&::-webkit-slider-thumb]:border-2 [&::-webkit-slider-thumb]:border-white [&::-webkit-slider-thumb]:shadow-md">
          </div>
          
          <div class="mb-6">
            <div class="flex justify-between items-center mb-2.5">
              <div class="font-semibold text-white text-sm" data-i18n="roi.label_bookings">Monthly Bookings per Chair</div>
              <div class="font-semibold text-accent font-mono text-base" id="valBookings">150 Bookings</div>
            </div>
            <input type="range" id="inputBookings" min="50" max="300" step="10" value="150" class="w-full h-2 bg-white/20 rounded-full appearance-none cursor-pointer outline-none [&::-webkit-slider-thumb]:appearance-none [&::-webkit-slider-thumb]:w-5 [&::-webkit-slider-thumb]:h-5 [&::-webkit-slider-thumb]:rounded-full [&::-webkit-slider-thumb]:bg-accent [&::-webkit-slider-thumb]:border-2 [&::-webkit-slider-thumb]:border-white [&::-webkit-slider-thumb]:shadow-md">
          </div>
          
          <div class="mt-8 pt-6 border-t border-white/15 bg-white/5 rounded-2xl p-5 border border-white/10">
            <div class="text-white/80 text-xs uppercase tracking-wider mb-1 font-semibold" data-i18n="roi.label_recovered">Monthly Recovered Revenue</div>
            <div class="text-[2rem] lg:text-[2.4rem] font-serif font-bold text-accent mb-1 tracking-tight" id="valRecovered">Rp 10.800.000</div>
            <div class="text-xs text-white/60" data-i18n="roi.calc_note">Estimated based on 15% ghost booking elimination with a standard 50% down payment policy.</div>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION 7: TESTIMONIAL SHOWCASE (MOKA POS SIGNATURE CARD STYLE) -->
    <section class="py-24 bg-surface/60 border-t border-border-light" id="testimonials">
      <div class="max-w-[1240px] mx-auto px-6 lg:px-8">
        <div class="flex flex-col items-center justify-center text-center max-w-3xl mx-auto mb-16">
          <h2 class="font-serif text-[clamp(2.1rem,3.6vw,3rem)] font-medium tracking-[-0.01em] text-primary leading-[1.15] text-center" data-i18n="testimonials.title">
            Trusted and Endorsed by Studio Owners
          </h2>
          <p class="text-[1.05rem] text-primary/70 mt-4 leading-relaxed max-w-2xl" data-i18n="testimonials.subtitle">
            Real stories on how premier barbershops eliminated ghost appointments and automated their daily commission reconciliations.
          </p>
        </div>

        <!-- Moka-Style Testimonial Box with Large Photo on Left & Quote on Right -->
        <div class="max-w-4xl mx-auto bg-white rounded-3xl border border-border-light shadow-xl overflow-hidden relative">
          <!-- Slide 1: Fajar Pratama -->
          <div class="testimonial-slide grid lg:grid-cols-12 items-center">
            <div class="lg:col-span-5 h-[340px] lg:h-[460px] relative overflow-hidden bg-slate-100">
              <img 
                src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=800&q=80" 
                alt="Fajar Pratama - The Noble Barber" 
                class="w-full h-full object-cover object-top"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-transparent to-transparent"></div>
              <div class="absolute bottom-4 left-4 text-white">
                <span class="text-xs uppercase tracking-widest text-accent font-semibold block">South Jakarta</span>
                <span class="font-serif font-bold text-base">The Noble Barber</span>
              </div>
            </div>

            <div class="lg:col-span-7 p-8 lg:p-12 space-y-6 flex flex-col justify-between h-full">
              <div class="space-y-4">
                <div class="flex items-center gap-1 text-amber-400 text-base">
                  @for($s = 0; $s < 5; $s++)
                    <svg class="w-5 h-5 text-amber-400" viewBox="0 0 24 24" fill="currentColor">
                      <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                    </svg>
                  @endfor
                </div>
                <blockquote class="font-serif text-lg lg:text-xl text-primary font-medium leading-snug">
                  "Before Trimly, we lost 4 to 6 slots every weekend because clients simply never showed up. The moment we introduced automated QRIS down payments on our Instagram bio, no-shows plummeted to zero. Our barbers operate with peace of mind knowing every chair is locked."
                </blockquote>
              </div>

              <div class="pt-6 border-t border-border-light flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                  <div class="font-bold text-primary text-base">Fajar Pratama</div>
                  <div class="text-xs text-primary/70">Founder & Head Barber • The Noble Barber</div>
                </div>
                <div class="px-3 py-1.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-bold">
                  95% Drop in No-Shows
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 2: Hendra Wijaya -->
          <div class="testimonial-slide hidden grid lg:grid-cols-12 items-center">
            <div class="lg:col-span-5 h-[340px] lg:h-[460px] relative overflow-hidden bg-slate-100">
              <img 
                src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=800&q=80" 
                alt="Hendra Wijaya - Gentleman & Sons" 
                class="w-full h-full object-cover object-top"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-transparent to-transparent"></div>
              <div class="absolute bottom-4 left-4 text-white">
                <span class="text-xs uppercase tracking-widest text-accent font-semibold block">Bandung</span>
                <span class="font-serif font-bold text-base">Gentleman & Sons</span>
              </div>
            </div>

            <div class="lg:col-span-7 p-8 lg:p-12 space-y-6 flex flex-col justify-between h-full">
              <div class="space-y-4">
                <div class="flex items-center gap-1 text-amber-400 text-base">
                  @for($s = 0; $s < 5; $s++)
                    <svg class="w-5 h-5 text-amber-400" viewBox="0 0 24 24" fill="currentColor">
                      <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                    </svg>
                  @endfor
                </div>
                <blockquote class="font-serif text-lg lg:text-xl text-primary font-medium leading-snug">
                  "We used to track reservations manually through WhatsApp chats, which caused endless scheduling bottlenecks and overlapping chairs. With Trimly, clients pick their preferred barber and settle the down payment themselves. Front desk operations are 10x smoother."
                </blockquote>
              </div>

              <div class="pt-6 border-t border-border-light flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                  <div class="font-bold text-primary text-base">Hendra Wijaya</div>
                  <div class="text-xs text-primary/70">Owner • Gentleman & Sons Barbershop</div>
                </div>
                <div class="px-3 py-1.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-bold">
                  3 Locations Synchronized
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 3: Dimas Arya -->
          <div class="testimonial-slide hidden grid lg:grid-cols-12 items-center">
            <div class="lg:col-span-5 h-[340px] lg:h-[460px] relative overflow-hidden bg-slate-100">
              <img 
                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=800&q=80" 
                alt="Dimas Arya - Doctor Barber" 
                class="w-full h-full object-cover object-top"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-transparent to-transparent"></div>
              <div class="absolute bottom-4 left-4 text-white">
                <span class="text-xs uppercase tracking-widest text-accent font-semibold block">Malang, East Java</span>
                <span class="font-serif font-bold text-base">Doctor Barber</span>
              </div>
            </div>

            <div class="lg:col-span-7 p-8 lg:p-12 space-y-6 flex flex-col justify-between h-full">
              <div class="space-y-4">
                <div class="flex items-center gap-1 text-amber-400 text-base">
                  @for($s = 0; $s < 5; $s++)
                    <svg class="w-5 h-5 text-amber-400" viewBox="0 0 24 24" fill="currentColor">
                      <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                    </svg>
                  @endfor
                </div>
                <blockquote class="font-serif text-lg lg:text-xl text-primary font-medium leading-snug">
                  "Clients love how fast they can book without downloading yet another app. For us as studio managers, automated and transparent barber commission calculations are an absolute game-changer every single day."
                </blockquote>
              </div>

              <div class="pt-6 border-t border-border-light flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                  <div class="font-bold text-primary text-base">Dimas Arya</div>
                  <div class="text-xs text-primary/70">Operational Lead • Doctor Barber</div>
                </div>
                <div class="px-3 py-1.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-bold">
                  100% Automated Commission Splits
                </div>
              </div>
            </div>
          </div>

          <!-- Carousel Controls Footer -->
          <div class="bg-surface px-6 py-4 border-t border-border-light flex items-center justify-between">
            <div class="flex gap-2">
              <button type="button" class="testimonial-dot w-8 h-2.5 rounded-full bg-accent transition-all duration-300" aria-label="Slide 1"></button>
              <button type="button" class="testimonial-dot w-2.5 h-2.5 rounded-full bg-slate-300 transition-all duration-300" aria-label="Slide 2"></button>
              <button type="button" class="testimonial-dot w-2.5 h-2.5 rounded-full bg-slate-300 transition-all duration-300" aria-label="Slide 3"></button>
            </div>

            <div class="flex items-center gap-3">
              <button type="button" id="btnPrevTestimonial" class="w-10 h-10 rounded-full border border-border-light bg-white flex items-center justify-center text-primary hover:bg-primary hover:text-white transition-colors cursor-pointer" aria-label="Previous Testimonial">
                ←
              </button>
              </button>
            </div>
          </div>
        </div>
        
        <div class="mt-12 text-center">
          <a href="{{ url('customer-stories') }}" class="inline-flex items-center gap-2 text-sm font-bold text-accent hover:text-accent/80 transition-colors" data-i18n="testimonials.cta">
            See all stories <span aria-hidden="true">&rarr;</span>
          </a>
        </div>
      </div>
    </section>

    <!-- PRICING SECTION (PRESERVED FUNCTIONALITY WITH TIER ICONS & ENHANCED HIGHLIGHT) -->
    <section class="py-24 bg-white border-t border-border-light" id="pricing">
      <div class="max-w-[1240px] mx-auto px-6 lg:px-8">
        <div class="flex flex-col items-center justify-center text-center max-w-3xl mx-auto mb-16">
          <h2 class="font-serif text-[clamp(2.1rem,3.6vw,3rem)] font-medium tracking-[-0.01em] text-primary leading-[1.15] text-center" data-i18n="pricing.title">
            Transparent pricing for growing studios.
          </h2>
          <p class="text-[1.05rem] text-primary/70 mt-4 leading-relaxed max-w-2xl" data-i18n="pricing.subtitle">
            No hidden charges. Zero commission cuts on your booking transactions. Choose the plan tailored to your studio capacity.
          </p>
        </div>
        
        <!-- Monthly / Annual Toggle Switch -->
        <div class="flex items-center justify-center gap-4 mb-16 select-none">
          <span class="text-sm font-medium text-primary cursor-pointer transition-opacity" id="labelMonthly" data-i18n="pricing.monthly">Monthly</span>
          <button type="button" class="relative w-12 h-6 bg-slate-200 rounded-full outline-none cursor-pointer transition-colors p-1" id="btnToggleBilling" aria-pressed="true" aria-label="Toggle billing period">
            <span id="toggleKnob" class="block w-4 h-4 rounded-full bg-primary transition-transform duration-200 ease-in-out" style="transform: translateX(24px);"></span>
          </button>
          <span class="text-sm font-bold text-primary flex items-center gap-2 cursor-pointer transition-opacity" id="labelAnnual">
            <span data-i18n="pricing.annually">Annually</span> <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800 border border-emerald-200" data-i18n="pricing.save20">Save 20%</span>
          </span>
        </div>
        
        <div class="grid md:grid-cols-2 gap-8 lg:gap-10 max-w-4xl mx-auto items-stretch">
          <!-- Essential Plan -->
          <div class="bg-surface rounded-3xl p-8 lg:p-10 border-2 border-border-light shadow-sm flex flex-col justify-between hover:border-slate-300 transition-all">
            <div>
              <!-- Header Emblem -->
              <div class="flex items-center justify-between mb-6">
                <div class="w-12 h-12 rounded-2xl bg-primary/10 text-primary flex items-center justify-center font-bold">
                  <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="6" cy="6" r="3"/>
                    <circle cx="6" cy="18" r="3"/>
                    <line x1="20" y1="4" x2="8.12" y2="15.88"/>
                    <line x1="14.47" y1="14.48" x2="20" y2="20"/>
                    <line x1="8.12" y1="8.12" x2="12" y2="12"/>
                  </svg>
                </div>
                <span class="text-xs uppercase tracking-wider font-bold text-primary/60 bg-white px-3 py-1 rounded-full border border-border-light">Starter</span>
              </div>

              <h3 class="font-serif text-2xl font-bold mb-2 text-primary" data-i18n="pricing.essential_name">Essential</h3>
              <p class="text-sm text-primary/75 h-10 leading-relaxed" data-i18n="pricing.essential_desc">Basic schedule management and bio-link booking for independent studios.</p>
              
              <div class="my-8 text-primary">
                <span class="text-lg font-medium align-top">Rp</span>
                <span class="text-5xl font-serif font-bold text-primary" id="priceEssential">239.000</span>
                <span class="text-primary/75 text-sm">/mo</span>
              </div>
              <div class="text-xs text-primary/75 mb-8 font-medium" id="noteEssential" data-i18n="pricing.essential_note">Billed annually (Rp 2.868.000/yr)</div>
              
              <ul class="space-y-4 text-sm text-primary/80 mb-8">
                <li class="flex items-center gap-3">
                  <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                  <span>Dedicated bio-link booking portal</span>
                </li>
                <li class="flex items-center gap-3">
                  <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                  <span>Up to 3 active chairs</span>
                </li>
                <li class="flex items-center gap-3">
                  <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                  <span>Standard WhatsApp notifications</span>
                </li>
                <li class="flex items-center gap-3">
                  <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                  <span>Basic daily reporting & export</span>
                </li>
              </ul>
            </div>
            
            <div class="pt-6 border-t border-border-light">
              <x-button-outline size="large" href="{{ url('register') }}" fullWidth="true" variant="secondary" class="rounded-xl border-border-medium hover:bg-primary hover:text-white text-center justify-center" data-i18n="pricing.essential_cta">
                Start Essential Plan
              </x-button-outline>
            </div>
          </div>
          
          <!-- Architect Plan (Clean Elevated Card without Neon Glow) -->
          <div class="bg-white rounded-3xl p-8 lg:p-10 border-2 border-accent shadow-xl flex flex-col justify-between relative transform lg:-translate-y-2">
            <!-- Floating Most Popular Badge -->
            <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-accent text-white text-[11px] font-bold uppercase tracking-widest py-1.5 px-5 rounded-full shadow-sm flex items-center gap-1.5">
              <span><svg class="w-3.5 h-3.5 text-white" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" /></svg></span>
              <span data-i18n="pricing.popular">Most Popular</span>
            </div>

            <div>
              <!-- Header Emblem -->
              <div class="flex items-center justify-between mb-6 pt-2">
                <div class="w-12 h-12 rounded-2xl bg-accent/10 text-accent flex items-center justify-center font-bold">
                  <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                  </svg>
                </div>
                <span class="text-xs uppercase tracking-wider font-bold text-accent bg-accent/10 px-3 py-1 rounded-full">Full POS & DP</span>
              </div>

              <h3 class="font-serif text-2xl font-bold mb-2 text-primary" data-i18n="pricing.architect_name">Architect</h3>
              <p class="text-sm text-primary/75 h-10 leading-relaxed" data-i18n="pricing.architect_desc">Full POS capabilities with Midtrans DP automation and commission splits.</p>
              
              <div class="my-8 text-primary">
                <span class="text-lg font-medium align-top">Rp</span>
                <span class="text-5xl font-serif font-bold text-primary" id="priceArchitect">559.000</span>
                <span class="text-primary/75 text-sm">/mo</span>
              </div>
              <div class="text-xs text-primary/75 mb-8 font-medium" id="noteArchitect" data-i18n="pricing.architect_note">Billed annually (Rp 6.708.000/yr)</div>
              
              <ul class="space-y-4 text-sm text-primary/80 mb-8">
                <li class="flex items-center gap-3 font-semibold text-primary">
                  <svg class="w-4 h-4 text-accent shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                  <span>Automated Midtrans DP Engine (QRIS / VA)</span>
                </li>
                <li class="flex items-center gap-3">
                  <svg class="w-4 h-4 text-accent shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                  <span>Unlimited active chairs & capsters</span>
                </li>
                <li class="flex items-center gap-3">
                  <svg class="w-4 h-4 text-accent shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                  <span>Automated commission splits (tiered/fixed)</span>
                </li>
                <li class="flex items-center gap-3">
                  <svg class="w-4 h-4 text-accent shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                  <span>Capster shift & roster management</span>
                </li>
                <li class="flex items-center gap-3">
                  <svg class="w-4 h-4 text-accent shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                  <span>Priority onboarding & live WhatsApp support</span>
                </li>
              </ul>
            </div>
            
            <div class="pt-6 border-t border-border-light">
              <x-button-accent size="large" href="{{ url('register') }}" fullWidth="true" class="rounded-xl shadow-sm hover:shadow text-center justify-center" data-i18n="pricing.architect_cta">
                Get Architect Access
              </x-button-accent>
            </div>
          </div>
        </div>
        
        <div class="mt-12 text-center">
          <a href="{{ url('pricing') }}" class="inline-flex items-center gap-2 text-sm font-bold text-accent hover:text-accent/80 transition-colors" data-i18n="pricing.see_full">
            See full pricing details <span aria-hidden="true">&rarr;</span>
          </a>
        </div>
      </div>
    </section>

    <!-- FAQ SECTION (MOKA STYLE: CUSTOMER SUPPORT PHOTO CARD ON LEFT + ACCORDION RIGHT) -->
    <section class="py-24 bg-surface/50 border-t border-border-light" id="faq">
      <div class="max-w-[1240px] mx-auto px-6 lg:px-8 grid lg:grid-cols-12 gap-12 lg:gap-16">
        <!-- Left Column: Friendly Customer Support Photo Card -->
        <div class="lg:col-span-5 space-y-6">
          <div>
            <h2 class="font-serif text-[clamp(2.1rem,3.4vw,2.8rem)] font-medium tracking-[-0.01em] text-primary leading-[1.15] mb-4" data-i18n="faq.title">
              Frequently Asked Questions
            </h2>
            <p class="text-[1.05rem] text-primary/75 leading-relaxed" data-i18n="faq.subtitle">
              Everything you need to know before integrating Trimly into your studio operations.
            </p>
          </div>

          <!-- Customer Support Card -->
          <div class="bg-white rounded-3xl p-6 border border-border-light shadow-xl overflow-hidden space-y-5">
            <div class="relative w-full h-44 rounded-2xl overflow-hidden">
              <img 
                src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=800&q=80" 
                alt="Trimly Onboarding Specialist" 
                class="w-full h-full object-cover object-top"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-primary/70 to-transparent"></div>
              <span class="absolute top-3 left-3 bg-white/95 backdrop-blur-sm text-emerald-800 text-[10px] font-bold px-2.5 py-1 rounded-full flex items-center gap-1.5 shadow-sm" data-i18n="faq.online_badge">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                ALWAYS ONLINE
              </span>
            </div>

            <div>
              <h3 class="font-serif font-bold text-base text-primary mb-1" data-i18n="faq.box_title">Have a Specific Question?</h3>
              <p class="text-xs text-primary/70 leading-relaxed" data-i18n="faq.box_desc">
                Our concierge onboarding team is available to help configure your services menu, import barber rosters, and activate your payment gateway.
              </p>
            </div>

            <a href="https://wa.me/6281234567890?text=Hello%20Trimly,%20I%20would%20like%20a%20consultation%20on%20barbershop%20setup" target="_blank" class="w-full flex items-center justify-center gap-2 py-3 px-4 rounded-xl bg-emerald-700 hover:bg-emerald-800 text-white font-bold text-xs shadow-sm transition-colors">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
              <span data-i18n="faq.wa_btn">Chat with Onboarding via WhatsApp</span>
            </a>

            <div class="text-[11px] text-primary/60 text-center font-medium">
              ● Average response &lt; 5 minutes • 7 Days a Week
            </div>
          </div>
        </div>
        
        <!-- Right Column: Interactive Accordion Items -->
        <div class="lg:col-span-7 space-y-4">
          <!-- Item 1 -->
          <div class="faq-item bg-white rounded-2xl border border-border-light overflow-hidden transition-all shadow-xs">
            <button type="button" class="faq-trigger w-full px-6 py-5 flex items-center justify-between text-left font-bold text-base text-primary cursor-pointer hover:text-accent transition-colors">
              <span data-i18n="faq.q1">How long does payment gateway integration take?</span>
              <span class="faq-icon text-2xl font-light text-primary/70 shrink-0 ml-4">+</span>
            </button>
            <div class="faq-content hidden px-6 pb-5 text-sm text-primary/75 leading-relaxed border-t border-slate-100 pt-3" data-i18n="faq.a1">
              We guide you through the entire onboarding process. Your barbershop can begin accepting automated down payments via QRIS (GoPay, OVO, ShopeePay, Dana) and bank Virtual Accounts within 24 hours of completing basic merchant verification.
            </div>
          </div>
          
          <!-- Item 2 -->
          <div class="faq-item bg-white rounded-2xl border border-border-light overflow-hidden transition-all shadow-xs">
            <button type="button" class="faq-trigger w-full px-6 py-5 flex items-center justify-between text-left font-bold text-base text-primary cursor-pointer hover:text-accent transition-colors">
              <span data-i18n="faq.q2">Do clients need to download an app to book?</span>
              <span class="faq-icon text-2xl font-light text-primary/70 shrink-0 ml-4">+</span>
            </button>
            <div class="faq-content hidden px-6 pb-5 text-sm text-primary/75 leading-relaxed border-t border-slate-100 pt-3" data-i18n="faq.a2">
              Not at all. Trimly is 100% mobile-web optimized. Clients simply tap the link in your Instagram bio (e.g. <code class="bg-slate-100 px-1 py-0.5 rounded text-xs">trimly.com/your-studio</code>) and complete their reservation directly inside their browser in under 15 seconds.
            </div>
          </div>
          
          <!-- Item 3 -->
          <div class="faq-item bg-white rounded-2xl border border-border-light overflow-hidden transition-all shadow-xs">
            <button type="button" class="faq-trigger w-full px-6 py-5 flex items-center justify-between text-left font-bold text-base text-primary cursor-pointer hover:text-accent transition-colors">
              <span data-i18n="faq.q3">Do I need specialized POS hardware or dedicated EDC terminals?</span>
              <span class="faq-icon text-2xl font-light text-primary/70 shrink-0 ml-4">+</span>
            </button>
            <div class="faq-content hidden px-6 pb-5 text-sm text-primary/75 leading-relaxed border-t border-slate-100 pt-3" data-i18n="faq.a3">
              No special hardware required. Trimly OS is fully cloud-based. You can manage your studio from any existing iPad, Android tablet, laptop, or smartphone already at your front desk.
            </div>
          </div>

          <!-- Item 4 -->
          <div class="faq-item bg-white rounded-2xl border border-border-light overflow-hidden transition-all shadow-xs">
            <button type="button" class="faq-trigger w-full px-6 py-5 flex items-center justify-between text-left font-bold text-base text-primary cursor-pointer hover:text-accent transition-colors">
              <span data-i18n="faq.q4">What happens if a client needs to reschedule or cancel?</span>
              <span class="faq-icon text-2xl font-light text-primary/70 shrink-0 ml-4">+</span>
            </button>
            <div class="faq-content hidden px-6 pb-5 text-sm text-primary/75 leading-relaxed border-t border-slate-100 pt-3" data-i18n="faq.a4">
              You maintain complete control over studio policies. For example, allow free rescheduling up to 2 hours in advance while forfeiting down payments for late cancellations. Your customized policy is automatically embedded into every client's digital confirmation pass.
            </div>
          </div>

          <!-- Item 5 -->
          <div class="faq-item bg-white rounded-2xl border border-border-light overflow-hidden transition-all shadow-xs">
            <button type="button" class="faq-trigger w-full px-6 py-5 flex items-center justify-between text-left font-bold text-base text-primary cursor-pointer hover:text-accent transition-colors">
              <span data-i18n="faq.q5">Can barber commission splits be customized or tiered?</span>
              <span class="faq-icon text-2xl font-light text-primary/70 shrink-0 ml-4">+</span>
            </button>
            <div class="faq-content hidden px-6 pb-5 text-sm text-primary/75 leading-relaxed border-t border-slate-100 pt-3" data-i18n="faq.a5">
              Yes. Trimly supports custom percentage splits (e.g. 60% barber / 40% studio), fixed-fee service bonuses, and tiered monthly volume targets. Every barber can view their transparent shift breakdown anytime.
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION 10: PRE-FOOTER FULL-BLEED CTA (MOODY BARBERSHOP INTERIOR + DARK OVERLAY) -->
    <section class="relative py-28 overflow-hidden bg-primary text-white isolate">
      <!-- Full Bleed Atmospheric Barbershop Photo Background -->
      <img 
        src="https://images.unsplash.com/photo-1585747860715-2ba37e788b70?auto=format&fit=crop&w=1600&q=80" 
        alt="Atmospheric Barbershop Interior" 
        class="absolute inset-0 w-full h-full object-cover object-center z-0 opacity-25 mix-blend-luminosity pointer-events-none"
      />
      <!-- Dark Green Gradient Overlay for Luxury Contrast -->
      <div class="absolute inset-0 bg-gradient-to-b from-primary/95 via-primary/90 to-primary/95 z-10 pointer-events-none"></div>
      
      <div class="max-w-[1240px] mx-auto px-6 lg:px-8 text-center text-white relative z-20">
        <h2 class="font-serif text-[clamp(2.3rem,4vw,3.6rem)] font-medium leading-[1.12] tracking-tight mb-6 max-w-3xl mx-auto text-white" data-i18n="cta.title">
          Your Chairs Deserve to Stay Full.
        </h2>

        <p class="text-[1.1rem] text-white/80 max-w-2xl mx-auto mb-10 leading-relaxed" data-i18n="cta.subtitle">
          Join premier grooming studios running on automated, zero-friction reservations. Launch your studio workspace in 5 minutes.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 max-w-md mx-auto">
          <x-button-accent size="large" href="{{ url('register') }}" class="w-full sm:w-auto shadow-sm hover:shadow text-center justify-center" data-i18n="cta.btn1">
            Claim Your Workspace
          </x-button-accent>
          <a href="{{ url('book') }}" class="w-full sm:w-auto px-8 py-4 text-base font-semibold border border-white/30 bg-white/10 hover:bg-white/20 backdrop-blur-md text-white rounded-sm hover:-translate-y-px transition-all text-center justify-center" data-i18n="cta.btn2">
            View Demo Portal
          </a>
        </div>

        <div class="mt-8 text-xs text-white/60 flex items-center justify-center gap-6">
          <span data-i18n="cta.point1">✓ No Long-Term Contracts</span>
          <span data-i18n="cta.point2">✓ Free 1-on-1 Setup Guidance</span>
        </div>
      </div>
    </section>

    <!-- SAAS FOOTER -->
    <footer class="bg-primary border-t border-white/10 py-16 text-white">
      <div class="max-w-[1200px] mx-auto px-8">
        <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr_1fr_1fr_1fr] gap-10 mb-16">
          <div class="flex flex-col gap-4">
            <div class="font-serif text-[1.25rem] font-bold tracking-[0.04em] text-white">TRIMLY<span class="text-accent">.</span></div>
            <p class="text-[0.95rem] text-white/70 leading-relaxed max-w-[280px]" data-i18n="footer.desc">The operating system for premier barbershops. Digitize your studio with automated workflows.</p>
            <div class="flex items-center gap-4 mt-2">
              <a href="#" class="text-white/50 hover:text-white transition-colors">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/></svg>
              </a>
              <a href="#" class="text-white/50 hover:text-white transition-colors">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
              </a>
              <a href="#" class="text-white/50 hover:text-white transition-colors">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
              </a>
            </div>
          </div>
          <div class="flex flex-col gap-3">
            <div class="font-bold text-[0.95rem] mb-2 text-white" data-i18n="footer.product">Product</div>
            <a href="#" class="text-[0.95rem] text-white/70 hover:text-white transition-colors" data-i18n="footer.features">Features</a>
            <a href="#" class="text-[0.95rem] text-white/70 hover:text-white transition-colors" data-i18n="footer.pricing">Pricing</a>
            <a href="#" class="text-[0.95rem] text-white/70 hover:text-white transition-colors" data-i18n="footer.integrations">Integrations</a>
          </div>
          <div class="flex flex-col gap-3">
            <div class="font-bold text-[0.95rem] mb-2 text-white" data-i18n="footer.platform">Platform</div>
            <a href="#" class="text-[0.95rem] text-white/70 hover:text-white transition-colors" data-i18n="footer.biolink">Bio-Link Portal</a>
            <a href="#" class="text-[0.95rem] text-white/70 hover:text-white transition-colors" data-i18n="footer.capster_app">Capster App</a>
            <a href="#" class="text-[0.95rem] text-white/70 hover:text-white transition-colors" data-i18n="footer.hardware">Hardware Setup</a>
          </div>
          <div class="flex flex-col gap-3">
            <div class="font-bold text-[0.95rem] mb-2 text-white" data-i18n="footer.company">Company</div>
            <a href="#" class="text-[0.95rem] text-white/70 hover:text-white transition-colors" data-i18n="footer.about">About Us</a>
            <a href="#" class="text-[0.95rem] text-white/70 hover:text-white transition-colors" data-i18n="footer.careers">Careers</a>
            <a href="#" class="text-[0.95rem] text-white/70 hover:text-white transition-colors" data-i18n="footer.contact">Contact Sales</a>
          </div>
          <div class="flex flex-col gap-3">
            <div class="font-bold text-[0.95rem] mb-2 text-white" data-i18n="footer.legal">Legal</div>
            <a href="#" class="text-[0.95rem] text-white/70 hover:text-white transition-colors" data-i18n="footer.privacy">Privacy Policy</a>
            <a href="#" class="text-[0.95rem] text-white/70 hover:text-white transition-colors" data-i18n="footer.terms">Terms of Service</a>
          </div>
        </div>
        
        <div class="pt-8 border-t border-white/10 text-[0.85rem] text-white/50 flex flex-col md:flex-row justify-between items-center gap-4">
          <p data-i18n="footer.rights">&copy; 2026 Trimly OS. All rights reserved.</p>
        </div>
      </div>
    </footer>
  </main>

  <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>

