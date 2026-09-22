<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Digital Ticket - Trimly</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Geist:wght@400;500;600;700&family=Outfit:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased">

  <!-- Toast -->
  <div id="toast" class="fixed top-4 right-4 bg-primary text-white px-4 py-2 rounded shadow-lg hidden">Review berhasil dikirim!</div>

  <!-- Header -->
  <header class="flex justify-between items-center p-4 border-b border-border-light bg-background">
    <h1 class="text-2xl font-bold font-serif text-primary">Trimly</h1>
    <a href="{{ url('/' . ($booking->barbershop->slug ?? '')) }}" class="px-4 py-2 border border-slate-300 rounded-md text-sm font-semibold hover:border-slate-400 transition-colors bg-white">← Halaman Booking</a>
  </header>

  <main class="max-w-5xl mx-auto px-4 py-8">
    @if(session('status'))
      <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl text-sm font-semibold flex items-center gap-2">
        <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
        <span>{{ session('status') }}</span>
      </div>
    @endif
    @if(session('error'))
      <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-800 rounded-xl text-sm font-semibold flex items-center gap-2">
        <svg class="w-5 h-5 text-red-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        <span>{{ session('error') }}</span>
      </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
      <!-- Left: Digital Pass -->
      <section class="lg:col-span-5 flex justify-center">
        <div class="bg-white border border-border-light rounded-xl shadow-sm w-full max-w-sm overflow-hidden h-fit">
          <div class="bg-primary text-white p-6 flex justify-between items-center">
            <h2 class="text-xl font-bold font-serif">Digital Pass</h2>
            @if($booking->booking_status === 'completed')
              <span class="inline-flex items-center px-3 py-1 rounded-md text-xs font-bold uppercase tracking-wider bg-slate-200 text-slate-700">
                SELESAI
              </span>
            @elseif($booking->booking_status === 'cancelled')
              <span class="inline-flex items-center px-3 py-1 rounded-md text-xs font-bold uppercase tracking-wider bg-red-600 text-white">
                DIBATALKAN
              </span>
            @else
              <span class="inline-flex items-center px-3 py-1 rounded-md text-xs font-bold uppercase tracking-wider bg-emerald-600 text-white">
                TERKONFIRMASI
              </span>
            @endif
          </div>
          
          <div class="p-6">
            <!-- Identitas Toko -->
            <div class="text-xs uppercase tracking-wider font-semibold text-primary/60 mb-1">
              {{ $booking->barbershop->name ?? 'Trimly Barbershop' }}
            </div>
            <div class="text-lg font-bold text-foreground">{{ $booking->customer->name ?? 'Pelanggan' }}</div>
            <div class="text-primary/60 mb-6">{{ $booking->service->name }}</div>
            
            <div class="grid grid-cols-3 gap-4 mb-6">
              <div>
                <span class="block text-xs text-primary/60 uppercase tracking-wider">Tanggal</span>
                <span class="font-medium text-sm">{{ \Carbon\Carbon::parse($booking->booking_date)->translatedFormat('d M Y') }}</span>
              </div>
              <div>
                <span class="block text-xs text-primary/60 uppercase tracking-wider">Waktu</span>
                <span class="font-medium text-sm">{{ \Carbon\Carbon::parse($booking->start_time)->format('H:i') }} WIB</span>
              </div>
              <div>
                <span class="block text-xs text-primary/60 uppercase tracking-wider">Capster</span>
                <span class="font-medium text-sm">{{ $booking->capster ? $booking->capster->user->name : 'Any Available' }}</span>
              </div>
            </div>

            <!-- Info Pembayaran DP -->
            <div class="pt-4 border-t border-border-light flex items-center justify-between">
              <div>
                <span class="block text-xs text-primary/60 uppercase tracking-wider">DP Dibayar</span>
                <span class="font-bold text-sm text-foreground">Rp {{ number_format($booking->dp_amount ?? 0, 0, ',', '.') }}</span>
              </div>
              @if($booking->booking_status === 'cancelled')
                <span class="inline-flex items-center gap-1 text-xs font-semibold text-red-600">
                  <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
                  Hangus
                </span>
              @else
                <span class="inline-flex items-center gap-1 text-xs font-semibold text-emerald-700">
                  <svg class="w-4 h-4 text-emerald-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                  Lunas
                </span>
              @endif
            </div>
            
            @if($booking->booking_status === 'confirmed')
              <div class="flex flex-col items-center justify-center p-4 bg-surface rounded-lg border border-border-light mt-6">
                <div class="text-xl font-mono font-bold tracking-widest text-primary mb-3">#{{ $booking->booking_code }}</div>
                <div class="w-32 h-32 bg-white p-2 rounded shadow-sm">
                  <!-- Mock QR Code SVG -->
                  <svg viewBox="0 0 100 100" fill="currentColor" class="w-full h-full text-foreground opacity-80">
                    <path d="M10,10 h20 v20 h-20 z M15,15 h10 v10 h-10 z M70,10 h20 v20 h-20 z M75,15 h10 v10 h-10 z M10,70 h20 v20 h-20 z M15,75 h10 v10 h-10 z M40,10 h20 v10 h-20 z M40,25 h10 v10 h-10 z M55,25 h15 v10 h-15 z M40,40 h15 v20 h-15 z M60,40 h10 v10 h-10 z M75,40 h15 v15 h-15 z M85,60 h5 v30 h-5 z M70,75 h10 v15 h-10 z M40,70 h20 v10 h-20 z M45,85 h15 v5 h-15 z M10,40 h20 v10 h-20 z M10,55 h10 v10 h-10 z M25,55 h10 v5 h-10 z"/>
                  </svg>
                </div>
                <p class="text-[11px] text-primary/60 mt-3 text-center">Tunjukkan QR ini ke capster saat check-in</p>
              </div>
            @elseif($booking->booking_status === 'completed')
              <div class="flex flex-col items-center justify-center p-6 bg-slate-50 rounded-lg border border-slate-200 mt-6 text-center">
                <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mb-2">
                  <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                </div>
                <div class="font-bold text-sm text-slate-800">Layanan Telah Selesai</div>
                <p class="text-xs text-slate-500 mt-0.5">Terima kasih telah mempercayakan potongan rambut Anda kepada kami.</p>
                <div class="text-xs font-mono font-bold tracking-wider text-slate-400 mt-2">#{{ $booking->booking_code }}</div>
              </div>
            @elseif($booking->booking_status === 'cancelled')
              <div class="flex flex-col items-center justify-center p-6 bg-red-50 rounded-lg border border-red-200 mt-6 text-center">
                <div class="w-10 h-10 rounded-full bg-red-100 text-red-600 flex items-center justify-center mb-2">
                  <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                </div>
                <div class="font-bold text-sm text-red-800">Jadwal Reservasi Dibatalkan</div>
                @if($booking->cancellation_reason)
                  <p class="text-xs text-red-600 mt-1 italic">"{{ $booking->cancellation_reason }}"</p>
                @endif
                <div class="text-xs font-mono font-bold tracking-wider text-red-400 mt-2">#{{ $booking->booking_code }}</div>
              </div>
            @endif
          </div>
        </div>
      </section>

      <!-- Right: Interactions -->
      <section class="lg:col-span-7 space-y-6">
        
        @if($booking->booking_status === 'confirmed')
        <!-- Countdown Card -->
        <x-card class="p-6 text-center">
          <div id="countdownTitle" class="font-bold mb-2 text-lg text-foreground">Waktu Menuju Janji Temu</div>
          <div id="countdownTimer" data-target="{{ $booking->booking_date->format('Y-m-d') }}T{{ \Carbon\Carbon::parse($booking->start_time)->format('H:i:s') }}" class="text-4xl font-mono font-bold text-primary mb-2">--:--:--</div>
          <p id="countdownSubtitle" class="text-sm text-primary/60">Harap datang 10 menit sebelum jadwal.</p>
        </x-card>

        <!-- Booking Management -->
        <x-card class="p-6">
          <div class="font-bold mb-4 text-lg">Manajemen Booking</div>
          <div class="space-y-4 flex flex-col">
            @if(($booking->reschedule_count ?? 0) >= 1)
              <div>
                <button type="button" disabled class="w-full py-2.5 px-4 bg-slate-100 text-slate-400 text-sm font-semibold rounded-lg cursor-not-allowed border border-slate-200 text-center">
                  Reschedule Appointment
                </button>
                <p class="text-[11px] text-slate-400 text-center mt-1.5 font-medium">Batas 1x reschedule telah digunakan</p>
              </div>
            @else
              <x-button-primary id="btnOpenReschedule" type="button" class="w-full justify-center">Reschedule Appointment</x-button-primary>
            @endif
            
            <!-- Cancel Booking Form -->
            <form action="{{ route('book.cancel') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin membatalkan jadwal pemesanan ini? Sesuai ketentuan, DP yang sudah dibayar tidak dapat dikembalikan.')" class="pt-3 border-t border-border-light">
              @csrf
              <input type="hidden" name="booking_code" value="{{ $booking->booking_code }}">
              <div class="mb-3">
                <label class="block text-xs font-semibold text-slate-600 mb-1">Alasan Pembatalan (Opsional):</label>
                <textarea name="cancellation_reason" rows="2" placeholder="Tulis alasan jika ada (opsional)..." class="w-full text-xs p-2.5 border border-border-light rounded-lg bg-white focus:ring-1 focus:ring-red-500 focus:border-red-500 outline-none text-slate-700"></textarea>
              </div>
              <button type="submit" class="w-full text-center text-red-600 hover:text-red-700 hover:bg-red-50 border border-red-200 font-medium py-2 rounded-lg transition-colors text-sm">
                Cancel Booking
              </button>
            </form>
          </div>
        </x-card>
        @endif

        @if($booking->booking_status === 'cancelled')
        <!-- Cancelled Notice Card -->
        <x-card class="p-6 text-center border-red-200 bg-red-50/50">
          <div class="w-12 h-12 mx-auto mb-3 rounded-full bg-red-100 text-red-600 flex items-center justify-center">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
          </div>
          <h3 class="font-bold mb-1 text-lg text-red-800">Jadwal Pemesanan Telah Dibatalkan</h3>
          <p class="text-sm text-slate-600 mb-5">Slot waktu Anda telah dilepaskan dan Down Payment (DP) hangus sesuai ketentuan pembatalan mandiri.</p>
          <a href="{{ url('/' . ($booking->barbershop->slug ?? '')) }}" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-primary text-white text-sm font-semibold rounded-xl hover:bg-primary/90 transition-colors shadow-sm">
            <span>Reservasi Jadwal Baru</span>
            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
          </a>
        </x-card>
        @endif

        @if($booking->booking_status !== 'cancelled')
        <!-- Review Module -->
        <x-card class="p-6">
          <div class="font-bold mb-4 text-lg">Berikan Ulasan Anda</div>
          @if($booking->booking_status === 'completed')
            @if($booking->review)
              <div class="bg-slate-50 border border-slate-200 rounded-xl p-4">
                <div class="flex items-center gap-1.5 mb-2">
                  @for($i = 1; $i <= 5; $i++)
                    <svg class="w-5 h-5 {{ $i <= $booking->review->rating ? 'text-amber-400' : 'text-slate-200' }}" viewBox="0 0 24 24" fill="currentColor">
                      <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                    </svg>
                  @endfor
                  <span class="text-xs font-bold text-slate-700 ml-1">{{ $booking->review->rating }}/5</span>
                </div>
                @if($booking->review->comment)
                  <p class="text-sm text-slate-700 italic">"{{ $booking->review->comment }}"</p>
                @else
                  <p class="text-xs text-slate-400 italic">Tidak ada komentar tertulis.</p>
                @endif
              </div>
            @else
              <input type="hidden" id="reviewBookingCode" value="{{ $booking->booking_code }}">
              <div class="flex space-x-1" id="starRatingContainer">
                @for($s = 1; $s <= 5; $s++)
                  <svg class="w-8 h-8 cursor-pointer text-slate-200 hover:scale-110 transition-transform transition-colors" data-value="{{ $s }}" viewBox="0 0 24 24" fill="currentColor">
                    <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                  </svg>
                @endfor
              </div>
              <textarea id="reviewText" rows="3" class="w-full mt-4 p-3 border border-border-light bg-background rounded-md focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all" placeholder="Bagikan pengalaman Anda..."></textarea>
              <x-button-primary id="btnSubmitReview" class="w-full mt-4 justify-center">Submit Review</x-button-primary>
            @endif
          @else
            <div class="bg-slate-100 rounded-xl p-6 text-center text-sm text-slate-500 border border-slate-200">
              <div class="w-10 h-10 mx-auto mb-2.5 rounded-full bg-amber-100 text-amber-500 flex items-center justify-center">
                <svg class="w-5 h-5 text-amber-500" viewBox="0 0 24 24" fill="currentColor">
                  <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                </svg>
              </div>
              <p class="font-semibold text-slate-800 text-base">Ulasan Belum Tersedia</p>
              <p class="text-xs text-slate-500 mt-1 max-w-sm mx-auto">Anda dapat memberikan penilaian dan ulasan untuk Capster setelah layanan pangkas rambut selesai dikerjakan.</p>
            </div>
          @endif
        </x-card>
        @endif

      </section>
    </div>
  </main>

  <!-- Modal: Reschedule -->
  <div class="fixed inset-0 bg-black/50 z-50 hidden flex items-center justify-center p-4" id="modalReschedule">
    <div class="bg-white w-full max-w-md rounded-xl shadow-xl overflow-hidden">
      <div class="flex justify-between items-center p-4 border-b border-border-light">
        <h3 class="text-lg font-bold text-slate-800">Ubah Jadwal Booking</h3>
        <button type="button" class="text-slate-400 hover:text-slate-700 transition-colors" onclick="closeModal('modalReschedule')">✕</button>
      </div>
      <form action="{{ route('book.reschedule') }}" method="POST">
        @csrf
        <input type="hidden" name="booking_code" value="{{ $booking->booking_code }}">
        
        <div class="p-5 space-y-4">
          <div class="bg-blue-50 border border-blue-200 text-blue-800 p-3.5 rounded-lg text-xs leading-relaxed">
            <span class="font-semibold block mb-0.5">Ketentuan Reschedule:</span>
            Reschedule mandiri bebas biaya berlaku maksimal 1x. Down Payment (DP) Anda otomatis dialihkan ke slot baru.
          </div>
          
          <div>
            <label class="block text-xs font-semibold text-slate-700 mb-1.5">Pilih Tanggal Baru</label>
            <input 
              type="date" 
              name="booking_date" 
              min="{{ date('Y-m-d') }}" 
              value="{{ $booking->booking_date->format('Y-m-d') }}" 
              required 
              class="w-full text-sm p-2.5 border border-slate-300 rounded-lg bg-white focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-slate-800 font-medium"
            >
          </div>

          <div>
            <label class="block text-xs font-semibold text-slate-700 mb-1.5">Pilih Jam Mulai Baru</label>
            <select 
              name="start_time" 
              required 
              class="w-full text-sm p-2.5 border border-slate-300 rounded-lg bg-white focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-slate-800 font-medium"
            >
              <option value="" disabled>-- Pilih Jam --</option>
              @php
                $currentSlot = \Carbon\Carbon::parse($booking->start_time)->format('H:i');
              @endphp
              @for ($h = 10; $h <= 20; $h++)
                @foreach (['00', '30'] as $m)
                  @php
                    $slot = sprintf('%02d:%s', $h, $m);
                  @endphp
                  <option value="{{ $slot }}" {{ $currentSlot === $slot ? 'selected' : '' }}>
                    {{ $slot }} WIB {{ $currentSlot === $slot ? '(Jadwal Saat Ini)' : '' }}
                  </option>
                @endforeach
              @endfor
            </select>
            <p class="text-[11px] text-slate-500 mt-1">Estimasi durasi pangkas: {{ $booking->service->duration_minutes ?? 30 }} menit</p>
          </div>
        </div>

        <div class="p-4 border-t border-border-light flex space-x-3 bg-slate-50/50">
          <x-button-outline type="button" class="flex-1 justify-center" onclick="closeModal('modalReschedule')">Batal</x-button-outline>
          <button type="submit" class="flex-1 px-4 py-2 bg-primary text-white rounded-md text-sm font-medium hover:bg-primary/90 transition-colors text-center">
            Konfirmasi Jadwal
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal: Cancel Booking -->
  <div class="fixed inset-0 bg-black/50 z-50 hidden flex items-center justify-center p-4" id="modalCancelBooking">
    <div class="bg-background w-full max-w-sm rounded-xl shadow-xl overflow-hidden">
      <div class="flex justify-between items-center p-4 border-b border-border-light">
        <h3 class="text-lg font-bold">Batalkan Janji Temu?</h3>
        <button class="text-primary/60 hover:text-foreground transition-colors" onclick="closeModal('modalCancelBooking')">✕</button>
      </div>
      <form action="{{ route('book.cancel') }}" method="POST">
        @csrf
        <input type="hidden" name="booking_code" value="{{ $booking->booking_code }}">
        <div class="p-4 space-y-3">
          <div class="bg-red-50 text-red-800 p-3 rounded-md text-sm">
            Sesuai ketentuan, pembatalan mandiri oleh pelanggan mengakibatkan Down Payment (DP) hangus dan tidak dapat dikembalikan.
          </div>
          <div>
            <label class="block text-xs font-semibold text-slate-600 mb-1">Alasan Pembatalan (Opsional):</label>
            <textarea name="cancellation_reason" rows="2" placeholder="Tulis alasan jika ada..." class="w-full text-xs p-2 border border-border-light rounded-md bg-white focus:ring-1 focus:ring-red-500 focus:border-red-500 outline-none text-slate-700"></textarea>
          </div>
        </div>
        <div class="p-4 border-t border-border-light flex space-x-3">
          <x-button-outline type="button" class="flex-1 justify-center" onclick="closeModal('modalCancelBooking')">Kembali</x-button-outline>
          <button type="submit" class="flex-1 px-4 py-2 bg-red-600 text-white rounded-md text-sm font-medium hover:bg-red-600/90 transition-colors">Ya, Batalkan</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal: Edit Profile -->
  <div class="fixed inset-0 bg-black/50 z-50 hidden flex items-center justify-center p-4" id="modalEditCustomerProfile">
    <div class="bg-background w-full max-w-md rounded-xl shadow-xl overflow-hidden">
      <div class="flex justify-between items-center p-4 border-b border-border-light">
        <h3 class="text-lg font-bold">Edit Profil</h3>
        <button class="text-primary/60 hover:text-foreground transition-colors" onclick="closeModal('modalEditCustomerProfile')">✕</button>
      </div>
      <div class="p-4 space-y-4">
        <div>
          <x-label>Nama Lengkap</x-label>
          <x-input type="text" class="w-full mt-1" value="Bagas Pratama" />
        </div>
        <div>
          <x-label>Nomor WhatsApp</x-label>
          <x-input type="text" class="w-full mt-1" value="081234567890" />
        </div>
        <div>
          <x-label>Email</x-label>
          <x-input type="email" class="w-full mt-1" value="bagas.pratama@email.com" />
        </div>
        <div>
          <x-label>Ubah Password</x-label>
          <x-input type="password" class="w-full mt-1" placeholder="Masukkan password baru" />
        </div>
      </div>
      <div class="p-4 border-t border-border-light">
        <x-button-primary class="w-full justify-center" onclick="closeModal('modalEditCustomerProfile')">Simpan Perubahan</x-button-primary>
      </div>
    </div>
  </div>

  <script src="{{ asset('js/ticket.js') }}"></script>
</body>
</html>