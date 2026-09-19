<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trimly — Blog & Resources</title>
  <meta name="description" content="Resources for Modern Grooming Studios">

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
      <h1 data-i18n="blog_page.title" class="font-serif text-4xl md:text-5xl font-medium tracking-tight text-primary mb-4">Resources for Modern Grooming Studios</h1>
      <p data-i18n="blog_page.subtitle" class="text-lg text-primary/70 max-w-2xl mx-auto">Insights, strategies, and industry trends to help you scale your barbershop business.</p>
    </section>

    <!-- BLOG GRID -->
    <section class="max-w-6xl mx-auto px-6 pb-24">
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        
        <!-- Article 1 -->
        <a href="#" class="group block bg-white rounded-3xl border border-border-light overflow-hidden shadow-sm hover:shadow-md transition-all hover:-translate-y-1">
          <div class="h-56 relative overflow-hidden bg-slate-100">
            <img 
              src="https://images.unsplash.com/photo-1593702275687-f8b402bf1fb5?auto=format&fit=crop&w=800&q=80" 
              alt="5 Ways to Cut Down No-Shows at Your Studio" 
              class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
            />
          </div>
          <div class="p-6">
            <div data-i18n="blog_page.a1_category" class="text-[10px] uppercase tracking-wider text-accent font-bold mb-3">Management</div>
            <h3 data-i18n="blog_page.a1_title" class="font-serif text-xl font-bold text-primary mb-3 leading-snug group-hover:text-accent transition-colors">
              5 Ways to Cut Down No-Shows at Your Studio
            </h3>
            <p data-i18n="blog_page.a1_desc" class="text-sm text-primary/70 mb-4 line-clamp-2">
              Empty chairs mean lost revenue. Learn how modern studios are using deposits and automated reminders to guarantee their schedules.
            </p>
            <div data-i18n="blog_page.a1_date" class="text-xs text-primary/50 font-medium">
              October 12, 2026
            </div>
          </div>
        </a>

        <!-- Article 2 -->
        <a href="#" class="group block bg-white rounded-3xl border border-border-light overflow-hidden shadow-sm hover:shadow-md transition-all hover:-translate-y-1">
          <div class="h-56 relative overflow-hidden bg-slate-100">
            <img 
              src="https://images.unsplash.com/photo-1599351431202-1e0f0137899a?auto=format&fit=crop&w=800&q=80" 
              alt="How to Structure Capster Commission Splits Fairly" 
              class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
            />
          </div>
          <div class="p-6">
            <div data-i18n="blog_page.a2_category" class="text-[10px] uppercase tracking-wider text-emerald-600 font-bold mb-3">Team & Culture</div>
            <h3 data-i18n="blog_page.a2_title" class="font-serif text-xl font-bold text-primary mb-3 leading-snug group-hover:text-accent transition-colors">
              How to Structure Capster Commission Splits Fairly
            </h3>
            <p data-i18n="blog_page.a2_desc" class="text-sm text-primary/70 mb-4 line-clamp-2">
              Finding the right balance between studio profitability and barber retention is key. We break down the most popular compensation models.
            </p>
            <div data-i18n="blog_page.a2_date" class="text-xs text-primary/50 font-medium">
              September 28, 2026
            </div>
          </div>
        </a>

        <!-- Article 3 -->
        <a href="#" class="group block bg-white rounded-3xl border border-border-light overflow-hidden shadow-sm hover:shadow-md transition-all hover:-translate-y-1">
          <div class="h-56 relative overflow-hidden bg-slate-100">
            <img 
              src="https://images.unsplash.com/photo-1521482068995-bb049e35b719?auto=format&fit=crop&w=800&q=80" 
              alt="Why Deposits Are Becoming Standard in Grooming Businesses" 
              class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
            />
          </div>
          <div class="p-6">
            <div data-i18n="blog_page.a3_category" class="text-[10px] uppercase tracking-wider text-amber-600 font-bold mb-3">Industry Trends</div>
            <h3 data-i18n="blog_page.a3_title" class="font-serif text-xl font-bold text-primary mb-3 leading-snug group-hover:text-accent transition-colors">
              Why Deposits Are Becoming Standard in Grooming Businesses
            </h3>
            <p data-i18n="blog_page.a3_desc" class="text-sm text-primary/70 mb-4 line-clamp-2">
              The grooming industry is shifting. Discover why top-tier barbershops are no longer accepting bookings without an upfront commitment.
            </p>
            <div data-i18n="blog_page.a3_date" class="text-xs text-primary/50 font-medium">
              September 15, 2026
            </div>
          </div>
        </a>
        
        <!-- Article 4 -->
        <a href="#" class="group block bg-white rounded-3xl border border-border-light overflow-hidden shadow-sm hover:shadow-md transition-all hover:-translate-y-1">
          <div class="h-56 relative overflow-hidden bg-slate-100">
            <img 
              src="https://images.unsplash.com/photo-1621605815971-fbc98d665033?auto=format&fit=crop&w=800&q=80" 
              alt="Creating a Frictionless Booking Experience" 
              class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
            />
          </div>
          <div class="p-6">
            <div data-i18n="blog_page.a4_category" class="text-[10px] uppercase tracking-wider text-accent font-bold mb-3">Productivity</div>
            <h3 data-i18n="blog_page.a4_title" class="font-serif text-xl font-bold text-primary mb-3 leading-snug group-hover:text-accent transition-colors">
              Creating a Frictionless Booking Experience
            </h3>
            <p data-i18n="blog_page.a4_desc" class="text-sm text-primary/70 mb-4 line-clamp-2">
              If your clients have to DM you to book an appointment, you're losing money. Here's how to automate the entire process.
            </p>
            <div data-i18n="blog_page.a4_date" class="text-xs text-primary/50 font-medium">
              August 30, 2026
            </div>
          </div>
        </a>

      </div>
    </section>

    @include('partials.cta')
    @include('partials.footer')
  </main>

  <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
