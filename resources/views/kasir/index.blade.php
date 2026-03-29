<x-app-layout>
    <div class="p-6 grid grid-cols-3 gap-6">

        <div class="col-span-2 bg-white p-4 rounded shadow">
            <h2 class="text-xl font-bold mb-4">Menu</h2>

            <div class="grid grid-cols-3 gap-4">
                @foreach ($products as $product)
                    <button onclick="addToCart({{ $product->id }}, @js($product->name), {{ $product->price }})"
                        class="border p-4 rounded hover:bg-blue-100 text-left">

                        <p class="font-bold">{{ $product->name }}</p>
                        <p class="text-sm text-gray-500">
                            Rp {{ number_format($product->price) }}
                        </p>
                    </button>
                @endforeach
            </div>
        </div>

<div class="bg-white p-4 rounded shadow flex flex-col h-[500px]">
    <h2 class="text-xl font-bold mb-4">Cart</h2>

    <!-- SCROLL AREA -->
    <div id="cart-items" class="space-y-2 flex-1 overflow-y-auto"></div>

    <hr class="my-4">

    <div class="flex justify-between font-bold text-lg">
        <span>Total</span>
        <span id="total">Rp 0</span>
    </div>

    <!-- BUTTON FIX DI BAWAH -->
    <button onclick="checkout()" 
        class="mt-4 w-full bg-green-500 hover:bg-green-600 text-white py-3 rounded shadow">
        Bayar
    </button>
</div>

    </div>

    <script>
        let cart = [];

        function addToCart(id, name, price) {
            let item = cart.find(i => i.id === id);

            if (item) {
                item.qty++;
            } else {
                cart.push({
                    id,
                    name,
                    price,
                    qty: 1
                });
            }

            renderCart();
        }

        function renderCart() {
            let container = document.getElementById('cart-items');
            container.innerHTML = '';

            let total = 0;

            cart.forEach(item => {
                total += item.price * item.qty;

                container.innerHTML += `
                    <div class="flex justify-between">
                        <span>${item.name} x${item.qty}</span>
                        <span>Rp ${item.price * item.qty}</span>
                    </div>
                `;
            });

            document.getElementById('total').innerText = 'Rp ' + total;
        }
    </script>

<script>
function checkout() {
    if (cart.length === 0) {
        alert("Cart masih kosong!");
        return;
    }

    fetch("{{ route('kasir.checkout') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({ cart: cart })
    })
    .then(res => {
        if (!res.ok) throw new Error("Gagal transaksi");
        return res.json();
    })
.then(data => {
    window.location.href = `/transactions/${data.transaction_id}`;
});
}
</script>
</x-app-layout>
