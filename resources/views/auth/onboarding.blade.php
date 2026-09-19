<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Studio Onboarding & Subscription — Trimly OS</title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Geist:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
  
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <style>
    [x-cloak] { display: none !important; }
  </style>
</head>
<body class="bg-background text-primary font-sans antialiased min-h-screen flex m-0">

  <main class="w-full min-h-screen flex flex-col lg:flex-row">
    
    <!-- Left Side: Branding & Trust -->
    <aside class="w-full lg:w-[42%] xl:w-[40%] bg-primary text-white p-8 sm:p-12 lg:p-16 flex flex-col justify-between shrink-0 relative overflow-hidden">
      <!-- Decorative background blur -->
      <div class="absolute -right-20 -top-20 w-80 h-80 bg-white/5 rounded-full blur-3xl pointer-events-none"></div>
      <div class="absolute -left-20 -bottom-20 w-80 h-80 bg-accent/10 rounded-full blur-3xl pointer-events-none"></div>

      <div class="relative z-10">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="inline-block font-serif text-2xl sm:text-3xl font-bold text-white tracking-tight no-underline mb-12">
          Trimly<span class="text-accent">.</span>
        </a>

        <!-- Headline -->
        <h1 data-i18n="onboarding.headline" class="font-serif text-3xl sm:text-4xl xl:text-5xl font-normal leading-[1.15] mb-8 text-white">
          Build the Digital Foundation of Your Barbershop
        </h1>

        <!-- Quote Block -->
        <blockquote class="text-base sm:text-lg text-white/80 leading-relaxed border-l-2 border-accent pl-5 my-8 max-w-md">
          <span data-i18n="onboarding.quote">&ldquo;A structured operational flow guarantees precision, giving the artisan total focus on the craft.&rdquo;</span>
          <footer data-i18n="onboarding.quote_author" class="mt-3 text-xs text-white/70 font-semibold tracking-wider uppercase">— Trimly Studio Blueprint</footer>
        </blockquote>

        <!-- Core Value Pillars -->
        <div class="flex flex-col gap-3.5 mt-10 pt-8 border-t border-white/10 max-w-sm">
          <div class="flex items-center gap-3 text-xs text-white/80">
            <span class="w-5 h-5 rounded-full bg-accent/20 text-accent flex items-center justify-center shrink-0 font-bold">&check;</span>
            <span data-i18n="onboarding.pillar1">14-day zero-risk trial with instant workspace activation</span>
          </div>
          <div class="flex items-center gap-3 text-xs text-white/80">
            <span class="w-5 h-5 rounded-full bg-accent/20 text-accent flex items-center justify-center shrink-0 font-bold">&check;</span>
            <span data-i18n="onboarding.pillar2">Zero commission cut on all in-chair client settlements</span>
          </div>
          <div class="flex items-center gap-3 text-xs text-white/80">
            <span class="w-5 h-5 rounded-full bg-accent/20 text-accent flex items-center justify-center shrink-0 font-bold">&check;</span>
            <span data-i18n="onboarding.pillar3">Real-time Capster Matrix &amp; Midtrans automated DP lock</span>
          </div>
        </div>
      </div>

      <!-- Cloud Server Status Footer -->
      <div class="relative z-10 mt-12 pt-6 border-t border-white/15 flex items-center justify-between text-xs text-white/70">
        <div class="flex items-center gap-2.5">
          <span class="w-2 h-2 rounded-full bg-emerald-400 shadow-[0_0_0_4px_rgba(52,211,153,0.25)] animate-pulse"></span>
          <span data-i18n="onboarding.cloud_status" class="font-medium text-white/90">Cloud Server: Live &amp; Operational</span>
        </div>
        <span class="font-mono text-white/50 text-[11px]">Trimly OS v2.4</span>
      </div>
    </aside>
 
    <!-- Right Side: Form & Subscription -->
    <section class="flex-1 w-full overflow-y-auto px-6 py-10 sm:px-12 lg:px-16 xl:px-20 bg-background flex flex-col justify-start items-center">
      <div 
        class="max-w-xl w-full py-4 sm:py-6" 
        x-data="{ 
          showPassword: false, 
          showSubscriptionPayment: false, 
          selectedPlan: 'essential', 
          planPrice: 289000, 
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
        
        <!-- Top Switcher & Mobile Logo Bar -->
        <div class="flex justify-between items-center mb-6">
          <div class="block lg:hidden font-serif text-2xl font-bold text-primary tracking-tight">Trimly<span class="text-accent">.</span></div>
          <div class="ml-auto">
            @include('partials.lang-switcher')
          </div>
        </div>

        <!-- Header -->
        <div class="mb-8">
          <h2 data-i18n="onboarding.title" class="font-serif text-2xl sm:text-3xl font-bold text-primary tracking-tight mb-2">
            Studio Onboarding
          </h2>
          <p data-i18n="onboarding.subtitle" class="text-sm text-gray-500 leading-relaxed m-0">
            Create your Trimly workspace and establish your operational terminal.
          </p>
        </div>

        <!-- Onboarding Form -->
        <form class="flex flex-col gap-5" action="{{ url('/onboarding-success') }}" method="GET">
          
          <!-- Row 1: Barbershop Name & Owner Name -->
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="flex flex-col gap-1.5">
              <x-label for="barbershop_name" data-i18n="onboarding.barbershop_name_label">Barbershop Name</x-label>
              <x-input id="barbershop_name" name="barbershop_name" data-i18n-placeholder="onboarding.barbershop_name_placeholder" required placeholder="e.g. The Noble Barber" />
            </div>
            <div class="flex flex-col gap-1.5">
              <x-label for="owner_name" data-i18n="onboarding.owner_name_label">Owner Name</x-label>
              <x-input id="owner_name" name="owner_name" data-i18n-placeholder="onboarding.owner_name_placeholder" required placeholder="e.g. Arya Maulana" />
            </div>
          </div>

          <!-- Row 2: Studio Subdomain -->
          <div class="flex flex-col gap-1.5">
            <x-label for="subdomain" data-i18n="onboarding.subdomain_label">Studio Subdomain</x-label>
            <div class="flex items-center rounded-sm border border-border-medium bg-background focus-within:border-primary focus-within:ring-1 focus-within:ring-primary transition-all overflow-hidden">
              <input type="text" id="subdomain" name="subdomain" data-i18n-placeholder="onboarding.subdomain_placeholder" required placeholder="noblebarber" class="w-full px-5 py-3.5 bg-transparent text-primary text-sm focus:outline-none placeholder:text-primary/40 font-mono" />
              <span class="px-4 py-3.5 bg-slate-100 border-l border-border-medium text-xs font-mono text-gray-500 select-none shrink-0">.trimly.com</span>
            </div>
            <span data-i18n="onboarding.subdomain_hint" class="text-[11px] text-gray-400">Your portal URL for online booking and customer tickets.</span>
          </div>

          <!-- Row 3: Business Email & WhatsApp Number -->
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="flex flex-col gap-1.5">
              <x-label for="email" data-i18n="onboarding.email_label">Business Email</x-label>
              <x-input type="email" id="email" name="email" data-i18n-placeholder="onboarding.email_placeholder" required placeholder="admin@noblebarber.id" />
            </div>
            <div class="flex flex-col gap-1.5">
              <x-label for="phone" data-i18n="onboarding.phone_label">WhatsApp Number</x-label>
              <x-input type="tel" id="phone" name="phone" data-i18n-placeholder="onboarding.phone_placeholder" required placeholder="0812-3456-7890" />
            </div>
          </div>

          <!-- Row 4: Admin Password -->
          <div class="flex flex-col gap-1.5">
            <x-label for="password" data-i18n="onboarding.password_label">Admin Password</x-label>
            <div class="relative flex items-center">
              <input :type="showPassword ? 'text' : 'password'" id="password" name="password" required placeholder="••••••••" class="w-full px-5 py-3.5 pr-12 border border-border-medium rounded-sm bg-background text-primary text-sm transition-all duration-200 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary placeholder:text-primary/40" />
              <button type="button" @click="showPassword = !showPassword" class="absolute right-3.5 p-1 text-gray-400 hover:text-primary transition-colors cursor-pointer bg-transparent border-0" aria-label="Toggle password visibility">
                <!-- Eye Icon -->
                <svg x-show="!showPassword" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                  <circle cx="12" cy="12" r="3"></circle>
                </svg>
                <!-- Eye Off Icon -->
                <svg x-show="showPassword" x-cloak class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                  <line x1="1" y1="1" x2="23" y2="23"></line>
                </svg>
              </button>
            </div>
          </div>

          <!-- Row 5: Subscription Plan Selector -->
          <div class="flex flex-col gap-2.5 mt-2">
            <div class="flex items-center justify-between">
              <x-label class="mb-0" data-i18n="onboarding.plan_select_label">Select SaaS Subscription Plan</x-label>
              <span data-i18n="onboarding.trial_pill" class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[11px] font-semibold">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                14-Day Free Trial
              </span>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <!-- Essential Plan -->
              <label class="cursor-pointer relative p-4 rounded-xl transition-all block"
                     @click="selectedPlan = 'essential'; planPrice = 289000"
                     :class="selectedPlan === 'essential' ? 'border-2 border-primary bg-white shadow-sm ring-2 ring-primary/5' : 'border border-border-subtle bg-white/70 hover:border-gray-300 hover:bg-white'">
                <input type="radio" name="plan" value="essential" class="sr-only" x-model="selectedPlan" />
                <div class="flex justify-between items-start mb-2">
                  <strong class="text-sm font-bold text-primary block">Essential</strong>
                  <div class="w-4 h-4 rounded-full border flex items-center justify-center transition-colors shrink-0"
                       :class="selectedPlan === 'essential' ? 'border-primary bg-primary' : 'border-gray-300'">
                    <span class="w-1.5 h-1.5 rounded-full bg-white" x-show="selectedPlan === 'essential'"></span>
                  </div>
                </div>
                <div class="text-base font-bold text-primary mb-1">
                  Rp 289.000 <span class="text-xs text-gray-500 font-normal">/ mo</span>
                </div>
                <p data-i18n="onboarding.plan_essential_desc" class="text-xs text-gray-500 leading-snug m-0">Standard operations, scheduling, &amp; reporting.</p>
                <div class="flex items-center justify-between mt-2.5 pt-2 border-t border-slate-100 text-[11px] text-emerald-700 font-medium">
                  <span data-i18n="onboarding.trial_badge">Free 14 days trial</span>
                  <span data-i18n="onboarding.today_free" class="text-slate-400">Rp 0 hari ini</span>
                </div>
              </label>

              <!-- Architect Plan (Pro Tier) -->
              <label class="cursor-pointer relative p-4 rounded-xl transition-all block"
                     @click="selectedPlan = 'architect'; planPrice = 699000"
                     :class="selectedPlan === 'architect' ? 'border-2 border-primary bg-white shadow-sm ring-2 ring-primary/5' : 'border border-border-subtle bg-white/70 hover:border-gray-300 hover:bg-white'">
                <div class="absolute -top-2.5 right-3">
                  <span class="text-[10px] font-bold uppercase tracking-wider bg-accent text-white px-2 py-0.5 rounded-full shadow-xs">Pro Tier</span>
                </div>
                <input type="radio" name="plan" value="architect" class="sr-only" x-model="selectedPlan" />
                <div class="flex justify-between items-start mb-2">
                  <strong class="text-sm font-bold text-primary block">Architect</strong>
                  <div class="w-4 h-4 rounded-full border flex items-center justify-center transition-colors shrink-0"
                       :class="selectedPlan === 'architect' ? 'border-primary bg-primary' : 'border-gray-300'">
                    <span class="w-1.5 h-1.5 rounded-full bg-white" x-show="selectedPlan === 'architect'"></span>
                  </div>
                </div>
                <div class="text-base font-bold text-primary mb-1">
                  Rp 699.000 <span class="text-xs text-gray-500 font-normal">/ mo</span>
                </div>
                <p data-i18n="onboarding.plan_architect_desc" class="text-xs text-gray-500 leading-snug m-0">Full Midtrans DP integration, advanced analytics.</p>
                <div class="flex items-center justify-between mt-2.5 pt-2 border-t border-slate-100 text-[11px] text-emerald-700 font-medium">
                  <span data-i18n="onboarding.trial_badge">Free 14 days trial</span>
                  <span data-i18n="onboarding.today_free" class="text-slate-400">Rp 0 hari ini</span>
                </div>
              </label>
            </div>
          </div>

          <!-- Action Button & Footer -->
          <div class="mt-4 flex flex-col gap-3">
            <x-button-primary type="button" fullWidth="true" @click.prevent="showSubscriptionPayment = true; startTimer()" class="py-4 text-sm justify-center shadow-md">
              <span data-i18n="onboarding.submit_btn">Initialize Studio Terminal &rarr;</span>
            </x-button-primary>
            <p data-i18n="onboarding.trial_notice" class="text-center text-xs text-gray-500 m-0">
              Mulai dengan <strong class="text-primary font-semibold">14 hari free trial</strong>. Anda tidak akan ditagih sebelum masa uji coba berakhir.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-between text-xs text-gray-500 gap-2 pt-3 border-t border-border-light mt-2">
              <span><span data-i18n="onboarding.has_account">Sudah punya akun?</span> <a href="{{ url('/login') }}" data-i18n="onboarding.login_link" class="text-primary font-semibold hover:underline">Masuk ke Terminal</a></span>
              <a href="{{ url('/') }}" data-i18n="onboarding.back_link" class="text-gray-400 hover:text-primary transition-colors">&larr; Return to Landing Page</a>
            </div>
          </div>

        </form>

        <!-- MIDTRANS SUBSCRIPTION MODAL (Alpine.js) -->
        <div 
          x-show="showSubscriptionPayment" 
          x-cloak 
          x-transition:enter="transition ease-out duration-300"
          x-transition:enter-start="opacity-0"
          x-transition:enter-end="opacity-100"
          x-transition:leave="transition ease-in duration-200"
          x-transition:leave-start="opacity-100"
          x-transition:leave-end="opacity-0"
          class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4"
          @keydown.escape.window="showSubscriptionPayment = false"
        >
          <div 
            x-show="showSubscriptionPayment"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95 translate-y-4"
            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100 translate-y-0"
            x-transition:leave-end="opacity-0 scale-95 translate-y-4"
            @click.outside="showSubscriptionPayment = false"
            class="bg-white rounded-3xl max-w-md w-full shadow-2xl flex flex-col max-h-[90vh] overflow-hidden border border-border-subtle"
          >
            <!-- Modal Header -->
            <div class="flex justify-between items-center px-6 py-4 border-b border-border-subtle shrink-0">
              <div class="flex items-center gap-2.5">
                <div class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></div>
                <span data-i18n="onboarding.modal_title" class="font-bold text-base text-primary">Secure Payment via Midtrans</span>
              </div>
              <button 
                type="button" 
                @click="showSubscriptionPayment = false" 
                class="w-8 h-8 rounded-full flex items-center justify-center text-slate-400 hover:text-primary hover:bg-slate-100 transition-colors text-xl leading-none cursor-pointer"
                aria-label="Close modal"
              >
                &times;
              </button>
            </div>

            <!-- Scrollable Content -->
            <div class="p-6 overflow-y-auto space-y-6 flex-1 text-left">
              <!-- Countdown Alert Banner -->
              <div class="bg-orange-50 text-accent border border-orange-200/60 rounded-xl px-4 py-3 flex items-center justify-between text-sm shadow-xs">
                <div class="flex items-center gap-2">
                  <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  <span data-i18n="onboarding.modal_countdown" class="font-medium text-xs sm:text-sm">Complete payment in</span>
                </div>
                <span class="font-mono font-bold text-accent text-sm" x-text="formattedTime">14:53</span>
              </div>

              <!-- Merchant & Amount Details -->
              <div class="text-center py-2 bg-slate-50/70 rounded-2xl border border-slate-100 p-4">
                <div data-i18n="onboarding.modal_sub_name" class="font-serif font-bold text-base text-primary">Trimly OS Subscription</div>
                <div class="text-xs text-slate-500 mt-0.5">
                  <span data-i18n="onboarding.modal_plan_prefix">Plan:</span> <span class="font-bold text-primary capitalize" x-text="selectedPlan"></span> Tier
                </div>
                <h3 class="text-3xl font-serif text-primary mt-1 font-bold" x-text="'Rp ' + planPrice.toLocaleString('id-ID')"></h3>
                <div data-i18n="onboarding.modal_billing_note" class="text-[11px] text-slate-400 mt-1 uppercase tracking-wider font-medium">Billed Monthly • Cancel Anytime</div>
              </div>

              <!-- Payment Method Selector -->
              <div>
                <label data-i18n="onboarding.modal_method_label" class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Select Method</label>
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
                <span data-i18n="onboarding.modal_qris_hint" class="text-xs font-medium text-slate-600">Scan with any supported e-Wallet or Mobile Banking</span>
              </div>

              <!-- BCA VA Box -->
              <div x-show="selectedMethod === 'bca'" x-transition class="p-5 bg-slate-50 rounded-2xl border border-slate-200 text-center space-y-2">
                <span class="text-xs text-slate-500 font-medium">BCA Virtual Account Number</span>
                <div class="text-xl font-mono font-bold text-primary tracking-wider select-all">8277 0812 3456 7890</div>
                <p class="text-[11px] text-slate-400">Account Name: TRIMLY / SUBSCRIPTION</p>
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
              <x-button-primary href="{{ url('/onboarding-success') }}" fullWidth="true" class="py-3.5 text-sm rounded-xl font-semibold shadow-sm">
                <span data-i18n="onboarding.modal_simulate_btn">Simulate Subscription Payment</span>
                <svg viewBox="0 0 24 24" class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
              </x-button-primary>
            </div>
          </div>
        </div>

      </div>
    </section>

  </main>

</body>
</html>
