@extends('layouts.superadmin')

@section('page_title', 'Financial Overview')
@section('eyebrow', 'REVENUE')

@section('content')
<!-- Top KPIs -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
  <x-card class="p-6 flex items-start gap-4">
    <div class="w-12 h-12 rounded-xl bg-green-100 text-green-700 flex items-center justify-center flex-shrink-0">
      <svg viewBox="0 0 24 24" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
    </div>
    <div>
      <div class="text-sm text-gray-500 font-medium mb-1">Current MRR</div>
      <div class="text-2xl font-bold font-sans text-gray-900">Rp 48.500.000</div>
    </div>
  </x-card>

  <x-card class="p-6 flex items-start gap-4">
    <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center flex-shrink-0">
      <svg viewBox="0 0 24 24" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
    </div>
    <div>
      <div class="text-sm text-gray-500 font-medium mb-1">Trial-to-Paid Conversion</div>
      <div class="text-2xl font-bold font-sans text-gray-900">68%</div>
    </div>
  </x-card>

  <x-card class="p-6 flex items-start gap-4">
    <div class="w-12 h-12 rounded-xl bg-red-100 text-red-700 flex items-center justify-center flex-shrink-0">
      <svg viewBox="0 0 24 24" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="18" y1="8" x2="23" y2="13"></line><line x1="23" y1="8" x2="18" y2="13"></line></svg>
    </div>
    <div>
      <div class="text-sm text-gray-500 font-medium mb-1">Churned This Month</div>
      <div class="text-2xl font-bold font-sans text-gray-900">2 <span class="text-sm font-normal text-gray-500">Studios</span></div>
    </div>
  </x-card>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
  <!-- MRR Trend Chart -->
  <x-card class="lg:col-span-2 p-6 flex flex-col">
    <h3 class="font-bold text-lg text-slate-900 mb-6">MRR Trend (Last 6 Months)</h3>
    <div class="flex-1 flex items-end gap-4 sm:gap-8 h-48 border-b border-border-light pb-2 relative">
      
      <!-- Chart Y-Axis lines -->
      <div class="absolute inset-x-0 bottom-12 border-b border-dashed border-gray-200 z-0"></div>
      <div class="absolute inset-x-0 bottom-24 border-b border-dashed border-gray-200 z-0"></div>
      <div class="absolute inset-x-0 bottom-36 border-b border-dashed border-gray-200 z-0"></div>

      <!-- Bars -->
      <div class="flex-1 flex flex-col items-center gap-2 z-10 group">
        <div class="w-full max-w-[40px] bg-indigo-100 rounded-t-md h-24 group-hover:bg-indigo-200 transition-colors relative">
          <div class="absolute -top-8 left-1/2 -translate-x-1/2 opacity-0 group-hover:opacity-100 text-xs font-bold bg-gray-800 text-white py-1 px-2 rounded transition-opacity whitespace-nowrap">Rp 22M</div>
        </div>
        <span class="text-xs text-gray-500 font-medium">Apr</span>
      </div>
      <div class="flex-1 flex flex-col items-center gap-2 z-10 group">
        <div class="w-full max-w-[40px] bg-indigo-200 rounded-t-md h-28 group-hover:bg-indigo-300 transition-colors relative">
           <div class="absolute -top-8 left-1/2 -translate-x-1/2 opacity-0 group-hover:opacity-100 text-xs font-bold bg-gray-800 text-white py-1 px-2 rounded transition-opacity whitespace-nowrap">Rp 28M</div>
        </div>
        <span class="text-xs text-gray-500 font-medium">May</span>
      </div>
      <div class="flex-1 flex flex-col items-center gap-2 z-10 group">
        <div class="w-full max-w-[40px] bg-indigo-300 rounded-t-md h-32 group-hover:bg-indigo-400 transition-colors relative">
           <div class="absolute -top-8 left-1/2 -translate-x-1/2 opacity-0 group-hover:opacity-100 text-xs font-bold bg-gray-800 text-white py-1 px-2 rounded transition-opacity whitespace-nowrap">Rp 32M</div>
        </div>
        <span class="text-xs text-gray-500 font-medium">Jun</span>
      </div>
      <div class="flex-1 flex flex-col items-center gap-2 z-10 group">
        <div class="w-full max-w-[40px] bg-indigo-400 rounded-t-md h-36 group-hover:bg-indigo-500 transition-colors relative">
           <div class="absolute -top-8 left-1/2 -translate-x-1/2 opacity-0 group-hover:opacity-100 text-xs font-bold bg-gray-800 text-white py-1 px-2 rounded transition-opacity whitespace-nowrap">Rp 38M</div>
        </div>
        <span class="text-xs text-gray-500 font-medium">Jul</span>
      </div>
      <div class="flex-1 flex flex-col items-center gap-2 z-10 group">
        <div class="w-full max-w-[40px] bg-indigo-500 rounded-t-md h-40 group-hover:bg-indigo-600 transition-colors relative">
           <div class="absolute -top-8 left-1/2 -translate-x-1/2 opacity-0 group-hover:opacity-100 text-xs font-bold bg-gray-800 text-white py-1 px-2 rounded transition-opacity whitespace-nowrap">Rp 42M</div>
        </div>
        <span class="text-xs text-gray-500 font-medium">Aug</span>
      </div>
      <div class="flex-1 flex flex-col items-center gap-2 z-10 group">
        <div class="w-full max-w-[40px] bg-primary rounded-t-md h-48 group-hover:bg-primary/90 transition-colors relative">
           <div class="absolute -top-8 left-1/2 -translate-x-1/2 opacity-0 group-hover:opacity-100 text-xs font-bold bg-gray-800 text-white py-1 px-2 rounded transition-opacity whitespace-nowrap">Rp 48.5M</div>
        </div>
        <span class="text-xs font-bold text-primary">Sep</span>
      </div>
    </div>
  </x-card>

  <!-- Plan Breakdown -->
  <x-card class="p-6">
    <h3 class="font-bold text-lg text-slate-900 mb-6">Plan Breakdown</h3>
    <div class="space-y-6">
      
      <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center">
            <svg viewBox="0 0 24 24" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect></svg>
          </div>
          <div>
            <div class="font-bold text-slate-900">Essential Plan</div>
            <div class="text-xs text-slate-500">Rp 289.000 / mo</div>
          </div>
        </div>
      </div>
      <div class="grid grid-cols-2 gap-4 bg-slate-50 rounded-xl p-4">
        <div>
          <div class="text-xs text-slate-500 mb-1">Active Studios</div>
          <div class="font-bold text-lg text-slate-900">45</div>
        </div>
        <div>
          <div class="text-xs text-slate-500 mb-1">Monthly Revenue</div>
          <div class="font-bold text-lg text-slate-900">Rp 13.0M</div>
        </div>
      </div>
      
      <hr class="border-border-light border-dashed my-2">

      <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center">
            <svg viewBox="0 0 24 24" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2l10 6.5v7L12 22 2 15.5v-7L12 2z"></path></svg>
          </div>
          <div>
            <div class="font-bold text-slate-900">Architect Plan</div>
            <div class="text-xs text-slate-500">Rp 699.000 / mo</div>
          </div>
        </div>
      </div>
      <div class="grid grid-cols-2 gap-4 bg-slate-50 rounded-xl p-4">
        <div>
          <div class="text-xs text-slate-500 mb-1">Active Studios</div>
          <div class="font-bold text-lg text-slate-900">51</div>
        </div>
        <div>
          <div class="text-xs text-slate-500 mb-1">Monthly Revenue</div>
          <div class="font-bold text-lg text-slate-900">Rp 35.6M</div>
        </div>
      </div>

    </div>
  </x-card>
</div>

<!-- Table: Trials Ending Soon -->
<x-card>
  <div class="px-6 py-5 border-b border-border-light flex items-center justify-between gap-4">
    <h2 class="text-[18px] font-semibold text-slate-900">Trials Ending Soon (&le; 3 Days)</h2>
  </div>
  <div class="overflow-x-auto">
    <table class="w-full text-left whitespace-nowrap">
      <thead class="bg-gray-50 text-xs text-gray-500 uppercase tracking-wider">
        <tr>
          <th class="px-6 py-4 font-medium">Nama Toko</th>
          <th class="px-6 py-4 font-medium">Days Left</th>
          <th class="px-6 py-4 font-medium">Selected Plan</th>
          <th class="px-6 py-4 font-medium text-right">Action</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-border-light">
        <tr class="hover:bg-gray-50 transition-colors">
          <td class="px-6 py-4">
            <div class="font-bold text-gray-900">Studio 99</div>
            <div class="text-sm text-gray-500">Andi Saputra</div>
          </td>
          <td class="px-6 py-4">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-red-100 text-red-800">
              1 Day
            </span>
          </td>
          <td class="px-6 py-4">
            <x-badge class="bg-indigo-100 text-indigo-800">Architect</x-badge>
          </td>
          <td class="px-6 py-4 text-right">
            <button type="button" onclick="alert('Reminder email sent!')" class="text-xs font-medium bg-white border border-slate-300 text-slate-700 hover:bg-slate-50 px-3 py-1.5 rounded-md shadow-sm transition-colors">
              Send Reminder
            </button>
          </td>
        </tr>
        <tr class="hover:bg-gray-50 transition-colors">
          <td class="px-6 py-4">
            <div class="font-bold text-gray-900">Haircode JKT</div>
            <div class="text-sm text-gray-500">Rina Melati</div>
          </td>
          <td class="px-6 py-4">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-orange-100 text-orange-800">
              2 Days
            </span>
          </td>
          <td class="px-6 py-4">
            <x-badge class="bg-blue-100 text-blue-800">Essential</x-badge>
          </td>
          <td class="px-6 py-4 text-right">
            <button type="button" onclick="alert('Reminder email sent!')" class="text-xs font-medium bg-white border border-slate-300 text-slate-700 hover:bg-slate-50 px-3 py-1.5 rounded-md shadow-sm transition-colors">
              Send Reminder
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</x-card>

@endsection
