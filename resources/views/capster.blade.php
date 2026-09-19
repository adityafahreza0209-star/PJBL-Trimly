<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>Capster Dashboard - Trimly</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Geist:wght@300;400;500;600;700&family=Outfit:wght@300;400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <script src="{{ asset('js/capster.js') }}" defer></script>
</head>
<body class="bg-background text-primary font-sans antialiased">
  
  <div class="flex flex-col md:flex-row min-h-screen w-full">
    <!-- Sidebar / Header -->
    <aside class="w-full md:w-64 bg-surface border-r border-border-light flex flex-col shrink-0">
      <header class="p-4 md:p-6 border-b border-border-light cursor-pointer" id="profileHeader" role="button" aria-label="Edit Profile" tabindex="0">
        <div class="flex items-center md:flex-col md:items-start gap-4">
          <div class="w-16 h-16 rounded-full overflow-hidden shrink-0 border border-border-light">
            <img src="https://ui-avatars.com/api/?name=Fajar+A&background=14221D&color=fff&size=100" alt="Fajar A." class="w-full h-full object-cover" id="displayAvatar">
          </div>
          <div class="flex flex-col w-full">
            <div class="flex justify-between items-center w-full">
              <h1 class="text-lg font-bold" id="displayName">Fajar Adiputra</h1>
              <button id="btnEditProfileIcon" class="p-1 text-primary hover:text-primary transition-colors" aria-label="Edit Profile">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M12 20h9"></path>
                  <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                </svg>
              </button>
            </div>
            <div class="flex items-center gap-2 mt-1">
              <span class="w-2.5 h-2.5 rounded-full bg-primary" id="statusDot"></span>
              <span class="text-sm font-medium text-primary" id="statusLabel">On Duty</span>
              <button class="ml-auto relative inline-flex h-6 w-11 items-center rounded-full bg-primary transition-colors cursor-pointer" id="dutyToggleBtn" aria-label="Toggle Duty Status">
                <span class="inline-block h-4 w-4 transform rounded-full bg-white transition translate-x-6"></span>
              </button>
            </div>
          </div>
        </div>
      </header>

      <!-- Desktop Sidebar Actions -->
      <div class="hidden md:flex flex-col gap-2 p-6 mt-auto">
        <x-button-primary class="w-full" onclick="document.getElementById('btnRequestLeave').click()">
          Request Leave
        </x-button-primary>
        <a href="{{ url('login') }}" class="w-full block mt-2">
            <x-button-outline class="w-full text-center">Sign Out</x-button-outline>
        </a>
      </div>
    </aside>

    <main class="flex-1 p-4 md:p-8 bg-background overflow-y-auto">
      <section class="flex flex-col sm:flex-row gap-4 mb-8">
        <div class="flex-1 p-5 shadow-xs border border-slate-200/80 bg-slate-50/80 rounded-2xl">
          <div class="text-xs font-semibold uppercase tracking-wider text-slate-500">Total Komisi Hari Ini</div>
          <div class="text-2xl sm:text-3xl font-bold font-serif mt-1 text-primary">Rp 450.000</div>
          <div class="text-[11px] text-emerald-700 font-medium mt-1 flex items-center gap-1">
            <span>&uarr; 12%</span> vs yesterday
          </div>
        </div>
        <div class="flex-1 p-5 shadow-xs border border-slate-200/80 bg-slate-50/80 rounded-2xl flex flex-col justify-between">
          <div>
            <div class="text-xs font-semibold uppercase tracking-wider text-slate-500">Jumlah Selesai</div>
            <div class="text-2xl sm:text-3xl font-bold font-serif mt-1 text-primary">6 Cuts</div>
          </div>
          <div class="text-[11px] text-slate-400 mt-1">Target harian: 8 cuts</div>
        </div>
      </section>

      <section class="mb-8">
        <div class="flex justify-between items-center mb-6 border-b border-border-light pb-4">
          <h2 class="text-2xl font-serif font-semibold text-primary">Today's Roster</h2>
          <span class="hidden sm:inline-block px-3 py-1 bg-surface rounded-md text-xs font-semibold text-slate-600 border border-border-light">Saturday, Sep 5</span>
        </div>
        
        <div class="flex flex-col">
          
          <!-- Appointment 1: 10:00 AM (Done) -->
          <div class="grid grid-cols-[80px_1fr] gap-4 sm:gap-6 items-start">
            <div class="text-right pr-4 pt-3 shrink-0">
              <span class="font-bold text-lg leading-none block text-slate-400">10:00</span>
              <span class="text-xs text-slate-400 mt-1 font-semibold uppercase tracking-wider block">AM</span>
            </div>
            <div class="border-l-2 border-slate-200 pl-6 pb-6 relative">
              <div class="absolute -left-[5px] top-5 w-2 h-2 rounded-full bg-slate-300"></div>
              <div class="cursor-pointer bg-white border border-slate-200 shadow-sm rounded-xl p-4 hover:border-slate-300 transition-all opacity-75" onclick="openAppointmentDrawer('Bagas Pratama', '10:00 AM', `Gentleman's Fade`, 'Done', this)">
                <div class="flex justify-between items-center mb-1.5">
                  <span class="font-bold text-base text-primary">Bagas Pratama</span>
                  <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs bg-slate-100 text-slate-500 font-medium">Done</span>
                </div>
                <div class="text-xs text-slate-500 font-medium">Gentleman's Fade</div>
              </div>
            </div>
          </div>

          <!-- Appointment 2: 14:00 PM (Active / Next) -->
          <div class="grid grid-cols-[80px_1fr] gap-4 sm:gap-6 items-start">
            <div class="text-right pr-4 pt-3 shrink-0">
              <span class="font-bold text-lg leading-none block text-primary">14:00</span>
              <span class="text-xs text-accent mt-1 font-semibold uppercase tracking-wider block">PM</span>
            </div>
            <div class="border-l-2 border-primary pl-6 pb-6 relative">
              <div class="absolute -left-[6px] top-5 w-2.5 h-2.5 rounded-full bg-primary ring-4 ring-primary/20"></div>
              <div class="cursor-pointer bg-white shadow-md shadow-primary/10 border-l-4 border-primary rounded-xl p-4 hover:shadow-lg transition-all border-y border-r border-slate-100" onclick="openAppointmentDrawer('Reza Rahadian', '14:00 PM', 'Classic Scissor Cut + Wash', 'DP Paid', this)">
                <div class="flex justify-between items-center mb-1.5">
                  <div class="flex items-center gap-2">
                    <span class="font-bold text-base text-primary">Reza Rahadian</span>
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-primary/10 text-primary uppercase tracking-wider">Next</span>
                  </div>
                  <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs bg-accent/10 text-accent font-bold border border-accent/20">DP Paid</span>
                </div>
                <div class="text-xs text-slate-600 font-medium">Classic Scissor Cut + Wash</div>
              </div>
            </div>
          </div>

          <!-- Appointment 3: 16:30 PM (Upcoming) -->
          <div class="grid grid-cols-[80px_1fr] gap-4 sm:gap-6 items-start">
            <div class="text-right pr-4 pt-3 shrink-0">
              <span class="font-bold text-lg leading-none block text-primary">16:30</span>
              <span class="text-xs text-slate-400 mt-1 font-semibold uppercase tracking-wider block">PM</span>
            </div>
            <div class="border-l-2 border-slate-200 pl-6 pb-2 relative">
              <div class="absolute -left-[5px] top-5 w-2 h-2 rounded-full bg-slate-300"></div>
              <div class="cursor-pointer bg-white border border-slate-200 shadow-sm rounded-xl p-4 hover:border-slate-300 transition-all" onclick="openAppointmentDrawer('Dion Wiyoko', '16:30 PM', 'Signature Trimly Trim', 'DP Paid', this)">
                <div class="flex justify-between items-center mb-1.5">
                  <span class="font-bold text-base text-primary">Dion Wiyoko</span>
                  <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs bg-accent/10 text-accent font-bold border border-accent/20">DP Paid</span>
                </div>
                <div class="text-xs text-slate-600 font-medium">Signature Trimly Trim</div>
              </div>
            </div>
          </div>

        </div>
      </section>
    </main>

    <button class="md:hidden fixed bottom-6 right-6 w-14 h-14 bg-primary text-white rounded-full flex items-center justify-center shadow-lg hover:bg-primary/90 transition-colors z-40" id="btnRequestLeave" aria-label="Request Leave">
      <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
        <line x1="16" y1="2" x2="16" y2="6"></line>
        <line x1="8" y1="2" x2="8" y2="6"></line>
        <line x1="3" y1="10" x2="21" y2="10"></line>
        <path d="M9 16l2 2 4-4"></path>
      </svg>
    </button>
  </div>

  <!-- Modals -->
  <!-- Request Leave Modal -->
  <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity" id="modalLeaveRequest">
    <div class="bg-surface w-full max-w-md rounded-xl shadow-2xl overflow-hidden flex flex-col">
      <div class="flex justify-between items-center p-4 border-b border-border-light shrink-0">
        <h3 class="font-bold text-lg">Request Emergency Leave</h3>
        <button class="p-1 hover:bg-gray-100 rounded-md transition-colors" onclick="closeModal('modalLeaveRequest')" aria-label="Close">✕</button>
      </div>
      <div class="p-4 flex flex-col gap-4 overflow-y-auto">
        <div class="flex flex-col gap-1.5">
          <x-label>Tanggal Mulai</x-label>
          <x-input type="date" id="leaveStartDate" class="w-full" />
        </div>
        <div class="flex flex-col gap-1.5">
          <x-label>Tanggal Selesai</x-label>
          <x-input type="date" id="leaveEndDate" class="w-full" />
        </div>
        <div class="flex flex-col gap-1.5">
          <x-label>Kategori Izin</x-label>
          <select id="leaveCategory" class="w-full rounded-md border border-border-light bg-surface px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary">
            <option value="" disabled selected>Pilih Kategori...</option>
            <option value="sakit">Sakit</option>
            <option value="mendesak">Urusan Mendesak</option>
            <option value="keluarga">Keperluan Keluarga</option>
          </select>
        </div>
        <div class="flex flex-col gap-1.5">
          <x-label>Alasan / Deskripsi</x-label>
          <textarea id="leaveReason" rows="3" placeholder="Deskripsikan alasan emergency anda..." class="w-full rounded-md border border-border-light bg-surface px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary"></textarea>
        </div>
      </div>
      <div class="p-4 border-t border-border-light shrink-0">
        <x-button-primary class="w-full" onclick="closeModal('modalLeaveRequest')">Submit Request</x-button-primary>
      </div>
    </div>
  </div>

  <!-- Edit Profile Modal -->
  <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity" id="modalEditProfile">
    <div class="bg-surface w-full max-w-md rounded-xl shadow-2xl overflow-hidden flex flex-col">
      <div class="flex justify-between items-center p-4 border-b border-border-light shrink-0">
        <h3 class="font-bold text-lg">Edit Profil & Spesialisasi</h3>
        <button class="p-1 hover:bg-gray-100 rounded-md transition-colors" onclick="closeModal('modalEditProfile')" aria-label="Close">✕</button>
      </div>
      <div class="p-4 flex flex-col gap-4 overflow-y-auto">
        <div class="flex flex-col gap-1.5">
          <x-label>Bio / Tentang Saya</x-label>
          <textarea id="editBioInput" rows="3" class="w-full rounded-md border border-border-light bg-surface px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary" placeholder="Deskripsikan pengalaman Anda..."></textarea>
        </div>
        <div class="flex flex-col gap-1.5">
          <x-label>Keahlian & Spesialisasi</x-label>
          <div class="flex flex-wrap gap-2 mb-2" id="skillTagsContainer">
            <span class="inline-flex items-center px-2.5 py-1 bg-gray-100 rounded-full text-xs font-semibold text-primary border border-gray-200">Skin Fade <button class="ml-1 text-gray-500 hover:text-primary" onclick="removeTag(this)">✕</button></span>
            <span class="inline-flex items-center px-2.5 py-1 bg-gray-100 rounded-full text-xs font-semibold text-primary border border-gray-200">Hot Towel Shave <button class="ml-1 text-gray-500 hover:text-primary" onclick="removeTag(this)">✕</button></span>
            <span class="inline-flex items-center px-2.5 py-1 bg-gray-100 rounded-full text-xs font-semibold text-primary border border-gray-200">Classic Scissor <button class="ml-1 text-gray-500 hover:text-primary" onclick="removeTag(this)">✕</button></span>
          </div>
          <div class="flex gap-2">
            <x-input type="text" id="newSkillInput" class="flex-1" placeholder="+ Tambah Skill..." autocomplete="off" />
            <x-button-outline class="px-4 py-2 text-sm" onclick="addSkill()">Add</x-button-outline>
          </div>
        </div>
      </div>
      <div class="p-4 border-t border-border-light shrink-0 mt-2">
        <x-button-primary class="w-full" onclick="saveProfile()">Simpan Perubahan</x-button-primary>
      </div>
    </div>
  </div>

  <!-- Bottom Drawer / Side Modal: Appointment Details -->
  <div class="fixed inset-0 z-50 flex items-end sm:items-center justify-center p-0 sm:p-4 bg-black/60 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity" id="bottomDrawerAppointment">
    <div class="bg-surface w-full sm:max-w-md rounded-t-2xl sm:rounded-xl shadow-2xl flex flex-col max-h-[90vh] transform translate-y-full sm:translate-y-0 transition-transform duration-300">
      <div class="w-12 h-1.5 bg-gray-300 rounded-full mx-auto mt-3 sm:hidden shrink-0"></div>
      <div class="flex justify-between items-center p-4 sm:p-6 border-b border-border-light shrink-0">
        <h3 class="font-bold text-lg">Detail Janji Temu</h3>
        <button class="p-1 hover:bg-gray-100 rounded-md transition-colors text-lg" onclick="closeDrawer('bottomDrawerAppointment')" aria-label="Close">✕</button>
      </div>
      <div class="p-4 sm:p-6 overflow-y-auto">
        <div class="flex justify-between items-center mb-1">
          <h4 class="text-xl font-bold text-primary" id="drawerClientName">Reza Rahadian</h4>
          <span class="status-badge inline-flex items-center px-2.5 py-0.5 rounded-full text-xs bg-accent/10 text-accent font-bold border border-accent/20" id="drawerClientStatus">DP Paid</span>
        </div>
        <p class="text-primary text-sm mb-6" id="drawerClientTime">14:00 PM • Classic Scissor Cut + Wash</p>

        <div class="bg-gray-50 rounded-lg p-4 border border-border-light mb-4 flex flex-col gap-3">
          <div class="flex justify-between text-sm">
            <span class="text-primary">WhatsApp</span>
            <span class="font-medium text-primary">0812-3456-7890</span>
          </div>
          <div class="flex flex-col text-sm gap-1">
            <span class="text-primary">Client Preferences</span>
            <span class="text-primary leading-relaxed">Gunakan pomade matte finish, jangan dipotong terlalu pendek di bagian atas.</span>
          </div>
        </div>

        <div class="bg-gray-50 rounded-lg p-4 border border-border-light flex flex-col gap-3">
          <h5 class="font-bold text-primary">Rincian Pembayaran</h5>
          <div class="flex justify-between text-sm">
            <span class="text-primary">DP (Midtrans)</span>
            <span class="text-accent font-semibold">Lunas (Rp 25.000)</span>
          </div>
          <div class="flex justify-between text-sm items-center">
            <span class="text-primary">Sisa Tagihan</span>
            <span class="font-bold text-primary text-base">Rp 50.000 (Bayar di Kasir)</span>
          </div>
        </div>
      </div>
      <div class="p-4 sm:p-6 border-t border-border-light shrink-0 flex flex-col gap-3">
        <x-button-primary class="w-full py-3" id="btnStartService">Mulai Layanan / In-Chair</x-button-primary>
        <x-button-outline class="w-full py-3">Hubungi via WhatsApp</x-button-outline>
      </div>
    </div>
  </div>

</body>
</html>
