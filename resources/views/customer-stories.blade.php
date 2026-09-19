<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trimly — Customer Stories</title>
  <meta name="description" content="Real Studios, Real Results. Read our customer stories.">

  <!-- Google Fonts: Playfair Display (Serif) and Geist (Sans-serif) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Geist:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
  
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-primary font-sans antialiased">

  @include('partials.header')

  <main class="pt-20">
    <!-- HERO -->
    <section class="py-24 text-center px-6">
      <h1 data-i18n="stories.title" class="font-serif text-4xl md:text-5xl font-medium tracking-tight text-primary mb-4">Real Studios, Real Results</h1>
      <p data-i18n="stories.subtitle" class="text-lg text-primary/70 max-w-2xl mx-auto">Discover how premier barbershops use Trimly to eliminate no-shows and streamline operations.</p>
    </section>

    <!-- CASE STUDIES GRID -->
    <section class="max-w-6xl mx-auto px-6 pb-24">
      <div class="grid md:grid-cols-2 lg:grid-cols-2 gap-10">
        <!-- Fajar Pratama -->
        <div class="bg-white rounded-3xl border border-border-light shadow-sm overflow-hidden flex flex-col hover:shadow-md transition-shadow">
          <div class="h-64 relative overflow-hidden bg-slate-100">
            <img 
              src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=800&q=80" 
              alt="Fajar Pratama - The Noble Barber" 
              class="w-full h-full object-cover object-top"
            />
          </div>
          <div class="p-8 flex-grow flex flex-col justify-between">
            <div>
              <div class="mb-4">
                <span class="text-4xl font-serif font-bold text-primary tracking-tight">95%</span>
                <span data-i18n="stories.s1_stat_label" class="text-sm text-primary/60 font-semibold block uppercase tracking-wider">Drop in No-Shows</span>
              </div>
              <p data-i18n="stories.s1_quote" class="text-[1.05rem] text-primary/80 leading-relaxed font-serif italic mb-6">
                "Before Trimly, late cancellations were killing our weekend revenue. Implementing Midtrans DP through their booking link completely solved the problem on day one."
              </p>
            </div>
            <div class="pt-6 border-t border-border-light">
              <div class="font-bold text-primary text-base">Fajar Pratama</div>
              <div data-i18n="stories.s1_role" class="text-xs text-primary/70">Founder & Head Barber • The Noble Barber</div>
            </div>
          </div>
        </div>

        <!-- Dummy 1 -->
        <div class="bg-white rounded-3xl border border-border-light shadow-sm overflow-hidden flex flex-col hover:shadow-md transition-shadow">
          <div class="h-64 relative overflow-hidden bg-slate-100">
            <img 
              src="https://images.unsplash.com/photo-1622286342621-4bd786c2447c?auto=format&fit=crop&w=800&q=80" 
              alt="Gentleman & Sons Barber" 
              class="w-full h-full object-cover object-center"
            />
          </div>
          <div class="p-8 flex-grow flex flex-col justify-between">
            <div>
              <div class="mb-4">
                <span class="text-4xl font-serif font-bold text-primary tracking-tight">Rp 5.4M</span>
                <span data-i18n="stories.s2_stat_label" class="text-sm text-primary/60 font-semibold block uppercase tracking-wider">Recovered Monthly</span>
              </div>
              <p data-i18n="stories.s2_quote" class="text-[1.05rem] text-primary/80 leading-relaxed font-serif italic mb-6">
                "The automated commissions feature saved us hours of manual calculation every week. Our barbers can check their earnings in real-time, boosting morale instantly."
              </p>
            </div>
            <div class="pt-6 border-t border-border-light">
              <div class="font-bold text-primary text-base">Rizky Adiputra</div>
              <div data-i18n="stories.s2_role" class="text-xs text-primary/70">Owner • Gentleman & Sons</div>
            </div>
          </div>
        </div>

        <!-- Dummy 2 -->
        <div class="bg-white rounded-3xl border border-border-light shadow-sm overflow-hidden flex flex-col hover:shadow-md transition-shadow">
          <div class="h-64 relative overflow-hidden bg-slate-100">
            <img 
              src="https://images.unsplash.com/photo-1593702288056-ccbfb59f3306?auto=format&fit=crop&w=800&q=80" 
              alt="Crown & Blade" 
              class="w-full h-full object-cover object-center"
            />
          </div>
          <div class="p-8 flex-grow flex flex-col justify-between">
            <div>
              <div class="mb-4">
                <span class="text-4xl font-serif font-bold text-primary tracking-tight">32%</span>
                <span data-i18n="stories.s3_stat_label" class="text-sm text-primary/60 font-semibold block uppercase tracking-wider">Faster Booking Time</span>
              </div>
              <p data-i18n="stories.s3_quote" class="text-[1.05rem] text-primary/80 leading-relaxed font-serif italic mb-6">
                "Clients love the frictionless Instagram booking. They don't have to wait for our admin to reply on WhatsApp anymore. It's direct, clean, and extremely fast."
              </p>
            </div>
            <div class="pt-6 border-t border-border-light">
              <div class="font-bold text-primary text-base">Sarah Wijaya</div>
              <div data-i18n="stories.s3_role" class="text-xs text-primary/70">Operations Manager • Crown & Blade</div>
            </div>
          </div>
        </div>
        
        <!-- Dummy 3 -->
        <div class="bg-white rounded-3xl border border-border-light shadow-sm overflow-hidden flex flex-col hover:shadow-md transition-shadow">
          <div class="h-64 relative overflow-hidden bg-slate-100">
            <img 
              src="https://images.unsplash.com/photo-1503951914875-452162b0f3f1?auto=format&fit=crop&w=800&q=80" 
              alt="Heritage Grooming" 
              class="w-full h-full object-cover object-center"
            />
          </div>
          <div class="p-8 flex-grow flex flex-col justify-between">
            <div>
              <div class="mb-4">
                <span class="text-4xl font-serif font-bold text-primary tracking-tight">100%</span>
                <span data-i18n="stories.s4_stat_label" class="text-sm text-primary/60 font-semibold block uppercase tracking-wider">Sync with POS</span>
              </div>
              <p data-i18n="stories.s4_quote" class="text-[1.05rem] text-primary/80 leading-relaxed font-serif italic mb-6">
                "We ditched our bulky EDC and old POS system. Trimly's web dashboard handles payments and schedules perfectly from an iPad. It feels like the future."
              </p>
            </div>
            <div class="pt-6 border-t border-border-light">
              <div class="font-bold text-primary text-base">Kevin Santoso</div>
              <div data-i18n="stories.s4_role" class="text-xs text-primary/70">Co-Founder • Heritage Grooming</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    @include('partials.cta')
    @include('partials.footer')
  </main>

  <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
