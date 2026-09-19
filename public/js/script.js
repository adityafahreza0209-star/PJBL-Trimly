/**
 * TRIMLY — B2B SaaS Platform
 * Interactive JavaScript Controllers
 */

document.addEventListener('DOMContentLoaded', () => {

  // ==================== 1. STICKY NAVBAR ====================
  const navbar = document.getElementById('navbar');
  if (navbar) {
    window.addEventListener('scroll', () => {
      if (window.scrollY > 30) {
        navbar.style.boxShadow = '0 4px 20px -2px rgba(20, 34, 29, 0.05)';
      } else {
        navbar.style.boxShadow = 'none';
      }
    });
  }

  // ==================== 2. ROI CALCULATOR ====================
  const inputChairs = document.getElementById('inputChairs');
  const inputPrice = document.getElementById('inputPrice');
  const inputBookings = document.getElementById('inputBookings');

  const valChairs = document.getElementById('valChairs');
  const valPrice = document.getElementById('valPrice');
  const valBookings = document.getElementById('valBookings');
  const valRecovered = document.getElementById('valRecovered');

  function formatIDR(num) {
    return 'Rp ' + Number(num).toLocaleString('id-ID');
  }

  function calculateROI() {
    if (!inputChairs || !inputPrice || !inputBookings) return;

    const lang = localStorage.getItem('trimly_lang') || 'en';
    const isId = lang === 'id';

    const chairs = parseInt(inputChairs.value, 10);
    const avgTicket = parseInt(inputPrice.value, 10);
    const apptsPerChair = parseInt(inputBookings.value, 10);

    valChairs.textContent = isId ? `${chairs} Kursi` : `${chairs} Chair${chairs > 1 ? 's' : ''}`;
    valPrice.textContent = formatIDR(avgTicket);
    valBookings.textContent = isId ? `${apptsPerChair} Booking` : `${apptsPerChair} Bookings`;

    // Calculation: Total Monthly Bookings = chairs * apptsPerChair
    // Studio recovers 15% guaranteed revenue from ghost slots based on a 50% DP
    const totalBookings = chairs * apptsPerChair;
    const recoveredMonthly = Math.round(totalBookings * 0.15 * (avgTicket * 0.5));

    valRecovered.textContent = formatIDR(recoveredMonthly);
  }

  if (inputChairs && inputPrice && inputBookings) {
    inputChairs.addEventListener('input', calculateROI);
    inputPrice.addEventListener('input', calculateROI);
    inputBookings.addEventListener('input', calculateROI);
    calculateROI(); // Initial run
  }

  // ==================== 3. PRICING BILLING TOGGLE ====================
  const btnToggleBilling = document.getElementById('btnToggleBilling');
  const labelMonthly = document.getElementById('labelMonthly');
  const labelAnnual = document.getElementById('labelAnnual');
  const priceEssential = document.getElementById('priceEssential');
  const priceArchitect = document.getElementById('priceArchitect');
  const noteEssential = document.getElementById('noteEssential');
  const noteArchitect = document.getElementById('noteArchitect');

  let isAnnual = true; // Default to Annual

  function updatePricing() {
    if (!priceEssential || !priceArchitect) return;

    const toggleKnob = document.getElementById('toggleKnob') || (btnToggleBilling ? btnToggleBilling.querySelector('span') : null);

    if (isAnnual) {
      if (btnToggleBilling) {
        btnToggleBilling.setAttribute('aria-pressed', 'true');
      }
      if (toggleKnob) {
        toggleKnob.style.transform = 'translateX(24px)';
      }
      if (labelAnnual) {
        labelAnnual.classList.remove('opacity-50', 'font-medium');
        labelAnnual.classList.add('font-bold', 'opacity-100');
      }
      if (labelMonthly) {
        labelMonthly.classList.remove('font-bold', 'opacity-100');
        labelMonthly.classList.add('font-medium', 'opacity-50');
      }
      
      const lang = localStorage.getItem('trimly_lang') || 'en';
      const isId = lang === 'id';

      priceEssential.textContent = '239.000';
      priceArchitect.textContent = '559.000';
      noteEssential.textContent = isId ? 'Ditagih tahunan (Rp 2.868.000/thn)' : 'Billed annually (Rp 2.868.000/yr)';
      noteArchitect.textContent = isId ? 'Ditagih tahunan (Rp 6.708.000/thn)' : 'Billed annually (Rp 6.708.000/yr)';
    } else {
      if (btnToggleBilling) {
        btnToggleBilling.setAttribute('aria-pressed', 'false');
      }
      if (toggleKnob) {
        toggleKnob.style.transform = 'translateX(0px)';
      }
      if (labelMonthly) {
        labelMonthly.classList.remove('opacity-50', 'font-medium');
        labelMonthly.classList.add('font-bold', 'opacity-100');
      }
      if (labelAnnual) {
        labelAnnual.classList.remove('font-bold', 'opacity-100');
        labelAnnual.classList.add('font-medium', 'opacity-50');
      }
      
      const lang = localStorage.getItem('trimly_lang') || 'en';
      const isId = lang === 'id';

      priceEssential.textContent = '299.000';
      priceArchitect.textContent = '699.000';
      noteEssential.textContent = isId ? 'Ditagih bulanan (Batal kapan saja)' : 'Billed monthly (Cancel anytime)';
      noteArchitect.textContent = isId ? 'Ditagih bulanan (Batal kapan saja)' : 'Billed monthly (Cancel anytime)';
    }
  }

  window.addEventListener('trimly:languageChanged', () => {
    calculateROI();
    updatePricing();
  });

  if (btnToggleBilling) {
    btnToggleBilling.addEventListener('click', (e) => {
      e.preventDefault();
      isAnnual = !isAnnual;
      updatePricing();
    });

    if (labelMonthly) {
      labelMonthly.addEventListener('click', () => {
        isAnnual = false;
        updatePricing();
      });
    }

    if (labelAnnual) {
      labelAnnual.addEventListener('click', () => {
        isAnnual = true;
        updatePricing();
      });
    }

    // Initialize toggle state on page load
    updatePricing();
  }

  // ==================== 4. FAQ ACCORDION ====================
  const faqItems = document.querySelectorAll('.faq-item');

  faqItems.forEach(item => {
    const trigger = item.querySelector('.faq-trigger');
    const content = item.querySelector('.faq-content');
    const icon = item.querySelector('.faq-icon');
    
    if (trigger) {
      trigger.addEventListener('click', () => {
        const isOpen = content && !content.classList.contains('hidden');

        // Close all others
        faqItems.forEach(other => {
          const otherContent = other.querySelector('.faq-content');
          const otherIcon = other.querySelector('.faq-icon');
          if (otherContent) otherContent.classList.add('hidden');
          if (otherIcon) otherIcon.textContent = '+';
        });

        // Toggle current
        if (content) {
          if (isOpen) {
            content.classList.add('hidden');
            if (icon) icon.textContent = '+';
          } else {
            content.classList.remove('hidden');
            if (icon) icon.textContent = '−';
          }
        }
      });
    }
  });

  // ==================== 5. TESTIMONIAL CAROUSEL (MOKA STYLE) ====================
  const testimonialSlides = document.querySelectorAll('.testimonial-slide');
  const btnPrevTestimonial = document.getElementById('btnPrevTestimonial');
  const btnNextTestimonial = document.getElementById('btnNextTestimonial');
  const testimonialDots = document.querySelectorAll('.testimonial-dot');
  let activeSlide = 0;

  function setSlide(idx) {
    if (!testimonialSlides.length) return;
    if (idx < 0) idx = testimonialSlides.length - 1;
    if (idx >= testimonialSlides.length) idx = 0;
    activeSlide = idx;

    testimonialSlides.forEach((slide, i) => {
      if (i === activeSlide) {
        slide.classList.remove('hidden');
        slide.classList.add('grid');
      } else {
        slide.classList.add('hidden');
        slide.classList.remove('grid');
      }
    });

    testimonialDots.forEach((dot, i) => {
      if (i === activeSlide) {
        dot.classList.add('bg-accent', 'w-8');
        dot.classList.remove('bg-slate-300', 'w-2.5');
      } else {
        dot.classList.remove('bg-accent', 'w-8');
        dot.classList.add('bg-slate-300', 'w-2.5');
      }
    });
  }

  if (btnPrevTestimonial) {
    btnPrevTestimonial.addEventListener('click', () => setSlide(activeSlide - 1));
  }
  if (btnNextTestimonial) {
    btnNextTestimonial.addEventListener('click', () => setSlide(activeSlide + 1));
  }
  testimonialDots.forEach((dot, i) => {
    dot.addEventListener('click', () => setSlide(i));
  });

});