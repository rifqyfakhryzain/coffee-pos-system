@php
    $menus = [
        [
            'name' => 'Dashboard',
            'route' => 'dashboard',
            'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6',
            'roles' => ['admin']
        ],
        [
            'name' => 'Mesin Kasir',
            'route' => 'kasir.index',
            'icon' => 'M2.25 18.75a60.07 60.07 0 0115.797 2.1l1.453-.389a3.375 3.375 0 002.355-3.14V11.25a3.375 3.375 0 00-2.355-3.14l-1.453-.389a60.07 60.07 0 01-15.797 2.1m12.75 3.375a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm-.75-12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM6.75 6.75h.75v.75h-.75v-.75zm0 3h.75v.75h-.75v-.75zm3 0h.75v.75h-.75v-.75zm3 0h.75v.75h-.75v-.75z',
            'roles' => ['cashier', 'admin']
        ],
        [
            'name' => 'Produk',
            'route' => 'products.index',
            'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4',
            'roles' => ['admin']
        ],
        [
            'name' => 'Kategori',
            'route' => 'categories.index',
            'icon' => 'M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581a2.25 2.25 0 003.182 0l4.318-4.318a2.25 2.25 0 000-3.182L11.159 3.659A2.25 2.25 0 009.568 3zM6 6a1 1 0 112 0 1 1 0 01-2 0z',
            'roles' => ['admin']
        ],
    ];

    $role = auth()->user()->role;
@endphp

@foreach ($menus as $item)
    @php
        // Gunakan wildcard agar parent menu tetap aktif saat di halaman edit/create
        $isActive = request()->routeIs($item['route']) || request()->routeIs(explode('.', $item['route'])[0] . '.*');
    @endphp

    @if(in_array($role, $item['roles']))
        <li>
            <a href="{{ route($item['route']) }}" 
               class="{{ $isActive ? 'bg-accent text-white shadow-lg shadow-accent/20' : 'text-coffee-100 hover:text-white hover:bg-white/10' }} group flex gap-x-4 rounded-2xl p-4 text-sm font-bold transition-all duration-300">
                
                <svg class="h-6 w-6 shrink-0 {{ $isActive ? 'text-white' : 'text-coffee-300 group-hover:text-white' }}" 
                     fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}" />
                </svg>

                {{ $item['name'] }}
            </a>
        </li>
    @endif
@endforeach

<li class="mt-auto pt-4 border-t border-white/10">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" 
                class="w-full flex gap-x-4 rounded-2xl p-4 text-sm font-bold text-red-400 hover:bg-red-500/10 hover:text-red-300 transition-all duration-200">
            <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
            </svg>
            Keluar
        </button>
    </form>
</li>