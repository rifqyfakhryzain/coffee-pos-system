<x-app-layout>
    <div class="p-6 max-w-5xl mx-auto">

        <div class="flex justify-between mb-6">
            <h1 class="text-2xl font-bold">Products</h1>
            <a href="{{ route('products.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                + Tambah Product
            </a>
        </div>

        <div class="bg-white shadow rounded p-4">
            <table class="w-full">
                <thead>
                    <tr class="border-b">
                        <th>#</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $index => $product)
                        <tr class="border-b">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $product->name }}</td>
                            <td>Rp {{ number_format($product->price) }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td class="space-x-2">
                                <a href="{{ route('products.edit', $product->id) }}" class="text-yellow-500">Edit</a>

                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500" onclick="return confirm('Yakin hapus?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">
                                Belum ada product
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
