<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Digital Ticket - Trimly</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Geist:wght@400;500;600;700&family=Outfit:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-surface text-primary font-sans antialiased">

  <!-- Toast -->
  <div id="toast" class="fixed top-4 right-4 bg-primary text-white px-4 py-2 rounded shadow-lg hidden">Review berhasil dikirim!</div>

  <!-- Header -->
  <header class="flex justify-between items-center p-4 border-b border-border-light bg-background">
    <h1 class="text-2xl font-bold font-serif text-primary">Trimly</h1>
    <x-button-outline id="btnOpenEditProfile" class="text-sm px-3 py-1">Edit Profil</x-button-outline>
  </header>

  <main class="max-w-6xl mx-auto p-4 md:p-8">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
      <!-- Left: Digital Pass -->
      <section class="flex justify-center">
        <div class="bg-white border border-border-light rounded-xl shadow-sm w-full max-w-sm overflow-hidden">
          <div class="bg-primary text-white p-6 flex justify-between items-center">
            <h2 class="text-xl font-bold font-serif">Digital Pass</h2>
            <x-badge class="bg-primary text-white border-none">Confirmed</x-badge>
          </div>
          
          <div class="p-6">
            <div class="text-lg font-bold text-foreground">Bagas Pratama</div>
            <div class="text-primary/60 mb-6">Gentleman's Fade</div>
            
            <div class="grid grid-cols-3 gap-4 mb-6">
              <div>
                <span class="block text-xs text-primary/60 uppercase tracking-wider">Tanggal</span>
                <span class="font-medium text-sm">24 Nov 2024</span>
              </div>
              <div>
                <span class="block text-xs text-primary/60 uppercase tracking-wider">Waktu</span>
                <span class="font-medium text-sm">14:00 PM</span>
              </div>
              <div>
                <span class="block text-xs text-primary/60 uppercase tracking-wider">Capster</span>
                <span class="font-medium text-sm">Fajar A.</span>
              </div>
            </div>
            
            <div class="flex flex-col items-center justify-center p-4 bg-surface rounded-lg border border-border-light mt-4">
              <div class="text-xl font-mono font-bold tracking-widest text-primary mb-4">#TRM-9824</div>
              <div class="w-32 h-32 bg-white p-2 rounded shadow-sm">
                <!-- Mock QR Code SVG -->
                <svg viewBox="0 0 100 100" fill="currentColor" class="w-full h-full text-foreground opacity-80">
                  <path d="M10,10 h20 v20 h-20 z M15,15 h10 v10 h-10 z M70,10 h20 v20 h-20 z M75,15 h10 v10 h-10 z M10,70 h20 v20 h-20 z M15,75 h10 v10 h-10 z M40,10 h20 v10 h-20 z M40,25 h10 v10 h-10 z M55,25 h15 v10 h-15 z M40,40 h15 v20 h-15 z M60,40 h10 v10 h-10 z M75,40 h15 v15 h-15 z M85,60 h5 v30 h-5 z M70,75 h10 v15 h-10 z M40,70 h20 v10 h-20 z M45,85 h15 v5 h-15 z M10,40 h20 v10 h-20 z M10,55 h10 v10 h-10 z M25,55 h10 v5 h-10 z"/>
                </svg>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Right: Interactions -->
      <section class="space-y-6">
        
        <!-- Countdown -->
        <x-card class="p-6 text-center">
          <div class="font-bold mb-2 text-lg text-foreground">Waktu Menuju Janji Temu</div>
          <div class="text-4xl font-mono font-bold text-primary mb-2">02:45:10</div>
          <p class="text-sm text-primary/60">Harap datang 10 menit sebelum jadwal.</p>
        </x-card>

        <!-- Booking Management -->
        <x-card class="p-6">
          <div class="font-bold mb-4 text-lg">Manajemen Booking</div>
          <div class="space-y-3 flex flex-col">
            <x-button-primary id="btnOpenReschedule" class="w-full justify-center">Reschedule Appointment</x-button-primary>
            <button id="btnOpenCancel" class="w-full text-center text-red-600 hover:text-red-600/80 font-medium py-2 transition-colors">Cancel Booking</button>
          </div>
        </x-card>

        <!-- Review Module -->
        <x-card class="p-6">
          <div class="font-bold mb-4 text-lg">Berikan Ulasan Anda</div>
          <div class="flex space-x-1 text-primary/60" id="starRatingContainer">
            <!-- SVG stars -->
            <svg class="w-8 h-8 cursor-pointer hover:text-yellow-400 transition-colors" data-value="1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
            <svg class="w-8 h-8 cursor-pointer hover:text-yellow-400 transition-colors" data-value="2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
            <svg class="w-8 h-8 cursor-pointer hover:text-yellow-400 transition-colors" data-value="3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
            <svg class="w-8 h-8 cursor-pointer hover:text-yellow-400 transition-colors" data-value="4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
            <svg class="w-8 h-8 cursor-pointer hover:text-yellow-400 transition-colors" data-value="5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
          </div>
          <textarea id="reviewText" rows="3" class="w-full mt-4 p-3 border border-border-light bg-background rounded-md focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all" placeholder="Bagikan pengalaman Anda..."></textarea>
          <x-button-primary id="btnSubmitReview" class="w-full mt-4 justify-center">Submit Review</x-button-primary>
        </x-card>

      </section>
    </div>
  </main>

  <!-- Modal: Reschedule -->
  <div class="fixed inset-0 bg-black/50 z-50 hidden flex items-center justify-center p-4" id="modalReschedule">
    <div class="bg-background w-full max-w-md rounded-xl shadow-xl overflow-hidden">
      <div class="flex justify-between items-center p-4 border-b border-border-light">
        <h3 class="text-lg font-bold">Ubah Jadwal Booking</h3>
        <button class="text-primary/60 hover:text-foreground transition-colors" onclick="closeModal('modalReschedule')">✕</button>
      </div>
      <div class="p-4">
        <div class="bg-blue-50 text-blue-800 p-3 rounded-md text-sm mb-4">
          Reschedule mandiri bebas biaya berlaku maksimal 1x (minimal 3 jam sebelum jadwal). DP Anda otomatis dipindahkan ke slot baru.
        </div>
        
        <div class="font-bold mb-2">Pilih Tanggal Baru</div>
        <div class="flex space-x-2 overflow-x-auto pb-2 mb-4">
          <div class="flex-shrink-0 w-16 h-20 rounded-lg border-2 border-primary bg-primary/5 flex flex-col items-center justify-center cursor-pointer">
            <span class="text-xs text-primary font-medium">Sen</span>
            <span class="text-xl font-bold text-primary">25</span>
          </div>
          <div class="flex-shrink-0 w-16 h-20 rounded-lg border border-border-light flex flex-col items-center justify-center cursor-pointer hover:border-primary transition-colors">
            <span class="text-xs text-primary/60">Sel</span>
            <span class="text-xl font-bold text-foreground">26</span>
          </div>
          <div class="flex-shrink-0 w-16 h-20 rounded-lg border border-border-light flex flex-col items-center justify-center cursor-pointer hover:border-primary transition-colors">
            <span class="text-xs text-primary/60">Rab</span>
            <span class="text-xl font-bold text-foreground">27</span>
          </div>
          <div class="flex-shrink-0 w-16 h-20 rounded-lg border border-border-light flex flex-col items-center justify-center cursor-pointer hover:border-primary transition-colors">
            <span class="text-xs text-primary/60">Kam</span>
            <span class="text-xl font-bold text-foreground">28</span>
          </div>
        </div>

        <div class="font-bold mb-2">Pilih Waktu</div>
        <div class="flex flex-wrap gap-2">
          <button class="px-4 py-2 border border-border-light rounded-md text-sm hover:border-primary transition-colors">10:00</button>
          <button class="px-4 py-2 border-2 border-primary bg-primary text-white rounded-md text-sm">11:00</button>
          <button class="px-4 py-2 border border-border-light bg-surface text-primary/60 rounded-md text-sm cursor-not-allowed" disabled>13:00</button>
          <button class="px-4 py-2 border border-border-light rounded-md text-sm hover:border-primary transition-colors">14:00</button>
          <button class="px-4 py-2 border border-border-light rounded-md text-sm hover:border-primary transition-colors">16:30</button>
        </div>

      </div>
      <div class="p-4 border-t border-border-light">
        <x-button-primary class="w-full justify-center bg-primary hover:bg-primary/90 border-none" onclick="closeModal('modalReschedule')">Konfirmasi Jadwal Baru</x-button-primary>
      </div>
    </div>
  </div>

  <!-- Modal: Cancel Booking -->
  <div class="fixed inset-0 bg-black/50 z-50 hidden flex items-center justify-center p-4" id="modalCancelBooking">
    <div class="bg-background w-full max-w-sm rounded-xl shadow-xl overflow-hidden">
      <div class="flex justify-between items-center p-4 border-b border-border-light">
        <h3 class="text-lg font-bold">Batalkan Janji Temu?</h3>
        <button class="text-primary/60 hover:text-foreground transition-colors" onclick="closeModal('modalCancelBooking')">✕</button>
      </div>
      <div class="p-4">
        <div class="bg-red-50 text-red-800 p-3 rounded-md text-sm">
          Sesuai ketentuan, pembatalan mandiri oleh pelanggan mengakibatkan Down Payment (DP) hangus dan tidak dapat dikembalikan.
        </div>
      </div>
      <div class="p-4 border-t border-border-light flex space-x-3">
        <x-button-outline class="flex-1 justify-center" onclick="closeModal('modalCancelBooking')">Kembali</x-button-outline>
        <button class="flex-1 px-4 py-2 bg-red-600 text-white rounded-md text-sm font-medium hover:bg-red-600/90 transition-colors" onclick="closeModal('modalCancelBooking')">Ya, Batalkan</button>
      </div>
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
