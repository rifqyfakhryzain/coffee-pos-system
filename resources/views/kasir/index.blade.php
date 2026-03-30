<x-app-layout>
    <div class="flex flex-col lg:flex-row gap-6 h-[calc(100vh-120px)]">

        <div class="flex-1 bg-white rounded-[2.5rem] border border-coffee-100 shadow-sm flex flex-col overflow-hidden">
            <div class="p-8 border-b border-coffee-50 flex justify-between items-center bg-coffee-50/30">
                <div>
                    <h2 class="text-2xl font-extrabold text-coffee-900">Menu Utama</h2>
                    <p class="text-sm text-coffee-500 font-medium">Pilih produk untuk menambah pesanan</p>
                </div>
                <div class="relative">
                    <input type="text" id="search-input" onkeyup="filterMenu()" placeholder="Cari menu..."
                        class="pl-10 pr-4 py-2 bg-white border-coffee-200 rounded-xl text-sm focus:ring-accent focus:border-accent">
                    <svg class="w-4 h-4 absolute left-3 top-3 text-coffee-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>

            <div class="p-8 overflow-y-auto flex-1 custom-scrollbar">
                <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach ($products as $product)
                        <button
                            onclick="addToCart({{ $product->id }}, @js($product->name), {{ $product->price }})"
                            data-name="{{ strtolower($product->name) }}"
                            class="product-card group relative bg-white border border-coffee-100 p-5 rounded-[2rem] text-left transition-all duration-300 hover:border-accent hover:shadow-xl hover:shadow-accent/10 hover:-translate-y-1">

                            <div
                                class="mb-4 w-full aspect-square bg-coffee-50 rounded-[1.5rem] flex items-center justify-center text-coffee-200 group-hover:bg-accent/10 group-hover:text-accent transition-colors">
                                <svg class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>

                            <h3
                                class="font-bold text-coffee-900 leading-tight group-hover:text-accent transition-colors">
                                {{ $product->name }}</h3>
                            <p class="mt-1 text-accent font-extrabold">Rp
                                {{ number_format($product->price, 0, ',', '.') }}</p>

                            <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity">
                                <div class="bg-accent text-white p-1 rounded-lg">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="3">
                                        <path d="M12 5v14M5 12h14" />
                                    </svg>
                                </div>
                            </div>
                        </button>
                    @endforeach
                    <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">
    @foreach ($products as $product)
        @endforeach

    <div id="no-product-message" class="hidden col-span-full py-20 text-center">
        <div class="flex flex-col items-center justify-center text-coffee-300">
            <svg class="w-20 h-20 mb-4 opacity-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 9.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="text-lg font-bold">Waduh, menu nggak ketemu nih...</p>
            <p class="text-sm">Coba cari dengan kata kunci lain ya ☕</p>
        </div>
    </div>
</div>
                </div>
            </div>
        </div>

        <div
            class="w-full lg:w-[400px] bg-coffee-900 rounded-[2.5rem] shadow-2xl flex flex-col overflow-hidden text-white">
            <div class="p-8 border-b border-white/10">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-accent rounded-xl text-white">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold">Keranjang</h2>
                </div>
            </div>

            <div id="cart-items" class="flex-1 overflow-y-auto p-6 space-y-4 custom-scrollbar-light">
                <div class="flex flex-col items-center justify-center h-full text-white/30 space-y-3">
                    <svg class="w-16 h-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <p class="font-medium">Belum ada pesanan</p>
                </div>
            </div>

            <div class="p-8 bg-black/20 space-y-6">
                <div class="space-y-2">
                    <div class="flex justify-between text-white/60 text-sm">
                        <span>Subtotal</span>
                        <span id="subtotal">Rp 0</span>
                    </div>
                    <div class="flex justify-between items-center pt-2">
                        <span class="text-lg font-bold">Total Tagihan</span>
                        <span id="total" class="text-3xl font-black text-accent tracking-tighter">Rp 0</span>
                    </div>
                </div>

                <button onclick="checkout()"
                    class="w-full bg-accent hover:bg-accent-dark text-white py-5 rounded-[1.5rem] font-black text-lg shadow-lg shadow-accent/20 transition-all active:scale-95 flex items-center justify-center gap-3">
                    Proses Bayar
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>
            </div>
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

        function updateQty(id, delta) {
            let item = cart.find(i => i.id === id);
            if (item) {
                item.qty += delta;
                if (item.qty <= 0) {
                    cart = cart.filter(i => i.id !== id);
                }
                renderCart();
            }
        }

        function formatRupiah(number) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(number);
        }

        function renderCart() {
            let container = document.getElementById('cart-items');

            if (cart.length === 0) {
                container.innerHTML = `
                    <div class="flex flex-col items-center justify-center h-full text-white/30 space-y-3">
                        <svg class="w-16 h-16" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                        <p class="font-medium">Belum ada pesanan</p>
                    </div>`;
                document.getElementById('total').innerText = 'Rp 0';
                document.getElementById('subtotal').innerText = 'Rp 0';
                return;
            }

            container.innerHTML = '';
            let total = 0;

            cart.forEach(item => {
                total += item.price * item.qty;
                container.innerHTML += `
                    <div class="bg-white/5 border border-white/10 p-4 rounded-2xl flex flex-col gap-3">
                        <div class="flex justify-between items-start">
                            <span class="font-bold text-white leading-tight flex-1">${item.name}</span>
                            <span class="font-bold text-accent ml-4">${formatRupiah(item.price * item.qty)}</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="flex items-center bg-white/10 rounded-lg p-1">
                                <button onclick="updateQty(${item.id}, -1)" class="w-8 h-8 flex items-center justify-center hover:bg-white/20 rounded-md transition-colors text-white">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path d="M20 12H4" /></svg>
                                </button>
                                <span class="w-8 text-center font-bold text-white">${item.qty}</span>
                                <button onclick="updateQty(${item.id}, 1)" class="w-8 h-8 flex items-center justify-center hover:bg-white/20 rounded-md transition-colors text-white">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path d="M12 5v14M5 12h14" /></svg>
                                </button>
                            </div>
                            <span class="text-xs text-white/40">@ ${formatRupiah(item.price)}</span>
                        </div>
                    </div>
                `;
            });

            document.getElementById('total').innerText = formatRupiah(total);
            document.getElementById('subtotal').innerText = formatRupiah(total);
        }

        function checkout() {
            if (cart.length === 0) {
                alert("Pilih menu dulu dong!");
                return;
            }

            fetch("{{ route('kasir.checkout') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        cart: cart
                    })
                })
                .then(res => {
                    if (!res.ok) throw new Error("Gagal transaksi");
                    return res.json();
                })
                .then(data => {
                    window.location.href = `/transactions/${data.transaction_id}`;
                })
                .catch(err => alert(err.message));
        }

function filterMenu() {
    let input = document.getElementById('search-input').value.toLowerCase();
    let cards = document.querySelectorAll('.product-card');
    let message = document.getElementById('no-product-message');
    let foundCount = 0; // Variabel pembantu untuk menghitung produk yang cocok

    cards.forEach(card => {
        let productName = card.querySelector('h3').innerText.toLowerCase();
        
        if (productName.includes(input)) {
            card.style.display = ""; 
            foundCount++; // Tambah hitungan jika produk ditemukan
        } else {
            card.style.display = "none";
        }
    });

    // Validasi: Jika tidak ada produk yang cocok, munculkan pesan
    if (foundCount === 0) {
        message.classList.remove('hidden');
    } else {
        message.classList.add('hidden');
    }
}
    </script>

    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #e7e5e4;
            border-radius: 10px;
        }

        .custom-scrollbar-light::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scrollbar-light::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }
    </style>
</x-app-layout>
