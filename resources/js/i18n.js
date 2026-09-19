const messages = {
  en: {
    // Navigation
    "nav.platform": "Platform",
    "nav.stories": "Customer Stories",
    "nav.pricing": "Pricing",
    "nav.blog": "Blog",
    "nav.faq": "FAQ",
    "nav.login": "Studio Login",
    "nav.cta": "Get Early Access",

    // Hero
    "hero.title": "The Operating System for Premier Barbershops.",
    "hero.subtitle": "Eliminate no-shows permanently. Trimly automates Midtrans down payments, synchronizes your capster schedule, and delivers a frictionless booking experience straight from your Instagram bio.",
    "hero.cta1": "Start Your 14-Day Free Trial",
    "hero.cta2": "View Demo Portal",
    "hero.trust1": "5-Minute Setup",
    "hero.trust2": "No Dedicated EDC Terminal",
    "hero.trust3": "Instant Gateway Integration",
    "hero.experience_tag": "Studio Experience",
    "hero.experience_desc": "Exclusive Service, Guaranteed Schedules",
    "hero.revenue_today": "Today's Revenue",
    "hero.revenue_served": "18 Served • 0 No-Shows",
    "hero.dp_secured": "Secured Midtrans DP",
    "hero.dp_locked": "100% LOCKED",
    "hero.dp_settle": "Settled directly to BCA",
    "hero.zero_noshows": "99.4% Zero No-Shows",

    // Social Proof
    "proof.trusted": "Trusted by 120+ Premier Barbershops & Grooming Studios",
    "proof.satisfaction": "4.9/5 Partner Satisfaction",

    // Features Header
    "features.title": "Built exclusively to scale modern grooming businesses.",
    "features.subtitle": "An all-in-one platform combining front-desk POS management and a dedicated bio-link booking portal to eliminate empty chairs and streamline daily operations.",

    // Feature 1: DP Engine
    "features.f1_tag": "Automated Payment Gateway",
    "features.f1_title": "Mandatory DP Engine",
    "features.f1_desc": "Require a custom 30% to 50% down payment to lock a chair. Integrated directly with Midtrans for instant QRIS, Virtual Account, and e-wallet settlements to your studio's bank account.",
    "features.f1_point1": "<strong>100% No-Show Elimination:</strong> Appointment slots are officially secured only after down payment is verified by the system.",
    "features.f1_point2": "<strong>Direct Settlement:</strong> Down payment funds settle directly into your studio's designated commercial bank account.",
    "features.f1_point3": "<strong>Instant Digital Pass:</strong> Clients instantly receive an automated booking summary and QR check-in pass.",
    "features.f1_mock_title": "Midtrans Secure Checkout",
    "features.f1_mock_dp": "Down Payment (DP) Secured",
    "features.f1_mock_settle": "Instant Automated Settlement",

    // Feature 2: Bio-Link Portal
    "features.f2_tag": "Seamless Client Experience",
    "features.f2_title": "Dedicated Bio-Link Portal",
    "features.f2_desc": "Clients book in 15 seconds without installing an app. Place your branded <code class=\"bg-slate-100 text-primary font-mono px-1.5 py-0.5 rounded text-sm border border-slate-200\">trimly.com/your-shop</code> link in your Instagram bio to convert followers into confirmed, paid appointments instantly.",
    "features.f2_point1": "<strong>Zero App Downloads:</strong> Runs friction-free inside Instagram, TikTok, and WhatsApp in-app browsers.",
    "features.f2_point2": "<strong>Real-Time Slot Sync:</strong> Clients view only available open chairs with zero scheduling overlaps.",
    "features.f2_point3": "<strong>Bespoke Studio Branding:</strong> Showcase your custom identity, barber team, and signature services.",

    // Feature 3: Capster Management
    "features.f3_tag": "Roster & Commission Operations",
    "features.f3_title": "Capster & Shift Management",
    "features.f3_desc": "Monitor active chairs, manage capster leave requests, and automate tiered split-commission calculations based on real-time transaction data.",
    "features.f3_point1": "<strong>Automated Commission Splits:</strong> Configure tiered percentage (60/40) or flat-rate splits with complete transparency.",
    "features.f3_point2": "<strong>Live Chair Matrix:</strong> Monitor barbers currently cutting, taking breaks, or ready for walk-ins.",
    "features.f3_point3": "<strong>Automated Daily Closeout:</strong> Export transaction breakdowns per barber without manual tallying.",

    // Section 4: Industry Concepts
    "industry.title": "Tailored for Every Modern Grooming Studio",
    "industry.subtitle": "From classic barbershops to modern grooming lounges, Trimly adapts to your unique workflow, team size, and booking volume.",
    "industry.c1_badge": "Heritage",
    "industry.c1_title": "Classic Barbershop",
    "industry.c1_desc": "Focus on precision scissor cuts, skin fades, beard trims, and traditional hot-towel shaves in a vintage setting.",
    "industry.c1_tag": "Traditional • Hot Towel",
    "industry.c2_badge": "High Volume",
    "industry.c2_title": "Modern Grooming Studio",
    "industry.c2_desc": "Built for high-volume urban studios with dynamic multi-barber rosters and friction-free bio-link reservations.",
    "industry.c2_tag": "Express Booking • Modern Fade",
    "industry.c3_badge": "Multi-Service",
    "industry.c3_title": "Men's Salon & Hair Studio",
    "industry.c3_desc": "Manage multi-step appointments, custom hair coloring, perm treatments, scalp therapies, and styling consultations.",
    "industry.c3_tag": "Coloring • Perm • Hair Spa",
    "industry.c4_badge": "Premium Spa",
    "industry.c4_title": "Gentlemen's Spa & Grooming",
    "industry.c4_desc": "Private VIP suite management, combo grooming packages, master therapist booking, and exclusive time slots.",
    "industry.c4_tag": "Beard Spa • Facial • Massage",

    // Workflow Stepper
    "workflow.title": "Streamline your barbershop in 3 simple steps.",
    "workflow.subtitle": "Zero complex onboarding. From workspace creation to receiving your first secured down payment, start running in minutes.",
    "workflow.s1_title": "Setup Studio & Capsters",
    "workflow.s1_desc": "Input your signature grooming menu, configure custom DP rates, assign chair rosters, and connect your studio Midtrans merchant account in 5 minutes.",
    "workflow.s2_title": "Share Dedicated Bio-Link",
    "workflow.s2_desc": "Place your branded <code class=\"bg-white text-primary font-mono px-1.5 py-0.5 rounded border border-border-light text-xs font-semibold\">trimly.com/your-shop</code> URL on your Instagram bio, Google Maps, and WhatsApp auto-responder for frictionless client self-booking.",
    "workflow.s3_title": "Receive Guaranteed Bookings",
    "workflow.s3_desc": "Clients lock appointment slots with automated down payments. Midtrans settles funds directly to your studio account while zero ghost no-shows occur.",

    // ROI Calculator
    "roi.title": "How much are ghost no-shows costing your studio?",
    "roi.subtitle": "Unsecured bookings cost the average Indonesian barbershop 18% in lost chair revenue monthly. Calculate how much Trimly's automated DP engine recovers for you.",
    "roi.front_desk": "Front Desk Performance",
    "roi.dp_settled": "100% DP Settled",
    "roi.net_margin": "+28.4% Net Margin Recovered",
    "roi.dp_verified": "Down payments verified immediately via QRIS and Virtual Accounts.",
    "roi.label_chairs": "Active Chairs / Capsters",
    "roi.label_price": "Average Service Price (IDR)",
    "roi.label_bookings": "Monthly Bookings per Chair",
    "roi.label_recovered": "Monthly Recovered Revenue",
    "roi.calc_note": "Estimated based on 15% ghost booking elimination with a standard 50% down payment policy.",

    // Testimonials
    "testimonials.title": "Trusted and Endorsed by Studio Owners",
    "testimonials.subtitle": "Real stories on how premier barbershops eliminated ghost appointments and automated their daily commission reconciliations.",
    "testimonials.cta": "See all stories &rarr;",

    // Pricing
    "pricing.title": "Transparent pricing for growing studios.",
    "pricing.subtitle": "No hidden charges. Zero commission cuts on your booking transactions. Choose the plan tailored to your studio capacity.",
    "pricing.monthly": "Monthly",
    "pricing.annually": "Annually",
    "pricing.save20": "Save 20%",
    "pricing.essential_name": "Essential",
    "pricing.essential_desc": "Basic schedule management and bio-link booking for independent studios.",
    "pricing.essential_note": "Billed annually (Rp 2.868.000/yr)",
    "pricing.essential_cta": "Start Essential Plan",
    "pricing.architect_name": "Architect",
    "pricing.architect_desc": "Full POS capabilities with Midtrans DP automation and commission splits.",
    "pricing.architect_note": "Billed annually (Rp 6.708.000/yr)",
    "pricing.architect_cta": "Get Architect Access",
    "pricing.popular": "Most Popular",
    "pricing.see_full": "See full pricing details &rarr;",

    // FAQ
    "faq.title": "Frequently Asked Questions",
    "faq.subtitle": "Everything you need to know before integrating Trimly into your studio operations.",
    "faq.online_badge": "ALWAYS ONLINE",
    "faq.box_title": "Have a Specific Question?",
    "faq.box_desc": "Our concierge onboarding team is available to help configure your services menu, import barber rosters, and activate your payment gateway.",
    "faq.wa_btn": "Chat with Onboarding via WhatsApp",
    "faq.q1": "How long does payment gateway integration take?",
    "faq.a1": "We guide you through the entire onboarding process. Your barbershop can begin accepting automated down payments via QRIS (GoPay, OVO, ShopeePay, Dana) and bank Virtual Accounts within 24 hours of completing basic merchant verification.",
    "faq.q2": "Do clients need to download an app to book?",
    "faq.a2": "Not at all. Trimly is 100% mobile-web optimized. Clients simply tap the link in your Instagram bio (e.g. <code class=\"bg-slate-100 px-1 py-0.5 rounded text-xs\">trimly.com/your-studio</code>) and complete their reservation directly inside their browser in under 15 seconds.",
    "faq.q3": "Do I need specialized POS hardware or dedicated EDC terminals?",
    "faq.a3": "No special hardware required. Trimly OS is fully cloud-based. You can manage your studio from any existing iPad, Android tablet, laptop, or smartphone already at your front desk.",
    "faq.q4": "What happens if a client needs to reschedule or cancel?",
    "faq.a4": "You maintain complete control over studio policies. For example, allow free rescheduling up to 2 hours in advance while forfeiting down payments for late cancellations. Your customized policy is automatically embedded into every client's digital confirmation pass.",
    "faq.q5": "Can barber commission splits be customized or tiered?",
    "faq.a5": "Yes. Trimly supports custom percentage splits (e.g. 60% barber / 40% studio), fixed-fee service bonuses, and tiered monthly volume targets. Every barber can view their transparent shift breakdown anytime.",

    // Pre-Footer CTA
    "cta.title": "Your Chairs Deserve to Stay Full.",
    "cta.subtitle": "Join premier grooming studios running on automated, zero-friction reservations. Launch your studio workspace in 5 minutes.",
    "cta.btn1": "Claim Your Workspace",
    "cta.btn2": "View Demo Portal",
    "cta.point1": "✓ No Long-Term Contracts",
    "cta.point2": "✓ Free 1-on-1 Setup Guidance",

    // Footer
    "footer.desc": "The operating system for premier barbershops. Digitize your studio with automated workflows.",
    "footer.product": "Product",
    "footer.features": "Features",
    "footer.pricing": "Pricing",
    "footer.integrations": "Integrations",
    "footer.platform": "Platform",
    "footer.biolink": "Bio-Link Portal",
    "footer.capster_app": "Capster App",
    "footer.hardware": "Hardware Setup",
    "footer.company": "Company",
    "footer.about": "About Us",
    "footer.careers": "Careers",
    "footer.contact": "Contact Sales",
    "footer.legal": "Legal",
    "footer.privacy": "Privacy Policy",
    "footer.terms": "Terms of Service",
    "footer.rights": "© 2026 Trimly OS. All rights reserved.",

    // Customer Stories Page
    "stories.title": "Real Studios, Real Results",
    "stories.subtitle": "Discover how premier barbershops use Trimly to eliminate no-shows and streamline operations.",
    "stories.s1_stat_label": "Drop in No-Shows",
    "stories.s1_quote": "\"Before Trimly, late cancellations were killing our weekend revenue. Implementing Midtrans DP through their booking link completely solved the problem on day one.\"",
    "stories.s1_role": "Founder & Head Barber • The Noble Barber",
    "stories.s2_stat_label": "Recovered Monthly",
    "stories.s2_quote": "\"The automated commissions feature saved us hours of manual calculation every week. Our barbers can check their earnings in real-time, boosting morale instantly.\"",
    "stories.s2_role": "Owner • Gentleman & Sons",
    "stories.s3_stat_label": "Faster Booking Time",
    "stories.s3_quote": "\"Clients love the frictionless Instagram booking. They don't have to wait for our admin to reply on WhatsApp anymore. It's direct, clean, and extremely fast.\"",
    "stories.s3_role": "Operations Manager • Crown & Blade",
    "stories.s4_stat_label": "Sync with POS",
    "stories.s4_quote": "\"We ditched our bulky EDC and old POS system. Trimly's web dashboard handles payments and schedules perfectly from an iPad. It feels like the future.\"",
    "stories.s4_role": "Co-Founder • Heritage Grooming",

    // Pricing Page
    "pricing_page.title": "Transparent Pricing for Growing Studios",
    "pricing_page.subtitle": "No hidden fees, no long-term lock-ins. Upgrade when you need it.",
    "pricing_page.essential_name": "Essential",
    "pricing_page.essential_desc": "Perfect for single-location studios ready to digitize bookings.",
    "pricing_page.billed_monthly": "Billed Monthly",
    "pricing_page.trial_btn": "Start 14-Day Free Trial",
    "pricing_page.no_cc": "No credit card required",
    "pricing_page.f_chairs_3": "Up to 3 Barber Chairs",
    "pricing_page.f_midtrans_dp": "Automated Midtrans DP",
    "pricing_page.f_basic_link": "Basic Instagram Booking Link",
    "pricing_page.f_reports": "Daily Settlement Reports",
    "pricing_page.popular_badge": "Most Popular",
    "pricing_page.architect_name": "Architect",
    "pricing_page.architect_desc": "Advanced operations for premier barbershops and chains.",
    "pricing_page.f_chairs_unlimited": "Unlimited Barber Chairs",
    "pricing_page.f_custom_domain": "Custom Domain Booking Portal",
    "pricing_page.f_auto_commissions": "Automated Capster Commissions",
    "pricing_page.f_crm": "Advanced CRM & Analytics",
    "pricing_page.f_priority_support": "Priority WhatsApp Support",
    "pricing_page.compare_title": "Compare Plans",
    "pricing_page.th_features": "Features",
    "pricing_page.cat_booking": "Booking & Scheduling",
    "pricing_page.row_chairs": "Barber Chairs",
    "pricing_page.val_chairs_up3": "Up to 3",
    "pricing_page.val_chairs_unlimited": "Unlimited",
    "pricing_page.row_ig_link": "Instagram Booking Link",
    "pricing_page.row_domain": "Custom Domain Portal",
    "pricing_page.cat_payments": "Payments",
    "pricing_page.row_dp": "Automated Midtrans DP",
    "pricing_page.row_settle": "Direct to Bank Settlement",
    "pricing_page.row_commissions": "Automated Capster Commissions",
    "pricing_page.cat_team": "Team Management",
    "pricing_page.row_staff": "Staff Accounts",
    "pricing_page.row_capster_app": "Capster App Access",
    "pricing_page.cat_reporting": "Reporting & Analytics",
    "pricing_page.row_daily_reports": "Daily Settlement Reports",
    "pricing_page.row_crm": "Advanced CRM & Analytics",
    "pricing_page.cat_support": "Support",
    "pricing_page.row_email_support": "Email Support",
    "pricing_page.row_wa_support": "Priority WhatsApp Support",
    "pricing_page.faq_title": "Frequently Asked Questions",
    "pricing_page.faq_q1": "Are there any setup fees?",
    "pricing_page.faq_a1": "No, there are zero setup fees. We provide a completely free onboarding call for all tiers to help configure your Midtrans integration and capster schedules.",
    "pricing_page.faq_q2": "Can I upgrade or downgrade later?",
    "pricing_page.faq_a2": "Yes. You can switch your plan at any time. Your billing will be pro-rated based on the days remaining in your current billing cycle.",
    "pricing_page.faq_q3": "Does Trimly take a percentage of my bookings?",
    "pricing_page.faq_a3": "Trimly charges exactly 0% commission on your bookings. Midtrans gateway fees (e.g. QRIS 0.7%) are billed directly by Midtrans.",

    // Blog Page
    "blog_page.title": "Resources for Modern Grooming Studios",
    "blog_page.subtitle": "Insights, strategies, and industry trends to help you scale your barbershop business.",
    "blog_page.a1_category": "Management",
    "blog_page.a1_title": "5 Ways to Cut Down No-Shows at Your Studio",
    "blog_page.a1_desc": "Empty chairs mean lost revenue. Learn how modern studios are using deposits and automated reminders to guarantee their schedules.",
    "blog_page.a1_date": "October 12, 2026",
    "blog_page.a2_category": "Team & Culture",
    "blog_page.a2_title": "How to Structure Capster Commission Splits Fairly",
    "blog_page.a2_desc": "Finding the right balance between studio profitability and barber retention is key. We break down the most popular compensation models.",
    "blog_page.a2_date": "September 28, 2026",
    "blog_page.a3_category": "Industry Trends",
    "blog_page.a3_title": "Why Deposits Are Becoming Standard in Grooming Businesses",
    "blog_page.a3_desc": "The grooming industry is shifting. Discover why top-tier barbershops are no longer accepting bookings without an upfront commitment.",
    "blog_page.a3_date": "September 15, 2026",
    "blog_page.a4_category": "Productivity",
    "blog_page.a4_title": "Creating a Frictionless Booking Experience",
    "blog_page.a4_desc": "If your clients have to DM you to book an appointment, you're losing money. Here's how to automate the entire process.",
    "blog_page.a4_date": "August 30, 2026",

    // Login Page
    "login.tagline": "The Dedicated Terminal for Premier Barbershop Operators",
    "login.quote": "\"Mastery is found in the details of the craft, and precision is amplified by the system that supports it.\"",
    "login.quote_author": "— The Artisan's Code",
    "login.cloud_status": "Cloud Server: Live & Operational",
    "login.title": "Studio Sign In",
    "login.subtitle": "Enter your studio credentials to access the operation terminal and manage your appointments.",
    "login.subdomain_label": "Studio Subdomain",
    "login.subdomain_placeholder": "e.g. thenoble",
    "login.user_label": "Email or WhatsApp Number",
    "login.user_placeholder": "admin@studio.com or 0812...",
    "login.password_label": "Password",
    "login.remember_me": "Remember this device",
    "login.forgot_password": "Forgot password?",
    "login.submit_btn": "Sign In to Terminal",
    "login.capster_note": "Capster accounts are managed and created directly by the Barbershop Admin.",
    "login.back_link": "Return to Landing Page",

    // Onboarding & Register
    "onboarding.headline": "Build the Digital Foundation of Your Barbershop",
    "onboarding.quote": "“A structured operational flow guarantees precision, giving the artisan total focus on the craft.”",
    "onboarding.quote_author": "— Trimly Studio Blueprint",
    "onboarding.pillar1": "14-day zero-risk trial with instant workspace activation",
    "onboarding.pillar2": "Zero commission cut on all in-chair client settlements",
    "onboarding.pillar3": "Real-time Capster Matrix & Midtrans automated DP lock",
    "onboarding.cloud_status": "Cloud Server: Live & Operational",
    "onboarding.title": "Studio Onboarding",
    "onboarding.subtitle": "Create your Trimly workspace and establish your operational terminal.",
    "onboarding.barbershop_name_label": "Barbershop Name",
    "onboarding.barbershop_name_placeholder": "e.g. The Noble Barber",
    "onboarding.owner_name_label": "Owner Name",
    "onboarding.owner_name_placeholder": "e.g. Arya Maulana",
    "onboarding.subdomain_label": "Studio Subdomain",
    "onboarding.subdomain_placeholder": "noblebarber",
    "onboarding.subdomain_hint": "Your portal URL for online booking and customer tickets.",
    "onboarding.email_label": "Business Email",
    "onboarding.email_placeholder": "admin@noblebarber.id",
    "onboarding.phone_label": "WhatsApp Number",
    "onboarding.phone_placeholder": "0812-3456-7890",
    "onboarding.password_label": "Admin Password",
    "onboarding.plan_select_label": "Select SaaS Subscription Plan",
    "onboarding.trial_pill": "14-Day Free Trial",
    "onboarding.plan_essential_desc": "Standard operations, scheduling, & reporting.",
    "onboarding.plan_architect_desc": "Full Midtrans DP integration, advanced analytics.",
    "onboarding.trial_badge": "Free 14 days trial",
    "onboarding.today_free": "Rp 0 today",
    "onboarding.submit_btn": "Initialize Studio Terminal &rarr;",
    "onboarding.trial_notice": "Start with a <strong class=\"text-primary font-semibold\">14-day free trial</strong>. You will not be billed before the trial period ends.",
    "onboarding.has_account": "Already have an account?",
    "onboarding.login_link": "Masuk ke Terminal",
    "onboarding.back_link": "&larr; Return to Landing Page",
    "onboarding.modal_title": "Secure Payment via Midtrans",
    "onboarding.modal_countdown": "Complete payment in",
    "onboarding.modal_sub_name": "Trimly OS Subscription",
    "onboarding.modal_plan_prefix": "Plan:",
    "onboarding.modal_billing_note": "Billed Monthly • Cancel Anytime",
    "onboarding.modal_method_label": "Select Method",
    "onboarding.modal_qris_hint": "Scan with any supported e-Wallet or Mobile Banking",
    "onboarding.modal_simulate_btn": "Simulate Subscription Payment",
    "register.trial_banner": "Your account starts with a <strong class=\"font-bold\">14-day free trial</strong> — full access to every Architect feature, including automated Midtrans DP. No credit card required.",
    "register.submit_btn": "Start My 14-Day Free Trial",
    "register.trial_subnote": "We'll ask you to choose a plan when your trial ends. Cancel anytime, no charge if you don't continue."
  },

  id: {
    // Navigation
    "nav.platform": "Platform",
    "nav.stories": "Cerita Pelanggan",
    "nav.pricing": "Harga",
    "nav.blog": "Blog",
    "nav.faq": "FAQ",
    "nav.login": "Masuk Studio",
    "nav.cta": "Dapatkan Akses Awal",

    // Hero
    "hero.title": "Sistem Operasi untuk Barbershop Premium.",
    "hero.subtitle": "Hilangkan no-show secara permanen. Trimly mengotomatisasi DP Midtrans, sinkronisasi jadwal capster, dan memberikan pengalaman booking tanpa hambatan langsung dari bio Instagram Anda.",
    "hero.cta1": "Mulai Coba Gratis 14 Hari",
    "hero.cta2": "Lihat Portal Demo",
    "hero.trust1": "Setup 5 Menit",
    "hero.trust2": "Tanpa Terminal EDC Khusus",
    "hero.trust3": "Integrasi Gateway Instan",
    "hero.experience_tag": "Pengalaman Studio",
    "hero.experience_desc": "Layanan Eksklusif, Jadwal Terjamin",
    "hero.revenue_today": "Pendapatan Hari Ini",
    "hero.revenue_served": "18 Terlayani • 0 No-Show",
    "hero.dp_secured": "DP Midtrans Terkunci",
    "hero.dp_locked": "100% TERKUNCI",
    "hero.dp_settle": "Pencairan langsung ke BCA",
    "hero.zero_noshows": "99,4% Bebas No-Show",

    // Social Proof
    "proof.trusted": "Dipercaya oleh 120+ Barbershop & Studio Grooming Terkemuka",
    "proof.satisfaction": "4.9/5 Kepuasan Mitra",

    // Features Header
    "features.title": "Dibuat khusus untuk akselerasi bisnis perawatan pria modern.",
    "features.subtitle": "Platform all-in-one yang menggabungkan manajemen kasir POS front-desk dan portal booking bio-link mandiri untuk menghapus kursi kosong dan menyederhanakan operasional harian.",

    // Feature 1: DP Engine
    "features.f1_tag": "Payment Gateway Otomatis",
    "features.f1_title": "Sistem DP (Down Payment) Otomatis",
    "features.f1_desc": "Wajibkan uang muka (DP) 30% hingga 50% untuk mengunci kursi. Terintegrasi langsung dengan Midtrans untuk pembayaran instan via QRIS, Virtual Account, dan e-wallet ke rekening studio Anda.",
    "features.f1_point1": "<strong>Bebas 100% dari No-Show:</strong> Slot janji temu resmi terkunci hanya setelah pembayaran DP diverifikasi otomatis oleh sistem.",
    "features.f1_point2": "<strong>Pencairan Langsung:</strong> Dana DP masuk langsung ke rekening bank operasional studio Anda tanpa perantara.",
    "features.f1_point3": "<strong>Tiket Digital Instan:</strong> Pelanggan langsung menerima ringkasan pemesanan otomatis dan tiket check-in kode QR.",
    "features.f1_mock_title": "Pembayaran Aman Midtrans",
    "features.f1_mock_dp": "Uang Muka (DP) Terkunci",
    "features.f1_mock_settle": "Pencairan Otomatis Instan",

    // Feature 2: Bio-Link Portal
    "features.f2_tag": "Pengalaman Pelanggan Mulus",
    "features.f2_title": "Portal Bio-Link Khusus Studio",
    "features.f2_desc": "Pelanggan memesan dalam 15 detik tanpa download aplikasi. Pasang link <code class=\"bg-slate-100 text-primary font-mono px-1.5 py-0.5 rounded text-sm border border-slate-200\">trimly.com/nama-studio</code> di bio Instagram untuk mengubah follower menjadi pelanggan resmi berbayar.",
    "features.f2_point1": "<strong>Tanpa Unduh Aplikasi:</strong> Terbuka instan dan ringan langsung di in-app browser Instagram, TikTok, dan WhatsApp.",
    "features.f2_point2": "<strong>Sinkronisasi Jam Real-Time:</strong> Pelanggan hanya melihat kursi yang benar-benar kosong, mencegah bentrok jadwal.",
    "features.f2_point3": "<strong>Branding Personal Studio:</strong> Tampilkan identitas studio, profil capster favorit, dan daftar layanan unggulan Anda.",

    // Feature 3: Capster Management
    "features.f3_tag": "Operasional Roster & Komisi",
    "features.f3_title": "Manajemen Capster & Jadwal Shift",
    "features.f3_desc": "Pantau kursi aktif, kelola pengajuan cuti barber, dan hitung bagi hasil komisi bertingkat secara otomatis berdasarkan data transaksi real-time.",
    "features.f3_point1": "<strong>Bagi Hasil Komisi Otomatis:</strong> Atur persentase berjenjang (60/40) atau tarif flat per potong secara transparan.",
    "features.f3_point2": "<strong>Matriks Kursi Live:</strong> Pantau barber mana yang sedang melayani tamu, sedang istirahat, atau siap menerima walk-in.",
    "features.f3_point3": "<strong>Tutup Buku Harian Otomatis:</strong> Rekap pendapatan dan komisi tiap capster otomatis terhitung tanpa hitung manual.",

    // Section 4: Industry Concepts
    "industry.title": "Disesuaikan untuk Setiap Model Bisnis Grooming Modern",
    "industry.subtitle": "Dari barbershop klasik hingga lounge grooming modern, Trimly beradaptasi dengan alur kerja, ukuran tim, dan volume pemesanan Anda.",
    "industry.c1_badge": "Heritage",
    "industry.c1_title": "Classic Barbershop",
    "industry.c1_desc": "Fokus pada potongan gunting presisi, skin fade, perapian jenggot, dan cukur handuk panas tradisional bernuansa vintage.",
    "industry.c1_tag": "Tradisional • Hot Towel",
    "industry.c2_badge": "Volume Tinggi",
    "industry.c2_title": "Modern Grooming Studio",
    "industry.c2_desc": "Dirancang untuk studio perkotaan volume tinggi dengan jadwal multi-capster dinamis dan reservasi instan lewat bio-link.",
    "industry.c2_tag": "Booking Cepat • Modern Fade",
    "industry.c3_badge": "Multi-Layanan",
    "industry.c3_title": "Men's Salon & Hair Studio",
    "industry.c3_desc": "Kelola reservasi bertahap, pewarnaan rambut custom, perawatan perm/keriting, terapi kulit kepala, dan konsultasi gaya.",
    "industry.c3_tag": "Coloring • Perm • Hair Spa",
    "industry.c4_badge": "Premium Spa",
    "industry.c4_title": "Gentlemen's Spa & Grooming",
    "industry.c4_desc": "Manajemen ruang privat VIP, paket grooming kombo, pemesanan terapis master, dan pemilihan slot waktu eksklusif.",
    "industry.c4_tag": "Beard Spa • Facial • Pijat",

    // Workflow Stepper
    "workflow.title": "Tingkatkan efisiensi barbershop dalam 3 langkah mudah.",
    "workflow.subtitle": "Tanpa instalasi rumit. Dari pembuatan akun hingga menerima DP pesanan pertama, studio Anda siap beroperasi dalam hitungan menit.",
    "workflow.s1_title": "Atur Profil Studio & Capster",
    "workflow.s1_desc": "Masukkan daftar layanan, tentukan nominal DP, atur jadwal capster, dan hubungkan akun merchant Midtrans dalam 5 menit.",
    "workflow.s2_title": "Bagikan Link Bio Khusus",
    "workflow.s2_desc": "Pasang link <code class=\"bg-white text-primary font-mono px-1.5 py-0.5 rounded border border-border-light text-xs font-semibold\">trimly.com/nama-studio</code> di bio Instagram, Google Maps, dan WhatsApp auto-responder untuk booking mandiri.",
    "workflow.s3_title": "Terima Booking Pasti & Terbayar",
    "workflow.s3_desc": "Pelanggan mengunci kursi dengan pembayaran DP instan. Dana langsung dicairkan Midtrans ke rekening studio Anda tanpa risiko no-show.",

    // ROI Calculator
    "roi.title": "Berapa banyak kerugian studio akibat no-show?",
    "roi.subtitle": "Pemesanan tanpa jaminan DP merugikan barbershop di Indonesia rata-rata 18% per bulan karena kursi kosong. Hitung potensi pendapatan yang diselamatkan sistem DP Trimly.",
    "roi.front_desk": "Performa Meja Kasir",
    "roi.dp_settled": "100% DP Tercairkan",
    "roi.net_margin": "+28,4% Margin Bersih Terselamatkan",
    "roi.dp_verified": "Uang muka diverifikasi otomatis secara langsung melalui QRIS dan Virtual Account.",
    "roi.label_chairs": "Jumlah Kursi / Capster Aktif",
    "roi.label_price": "Rata-rata Tarif Layanan (IDR)",
    "roi.label_bookings": "Jumlah Booking per Kursi / Bulan",
    "roi.label_recovered": "Estimasi Pendapatan Diselamatkan",
    "roi.calc_note": "Estimasi didasarkan pada pencegahan 15% slot kosong (ghost booking) dengan kebijakan DP standar 50%.",

    // Testimonials
    "testimonials.title": "Dipercaya dan Direkomendasikan Pemilik Studio",
    "testimonials.subtitle": "Kisah nyata bagaimana barbershop terkemuka menghapus janji temu palsu dan mengotomatisasi perhitungan komisi harian.",
    "testimonials.cta": "Lihat semua cerita mitra &rarr;",

    // Pricing
    "pricing.title": "Harga transparan untuk pertumbuhan studio Anda.",
    "pricing.subtitle": "Tanpa biaya tersembunyi. Bebas potongan komisi dari transaksi booking Anda. Pilih paket yang pas dengan skala studio Anda.",
    "pricing.monthly": "Bulanan",
    "pricing.annually": "Tahunan",
    "pricing.save20": "Hemat 20%",
    "pricing.essential_name": "Essential",
    "pricing.essential_desc": "Manajemen jadwal dasar dan pemesanan lewat bio-link untuk studio mandiri.",
    "pricing.essential_note": "Ditagih tahunan (Rp 2.868.000/thn)",
    "pricing.essential_cta": "Pilih Paket Essential",
    "pricing.architect_name": "Architect",
    "pricing.architect_desc": "Sistem POS lengkap dengan otomatisasi DP Midtrans dan bagi hasil komisi capster.",
    "pricing.architect_note": "Ditagih tahunan (Rp 6.708.000/thn)",
    "pricing.architect_cta": "Pilih Paket Architect",
    "pricing.popular": "Paling Populer",
    "pricing.see_full": "Lihat rincian lengkap paket harga &rarr;",

    // FAQ
    "faq.title": "Pertanyaan yang Sering Diajukan",
    "faq.subtitle": "Semua hal penting yang perlu Anda ketahui sebelum menggunakan Trimly di studio Anda.",
    "faq.online_badge": "ONLINE SETIAP HARI",
    "faq.box_title": "Punya Pertanyaan Khusus?",
    "faq.box_desc": "Tim onboarding kami siap membantu mengatur menu layanan, memasukkan jadwal capster, dan mengaktifkan payment gateway Anda.",
    "faq.wa_btn": "Konsultasi via WhatsApp",
    "faq.q1": "Berapa lama proses integrasi payment gateway Midtrans?",
    "faq.a1": "Kami memandu Anda di seluruh proses onboarding. Barbershop Anda dapat langsung menerima DP otomatis via QRIS (GoPay, OVO, ShopeePay, Dana) dan Virtual Account dalam 24 jam setelah verifikasi merchant.",
    "faq.q2": "Apakah pelanggan harus download aplikasi untuk booking?",
    "faq.a2": "Sama sekali tidak. Trimly 100% berbasis web mobile. Pelanggan cukup klik link di bio Instagram Anda (contoh: <code class=\"bg-slate-100 px-1 py-0.5 rounded text-xs\">trimly.com/nama-studio</code>) dan menyelesaikan booking di browser ponsel dalam 15 detik.",
    "faq.q3": "Apakah butuh mesin POS khusus atau mesin EDC perbankan?",
    "faq.a3": "Tidak butuh perangkat keras khusus. Trimly OS berbasis cloud. Anda dapat mengelola studio dari iPad, tablet Android, laptop, atau smartphone yang sudah ada di meja kasir Anda.",
    "faq.q4": "Bagaimana jika pelanggan ingin ganti jadwal atau membatalkan?",
    "faq.a4": "Anda memegang kendali penuh atas kebijakan studio. Misalnya, izinkan jadwal ulang gratis hingga 2 jam sebelumnya dan hanguskan DP jika pembatalan mendadak. Kebijakan ini tercantum otomatis di tiket digital pelanggan.",
    "faq.q5": "Bisakah skema bagi hasil komisi barber disesuaikan atau berjenjang?",
    "faq.a5": "Bisa. Trimly mendukung persentase kustom (misal 60% capster / 40% studio), bonus layanan flat, serta target volume bulanan berjenjang. Setiap capster bisa melihat rekap bagi hasilnya secara transparan kapan pun.",

    // Pre-Footer CTA
    "cta.title": "Kursi Studio Anda Layak Terisi Penuh.",
    "cta.subtitle": "Bergabunglah bersama studio grooming modern dengan reservasi otomatis bebas ribet. Buka studio digital Anda dalam 5 menit.",
    "cta.btn1": "Daftarkan Studio Anda",
    "cta.btn2": "Lihat Portal Demo",
    "cta.point1": "✓ Tanpa Kontrak Mengikat",
    "cta.point2": "✓ Panduan Setup Gratis 1-on-1",

    // Footer
    "footer.desc": "Sistem operasi untuk barbershop & studio grooming modern. Digitalisasi operasional studio Anda dengan alur kerja otomatis.",
    "footer.product": "Produk",
    "footer.features": "Fitur",
    "footer.pricing": "Harga",
    "footer.integrations": "Integrasi",
    "footer.platform": "Platform",
    "footer.biolink": "Portal Bio-Link",
    "footer.capster_app": "Aplikasi Capster",
    "footer.hardware": "Panduan Hardware",
    "footer.company": "Perusahaan",
    "footer.about": "Tentang Kami",
    "footer.careers": "Karir",
    "footer.contact": "Hubungi Sales",
    "footer.legal": "Legalitas",
    "footer.privacy": "Kebijakan Privasi",
    "footer.terms": "Syarat & Ketentuan",
    "footer.rights": "© 2026 Trimly OS. Hak cipta dilindungi undang-undang.",

    // Customer Stories Page
    "stories.title": "Studio Nyata, Hasil Nyata",
    "stories.subtitle": "Pelajari bagaimana barbershop terkemuka menggunakan Trimly untuk mengeliminasi no-show dan menyederhanakan operasional.",
    "stories.s1_stat_label": "Penurunan No-Show",
    "stories.s1_quote": "\"Sebelum Trimly, pembatalan mendadak sangat menggerus omzet akhir pekan kami. Penerapan DP Midtrans via tautan booking langsung menuntaskan masalah tersebut sejak hari pertama.\"",
    "stories.s1_role": "Founder & Head Barber • The Noble Barber",
    "stories.s2_stat_label": "Diselamatkan per Bulan",
    "stories.s2_quote": "\"Fitur komisi otomatis menghemat berjam-jam hitungan manual setiap minggu. Capster kami bisa memantau komisi secara real-time, yang langsung mendongkrak semangat kerja.\"",
    "stories.s2_role": "Owner • Gentleman & Sons",
    "stories.s3_stat_label": "Waktu Reservasi Lebih Cepat",
    "stories.s3_quote": "\"Pelanggan sangat menyukai booking instan via Instagram tanpa hambatan. Mereka tidak perlu lagi menunggu balasan WhatsApp admin. Sangat cepat, rapi, dan mudah.\"",
    "stories.s3_role": "Operations Manager • Crown & Blade",
    "stories.s4_stat_label": "Sinkronisasi POS Sempurna",
    "stories.s4_quote": "\"Kami meninggalkan mesin EDC jadul dan sistem POS yang rumit. Dashboard web Trimly menangani pembayaran dan jadwal dengan sempurna cukup dari iPad. Terasa sangat modern.\"",
    "stories.s4_role": "Co-Founder • Heritage Grooming",

    // Pricing Page
    "pricing_page.title": "Harga Transparan untuk Studio yang Berkembang",
    "pricing_page.subtitle": "Tanpa biaya tersembunyi, tanpa kontrak mengikat. Upgrade kapan pun Anda siap.",
    "pricing_page.essential_name": "Essential",
    "pricing_page.essential_desc": "Ideal untuk studio satu cabang yang siap mendigitalkan reservasi.",
    "pricing_page.billed_monthly": "Ditagih Bulanan",
    "pricing_page.trial_btn": "Mulai Uji Coba Gratis 14 Hari",
    "pricing_page.no_cc": "Tanpa kartu kredit",
    "pricing_page.f_chairs_3": "Hingga 3 Kursi Barber",
    "pricing_page.f_midtrans_dp": "DP Otomatis Midtrans",
    "pricing_page.f_basic_link": "Link Reservasi Instagram Standar",
    "pricing_page.f_reports": "Laporan Settlement Harian",
    "pricing_page.popular_badge": "Paling Populer",
    "pricing_page.architect_name": "Architect",
    "pricing_page.architect_desc": "Operasional tingkat lanjut untuk barbershop premium & multi-cabang.",
    "pricing_page.f_chairs_unlimited": "Kursi Barber Tanpa Batas",
    "pricing_page.f_custom_domain": "Portal Booking Domain Kustom",
    "pricing_page.f_auto_commissions": "Bagi Hasil Komisi Capster Otomatis",
    "pricing_page.f_crm": "CRM & Analitik Pelanggan Lanjutan",
    "pricing_page.f_priority_support": "Dukungan Prioritas via WhatsApp",
    "pricing_page.compare_title": "Bandingkan Paket",
    "pricing_page.th_features": "Fitur",
    "pricing_page.cat_booking": "Reservasi & Penjadwalan",
    "pricing_page.row_chairs": "Kursi Barber",
    "pricing_page.val_chairs_up3": "Hingga 3",
    "pricing_page.val_chairs_unlimited": "Tanpa Batas",
    "pricing_page.row_ig_link": "Link Reservasi Instagram",
    "pricing_page.row_domain": "Portal Domain Kustom",
    "pricing_page.cat_payments": "Pembayaran",
    "pricing_page.row_dp": "DP Otomatis Midtrans",
    "pricing_page.row_settle": "Settlement Langsung ke Rekening Bank",
    "pricing_page.row_commissions": "Bagi Hasil Komisi Capster Otomatis",
    "pricing_page.cat_team": "Manajemen Tim",
    "pricing_page.row_staff": "Akun Staf",
    "pricing_page.row_capster_app": "Akses Aplikasi Capster",
    "pricing_page.cat_reporting": "Laporan & Analitik",
    "pricing_page.row_daily_reports": "Laporan Settlement Harian",
    "pricing_page.row_crm": "CRM & Analitik Lanjutan",
    "pricing_page.cat_support": "Dukungan Pelanggan",
    "pricing_page.row_email_support": "Dukungan Email",
    "pricing_page.row_wa_support": "Dukungan Prioritas WhatsApp",
    "pricing_page.faq_title": "Pertanyaan yang Sering Diajukan",
    "pricing_page.faq_q1": "Apakah ada biaya setup awal?",
    "pricing_page.faq_a1": "Tidak ada biaya setup sama sekali. Kami menyediakan sesi onboarding gratis 1-on-1 untuk semua paket guna membantu integrasi Midtrans dan konfigurasi jadwal capster Anda.",
    "pricing_page.faq_q2": "Bisakah saya upgrade atau downgrade paket sewaktu-waktu?",
    "pricing_page.faq_a2": "Tentu. Anda dapat mengganti paket kapan saja. Tagihan akan dihitung secara pro-rata berdasarkan sisa hari siklus langganan berjalan.",
    "pricing_page.faq_q3": "Apakah Trimly memotong komisi dari setiap booking pelanggan?",
    "pricing_page.faq_a3": "Trimly mengenakan komisi 0% untuk setiap transaksi booking. Biaya payment gateway resmi (misal QRIS 0.7%) diproses langsung oleh Midtrans tanpa mark-up dari kami.",

    // Blog Page
    "blog_page.title": "Panduan & Wawasan untuk Studio Grooming Modern",
    "blog_page.subtitle": "Wawasan, strategi operasional, dan tren industri untuk mengembangkan bisnis barbershop Anda.",
    "blog_page.a1_category": "Manajemen",
    "blog_page.a1_title": "5 Cara Ampuh Memangkas No-Show di Barbershop Anda",
    "blog_page.a1_desc": "Kursi kosong berarti kehilangan omzet. Pelajari cara studio modern memanfaatkan sistem uang muka dan pengingat otomatis untuk mengunci jadwal.",
    "blog_page.a1_date": "12 Oktober 2026",
    "blog_page.a2_category": "Tim & Budaya",
    "blog_page.a2_title": "Cara Menyusun Skema Bagi Hasil Komisi Capster yang Adil",
    "blog_page.a2_desc": "Menemukan keseimbangan antara profitabilitas studio dan loyalitas barber adalah kunci. Kami mengupas model kompensasi paling efektif.",
    "blog_page.a2_date": "28 September 2026",
    "blog_page.a3_category": "Tren Industri",
    "blog_page.a3_title": "Mengapa Uang Muka (DP) Menjadi Standar Baru Bisnis Grooming",
    "blog_page.a3_desc": "Industri barbershop tengah berevolusi. Temukan alasan mengapa studio kelas atas tidak lagi menerima reservasi tanpa komitmen DP di muka.",
    "blog_page.a3_date": "15 September 2026",
    "blog_page.a4_category": "Produktivitas",
    "blog_page.a4_title": "Menciptakan Pengalaman Reservasi Cepat Tanpa Hambatan",
    "blog_page.a4_desc": "Jika pelanggan harus mengirim DM untuk booking, Anda membuang waktu dan omzet. Pelajari cara mengotomatiskan seluruh alur reservasi.",
    "blog_page.a4_date": "30 Agustus 2026",

    // Login Page
    "login.tagline": "Terminal Operasional Khusus Pengelola Barbershop Terkemuka",
    "login.quote": "\"Keahlian tercipta dari ketelitian berkarya, dan presisi diperkuat oleh sistem yang mendukungnya.\"",
    "login.quote_author": "— Prinsip Sang Pengrajin",
    "login.cloud_status": "Server Cloud: Aktif & Operasional",
    "login.title": "Masuk Terminal Studio",
    "login.subtitle": "Masukkan kredensial studio Anda untuk mengakses terminal operasional dan mengelola reservasi.",
    "login.subdomain_label": "Subdomain Studio",
    "login.subdomain_placeholder": "contoh: thenoble",
    "login.user_label": "Email atau Nomor WhatsApp",
    "login.user_placeholder": "admin@studio.com atau 0812...",
    "login.password_label": "Kata Sandi",
    "login.remember_me": "Ingat perangkat ini",
    "login.forgot_password": "Lupa kata sandi?",
    "login.submit_btn": "Masuk ke Terminal",
    "login.capster_note": "Akun Capster dikelola dan dibuat langsung oleh Admin Barbershop.",
    "login.back_link": "Kembali ke Halaman Utama",

    // Onboarding & Register
    "onboarding.headline": "Bangun Fondasi Digital Barbershop Anda",
    "onboarding.quote": "“Alur kerja operasional yang terstruktur menjamin presisi, memberi capster fokus penuh pada seni potong rambut.”",
    "onboarding.quote_author": "— Cetak Biru Studio Trimly",
    "onboarding.pillar1": "Uji coba 14 hari tanpa risiko dengan aktivasi workspace instan",
    "onboarding.pillar2": "Bebas potongan komisi pada semua transaksi layanan di kursi",
    "onboarding.pillar3": "Matriks Capster real-time & penguncian DP otomatis via Midtrans",
    "onboarding.cloud_status": "Server Cloud: Aktif & Operasional",
    "onboarding.title": "Pendaftaran Studio Baru",
    "onboarding.subtitle": "Buat workspace Trimly Anda dan siapkan terminal operasional studio.",
    "onboarding.barbershop_name_label": "Nama Barbershop",
    "onboarding.barbershop_name_placeholder": "contoh: The Noble Barber",
    "onboarding.owner_name_label": "Nama Pemilik",
    "onboarding.owner_name_placeholder": "contoh: Arya Maulana",
    "onboarding.subdomain_label": "Subdomain Studio",
    "onboarding.subdomain_placeholder": "noblebarber",
    "onboarding.subdomain_hint": "URL portal Anda untuk reservasi online dan tiket pelanggan.",
    "onboarding.email_label": "Email Bisnis",
    "onboarding.email_placeholder": "admin@noblebarber.id",
    "onboarding.phone_label": "Nomor WhatsApp",
    "onboarding.phone_placeholder": "0812-3456-7890",
    "onboarding.password_label": "Kata Sandi Admin",
    "onboarding.plan_select_label": "Pilih Paket Langganan SaaS",
    "onboarding.trial_pill": "Gratis 14 Hari",
    "onboarding.plan_essential_desc": "Operasional standar, penjadwalan, & pelaporan.",
    "onboarding.plan_architect_desc": "Integrasi penuh DP Midtrans, analitik lanjutan.",
    "onboarding.trial_badge": "Uji coba gratis 14 hari",
    "onboarding.today_free": "Rp 0 hari ini",
    "onboarding.submit_btn": "Inisialisasi Terminal Studio &rarr;",
    "onboarding.trial_notice": "Mulai dengan <strong class=\"text-primary font-semibold\">14 hari uji coba gratis</strong>. Anda tidak akan ditagih sebelum masa uji coba berakhir.",
    "onboarding.has_account": "Sudah punya akun?",
    "onboarding.login_link": "Masuk ke Terminal",
    "onboarding.back_link": "&larr; Kembali ke Halaman Utama",
    "onboarding.modal_title": "Pembayaran Aman via Midtrans",
    "onboarding.modal_countdown": "Selesaikan pembayaran dalam",
    "onboarding.modal_sub_name": "Langganan Trimly OS",
    "onboarding.modal_plan_prefix": "Paket:",
    "onboarding.modal_billing_note": "Ditagih Bulanan • Batalkan Kapan Saja",
    "onboarding.modal_method_label": "Pilih Metode Pembayaran",
    "onboarding.modal_qris_hint": "Pindai dengan semua e-Wallet atau Mobile Banking berlogo QRIS",
    "onboarding.modal_simulate_btn": "Simulasikan Pembayaran Langganan",
    "register.trial_banner": "Akun Anda dimulai dengan <strong class=\"font-bold\">uji coba gratis 14 hari</strong> — akses penuh ke semua fitur Architect, termasuk DP otomatis Midtrans. Tanpa kartu kredit.",
    "register.submit_btn": "Mulai Uji Coba Gratis 14 Hari",
    "register.trial_subnote": "Kami akan meminta Anda memilih paket setelah uji coba berakhir. Batalkan kapan saja tanpa biaya jika tidak lanjut."
  }
};

document.addEventListener('DOMContentLoaded', () => {
  let currentLang = localStorage.getItem('trimly_lang') || 'en';

  function applyLanguage(lang) {
    document.documentElement.lang = lang;
    localStorage.setItem('trimly_lang', lang);
    
    document.querySelectorAll('[data-i18n]').forEach(el => {
      const key = el.getAttribute('data-i18n');
      if (messages[lang] && messages[lang][key] !== undefined) {
        el.innerHTML = messages[lang][key];
      }
    });

    document.querySelectorAll('[data-i18n-placeholder]').forEach(el => {
      const key = el.getAttribute('data-i18n-placeholder');
      if (messages[lang] && messages[lang][key] !== undefined) {
        el.setAttribute('placeholder', messages[lang][key]);
      }
    });

    document.querySelectorAll('.lang-toggle-btn').forEach(btn => {
      const btnLang = btn.getAttribute('data-lang');
      if (btnLang === lang) {
        btn.classList.add('bg-white', 'shadow-sm', 'text-primary');
        btn.classList.remove('text-primary/60', 'hover:text-primary');
        btn.setAttribute('aria-pressed', 'true');
      } else {
        btn.classList.remove('bg-white', 'shadow-sm', 'text-primary');
        btn.classList.add('text-primary/60', 'hover:text-primary');
        btn.setAttribute('aria-pressed', 'false');
      }
    });

    // Dispatch global event for scripts like ROI Calculator or dynamic components
    window.dispatchEvent(new CustomEvent('trimly:languageChanged', { detail: { lang } }));
  }

  document.querySelectorAll('.lang-toggle-btn').forEach(btn => {
    btn.addEventListener('click', (e) => {
      const lang = e.currentTarget.getAttribute('data-lang');
      applyLanguage(lang);
    });
    
    btn.addEventListener('keydown', (e) => {
      if(e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        const lang = e.currentTarget.getAttribute('data-lang');
        applyLanguage(lang);
      }
    });
  });

  applyLanguage(currentLang);
});
