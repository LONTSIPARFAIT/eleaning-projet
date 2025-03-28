<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('img/logo1.jjpg') }}">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('layouts.navigation')
    @yield('content')
    <footer class="bg-red-600 text-white p-4 text-center">
        <p>&copy; 2024 Perfect-coding - Tous droits réservés-2024</p>
        <div>
            <a href="#privacy" class="text-white hover:underline">Politique de confidentialité</a> |
            <a href="#terms" class="text-white hover:underline">Conditions d'utilisation</a>
        </div>
    </footer>
</body>

</html>
