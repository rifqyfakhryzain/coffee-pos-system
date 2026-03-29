<x-app-layout>
    <div class="p-6 max-w-md mx-auto">

        <h1 class="text-2xl font-bold mb-4">Tambah Product</h1>

        <form action="{{ route('products.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label>Nama Product</label>
                <input type="text" name="name" class="w-full border p-2 rounded">
            </div>

            <div>
                <label>Harga</label>
                <input type="number" name="price" class="w-full border p-2 rounded">
            </div>

            <div>
                <label>Category</label>
                <select name="category_id" class="w-full border p-2 rounded">
                    <option value="">-- Pilih Category --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button class="bg-green-500 text-white px-4 py-2 rounded">
                Simpan
            </button>
        </form>

    </div>
</x-app-layout>