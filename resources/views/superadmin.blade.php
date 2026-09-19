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
<div x-data="{ filter: 'All', isModalOpen: false, isSubmitting: false, isSuccess: false }"
     @open-add-studio.document="isModalOpen = true">

  <!-- Metrics Row -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <x-card class="p-6 flex items-start gap-4">
      <div class="w-12 h-12 rounded-xl bg-primary/10 text-primary flex items-center justify-center flex-shrink-0">
        <svg viewBox="0 0 24 24" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
      </div>
      <div>
        <div class="text-sm text-gray-500 font-medium mb-1">Total Studio Aktif</div>
        <div class="text-2xl font-bold font-sans text-gray-900">124</div>
      </div>
    </x-card>

    <x-card class="p-6 flex items-start gap-4">
      <div class="w-12 h-12 rounded-xl bg-primary/10 text-primary flex items-center justify-center flex-shrink-0">
        <svg viewBox="0 0 24 24" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
      </div>
      <div>
        <div class="text-sm text-gray-500 font-medium mb-1">Estimasi MRR</div>
        <div class="text-2xl font-bold font-sans text-gray-900">Rp 48.5M</div>
      </div>
    </x-card>

    <x-card class="p-6 flex items-start gap-4">
      <div class="w-12 h-12 rounded-xl bg-primary/10 text-primary flex items-center justify-center flex-shrink-0">
        <svg viewBox="0 0 24 24" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2" ry="2"></rect><line x1="2" y1="10" x2="22" y2="10"></line></svg>
      </div>
      <div>
        <div class="text-sm text-gray-500 font-medium mb-1">Akumulasi DP Midtrans</div>
        <div class="text-2xl font-bold font-sans text-gray-900">Rp 112.3M</div>
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
        <div class="relative w-full sm:w-64">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg viewBox="0 0 24 24" class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
          </div>
          <x-input type="text" class="pl-10 w-full shadow-sm" placeholder="Search studios..." />
        </div>
      </div>
    </div>

    <div class="overflow-x-auto">
      <table class="w-full text-left whitespace-nowrap">
        <thead class="bg-gray-50 text-xs text-gray-500 uppercase tracking-wider">
          <tr>
            <th class="px-6 py-4 font-medium">Nama Toko</th>
            <th class="px-6 py-4 font-medium">Subdomain</th>
            <th class="px-6 py-4 font-medium">Paket</th>
            <th class="px-6 py-4 font-medium">Trial Status</th>
            <th class="px-6 py-4 font-medium">Status (Suspend)</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-border-light">
          <!-- Row 1: Trial -->
          <tr class="hover:bg-gray-50 transition-colors" x-show="filter === 'All' || filter === 'Trial'">
            <td class="px-6 py-4">
              <div class="font-bold text-gray-900">The Noble Barber</div>
              <div class="text-sm text-gray-500">Jl. Sudirman No. 12</div>
            </td>
            <td class="px-6 py-4"><a href="{{ url('/noble-barber') }}" class="text-primary hover:underline">noble-barber.trimly.com</a></td>
            <td class="px-6 py-4"><x-badge class="bg-indigo-100 text-indigo-800">Architect</x-badge></td>
            <td class="px-6 py-4">
              <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800">
                Trial (4 days left)
              </span>
            </td>
            <td class="px-6 py-4">
              <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" checked class="sr-only peer">
                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
              </label>
            </td>
          </tr>
          <!-- Row 2: Active -->
          <tr class="hover:bg-gray-50 transition-colors" x-show="filter === 'All' || filter === 'Active'">
            <td class="px-6 py-4">
              <div class="font-bold text-gray-900">Gentleman's Cut</div>
              <div class="text-sm text-gray-500">Jl. Pattimura 50</div>
            </td>
            <td class="px-6 py-4"><a href="#" class="text-primary hover:underline">gentlemans.trimly.com</a></td>
            <td class="px-6 py-4"><x-badge class="bg-blue-100 text-blue-800">Essential</x-badge></td>
            <td class="px-6 py-4">
              <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                Active
              </span>
            </td>
            <td class="px-6 py-4">
              <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" checked class="sr-only peer">
                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
              </label>
            </td>
          </tr>
          <!-- Row 3: Inactive -->
          <tr class="hover:bg-gray-50 transition-colors" x-show="filter === 'All' || filter === 'Inactive'">
            <td class="px-6 py-4">
              <div class="font-bold text-gray-900">Classic Edge</div>
              <div class="text-sm text-gray-500">Jl. Merdeka 1A</div>
            </td>
            <td class="px-6 py-4"><a href="#" class="text-primary hover:underline">classicedge.trimly.com</a></td>
            <td class="px-6 py-4"><x-badge class="bg-blue-100 text-blue-800">Essential</x-badge></td>
            <td class="px-6 py-4">
              <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-800">
                Inactive
              </span>
            </td>
            <td class="px-6 py-4">
              <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" class="sr-only peer">
                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
              </label>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </x-card>

  <!-- Modal Drawer: Add New Studio -->
  <template x-teleport="body">
    <div x-show="isModalOpen" x-cloak class="fixed inset-0 z-50 flex justify-end">
      <!-- Backdrop -->
      <div x-show="isModalOpen" x-transition.opacity class="absolute inset-0 bg-gray-900/50 backdrop-blur-sm" @click="isModalOpen = false; setTimeout(() => { isSuccess = false; isSubmitting = false; }, 300)"></div>
      
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
          <button @click="isModalOpen = false; setTimeout(() => { isSuccess = false; isSubmitting = false; }, 300)" class="text-gray-400 hover:text-gray-900 transition-colors">
            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
          </button>
        </div>
        
        <div class="flex-1 overflow-y-auto p-6">
          
          <!-- Success State -->
          <div x-show="isSuccess" x-transition class="bg-green-50 border border-green-200 rounded-xl p-5 flex items-start gap-4 mb-4">
            <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-green-600 shrink-0">
              <svg viewBox="0 0 24 24" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
            </div>
            <div>
              <h4 class="font-bold text-green-900 mb-1">Studio Provisioned!</h4>
              <p class="text-sm text-green-800">Temporary login credentials have been sent to the admin's email.</p>
            </div>
          </div>

          <!-- Form -->
          <form x-show="!isSuccess" x-transition @submit.prevent="isSubmitting = true; setTimeout(() => { isSuccess = true; isSubmitting = false; }, 1000)" class="flex flex-col gap-6" id="addStudioForm">
            
            <!-- Section 1 -->
            <div>
              <h4 class="text-sm font-bold text-slate-900 border-b border-border-light pb-2 mb-4">Section 1: Studio Details</h4>
              <div class="space-y-4">
                <div>
                  <x-label class="mb-1.5 block">Studio Name</x-label>
                  <x-input type="text" class="w-full" required placeholder="Enter shop name" />
                </div>
                <div>
                  <x-label class="mb-1.5 block">Address</x-label>
                  <x-input type="text" class="w-full" required placeholder="Full studio address" />
                </div>
                <div>
                  <x-label class="mb-1.5 block">Studio Phone</x-label>
                  <x-input type="text" class="w-full" required placeholder="08..." />
                </div>
                <div>
                  <x-label class="mb-1.5 block">Subscription Plan</x-label>
                  <select class="w-full border-border-light rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary/20 text-sm px-3 py-2">
                    <option value="trial">14-Day Free Trial</option>
                    <option value="essential">Essential (Rp 289k)</option>
                    <option value="architect">Architect (Rp 699k)</option>
                  </select>
                </div>
              </div>
            </div>

            <!-- Section 2 -->
            <div>
              <h4 class="text-sm font-bold text-slate-900 border-b border-border-light pb-2 mb-4">Section 2: Admin Account</h4>
              <div class="space-y-4">
                <div>
                  <x-label class="mb-1.5 block">Admin Name</x-label>
                  <x-input type="text" class="w-full" required placeholder="Full name" />
                </div>
                <div>
                  <x-label class="mb-1.5 block">Admin Email</x-label>
                  <x-input type="email" class="w-full" required placeholder="admin@studio.com" />
                </div>
                <div>
                  <x-label class="mb-1.5 block">Admin Phone</x-label>
                  <x-input type="text" class="w-full" required placeholder="08..." />
                </div>
              </div>
            </div>
          </form>
        </div>
        
        <div class="p-6 border-t border-border-light flex items-center justify-end gap-3 bg-gray-50 shrink-0">
          <template x-if="!isSuccess">
            <div class="flex items-center gap-3">
              <x-button-outline @click="isModalOpen = false">Cancel</x-button-outline>
              <x-button-primary form="addStudioForm" type="submit" x-bind:disabled="isSubmitting">
                <span x-show="!isSubmitting">Provision Studio</span>
                <span x-show="isSubmitting">Processing...</span>
              </x-button-primary>
            </div>
          </template>
          <template x-if="isSuccess">
            <x-button-outline @click="isModalOpen = false; setTimeout(() => { isSuccess = false; }, 300)">Close</x-button-outline>
          </template>
        </div>
      </div>
    </div>
  </template>

</div>
@endsection
