<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-coffee-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel POS') }} - Masuk</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased h-full text-coffee-900">

    <div class="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        
        <div class="sm:mx-auto sm:w-full sm:max-w-md text-center">
            <svg class="mx-auto h-16 w-auto text-coffee-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16.712 4.33a9.047 9.047 0 011.652 1.306L18.38 5.65M16.712 4.33l-.132.07M16.712 4.33L15.11 3.26M18.38 5.65a9.047 9.047 0 011.306 1.652M18.38 5.65l.07-.132M18.38 5.65l1.07-1.602M14.22 3.9c.498.45.923.978 1.268 1.565M14.22 3.9l-.132-.07M14.22 3.9L13.11 2.65M15.488 5.465a9.047 9.047 0 011.565 1.268M15.488 5.465l.07.132M15.488 5.465l1.602-1.07M13.81 4.61c.345.587.62 1.21.82 1.854M13.81 4.61l-.07-.132M13.81 4.61l-1.07-1.602M14.63 6.464c.2.643.324 1.305.372 1.98M14.63 6.464l.07.132M14.63 6.464l1.602-1.07M13.11 2.65L11 2m2.11.65l1.11 1.25m3.67.632L19.5 3.5m-1.602 1.07L16.712 4.33m-1.224-1.07L14.22 3.9m-1.11-1.25L11 2m0 0a10 10 0 00-4 18h8a10 10 0 00-4-18z"/>
            </svg>
            
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-coffee-900">
                POS Coffee Shop
            </h2>
            <p class="mt-2 text-center text-sm text-coffee-600">
                Classic Roastery Edition
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-10 px-6 shadow-sm border border-coffee-100 rounded-3xl sm:px-10">
                <form class="space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium text-coffee-800">Alamat Email</label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" autocomplete="email" required 
                                class="block w-full rounded-xl border-coffee-100 bg-coffee-50 px-4 py-3 text-coffee-900 placeholder-coffee-600 focus:border-coffee-600 focus:ring-coffee-600 sm:text-sm"
                                placeholder="nama@kafe.com">
                        </div>
                        @error('email')
                            <span class="text-xs text-danger mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-coffee-800">Kata Sandi</label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" autocomplete="current-password" required 
                                class="block w-full rounded-xl border-coffee-100 bg-coffee-50 px-4 py-3 text-coffee-900 placeholder-coffee-600 focus:border-coffee-600 focus:ring-coffee-600 sm:text-sm"
                                placeholder="••••••••">
                        </div>
                        @error('password')
                            <span class="text-xs text-danger mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember_me" name="remember" type="checkbox" 
                                class="h-4 w-4 rounded border-coffee-200 text-coffee-800 focus:ring-coffee-600">
                            <label for="remember_me" class="ml-2 block text-sm text-coffee-600">Ingat saya</label>
                        </div>

                        <div class="text-sm">
                            <a href="{{ route('password.request') }}" class="font-medium text-coffee-600 hover:text-coffee-800">
                                Lupa kata sandi?
                            </a>
                        </div>
                    </div>

                    <div>
                        <button type="submit" 
                            class="flex w-full justify-center rounded-xl bg-accent px-4 py-3 text-sm font-semibold text-white shadow-sm hover:bg-accent-dark focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-accent transition duration-150">
                            Masuk Ke Kasir
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</body>
</html>