<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reviews - Trimly</title>
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
          <a href="{{ url('reviews') }}" class="relative group w-11 h-11 rounded-xl grid place-items-center text-accent bg-accent/10 no-underline text-2xl transition-colors hover:text-accent/80 hover:bg-accent/20">
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
          <p class="m-0 mb-1 text-[11px] font-bold tracking-[0.05em] uppercase text-slate-500">CUSTOMER FEEDBACK</p>
          <h1 class="m-0 text-[24px] font-bold text-slate-900">Reviews</h1>
        </div>
        <div class="flex items-center gap-4">
          
          <x-button-outline size="normal" href="{{ url('login') }}" class="max-sm:text-xs max-sm:px-3">Sign Out</x-button-outline>
        </div>
      </header>

      <!-- Main Canvas -->
      <main class="max-w-[1040px] w-full mx-auto p-6 lg:p-8">
        
        <!-- Summary & Filters -->
        <div class="flex flex-col sm:flex-row gap-6 mb-8 items-start sm:items-end justify-between">
          <div class="flex items-center gap-6">
            <div class="bg-white rounded-2xl border border-border-subtle p-5 shadow-sm min-w-[160px]">
              <p class="m-0 text-[11px] font-bold tracking-[0.05em] uppercase text-slate-500 mb-1">Average Rating</p>
              <div class="flex items-end gap-2">
                <span class="text-[32px] font-bold text-slate-900 leading-none">4.8</span>
                <span class="text-amber-400 text-xl mb-1"><svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></span>
              </div>
            </div>
            <div class="bg-white rounded-2xl border border-border-subtle p-5 shadow-sm min-w-[160px]">
              <p class="m-0 text-[11px] font-bold tracking-[0.05em] uppercase text-slate-500 mb-1">Total Reviews</p>
              <div class="text-[32px] font-bold text-slate-900 leading-none">124</div>
            </div>
          </div>
          
          <div class="flex gap-4 w-full sm:w-auto">
            <select class="bg-white border border-border-light rounded-lg px-3 py-2.5 text-[14px] text-slate-700 outline-none focus:border-primary shadow-sm w-full sm:w-auto">
              <option value="">All Ratings</option>
              <option value="5">5 Stars</option>
              <option value="4">4 Stars</option>
              <option value="3">3 Stars</option>
              <option value="2">2 Stars</option>
              <option value="1">1 Star</option>
            </select>
            <select class="bg-white border border-border-light rounded-lg px-3 py-2.5 text-[14px] text-slate-700 outline-none focus:border-primary shadow-sm w-full sm:w-auto">
              <option value="">All Capsters</option>
              <option value="1">Fajar Pratama</option>
              <option value="2">Rendra Kusuma</option>
            </select>
          </div>
        </div>

        <!-- Review List -->
        <div class="flex flex-col gap-4">
          
          <!-- Review Card 1 -->
          <div class="bg-white rounded-xl border border-border-subtle p-6 shadow-sm hover:shadow-md transition-shadow relative group" x-data="{ isHidden: false }">
            <div class="absolute top-6 right-6 flex flex-col items-end gap-1.5 opacity-0 group-hover:opacity-100 transition-opacity">
              <label class="flex items-center gap-2 cursor-pointer">
                <span class="text-[12px] font-medium text-slate-500">Hide from public</span>
                <div class="relative inline-block w-8 h-4">
                  <input type="checkbox" class="peer sr-only" x-model="isHidden">
                  <span class="absolute inset-0 bg-slate-200 rounded-full transition-colors peer-checked:bg-rose-500"></span>
                  <span class="absolute left-0.5 bottom-0.5 w-3 h-3 bg-white rounded-full transition-transform peer-checked:translate-x-4 shadow-sm"></span>
                </div>
              </label>
            </div>
            
            <div class="flex gap-4">
              <div class="w-10 h-10 rounded-full bg-slate-200 grid place-items-center text-slate-600 font-bold shrink-0">B</div>
              <div class="flex-1">
                <div class="flex items-center gap-2 mb-1" :class="isHidden ? 'opacity-50' : ''">
                  <h3 class="m-0 text-[16px] font-semibold text-slate-900">Budi Santoso</h3>
                  <span class="text-[12px] text-slate-400">· 2 days ago</span>
                </div>
                <div class="flex items-center gap-1 mb-3 text-amber-400 text-[14px]" :class="isHidden ? 'opacity-50' : ''">
                  <span><svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></span><span><svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></span><span><svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></span><span><svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></span><span><svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></span>
                </div>
                <p class="m-0 text-[14px] text-slate-700 leading-relaxed max-w-3xl" :class="isHidden ? 'text-slate-400 line-through' : ''">Potongan sangat rapi dan pelayanannya mantap. Tempat juga bersih dan nyaman. Pasti bakal balik lagi.</p>
                <div class="mt-4 pt-4 border-t border-slate-100 flex items-center gap-2 text-[12px] text-slate-500">
                  <span>Serviced by <strong class="text-slate-700">Fajar Pratama</strong></span>
                </div>
              </div>
            </div>
            <div x-show="isHidden" x-cloak class="absolute inset-0 bg-white/60 backdrop-blur-[1px] rounded-xl pointer-events-none flex items-center justify-center">
              <span class="bg-rose-100 text-rose-700 px-3 py-1 rounded-full text-[12px] font-bold">HIDDEN</span>
            </div>
          </div>

          <!-- Review Card 2 -->
          <div class="bg-white rounded-xl border border-border-subtle p-6 shadow-sm hover:shadow-md transition-shadow relative group" x-data="{ isHidden: false }">
            <div class="absolute top-6 right-6 flex flex-col items-end gap-1.5 opacity-0 group-hover:opacity-100 transition-opacity">
              <label class="flex items-center gap-2 cursor-pointer">
                <span class="text-[12px] font-medium text-slate-500">Hide from public</span>
                <div class="relative inline-block w-8 h-4">
                  <input type="checkbox" class="peer sr-only" x-model="isHidden">
                  <span class="absolute inset-0 bg-slate-200 rounded-full transition-colors peer-checked:bg-rose-500"></span>
                  <span class="absolute left-0.5 bottom-0.5 w-3 h-3 bg-white rounded-full transition-transform peer-checked:translate-x-4 shadow-sm"></span>
                </div>
              </label>
            </div>
            
            <div class="flex gap-4">
              <div class="w-10 h-10 rounded-full bg-slate-200 grid place-items-center text-slate-600 font-bold shrink-0">A</div>
              <div class="flex-1">
                <div class="flex items-center gap-2 mb-1" :class="isHidden ? 'opacity-50' : ''">
                  <h3 class="m-0 text-[16px] font-semibold text-slate-900">Andi Saputra</h3>
                  <span class="text-[12px] text-slate-400">· 5 days ago</span>
                </div>
                <div class="flex items-center gap-1 mb-3 text-[14px]" :class="isHidden ? 'opacity-50' : ''">
                  <span class="text-amber-400"><svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></span><span class="text-amber-400"><svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></span><span class="text-amber-400"><svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></span><span class="text-slate-200"><svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></span><span class="text-slate-200"><svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></span>
                </div>
                <p class="m-0 text-[14px] text-slate-700 leading-relaxed max-w-3xl" :class="isHidden ? 'text-slate-400 line-through' : ''">Lumayan, tapi agak molor jadwalnya 15 menit dari booking. Hasil potongan oke lah.</p>
                <div class="mt-4 pt-4 border-t border-slate-100 flex items-center gap-2 text-[12px] text-slate-500">
                  <span>Serviced by <strong class="text-slate-700">Rendra Kusuma</strong></span>
                </div>
              </div>
            </div>
            <div x-show="isHidden" x-cloak class="absolute inset-0 bg-white/60 backdrop-blur-[1px] rounded-xl pointer-events-none flex items-center justify-center">
              <span class="bg-rose-100 text-rose-700 px-3 py-1 rounded-full text-[12px] font-bold">HIDDEN</span>
            </div>
          </div>

          <!-- Empty state -->
          <div class="hidden flex-col items-center justify-center p-12 text-center bg-white rounded-xl border border-border-light border-dashed">
            <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mb-4">
              <span class="text-slate-400 text-2xl"><svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></span>
            </div>
            <h3 class="text-[18px] font-semibold text-slate-900 mb-1">No reviews yet</h3>
            <p class="text-[14px] text-slate-500">Customers haven't left any reviews for the selected filters.</p>
          </div>

        </div>

      </main>
    </div>
  </div>
</body>
</html>
