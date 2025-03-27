<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' || false }" :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CFPC-Learning</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Alpine.js CDN -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gradient-to-br from-blue-50 to-orange-100 dark:bg-gradient-to-br dark:from-gray-900 dark:to-gray-800 px-4 transition-colors duration-300">

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 bg-gradient-to-r from-red-600 to-red-800 dark:from-gray-800 dark:to-gray-700 p-4 shadow-xl z-50 transition duration-300 border-b-2 border-orange-400 dark:border-orange-600">
        <div class="container mx-auto flex justify-between items-center px-4">
            <a href="/" class="transition transform hover:scale-105">
                <img src="/img/logo1.jpg" alt="CFPC-Learning" class="h-14 w-20 rounded-lg shadow-md border border-orange-300 dark:border-orange-500">
            </a>
            <div class="flex items-center space-x-4">
                <!-- Dark Mode Toggle -->
                <button @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode)" class="p-2 rounded-md text-white hover:text-orange-300 dark:hover:text-orange-400 focus:outline-none focus:ring-2 focus:ring-orange-500 transition duration-150 ease-in-out">
                    <span x-show="!darkMode">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </span>
                    <span x-show="darkMode" class="hidden" x-cloak>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                    </span>
                </button>
            </div>
        </div>
    </nav>

    <!-- Contenu minimal pour tester -->
    <div class="pt-20 text-center">
        <h1 class="text-4xl font-bold text-blue-900 dark:text-orange-400">Test du mode sombre</h1>
        <p class="mt-4 text-gray-700 dark:text-gray-300">Cliquez sur le bouton soleil/lune pour basculer.</p>
    </div>

</body>
</html>