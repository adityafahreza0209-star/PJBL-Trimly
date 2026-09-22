<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking Confirmed — The Noble Barber | Trimly OS</title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Geist:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&family=JetBrains+Mono:wght@400;600;700&display=swap" rel="stylesheet">
  
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <style>
    @media print {
      body { background: #fff !important; }
      .no-print { display: none !important; }
      .ticket-card { 
        box-shadow: none !important; 
        margin: 0 auto; 
        width: 100% !important; 
        max-width: 480px !important; 
        border: 2px solid #e2e8f0 !important;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
      }
      .outer-card { border: none !important; box-shadow: none !important; padding: 0 !important; }
      .min-h-screen { min-height: auto !important; padding: 0 !important; }
    }
  </style>
</head>
<body class="font-sans text-primary leading-relaxed bg-surface antialiased selection:bg-accent selection:text-white">

  <div class="min-h-screen flex items-center justify-center p-4 sm:p-6">
    <div class="bg-white shadow-xl border border-border-subtle rounded-3xl p-8 sm:p-10 max-w-md w-full text-center relative overflow-hidden outer-card">
      <!-- Decorative Accent Top Line -->
      <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-primary via-accent to-primary no-print"></div>

      <!-- Success Icon -->
      <div class="w-16 h-16 rounded-full bg-primary/10 text-primary flex items-center justify-center mx-auto mb-4 border border-primary/20 shadow-inner">
        <svg viewBox="0 0 24 24" class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
          <polyline points="20 6 9 17 4 12"></polyline>
        </svg>
      </div>

      <!-- Title & Subtitle -->
      <h1 class="text-2xl sm:text-3xl font-serif font-bold text-primary">Booking Confirmed!</h1>
      <p class="text-sm text-slate-500 mt-2">Your appointment has been secured.</p>

      <!-- Guest Tracking Ticket Box -->
      <div class="bg-slate-50 border-2 border-dashed border-slate-200 rounded-2xl p-6 my-6 text-left relative ticket-card">
        <div class="flex items-center justify-between pb-3 border-b border-slate-200/80 mb-3">
          <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Order Reference</span>
          <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold bg-emerald-100 text-emerald-800 border border-emerald-200">
            DP Paid (QRIS)
          </span>
        </div>

        <div class="text-center py-2">
          <span class="text-xs text-slate-500 uppercase tracking-widest font-semibold block mb-1">Booking Code</span>
          <span class="text-3xl font-mono font-bold text-accent tracking-wider select-all">{{ $booking->booking_code }}</span>
        </div>

        <div class="mt-4 pt-4 border-t border-slate-200/80 space-y-2 text-xs">
          <div class="flex justify-between">
            <span class="text-slate-500">Studio</span>
            <span class="font-semibold text-primary">{{ $booking->barbershop->name }}</span>
          </div>
          <div class="flex justify-between">
            <span class="text-slate-500">Capster</span>
            <span class="font-semibold text-primary">{{ $booking->capster ? $booking->capster->user->name : 'Any Available' }}</span>
          </div>
          <div class="flex justify-between">
            <span class="text-slate-500">Service</span>
            <span class="font-semibold text-primary">{{ $booking->service->name }}</span>
          </div>
          <div class="flex justify-between">
            <span class="text-slate-500">Schedule</span>
            <span class="font-semibold text-primary">{{ \Carbon\Carbon::parse($booking->booking_date)->format('D, d M') }} • {{ \Carbon\Carbon::parse($booking->start_time)->format('H:i') }} WIB</span>
          </div>
        </div>
      </div>

      <!-- Instructions -->
      <p class="text-xs text-slate-500 mb-6 leading-relaxed no-print">
        Save this booking code. You can use it to track your queue or present it to the receptionist upon arrival—no login required.
      </p>

      <!-- Action Buttons -->
      <div class="space-y-3 no-print">
        <button type="button" onclick="window.print()" class="w-full bg-primary hover:bg-[#c55b34] text-white py-3.5 text-sm rounded-xl font-semibold shadow-sm flex items-center justify-center transition-colors">
          <svg viewBox="0 0 24 24" class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
            <polyline points="7 10 12 15 17 10"></polyline>
            <line x1="12" y1="15" x2="12" y2="3"></line>
          </svg>
          Download / Print Ticket
        </button>

        <div class="flex items-center justify-between gap-2 pt-2">
            <a href="{{ url('/') }}" class="inline-flex items-center justify-center gap-1.5 text-xs font-semibold text-slate-500 hover:text-primary transition-colors py-2 flex-1">
              <span>&larr;</span> Homepage
            </a>
            <span class="text-slate-300">|</span>
            <a href="{{ url('/ticket') }}?code={{ $booking->booking_code }}" class="inline-flex items-center justify-center gap-1.5 text-xs font-semibold text-primary hover:text-accent transition-colors py-2 flex-1">
              Live Dashboard <span>&rarr;</span>
            </a>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
