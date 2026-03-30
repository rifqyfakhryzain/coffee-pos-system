<x-app-layout>
    <div class="max-w-2xl mx-auto">
        <div class="mb-8">
            <a href="{{ route('products.index') }}" class="group inline-flex items-center text-sm font-bold text-coffee-400 hover:text-accent transition-all">
                <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Daftar
            </a>
            <h1 class="text-4xl font-extrabold tracking-tight text-coffee-900 mt-3">Tambah Produk</h1>
        </div>

        <div class="bg-white rounded-[2.5rem] border border-coffee-100 shadow-sm overflow-hidden p-8 sm:p-10">
            <form action="{{ route('products.store') }}" method="POST" class="space-y-8">
                @csrf

                <div class="space-y-2">
                    <label class="block text-sm font-bold text-coffee-900 ml-1 uppercase tracking-wider">Nama Produk</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-coffee-300 group-focus-within:text-accent transition-colors">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </div>
                        <input type="text" name="name" required
                               class="block w-full pl-12 pr-4 py-4 bg-coffee-50 border-transparent rounded-[1.5rem] focus:bg-white focus:ring-2 focus:ring-accent focus:border-transparent transition text-coffee-900 font-semibold"
                               placeholder="Contoh: Caramel Macchiato">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-2" x-data="{ 
                        displayValue: '',
                        formatNumber(val) {
                            if (!val) return '';
                            let num = val.replace(/\D/g, '');
                            return num.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                        }
                    }">
                        <label class="block text-sm font-bold text-coffee-900 ml-1 uppercase tracking-wider">Harga Jual</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-coffee-300 group-focus-within:text-accent">
                                <span class="font-bold text-sm">Rp</span>
                            </div>
                            <input type="text" x-model="displayValue" 
                                   @input="displayValue = formatNumber($event.target.value)"
                                   placeholder="0"
                                   class="block w-full pl-12 pr-4 py-4 bg-coffee-50 border-transparent rounded-[1.5rem] focus:bg-white focus:ring-2 focus:ring-accent focus:border-transparent transition text-coffee-900 font-bold text-lg">
                            {{-- Hidden input untuk mengirim angka murni ke database --}}
                            <input type="hidden" name="price" :value="displayValue.replace(/\./g, '')">
                        </div>
                    </div>

                    <div class="space-y-2" x-data="{ 
                        open: false, 
                        selectedName: 'Pilih Kategori', 
                        selectedId: '' 
                    }">
                        <label class="block text-sm font-bold text-coffee-900 ml-1 uppercase tracking-wider">Kategori</label>
                        <div class="relative">
                            <button type="button" @click="open = !open"
                                    class="relative w-full pl-12 pr-10 py-4 text-left bg-coffee-50 border-transparent rounded-[1.5rem] focus:outline-none focus:ring-2 focus:ring-accent transition cursor-pointer">
                                <span class="absolute inset-y-0 left-0 pl-5 flex items-center text-coffee-300">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                    </svg>
                                </span>
                                <span class="block truncate font-semibold" :class="selectedId ? 'text-coffee-900' : 'text-coffee-300'" x-text="selectedName"></span>
                                <span class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none text-coffee-400">
                                    <svg class="h-5 w-5 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </span>
                            </button>

                            <div x-show="open" @click.away="open = false"
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="opacity-0 scale-95"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 class="absolute z-50 mt-2 w-full bg-white border border-coffee-100 rounded-[1.5rem] shadow-xl py-2 max-h-60 overflow-auto focus:outline-none">
                                @foreach($categories as $category)
                                    <div @click="selectedId = '{{ $category->id }}'; selectedName = '{{ $category->name }}'; open = false"
                                         class="px-5 py-3 text-sm font-semibold text-coffee-700 hover:bg-accent hover:text-white cursor-pointer transition-colors">
                                        {{ $category->name }}
                                    </div>
                                @endforeach
                            </div>
                            <input type="hidden" name="category_id" :value="selectedId" required>
                        </div>
                    </div>
                </div>

                <div class="pt-6 flex justify-end">
                    <button type="submit" 
                            class="w-full md:w-auto bg-coffee-900 text-white px-10 py-4 rounded-[1.5rem] font-bold shadow-xl shadow-coffee-900/20 hover:bg-accent transition-all duration-300 transform hover:-translate-y-1">
                        Simpan Menu Baru
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>