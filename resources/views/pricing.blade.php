<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trimly — Pricing</title>
  <meta name="description" content="Transparent Pricing for Growing Studios">

  <!-- Google Fonts: Playfair Display (Serif) and Geist (Sans-serif) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Geist:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
  
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-primary font-sans antialiased">

  @include('partials.header')

  <main class="pt-20">
    <!-- PRICING HERO -->
    <section class="py-24 text-center px-6">
      <h1 data-i18n="pricing_page.title" class="font-serif text-4xl md:text-5xl font-medium tracking-tight text-primary mb-4">Transparent Pricing for Growing Studios</h1>
      <p data-i18n="pricing_page.subtitle" class="text-lg text-primary/70 max-w-2xl mx-auto">No hidden fees, no long-term lock-ins. Upgrade when you need it.</p>
    </section>

    <!-- PRICING CARDS & TABLE -->
    <section class="max-w-5xl mx-auto px-6 pb-24">
      <div class="grid md:grid-cols-2 gap-8 mb-16">
        <!-- Essential Card -->
        <div class="bg-surface rounded-2xl border border-border-light p-8 shadow-sm flex flex-col h-full relative">
          <div class="mb-8">
            <h3 data-i18n="pricing_page.essential_name" class="font-serif text-2xl font-bold text-primary mb-2">Essential</h3>
            <p data-i18n="pricing_page.essential_desc" class="text-sm text-primary/60 mb-6 min-h-[40px]">Perfect for single-location studios ready to digitize bookings.</p>
            <div class="flex items-end gap-1 mb-2">
              <span class="text-sm font-bold text-primary/60 mb-1">Rp</span>
              <span class="text-4xl font-serif text-primary font-bold">149k</span>
              <span data-i18n="pricing_page.period" class="text-sm text-primary/60 mb-1">/mo</span>
            </div>
            <p data-i18n="pricing_page.billed_monthly" class="text-[10px] uppercase tracking-wider text-primary/40 font-bold">Billed Monthly</p>
          </div>
          <div class="mb-8">
            <x-button-outline size="large" href="{{ url('register') }}" fullWidth="true" class="mb-2 justify-center"><span data-i18n="pricing_page.trial_btn">Start 14-Day Free Trial</span></x-button-outline>
            <p data-i18n="pricing_page.no_cc" class="text-center text-[10px] text-primary/50">No credit card required</p>
          </div>
          <ul class="space-y-4 text-sm text-primary/75 mb-8 flex-grow">
            <li class="flex items-start gap-3">
              <span class="text-emerald-500 mt-0.5">✓</span>
              <span data-i18n="pricing_page.f_chairs_3">Up to 3 Barber Chairs</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="text-emerald-500 mt-0.5">✓</span>
              <span data-i18n="pricing_page.f_midtrans_dp">Automated Midtrans DP</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="text-emerald-500 mt-0.5">✓</span>
              <span data-i18n="pricing_page.f_basic_link">Basic Instagram Booking Link</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="text-emerald-500 mt-0.5">✓</span>
              <span data-i18n="pricing_page.f_reports">Daily Settlement Reports</span>
            </li>
          </ul>
        </div>

        <!-- Architect Card -->
        <div class="bg-white rounded-2xl border-2 border-accent p-8 shadow-xl shadow-accent/5 flex flex-col h-full relative transform md:-translate-y-4">
          <div data-i18n="pricing_page.popular_badge" class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-accent text-white text-[10px] font-bold uppercase tracking-widest px-3 py-1 rounded-full shadow-sm">
            Most Popular
          </div>
          <div class="mb-8">
            <h3 data-i18n="pricing_page.architect_name" class="font-serif text-2xl font-bold text-primary mb-2">Architect</h3>
            <p data-i18n="pricing_page.architect_desc" class="text-sm text-primary/60 mb-6 min-h-[40px]">Advanced operations for premium barbershops and chains.</p>
            <div class="flex items-end gap-1 mb-2">
              <span class="text-sm font-bold text-primary/60 mb-1">Rp</span>
              <span class="text-4xl font-serif text-primary font-bold">399k</span>
              <span data-i18n="pricing_page.period" class="text-sm text-primary/60 mb-1">/mo</span>
            </div>
            <p data-i18n="pricing_page.billed_monthly" class="text-[10px] uppercase tracking-wider text-primary/40 font-bold">Billed Monthly</p>
          </div>
          <div class="mb-8">
            <x-button-accent size="large" href="{{ url('register') }}" fullWidth="true" class="mb-2 justify-center shadow-md"><span data-i18n="pricing_page.trial_btn">Start 14-Day Free Trial</span></x-button-accent>
            <p data-i18n="pricing_page.no_cc" class="text-center text-[10px] text-primary/50">No credit card required</p>
          </div>
          <ul class="space-y-4 text-sm text-primary/75 mb-8 flex-grow font-medium">
            <li class="flex items-start gap-3">
              <span class="text-accent mt-0.5">✓</span>
              <span data-i18n="pricing_page.f_chairs_unlimited" class="text-primary font-semibold">Unlimited Barber Chairs</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="text-accent mt-0.5">✓</span>
              <span data-i18n="pricing_page.f_custom_domain">Custom Domain Booking Portal</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="text-accent mt-0.5">✓</span>
              <span data-i18n="pricing_page.f_auto_commissions">Automated Capster Commissions</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="text-accent mt-0.5">✓</span>
              <span data-i18n="pricing_page.f_crm">Advanced CRM & Analytics</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="text-accent mt-0.5">✓</span>
              <span data-i18n="pricing_page.f_priority_support">Priority WhatsApp Support</span>
            </li>
          </ul>
        </div>
      </div>

      <!-- Comparison Table -->
      <div class="overflow-x-auto border-t border-border-light pt-12">
        <h2 data-i18n="pricing_page.compare_title" class="font-serif text-3xl text-primary text-center mb-8">Compare Plans</h2>
        <table class="w-full text-left border-collapse min-w-[600px]">
          <thead>
            <tr>
              <th data-i18n="pricing_page.th_features" class="py-4 px-6 text-sm font-medium text-primary/60 uppercase tracking-wider border-b border-border-light w-1/2">Features</th>
              <th class="py-4 px-6 text-sm font-bold text-primary border-b border-border-light w-1/4 text-center">Essential</th>
              <th class="py-4 px-6 text-sm font-bold text-accent border-b border-border-light w-1/4 text-center bg-accent/5 rounded-t-lg">Architect</th>
            </tr>
          </thead>
          <tbody class="text-sm">
            <!-- Category: Booking & Scheduling -->
            <tr class="bg-surface/50">
              <td data-i18n="pricing_page.cat_booking" colspan="3" class="py-3 px-6 font-semibold text-primary">Booking & Scheduling</td>
            </tr>
            <tr class="border-b border-border-light">
              <td data-i18n="pricing_page.row_chairs" class="py-4 px-6 text-primary/80">Barber Chairs</td>
              <td data-i18n="pricing_page.val_chairs_up3" class="py-4 px-6 text-center text-primary/80">Up to 3</td>
              <td data-i18n="pricing_page.val_chairs_unlimited" class="py-4 px-6 text-center font-semibold text-primary bg-accent/5">Unlimited</td>
            </tr>
            <tr class="border-b border-border-light">
              <td data-i18n="pricing_page.row_ig_link" class="py-4 px-6 text-primary/80">Instagram Booking Link</td>
              <td class="py-4 px-6 text-center text-emerald-500">✓</td>
              <td class="py-4 px-6 text-center text-emerald-500 bg-accent/5">✓</td>
            </tr>
            <tr class="border-b border-border-light">
              <td data-i18n="pricing_page.row_domain" class="py-4 px-6 text-primary/80">Custom Domain Portal</td>
              <td class="py-4 px-6 text-center text-primary/30">—</td>
              <td class="py-4 px-6 text-center text-emerald-500 bg-accent/5">✓</td>
            </tr>
            
            <!-- Category: Payments -->
            <tr class="bg-surface/50 border-b border-border-light">
              <td data-i18n="pricing_page.cat_payments" colspan="3" class="py-3 px-6 font-semibold text-primary">Payments</td>
            </tr>
            <tr class="border-b border-border-light">
              <td data-i18n="pricing_page.row_dp" class="py-4 px-6 text-primary/80">Automated Midtrans DP</td>
              <td class="py-4 px-6 text-center text-emerald-500">✓</td>
              <td class="py-4 px-6 text-center text-emerald-500 bg-accent/5">✓</td>
            </tr>
            <tr class="border-b border-border-light">
              <td data-i18n="pricing_page.row_settle" class="py-4 px-6 text-primary/80">Direct to Bank Settlement</td>
              <td class="py-4 px-6 text-center text-emerald-500">✓</td>
              <td class="py-4 px-6 text-center text-emerald-500 bg-accent/5">✓</td>
            </tr>
            <tr class="border-b border-border-light">
              <td data-i18n="pricing_page.row_commissions" class="py-4 px-6 text-primary/80">Automated Capster Commissions</td>
              <td class="py-4 px-6 text-center text-primary/30">—</td>
              <td class="py-4 px-6 text-center text-emerald-500 bg-accent/5">✓</td>
            </tr>
            
            <!-- Category: Team Management -->
            <tr class="bg-surface/50 border-b border-border-light">
              <td data-i18n="pricing_page.cat_team" colspan="3" class="py-3 px-6 font-semibold text-primary">Team Management</td>
            </tr>
            <tr class="border-b border-border-light">
              <td data-i18n="pricing_page.row_staff" class="py-4 px-6 text-primary/80">Staff Accounts</td>
              <td class="py-4 px-6 text-center text-primary/80">3</td>
              <td data-i18n="pricing_page.val_chairs_unlimited" class="py-4 px-6 text-center font-semibold text-primary bg-accent/5">Unlimited</td>
            </tr>
            <tr class="border-b border-border-light">
              <td data-i18n="pricing_page.row_capster_app" class="py-4 px-6 text-primary/80">Capster App Access</td>
              <td class="py-4 px-6 text-center text-emerald-500">✓</td>
              <td class="py-4 px-6 text-center text-emerald-500 bg-accent/5">✓</td>
            </tr>

            <!-- Category: Reporting & Analytics -->
            <tr class="bg-surface/50 border-b border-border-light">
              <td data-i18n="pricing_page.cat_reporting" colspan="3" class="py-3 px-6 font-semibold text-primary">Reporting & Analytics</td>
            </tr>
            <tr class="border-b border-border-light">
              <td data-i18n="pricing_page.row_daily_reports" class="py-4 px-6 text-primary/80">Daily Settlement Reports</td>
              <td class="py-4 px-6 text-center text-emerald-500">✓</td>
              <td class="py-4 px-6 text-center text-emerald-500 bg-accent/5">✓</td>
            </tr>
            <tr class="border-b border-border-light">
              <td data-i18n="pricing_page.row_crm" class="py-4 px-6 text-primary/80">Advanced CRM & Analytics</td>
              <td class="py-4 px-6 text-center text-primary/30">—</td>
              <td class="py-4 px-6 text-center text-emerald-500 bg-accent/5">✓</td>
            </tr>

            <!-- Category: Support -->
            <tr class="bg-surface/50 border-b border-border-light">
              <td data-i18n="pricing_page.cat_support" colspan="3" class="py-3 px-6 font-semibold text-primary">Support</td>
            </tr>
            <tr class="border-b border-border-light">
              <td data-i18n="pricing_page.row_email_support" class="py-4 px-6 text-primary/80">Email Support</td>
              <td class="py-4 px-6 text-center text-emerald-500">✓</td>
              <td class="py-4 px-6 text-center text-emerald-500 bg-accent/5">✓</td>
            </tr>
            <tr>
              <td data-i18n="pricing_page.row_wa_support" class="py-4 px-6 text-primary/80 border-b border-border-light">Priority WhatsApp Support</td>
              <td class="py-4 px-6 text-center text-primary/30 border-b border-border-light">—</td>
              <td class="py-4 px-6 text-center text-emerald-500 bg-accent/5 rounded-b-lg border-b border-border-light">✓</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

    <!-- FAQ -->
    <section class="bg-surface py-24">
      <div class="max-w-3xl mx-auto px-6">
        <h2 data-i18n="pricing_page.faq_title" class="font-serif text-3xl font-medium text-center text-primary mb-12">Frequently Asked Questions</h2>
        <div class="space-y-4">
          <div class="bg-white rounded-2xl border border-border-light p-6 shadow-sm">
            <h3 data-i18n="pricing_page.faq_q1" class="font-bold text-primary mb-2">Are there any setup fees?</h3>
            <p data-i18n="pricing_page.faq_a1" class="text-sm text-primary/75">No, there are zero setup fees. We provide a completely free onboarding call for all tiers to help configure your Midtrans integration and capster schedules.</p>
          </div>
          <div class="bg-white rounded-2xl border border-border-light p-6 shadow-sm">
            <h3 data-i18n="pricing_page.faq_q2" class="font-bold text-primary mb-2">Can I upgrade or downgrade later?</h3>
            <p data-i18n="pricing_page.faq_a2" class="text-sm text-primary/75">Yes. You can switch your plan at any time. Your billing will be pro-rated based on the days remaining in your current billing cycle.</p>
          </div>
          <div class="bg-white rounded-2xl border border-border-light p-6 shadow-sm">
            <h3 data-i18n="pricing_page.faq_q3" class="font-bold text-primary mb-2">Does Trimly take a percentage of my bookings?</h3>
            <p data-i18n="pricing_page.faq_a3" class="text-sm text-primary/75">Trimly charges exactly 0% commission on your bookings. Midtrans gateway fees (e.g. QRIS 0.7%) are billed directly by Midtrans.</p>
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
