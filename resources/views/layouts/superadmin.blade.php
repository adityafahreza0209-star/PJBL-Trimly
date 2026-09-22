<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Super Admin Portal - Trimly OS')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Geist:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
  
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <style>
    [x-cloak] { display: none !important; }
  </style>
</head>
<body class="bg-background text-primary font-sans antialiased">

  <div class="flex h-screen overflow-hidden">
    
    <!-- Left Sidebar -->
    <aside class="w-[76px] bg-primary h-screen sticky top-0 flex flex-col justify-between shrink-0 max-sm:w-[57px] z-20">
        <div class="flex flex-col items-center w-full">
            <a class="h-[88px] w-full grid place-items-center no-underline font-serif font-bold text-3xl text-white border-b border-primary/20" href="{{ url('/') }}">T<span class="text-accent">.</span></a>
            <nav class="flex flex-col gap-4 pt-7 w-full items-center">
                <a href="{{ url('/superadmin') }}" class="relative group w-11 h-11 rounded-xl grid place-items-center text-2xl transition-colors {{ request()->is('superadmin') ? 'text-accent bg-accent/10' : 'text-slate-400 hover:text-white hover:bg-white/10' }}" title="Studios Directory">
                    <svg viewBox="0 0 24 24" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    <span class="absolute opacity-0 group-hover:opacity-100 bg-primary text-white text-xs px-2 py-1 rounded shadow-lg left-14 transition-opacity z-50 whitespace-nowrap pointer-events-none">Studios Directory</span>
                </a>
                <a href="{{ url('/superadmin/financial') }}" class="relative group w-11 h-11 rounded-xl grid place-items-center text-2xl transition-colors {{ request()->is('superadmin/financial') ? 'text-accent bg-accent/10' : 'text-slate-400 hover:text-white hover:bg-white/10' }}" title="Financial MRR">
                    <svg viewBox="0 0 24 24" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                    <span class="absolute opacity-0 group-hover:opacity-100 bg-primary text-white text-xs px-2 py-1 rounded shadow-lg left-14 transition-opacity z-50 whitespace-nowrap pointer-events-none">Financial MRR</span>
                </a>
                <a href="{{ url('/superadmin/settings') }}" class="relative group w-11 h-11 rounded-xl grid place-items-center text-2xl transition-colors {{ request()->is('superadmin/settings') ? 'text-accent bg-accent/10' : 'text-slate-400 hover:text-white hover:bg-white/10' }}" title="Platform Settings">
                    <svg viewBox="0 0 24 24" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                    <span class="absolute opacity-0 group-hover:opacity-100 bg-primary text-white text-xs px-2 py-1 rounded shadow-lg left-14 transition-opacity z-50 whitespace-nowrap pointer-events-none">Platform Settings</span>
                </a>
            </nav>
        </div>
        <div class="py-6 flex justify-center w-full">
            <button type="button" onclick="window.dispatchEvent(new CustomEvent('open-logout-modal'))" class="relative group w-9 h-9 rounded-full bg-white text-primary grid place-items-center font-sans font-bold text-base no-underline transition-all hover:ring-2 hover:ring-white/20 hover:scale-105 border-0 cursor-pointer">S
                    <span class="absolute opacity-0 group-hover:opacity-100 bg-primary text-white text-xs px-2 py-1 rounded shadow-lg left-14 transition-opacity z-50 whitespace-nowrap pointer-events-none">Sign Out</span>
                </button>
        </div>
    </aside>

    <div class="flex-1 flex flex-col overflow-hidden relative">
      <!-- Topbar -->
      <header class="flex flex-col sm:flex-row items-start sm:items-center justify-between px-8 py-6 border-b border-border-light bg-surface z-10">
        <div>
          <p class="text-[11px] font-bold tracking-[0.05em] uppercase text-slate-500 mb-1">@yield('eyebrow', 'System Overview')</p>
          <h1 class="text-[24px] font-bold text-slate-900">@yield('page_title', 'Trimly Super Admin')</h1>
        </div>
        
        <div class="mt-4 sm:mt-0">
          @yield('topbar_actions')
        </div>
      </header>

      <div class="flex-1 overflow-y-auto p-8">
        @yield('content')
      </div>
    </div>
  </div>

  @stack('modals')
  @stack('scripts')
  @include('partials.logout-modal')
</body>
</html>
