<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Account - Trimly</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Geist:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <style>
    [x-cloak] { display: none !important; }
  </style>
</head>
<body class="bg-background text-primary font-sans antialiased m-0">
  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-[76px] bg-primary h-screen sticky top-0 flex flex-col justify-between shrink-0 max-sm:w-[57px] z-40">
      <div class="flex flex-col items-center w-full">
        <a class="h-[88px] w-full grid place-items-center no-underline font-serif font-bold text-3xl text-white border-b border-primary/20" href="{{ url('/dashboard') }}">T<span class="text-accent">.</span></a>
        <nav class="flex flex-col gap-4 pt-7 w-full items-center">
          <a href="{{ url('dashboard') }}#schedule" class="relative group w-11 h-11 rounded-xl grid place-items-center text-slate-400 no-underline text-2xl transition-colors hover:text-white hover:bg-white/10">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            <span class="absolute opacity-0 group-hover:opacity-100 bg-primary text-white text-xs px-2 py-1 rounded shadow-lg left-14 transition-opacity z-50 whitespace-nowrap pointer-events-none">Live Schedule</span>
          </a>
          <a href="{{ url('bookings') }}" class="relative group w-11 h-11 rounded-xl grid place-items-center text-slate-400 no-underline text-2xl transition-colors hover:text-white hover:bg-white/10">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
            <span class="absolute opacity-0 group-hover:opacity-100 bg-primary text-white text-xs px-2 py-1 rounded shadow-lg left-14 transition-opacity z-50 whitespace-nowrap pointer-events-none">All Bookings</span>
          </a>
          <a href="{{ url('payments') }}" class="relative group w-11 h-11 rounded-xl grid place-items-center text-slate-400 no-underline text-2xl transition-colors hover:text-white hover:bg-white/10">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
            <span class="absolute opacity-0 group-hover:opacity-100 bg-primary text-white text-xs px-2 py-1 rounded shadow-lg left-14 transition-opacity z-50 whitespace-nowrap pointer-events-none">Payments</span>
          </a>
          <a href="{{ url('leave-requests') }}" class="relative group w-11 h-11 rounded-xl grid place-items-center text-slate-400 no-underline text-2xl transition-colors hover:text-white hover:bg-white/10">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
            <span class="absolute opacity-0 group-hover:opacity-100 bg-primary text-white text-xs px-2 py-1 rounded shadow-lg left-14 transition-opacity z-50 whitespace-nowrap pointer-events-none">Leave Requests</span>
          </a>
          <a href="{{ url('reviews') }}" class="relative group w-11 h-11 rounded-xl grid place-items-center text-slate-400 no-underline text-2xl transition-colors hover:text-white hover:bg-white/10">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
            <span class="absolute opacity-0 group-hover:opacity-100 bg-primary text-white text-xs px-2 py-1 rounded shadow-lg left-14 transition-opacity z-50 whitespace-nowrap pointer-events-none">Reviews</span>
          </a>
          <a href="{{ url('overview') }}" class="relative group w-11 h-11 rounded-xl grid place-items-center text-slate-400 no-underline text-2xl transition-colors hover:text-white hover:bg-white/10">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
            <span class="absolute opacity-0 group-hover:opacity-100 bg-primary text-white text-xs px-2 py-1 rounded shadow-lg left-14 transition-opacity z-50 whitespace-nowrap pointer-events-none">Overview</span>
          </a>
          <a href="{{ url('admin-settings') }}" class="relative group w-11 h-11 rounded-xl grid place-items-center text-slate-400 no-underline text-2xl transition-colors hover:text-white hover:bg-white/10">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
            <span class="absolute opacity-0 group-hover:opacity-100 bg-primary text-white text-xs px-2 py-1 rounded shadow-lg left-14 transition-opacity z-50 whitespace-nowrap pointer-events-none">Studio Settings</span>
          </a>
        </nav>
      </div>
      <div class="py-6 flex justify-center w-full border-t border-white/10">
        <a href="{{ url('admin-account') }}" class="relative group w-9 h-9 rounded-full bg-white text-primary ring-2 ring-accent grid place-items-center font-display font-bold text-base no-underline shadow-md scale-105 transition-all">
          A
          <span class="absolute opacity-0 group-hover:opacity-100 bg-primary text-white text-xs px-2 py-1 rounded shadow-lg left-14 transition-opacity z-50 whitespace-nowrap pointer-events-none">Account</span>
        </a>
      </div>
    </aside>

    <div class="flex-1 min-w-0 flex flex-col bg-surface">
      <header class="h-[88px] bg-white border-b border-border-light flex items-center justify-between px-6 lg:px-8 max-md:px-5 max-sm:h-auto max-sm:min-h-[88px] max-sm:py-4">
        <div>
          <p class="m-0 mb-1 text-[11px] font-bold tracking-[0.05em] uppercase text-slate-500">Personal Settings</p>
          <h1 class="m-0 text-[24px] font-bold text-slate-900">Admin Profile</h1>
        </div>
        <div class="flex items-center gap-4">
          
          <x-button-outline type="button" size="normal" class="max-sm:text-xs max-sm:px-3" onclick="window.dispatchEvent(new CustomEvent('open-logout-modal'))">Sign Out</x-button-outline>
        </div>
      </header>

      <main class="max-w-[1040px] w-full mx-auto p-6 lg:p-8">
        
        <!-- Section 1: Profile Information -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-8 border-b border-border-subtle pb-8 mb-8">
          <div class="md:col-span-1">
            <h2 class="text-[18px] font-semibold text-slate-900 mb-1.5">Profile Information</h2>
            <p class="text-xs text-slate-500 leading-relaxed m-0">Update your account details and public avatar.</p>
          </div>
          <div class="md:col-span-2">
            <div class="bg-white shadow-sm border border-border-subtle rounded-2xl p-6 flex flex-col gap-6">
              <!-- Avatar row -->
              <div class="flex items-center gap-5 pb-6 border-b border-border-light max-sm:flex-col max-sm:items-start">
                <div class="w-16 h-16 rounded-full bg-primary/10 text-primary font-bold border border-primary/20 font-display text-3xl grid place-items-center shrink-0">
                  {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
                <div class="flex-1">
                  <h3 class="m-0 mb-0.5 text-base font-semibold text-slate-900">{{ $user->name }}</h3>
                  <p class="m-0 text-slate-500 text-xs">Administrator &bull; {{ $barbershop->name ?? 'Trimly Barbershop' }}</p>
                </div>
                <button type="button" class="px-4 py-2 text-xs font-semibold rounded-lg border border-border-subtle text-slate-700 hover:bg-surface transition-colors cursor-pointer">Upload New</button>
              </div>

              <!-- Form fields -->
              <form method="POST" action="{{ route('admin.account.updateProfile') }}" class="flex flex-col gap-6">
                @csrf

                @if(session('status'))
                  <div class="p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm font-medium">
                    {{ session('status') }}
                  </div>
                @endif

                @if(isset($errors) && $errors->hasAny(['name', 'email', 'phone_number']))
                  <div class="p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-sm">
                    <ul class="list-disc list-inside space-y-1">
                      @foreach(['name', 'email', 'phone_number'] as $field)
                        @error($field)
                          <li>{{ $message }}</li>
                        @enderror
                      @endforeach
                    </ul>
                  </div>
                @endif

                <div class="flex flex-col gap-4">
                  <div class="flex flex-col gap-1.5">
                    <x-label>Full Name</x-label>
                    <x-input type="text" name="name" value="{{ old('name', $user->name) }}" required />
                  </div>
                  <div class="flex flex-col gap-1.5">
                    <x-label>Email Address</x-label>
                    <x-input type="email" name="email" value="{{ old('email', $user->email) }}" />
                  </div>
                  <div class="flex flex-col gap-1.5">
                    <x-label>Phone Number</x-label>
                    <x-input type="tel" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}" required />
                  </div>
                </div>

                <!-- Right-aligned action -->
                <div class="flex justify-end pt-2 border-t border-border-light">
                  <x-button-primary type="submit" size="normal">Save Changes</x-button-primary>
                </div>
              </form>
            </div>
          </div>
        </section>

        <!-- Section 2: Security & Access -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-8 border-b border-border-subtle pb-8 mb-8" x-data="{ newPassword: '', confirmPassword: '' }">
          <div class="md:col-span-1">
            <h2 class="text-[18px] font-semibold text-slate-900 mb-1.5">Security &amp; Access</h2>
            <p class="text-xs text-slate-500 leading-relaxed m-0">Ensure your account is using a long, random password to stay secure.</p>
          </div>
          <div class="md:col-span-2">
            <form method="POST" action="{{ route('admin.account.updatePassword') }}" class="bg-white shadow-sm border border-border-subtle rounded-2xl p-6 flex flex-col gap-4">
              @csrf

              @if(session('password_status'))
                <div class="p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm font-medium">
                  {{ session('password_status') }}
                </div>
              @endif

              @if(isset($errors) && $errors->hasAny(['current_password', 'new_password']))
                <div class="p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-sm">
                  <ul class="list-disc list-inside space-y-1">
                    @error('current_password')
                      <li>{{ $message }}</li>
                    @enderror
                    @error('new_password')
                      <li>{{ $message }}</li>
                    @enderror
                  </ul>
                </div>
              @endif

              <div class="flex flex-col gap-1.5">
                <x-label>Current Password / PIN</x-label>
                <x-input type="password" name="current_password" placeholder="Enter current password" />
              </div>
              <div class="flex flex-col gap-1.5">
                <x-label>New Password</x-label>
                <x-input type="password" name="new_password" placeholder="New password" x-model="newPassword" required />
              </div>
              <div class="flex flex-col gap-1.5">
                <x-label>Confirm New Password</x-label>
                <x-input type="password" name="new_password_confirmation" placeholder="Confirm new password" x-model="confirmPassword" required />
                <p x-show="newPassword !== '' && confirmPassword !== '' && newPassword !== confirmPassword" x-cloak class="text-xs text-rose-500 mt-1 m-0">Passwords do not match.</p>
              </div>

              <!-- Right-aligned action -->
              <div class="flex justify-end pt-3 border-t border-border-light">
                <x-button-primary type="submit" size="normal" x-bind:disabled="newPassword !== confirmPassword || newPassword === ''" class="disabled:opacity-50 disabled:cursor-not-allowed">Update Security</x-button-primary>
              </div>
            </form>
          </div>
        </section>

        <!-- Section 3: Studio Preferences -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-8 border-b border-border-subtle pb-8 mb-8">
          <div class="md:col-span-1">
            <h2 class="text-[18px] font-semibold text-slate-900 mb-1.5">Studio Preferences</h2>
            <p class="text-xs text-slate-500 leading-relaxed m-0">Manage your notification channels and app sounds.</p>
          </div>
          <div class="md:col-span-2">
            <div class="bg-white shadow-sm border border-border-subtle rounded-2xl p-6 flex flex-col gap-6">
              <div class="flex justify-between items-center gap-4 py-2 border-b border-border-light">
                <div>
                  <strong class="block text-sm font-semibold text-slate-900 mb-0.5">Enable WhatsApp Notifications</strong>
                  <p class="m-0 text-slate-500 text-xs">Send daily revenue summary to WhatsApp</p>
                </div>
                <label class="relative inline-block w-11 h-6 cursor-pointer shrink-0">
                  <input type="checkbox" checked class="peer sr-only">
                  <span class="absolute inset-0 bg-slate-200 rounded-full transition-colors peer-checked:bg-primary"></span>
                  <span class="absolute left-1 bottom-1 w-4 h-4 bg-white rounded-full transition-transform peer-checked:translate-x-5 shadow-sm"></span>
                </label>
              </div>

              <div class="flex justify-between items-center gap-4 py-2">
                <div>
                  <strong class="block text-sm font-semibold text-slate-900 mb-0.5">Sound Alerts</strong>
                  <p class="m-0 text-slate-500 text-xs">Play sound for new walk-in bookings</p>
                </div>
                <label class="relative inline-block w-11 h-6 cursor-pointer shrink-0">
                  <input type="checkbox" class="peer sr-only">
                  <span class="absolute inset-0 bg-slate-200 rounded-full transition-colors peer-checked:bg-primary"></span>
                  <span class="absolute left-1 bottom-1 w-4 h-4 bg-white rounded-full transition-transform peer-checked:translate-x-5 shadow-sm"></span>
                </label>
              </div>
            </div>
          </div>
        </section>

        <!-- Section 4: Subscription & Billing -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-8 border-b border-border-subtle pb-8 mb-8">
          <div class="md:col-span-1">
            <h2 class="text-[18px] font-semibold text-slate-900 mb-1.5">Subscription &amp; Billing</h2>
            <p class="text-xs text-slate-500 leading-relaxed m-0">Manage your active plan and download past invoices.</p>
          </div>
          <div class="md:col-span-2 flex flex-col gap-6">
            
            @php
              $planMap = [
                'essential' => ['name' => 'Essential Plan', 'price' => 'Rp 239.000'],
                'architect' => ['name' => 'Architect Plan', 'price' => 'Rp 559.000'],
              ];
              $currentPlan = $planMap[$barbershop->paket_dipilih ?? ''] ?? ['name' => 'No Active Plan', 'price' => 'Rp 0'];
              $subStatus = $barbershop->subscription_status ?? 'trial';
            @endphp
            <!-- Current Plan Card -->
            <div class="bg-primary text-white rounded-2xl p-6 relative overflow-hidden shadow-sm">
              <div class="absolute -right-10 -top-10 w-32 h-32 bg-white opacity-10 rounded-full blur-2xl"></div>
              <div class="relative z-10 flex flex-col sm:flex-row sm:items-center justify-between gap-6">
                <div>
                  <div class="flex items-center gap-3 mb-2">
                    <h3 class="m-0 text-xl font-bold">{{ $currentPlan['name'] }}</h3>
                    @if($subStatus === 'aktif')
                      <span class="bg-emerald-500 text-white text-[10px] font-bold px-2 py-0.5 rounded uppercase tracking-wider">Active</span>
                    @elseif($subStatus === 'trial')
                      <span class="bg-amber-400 text-slate-900 text-[10px] font-bold px-2 py-0.5 rounded uppercase tracking-wider">Trial</span>
                    @else
                      <span class="bg-rose-500 text-white text-[10px] font-bold px-2 py-0.5 rounded uppercase tracking-wider">Inactive</span>
                    @endif
                  </div>
                  <div class="text-[28px] font-bold mb-1">{{ $currentPlan['price'] }}<span class="text-sm font-normal text-white/70">/mo</span></div>
                  <p class="m-0 text-sm text-white/80">
                    @if($subStatus === 'trial')
                      Trial ends on {{ $barbershop && $barbershop->trial_berakhir_pada ? \Carbon\Carbon::parse($barbershop->trial_berakhir_pada)->format('d M Y') : 'N/A' }}
                    @elseif($subStatus === 'aktif')
                      Active subscription
                    @else
                      Subscription inactive
                    @endif
                  </p>
                </div>
                <div class="flex flex-col gap-2 w-full sm:w-auto">
                  <button type="button" class="w-full sm:w-auto bg-white text-primary hover:bg-slate-50 font-semibold text-sm py-2 px-4 rounded-lg cursor-pointer transition-colors shadow-sm">Upgrade Plan</button>
                  <button type="button" class="w-full sm:w-auto bg-transparent border border-white/30 text-white hover:bg-white/10 font-semibold text-sm py-2 px-4 rounded-lg cursor-pointer transition-colors">Change Plan</button>
                </div>
              </div>
            </div>

            <!-- Invoice History -->
            <div class="bg-white shadow-sm border border-border-subtle rounded-2xl overflow-hidden">
              <div class="px-6 py-4 border-b border-border-light bg-slate-50">
                <h3 class="m-0 text-sm font-bold text-slate-900">Invoice History</h3>
              </div>
              <div class="divide-y divide-border-light">
                <div class="px-6 py-4 flex items-center justify-between hover:bg-slate-50 transition-colors">
                  <div>
                    <div class="text-[14px] font-semibold text-slate-900">15 Sep 2026</div>
                    <div class="text-xs text-slate-500 mt-0.5">Rp 559.000 &bull; <span class="text-emerald-600 font-semibold">Paid</span></div>
                  </div>
                  <button type="button" class="text-sm font-semibold text-primary hover:text-accent bg-transparent border-0 cursor-pointer transition-colors">Download PDF</button>
                </div>
                <div class="px-6 py-4 flex items-center justify-between hover:bg-slate-50 transition-colors">
                  <div>
                    <div class="text-[14px] font-semibold text-slate-900">15 Aug 2026</div>
                    <div class="text-xs text-slate-500 mt-0.5">Rp 559.000 &bull; <span class="text-emerald-600 font-semibold">Paid</span></div>
                  </div>
                  <button type="button" class="text-sm font-semibold text-primary hover:text-accent bg-transparent border-0 cursor-pointer transition-colors">Download PDF</button>
                </div>
              </div>
            </div>

          </div>
        </section>

        <!-- Section 5: Danger Zone -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div class="md:col-span-1">
            <h2 class="text-[18px] font-semibold text-rose-600 mb-1.5">Danger Zone</h2>
            <p class="text-xs text-slate-500 leading-relaxed m-0">Destructive actions for your workspace.</p>
          </div>
          <div class="md:col-span-2">
            <div class="bg-white shadow-sm border border-rose-200 rounded-2xl p-6">
              <div class="flex justify-between items-center max-sm:flex-col max-sm:items-start max-sm:gap-4">
                <div>
                  <strong class="block text-sm font-semibold text-rose-600 mb-1">Clear Demo Data</strong>
                  <p class="m-0 text-slate-600 text-xs leading-relaxed">Wipe all current schedule data and reset to zero.</p>
                </div>
                <button type="button" class="bg-rose-500 text-white border-0 py-2.5 px-4 rounded-lg font-semibold text-xs cursor-pointer transition-all hover:bg-rose-600 hover:-translate-y-px shadow-sm shrink-0">Clear Data</button>
              </div>
            </div>
          </div>
        </section>

      </main>
    </div>
  </div>
  @include('partials.logout-modal')
</body>
</html>
