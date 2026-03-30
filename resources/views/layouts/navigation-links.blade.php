@php
    $menus = [
        ['name' => 'Dashboard', 'route' => 'dashboard', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
        ['name' => 'Mesin Kasir', 'route' => 'kasir.index', 'icon' => 'M2.25 18.75a60.07 60.07 0 0115.797 2.1l1.24.394c.49.156.992-.222.992-.73V6.75c0-.441-.334-.795-.769-.854a59.76 59.76 0 00-4.823-.497L12 5.253M3 15.158V8.25m0 0a1.5 1.5 0 012.855-.643l.605 1.671a.75.75 0 00.957.464l4.584-1.259a.75.75 0 00.464-.957l-.605-1.671A1.5 1.5 0 008.25 3h1.5a1.5 1.5 0 011.5 1.5V6.75M2.25 18.75h1.5V8.25M18.75 18.75h1.5V6.75'],
        ['name' => 'Produk', 'route' => 'products.index', 'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4'],
        ['name' => 'Kategori', 'route' => 'categories.index', 'icon' => 'M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581a2.25 2.25 0 003.182 0l4.318-4.318a2.25 2.25 0 000-3.182L11.159 3.659A2.25 2.25 0 009.568 3zM6 6a1 1 0 112 0 1 1 0 01-2 0z'],
    ];
@endphp

@foreach ($menus as $item)
    <li>
        <a href="{{ route($item['route']) }}" 
           class="{{ request()->routeIs($item['route']) ? 'bg-coffee-800 text-white shadow-lg' : 'text-coffee-100 hover:text-white hover:bg-coffee-800' }} group flex gap-x-4 rounded-2xl p-3 text-sm font-bold transition-all duration-200">
            <svg class="h-6 w-6 shrink-0 {{ request()->routeIs($item['route']) ? 'text-accent' : 'text-coffee-300 group-hover:text-white' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}" />
            </svg>
            {{ $item['name'] }}
        </a>
    </li>
@endforeach

<li class="pt-4 border-t border-coffee-800/50 mt-4">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="w-full flex gap-x-4 rounded-2xl p-3 text-sm font-bold text-red-400 hover:bg-red-500/10 hover:text-red-300 transition-all duration-200">
            <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
            </svg>
            Keluar
        </button>
    </form>
</li>