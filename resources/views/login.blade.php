<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>Studio Sign In — Trimly OS</title>
  
  <!-- Google Fonts: Playfair Display (Serif), Geist (Sans-serif) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Geist:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
  
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="w-full h-screen font-sans bg-background text-primary leading-relaxed antialiased overflow-hidden">

  <main class="flex w-full h-full">
    
    <!-- Left Column: Visual Showcase (Hidden on Mobile) -->
    <aside class="hidden lg:flex flex-col justify-between w-[45%] h-full bg-primary text-background px-16 py-12">
      <div class="visual-content">
        
        <!-- Logo -->
        <a href="{{ url('/') }}" class="inline-block font-serif text-[1.75rem] font-semibold text-background mb-16">
          Trimly<span class="text-accent">.</span>
        </a>
        
        <!-- Headline -->
        <h1 data-i18n="login.tagline" class="font-serif text-[3rem] font-normal leading-tight mb-12 max-w-[90%]">The Dedicated Terminal for Premier Barbershop Operators</h1>
        
        <!-- Quote -->
        <blockquote class="text-[1.1rem] leading-[1.6] text-background/80 max-w-[85%] border-l-2 border-accent pl-6">
          <span data-i18n="login.quote">"Mastery is found in the details of the craft, and precision is amplified by the system that supports it."</span>
          <div data-i18n="login.quote_author" class="mt-4 text-[0.9rem] font-bold text-background">— The Artisan's Code</div>
        </blockquote>
      </div>

      <!-- Cloud Status -->
      <div class="flex justify-between items-end border-t border-background/15 pt-6">
        <div class="flex items-center gap-2 text-[0.85rem] text-background/70">
          <span class="w-2 h-2 bg-[#4ade80] rounded-full shadow-[0_0_0_4px_rgba(74,222,128,0.2)] animate-pulse"></span>
          <span data-i18n="login.cloud_status">Cloud Server: Live & Operational</span>
        </div>
      </div>
    </aside>

    <!-- Right Column: Form Wrapper -->
    <section class="w-full lg:w-[55%] h-full py-12 px-6 bg-background overflow-y-auto flex flex-col before:content-[''] before:flex-auto after:content-[''] after:flex-auto">
      <div class="w-full max-w-[440px] mx-auto flex-none">
        
        <!-- Top Switcher & Mobile Logo Bar -->
        <div class="flex justify-between items-center mb-6">
          <div class="block lg:hidden font-serif text-2xl font-semibold">Trimly<span class="text-primary">.</span></div>
          <div class="ml-auto">
            @include('partials.lang-switcher')
          </div>
        </div>

        <!-- Form Header -->
        <header class="mb-10">
          <h1 data-i18n="login.title" class="font-serif text-[2.25rem] font-medium text-primary mb-2 leading-[1.2]">Studio Sign In</h1>
          <p data-i18n="login.subtitle" class="text-[0.95rem] text-primary/70 mb-10">Enter your studio credentials to access the operation terminal and manage your appointments.</p>
        </header>

        <!-- Login Form -->
        <form class="flex flex-col gap-6" id="authForm" action="{{ route('login') }}" method="POST">
          @csrf
          
          <!-- Input 1: Studio Subdomain -->
          <div class="flex flex-col gap-2">
            <x-label for="subdomain" data-i18n="login.subdomain_label" class="font-bold text-[0.85rem] text-primary">Studio Subdomain</x-label>
            <div class="flex items-center border border-border-medium rounded bg-background focus-within:border-primary focus-within:ring-1 focus-within:ring-primary transition-colors duration-200">
              <input type="text" id="subdomain" name="subdomain" data-i18n-placeholder="login.subdomain_placeholder" class="w-full p-4 border-none shadow-none rounded-r-none bg-transparent focus:ring-0 focus:outline-none placeholder:text-primary/40 text-primary" placeholder="e.g. thenoble" autocomplete="off" />
              <span class="p-4 bg-surface text-primary/60 text-[0.95rem] border-l border-border-light rounded-r whitespace-nowrap">.trimly.com</span>
            </div>
          </div>

          <!-- Input 2: Email or WA -->
          <div class="flex flex-col gap-2">
            <x-label for="userId" data-i18n="login.user_label">Email or WhatsApp Number</x-label>
            <x-input type="text" id="userId" name="email" value="{{ old('email') }}" data-i18n-placeholder="login.user_placeholder" placeholder="admin@studio.com or 0812..." required />
            @error('email')
              <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
          </div>

          <!-- Input 3: Password -->
          <div class="flex flex-col gap-2">
            <x-label for="password" data-i18n="login.password_label">Password</x-label>
            <div class="relative flex items-center">
              <x-input type="password" id="password" name="password" class="w-full p-4 pr-12 border border-border-medium rounded bg-background focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors duration-200" placeholder="••••••••" required />
              <button type="button" class="absolute right-4 text-primary/50 hover:text-primary focus:text-primary transition-colors duration-200 p-1 flex items-center justify-center focus:outline-none" id="togglePassword" aria-label="Toggle password visibility">
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
          </div>

          <!-- Controls Row -->
          <div class="flex justify-between items-center -mt-2">
            <label class="flex items-center gap-2 cursor-pointer text-[0.85rem] select-none text-primary">
              <input type="checkbox" name="remember" id="remember" class="peer hidden">
              <span class="w-[18px] h-[18px] border border-border-medium rounded-[3px] flex items-center justify-center transition-all duration-200 peer-checked:bg-primary peer-checked:border-primary relative after:content-[''] after:hidden peer-checked:after:block after:w-1 after:h-2 after:border-solid after:border-background after:border-b-2 after:border-r-2 after:rotate-45 after:-translate-y-[1px]"></span>
              <span data-i18n="login.remember_me">Remember this device</span>
            </label>
            <a href="#" data-i18n="login.forgot_password" class="text-[0.85rem] text-primary font-medium hover:underline transition-colors duration-200">Forgot password?</a>
          </div>

          <!-- Submit Button -->
          <div class="mt-4">
            <x-button-accent size="large" fullWidth="true" type="submit"><span data-i18n="login.submit_btn">Sign In to Terminal</span></x-button-accent>
          </div>
          
          <!-- Micro Note -->
          <p class="flex items-start gap-2 text-[0.75rem] text-primary/60 bg-surface p-3 rounded border border-border-light">
            <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="shrink-0 mt-[2px]"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
            <span data-i18n="login.capster_note">Akun Capster dikelola dan dibuat langsung oleh Admin Barbershop.</span>
          </p>
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

    const userIdInput = document.getElementById('userId');

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
  </script>
</body>
</html>
