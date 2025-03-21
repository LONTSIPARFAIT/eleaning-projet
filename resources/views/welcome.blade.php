<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-learning App</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,700,900&display=swap" rel="stylesheet" />

    <!-- Alpine.js CDN -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <!-- Styles personnalisés -->
    <style>
        @keyframes bounceIn {
            0% { opacity: 0; transform: scale(0.3) translateY(50px); }
            60% { opacity: 1; transform: scale(1.05); }
            100% { transform: scale(1) translateY(0); }
        }
        .animate-bounceIn { animation: bounceIn 1s ease-out forwards; }
        .hover-pop {
            transition: all 0.3s ease;
        }
        .hover-pop:hover {
            transform: scale(1.03) translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased font-figtree min-h-screen transition-colors duration-300" :class="darkMode ? 'bg-gray-900 text-white' : 'bg-gray-100 text-gray-900'">

    <!-- Bouton de bascule thème -->
    <div class="fixed top-4 right-4 z-50">
        <button @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode)"
                class="p-2 rounded-full bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 transition-all duration-300">
            <svg x-show="!darkMode" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <svg x-show="darkMode" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
            </svg>
        </button>
    </div>

    <!-- Navbar -->
    <nav x-data="{ visible: false, mobileOpen: false }"
         x-init="visible = window.scrollY > 0"
         x-cloak
         @scroll.window="visible = window.scrollY > 0"
         class="fixed top-0 left-0 right-0 z-40 bg-white dark:bg-gray-800 p-6 shadow-lg transition-all duration-500"
         :class="{ 'translate-y-0 opacity-100': visible, '-translate-y-full opacity-0': !visible }">
        <div class="container mx-auto flex justify-between items-center px-6">
            <a href="#" class="hover-pop">
                <img src="/img/logo1.jpg" alt="Logo" class="h-16 w-24 rounded-full border-2 border-gray-200 dark:border-gray-700 object-cover animate-bounceIn">
            </a>
            <div class="hidden md:flex space-x-10 text-lg font-bold tracking-wide">
                <a href="#" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-all duration-300">Accueil</a>
                <a href="#cours" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-all duration-300">Cours</a>
                <a href="#faq" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-all duration-300">FAQ</a>
            </div>
            <div class="flex items-center space-x-6">
                @auth
                    <a href="{{ route(auth()->user()->role . '.dashboard') }}"
                       class="font-bold bg-indigo-600 hover:bg-indigo-700 text-white py-3 px-6 rounded-full shadow-lg hover-pop transition-all duration-300">
                        {{ ucfirst(auth()->user()->role) }} Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="font-bold text-indigo-600 dark:text-indigo-400 bg-white dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 py-3 px-6 rounded-full shadow-lg hover-pop transition-all duration-300">
                        Connexion
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="font-bold bg-indigo-600 hover:bg-indigo-700 text-white py-3 px-6 rounded-full shadow-lg hover-pop transition-all duration-300">
                            Inscription
                        </a>
                    @endif
                @endauth
            </div>
            <div class="md:hidden">
                <button @click="mobileOpen = !mobileOpen" class="text-gray-900 dark:text-white hover:text-indigo-600 dark:hover:text-indigo-400 transition-all duration-300">
                    <svg x-show="!mobileOpen" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="mobileOpen" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <div x-show="mobileOpen"
             x-transition:enter="transition ease-out duration-500"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             class="md:hidden bg-white dark:bg-gray-800 mt-4 rounded-b-2xl shadow-lg">
            <div class="container mx-auto px-6 py-6 space-y-4">
                <a href="#" class="block font-bold hover:bg-indigo-100 dark:hover:bg-indigo-900/50 p-3 rounded-xl transition-all duration-300">Accueil</a>
                <a href="#cours" class="block font-bold hover:bg-indigo-100 dark:hover:bg-indigo-900/50 p-3 rounded-xl transition-all duration-300">Cours</a>
                <a href="#faq" class="block font-bold hover:bg-indigo-100 dark:hover:bg-indigo-900/50 p-3 rounded-xl transition-all duration-300">FAQ</a>
            </div>
        </div>
    </nav>

    <!-- Section Héros -->
    <div class="relative h-screen mx-auto max-w-7xl bg-center bg-cover"
         style="background-image: url('img/home1.jpg'); background-attachment: fixed;">
        <div class="absolute inset-0 bg-gray-900/70"></div>
        <div class="relative flex flex-col justify-center items-start h-full text-left px-8 md:px-16">
            <h1 class="relative text-5xl md:text-7xl font-extrabold text-white mb-8 leading-tight animate-bounceIn tracking-tight">
                <span x-data="{ texts: ['Bienvenue sur Perfect-Learning', 'Apprenez avec Passion'], currentTextIndex: 0, displayed: '' }"
                      x-init="async function animate() { while(true) { let text = texts[currentTextIndex]; for(let i = 0; i <= text.length; i++) { displayed = text.slice(0,i); await new Promise(r => setTimeout(r, 80)); } await new Promise(r => setTimeout(r, 1200)); for(let i = text.length; i >= 0; i--) { displayed = text.slice(0,i); await new Promise(r => setTimeout(r, 40)); } await new Promise(r => setTimeout(r, 1500)); currentTextIndex = (currentTextIndex + 1) % texts.length; } } animate()"
                      x-text="displayed"></span>
            </h1>
            <p class="mt-6 text-xl md:text-2xl text-gray-200 max-w-3xl animate-bounceIn font-medium" style="animation-delay: 0.3s">
                Des cours conçus pour inspirer et transformer votre parcours d’apprentissage.
            </p>
            <div class="mt-10 flex flex-col sm:flex-row gap-6 animate-bounceIn" style="animation-delay: 0.6s">
                <a href="#cours" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-4 px-10 rounded-full shadow-lg hover-pop transition-all duration-300 text-lg">
                    Voir les Cours
                </a>
                <a href="#" class="inline-block bg-transparent border-2 border-white text-white hover:bg-white hover:text-indigo-600 font-bold py-4 px-10 rounded-full shadow-lg hover-pop transition-all duration-300 text-lg">
                    En savoir plus
                </a>
            </div>
        </div>
    </div>

    <!-- Section Cours avec images -->
    <section id="cours" class="py-20 mx-auto max-w-7xl px-6">
        <h2 class="text-center text-5xl font-extrabold mb-16 animate-bounceIn text-gray-900 dark:text-white">
            Nos Cours Inspirants
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach ($cours->take(4) as $cour)
                <div class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden hover-pop transition-all duration-300 animate-bounceIn shadow-lg"
                     style="animation-delay: {{ $loop->index * 0.2 }}s">
                    <!-- Image du cours -->
                    <img src="{{ $cour->image ?? 'https://source.unsplash.com/random/400x300?' . urlencode($cour->title) }}"
                         alt="{{ $cour->title }}"
                         class="w-full h-48 object-cover transition-transform duration-300 hover:scale-105">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-indigo-600 dark:text-indigo-400 mb-3">{{ $cour->title }}</h3>
                        <p class="text-gray-700 dark:text-gray-300 mb-4">{{ $cour->description }}</p>
                        <div class="flex justify-between text-gray-600 dark:text-gray-400 mb-4">
                            <span>{{ $cour->duration }} min</span>
                            <span>{{ $cour->price }} €</span>
                        </div>
                        <form action="{{ route('cours.subscribe', $cour->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-full shadow-md hover-pop transition-all duration-300">
                                S’abonner
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-12 text-center">
            {{ $cours->links() }}
        </div>
    </section>

    <!-- Section Fonctionnalités -->
    <section id="features" class="py-20 mx-auto max-w-7xl px-6 bg-gray-50 dark:bg-gray-900">
        <h2 class="text-center text-5xl font-extrabold mb-16 animate-bounceIn text-gray-900 dark:text-white">
            Ce qui nous distingue
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 hover-pop transition-all duration-300 animate-bounceIn shadow-lg">
                <h3 class="text-2xl font-bold text-indigo-600 dark:text-indigo-400 mb-4">Accès 24/7</h3>
                <p class="text-gray-700 dark:text-gray-300">Apprenez à votre rythme, à tout moment.</p>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 hover-pop transition-all duration-300 animate-bounceIn shadow-lg" style="animation-delay: 0.2s">
                <h3 class="text-2xl font-bold text-indigo-600 dark:text-indigo-400 mb-4">Interactivité</h3>
                <p class="text-gray-700 dark:text-gray-300">Échangez avec une communauté active.</p>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 hover-pop transition-all duration-300 animate-bounceIn shadow-lg" style="animation-delay: 0.4s">
                <h3 class="text-2xl font-bold text-indigo-600 dark:text-indigo-400 mb-4">Certifications</h3>
                <p class="text-gray-700 dark:text-gray-300">Obtenez des certificats reconnus.</p>
            </div>
        </div>
    </section>

    <!-- Section Témoignages avec images -->
    <section id="testimonials" class="py-20 mx-auto max-w-7xl px-6">
        <h2 class="text-center text-5xl font-extrabold mb-16 animate-bounceIn text-gray-900 dark:text-white">
            Nos Apprenants Parlent
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 hover-pop transition-all duration-300 animate-bounceIn shadow-lg">
                <img src="https://randomuser.me/api/portraits/women/1.jpg" alt="Sarah" class="w-20 h-20 rounded-full mx-auto mb-4 border-2 border-indigo-400">
                <p class="italic text-gray-700 dark:text-gray-300 mb-4">"Une expérience transformative !"</p>
                <p class="font-bold text-indigo-600 dark:text-indigo-400">— Sarah M.</p>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 hover-pop transition-all duration-300 animate-bounceIn shadow-lg" style="animation-delay: 0.2s">
                <img src="https://randomuser.me/api/portraits/men/2.jpg" alt="Ahmed" class="w-20 h-20 rounded-full mx-auto mb-4 border-2 border-indigo-400">
                <p class="italic text-gray-700 dark:text-gray-300 mb-4">"Des cours clairs et engageants."</p>
                <p class="font-bold text-indigo-600 dark:text-indigo-400">— Ahmed K.</p>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 hover-pop transition-all duration-300 animate-bounceIn shadow-lg" style="animation-delay: 0.4s">
                <img src="https://randomuser.me/api/portraits/women/3.jpg" alt="Lisa" class="w-20 h-20 rounded-full mx-auto mb-4 border-2 border-indigo-400">
                <p class="italic text-gray-700 dark:text-gray-300 mb-4">"Un vrai boost pour ma carrière."</p>
                <p class="font-bold text-indigo-600 dark:text-indigo-400">— Lisa T.</p>
            </div>
        </div>
    </section>

    <!-- Section Statistiques -->
    <section id="stats" class="py-20 mx-auto max-w-7xl px-6 bg-gray-50 dark:bg-gray-900">
        <h2 class="text-center text-5xl font-extrabold mb-16 animate-bounceIn text-gray-900 dark:text-white">
            Nos Réalisations
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-center">
            <div class="animate-bounceIn">
                <p class="text-5xl font-bold text-indigo-600 dark:text-indigo-400">5000+</p>
                <p class="mt-2 text-lg text-gray-700 dark:text-gray-300">Étudiants</p>
            </div>
            <div class="animate-bounceIn" style="animation-delay: 0.2s">
                <p class="text-5xl font-bold text-indigo-600 dark:text-indigo-400">200+</p>
                <p class="mt-2 text-lg text-gray-700 dark:text-gray-300">Cours</p>
            </div>
            <div class="animate-bounceIn" style="animation-delay: 0.4s">
                <p class="text-5xl font-bold text-indigo-600 dark:text-indigo-400">95%</p>
                <p class="mt-2 text-lg text-gray-700 dark:text-gray-300">Satisfaction</p>
            </div>
        </div>
    </section>

    <!-- Section FAQ -->
    <section id="faq" class="py-20 mx-auto max-w-7xl px-6">
        <h2 class="text-center text-5xl font-extrabold mb-16 animate-bounceIn text-gray-900 dark:text-white">
            Questions Fréquentes
        </h2>
        <div class="space-y-6 max-w-3xl mx-auto">
            <div x-data="{ open: false }" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg">
                <button @click="open = !open" class="flex justify-between w-full text-left font-bold text-indigo-600 dark:text-indigo-400">
                    Comment m’inscrire ?
                    <svg :class="{ 'rotate-180': open }" class="w-6 h-6 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" x-transition class="mt-4 text-gray-700 dark:text-gray-300">Cliquez sur "Inscription" et suivez les étapes simples.</div>
            </div>
            <div x-data="{ open: false }" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg">
                <button @click="open = !open" class="flex justify-between w-full text-left font-bold text-indigo-600 dark:text-indigo-400">
                    Les cours sont-ils certifiants ?
                    <svg :class="{ 'rotate-180': open }" class="w-6 h-6 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" x-transition class="mt-4 text-gray-700 dark:text-gray-300">Oui, chaque cours terminé offre un certificat.</div>
            </div>
        </div>
    </section>

    <!-- Section Appel à l’Action -->
    <section class="py-20 mx-auto max-w-7xl px-6 text-center bg-gray-50 dark:bg-gray-900">
        <h2 class="text-5xl font-extrabold mb-8 animate-bounceIn text-gray-900 dark:text-white">
            Commencez Votre Aventure
        </h2>
        <p class="text-xl mb-10 text-gray-700 dark:text-gray-300">Rejoignez une communauté d’apprenants passionnés dès maintenant.</p>
        <a href="{{ route('register') }}"
           class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-4 px-12 rounded-full shadow-lg hover-pop transition-all duration-300 text-xl">
            S’inscrire
        </a>
    </section>

    <!-- Footer -->
    <footer class="bg-white dark:bg-gray-800 p-10 text-center shadow-inner">
        <p class="text-xl font-bold text-gray-900 dark:text-white">© 2024 Perfect-Learning</p>
        <div class="mt-6 space-x-8 text-lg">
            <a href="#privacy" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-all duration-300">Confidentialité</a>
            <a href="#terms" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-all duration-300">Conditions</a>
        </div>
    </footer>

</body>
</html>
