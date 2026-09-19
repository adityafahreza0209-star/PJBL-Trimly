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
        updateSummary();
      });
      
      dateScroll.appendChild(pill);
      
      // Select first date by default
      if (i === 0) state.date = dateStr;
    }
  }

  function initTimes() {
    timeGrid.innerHTML = '';
    // Generate times from 10:00 to 20:00
    for (let h = 10; h <= 20; h++) {
      ['00', '30'].forEach(m => {
        const timeStr = `${h}:${m}`;
        const btn = document.createElement('button');
        btn.type = 'button';
        btn.className = 'py-3 text-sm font-semibold border border-border-light rounded-md cursor-pointer transition-colors bg-surface hover:border-slate-400 text-primary select-none disabled:opacity-35 disabled:cursor-not-allowed disabled:bg-gray-100 disabled:text-gray-400 disabled:border-gray-200';
        btn.textContent = timeStr;
        
        // Randomly disable some slots for realism
        if (Math.random() > 0.8) {
          btn.disabled = true;
        }

        btn.addEventListener('click', () => {
          document.querySelectorAll('#timeGrid > button:not(:disabled)').forEach(b => {
            b.className = 'py-3 text-sm font-semibold border border-border-light rounded-md cursor-pointer transition-colors bg-surface hover:border-slate-400 text-primary select-none';
          });
          btn.className = 'py-3 text-sm font-semibold border border-primary rounded-md cursor-pointer transition-colors bg-primary text-white shadow-sm select-none';
          state.time = timeStr;
          updateSummary();
        });

        timeGrid.appendChild(btn);
      });
    }
  }

  function updateSummary() {
    // Update capster/service state
    const selectedCapster = document.querySelector('input[name="capster"]:checked');
    if (selectedCapster) {
      state.capster = selectedCapster.value;
      if (state.capster === 'Fajar Pratama') summCapster.textContent = 'Fajar P.';
      else if (state.capster === 'Aditya Wijaya') summCapster.textContent = 'Aditya W.';
      else if (state.capster === 'Rendra Kusuma') summCapster.textContent = 'Rendra K.';
      else summCapster.textContent = 'Any Available';
    }

    const selectedService = document.querySelector('input[name="service"]:checked');
    if (selectedService) {
      state.serviceName = selectedService.nextElementSibling.querySelector('.service-name').textContent;
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
  capsterRadios.forEach(r => r.addEventListener('change', updateSummary));
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
    btnSimulateSuccess.addEventListener('click', () => {
      window.location.href = '/booking-success';
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
  initTimes();
  updateSummary();

  // --- History Drawer Logic ---
  const drawerBookingHistory = document.getElementById('drawerBookingHistory');
  const btnOpenHistory = document.getElementById('btnOpenHistory');
  const closeHistoryDrawer = document.getElementById('closeHistoryDrawer');

  if (btnOpenHistory && drawerBookingHistory && closeHistoryDrawer) {
    btnOpenHistory.addEventListener('click', () => {
      drawerBookingHistory.classList.add('active');
    });
    closeHistoryDrawer.addEventListener('click', () => {
      drawerBookingHistory.classList.remove('active');
    });
    
    // Close on backdrop click
    drawerBookingHistory.addEventListener('click', (e) => {
      if (e.target === drawerBookingHistory) {
        drawerBookingHistory.classList.remove('active');
      }
    });
  }

});
