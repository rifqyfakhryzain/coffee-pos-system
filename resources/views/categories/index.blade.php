<x-app-layout>
    <div class="p-6 max-w-4xl mx-auto">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Categories</h1>
            <a href="{{ route('categories.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                + Tambah Category
            </a>
        </div>

        <div class="bg-white shadow rounded-lg p-4">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b">
                        <th class="py-2">#</th>
                        <th class="py-2">Nama Category</th>
                        <th class="py-2 text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $index => $category)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2">{{ $index + 1 }}</td>
                            <td class="py-2">{{ $category->name }}</td>
                            <td class="py-2 text-right space-x-2">
                                <a href="{{ route('categories.edit', $category->id) }}" class="text-yellow-500">Edit</a>

                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
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
                            <td colspan="3" class="text-center py-4 text-gray-500">
                                Belum ada category
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
