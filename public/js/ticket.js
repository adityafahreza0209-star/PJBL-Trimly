document.addEventListener('DOMContentLoaded', () => {
  // Modal Logic
  const openModal = (id) => {
    document.getElementById(id).classList.add('active');
  };
  
  window.closeModal = (id) => {
    document.getElementById(id).classList.remove('active');
  };

  // Bind Open Buttons
  document.getElementById('btnOpenEditProfile').addEventListener('click', () => openModal('modalEditCustomerProfile'));
  document.getElementById('btnOpenReschedule').addEventListener('click', () => openModal('modalReschedule'));
  document.getElementById('btnOpenCancel').addEventListener('click', () => openModal('modalCancelBooking'));

  // Star Rating Interaction
  const stars = document.querySelectorAll('.star-icon');
  let currentRating = 0;

  const updateStars = (rating) => {
    stars.forEach(star => {
      const val = parseInt(star.getAttribute('data-value'));
      if (val <= rating) {
        star.classList.add('active');
      } else {
        star.classList.remove('active');
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

  // Submit Review Toast
  const btnSubmitReview = document.getElementById('btnSubmitReview');
  const toast = document.getElementById('toast');
  const reviewText = document.getElementById('reviewText');

  btnSubmitReview.addEventListener('click', () => {
    if (currentRating === 0) {
      alert('Silakan pilih rating bintang terlebih dahulu.');
      return;
    }
    
    // Show toast
    toast.classList.add('show');
    setTimeout(() => {
      toast.classList.remove('show');
    }, 3000);
    
    // Reset form
    currentRating = 0;
    updateStars(0);
    reviewText.value = '';
  });

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
});

  // Toast notifications for other actions
  const showToastMsg = (msg) => {
    toast.innerText = msg;
    toast.classList.add('show');
    setTimeout(() => {
      toast.classList.remove('show');
    }, 3000);
  };

  const confirmRescheduleBtn = document.querySelector('#modalReschedule .btn-terracotta');
  if(confirmRescheduleBtn) {
    confirmRescheduleBtn.addEventListener('click', (e) => {
      showToastMsg('Jadwal berhasil diubah!');
    });
  }

  const confirmCancelBtn = document.querySelector('#modalCancelBooking .btn-danger');
  if(confirmCancelBtn) {
    confirmCancelBtn.addEventListener('click', (e) => {
      showToastMsg('Booking berhasil dibatalkan.');
    });
  }

