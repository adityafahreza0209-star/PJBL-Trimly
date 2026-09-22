<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Leave Requests - Trimly</title>
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
          <a href="{{ url('leave-requests') }}" class="relative group w-11 h-11 rounded-xl grid place-items-center text-accent bg-accent/10 no-underline text-2xl transition-colors hover:text-accent/80 hover:bg-accent/20">
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
          <p class="m-0 mb-1 text-[11px] font-bold tracking-[0.05em] uppercase text-slate-500">STAFF MANAGEMENT</p>
          <h1 class="m-0 text-[24px] font-bold text-slate-900">Leave Requests</h1>
        </div>
        <div class="flex items-center gap-4">
          
          <x-button-outline type="button" size="normal" class="max-sm:text-xs max-sm:px-3" onclick="window.dispatchEvent(new CustomEvent('open-logout-modal'))">Sign Out</x-button-outline>
        </div>
      </header>

      <!-- Main Canvas -->
      <main class="max-w-[1040px] w-full mx-auto p-6 lg:p-8" x-data="{ activeTab: 'pending' }">
        
        <!-- Tabs -->
        <div class="flex gap-8 border-b border-border-light mb-8 relative">
          <button type="button" 
                  @click="activeTab = 'pending'" 
                  :class="activeTab === 'pending' ? 'border-b-2 border-primary text-slate-900 font-bold' : 'text-slate-500 font-medium hover:text-slate-900'"
                  class="bg-transparent border-0 pb-4 text-sm cursor-pointer relative transition-colors">
            Pending <span class="ml-1 bg-amber-100 text-amber-800 text-[10px] font-bold px-1.5 py-0.5 rounded-full">{{ $pendingLeaves->count() }}</span>
          </button>
          <button type="button" 
                  @click="activeTab = 'history'" 
                  :class="activeTab === 'history' ? 'border-b-2 border-primary text-slate-900 font-bold' : 'text-slate-500 font-medium hover:text-slate-900'"
                  class="bg-transparent border-0 pb-4 text-sm cursor-pointer relative transition-colors">
            History
          </button>
        </div>

        <!-- Tab 1: Pending -->
        <section x-show="activeTab === 'pending'" x-cloak class="transition-all duration-200">
          <div class="flex flex-col gap-4">
            @forelse($pendingLeaves as $leave)
              @php
                $name = $leave->capster->user->name ?? 'Capster';
                $words = explode(' ', trim($name));
                $initials = '';
                foreach (array_slice($words, 0, 2) as $w) {
                  $initials .= mb_substr($w, 0, 1);
                }
                $initials = strtoupper($initials ?: 'C');

                $categoryMap = [
                  'sakit' => 'Sakit',
                  'mendesak' => 'Urusan Mendesak',
                  'keluarga' => 'Keperluan Keluarga',
                ];
                $categoryText = $categoryMap[$leave->category] ?? ucfirst($leave->category ?? 'Izin');

                $isSameDate = $leave->start_date->format('Y-m-d') === $leave->end_date->format('Y-m-d');
                $dateText = $isSameDate
                  ? $leave->start_date->translatedFormat('d M Y')
                  : $leave->start_date->translatedFormat('d M') . ' - ' . $leave->end_date->translatedFormat('d M Y');
              @endphp
              <x-card padding="normal" class="p-6 bg-white flex items-start sm:items-center justify-between flex-col sm:flex-row gap-6 hover:shadow-md transition-shadow border-l-4 border-l-amber-400">
                <div class="flex items-start sm:items-center gap-4">
                  <div class="w-12 h-12 rounded-full bg-amber-100 text-amber-800 grid place-items-center font-bold text-sm shrink-0">{{ $initials }}</div>
                  <div>
                    <h3 class="m-0 mb-1 text-[16px] font-semibold text-slate-900">{{ $name }}</h3>
                    <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4 text-[14px] text-slate-500">
                      <span class="flex items-center gap-1.5">
                        <span class="w-4 h-4 text-slate-400 grid place-items-center">
                          <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        </span>
                        {{ $dateText }}
                      </span>
                      <span class="hidden sm:inline text-slate-300">|</span>
                      <span>{{ $categoryText }}{{ !empty($leave->reason) ? ' | ' . $leave->reason : '' }}</span>
                    </div>
                    @if($leave->has_active_booking_conflict)
                      <div class="mt-2 text-[12px] bg-rose-50 text-rose-700 font-medium px-2.5 py-1 rounded-md inline-flex items-center gap-1.5 border border-rose-100">
                        <span>
                          <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                          {{ $leave->conflict_count ?? 1 }} active bookings conflict
                        </span>
                      </div>
                    @endif
                  </div>
                </div>
                <div class="flex items-center gap-3 w-full sm:w-auto">
                  <button type="button" onclick="processLeave({{ $leave->id }}, 'reject')" class="w-full sm:w-auto bg-transparent border border-rose-200 text-rose-600 hover:bg-rose-50 hover:border-rose-300 font-semibold text-sm py-2 px-4 rounded-lg cursor-pointer transition-colors">Reject</button>
                  <x-button-accent size="normal" type="button" onclick="processLeave({{ $leave->id }}, 'approve')" class="w-full sm:w-auto text-sm py-2 px-4 shadow-sm">Approve</x-button-accent>
                </div>
              </x-card>
            @empty
              <!-- Empty state -->
              <div class="flex flex-col items-center justify-center p-12 text-center bg-white rounded-xl border border-border-light border-dashed">
                <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mb-4">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-slate-400"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                </div>
                <h3 class="text-[18px] font-semibold text-slate-900 mb-1">All caught up!</h3>
                <p class="text-[14px] text-slate-500">No pending leave requests right now.</p>
              </div>
            @endforelse
          </div>
        </section>

        <!-- Tab 2: History -->
        <section x-show="activeTab === 'history'" x-cloak class="transition-all duration-200">
          <div class="flex flex-col gap-4">
            @forelse($historyLeaves as $leave)
              @php
                $name = $leave->capster->user->name ?? 'Capster';
                $words = explode(' ', trim($name));
                $initials = '';
                foreach (array_slice($words, 0, 2) as $w) {
                  $initials .= mb_substr($w, 0, 1);
                }
                $initials = strtoupper($initials ?: 'C');

                $categoryMap = [
                  'sakit' => 'Sakit',
                  'mendesak' => 'Urusan Mendesak',
                  'keluarga' => 'Keperluan Keluarga',
                ];
                $categoryText = $categoryMap[$leave->category] ?? ucfirst($leave->category ?? 'Izin');

                $isSameDate = $leave->start_date->format('Y-m-d') === $leave->end_date->format('Y-m-d');
                $dateText = $isSameDate
                  ? $leave->start_date->translatedFormat('d M Y')
                  : $leave->start_date->translatedFormat('d M') . ' - ' . $leave->end_date->translatedFormat('d M Y');

                $isApproved = $leave->status === 'approved';
                $statusColor = $isApproved ? 'emerald' : 'rose';
                $statusLabel = $isApproved ? 'Approved' : 'Rejected';
                $reviewerName = $leave->reviewer->name ?? 'Admin User';
                $reviewedDate = $leave->reviewed_at ? $leave->reviewed_at->format('d M Y') : '—';
              @endphp
              <x-card padding="normal" class="p-6 bg-white flex items-start sm:items-center justify-between flex-col sm:flex-row gap-6 border-l-4 {{ $isApproved ? 'border-l-emerald-500' : 'border-l-rose-500' }} opacity-90">
                <div class="flex items-start sm:items-center gap-4">
                  <div class="w-12 h-12 rounded-full {{ $isApproved ? 'bg-emerald-100 text-emerald-800' : 'bg-rose-100 text-rose-800' }} grid place-items-center font-bold text-sm shrink-0">{{ $initials }}</div>
                  <div>
                    <h3 class="m-0 mb-1 text-[16px] font-semibold text-slate-900">{{ $name }}</h3>
                    <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4 text-[14px] text-slate-500">
                      <span class="flex items-center gap-1.5">
                        <span class="w-4 h-4 text-slate-400 grid place-items-center">
                          <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        </span>
                        {{ $dateText }}
                      </span>
                      <span class="hidden sm:inline text-slate-300">|</span>
                      <span>{{ $categoryText }}{{ !empty($leave->reason) ? ' | ' . $leave->reason : '' }}</span>
                    </div>
                    <div class="mt-2 text-[12px] text-slate-500 font-medium">
                      {{ $statusLabel }} by {{ $reviewerName }} on {{ $reviewedDate }}
                    </div>
                  </div>
                </div>
                <div class="flex items-center">
                  <span class="{{ $isApproved ? 'bg-emerald-100 text-emerald-800' : 'bg-rose-100 text-rose-800' }} text-[12px] font-semibold px-3 py-1 rounded-full flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 rounded-full {{ $isApproved ? 'bg-emerald-500' : 'bg-rose-500' }}"></span> {{ $statusLabel }}
                  </span>
                </div>
              </x-card>
            @empty
              <!-- Empty state for history -->
              <div class="flex flex-col items-center justify-center p-12 text-center bg-white rounded-xl border border-border-light border-dashed">
                <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mb-4">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-slate-400"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                </div>
                <h3 class="text-[18px] font-semibold text-slate-900 mb-1">No history yet</h3>
                <p class="text-[14px] text-slate-500">No approved or rejected leave requests found.</p>
              </div>
            @endforelse
          </div>
        </section>

      </main>
    </div>
  </div>
  @include('partials.logout-modal')

  <script>
    function processLeave(id, action) {
      if (!confirm(`Apakah Anda yakin ingin ${action === 'approve' ? 'menyetujui' : 'menolak'} permohonan cuti ini?`)) {
        return;
      }
      const csrfMeta = document.querySelector('meta[name="csrf-token"]');
      const csrfToken = csrfMeta ? csrfMeta.getAttribute('content') : '';

      fetch(`/leave-requests/${id}/${action}`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'X-CSRF-TOKEN': csrfToken
        }
      })
      .then(res => res.json())
      .then(data => {
        if (data.status === 'success' || data.success) {
          window.location.reload();
        } else {
          alert(data.message || 'Gagal memproses permohonan cuti.');
        }
      })
      .catch(err => {
        console.error(err);
        alert('Terjadi kesalahan saat memproses permohonan cuti.');
      });
    }
  </script>
</body>
</html>
