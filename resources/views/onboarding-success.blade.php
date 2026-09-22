<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Terminal Initialized — Trimly OS</title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Geist:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
  
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-surface text-primary font-sans antialiased min-h-screen flex items-center justify-center p-6">

  <div class="w-full max-w-lg flex flex-col items-center">
    
    <!-- Trimly Logo -->
    <a href="{{ url('/') }}" class="inline-block font-serif text-2xl font-bold text-primary mb-8 no-underline tracking-tight">
      Trimly<span class="text-accent">.</span>
    </a>

    <!-- Success Card -->
    <div class="w-full bg-white p-8 sm:p-10 rounded-3xl shadow-lg border border-border-subtle text-center">
      
      <!-- Elegant Success Icon -->
      <div class="w-16 h-16 rounded-full bg-primary/10 text-primary flex items-center justify-center mx-auto mb-6 ring-8 ring-primary/5">
        <svg class="w-8 h-8 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
          <polyline points="20 6 9 17 4 12"></polyline>
        </svg>
      </div>

      <!-- Heading -->
      <h1 class="text-2xl sm:text-3xl font-serif text-primary font-bold tracking-tight mb-2">
        Terminal Initialized Successfully
      </h1>

      @php
        $isEssential = ($barbershop->paket_dipilih ?? '') === 'essential';
        $planName = $isEssential ? 'Essential' : 'Architect';
        $planBadge = $isEssential ? 'Starter Tier' : 'Pro Tier';
        $planPrice = $isEssential ? 'Rp 239.000' : 'Rp 559.000';
      @endphp

      <!-- Description -->
      <p class="text-sm text-gray-500 leading-relaxed max-w-sm mx-auto mb-6">
        Your Trimly workspace for <strong class="text-primary font-semibold">"{{ $barbershop->name }}"</strong> has been created and is ready for deployment.
      </p>

      <!-- Next Steps / Payment Mockup Box -->
      <div class="bg-slate-50 p-4 rounded-xl text-left border border-slate-100">
        <div class="flex justify-between items-center">
          <div>
            <span class="text-[11px] uppercase tracking-wider font-semibold text-gray-400 block mb-0.5">Selected Plan</span>
            <span class="text-sm font-bold text-primary flex items-center gap-2">
              {{ $planName }}
              <span class="text-[10px] font-semibold bg-accent/10 text-accent px-2 py-0.5 rounded-full">{{ $planBadge }}</span>
            </span>
          </div>
          <div class="text-right">
            <span class="text-base font-bold text-primary">{{ $planPrice }}</span>
            <span class="text-xs text-gray-500 font-normal block">/ mo</span>
          </div>
        </div>

        <div class="mt-3 pt-3 border-t border-slate-200/60 flex items-center gap-2 text-xs text-gray-500">
          <svg class="w-4 h-4 text-accent shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"></circle>
            <line x1="12" y1="16" x2="12" y2="12"></line>
            <line x1="12" y1="8" x2="12.01" y2="8"></line>
          </svg>
          @if (($barbershop->subscription_status ?? '') === 'trial')
            <span>You are currently on a <strong class="text-gray-700">14-day free trial</strong>. Your free trial ends on <strong class="text-primary">{{ $barbershop->trial_berakhir_pada ? $barbershop->trial_berakhir_pada->format('F j, Y') : '-' }}</strong>. No payment is required today.</span>
          @else
            <span>Your subscription is now active.</span>
          @endif
        </div>
      </div>

      <!-- Call To Action -->
      <div class="mt-8">
        <x-button-primary fullWidth="true" href="{{ url('/dashboard') }}" class="py-3.5 text-sm justify-center shadow-md">
          Enter Admin Dashboard <span class="text-base ml-1 leading-none">&rarr;</span>
        </x-button-primary>
      </div>

      <!-- Subtle Support Link -->
      <p class="text-xs text-gray-400 mt-5 mb-0">
        Need help setting up your team? <a href="{{ url('/admin-settings') }}" class="text-primary hover:underline font-medium">Read Setup Guide</a>
      </p>

    </div>

    <!-- Quick Footer Note -->
    <div class="mt-8 text-center text-xs text-gray-400">
      &copy; {{ date('Y') }} Trimly OS. Enterprise Barbershop Infrastructure.
    </div>

  </div>

</body>
</html>
