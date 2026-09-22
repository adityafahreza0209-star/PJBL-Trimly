document.addEventListener('DOMContentLoaded', () => {
  // Modal Logic
  const openModal = (id) => {
    const el = document.getElementById(id);
    if (el) {
      el.classList.remove('hidden');
      el.classList.add('flex');
    }
  };
  window.openModal = openModal;
  
  window.closeModal = (id) => {
    const el = document.getElementById(id);
    if (el) {
      el.classList.add('hidden');
      el.classList.remove('flex');
    }
  };

  // Bind Open Buttons
  const btnEditProfile = document.getElementById('btnOpenEditProfile');
  if(btnEditProfile) btnEditProfile.addEventListener('click', () => openModal('modalEditCustomerProfile'));
  
  const btnReschedule = document.getElementById('btnOpenReschedule');
  if(btnReschedule) btnReschedule.addEventListener('click', () => openModal('modalReschedule'));
  
  const btnCancel = document.getElementById('btnOpenCancel');
  if(btnCancel) btnCancel.addEventListener('click', () => openModal('modalCancelBooking'));

  // Star Rating Interaction
  const stars = document.querySelectorAll('.star-icon, #starRatingContainer svg');
  let currentRating = 0;

  const updateStars = (rating) => {
    stars.forEach(star => {
      const val = parseInt(star.getAttribute('data-value'));
      if (val <= rating) {
        star.classList.remove('text-slate-200');
        star.classList.add('text-amber-400');
      } else {
        star.classList.remove('text-amber-400');
        star.classList.add('text-slate-200');
      }
    });
  };

  stars.forEach(star => {
    star.addEventListener('mouseenter', function() {
      updateStars(parseInt(this.getAttribute('data-value')));
    });

    star.addEventListener('mouseleave', function() {
      updateStars(currentRating);
    });

    star.addEventListener('click', function() {
      currentRating = parseInt(this.getAttribute('data-value'));
      updateStars(currentRating);
    });
  });

  // Submit Review
  const btnSubmitReview = document.getElementById('btnSubmitReview');
  const toast = document.getElementById('toast');
  const reviewText = document.getElementById('reviewText');

  const showToastMsg = (msg) => {
    if (!toast) return;
    toast.innerText = msg;
    toast.classList.remove('hidden');
    setTimeout(() => {
      toast.classList.add('hidden');
    }, 3000);
  };

  if (btnSubmitReview) {
    btnSubmitReview.addEventListener('click', async () => {
      if (currentRating === 0) {
        alert('Silakan pilih rating bintang terlebih dahulu.');
        return;
      }

      const reviewBookingCodeInput = document.getElementById('reviewBookingCode');
      const bookingCode = reviewBookingCodeInput ? reviewBookingCodeInput.value : '';
      const comment = reviewText ? reviewText.value : '';

      if (!bookingCode) {
        alert('Kode booking tidak ditemukan.');
        return;
      }

      const csrfMeta = document.querySelector('meta[name="csrf-token"]');
      const csrfToken = csrfMeta ? csrfMeta.getAttribute('content') : '';

      btnSubmitReview.disabled = true;

      try {
        const res = await fetch('/ticket/review', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrfToken
          },
          body: JSON.stringify({
            booking_code: bookingCode,
            rating: currentRating,
            comment: comment
          })
        });

        const data = await res.json();

        if (res.ok && (data.status === 'success' || data.success)) {
          showToastMsg('Review berhasil dikirim!');
          setTimeout(() => {
            window.location.reload();
          }, 800);
        } else {
          const errorMsg = data.message || (data.errors ? Object.values(data.errors).flat().join('\n') : 'Gagal mengirim ulasan.');
          alert(errorMsg);
          btnSubmitReview.disabled = false;
        }
      } catch (err) {
        console.error('Error submitting review:', err);
        alert('Terjadi kesalahan pada sistem. Silakan coba lagi.');
        btnSubmitReview.disabled = false;
      }
    });
  }

  // Basic Interactive pills & slots
  const datePills = document.querySelectorAll('.date-pill');
  datePills.forEach(pill => {
    pill.addEventListener('click', () => {
      datePills.forEach(p => p.classList.remove('active'));
      pill.classList.add('active');
    });
  });

  const timeSlots = document.querySelectorAll('.time-slot:not([disabled])');
  timeSlots.forEach(slot => {
    slot.addEventListener('click', () => {
      timeSlots.forEach(s => s.classList.remove('active'));
      slot.classList.add('active');
    });
  });

  // Countdown Logic
  const countdownTimer = document.getElementById('countdownTimer');
  const countdownTitle = document.getElementById('countdownTitle');
  const countdownSubtitle = document.getElementById('countdownSubtitle');

  if (countdownTimer) {
    const targetDateStr = countdownTimer.getAttribute('data-target'); // e.g. 2024-11-24T14:00:00
    const targetDate = new Date(targetDateStr).getTime();
    
    if (!isNaN(targetDate)) {
      const updateCountdown = () => {
        const now = new Date().getTime();
        const distance = targetDate - now;

        if (distance <= 0) {
          if (countdownTitle) {
            countdownTitle.textContent = "Waktu Janji Temu Telah Tiba";
            countdownTitle.className = "font-bold mb-1 text-lg text-emerald-800";
          }
          countdownTimer.className = "my-3 flex items-center justify-center gap-2 text-emerald-700 font-semibold text-base";
          countdownTimer.innerHTML = '<svg class="w-5 h-5 text-emerald-600 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 10v4h10v-4" /><path d="M5 14h14" /><path d="M12 14v4" /><path d="M8 21h8" /><path d="M9 10V5a3 3 0 0 1 6 0v5" /></svg><span>Kursi Siap • Silakan Masuk Studio</span>';
          if (countdownSubtitle) {
            countdownSubtitle.textContent = "Tunjukkan Digital Pass kepada capster untuk memulai layanan.";
            countdownSubtitle.className = "text-sm text-slate-500";
          }
          if (window.countdownInterval) clearInterval(window.countdownInterval);
          return;
        }

        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        if (countdownTitle) {
          countdownTitle.textContent = "Waktu Menuju Janji Temu";
          countdownTitle.className = "font-bold mb-2 text-lg text-foreground";
        }
        countdownTimer.className = "text-4xl font-mono font-bold text-primary mb-2";
        countdownTimer.innerHTML = 
          String(hours).padStart(2, '0') + ":" + 
          String(minutes).padStart(2, '0') + ":" + 
          String(seconds).padStart(2, '0');
        if (countdownSubtitle) {
          countdownSubtitle.textContent = "Harap datang 10 menit sebelum jadwal.";
          countdownSubtitle.className = "text-sm text-primary/60";
        }
      };

      updateCountdown(); // Run once immediately
      window.countdownInterval = setInterval(updateCountdown, 1000);
    } else {
      countdownTimer.innerHTML = "Jadwal Tidak Valid";
    }
  }
});
