<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' || false }" :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('img/logo11.png') }}">
    <title>@yield('title')</title>

    <!-- Alpine.js CDN -->
    {{-- <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script> --}}

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-300">
    @include('layouts.navigation')

    @yield('content')

    <footer class="bg-red-600 dark:bg-gray-800 text-white p-4 text-center">
        <p>© 2024 Perfect-coding - Tous droits réservés</p>
        <div>
            <a href="#privacy" class="text-white hover:underline dark:hover:text-orange-400">Politique de confidentialité</a> |
            <a href="#terms" class="text-white hover:underline dark:hover:text-orange-400">Conditions d'utilisation</a>
        </div>
    </footer>
</body>
</html>