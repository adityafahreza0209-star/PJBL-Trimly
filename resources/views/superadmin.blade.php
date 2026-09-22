@extends('layouts.superadmin')

@section('page_title', 'Studio Registry')
@section('eyebrow', 'System Overview')

@section('topbar_actions')
<x-button-primary onclick="document.dispatchEvent(new CustomEvent('open-add-studio'))" class="flex items-center gap-2">
  <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
  Add New Studio
</x-button-primary>
@endsection

@section('content')
<div x-data="{
  filter: 'All',
  isModalOpen: false,
  isSubmitting: false,
  isSuccess: false,
  errorMessage: '',
  errors: {},
  form: {
    studio_name: '',
    studio_address: '',
    studio_phone: '',
    subscription_plan: 'trial',
    admin_name: '',
    admin_email: '',
    admin_phone: ''
  },
  credentials: {
    admin_email: '',
    temp_password: '',
    studio_name: ''
  },
  async submitStudio() {
    this.isSubmitting = true;
    this.errorMessage = '';
    this.errors = {};
    try {
      const token = document.querySelector('meta[name=\'csrf-token\']')?.getAttribute('content');
      const res = await fetch('{{ route('superadmin.studios.store') }}', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'X-CSRF-TOKEN': token
        },
        body: JSON.stringify(this.form)
      });
      const data = await res.json();
      if (res.ok && data.success) {
        this.credentials = {
          admin_email: data.admin_email,
          temp_password: data.temp_password,
          studio_name: data.studio_name
        };
        this.isSuccess = true;
      } else {
        if (data.errors) {
          this.errors = data.errors;
          this.errorMessage = Object.values(data.errors).flat().join(', ');
        } else {
          this.errorMessage = data.message || 'Gagal menambahkan studio.';
        }
      }
    } catch (err) {
      this.errorMessage = 'Terjadi kesalahan sistem. Silakan coba lagi.';
    } finally {
      this.isSubmitting = false;
    }
  },
  closeModal() {
    const shouldReload = this.isSuccess;
    this.isModalOpen = false;
    setTimeout(() => {
      this.isSuccess = false;
      this.isSubmitting = false;
      this.errorMessage = '';
      this.errors = {};
      this.form = {
        studio_name: '',
        studio_address: '',
        studio_phone: '',
        subscription_plan: 'trial',
        admin_name: '',
        admin_email: '',
        admin_phone: ''
      };
      if (shouldReload) {
        window.location.reload();
      }
    }, 300);
  }
}"
     @open-add-studio.document="isModalOpen = true">

  <!-- Metrics Row -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <x-card class="p-6 flex items-start gap-4">
      <div class="w-12 h-12 rounded-xl bg-primary/10 text-primary flex items-center justify-center flex-shrink-0">
        <svg viewBox="0 0 24 24" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
      </div>
      <div>
        <div class="text-sm text-gray-500 font-medium mb-1">Total Studios</div>
        <div class="text-2xl font-bold font-sans text-gray-900">{{ $totalStudios }}</div>
      </div>
    </x-card>

    <x-card class="p-6 flex items-start gap-4">
      <div class="w-12 h-12 rounded-xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center flex-shrink-0">
        <svg viewBox="0 0 24 24" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
      </div>
      <div>
        <div class="text-sm text-gray-500 font-medium mb-1">Active Studios</div>
        <div class="text-2xl font-bold font-sans text-gray-900">{{ $activeStudios }}</div>
      </div>
    </x-card>

    <x-card class="p-6 flex items-start gap-4">
      <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-600 flex items-center justify-center flex-shrink-0">
        <svg viewBox="0 0 24 24" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
      </div>
      <div>
        <div class="text-sm text-gray-500 font-medium mb-1">Trial Studios</div>
        <div class="text-2xl font-bold font-sans text-gray-900">{{ $trialStudios }}</div>
      </div>
    </x-card>
  </div>

  <!-- Studio List Table -->
  <x-card>
    <div class="px-6 py-5 border-b border-border-light flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
      <h2 class="text-[18px] font-semibold text-slate-900">Studio Registry</h2>
      <div class="flex items-center gap-3 w-full sm:w-auto">
        <!-- Filter Dropdown -->
        <div class="relative" x-data="{ open: false }">
          <button @click="open = !open" @click.outside="open = false" class="bg-white border border-slate-300 text-slate-700 text-sm rounded-lg px-4 py-2 flex items-center justify-between min-w-[130px] shadow-sm hover:bg-slate-50">
            <span x-text="filter === 'All' ? 'Status: All' : filter"></span>
            <svg viewBox="0 0 24 24" class="w-4 h-4 ml-2 text-slate-400" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
          </button>
          <div x-show="open" x-cloak class="absolute right-0 mt-2 w-40 bg-white rounded-xl shadow-lg border border-slate-100 py-1 z-10">
            <button @click="filter = 'All'; open = false" class="w-full text-left px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">All</button>
            <button @click="filter = 'Trial'; open = false" class="w-full text-left px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">Trial</button>
            <button @click="filter = 'Active'; open = false" class="w-full text-left px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">Active</button>
            <button @click="filter = 'Inactive'; open = false" class="w-full text-left px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">Inactive</button>
          </div>
        </div>
        
        <!-- Search Bar -->
        <form method="GET" action="{{ route('superadmin.dashboard') }}" class="relative w-full sm:w-64">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg viewBox="0 0 24 24" class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
          </div>
          <x-input type="text" name="search" value="{{ request('search') }}" class="pl-10 w-full shadow-sm" placeholder="Search studios..." />
        </form>
      </div>
    </div>

    <div class="overflow-x-auto">
      <table class="w-full text-left whitespace-nowrap">
        <thead class="bg-gray-50 text-xs text-gray-500 uppercase tracking-wider">
          <tr>
            <th class="px-6 py-4 font-medium">Nama Barbershop</th>
            <th class="px-6 py-4 font-medium">Owner / Admin</th>
            <th class="px-6 py-4 font-medium">Paket</th>
            <th class="px-6 py-4 font-medium">Status</th>
            <th class="px-6 py-4 font-medium">Tanggal Daftar</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-border-light">
          @forelse($barbershops as $shop)
            @php
              $cat = match($shop->subscription_status) {
                'trial' => 'Trial',
                'aktif' => 'Active',
                default => 'Inactive'
              };
              $isActive = ($shop->subscription_status !== 'nonaktif');
            @endphp
            <tr class="hover:bg-gray-50 transition-colors" x-show="filter === 'All' || filter === '{{ $cat }}'">
              <td class="px-6 py-4">
                <div class="font-bold text-gray-900">{{ $shop->name }}</div>
                @if($shop->address)
                  <div class="text-xs text-gray-400">{{ $shop->address }}</div>
                @endif
              </td>
              <td class="px-6 py-4 text-sm text-gray-700">
                {{ $shop->admin->name ?? 'Belum ada admin' }}
              </td>
              <td class="px-6 py-4">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold {{ $shop->paket_dipilih === 'architect' ? 'bg-indigo-100 text-indigo-800' : ($shop->paket_dipilih === 'essential' ? 'bg-blue-100 text-blue-800' : 'bg-slate-100 text-slate-700') }}">
                  {{ ucfirst($shop->paket_dipilih ?? 'Belum milih') }}
                </span>
              </td>
              <td class="px-6 py-4">
                <div class="flex items-center gap-2">
                  @if($shop->subscription_status === 'aktif')
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">
                      Aktif
                    </span>
                  @elseif($shop->subscription_status === 'trial')
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-100 text-amber-800">
                      Trial
                    </span>
                  @else
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-rose-100 text-rose-800">
                      Nonaktif
                    </span>
                  @endif

                  <label class="relative inline-flex items-center cursor-pointer ml-1" title="Toggle Status Aktif / Suspend">
                    <input type="checkbox" 
                           {{ $isActive ? 'checked' : '' }} 
                           onchange="toggleStudioSuspend('{{ route('superadmin.barbershops.toggleSuspend', $shop) }}', this)" 
                           class="sr-only peer">
                    <div class="w-8 h-4.5 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-3.5 after:w-3.5 after:transition-all peer-checked:bg-primary"></div>
                  </label>
                </div>
              </td>
              <td class="px-6 py-4 text-sm text-gray-500">
                {{ $shop->created_at ? $shop->created_at->format('d M Y') : '-' }}
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="px-6 py-8 text-center text-slate-500">
                Belum ada data studio
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </x-card>

  <!-- Modal Drawer: Add New Studio -->
  <template x-teleport="body">
    <div x-show="isModalOpen" x-cloak class="fixed inset-0 z-50 flex justify-end">
      <!-- Backdrop -->
      <div x-show="isModalOpen" x-transition.opacity class="absolute inset-0 bg-gray-900/50 backdrop-blur-sm" @click="closeModal()"></div>
      
      <!-- Drawer -->
      <div x-show="isModalOpen" 
           x-transition:enter="transition-transform duration-300 ease-out"
           x-transition:enter-start="translate-x-full"
           x-transition:enter-end="translate-x-0"
           x-transition:leave="transition-transform duration-300 ease-in"
           x-transition:leave-start="translate-x-0"
           x-transition:leave-end="translate-x-full"
           class="w-full max-w-md bg-surface h-full shadow-2xl flex flex-col relative z-10">
           
        <div class="px-6 py-5 border-b border-border-light flex items-center justify-between shrink-0">
          <h3 class="font-bold text-xl font-sans">Add New Studio</h3>
          <button @click="closeModal()" class="text-gray-400 hover:text-gray-900 transition-colors">
            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
          </button>
        </div>
        
        <div class="flex-1 overflow-y-auto p-6">
          
          <!-- Error Alert -->
          <div x-show="errorMessage" x-transition class="bg-red-50 border border-red-200 text-red-700 text-sm rounded-xl p-4 mb-4">
            <div class="font-semibold mb-1">Gagal Menyimpan Studio</div>
            <p x-text="errorMessage"></p>
          </div>

          <!-- Success State -->
          <div x-show="isSuccess" x-transition class="space-y-4 mb-4">
            <div class="bg-green-50 border border-green-200 rounded-xl p-5 flex items-start gap-4">
              <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-green-600 shrink-0">
                <svg viewBox="0 0 24 24" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
              </div>
              <div>
                <h4 class="font-bold text-green-900 mb-1">Studio Provisioned!</h4>
                <p class="text-sm text-green-800">Studio <strong x-text="credentials.studio_name"></strong> berhasil didaftarkan.</p>
              </div>
            </div>

            <!-- Credentials Box -->
            <div class="bg-slate-50 border border-slate-200 rounded-xl p-5 space-y-3">
              <div class="text-xs font-bold text-slate-500 uppercase tracking-wider">Kredensial Login Admin</div>
              <div>
                <div class="text-xs text-slate-500 mb-1">Email</div>
                <div class="px-3 py-2 bg-white rounded-lg border border-slate-200 text-sm font-mono text-slate-900 select-all" x-text="credentials.admin_email"></div>
              </div>
              <div>
                <div class="text-xs text-slate-500 mb-1">Password Sementara</div>
                <div class="px-3 py-2 bg-white rounded-lg border border-slate-200 text-sm font-mono font-bold text-primary select-all" x-text="credentials.temp_password"></div>
              </div>
              <p class="text-xs text-slate-500">Berikan kredensial login ini kepada administrator studio untuk akses pertama kali.</p>
            </div>
          </div>

          <!-- Form -->
          <form x-show="!isSuccess" x-transition @submit.prevent="submitStudio()" class="flex flex-col gap-6" id="addStudioForm">
            
            <!-- Section 1 -->
            <div>
              <h4 class="text-sm font-bold text-slate-900 border-b border-border-light pb-2 mb-4">Section 1: Studio Details</h4>
              <div class="space-y-4">
                <div>
                  <x-label class="mb-1.5 block">Studio Name</x-label>
                  <x-input type="text" name="studio_name" x-model="form.studio_name" class="w-full" required placeholder="Enter shop name" />
                  <p x-show="errors.studio_name" x-text="errors.studio_name?.[0]" class="text-xs text-red-600 mt-1"></p>
                </div>
                <div>
                  <x-label class="mb-1.5 block">Address</x-label>
                  <x-input type="text" name="studio_address" x-model="form.studio_address" class="w-full" required placeholder="Full studio address" />
                  <p x-show="errors.studio_address" x-text="errors.studio_address?.[0]" class="text-xs text-red-600 mt-1"></p>
                </div>
                <div>
                  <x-label class="mb-1.5 block">Studio Phone</x-label>
                  <x-input type="text" name="studio_phone" x-model="form.studio_phone" class="w-full" required placeholder="08..." />
                  <p x-show="errors.studio_phone" x-text="errors.studio_phone?.[0]" class="text-xs text-red-600 mt-1"></p>
                </div>
                <div>
                  <x-label class="mb-1.5 block">Subscription Plan</x-label>
                  <select name="subscription_plan" x-model="form.subscription_plan" class="w-full border-border-light rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary/20 text-sm px-3 py-2">
                    <option value="trial">14-Day Free Trial</option>
                    <option value="essential">Essential (Rp 239k)</option>
                    <option value="architect">Architect (Rp 559k)</option>
                  </select>
                  <p x-show="errors.subscription_plan" x-text="errors.subscription_plan?.[0]" class="text-xs text-red-600 mt-1"></p>
                </div>
              </div>
            </div>

            <!-- Section 2 -->
            <div>
              <h4 class="text-sm font-bold text-slate-900 border-b border-border-light pb-2 mb-4">Section 2: Admin Account</h4>
              <div class="space-y-4">
                <div>
                  <x-label class="mb-1.5 block">Admin Name</x-label>
                  <x-input type="text" name="admin_name" x-model="form.admin_name" class="w-full" required placeholder="Full name" />
                  <p x-show="errors.admin_name" x-text="errors.admin_name?.[0]" class="text-xs text-red-600 mt-1"></p>
                </div>
                <div>
                  <x-label class="mb-1.5 block">Admin Email</x-label>
                  <x-input type="email" name="admin_email" x-model="form.admin_email" class="w-full" required placeholder="admin@studio.com" />
                  <p x-show="errors.admin_email" x-text="errors.admin_email?.[0]" class="text-xs text-red-600 mt-1"></p>
                </div>
                <div>
                  <x-label class="mb-1.5 block">Admin Phone</x-label>
                  <x-input type="text" name="admin_phone" x-model="form.admin_phone" class="w-full" required placeholder="08..." />
                  <p x-show="errors.admin_phone" x-text="errors.admin_phone?.[0]" class="text-xs text-red-600 mt-1"></p>
                </div>
              </div>
            </div>
          </form>
        </div>
        
        <div class="p-6 border-t border-border-light flex items-center justify-end gap-3 bg-gray-50 shrink-0">
          <template x-if="!isSuccess">
            <div class="flex items-center gap-3">
              <x-button-outline @click="closeModal()">Cancel</x-button-outline>
              <x-button-primary form="addStudioForm" type="submit" x-bind:disabled="isSubmitting">
                <span x-show="!isSubmitting">Provision Studio</span>
                <span x-show="isSubmitting">Processing...</span>
              </x-button-primary>
            </div>
          </template>
          <template x-if="isSuccess">
            <x-button-primary @click="closeModal()">Close & Selesai</x-button-primary>
          </template>
        </div>
      </div>
    </div>
  </template>

</div>

<script>
  async function toggleStudioSuspend(url, checkbox) {
    checkbox.disabled = true;
    try {
      const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
      const res = await fetch(url, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'X-CSRF-TOKEN': token
        }
      });
      const data = await res.json();
      if (res.ok && data.status === 'success') {
        window.location.reload();
      } else {
        alert(data.message || 'Gagal mengubah status studio.');
        checkbox.checked = !checkbox.checked;
      }
    } catch (err) {
      alert('Terjadi kesalahan saat mengubah status studio.');
      checkbox.checked = !checkbox.checked;
    } finally {
      checkbox.disabled = false;
    }
  }
</script>
@endsection
