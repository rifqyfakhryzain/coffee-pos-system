<x-app-layout>
    <div class="max-w-xl mx-auto">
        <div class="mb-8">
            <a href="{{ route('categories.index') }}" class="group inline-flex items-center text-sm font-bold text-coffee-400 hover:text-accent transition-all">
                <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Batal & Kembali
            </a>
            <h1 class="text-4xl font-extrabold tracking-tight text-coffee-900 mt-3">Edit Kategori</h1>
            <p class="text-coffee-500 font-medium">Mengubah kategori <span class="text-accent font-bold">"{{ $category->name }}"</span></p>
        </div>

        <div class="bg-white rounded-[2.5rem] border border-coffee-100 shadow-sm overflow-hidden p-8 sm:p-10 relative">
            <div class="absolute top-0 right-0 p-8 opacity-[0.05] pointer-events-none">
                <svg class="w-24 h-24 text-coffee-900" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z"/>
                </svg>
            </div>

            <form action="{{ route('categories.update', $category->id) }}" method="POST" class="space-y-8 relative z-10">
                @csrf
                @method('PUT')

                <div class="space-y-3">
                    <label class="block text-sm font-bold text-coffee-900 ml-1 uppercase tracking-wider">
                        Nama Kategori Baru
                    </label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-6 flex items-center pointer-events-none text-accent transition-colors">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                        </div>
                        <input type="text" name="name" value="{{ $category->name }}" required
                               class="block w-full pl-14 pr-6 py-5 bg-coffee-50 border-transparent rounded-[1.8rem] focus:bg-white focus:ring-4 focus:ring-accent/10 focus:border-accent transition-all text-coffee-900 font-bold text-lg">
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" 
                            class="w-full bg-accent text-white px-10 py-5 rounded-[1.5rem] font-bold shadow-xl shadow-accent/20 hover:bg-accent-dark hover:shadow-accent/30 transition-all duration-300 transform hover:-translate-y-1 flex items-center justify-center gap-3">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Update Nama Kategori
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>