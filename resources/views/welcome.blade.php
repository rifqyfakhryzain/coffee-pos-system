<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CoffeePOS - Manajemen Kafe Modern</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="antialiased bg-white text-coffee-900">
<nav x-data="{ open: false }" class="fixed w-full z-50 bg-white/90 backdrop-blur-md border-b border-coffee-50">
    <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 bg-accent rounded-xl flex items-center justify-center text-white shadow-lg shadow-accent/20">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
            </div>
            <span class="font-black text-xl md:text-2xl tracking-tighter uppercase">Coffee<span class="text-accent">POS</span></span>
        </div>

        <div class="hidden md:flex items-center gap-8">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm font-bold text-coffee-600 hover:text-accent transition-colors">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-bold text-coffee-600 hover:text-accent transition-colors">Masuk</a>
                    <a href="{{ route('register') }}" class="bg-coffee-900 text-white px-6 py-2.5 rounded-xl text-sm font-bold hover:bg-coffee-800 transition-all shadow-lg shadow-coffee-900/10">Daftar Sekarang</a>
                @endauth
            @endif
        </div>

        <div class="md:hidden">
            <button @click="open = !open" class="text-coffee-900 p-2">
                <svg x-show="!open" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" /></svg>
                <svg x-show="open" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
        </div>
    </div>

    <div x-show="open" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="md:hidden bg-white border-b border-coffee-50 px-6 pb-6 pt-2 space-y-4">
        @auth
            <a href="{{ url('/dashboard') }}" class="block text-center font-bold text-coffee-900 py-3 bg-coffee-50 rounded-xl">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="block text-center font-bold text-coffee-900 py-3">Masuk</a>
            <a href="{{ route('register') }}" class="block text-center font-bold bg-accent text-white py-4 rounded-2xl">Daftar Sekarang</a>
        @endauth
    </div>
</nav>

    <main class="relative pt-32 pb-20 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-8 relative z-10">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-accent/10 text-accent rounded-full text-xs font-black uppercase tracking-widest">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-accent opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-accent"></span>
                    </span>
                    Tersedia Versi 1.0
                </div>
                
                <h1 class="text-6xl lg:text-7xl font-black leading-[1.1] text-coffee-900">
                    Kelola Kafe Jadi <span class="text-accent italic">Lebih Nikmat.</span>
                </h1>
                
                <p class="text-lg text-coffee-500 font-medium leading-relaxed max-w-lg">
                    Sistem kasir pintar yang dirancang khusus untuk kedai kopi. Kelola inventaris, pantau laporan, dan layani pelanggan lebih cepat.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <a href="{{ route('login') }}" class="bg-accent text-white px-8 py-4 rounded-[1.5rem] font-black text-lg flex items-center justify-center gap-3 shadow-xl shadow-accent/20 hover:bg-accent-dark transition-all hover:-translate-y-1">
                        Buka Kasir Sekarang
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                </div>

                <div class="flex items-center gap-6 pt-8 border-t border-coffee-50">
                    <div>
                        <p class="text-2xl font-black text-coffee-900">100%</p>
                        <p class="text-sm text-coffee-400 font-medium">Cloud Based</p>
                    </div>
                    <div class="w-px h-10 bg-coffee-50"></div>
                    <div>
                        <p class="text-2xl font-black text-coffee-900">24/7</p>
                        <p class="text-sm text-coffee-400 font-medium">Real-time Data</p>
                    </div>
                </div>
            </div>

            <div class="relative group">
                <div class="absolute -inset-4 bg-accent/20 rounded-[3rem] blur-3xl group-hover:bg-accent/30 transition-colors"></div>
                
                <div class="relative bg-coffee-900 p-4 rounded-[2.5rem] shadow-2xl overflow-hidden border-8 border-coffee-800">
                    <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=2070&auto=format&fit=crop" 
                         alt="Cafe CoffeePOS" 
                         class="rounded-[1.5rem] opacity-80 group-hover:scale-105 transition-transform duration-700">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-coffee-900 via-transparent to-transparent"></div>
                    
                    <div class="absolute bottom-8 left-8 right-8 bg-white/10 backdrop-blur-md p-6 rounded-2xl border border-white/20">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-accent rounded-xl flex items-center justify-center text-white">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M13 10V3L4 14h7v7l9-11h-7z" stroke-width="2" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-white font-bold">Transaksi Cepat</p>
                                <p class="text-white/60 text-xs font-medium">Optimalkan antrian saat jam sibuk</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="fixed top-0 right-0 -z-10 opacity-50">
        <svg width="600" height="600" viewBox="0 0 600 600" fill="none">
            <circle cx="400" cy="200" r="200" fill="url(#paint0_radial)" />
            <defs>
                <radialGradient id="paint0_radial" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(400 200) rotate(90) scale(200)">
                    <stop stop-color="#FF9B26" stop-opacity="0.2" />
                    <stop offset="1" stop-color="white" stop-opacity="0" />
                </radialGradient>
            </defs>
        </svg>
    </div>
</body>
</html>