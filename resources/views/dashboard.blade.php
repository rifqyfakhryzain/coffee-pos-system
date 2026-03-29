<x-app-layout>
    <div class="p-6 max-w-4xl mx-auto">

        <h1 class="text-2xl font-bold mb-6">Dashboard POS</h1>

        <div class="grid grid-cols-2 gap-6">

            <!-- Kasir -->
            <a href="{{ route('kasir.index') }}"
               class="bg-blue-500 hover:bg-blue-600 text-white p-6 rounded shadow text-center">
                <h2 class="text-xl font-bold">🛒 Kasir</h2>
                <p>Mulai transaksi</p>
            </a>

            <!-- Products -->
            <a href="{{ route('products.index') }}"
               class="bg-green-500 hover:bg-green-600 text-white p-6 rounded shadow text-center">
                <h2 class="text-xl font-bold">📦 Produk</h2>
                <p>Kelola produk</p>
            </a>

            <!-- Categories -->
            <a href="{{ route('categories.index') }}"
               class="bg-yellow-500 hover:bg-yellow-600 text-white p-6 rounded shadow text-center">
                <h2 class="text-xl font-bold">📂 Kategori</h2>
                <p>Kelola kategori</p>
            </a>

        </div>

    </div>
</x-app-layout>