<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payments - Trimly</title>
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
          <a href="{{ url('payments') }}" class="relative group w-11 h-11 rounded-xl grid place-items-center text-accent bg-accent/10 no-underline text-2xl transition-colors hover:text-accent/80 hover:bg-accent/20">
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
          <p class="m-0 mb-1 text-[11px] font-bold tracking-[0.05em] uppercase text-slate-500">FINANCE</p>
          <h1 class="m-0 text-[24px] font-bold text-slate-900">Payments</h1>
        </div>
        <div class="flex items-center gap-4">
          
          <x-button-outline size="normal" href="{{ url('login') }}" class="max-sm:text-xs max-sm:px-3">Sign Out</x-button-outline>
        </div>
      </header>

      <!-- Main Canvas -->
      <main class="max-w-[1040px] w-full mx-auto p-6 lg:p-8" x-data="{ showValidateModal: false, selectedBooking: '' }">
        
        <!-- Summary Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
          <div class="bg-white rounded-2xl border border-border-subtle p-5 shadow-sm">
            <p class="m-0 text-[11px] font-bold tracking-[0.05em] uppercase text-slate-500 mb-2">Total Pending Validation</p>
            <div class="text-[28px] font-bold text-amber-500">Rp 450.000</div>
          </div>
          <div class="bg-white rounded-2xl border border-border-subtle p-5 shadow-sm">
            <p class="m-0 text-[11px] font-bold tracking-[0.05em] uppercase text-slate-500 mb-2">Total Revenue Today</p>
            <div class="text-[28px] font-bold text-slate-900">Rp 1.250.000</div>
          </div>
        </div>

        <!-- Filters -->
        <div class="bg-white p-4 rounded-xl border border-border-light mb-6 flex flex-wrap gap-4 items-center justify-between">
          <div class="flex flex-wrap gap-4 items-center">
            <input type="date" class="bg-surface border border-border-light rounded-lg px-3 py-2 text-sm text-slate-700 outline-none focus:border-primary">
            <select class="bg-surface border border-border-light rounded-lg px-3 py-2 text-sm text-slate-700 outline-none focus:border-primary">
              <option value="">Status: All</option>
              <option value="pending">Pending</option>
              <option value="paid">Paid</option>
              <option value="failed">Failed</option>
            </select>
            <select class="bg-surface border border-border-light rounded-lg px-3 py-2 text-sm text-slate-700 outline-none focus:border-primary">
              <option value="">Type: All</option>
              <option value="dp">DP (Down Payment)</option>
              <option value="pelunasan">Pelunasan</option>
            </select>
            <select class="bg-surface border border-border-light rounded-lg px-3 py-2 text-sm text-slate-700 outline-none focus:border-primary">
              <option value="">Method: All</option>
              <option value="midtrans">Midtrans</option>
              <option value="cash">Cash</option>
              <option value="qris">QRIS Static</option>
            </select>
          </div>
          <x-button-outline size="normal" class="text-sm shadow-sm py-2 px-4">Export CSV</x-button-outline>
        </div>

        <!-- Data Table -->
        <div class="bg-white border border-border-light rounded-2xl overflow-hidden shadow-sm">
          <div class="overflow-x-auto">
            <table class="w-full text-left whitespace-nowrap">
              <thead class="bg-slate-50 border-b border-border-light">
                <tr>
                  <th class="px-6 py-4 text-[12px] font-bold text-slate-500 uppercase tracking-wider">Booking ID</th>
                  <th class="px-6 py-4 text-[12px] font-bold text-slate-500 uppercase tracking-wider">Customer & Capster</th>
                  <th class="px-6 py-4 text-[12px] font-bold text-slate-500 uppercase tracking-wider">Type & Method</th>
                  <th class="px-6 py-4 text-[12px] font-bold text-slate-500 uppercase tracking-wider text-right">Nominal</th>
                  <th class="px-6 py-4 text-[12px] font-bold text-slate-500 uppercase tracking-wider">Status</th>
                  <th class="px-6 py-4 text-[12px] font-bold text-slate-500 uppercase tracking-wider">Time</th>
                  <th class="px-6 py-4 text-[12px] font-bold text-slate-500 uppercase tracking-wider text-center">Action</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-border-light text-[14px]">
                
                <!-- Row 1 -->
                <tr class="hover:bg-slate-50 transition-colors">
                  <td class="px-6 py-4 text-slate-900 font-medium">#TRM-8821</td>
                  <td class="px-6 py-4">
                    <div class="font-semibold text-slate-900">Budi Santoso</div>
                    <div class="text-xs text-slate-500">with Fajar P.</div>
                  </td>
                  <td class="px-6 py-4">
                    <div class="flex items-center gap-2 mb-1">
                      <span class="bg-slate-100 text-slate-600 text-[10px] font-bold px-2 py-0.5 rounded uppercase">DP</span>
                    </div>
                    <div class="text-xs text-slate-500">Midtrans</div>
                  </td>
                  <td class="px-6 py-4 text-right font-semibold text-slate-900">Rp 50.000</td>
                  <td class="px-6 py-4">
                    <span class="bg-emerald-100 text-emerald-800 text-[11px] font-bold px-2.5 py-1 rounded-full inline-flex items-center gap-1.5">
                      <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Paid
                    </span>
                  </td>
                  <td class="px-6 py-4 text-slate-500 text-sm">Today, 09:15</td>
                  <td class="px-6 py-4 text-center">
                    <button class="text-slate-400 hover:text-slate-600 px-2 py-1 bg-transparent border-0 cursor-pointer">...</button>
                  </td>
                </tr>

                <!-- Row 2 -->
                <tr class="hover:bg-slate-50 transition-colors">
                  <td class="px-6 py-4 text-slate-900 font-medium">#TRM-8821</td>
                  <td class="px-6 py-4">
                    <div class="font-semibold text-slate-900">Budi Santoso</div>
                    <div class="text-xs text-slate-500">with Fajar P.</div>
                  </td>
                  <td class="px-6 py-4">
                    <div class="flex items-center gap-2 mb-1">
                      <span class="bg-primary text-white text-[10px] font-bold px-2 py-0.5 rounded uppercase">Pelunasan</span>
                    </div>
                    <div class="text-xs text-slate-500">Cash</div>
                  </td>
                  <td class="px-6 py-4 text-right font-semibold text-slate-900">Rp 100.000</td>
                  <td class="px-6 py-4">
                    <span class="bg-amber-100 text-amber-800 text-[11px] font-bold px-2.5 py-1 rounded-full inline-flex items-center gap-1.5">
                      <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Pending
                    </span>
                  </td>
                  <td class="px-6 py-4 text-slate-500 text-sm">Today, 10:10</td>
                  <td class="px-6 py-4 text-center">
                    <button @click="showValidateModal = true; selectedBooking = '#TRM-8821'" class="bg-white border border-amber-300 text-amber-600 hover:bg-amber-50 font-semibold text-[12px] px-3 py-1.5 rounded-md cursor-pointer transition-colors shadow-sm">Validate</button>
                  </td>
                </tr>

                <!-- Row 3 -->
                <tr class="hover:bg-slate-50 transition-colors">
                  <td class="px-6 py-4 text-slate-900 font-medium">#TRM-8822</td>
                  <td class="px-6 py-4">
                    <div class="font-semibold text-slate-900">Andi Saputra</div>
                    <div class="text-xs text-slate-500">with Rendra K.</div>
                  </td>
                  <td class="px-6 py-4">
                    <div class="flex items-center gap-2 mb-1">
                      <span class="bg-slate-100 text-slate-600 text-[10px] font-bold px-2 py-0.5 rounded uppercase">Full</span>
                    </div>
                    <div class="text-xs text-slate-500">QRIS Static</div>
                  </td>
                  <td class="px-6 py-4 text-right font-semibold text-slate-900">Rp 150.000</td>
                  <td class="px-6 py-4">
                    <span class="bg-amber-100 text-amber-800 text-[11px] font-bold px-2.5 py-1 rounded-full inline-flex items-center gap-1.5">
                      <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Pending
                    </span>
                  </td>
                  <td class="px-6 py-4 text-slate-500 text-sm">Today, 10:30</td>
                  <td class="px-6 py-4 text-center">
                    <button @click="showValidateModal = true; selectedBooking = '#TRM-8822'" class="bg-white border border-amber-300 text-amber-600 hover:bg-amber-50 font-semibold text-[12px] px-3 py-1.5 rounded-md cursor-pointer transition-colors shadow-sm">Validate</button>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>
          
          <!-- Empty State (hidden normally) -->
          <div class="hidden flex-col items-center justify-center p-12 text-center">
            <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mb-4">
              <span class="text-slate-400 text-2xl"><svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg></span>
            </div>
            <h3 class="text-[18px] font-semibold text-slate-900 mb-1">No payments found</h3>
            <p class="text-[14px] text-slate-500">Try adjusting your filters or date range.</p>
          </div>
        </div>

        <!-- Validation Modal -->
        <div x-show="showValidateModal" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             x-cloak
             class="fixed inset-0 bg-black/50 backdrop-blur-xs grid place-items-center p-5 z-50">
          
          <div @click.away="showValidateModal = false"
               x-show="showValidateModal"
               x-transition:enter="transition ease-out duration-200"
               x-transition:enter-start="opacity-0 scale-95 translate-y-2"
               x-transition:enter-end="opacity-100 scale-100 translate-y-0"
               x-transition:leave="transition ease-in duration-150"
               x-transition:leave-start="opacity-100 scale-100 translate-y-0"
               x-transition:leave-end="opacity-0 scale-95 translate-y-2"
               class="w-full max-w-[400px] bg-white rounded-2xl shadow-2xl border border-border-subtle overflow-hidden">
            
            <div class="p-6">
              <h2 class="m-0 font-display font-semibold text-[20px] mb-2">Confirm Payment?</h2>
              <p class="m-0 text-[14px] text-slate-500">Are you sure you have received the payment for booking <strong x-text="selectedBooking" class="text-slate-900"></strong>? This action cannot be undone.</p>
            </div>

            <div class="flex justify-end gap-3 p-4 bg-slate-50 border-t border-border-light">
              <button type="button" @click="showValidateModal = false" class="text-[14px] font-semibold text-slate-600 bg-transparent border border-slate-300 hover:bg-slate-100 px-4 py-2 rounded-lg cursor-pointer transition-colors">Cancel</button>
              <x-button-primary size="normal" @click="showValidateModal = false" class="text-[14px] px-4 py-2">Confirm Received</x-button-primary>
            </div>
          </div>
        </div>

      </main>
    </div>
  </div>
</body>
</html>
