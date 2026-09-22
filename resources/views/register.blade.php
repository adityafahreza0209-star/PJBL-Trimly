<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>Onboarding Studio Baru — Trimly OS</title>
  
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Geist:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
  
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-primary font-sans h-screen w-full overflow-hidden antialiased">

  <main class="flex w-full h-full">
    
    <!-- Left Column: Visual Showcase -->
    <aside class="hidden lg:flex flex-col justify-between w-[45%] h-full bg-primary text-background px-16 py-12">
      <div>
        
        <!-- Logo -->
        <a href="{{ url('/') }}" class="inline-block font-serif text-[1.75rem] font-semibold text-background mb-16">
          Trimly<span class="text-accent">.</span>
        </a>
        
        <!-- Headline -->
        <h1 data-i18n="onboarding.headline" class="font-serif text-[3rem] font-normal leading-[1.1] mb-12 max-w-[90%]">Build the Digital Foundation of Your Barbershop</h1>
        
        <!-- Quote -->
        <blockquote class="text-[1.1rem] leading-[1.6] text-background/80 max-w-[85%] border-l-2 border-accent pl-6">
          <span data-i18n="onboarding.quote">"A structured operational flow guarantees precision, giving the artisan total focus on the craft."</span>
          <div data-i18n="onboarding.quote_author" class="mt-4 text-[0.9rem] text-background font-semibold">— Trimly Blueprint</div>
        </blockquote>
      </div>

      <!-- Cloud Status -->
      <div class="flex justify-between items-end border-t border-background/15 pt-6">
        <div class="flex items-center gap-2 text-[0.85rem] text-background/70">
          <span class="w-2 h-2 bg-[#4ade80] rounded-full shadow-[0_0_0_4px_rgba(74,222,128,0.2)] animate-[pulse_2s_infinite]"></span>
          <span data-i18n="onboarding.cloud_status">Cloud Server: Live & Operational</span>
        </div>
      </div>
    </aside>

    <!-- Right Column: Form Wrapper -->
    <section class="w-full lg:w-[55%] h-full px-6 py-12 bg-background overflow-y-auto flex flex-col before:flex-[1_1_auto] after:flex-[1_1_auto]">
      <div class="w-full max-w-[440px] mx-auto flex-none">
        
        <!-- Top Switcher & Mobile Logo Bar -->
        <div class="flex justify-between items-center mb-6">
          <div class="block lg:hidden font-serif text-[1.5rem] font-semibold text-primary">Trimly<span class="text-accent">.</span></div>
          <div class="ml-auto">
            @include('partials.lang-switcher')
          </div>
        </div>

        <!-- Form Header -->
        <header class="mb-10">
          <h1 data-i18n="onboarding.title" class="font-serif text-[2.25rem] font-medium text-primary mb-2 leading-[1.2]">Studio Onboarding</h1>
          <p data-i18n="onboarding.subtitle" class="text-[0.95rem] text-primary/70">Create your Trimly SaaS workspace and establish your operational terminal.</p>
        </header>

        <!-- Registration Form -->
        <form class="flex flex-col gap-6" id="registerForm" action="{{ route('register') }}" method="POST">
          @csrf
          
          <div class="flex flex-col sm:flex-row gap-6">
            <!-- Nama Barbershop -->
            <div class="flex-1">
              <x-label for="barbershop_name" data-i18n="onboarding.barbershop_name_label">Barbershop Name</x-label>
              <x-input type="text" id="barbershop_name" name="barbershop_name" value="{{ old('barbershop_name') }}" data-i18n-placeholder="onboarding.barbershop_name_placeholder" placeholder="e.g. The Noble Barber" required autocomplete="off" />
              @error('barbershop_name')
                  <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
            </div>

            <!-- Nama Owner -->
            <div class="flex-1">
              <x-label for="owner_name" data-i18n="onboarding.owner_name_label">Owner Name</x-label>
              <x-input type="text" id="owner_name" name="name" value="{{ old('name') }}" data-i18n-placeholder="onboarding.owner_name_placeholder" placeholder="e.g. John Doe" required autocomplete="off" />
              @error('name')
                  <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
            </div>
          </div>

          <!-- Studio Subdomain -->
          <div>
            <x-label for="subdomain" data-i18n="onboarding.subdomain_label">Studio Subdomain</x-label>
            <div class="flex items-center border border-border-medium rounded-sm bg-background transition-colors duration-200 focus-within:border-primary focus-within:ring-1 focus-within:ring-primary">
              <input type="text" id="subdomain" name="subdomain" value="{{ old('subdomain') }}" data-i18n-placeholder="login.subdomain_placeholder" class="w-full px-5 py-4 border-none bg-transparent text-primary text-base focus:outline-none focus:ring-0 placeholder:text-primary/40 rounded-l-sm" placeholder="e.g. thenoble" required autocomplete="off">
              <span class="px-5 py-4 bg-surface text-primary/60 text-[0.95rem] border-l border-border-light rounded-r-sm whitespace-nowrap">.trimly.com</span>
            </div>
          </div>

          <div class="flex flex-col sm:flex-row gap-6">
            <!-- Email Bisnis -->
            <div class="flex-1">
              <x-label for="email" data-i18n="onboarding.email_label">Business Email</x-label>
              <x-input type="email" id="email" name="email" value="{{ old('email') }}" data-i18n-placeholder="onboarding.email_placeholder" placeholder="hello@studio.com" required />
              @error('email')
                  <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
            </div>

            <!-- WhatsApp -->
            <div class="flex-1">
              <x-label for="whatsapp" data-i18n="onboarding.phone_label">WhatsApp Number</x-label>
              <x-input type="tel" id="whatsapp" name="phone_number" value="{{ old('phone_number') }}" data-i18n-placeholder="onboarding.phone_placeholder" placeholder="081234567890" required />
              @error('phone_number')
                  <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
            </div>
          </div>

          <!-- Password -->
          <div>
            <x-label for="password" data-i18n="onboarding.password_label">Admin Password</x-label>
            <div class="relative flex items-center">
              <x-input type="password" id="password" name="password" class="pr-12" placeholder="••••••••" required />
              <button type="button" class="absolute right-4 text-primary/50 hover:text-primary transition-colors duration-200 flex items-center justify-center p-1" id="togglePassword" aria-label="Toggle password visibility">
                <svg id="icon-eye" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                  <circle cx="12" cy="12" r="3"></circle>
                </svg>
                <svg id="icon-eye-off" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="hidden">
                  <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                  <line x1="1" y1="1" x2="23" y2="23"></line>
                </svg>
              </button>
            </div>
            @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
          </div>

          <!-- 14-Day Free Trial Banner -->
          <div class="mt-2 p-5 border border-accent/40 bg-accent/5 rounded-md">
            <p data-i18n="register.trial_banner" class="text-sm text-primary/80 leading-relaxed m-0">
              Your account starts with a <strong class="font-bold">14-day free trial</strong> — full access to every Architect feature, including automated Midtrans DP. No credit card required.
            </p>
          </div>

          <!-- Submit Button -->
          <div class="mt-4">
             <x-button-primary fullWidth="true" type="submit" size="large"><span data-i18n="register.submit_btn">Start My 14-Day Free Trial</span></x-button-primary>
             <p data-i18n="register.trial_subnote" class="text-xs text-primary/50 text-center mt-3">We'll ask you to choose a plan when your trial ends. Cancel anytime, no charge if you don't continue.</p>
          </div>
          
          <div class="text-center mt-6 text-[0.9rem] text-primary/70">
            <span data-i18n="onboarding.has_account">Sudah punya akun?</span> <a href="{{ url('/login') }}" data-i18n="onboarding.login_link" class="text-primary font-semibold hover:underline">Masuk ke Terminal</a>
          </div>

        </form>

        <a href="{{ url('/') }}" class="inline-flex items-center gap-2 mt-12 text-[0.85rem] text-primary/70 hover:text-primary transition-colors duration-200">
          <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
          <span data-i18n="login.back_link">Return to Landing Page</span>
        </a>
      </div>
    </section>

  </main>

  <script>
    // Password Toggle Logic
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const iconEye = document.getElementById('icon-eye');
    const iconEyeOff = document.getElementById('icon-eye-off');

    togglePassword.addEventListener('click', () => {
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);
      
      if (type === 'text') {
        iconEye.classList.add('hidden');
        iconEyeOff.classList.remove('hidden');
      } else {
        iconEye.classList.remove('hidden');
        iconEyeOff.classList.add('hidden');
      }
    });

    // Auto slug generator (optional enhancement for mock)
    const nameInput = document.getElementById('barbershop_name');
    const slugInput = document.getElementById('subdomain');
    
    nameInput.addEventListener('input', function() {
      if(!slugInput.dataset.manual) {
        let slug = this.value.toLowerCase().replace(/[^a-z0-9]/g, '');
        slugInput.value = slug;
      }
    });

    slugInput.addEventListener('input', function() {
      this.dataset.manual = 'true';
    });
  </script>
</body>
</html>
