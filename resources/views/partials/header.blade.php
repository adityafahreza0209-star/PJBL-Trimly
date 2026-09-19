  <!-- B2B NAVBAR -->
  <header class="fixed w-full top-0 z-50 bg-background/90 backdrop-blur-md border-b border-border-light" id="navbar">
    <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
      <a href="{{ url('/') }}" class="flex items-center gap-2 text-primary font-bold text-xl tracking-tight">
        <span class="w-8 h-8 rounded bg-primary text-white flex items-center justify-center font-serif">T</span>
        <span>TRIMLY<span class="text-accent">.</span></span>
      </a>
      
      <nav class="hidden md:flex items-center gap-8 text-sm font-medium">
        <a href="{{ url('/') }}#features" class="text-primary/75 hover:text-primary transition-colors" data-i18n="nav.platform">Platform</a>
        <a href="{{ url('customer-stories') }}" class="text-primary/75 hover:text-primary transition-colors" data-i18n="nav.stories">Customer Stories</a>
        <a href="{{ url('pricing') }}" class="text-primary/75 hover:text-primary transition-colors" data-i18n="nav.pricing">Pricing</a>
        <a href="{{ url('blog') }}" class="text-primary/75 hover:text-primary transition-colors" data-i18n="nav.blog">Blog</a>
        <a href="{{ url('/') }}#faq" class="text-primary/75 hover:text-primary transition-colors" data-i18n="nav.faq">FAQ</a>
      </nav>
      
      <div class="flex items-center gap-3">
        <a href="{{ url('login') }}" class="text-sm font-bold text-primary hover:text-accent transition-colors hidden sm:block" data-i18n="nav.login">Studio Login</a>
        <x-button-primary size="normal" href="{{ url('register') }}" fullWidth="false" variant="secondary" data-i18n="nav.cta">Get Early Access</x-button-primary>
        
        <div class="ml-2">
          @include('partials.lang-switcher')
        </div>
      </div>
    </div>
  </header>
