<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-coffee-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased h-full text-coffee-900">
    <div x-data="{ sidebarOpen: false }" class="min-h-full">
        
<div 
    x-show="sidebarOpen" 
    class="relative z-50 lg:hidden" 
    x-ref="dialog" 
    aria-modal="true"
    style="display: none;" {{-- Mencegah flicker saat refresh --}}
>
    <div 
        x-show="sidebarOpen"
        x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="sidebarOpen = false"
        class="fixed inset-0 bg-coffee-900/80 backdrop-blur-sm"
    ></div>

    <div class="fixed inset-0 flex">
        <div 
            x-show="sidebarOpen"
            x-transition:enter="transition ease-in-out duration-300 transform"
            x-transition:enter-start="-translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in-out duration-300 transform"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
            @click.away="sidebarOpen = false" {{-- Proteksi tambahan --}}
            class="relative mr-16 flex w-full max-w-xs flex-1 flex-col bg-coffee-900 shadow-2xl"
        >
            <div 
                x-show="sidebarOpen"
                x-transition:enter="ease-in-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in-out duration-300"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="absolute left-full top-0 flex w-16 justify-center pt-5"
            >
                <button type="button" @click="sidebarOpen = false" class="-m-2.5 p-2.5 text-white hover:text-accent transition">
                    <span class="sr-only">Close sidebar</span>
                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="flex flex-col overflow-y-auto bg-coffee-900 pb-4 h-full">
                <div class="flex h-24 shrink-0 items-center px-6 border-b border-coffee-800/50">
                    <span class="text-2xl font-extrabold tracking-tight text-white uppercase italic">Coffee<span class="text-accent">POS</span></span>
                </div>
                <nav class="mt-6 flex-1 space-y-2 px-4">
                    @include('layouts.navigation-links')
                </nav>
            </div>
        </div>
    </div>
</div>

        <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
            <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-coffee-900 px-6 pb-4 rounded-r-[3rem] shadow-2xl">
                <div class="flex h-24 shrink-0 items-center border-b border-coffee-800/50">
                    <span class="text-3xl font-extrabold tracking-tight text-white uppercase">Coffee<span class="text-accent">POS</span></span>
                </div>
                <nav class="flex flex-1 flex-col mt-4">
                    <ul role="list" class="flex flex-1 flex-col gap-y-7">
                        <li>
                            <ul role="list" class="-mx-2 space-y-2">
                                @include('layouts.navigation-links')
                            </ul>
                        </li>
                        
                        <li class="mt-auto -mx-2">
                            <div class="flex items-center gap-x-4 px-6 py-4 rounded-3xl bg-coffee-800/40 border border-coffee-700/30">
                                <div class="h-10 w-10 rounded-full bg-accent flex items-center justify-center font-bold text-white shadow-lg">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <div class="text-sm font-semibold leading-6 text-white truncate">
                                    {{ Auth::user()->name }}
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="lg:pl-72">
            <div class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 border-b border-coffee-100 bg-coffee-50/80 backdrop-blur-md px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:hidden">
                <button @click="sidebarOpen = true" type="button" class="-m-2.5 p-2.5 text-coffee-800 lg:hidden">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
                <div class="flex-1 text-sm font-bold leading-6 text-coffee-900">CoffeePOS</div>
            </div>

            <main class="py-10">
                <div class="px-4 sm:px-6 lg:px-8">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
</body>
</html>