/**
 * TRIMLY OS — Booking Portal Interactivity
 * Handles State, UI Updates, and Modal Flows
 */

document.addEventListener('DOMContentLoaded', () => {

  // --- State ---
  let state = {
    capster: 'Fajar Pratama',
    service: 'Cukur Reguler',
    serviceName: 'Cukur Reguler',
    price: 25000,
    dp: 10000,
    duration: '30 MINS',
    date: '',
    time: '',
    clientName: '',
    clientPhone: ''
  };

  // --- Formatting ---
  const formatIDR = (num) => 'Rp ' + Number(num).toLocaleString('id-ID');

  // --- UI Elements ---
  const dateScroll = document.getElementById('dateScroll');
  const timeGrid = document.getElementById('timeGrid');
  
  // Inputs
  const clientNameInput = document.getElementById('clientName');
  const clientPhoneInput = document.getElementById('clientPhone');
  const capsterRadios = document.querySelectorAll('input[name="capster"]');
  const serviceRadios = document.querySelectorAll('input[name="service"]');

  // Summary Elements
  const summCapster = document.getElementById('summCapster');
  const summService = document.getElementById('summService');
  const summDuration = document.getElementById('summDuration');
  const summDate = document.getElementById('summDate');
  const summTime = document.getElementById('summTime');
  const summTotal = document.getElementById('summTotal');
  const summDP = document.getElementById('summDP');
  const summRemaining = document.getElementById('summRemaining');
  const btnCheckout = document.getElementById('btnCheckout');

  // Modals
  const paymentModal = document.getElementById('paymentModal');
  const ticketModal = document.getElementById('ticketModal');
  const closePaymentModal = document.getElementById('closePaymentModal');
  const btnSimulateSuccess = document.getElementById('btnSimulateSuccess');
  const btnTicketDone = document.getElementById('btnTicketDone');
  
  const modalDpAmount = document.getElementById('modalDpAmount');
  const countdownTimer = document.getElementById('countdownTimer');

  // --- Initialization ---
  function initDates() {
    const today = new Date();
    dateScroll.innerHTML = '';
    
    for (let i = 0; i < 7; i++) {
      let d = new Date(today);
      d.setDate(d.getDate() + i);
      
      const dayName = d.toLocaleDateString('en-US', { weekday: 'short' });
      const dayNum = d.getDate();
      const dateStr = d.toLocaleDateString('en-US', { weekday: 'short', day: 'numeric', month: 'short' });
      
      // Fix timezone offset issue by generating YYYY-MM-DD locally
      const pad = (n) => n.toString().padStart(2, '0');
      const localRawDate = `${d.getFullYear()}-${pad(d.getMonth() + 1)}-${pad(d.getDate())}`;
      
      const pill = document.createElement('div');
      const isSelected = (i === 0);
      pill.className = `flex flex-col items-center justify-center p-3 border rounded-md cursor-pointer transition-colors min-w-[70px] shrink-0 select-none ${
        isSelected 
          ? 'bg-primary text-white border-primary shadow-sm' 
          : 'bg-surface text-primary border-border-light hover:border-slate-400'
      }`;
      pill.innerHTML = `
        <span class="text-xs font-semibold mb-1 uppercase tracking-wider ${isSelected ? 'text-white/80' : 'text-primary/70'}">${dayName}</span>
        <span class="text-xl font-bold font-serif ${isSelected ? 'text-white' : 'text-primary'}">${dayNum}</span>
      `;
      
      pill.addEventListener('click', () => {
        document.querySelectorAll('#dateScroll > div').forEach(p => {
          p.className = 'flex flex-col items-center justify-center p-3 border border-border-light rounded-md cursor-pointer transition-colors bg-surface text-primary hover:border-slate-400 min-w-[70px] shrink-0 select-none';
          const span1 = p.querySelector('span:first-child');
          const span2 = p.querySelector('span:last-child');
          if (span1) span1.className = 'text-xs font-semibold mb-1 uppercase tracking-wider text-primary/70';
          if (span2) span2.className = 'text-xl font-bold font-serif text-primary';
        });
        pill.className = 'flex flex-col items-center justify-center p-3 border border-primary rounded-md cursor-pointer transition-colors bg-primary text-white shadow-sm min-w-[70px] shrink-0 select-none';
        const activeSpan1 = pill.querySelector('span:first-child');
        const activeSpan2 = pill.querySelector('span:last-child');
        if (activeSpan1) activeSpan1.className = 'text-xs font-semibold mb-1 uppercase tracking-wider text-white/80';
        if (activeSpan2) activeSpan2.className = 'text-xl font-bold font-serif text-white';
        state.date = dateStr;
        state.rawDate = localRawDate;
        updateSummary();
        fetchOccupiedSlots();
      });
      
      dateScroll.appendChild(pill);
      
      // Select first date by default
      if (i === 0) {
        state.date = dateStr;
        state.rawDate = localRawDate;
      }
    }
  }

  async function fetchOccupiedSlots() {
    const barbershopIdInput = document.getElementById('barbershopId');
    const barbershopId = barbershopIdInput ? barbershopIdInput.value : '';
    const bookingDate = state.rawDate;
    const selectedCapster = document.querySelector('input[name="capster"]:checked');
    const capsterId = selectedCapster ? selectedCapster.value : (state.capsterId || 'any');

    if (!barbershopId || !bookingDate || !timeGrid) return;

    try {
      const response = await fetch(`/book/occupied-slots?barbershop_id=${encodeURIComponent(barbershopId)}&booking_date=${encodeURIComponent(bookingDate)}&capster_id=${encodeURIComponent(capsterId)}`, {
        headers: {
          'Accept': 'application/json'
        }
      });
      const data = await response.json();

      if (data.status === 'success') {
        timeGrid.innerHTML = '';

        if (data.store_closed) {
          if (state.time) {
            state.time = '';
            updateSummary();
          }
          const closedMsg = document.createElement('div');
          closedMsg.className = 'col-span-full py-8 text-center text-sm text-slate-500 border border-dashed border-border-light rounded-md bg-surface select-none';
          closedMsg.textContent = 'Toko tutup pada tanggal ini';
          timeGrid.appendChild(closedMsg);
          return;
        }

        const allSlots = data.all_slots || [];
        const occupied = data.occupied_times || [];

        if (allSlots.length === 0) {
          if (state.time) {
            state.time = '';
            updateSummary();
          }
          const emptyMsg = document.createElement('div');
          emptyMsg.className = 'col-span-full py-8 text-center text-sm text-slate-500 border border-dashed border-border-light rounded-md bg-surface select-none';
          emptyMsg.textContent = 'Toko tutup pada tanggal ini';
          timeGrid.appendChild(emptyMsg);
          return;
        }

        // If previously selected time is occupied or not in all_slots, deselect it
        if (state.time && (occupied.includes(state.time) || !allSlots.includes(state.time))) {
          state.time = '';
          updateSummary();
        }

        allSlots.forEach(slot => {
          const isOccupied = occupied.includes(slot);
          const isSelected = (state.time === slot);

          const btn = document.createElement('button');
          btn.type = 'button';
          btn.setAttribute('data-time', slot);
          btn.textContent = slot;

          if (isOccupied) {
            btn.disabled = true;
            btn.className = 'py-3 text-sm font-semibold border border-slate-200 rounded-md select-none opacity-40 cursor-not-allowed bg-slate-200 line-through text-slate-500';
          } else {
            btn.disabled = false;
            if (isSelected) {
              btn.className = 'py-3 text-sm font-semibold border border-primary rounded-md cursor-pointer transition-colors bg-primary text-white shadow-sm select-none';
            } else {
              btn.className = 'py-3 text-sm font-semibold border border-border-light rounded-md cursor-pointer transition-colors bg-surface hover:border-slate-400 text-primary select-none';
            }

            btn.addEventListener('click', () => {
              if (btn.disabled) return;
              document.querySelectorAll('#timeGrid > button:not(:disabled)').forEach(b => {
                b.className = 'py-3 text-sm font-semibold border border-border-light rounded-md cursor-pointer transition-colors bg-surface hover:border-slate-400 text-primary select-none';
              });
              btn.className = 'py-3 text-sm font-semibold border border-primary rounded-md cursor-pointer transition-colors bg-primary text-white shadow-sm select-none';
              state.time = slot;
              updateSummary();
            });
          }

          timeGrid.appendChild(btn);
        });
      }
    } catch (err) {
      console.error('Gagal mengambil slot terisi:', err);
    }
  }

  function updateSummary() {
    // Update capster/service state
    const selectedCapster = document.querySelector('input[name="capster"]:checked');
    if (selectedCapster) {
      state.capsterId = selectedCapster.value;
      state.capster = selectedCapster.getAttribute('data-name') || selectedCapster.value;
      summCapster.textContent = state.capster;
    }

    const selectedService = document.querySelector('input[name="service"]:checked');
    if (selectedService) {
      state.serviceName = selectedService.nextElementSibling.querySelector('.service-name').textContent;
      state.serviceId = selectedService.value;
      state.price = parseInt(selectedService.getAttribute('data-price'), 10);
      state.dp = parseInt(selectedService.getAttribute('data-dp'), 10);
      state.duration = selectedService.getAttribute('data-duration');
      
      summService.textContent = state.serviceName;
      summDuration.textContent = state.duration;
      summTotal.textContent = formatIDR(state.price);
      summDP.textContent = formatIDR(state.dp);
      summRemaining.textContent = formatIDR(state.price - state.dp);
    }

    // Update Date/Time
    summDate.textContent = state.date;
    summTime.textContent = state.time ? `${state.time} WIB` : 'Select a time';

    // Form fields
    state.clientName = clientNameInput ? clientNameInput.value.trim() : '';
    state.clientPhone = clientPhoneInput ? clientPhoneInput.value.trim() : '';

    // Validation check: date, time, clientName (>= 2 chars), clientPhone (>= 8 chars)
    const hasDate = Boolean(state.date && state.date.trim().length > 0);
    const hasTime = Boolean(state.time && state.time.trim().length > 0);
    const hasName = Boolean(state.clientName && state.clientName.trim().length >= 2);
    const hasPhone = Boolean(state.clientPhone && state.clientPhone.trim().length >= 8);

    const isValid = hasDate && hasTime && hasName && hasPhone;

    if (btnCheckout) {
      btnCheckout.disabled = !isValid;
      if (isValid) {
        btnCheckout.removeAttribute('disabled');
      } else {
        btnCheckout.setAttribute('disabled', 'disabled');
      }
    }
  }

  // --- Listeners ---
  capsterRadios.forEach(r => r.addEventListener('change', () => {
    updateSummary();
    fetchOccupiedSlots();
  }));
  serviceRadios.forEach(r => r.addEventListener('change', updateSummary));
  
  ['input', 'change', 'keyup', 'paste'].forEach(evt => {
    if (clientNameInput) clientNameInput.addEventListener(evt, updateSummary);
    if (clientPhoneInput) clientPhoneInput.addEventListener(evt, updateSummary);
  });

  // --- Payment Flow (Fallback / Sync with Alpine) ---
  let timerInterval;

  function startTimer() {
    let timeLeft = 14 * 60 + 59; // 14:59
    clearInterval(timerInterval);
    
    timerInterval = setInterval(() => {
      const m = Math.floor(timeLeft / 60);
      const s = timeLeft % 60;
      if (countdownTimer) {
        countdownTimer.textContent = `${m}:${s < 10 ? '0' : ''}${s}`;
      }
      if (timeLeft <= 0) clearInterval(timerInterval);
      timeLeft--;
    }, 1000);
  }

  if (btnCheckout) {
    btnCheckout.addEventListener('click', (e) => {
      if (btnCheckout.disabled) {
        e.preventDefault();
        e.stopImmediatePropagation();
        return;
      }
      if (modalDpAmount) modalDpAmount.textContent = formatIDR(state.dp);
      if (paymentModal) paymentModal.classList.add('active');
    });
  }

  if (closePaymentModal && paymentModal) {
    closePaymentModal.addEventListener('click', () => {
      paymentModal.classList.remove('active');
      clearInterval(timerInterval);
    });
  }

  if (btnSimulateSuccess) {
    btnSimulateSuccess.addEventListener('click', async () => {
      // Show loading state
      const originalText = btnSimulateSuccess.innerHTML;
      btnSimulateSuccess.innerHTML = '<span class="animate-pulse">Processing...</span>';
      btnSimulateSuccess.disabled = true;

      const payload = {
        barbershop_id: document.getElementById('barbershopId').value,
        service_id: state.serviceId,
        capster_id: state.capsterId === 'any' ? null : state.capsterId,
        booking_date: state.rawDate,
        start_time: state.time,
        customer_name: state.clientName,
        customer_phone: state.clientPhone
      };
      
      // If 'any' is selected, we can also just pass 'any' and let backend handle it
      if (state.capsterId === 'any') {
        payload.capster_id = 'any';
      }

      const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

      try {
        const response = await fetch('/book/checkout', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrfToken
          },
          body: JSON.stringify(payload)
        });

        const data = await response.json();

        if (response.ok && data.success) {
          window.location.href = data.redirect_url + '?code=' + data.booking.booking_code;
        } else {
          // Handle error (validation or overlap)
          let errorMsg = data.message || data.error || 'Periksa kembali data Anda.';
          if (data.errors) {
             const firstError = Object.values(data.errors)[0];
             if (firstError && firstError.length > 0) errorMsg = firstError[0];
          }
          alert('Gagal: ' + errorMsg);
          btnSimulateSuccess.innerHTML = originalText;
          btnSimulateSuccess.disabled = false;
        }
      } catch (error) {
        alert('Terjadi kesalahan jaringan.');
        btnSimulateSuccess.innerHTML = originalText;
        btnSimulateSuccess.disabled = false;
      }
    });
  }

  if (btnTicketDone && ticketModal) {
    btnTicketDone.addEventListener('click', () => {
      ticketModal.classList.remove('active');
    });
  }
  
  // Method Buttons styling inside modal
  const methodBtns = document.querySelectorAll('.method-btn');
  methodBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      methodBtns.forEach(b => {
        b.classList.remove('active', 'bg-primary', 'text-white', 'border-primary');
        b.classList.add('bg-surface', 'text-primary', 'border-border-medium');
      });
      btn.classList.add('active', 'bg-primary', 'text-white', 'border-primary');
      btn.classList.remove('bg-surface', 'text-primary', 'border-border-medium');
    });
  });

  // --- Run Init ---
  initDates();
  updateSummary();
  fetchOccupiedSlots();

  // --- History Drawer Logic ---
  const drawerBookingHistory = document.getElementById('drawerBookingHistory');
  const btnOpenHistory = document.getElementById('btnOpenHistory');
  const closeHistoryDrawer = document.getElementById('closeHistoryDrawer');

  if (btnOpenHistory && drawerBookingHistory && closeHistoryDrawer) {
    const innerDrawer = drawerBookingHistory.querySelector('.transform');
    
    btnOpenHistory.addEventListener('click', () => {
      drawerBookingHistory.classList.remove('opacity-0', 'pointer-events-none');
      if (innerDrawer) {
          innerDrawer.classList.remove('translate-y-8', 'opacity-0');
          innerDrawer.classList.add('translate-y-0', 'opacity-100');
        }
    });
    
    closeHistoryDrawer.addEventListener('click', () => {
      drawerBookingHistory.classList.add('opacity-0', 'pointer-events-none');
      if (innerDrawer) {
          innerDrawer.classList.add('translate-y-8', 'opacity-0');
          innerDrawer.classList.remove('translate-y-0', 'opacity-100');
        }
    });
    
    // Close on backdrop click
    drawerBookingHistory.addEventListener('click', (e) => {
      if (e.target === drawerBookingHistory) {
        drawerBookingHistory.classList.add('opacity-0', 'pointer-events-none');
        if (innerDrawer) {
          innerDrawer.classList.add('translate-y-8', 'opacity-0');
          innerDrawer.classList.remove('translate-y-0', 'opacity-100');
        }
      }
    });

    // --- Search Tracking Logic ---
    const btnTrack = document.getElementById('btnTrack');
    const trackInput = document.getElementById('trackInput');
    const historyResults = document.getElementById('historyResults');

    if (btnTrack && trackInput && historyResults) {
      btnTrack.addEventListener('click', async () => {
        const query = trackInput.value.trim();
        if (query.length < 4) {
          alert('Masukkan minimal 4 karakter untuk pencarian.');
          return;
        }

        const originalText = btnTrack.innerHTML;
        btnTrack.innerHTML = 'Mencari...';
        btnTrack.disabled = true;

        try {
          const response = await fetch(`/book/track?query=${encodeURIComponent(query)}`);
          const result = await response.json();

          historyResults.innerHTML = ''; // clear

          if (result.status === 'success' && result.data && result.data.length > 0) {
            result.data.forEach(booking => {
              // format date & time safely (handle ISO string with T or simple date)
              const rawDate = (booking.booking_date || '').split('T')[0];
              const timePart = (booking.start_time || '00:00').substring(0, 5);
              const dateObj = rawDate ? new Date(`${rawDate}T${timePart}:00`) : null;
              const dateStr = dateObj && !isNaN(dateObj.getTime())
                ? dateObj.toLocaleDateString('id-ID', { weekday: 'short', day: 'numeric', month: 'short' })
                : (rawDate || '-');
              const timeStr = `${timePart} WIB`;
              const capsterName = booking.capster && booking.capster.user ? booking.capster.user.name : 'Any Available';
              
              // Status Badge Styling (Red for Cancelled!)
              let badgeClass = 'bg-emerald-100 text-emerald-800 border border-emerald-200';
              let badgeLabel = 'TERKONFIRMASI';
              if (booking.booking_status === 'cancelled') {
                badgeClass = 'bg-red-100 text-red-700 border border-red-200';
                badgeLabel = 'CANCELLED';
              } else if (booking.booking_status === 'completed') {
                badgeClass = 'bg-slate-100 text-slate-700 border border-slate-200';
                badgeLabel = 'SELESAI';
              } else if (booking.booking_status === 'pending') {
                badgeClass = 'bg-amber-100 text-amber-800 border border-amber-200';
                badgeLabel = 'PENDING';
              }

              const card = document.createElement('div');
              card.className = 'border border-border-light rounded-xl p-4 bg-surface';
              card.innerHTML = `
                <div class="flex justify-between items-center mb-2">
                  <span class="text-xs font-bold uppercase tracking-wider text-slate-500">${booking.booking_code}</span>
                  <span class="${badgeClass} text-[10px] px-2 py-0.5 rounded-full font-semibold uppercase">
                    ${badgeLabel}
                  </span>
                </div>
                <div class="font-bold text-primary mb-1">${booking.service ? booking.service.name : 'Layanan Pangkas'}</div>
                <div class="text-sm text-slate-600 mb-4">${dateStr} • ${timeStr} • Capster: ${capsterName}</div>
                <a href="/ticket?code=${booking.booking_code}" class="block w-full text-center bg-slate-100 hover:bg-slate-200 text-primary font-semibold py-2 rounded-lg text-sm transition-colors">
                  Lihat Tiket
                </a>
              `;
              historyResults.appendChild(card);
            });
          } else {
            historyResults.innerHTML = `
              <div class="text-center text-sm text-slate-500 py-8 border border-dashed border-border-light rounded-md">
                Data tidak ditemukan untuk "${query}".
              </div>
            `;
          }
        } catch (error) {
          alert('Terjadi kesalahan jaringan.');
        } finally {
          btnTrack.innerHTML = originalText;
          btnTrack.disabled = false;
        }
      });
      
      // Allow enter key
      trackInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
          e.preventDefault();
          btnTrack.click();
        }
      });
    }
  }

});
