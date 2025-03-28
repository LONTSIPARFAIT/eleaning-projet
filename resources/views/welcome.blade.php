<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' || false }" :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CFPC-Learning</title>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @vite(['resources/css/app.css'])
</head>
<body class="antialiased bg-gradient-to-br from-blue-50 to-orange-100 dark:bg-gradient-to-br dark:from-gray-900 dark:to-gray-800 px-4 transition-colors duration-300">
    <div class="pt-20 text-center">
        <button @click.stop.prevent="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode); console.log('Dark Mode:', darkMode)" class="p-2 bg-red-500 text-white rounded">
            Toggle Dark Mode
        </button>
        <p x-text="'Mode actuel : ' + (darkMode ? 'Sombre' : 'Clair')" class="text-2xl text-blue-900 dark:text-orange-400"></p>
    </div>
</body>
</html>