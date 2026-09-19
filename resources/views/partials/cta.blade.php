    <!-- PRE-FOOTER FULL-BLEED CTA (MOODY BARBERSHOP INTERIOR + DARK OVERLAY) -->
    <section class="relative py-28 overflow-hidden bg-primary text-white isolate">
      <!-- Full Bleed Atmospheric Barbershop Photo Background -->
      <img 
        src="https://images.unsplash.com/photo-1585747860715-2ba37e788b70?auto=format&fit=crop&w=1600&q=80" 
        alt="Atmospheric Barbershop Interior" 
        class="absolute inset-0 w-full h-full object-cover object-center z-0 opacity-25 mix-blend-luminosity pointer-events-none"
      />
      <!-- Dark Green Gradient Overlay for Luxury Contrast -->
      <div class="absolute inset-0 bg-gradient-to-b from-primary/95 via-primary/90 to-primary/95 z-10 pointer-events-none"></div>
      
      <div class="max-w-[1240px] mx-auto px-6 lg:px-8 text-center text-white relative z-20">
        <h2 class="font-serif text-[clamp(2.3rem,4vw,3.6rem)] font-medium leading-[1.12] tracking-tight mb-6 max-w-3xl mx-auto text-white" data-i18n="cta.title">
          Your Chairs Deserve to Stay Full.
        </h2>

        <p class="text-[1.1rem] text-white/80 max-w-2xl mx-auto mb-10 leading-relaxed" data-i18n="cta.subtitle">
          Join premier grooming studios running on automated, zero-friction reservations. Launch your studio workspace in 5 minutes.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 max-w-md mx-auto">
          <x-button-accent size="large" href="{{ url('register') }}" class="w-full sm:w-auto shadow-sm hover:shadow text-center justify-center" data-i18n="cta.btn1">
            Claim Your Workspace
          </x-button-accent>
          <a href="{{ url('book') }}" class="w-full sm:w-auto px-8 py-4 text-base font-semibold border border-white/30 bg-white/10 hover:bg-white/20 backdrop-blur-md text-white rounded-sm hover:-translate-y-px transition-all text-center justify-center" data-i18n="cta.btn2">
            View Demo Portal
          </a>
        </div>

        <div class="mt-8 text-xs text-white/60 flex items-center justify-center gap-6">
          <span data-i18n="cta.point1">✓ No Long-Term Contracts</span>
          <span data-i18n="cta.point2">✓ Free 1-on-1 Setup Guidance</span>
        </div>
      </div>
    </section>
