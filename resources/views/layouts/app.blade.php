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
            <!-- (Optionnel) Navigation globale en haut si besoin -->
            <!-- Si vous ne souhaitez plus la navigation en haut, retirez simplement cette ligne -->
            {{-- @include('layouts.navigation') --}}

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Dashboard Layout : Sidebar à gauche et Contenu principal à droite -->
            <main class="py-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row">
                    <!-- Sidebar : Navigation placée à gauche -->
                    <aside class="w-full md:w-1/4 p-4">
                        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                            <h3 class="text-xl font-bold text-red-600 mb-6">Navigation</h3>
                            <nav>
                                <ul class="space-y-4">
                                    <!-- Vous pouvez remplacer ces éléments par vos liens réels -->
                                    <li class="text-red-600 font-medium hover:text-red-800">
                                        <a href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="text-red-600 font-medium hover:text-red-800">
                                        <a href="{{ route('profile.edit') }}">Profil</a>
                                    </li>
                                    <li class="text-red-600 font-medium hover:text-red-800">
                                        <a href="{{ route('cours.index') }}">Cours</a>
                                    </li>
                                    <li class="text-red-600 font-medium hover:text-red-800">
                                        <a href="{{ route('users.index') }}">Utilisateurs</a>
                                    </li>
                                    <li class="text-red-600 font-medium hover:text-red-800">
                                        <a href="{{ route('orders.index') }}">Commandes</a>
                                    </li>
                                    <li class="text-red-600 font-medium hover:text-red-800">
                                        <a href="{{ route('reports.index') }}">Rapports</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </aside>

                    <!-- Contenu Principal -->
                    <div class="w-full md:w-3/4 p-4">
                        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                            {{ $slot }}
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
