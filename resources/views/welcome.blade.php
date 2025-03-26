<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CFPC-Learning</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Alpine.js CDN -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gradient-to-br from-blue-50 to-orange-100 px-4">

    <!-- Navbar -->
    <nav x-data="{ visible: false, mobileOpen: false }"
         x-init="visible = window.scrollY > 0"
         x-cloak
         @scroll.window="visible = window.scrollY > 0"
         class="fixed top-0 left-0 right-0 bg-gradient-to-r from-red-600 to-red-800 p-4 shadow-xl z-50 transition duration-300 transform border-b-2 border-orange-400">
        <div class="container mx-auto flex justify-between items-center px-4">
            <a href="/" class="transition transform hover:scale-105">
                <img src="/img/logo1.jpg" alt="CFPC-Learning" class="h-14 w-20 rounded-lg shadow-md border border-orange-300">
            </a>
            <div class="hidden md:flex space-x-10 text-lg font-semibold">
                <a href="/" class="text-white hover:text-orange-300 transition duration-300 relative group">
                    Accueil
                    <span class="absolute left-0 bottom-0 w-0 h-1 bg-orange-400 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#cours" class="text-white hover:text-orange-300 transition duration-300 relative group">
                    Nos Cours
                    <span class="absolute left-0 bottom-0 w-0 h-1 bg-orange-400 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#about" class="text-white hover:text-orange-300 transition duration-300 relative group">
                    À propos
                    <span class="absolute left-0 bottom-0 w-0 h-1 bg-orange-400 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#contact" class="text-white hover:text-orange-300 transition duration-300 relative group">
                    Contact
                    <span class="absolute left-0 bottom-0 w-0 h-1 bg-orange-400 transition-all duration-300 group-hover:w-full"></span>
                </a>
            </div>
            <div class="flex items-center space-x-4">
                @if (Route::has('login'))
                    @auth
                        @if (auth()->user()->role === 'student')
                            <a href="{{ route('student.dashboard') }}" class="font-semibold text-white hover:text-orange-300 transition duration-300">Dashboard Étudiant</a>
                        @elseif (auth()->user()->role === 'teacher')
                            <a href="{{ route('teacher.dashboard') }}" class="font-semibold text-white hover:text-orange-300 transition duration-300">Dashboard Enseignant</a>
                        @elseif (auth()->user()->role === 'admin')
                            <a href="{{ route('dashboard') }}" class="font-semibold text-white hover:text-orange-300 transition duration-300">Dashboard Admin</a>
                        @else
                            <a href="{{ route('home') }}" class="font-semibold text-white hover:text-orange-300 transition duration-300">Dashboard</a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="font-semibold bg-orange-500 text-white py-2 px-6 rounded-lg hover:bg-orange-600 transition duration-300 shadow-md">Connexion</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="font-semibold bg-white text-red-600 py-2 px-6 rounded-lg hover:bg-orange-100 transition duration-300 shadow-md">Inscription</a>
                        @endif
                    @endauth
                @endif
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
        <div x-show="mobileOpen" x-transition class="md:hidden bg-gradient-to-r from-red-600 to-red-800 border-t border-orange-400">
            <div class="container mx-auto px-4 py-4 space-y-4">
                <a href="/" class="block text-white hover:text-orange-300 transition duration-300">Accueil</a>
                <a href="#cours" class="block text-white hover:text-orange-300 transition duration-300">Nos Cours</a>
                <a href="#about" class="block text-white hover:text-orange-300 transition duration-300">À propos</a>
                <a href="#contact" class="block text-white hover:text-orange-300 transition duration-300">Contact</a>
            </div>
        </div>
    </nav>

    <!-- Section Héros -->
    <div class="relative h-screen mx-auto max-w-7xl bg-center bg-cover" style="background-image: url('/img/home1.jpg');">
        <div class="absolute inset-0 bg-black opacity-40 rounded-lg"></div>
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
            <p class="text-lg sm:text-xl text-gray-200 max-w-2xl mb-8">Rejoignez une plateforme d'apprentissage en ligne conçue pour tous les niveaux, avec des cours interactifs et flexibles.</p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="#cours" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-3 px-8 rounded-lg shadow-lg transition duration-300">Découvrir les Cours</a>
                <a href="{{ route('register') }}" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 px-8 rounded-lg shadow-lg transition duration-300">S'inscrire</a>
            </div>
        </div>
    </div>

    <!-- Section Cours Populaires -->
    <section id="cours" class="py-16 mx-auto max-w-7xl">
        <h2 class="text-center text-3xl sm:text-4xl font-bold text-blue-900 mb-12 scroll-reveal slide-in-up">Cours Populaires</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($cours->take(6) as $cour)
                <div class="bg-white shadow-lg rounded-xl p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-orange-200 scroll-reveal slide-in-up">
                    <h3 class="text-xl font-semibold text-red-600">{{ $cour->title }}</h3>
                    <p class="mt-2 text-gray-700 line-clamp-2">{{ $cour->description }}</p>
                    <p class="mt-2 text-gray-600">Durée : {{ $cour->duration }} min</p>
                    <p class="mt-2 text-gray-600">Prix : {{ $cour->price }} €</p>
                    <form action="{{ route('cours.subscribe', $cour->id) }}" method="POST" class="mt-4">
                        @csrf
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300">S'abonner</button>
                    </form>
                </div>
            @empty
                <p class="text-center text-gray-600 col-span-full scroll-reveal fade-in">Aucun cours disponible pour le moment.</p>
            @endforelse
        </div>
        <div class="mt-8 text-center scroll-reveal fade-in">
            {{ $cours->links() }}
        </div>
    </section>

    <!-- Section Fonctionnalités -->
    <section id="features" class="py-16 mx-auto max-w-7xl bg-orange-50">
        <h2 class="text-center text-3xl sm:text-4xl font-bold text-blue-900 mb-12 scroll-reveal fade-in">Pourquoi choisir CFPC-Learning ?</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-white shadow-lg rounded-xl p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl scroll-reveal slide-in-up">
                <h3 class="text-xl font-semibold text-red-600">Flexibilité</h3>
                <p class="mt-2 text-gray-700">Apprenez à votre rythme, où et quand vous voulez.</p>
            </div>
            <div class="bg-white shadow-lg rounded-xl p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl scroll-reveal slide-in-up">
                <h3 class="text-xl font-semibold text-red-600">Interactivité</h3>
                <p class="mt-2 text-gray-700">Échangez avec des enseignants et d'autres apprenants.</p>
            </div>
            <div class="bg-white shadow-lg rounded-xl p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl scroll-reveal slide-in-up">
                <h3 class="text-xl font-semibold text-red-600">Certifications</h3>
                <p class="mt-2 text-gray-700">Obtenez des certificats reconnus à la fin des cours.</p>
            </div>
            <div class="bg-white shadow-lg rounded-xl p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl scroll-reveal slide-in-up">
                <h3 class="text-xl font-semibold text-red-600">Support</h3>
                <p class="mt-2 text-gray-700">Bénéficiez d’un accompagnement personnalisé.</p>
            </div>
        </div>
    </section>

    <!-- Section Témoignages -->
    <section id="testimonials" class="py-16 mx-auto max-w-7xl">
        <h2 class="text-center text-3xl sm:text-4xl font-bold text-blue-900 mb-12 scroll-reveal fade-in">Témoignages</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-orange-50 shadow-lg rounded-xl p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl scroll-reveal slide-in-up">
                <p class="italic text-gray-700">"Une plateforme intuitive et motivante !"</p>
                <p class="mt-4 font-semibold text-red-600">- Marie, Étudiante</p>
            </div>
            <div class="bg-orange-50 shadow-lg rounded-xl p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl scroll-reveal slide-in-up">
                <p class="italic text-gray-700">"Les cours sont clairs et bien structurés."</p>
                <p class="mt-4 font-semibold text-red-600">- Paul, Apprenant</p>
            </div>
            <div class="bg-orange-50 shadow-lg rounded-xl p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl scroll-reveal slide-in-up">
                <p class="italic text-gray-700">"Un excellent outil pour enseigner."</p>
                <p class="mt-4 font-semibold text-red-600">- Sophie, Enseignante</p>
            </div>
        </div>
    </section>

    <!-- Section Appel à l'Action -->
    <section class="py-16 bg-gradient-to-r from-red-500 to-red-700 text-center mx-auto max-w-7xl">
        <h2 class="text-3xl sm:text-4xl font-bold text-white mb-6 scroll-reveal fade-in">Commencez votre aventure d’apprentissage</h2>
        <p class="text-lg text-gray-200 mb-8 scroll-reveal fade-in">Inscrivez-vous dès maintenant et accédez à des cours de qualité.</p>
        <a href="{{ route('register') }}" class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 px-8 rounded-lg shadow-lg transition duration-300 scroll-reveal fade-in">S'inscrire Maintenant</a>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-900 text-white p-6 text-center">
        <p class="text-gray-200 scroll-reveal slide-in-up">© {{ date('Y') }} CFPC-Learning - Tous droits réservés</p>
        <div class="mt-2 space-x-4 scroll-reveal slide-in-up">
            <a href="#privacy" class="hover:text-orange-300 transition">Politique de confidentialité</a>
            <a href="#terms" class="hover:text-orange-300 transition">Conditions d'utilisation</a>
        </div>
    </footer>

    <style>
        /* Animations personnalisées */
        @keyframes slideInUp {
            0% { opacity: 0; transform: translateY(30px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
        .scroll-reveal {
            opacity: 0;
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        .scroll-reveal.slide-in-up.visible {
            animation: slideInUp 0.6s ease-out forwards;
        }
        .scroll-reveal.fade-in.visible {
            animation: fadeIn 0.6s ease-out forwards;
        }
    </style>

    <script>
        // Animation au scroll simplifiée
        document.addEventListener('DOMContentLoaded', () => {
            const elements = document.querySelectorAll('.scroll-reveal');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, { threshold: 0.1 });

            elements.forEach(element => observer.observe(element));
        });
    </script>
</body>
</html>
