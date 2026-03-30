<x-app-layout>
    <div class="max-w-xl mx-auto">
        <div class="mb-8">
            <a href="{{ route('categories.index') }}" class="group inline-flex items-center text-sm font-bold text-coffee-400 hover:text-accent transition-all">
                <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Daftar
            </a>
            <h1 class="text-4xl font-extrabold tracking-tight text-coffee-900 mt-3">Tambah Kategori</h1>
            <p class="text-coffee-500 font-medium">Buat grup baru untuk menu-menu spesial Anda.</p>
        </div>

        <div class="bg-white rounded-[2.5rem] border border-coffee-100 shadow-sm overflow-hidden p-8 sm:p-10 relative">
            <div class="absolute top-0 right-0 p-8 opacity-[0.05] pointer-events-none">
                <svg class="w-24 h-24 text-coffee-900" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                </svg>
            </div>

            <form action="{{ route('categories.store') }}" method="POST" class="space-y-8 relative z-10">
                @csrf

                <div class="space-y-3">
                    <label class="block text-sm font-bold text-coffee-900 ml-1 uppercase tracking-wider text-center sm:text-left">
                        Nama Kategori
                    </label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-6 flex items-center pointer-events-none text-coffee-300 group-focus-within:text-accent transition-colors">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                        </div>
                        <input type="text" name="name" required autofocus
                               class="block w-full pl-14 pr-6 py-5 bg-coffee-50 border-transparent rounded-[1.8rem] focus:bg-white focus:ring-4 focus:ring-accent/10 focus:border-accent transition-all text-coffee-900 font-bold text-lg placeholder-coffee-300"
                               placeholder="Misal: Coffee, Non-Coffee, Snack...">
                    </div>
                </div>

                <div class="pt-4 flex flex-col sm:flex-row gap-4">
                    <button type="reset" class="flex-1 px-8 py-4 rounded-[1.5rem] font-bold text-coffee-400 hover:bg-coffee-50 transition">
                        Reset Input
                    </button>
                    <button type="submit" 
                            class="flex-[2] bg-coffee-900 text-white px-10 py-4 rounded-[1.5rem] font-bold shadow-xl shadow-coffee-900/20 hover:bg-accent hover:shadow-accent/30 transition-all duration-300 transform hover:-translate-y-1 flex items-center justify-center gap-3">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                        </svg>
                        Simpan Kategori
                    </button>
                </div>
            </form>
        </div>

        <div class="mt-8 bg-accent/5 rounded-[2rem] p-6 border border-accent/10">
            <div class="flex gap-4">
                <div class="bg-accent/20 p-3 rounded-2xl h-fit text-accent">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h4 class="text-coffee-900 font-bold">Tips Kategori</h4>
                    <p class="text-coffee-600 text-sm leading-relaxed mt-1">Gunakan nama kategori yang pendek dan jelas agar mudah dibaca pada layar tablet kasir nantinya.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>