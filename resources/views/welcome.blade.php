<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>E-learning App</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        #mobile-menu {
            background-color: rgba(255, 0, 0, 0.9); /* Couleur de fond du menu mobile */
            position: absolute;
            top: 100%; /* Juste en dessous de la barre de navigation */
            left: 0;
            right: 0;
            z-index: 20;
        }
    </style>
</head>
<body class="antialiased bg-gray-100 dark:bg-gray-900 mx-2">

    <nav class="bg-gradient-to-r from-red-400 to-red-600 p-4 shadow-lg fixed w-full z-10">
        <div class="container mx-auto flex justify-between items-center flex-wrap">
            <div class="flex items-center">
                <a href="#" class="text-white font-bold text-2xl transition duration-300 hover:scale-105">
                    <img src="/img/logo.png" class="h-16 w-auto rounded" alt="Logo-Elearning App"/>
                </a>
            </div>
            <div class="hidden md:flex space-x-4 text-xl mt-2 md:mt-0">
                <a href="#home" class="text-white border-b-2 border-transparent hover:border-white transition duration-300">Accueil</a>
                <a href="#cours" class="text-white border-b-2 border-transparent hover:border-white transition duration-300">Cours</a>
                <a href="#about" class="text-white border-b-2 border-transparent hover:border-white transition duration-300">À propos</a>
            </div>
            <div class="flex items-center mt-2 md:mt-0">
                @if (Route::has('login'))
                    @auth
                        @if (auth()->user()->role === 'student')
                            <a href="{{ route('student.dashboard') }}" class="font-semibold text-white border-b-2 border-transparent hover:border-white transition duration-300">Dashboard Étudiant</a>
                        @elseif (auth()->user()->role === 'teacher')
                            <a href="{{ route('teacher.dashboard') }}" class="font-semibold text-white border-b-2 border-transparent hover:border-white transition duration-300">Dashboard Enseignant</a>
                        @elseif (auth()->user()->role === 'admin')
                            <a href="{{ route('dashboard') }}" class="font-semibold text-white border-b-2 border-transparent hover:border-white transition duration-300">Dashboard Admin</a>
                        @else
                            <a href="{{ route('home') }}" class="font-semibold text-white border-b-2 border-transparent hover:border-white transition duration-300">Dashboard</a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="font-semibold bg-white text-red-600 p-2 rounded border border-red-600 hover:bg-gray-200 transition duration-300">Connexion</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold bg-white text-red-600 p-2 rounded border border-red-600 hover:bg-gray-200 transition duration-300">Inscription</a>
                        @endif
                    @endauth
                @endif
            </div>
            <button id="menu-toggle" class="md:hidden text-white focus:outline-none">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
    </nav>

    <div id="mobile-menu" class="md:hidden hidden">
        <div class="flex flex-col space-y-2 mt-2">
            <a href="#home" class="block text-white hover:bg-red-500 p-2 rounded">Accueil</a>
            <a href="#cours" class="block text-white hover:bg-red-500 p-2 rounded">Cours</a>
            <a href="#about" class="block text-white hover:bg-red-500 p-2 rounded">À propos</a>
        </div>
    </div>

    <div class="relative my-5 mx-2 bg-dots-darker bg-center bg-cover selection:bg-red-500 selection:text-white p-8" style="background-image: url('img/photo.png'); min-height: 60vh;">
        <div class="flex flex-col justify-center items-center h-full">
            <h1 class="text-3xl md:text-4xl font-bold text-white">Bienvenue sur Perfect-Learning</h1>
            <p class="mt-4 text-base md:text-lg text-gray-300 text-center px-4 max-w-lg">Découvrez nos cours et apprenez à votre rythme avec des ressources adaptées à tous les niveaux. Rejoignez notre communauté d'apprenants dès aujourd'hui !</p>

            <div class="mt-8 flex flex-col md:flex-row">
                <a href="#courses" class="inline-block bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded transition duration-300">Voir les Cours</a>
                <a href="#about" class="inline-block mt-4 md:mt-0 md:ml-4 bg-white text-red-600 font-semibold py-3 px-6 rounded border border-red-600 hover:bg-gray-200 transition duration-300">À propos</a>
            </div>
        </div>
    </div>

    <section class="py-4 bg-red-600 text-white">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold">Découvrez Nos Cours</h2>
            <p class="mt-2">Apprenez à votre rythme avec une variété de cours adaptés à tous les niveaux.</p>
            <a href="#courses" class="mt-4 inline-block bg-white hover:bg-gray-200 text-red-500 font-semibold py-2 px-4 rounded">Voir les Cours</a>
        </div>
    </section>

    <section id="cours" class="py-8 bg-gray-100">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold text-gray-800">Nos Cours Disponibles</h2>
            <div id="courses-container" class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @include('courses.partials.courses', ['cours' => $cours]) <!-- Include partial for courses -->
            </div>
            <div id="pagination" class="mt-8">
                {{ $cours->links() }}
            </div>
        </div>
    </section>

    <section id="features" class="py-8 bg-gray-100">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold text-gray-800">Fonctionnalités Principales</h2>
            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h3 class="text-xl font-semibold">Accessible 24/7</h3>
                    <p class="mt-2">Accédez à vos cours à tout moment, où que vous soyez.</p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h3 class="text-xl font-semibold">Interactivité</h3>
                    <p class="mt-2">Participez à des forums et des discussions avec d'autres étudiants.</p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h3 class="text-xl font-semibold">Certificats</h3>
                    <p class="mt-2">Recevez des certificats à la fin de chaque cours pour valoriser vos compétences.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="testimonials" class="py-8 bg-red-100">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold text-gray-800">Ce que disent nos utilisateurs</h2>
            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <p class="italic">"Une expérience d'apprentissage incroyable !"</p>
                    <p class="mt-4 font-semibold">- Étudiant 1</p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <p class="italic">"Les cours sont très bien structurés."</p>
                    <p class="mt-4 font-semibold">- Étudiant 2</p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <p class="italic">"J'ai beaucoup appris grâce à cette plateforme."</p>
                    <p class="mt-4 font-semibold">- Étudiant 3</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-100 text-center">
        <h2 class="text-3xl font-bold text-gray-800">Prêt à commencer votre apprentissage ?</h2>
        <p class="mt-4">Rejoignez notre communauté d'apprenants dès aujourd'hui.</p>
        <a href="{{ route('register') }}" class="mt-6 inline-block bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">S'inscrire Maintenant</a>
    </section>

    <footer class="bg-red-600 text-white p-6 text-center">
        <p>&copy; 2024 Perfect-Learning - Tous droits réservés</p>
        <div>
            <a href="#privacy" class="text-white hover:underline">Politique de confidentialité</a> |
            <a href="#terms" class="text-white hover:underline">Conditions d'utilisation</a>
        </div>
    </footer>

    <script>
    $(document).ready(function() {
        $('#menu-toggle').click(function() {
            $('#mobile-menu').toggle(); // Montre ou cache le menu
        });
    });
    </script>

</body>
</html>