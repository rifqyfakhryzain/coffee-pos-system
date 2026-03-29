<x-app-layout>
    <div class="p-6 max-w-md mx-auto">

        <h1 class="text-2xl font-bold mb-4">Tambah Category</h1>

        <form action="{{ route('categories.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block mb-1">Nama Category</label>
                <input type="text" name="name"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200"
                       placeholder="Contoh: Coffee">
            </div>

            <div class="flex justify-end">
                <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                    Simpan
                </button>
            </div>
        </form>

    </div>
</x-app-layout>