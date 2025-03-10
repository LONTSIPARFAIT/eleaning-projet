<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <!-- Navigation -->
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Dashboard : Contenu principal à gauche / Menu liens à droite -->
            <main class="py-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex flex-col md:flex-row">
                        <!-- Colonne gauche : Contenu principal -->
                        <div class="w-full md:w-3/4 p-4">
                            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                                <!-- Contenu dynamique -->
                                {{ $slot }}
                            </div>
                        </div>
                        <!-- Colonne droite : Menu de liens horizontal -->
                        <div class="w-full md:w-1/4 p-4">
                            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                                <h3 class="text-lg font-bold text-red-600 mb-4">Menu</h3>
                                <!-- Liens disposés horizontalement -->
                                <div class="flex justify-around space-x-2">
                                    <a href="#" class="text-red-600 hover:text-red-800 px-3 py-2 border border-red-200 rounded hover:bg-red-50">
                                        Lien 1
                                    </a>
                                    <a href="#" class="text-red-600 hover:text-red-800 px-3 py-2 border border-red-200 rounded hover:bg-red-50">
                                        Lien 2
                                    </a>
                                    <a href="#" class="text-red-600 hover:text-red-800 px-3 py-2 border border-red-200 rounded hover:bg-red-50">
                                        Lien 3
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Footer -->
            <footer class="bg-red-600 text-white p-6 text-center">
                <p>&copy; 2024 Perfect-coding - Tous droits réservés-2024</p>
                <div>
                    <a href="#privacy" class="text-white hover:underline">Politique de confidentialité</a> |
                    <a href="#terms" class="text-white hover:underline">Conditions d'utilisation</a>
                </div>
            </footer>
        </div>
    </body>
</html>
