@extends('layouts.superadmin')

@section('page_title', 'Platform Settings')
@section('eyebrow', 'CONFIGURATION')

@section('content')

<div class="max-w-5xl space-y-8">
  
  <!-- Trial Settings -->
  <x-card class="p-8">
    <div class="flex flex-col md:flex-row gap-8">
      <div class="w-full md:w-1/3">
        <h3 class="text-lg font-bold text-slate-900 mb-2">Trial Settings</h3>
        <p class="text-sm text-slate-500 leading-relaxed">Configure the duration of the free trial period for new barber studios.</p>
      </div>
      <div class="w-full md:w-2/3">
        <form class="space-y-4" @submit.prevent="alert('Trial settings saved successfully.')">
          <div>
            <x-label class="mb-1.5 block text-sm">Trial Duration (Days)</x-label>
            <div class="flex gap-4 items-start">
              <x-input type="number" value="14" min="1" max="90" class="w-32" />
              <x-button-primary type="submit">Save Changes</x-button-primary>
            </div>
          </div>
          <p class="text-xs text-slate-500">Note: Changing this will only affect new registrations, not existing active trials.</p>
        </form>
      </div>
    </div>
  </x-card>

  <!-- Pricing Settings -->
  <x-card class="p-8">
    <div class="flex flex-col md:flex-row gap-8">
      <div class="w-full md:w-1/3">
        <h3 class="text-lg font-bold text-slate-900 mb-2">Plan Pricing</h3>
        <p class="text-sm text-slate-500 leading-relaxed">Adjust the monthly subscription cost for Trimly OS plans.</p>
      </div>
      <div class="w-full md:w-2/3">
        <form class="space-y-6" @submit.prevent="alert('Pricing settings saved successfully.')">
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
              <x-label class="mb-1.5 block text-sm">Essential Plan (Rp/mo)</x-label>
              <div class="relative">
                <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-500 font-medium">Rp</span>
                <x-input type="number" value="289000" class="w-full pl-10" />
              </div>
            </div>
            <div>
              <x-label class="mb-1.5 block text-sm text-primary font-bold">Architect Plan (Rp/mo)</x-label>
              <div class="relative">
                <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-500 font-medium">Rp</span>
                <x-input type="number" value="699000" class="w-full pl-10" />
              </div>
            </div>
          </div>
          <div>
            <x-button-primary type="submit">Update Pricing</x-button-primary>
          </div>
        </form>
      </div>
    </div>
  </x-card>

  <!-- Super Admin Accounts -->
  <x-card class="p-8">
    <div class="flex flex-col md:flex-row gap-8">
      <div class="w-full md:w-1/3">
        <h3 class="text-lg font-bold text-slate-900 mb-2">Super Admins</h3>
        <p class="text-sm text-slate-500 leading-relaxed">Manage system administrators with full platform access.</p>
        <div class="mt-6">
          <x-button-outline onclick="alert('Add Super Admin modal opened.')" class="w-full flex items-center justify-center gap-2">
            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            Add Super Admin
          </x-button-outline>
        </div>
      </div>
      <div class="w-full md:w-2/3 border border-border-light rounded-xl overflow-hidden">
        <table class="w-full text-left">
          <thead class="bg-slate-50 text-xs text-slate-500 uppercase tracking-wider">
            <tr>
              <th class="px-6 py-3 font-medium">Admin User</th>
              <th class="px-6 py-3 font-medium">Role</th>
              <th class="px-6 py-3 font-medium text-right">Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-border-light">
            <tr>
              <td class="px-6 py-4">
                <div class="flex items-center gap-3">
                  <div class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center font-bold text-xs">AF</div>
                  <div>
                    <div class="font-bold text-sm text-slate-900">Alvian Farizqi</div>
                    <div class="text-xs text-slate-500">alvian@trimly.com</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4">
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-primary/10 text-primary uppercase">Owner</span>
              </td>
              <td class="px-6 py-4 text-right">
                <button type="button" class="text-slate-400 cursor-not-allowed" disabled>
                  <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 4H8l-7 8 7 8h13a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"></path><line x1="18" y1="9" x2="12" y2="15"></line><line x1="12" y1="9" x2="18" y2="15"></line></svg>
                </button>
              </td>
            </tr>
            <tr>
              <td class="px-6 py-4">
                <div class="flex items-center gap-3">
                  <div class="w-8 h-8 rounded-full bg-slate-200 text-slate-600 flex items-center justify-center font-bold text-xs">DA</div>
                  <div>
                    <div class="font-bold text-sm text-slate-900">Dimas Arya</div>
                    <div class="text-xs text-slate-500">dimas@trimly.com</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4">
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-slate-100 text-slate-700 uppercase">Admin</span>
              </td>
              <td class="px-6 py-4 text-right">
                <button type="button" class="text-red-500 hover:text-red-700 transition-colors" title="Revoke Access">
                  <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 4H8l-7 8 7 8h13a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"></path><line x1="18" y1="9" x2="12" y2="15"></line><line x1="12" y1="9" x2="18" y2="15"></line></svg>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </x-card>
</div>

@endsection
