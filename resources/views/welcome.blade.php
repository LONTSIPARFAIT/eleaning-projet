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
    <nav x-data="{ visible: false, mobileOpen: false }"
         x-init="visible = window.scrollY > 0"
         x-cloak
         @scroll.window="visible = window.scrollY > 0"
         class="fixed top-0 left-0 right-0 bg-gradient-to-r from-red-600 to-red-800 dark:from-gray-800 dark:to-gray-700 p-4 shadow-xl z-50 transition duration-300 transform border-b-2 border-orange-400 dark:border-orange-600">
        <div class="container mx-auto flex justify-between items-center px-4">
            <a href="/" class="transition transform hover:scale-105">
                <img src="/img/logo1.jpg" alt="CFPC-Learning" class="h-14 w-20 rounded-lg shadow-md border border-orange-300 dark:border-orange-500">
            </a>
            <div class="hidden md:flex space-x-10 text-lg font-semibold">
                <a href="/" class="text-white hover:text-orange-300 dark:hover:text-orange-400 transition duration-300 relative group">
                    Accueil
                    <span class="absolute left-0 bottom-0 w-0 h-1 bg-orange-400 dark:bg-orange-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#cours" class="text-white hover:text-orange-300 dark:hover:text-orange-400 transition duration-300 relative group">
                    Nos Cours
                    <span class="absolute left-0 bottom-0 w-0 h-1 bg-orange-400 dark:bg-orange-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#about" class="text-white hover:text-orange-300 dark:hover:text-orange-400 transition duration-300 relative group">
                    À propos
                    <span class="absolute left-0 bottom-0 w-0 h-1 bg-orange-400 dark:bg-orange-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#contact" class="text-white hover:text-orange-300 dark:hover:text-orange-400 transition duration-300 relative group">
                    Contact
                    <span class="absolute left-0 bottom-0 w-0 h-1 bg-orange-400 dark:bg-orange-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
            </div>
            <div class="flex items-center space-x-4">
                @if (Route::has('login'))
                    @auth
                        @if (auth()->user()->role === 'student')
                            <a href="{{ route('student.dashboard') }}" class="font-semibold text-white hover:text-orange-300 dark:hover:text-orange-400 transition duration-300"><i class="fas fa-user-graduate mr-2"></i>Dashboard Étudiant</a>
                        @elseif (auth()->user()->role === 'teacher')
                            <a href="{{ route('teacher.dashboard') }}" class="font-semibold text-white hover:text-orange-300 dark:hover:text-orange-400 transition duration-300"><i class="fas fa-chalkboard-teacher mr-2"></i>Dashboard Enseignant</a>
                        @elseif (auth()->user()->role === 'admin')
                            <a href="{{ route('dashboard') }}" class="font-semibold text-white hover:text-orange-300 dark:hover:text-orange-400 transition duration-300"><i class="fas fa-user-shield mr-2"></i>Dashboard Admin</a>
                        @else
                            <a href="{{ route('home') }}" class="font-semibold text-white hover:text-orange-300 dark:hover:text-orange-400 transition duration-300"><i class="fas fa-home mr-2"></i>Dashboard</a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="font-semibold bg-orange-500 dark:bg-orange-600 text-white py-2 px-6 rounded-lg hover:bg-orange-600 dark:hover:bg-orange-700 transition duration-300 shadow-md"><i class="fas fa-sign-in-alt mr-2"></i>Connexion</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="font-semibold bg-white dark:bg-gray-800 text-red-600 dark:text-orange-400 py-2 px-6 rounded-lg hover:bg-orange-100 dark:hover:bg-gray-700 transition duration-300 shadow-md"><i class="fas fa-user-plus mr-2"></i>Inscription</a>
                        @endif
                    @endauth
                @endif
                <!-- Dark Mode Toggle -->
                <button @click.stop.prevent="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode); console.log('Dark Mode:', darkMode)" class="p-2 rounded-md text-white hover:text-orange-300 dark:hover:text-orange-400 focus:outline-none focus:ring-2 focus:ring-orange-500 transition duration-150 ease-in-out">
                    <span x-show="!darkMode">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </span>
                    <span x-show="darkMode" class="hidden" x-cloak>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                    </span>
                </button>
            </div>
            <div class="md:hidden">
                <button @click="mobileOpen = !mobileOpen" class="text-white focus:outline-none">
                    <svg x-show="!mobileOpen" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="mobileOpen" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <div x-show="mobileOpen" x-transition class="md:hidden bg-gradient-to-r from-red-600 to-red-800 dark:from-gray-800 dark:to-gray-700 border-t border-orange-400 dark:border-orange-600">
            <div class="container mx-auto px-4 py-4 space-y-4">
                <a href="/" class="block text-white hover:text-orange-300 dark:hover:text-orange-400 transition duration-300">Accueil</a>
                <a href="#cours" class="block text-white hover:text-orange-300 dark:hover:text-orange-400 transition duration-300">Nos Cours</a>
                <a href="#about" class="block text-white hover:text-orange-300 dark:hover:text-orange-400 transition duration-300">À propos</a>
                <a href="#contact" class="block text-white hover:text-orange-300 dark:hover:text-orange-400 transition duration-300">Contact</a>
            </div>
        </div>
    </nav>

    <!-- Test visuel -->
    <div class="pt-20 text-center">
        <p x-text="'Mode actuel : ' + (darkMode ? 'Sombre' : 'Clair')" class="text-2xl text-blue-900 dark:text-orange-400"></p>
    </div>

    <!-- Reste du contenu -->
    <div class="relative h-screen mx-auto max-w-7xl bg-center bg-cover" style="background-image: url('/img/home1.jpg');">
        <div class="absolute inset-0 bg-black opacity-40 dark:opacity-60 rounded-lg"></div>
        <div class="relative flex flex-col justify-center items-start h-full text-left px-6 sm:px-12">
            <h1 class="relative text-4xl sm:text-5xl md:text-6xl font-bold text-white mb-6"
                x-data="{
                    texts: ['Bienvenue sur CFPC-Learning', 'Apprenez, progressez, réussissez !'],
                    currentTextIndex: 0,
                    displayed: '',
                    async animate() {
                        while (true) {
                            let currentText = this.texts[this.currentTextIndex];
                            for (let i = 1; i <= currentText.length; i++) {
                                this.displayed = currentText.slice(0, i);
                                await new Promise(resolve => setTimeout(resolve, 100));
                            }
                            await new Promise(resolve => setTimeout(resolve, 1000));
                            for (let i = currentText.length; i >= 0; i--) {
                                this.displayed = currentText.slice(0, i);
                                await new Promise(resolve => setTimeout(resolve, 100));
                            }
                            await new Promise(resolve => setTimeout(resolve, 1500));
                            this.currentTextIndex = (this.currentTextIndex + 1) % this.texts.length;
                        }
                    }
                }"
                x-init="animate()">
                <span class="opacity-0">Apprenez, progressez, réussissez !</span>
                <span class="absolute top-0 left-0" x-text="displayed"></span>
            </h1>
            <p class="text-lg sm:text-xl text-gray-200 dark:text-gray-300 max-w-2xl mb-8">Rejoignez une plateforme d'apprentissage en ligne conçue pour tous les niveaux, avec des cours interactifs et flexibles.</p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="#cours" class="bg-red-500 hover:bg-red-600 dark:bg-red-600 dark:hover:bg-red-700 text-white font-semibold py-3 px-8 rounded-lg shadow-lg transition duration-300"><i class="fas fa-book-open mr-2"></i>Découvrir les Cours</a>
                <a href="{{ route('register') }}" class="bg-orange-500 hover:bg-orange-600 dark:bg-orange-600 dark:hover:bg-orange-700 text-white font-semibold py-3 px-8 rounded-lg shadow-lg transition duration-300"><i class="fas fa-user-plus mr-2"></i>S'inscrire</a>
            </div>
        </div>
    </div>

    <!-- Autres sections (Cours Populaires, etc.) -->
    <!-- Ajoute ici le reste si nécessaire -->

</body>
</html>