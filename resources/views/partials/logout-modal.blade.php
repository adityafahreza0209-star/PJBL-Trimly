<div x-data="{ showLogoutModal: false }" @open-logout-modal.window="showLogoutModal = true">
    <div x-show="showLogoutModal" 
         x-cloak 
         class="fixed inset-0 bg-primary/60 backdrop-blur-sm grid place-items-center p-5 z-[100]" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">
        
        <div @click.away="showLogoutModal = false" 
             x-show="showLogoutModal" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 scale-95 translate-y-2"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
             x-transition:leave-end="opacity-0 scale-95 translate-y-2"
             class="w-full max-w-[400px] bg-white rounded-2xl shadow-2xl border border-border-subtle overflow-hidden relative">
            
            <div class="p-6 border-b border-border-light flex items-center justify-between">
                <div>
                    <h3 class="m-0 text-lg font-bold text-slate-900">Konfirmasi Sign Out</h3>
                </div>
                <button @click="showLogoutModal = false" type="button" class="border-0 bg-transparent text-slate-400 hover:text-slate-600 text-[24px] leading-none cursor-pointer p-1">&times;</button>
            </div>
            
            <div class="p-6">
                <p class="m-0 text-sm text-slate-600 leading-relaxed">
                    Anda yakin ingin keluar dari Trimly Terminal?
                </p>
            </div>
            
            <div class="p-6 pt-4 bg-slate-50 border-t border-border-light flex justify-end gap-3">
                <button type="button" @click="showLogoutModal = false" class="px-4 py-2 text-sm font-semibold text-slate-600 bg-white border border-slate-300 rounded-lg hover:bg-slate-50 cursor-pointer transition-colors">Batal</button>
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="px-4 py-2 text-sm font-semibold text-white bg-rose-600 border border-rose-600 rounded-lg hover:bg-rose-700 cursor-pointer transition-colors shadow-sm">Ya, Keluar</button>
                </form>
            </div>
        </div>
    </div>
</div>
