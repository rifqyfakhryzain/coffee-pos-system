<x-app-layout>
    <div class="space-y-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <h1 class="text-4xl font-extrabold tracking-tight text-coffee-900">
                    Halo, <span class="text-accent">Rifqy</span>!
                </h1>
                <p class="text-coffee-600 mt-1 font-medium">Semoga harimu penuh aroma kopi yang nikmat.</p>
            </div>
            <div class="text-right hidden md:block text-coffee-600 text-sm">
                <p class="font-bold">{{ now()->translatedFormat('l, d F Y') }}</p>
                <p id="liveClock" class="tabular-nums">00:00:00</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-[2rem] border border-coffee-100 shadow-sm relative overflow-hidden group">
                <div class="relative z-10">
                    <span class="text-xs font-bold text-coffee-600 uppercase tracking-widest">Penjualan Hari Ini</span>
                    <h3 class="text-3xl font-extrabold text-coffee-900 mt-2">Rp 1.420.000</h3>
                    <div class="mt-4 flex items-center text-xs font-bold text-success">
                        <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                        12% dari kemarin
                    </div>
                </div>
                <div class="absolute -right-4 -bottom-4 opacity-[0.03] group-hover:opacity-[0.07] transition-all duration-500">
                    <svg class="w-32 h-32 text-coffee-900" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M2 12s4.477-10 10-10 10 4.477 10 10-4.477 10-10 10S2 12 2 12zm10 6a6 6 0 100-12 6 6 0 000 12z"/>
                    </svg>
                </div>
            </div>

            <div class="bg-white p-6 rounded-[2rem] border border-coffee-100 shadow-sm">
                <span class="text-xs font-bold text-coffee-600 uppercase tracking-widest">Total Pesanan</span>
                <h3 class="text-3xl font-extrabold text-coffee-900 mt-2">48 <span class="text-lg font-medium text-coffee-600">Cup</span></h3>
                <div class="mt-4 h-2 w-full bg-coffee-50 rounded-full overflow-hidden">
                    <div class="h-full bg-accent" style="width: 75%"></div>
                </div>
            </div>

            <div class="bg-coffee-900 p-6 rounded-[2rem] shadow-xl text-white">
                <span class="text-xs font-bold text-coffee-200 uppercase tracking-widest">Produk Terlaris</span>
                <div class="mt-4 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-white/10 flex items-center justify-center text-xl">☕</div>
                    <div>
                        <h4 class="font-bold">Caramel Macchiato</h4>
                        <p class="text-xs text-coffee-200">24 Pesanan hari ini</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
            <a href="{{ route('kasir.index') }}" 
               class="group relative bg-accent p-8 rounded-[2.5rem] shadow-lg hover:shadow-accent/20 transition-all duration-300 overflow-hidden">
                <div class="relative z-10 flex flex-col h-full justify-between">
                    <div class="bg-white/20 w-12 h-12 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-extrabold text-white leading-none">Buka Kasir</h2>
                        <p class="text-white/80 text-sm mt-2 font-medium">Mulai layani pelanggan</p>
                    </div>
                </div>
            </a>

            <a href="{{ route('products.index') }}" 
               class="group bg-white p-8 rounded-[2.5rem] border-2 border-dashed border-coffee-200 hover:border-coffee-600 transition-all duration-300">
                <div class="flex flex-col h-full justify-between">
                    <div class="bg-coffee-50 w-12 h-12 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-coffee-100">
                        <svg class="w-6 h-6 text-coffee-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-extrabold text-coffee-900 leading-none tracking-tight">Katalog</h2>
                        <p class="text-coffee-600 text-sm mt-2 font-medium">Update stok & harga</p>
                    </div>
                </div>
            </a>

            <a href="{{ route('categories.index') }}" 
               class="group bg-white p-8 rounded-[2.5rem] border-2 border-dashed border-coffee-200 hover:border-coffee-600 transition-all duration-300 md:col-span-1 col-span-2">
                <div class="flex flex-col h-full justify-between">
                    <div class="bg-coffee-50 w-12 h-12 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-coffee-100">
                        <svg class="w-6 h-6 text-coffee-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-extrabold text-coffee-900 leading-none tracking-tight">Kategori</h2>
                        <p class="text-coffee-600 text-sm mt-2 font-medium">Atur kelompok menu</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <script>
        setInterval(() => {
            const now = new Date();
            document.getElementById('liveClock').innerText = now.toLocaleTimeString('id-ID');
        }, 1000);
    </script>
</x-app-layout>