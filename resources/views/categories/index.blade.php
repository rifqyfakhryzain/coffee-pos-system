<x-app-layout>
    <div class="space-y-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-3xl font-extrabold tracking-tight text-coffee-900">Kategori Menu</h1>
                <p class="text-coffee-600 font-medium">Kelompokkan menu Anda agar lebih mudah dicari di kasir.</p>
            </div>
            <a href="{{ route('categories.create') }}" 
               class="inline-flex items-center justify-center gap-x-2 bg-accent px-6 py-3 rounded-2xl text-sm font-bold text-white shadow-lg hover:bg-accent-dark transition-all duration-200 transform hover:-translate-y-1">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Tambah Kategori
            </a>
        </div>

        <div class="bg-white rounded-[2.5rem] border border-coffee-100 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-coffee-50/50 border-b border-coffee-100">
                            <th class="px-8 py-5 text-xs font-bold uppercase tracking-widest text-coffee-600">#</th>
                            <th class="px-6 py-5 text-xs font-bold uppercase tracking-widest text-coffee-600">Nama Kategori</th>
                            <th class="px-6 py-5 text-xs font-bold uppercase tracking-widest text-coffee-600 text-center">Estimasi Produk</th>
                            <th class="px-8 py-5 text-xs font-bold uppercase tracking-widest text-coffee-600 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-coffee-50">
                        @forelse($categories as $index => $category)
                            <tr class="group hover:bg-coffee-50/30 transition-colors">
                                <td class="px-8 py-5 text-sm font-bold text-coffee-400">
                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                </td>
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-4">
                                        <div class="h-10 w-10 rounded-xl bg-coffee-100 flex items-center justify-center text-coffee-700 group-hover:bg-accent group-hover:text-white transition-all">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                            </svg>
                                        </div>
                                        <span class="font-bold text-coffee-900 text-lg">{{ $category->name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-5 text-center">
                                    {{-- Jika Anda punya relasi 'products' di model Category, bisa pakai $category->products->count() --}}
                                    <span class="text-sm font-semibold text-coffee-500 bg-coffee-50 px-3 py-1 rounded-full">
                                        Menu Terdaftar
                                    </span>
                                </td>
                                <td class="px-8 py-5 text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('categories.edit', $category->id) }}" 
                                           class="p-2.5 rounded-xl text-coffee-400 hover:text-accent hover:bg-accent/10 transition shadow-sm border border-transparent hover:border-accent/20">
                                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </a>

                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    onclick="return confirm('Hapus kategori ini? Menu di dalamnya mungkin akan kehilangan kategori.')"
                                                    class="p-2.5 rounded-xl text-coffee-400 hover:text-red-500 hover:bg-red-50 transition shadow-sm border border-transparent hover:border-red-100">
                                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-8 py-24 text-center">
                                    <div class="flex flex-col items-center">
                                        <div class="h-24 w-24 bg-coffee-50 rounded-full flex items-center justify-center mb-6 border-4 border-white shadow-inner">
                                            <svg class="h-12 w-12 text-coffee-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                            </svg>
                                        </div>
                                        <h3 class="text-xl font-bold text-coffee-900">Belum Ada Kategori</h3>
                                        <p class="text-coffee-500 mt-2 max-w-sm mx-auto">Buat kategori seperti "Coffee", "Non-Coffee", atau "Pastry" untuk merapikan menu Anda.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>