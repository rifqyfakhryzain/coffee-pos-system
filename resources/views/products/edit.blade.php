<x-app-layout>
    <div class="p-6 max-w-md mx-auto">

        <h1 class="text-2xl font-bold mb-4">Edit Product</h1>

        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="text" name="name"
                   value="{{ $product->name }}"
                   class="w-full border p-2 rounded mb-3">

            <input type="number" name="price"
                   value="{{ $product->price }}"
                   class="w-full border p-2 rounded mb-3">

            <select name="category_id" class="w-full border p-2 rounded mb-4">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <button class="bg-yellow-500 text-white px-4 py-2 rounded">
                Update
            </button>
        </form>

    </div>
</x-app-layout>