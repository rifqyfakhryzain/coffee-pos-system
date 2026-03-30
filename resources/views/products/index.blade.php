<x-app-layout>
    <div class="space-y-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-3xl font-extrabold tracking-tight text-coffee-900">Daftar Produk</h1>
                <p class="text-coffee-600 font-medium">Kelola menu dan ketersediaan stok kafe Anda.</p>
            </div>
            <a href="{{ route('products.create') }}" 
               class="inline-flex items-center justify-center gap-x-2 bg-accent px-6 py-3 rounded-2xl text-sm font-bold text-white shadow-lg hover:bg-accent-dark transition-all duration-200 transform hover:-translate-y-1">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Tambah Produk Baru
            </a>
        </div>

        <div class="bg-white rounded-[2.5rem] border border-coffee-100 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-coffee-50/50 border-b border-coffee-100">
                            <th class="px-8 py-5 text-xs font-bold uppercase tracking-widest text-coffee-600">#</th>
                            <th class="px-6 py-5 text-xs font-bold uppercase tracking-widest text-coffee-600">Produk</th>
                            <th class="px-6 py-5 text-xs font-bold uppercase tracking-widest text-coffee-600">Harga</th>
                            <th class="px-6 py-5 text-xs font-bold uppercase tracking-widest text-coffee-600">Kategori</th>
                            <th class="px-8 py-5 text-xs font-bold uppercase tracking-widest text-coffee-600 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-coffee-50">
                        @forelse($products as $index => $product)
                            <tr class="group hover:bg-coffee-50/30 transition-colors">
                                <td class="px-8 py-5 text-sm font-bold text-coffee-400">
                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                </td>
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-4">
                                        <div class="h-10 w-10 rounded-xl bg-coffee-100 flex items-center justify-center text-coffee-700 font-bold text-xs group-hover:bg-accent group-hover:text-white transition-all">
                                            {{ strtoupper(substr($product->name, 0, 2)) }}
                                        </div>
                                        <span class="font-bold text-coffee-900">{{ $product->name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <span class="px-3 py-1 rounded-full bg-success/10 text-success text-sm font-bold">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </span>
                                </td>
                                <td class="px-6 py-5">
                                    <span class="text-sm font-medium text-coffee-600 bg-coffee-50 px-3 py-1 rounded-lg border border-coffee-100">
                                        {{ $product->category->name }}
                                    </span>
                                </td>
                                <td class="px-8 py-5 text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('products.edit', $product->id) }}" 
                                           class="p-2 rounded-xl text-coffee-400 hover:text-accent hover:bg-accent/10 transition">
                                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>

                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    onclick="return confirm('Hapus produk ini?')"
                                                    class="p-2 rounded-xl text-coffee-400 hover:text-red-500 hover:bg-red-50 transition">
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
                                <td colspan="5" class="px-8 py-20 text-center">
                                    <div class="flex flex-col items-center">
                                        <div class="h-20 w-20 bg-coffee-50 rounded-full flex items-center justify-center mb-4">
                                            <svg class="h-10 w-10 text-coffee-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                            </svg>
                                        </div>
                                        <h3 class="text-lg font-bold text-coffee-900">Belum Ada Produk</h3>
                                        <p class="text-coffee-500 max-w-xs mx-auto">Mulai isi etalase kopi Anda dengan menambahkan produk pertama.</p>
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