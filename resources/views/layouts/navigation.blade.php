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
        
        <!-- (Optionnel) Header secondaire si on souhaite un autre affichage -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Layout principal avec Sidebar à gauche et Contenu Principal à droite -->
        <main class="py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row">
                <!-- Sidebar : Navigation Verticale adaptée -->
                <aside class="w-full md:w-1/4 p-4">
                    <nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 flex flex-col">
                        <!-- Logo en haut de la sidebar -->
                        <div class="flex items-center mb-6">
                            <a href="{{ route('welcome') }}">
                                <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                            </a>
                        </div>

                        <!-- Liens de Navigation en affichage vertical -->
                        <div class="flex flex-col space-y-4">
                            @if (Route::has('login'))
                                @auth
                                    @if (auth()->user()->role === 'student')
                                        <x-nav-link :href="route('student.dashboard')" :active="request()->routeIs('student.dashboard')">
                                            {{ __('Dashboard Étudiant') }}
                                        </x-nav-link>
                                    @elseif (auth()->user()->role === 'teacher')
                                        <x-nav-link :href="route('teacher.dashboard')" :active="request()->routeIs('teacher.dashboard')">
                                            {{ __('Dashboard Enseignant') }}
                                        </x-nav-link>
                                    @elseif (auth()->user()->role === 'admin')
                                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                            {{ __('Dashboard Admin') }}
                                        </x-nav-link>
                                    @else
                                        <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                                            {{ __('Dashboard') }}
                                        </x-nav-link>
                                    @endif
                                @else
                                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                                        {{ __('Connexion') }}
                                    </x-nav-link>
                                    @if (Route::has('register'))
                                        <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                                            {{ __('Inscription') }}
                                        </x-nav-link>
                                    @endif
                                @endauth
                            @endif
                        </div>

                        <!-- Dropdown des réglages / Profil -->
                        <div class="mt-6">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md 
                                        text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 
                                        focus:outline-none transition ease-in-out duration-150">
                                        @if (Auth::user()->profile_photo)
                                            <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Photo de Profil" 
                                                class="h-12 w-12 rounded-full mr-2">
                                        @else
                                            <svg class="h-12 w-12 rounded-full mr-2 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" 
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                    d="M12 14.5c-3.5 0-6.5-2.5-6.5-6s3-6 6.5-6 6.5 2.5 6.5 6-3 6-6.5 6zm0 0c3.5 0 6.5 1.5 6.5 4.5v1H5v-1c0-3 3-4.5 6.5-4.5z" />
                                            </svg>
                                        @endif
                                        <div>{{ Auth::user()->name }}</div>
                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" 
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" 
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>

                                    <!-- Déconnexion -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Se Deconnecté') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    </nav>
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
