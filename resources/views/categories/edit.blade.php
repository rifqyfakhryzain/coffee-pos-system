<x-app-layout>
    <div class="p-6 max-w-md mx-auto">

        <h1 class="text-2xl font-bold mb-4">Edit Category</h1>

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="text" name="name"
                   value="{{ $category->name }}"
                   class="w-full border p-2 rounded mb-4">

            <button class="bg-yellow-500 text-white px-4 py-2 rounded">
                Update
            </button>
        </form>

    </div>
</x-app-layout>