<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'CFPC-Learning') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="icon" type="image/png" href="{{ asset('img/logo11.png') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gradient-to-br from-blue-50 to-orange-100 dark:bg-gradient-to-br dark:from-gray-900 dark:to-gray-800">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-gradient-to-r from-red-600 to-red-800 dark:from-gray-800 dark:to-gray-700 shadow-lg border-b border-orange-400">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex items-center gap-3">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                        <span class="text-white text-2xl font-semibold">{{ $header }}</span>
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="py-8 px-4 sm:px-6 lg:px-8">
                <div class="max-w-7xl mx-auto">
                    {{ $slot }}
                </div>
            </main>

            <!-- Footer -->
            <footer class="bg-gradient-to-r from-red-600 to-red-800 dark:from-gray-900 dark:to-gray-800 text-white p-6 text-center shadow-inner border-t border-orange-400">
                <div class="flex justify-center items-center gap-2 mb-2">
                    <svg class="w-6 h-6 text-orange-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p>© {{ date('Y') }} Perfect-coding - Tous droits réservés</p>
                </div>
                <div class="flex justify-center gap-4">
                    <a href="#privacy" class="flex items-center gap-1 text-white hover:text-orange-300 transition duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0-1.104-.896-2-2-2s-2 .896-2 2c0 .738.398 1.377 1 1.732V15a1 1 0 102 0v-2.268c.602-.355 1-.994 1-1.732zM5 12c0 3.86 3.141 7 7 7s7-3.14 7-7c0-1.042-.133-2.052-.382-3.016A11.955 11.955 0 0012 2.944a11.955 11.955 0 00-8.618 3.04A12.02 12.02 0 005 12z"></path>
                        </svg>
                        Politique de confidentialité
                    </a>
                    <span class="text-orange-300">|</span>
                    <a href="#terms" class="flex items-center gap-1 text-white hover:text-orange-300 transition duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5h6a2 2 0 012 2v10a2 2 0 01-2 2H9a2 2 0 01-2-2V7a2 2 0 012-2zm0 0V3m6 2v-2"></path>
                        </svg>
                        Conditions d'utilisation
                    </a>
                </div>
            </footer>
        </div>
    </body>
</html>