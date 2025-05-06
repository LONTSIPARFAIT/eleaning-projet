{{-- essaye de faire avec une autre mehode pour eviter les confusion --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' || false }" :class="{ 'dark': darkMode }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('img/logo11.png') }}">
    <title>CFPC-Learning</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Alpine.js CDN -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="antialiased bg-gradient-to-br from-blue-50 to-orange-100 dark:bg-gradient-to-br dark:from-gray-900 dark:to-gray-800 px-4 transition-colors duration-300">

    <!-- Navbar -->
    <nav x-data="{ visible: false, mobileOpen: false }" x-init="visible = window.scrollY > 0" x-cloak @scroll.window="visible = window.scrollY > 0"
        class="fixed top-0 left-0 right-0 bg-gradient-to-r from-red-600 to-red-800 dark:from-gray-800 dark:to-gray-700 p-4 shadow-xl z-50 transition duration-300 transform border-b-2 border-orange-400 dark:border-orange-600">
        <div class="container mx-auto flex justify-between items-center px-4">
            <a href="/" class="transition transform hover:scale-105">
                <img src="/img/logo1.jpg" alt="CFPC-Learning"
                    class="h-14 w-20 rounded-lg shadow-md border border-orange-300 dark:border-orange-500">
                {{-- <img src="/img/logo11.png" alt="CFPC-Learning"
                    class="h-14 w-20 rounded-lg shadow-md border border-orange-300 dark:border-orange-500"> --}}
            </a>
            <div class="hidden md:flex space-x-10 text-lg font-semibold">
                <a href="/"
                    class="text-white hover:text-orange-300 dark:hover:text-orange-400 transition duration-300 relative group">
                    Accueil
                    <span
                        class="absolute left-0 bottom-0 w-0 h-1 bg-orange-400 dark:bg-orange-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#cours"
                    class="text-white hover:text-orange-300 dark:hover:text-orange-400 transition duration-300 relative group">
                    Nos Cours
                    <span
                        class="absolute left-0 bottom-0 w-0 h-1 bg-orange-400 dark:bg-orange-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#about"
                    class="text-white hover:text-orange-300 dark:hover:text-orange-400 transition duration-300 relative group">
                    À propos
                    <span
                        class="absolute left-0 bottom-0 w-0 h-1 bg-orange-400 dark:bg-orange-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#contact"
                    class="text-white hover:text-orange-300 dark:hover:text-orange-400 transition duration-300 relative group">
                    Contact
                    <span
                        class="absolute left-0 bottom-0 w-0 h-1 bg-orange-400 dark:bg-orange-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
            </div>
            <div class="flex items-center space-x-4">
                @if (Route::has('login'))
                    @auth
                        @if (auth()->user()->role === 'student')
                            <a href="{{ route('student.dashboard') }}"
                                class="font-semibold text-white hover:text-orange-300 dark:hover:text-orange-400 transition duration-300"><i
                                    class="fas fa-user-graduate mr-2"></i>Dashboard apprenant</a>
                        @elseif (auth()->user()->role === 'teacher')
                            <a href="{{ route('teacher.dashboard') }}"
                                class="font-semibold text-white hover:text-orange-300 dark:hover:text-orange-400 transition duration-300"><i
                                    class="fas fa-chalkboard-teacher mr-2"></i>Dashboard formateur</a>
                        @elseif (auth()->user()->role === 'admin')
                            <a href="{{ route('dashboard') }}"
                                class="font-semibold text-white hover:text-orange-300 dark:hover:text-orange-400 transition duration-300"><i
                                    class="fas fa-user-shield mr-2"></i>Dashboard Admin</a>
                        @else
                            <a href="{{ route('home') }}"
                                class="font-semibold text-white hover:text-orange-300 dark:hover:text-orange-400 transition duration-300"><i
                                    class="fas fa-home mr-2"></i>Dashboard</a>
                        @endif
                    @else
                        <a href="{{ route('login') }}"
                            class="font-semibold bg-orange-500 dark:bg-orange-600 text-white py-2 px-6 rounded-lg hover:bg-orange-600 dark:hover:bg-orange-700 transition duration-300 shadow-md"><i
                                class="fas fa-sign-in-alt mr-2"></i>Connexion</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="font-semibold bg-white dark:bg-gray-800 text-red-600 dark:text-orange-400 py-2 px-6 rounded-lg hover:bg-orange-100 dark:hover:bg-gray-700 transition duration-300 shadow-md"><i
                                class="fas fa-user-plus mr-2"></i>Inscription</a>
                        @endif
                    @endauth
                @endif
                <!-- Dark Mode Toggle -->
                <button
                    @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode); console.log('Dark Mode:', darkMode)"
                    class="p-2 rounded-md text-white hover:text-orange-300 dark:hover:text-orange-400 dark:hover:bg-orange-300 dark:bg-white focus:outline-none focus:ring-2 focus:ring-orange-500 transition duration-150 ease-in-out">
                    <span x-show="!darkMode">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </span>
                    <span x-show="darkMode" class="hidden" x-cloak>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                            </path>
                        </svg>
                    </span>
                </button>
            </div>
            <div class="md:hidden">
                <button @click="mobileOpen = !mobileOpen" class="text-white focus:outline-none">
                    <svg x-show="!mobileOpen" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="mobileOpen" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <div x-show="mobileOpen" x-transition
            class="md:hidden bg-gradient-to-r from-red-600 to-red-800 dark:from-gray-800 dark:to-gray-700 border-t border-orange-400 dark:border-orange-600">
            <div class="container mx-auto px-4 py-4 space-y-4">
                <a href="/"
                    class="block text-white hover:text-orange-300 dark:hover:text-orange-400 transition duration-300">Accueil</a>
                <a href="#cours"
                    class="block text-white hover:text-orange-300 dark:hover:text-orange-400 transition duration-300">Nos
                    Cours</a>
                <a href="#about"
                    class="block text-white hover:text-orange-300 dark:hover:text-orange-400 transition duration-300">À
                    propos</a>
                <a href="#contact"
                    class="block text-white hover:text-orange-300 dark:hover:text-orange-400 transition duration-300">Contact</a>
            </div>
        </div>
    </nav>

    <!-- Section Héros -->
    <div class="relative h-screen mx-auto max-w-7xl bg-center bg-cover"
        style="background-image: url('/img/home1.jpg');">
        <div class="absolute inset-0 bg-black opacity-40 dark:opacity-60 rounded-lg"></div>
        <div class="relative flex flex-col justify-center items-start h-full text-left px-6 sm:px-12">
            <h1 class="relative text-4xl sm:text-5xl md:text-6xl font-bold text-white mb-6" x-data="{
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
                <a href="#cours"
                    class="bg-red-500 hover:bg-red-600 dark:bg-red-600 dark:hover:bg-red-700 text-white font-semibold py-3 px-8 rounded-lg shadow-lg transition duration-300">
                    <i class="fas fa-book-open mr-2"></i>Découvrir les Cours</a>
                <a href="{{ route('register') }}"
                    class="bg-orange-500 hover:bg-orange-600 dark:bg-orange-600 dark:hover:bg-orange-700 text-white font-semibold py-3 px-8 rounded-lg shadow-lg transition duration-300">
                    <i class="fas fa-user-plus mr-2"></i>S'inscrire</a>
            </div>
        </div>
    </div>

    <!-- Section Cours Populaires -->
    <section id="cours" class="py-16 mx-auto max-w-7xl scroll-reveal">
        <h2 class="text-center text-3xl sm:text-4xl font-bold text-blue-900 dark:text-orange-400 mb-12">
            <i class="fas fa-graduation-cap mr-2"></i>Cours Populaires</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($cours->take(6) as $cour)
                <div
                    class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-orange-200 dark:border-orange-600">
                    <h3 class="text-xl font-semibold text-red-600 dark:text-orange-400">{{ $cour->title }}</h3>
                    <p class="mt-2 text-gray-700 dark:text-gray-300 line-clamp-2">{{ $cour->description }}</p>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Durée : {{ $cour->duration }} h</p>
                    {{-- <p class="mt-2 text-gray-600 dark:text-gray-400">Prix : {{ $cour->price }} €</p> --}}
                    <form action="{{ route('cours.subscribe', $cour->id) }}" method="POST" class="mt-4">
                        @csrf
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 dark:bg-orange-500 dark:hover:bg-orange-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300">
                            <i class="fas fa-plus-circle mr-2"></i>S'abonner</button>
                    </form>
                </div>
            @empty
                <p class="text-center text-gray-600 dark:text-gray-400 col-span-full">Aucun cours disponible pour le moment.</p>
            @endforelse
        </div>
        <div class="mt-8 text-center">
            {{ $cours->links() }}
        </div>
    </section>

    <!-- Section Fonctionnalités -->
    <section id="features" class="py-16 mx-auto max-w-7xl bg-orange-50 dark:bg-gray-900 scroll-reveal">
        <h2 class="text-center text-3xl sm:text-4xl font-bold text-blue-900 dark:text-orange-400 mb-12">Pourquoi
            choisir CFPC-Learning ?</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <div
                class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                <h3 class="text-xl font-semibold text-red-600 dark:text-orange-400"><i
                        class="fas fa-clock mr-2"></i>Flexibilité</h3>
                <p class="mt-2 text-gray-700 dark:text-gray-300">Apprenez à votre rythme, où et quand vous voulez.</p>
            </div>
            <div
                class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                <h3 class="text-xl font-semibold text-red-600 dark:text-orange-400"><i
                        class="fas fa-users mr-2"></i>Interactivité</h3>
                <p class="mt-2 text-gray-700 dark:text-gray-300">Échangez avec des enseignants et d'autres apprenants.
                </p>
            </div>
            <div
                class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                <h3 class="text-xl font-semibold text-red-600 dark:text-orange-400"><i
                        class="fas fa-certificate mr-2"></i>Certifications</h3>
                <p class="mt-2 text-gray-700 dark:text-gray-300">Obtenez des certificats reconnus à la fin des cours.
                </p>
            </div>
            <div
                class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                <h3 class="text-xl font-semibold text-red-600 dark:text-orange-400"><i
                        class="fas fa-headset mr-2"></i>Support</h3>
                <p class="mt-2 text-gray-700 dark:text-gray-300">Bénéficiez d’un accompagnement personnalisé.</p>
            </div>
        </div>
    </section>

    <!-- Section À propos -->
    <section id="about" class="py-16 mx-auto max-w-7xl scroll-reveal">
        <h2 class="text-center text-3xl sm:text-4xl font-bold text-blue-900 dark:text-orange-400 mb-12"><i
                class="fas fa-info-circle mr-2"></i>À propos de nous</h2>
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-6 max-w-4xl mx-auto">
            <p class="text-gray-700 dark:text-gray-300 text-lg">CFPC-Learning est une plateforme dédiée à l’éducation
                en ligne, conçue pour offrir des cours de qualité à tous, quel que soit leur niveau ou leur emploi du
                temps. Notre mission est de rendre l’apprentissage accessible, interactif et efficace grâce à une équipe
                d’enseignants passionnés et des outils modernes.</p>
            <p class="mt-4 text-gray-700 dark:text-gray-300 text-lg">Rejoignez-nous pour développer vos compétences et
                atteindre vos objectifs avec une expérience d’apprentissage personnalisée.</p>
        </div>
    </section>

    <!-- Section Témoignages -->
    <section id="testimonials" class="py-16 mx-auto max-w-7xl scroll-reveal">
        <h2 class="text-center text-3xl sm:text-4xl font-bold text-blue-900 dark:text-orange-400 mb-12"><i
                class="fas fa-quote-left mr-2"></i>Témoignages</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div
                class="bg-orange-50 dark:bg-gray-800 shadow-lg rounded-xl p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                <p class="italic text-gray-700 dark:text-gray-300">"Une plateforme intuitive et motivante !"</p>
                <p class="mt-4 font-semibold text-red-600 dark:text-orange-400">- Marie, Apprenante</p>
            </div>
            <div
                class="bg-orange-50 dark:bg-gray-800 shadow-lg rounded-xl p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                <p class="italic text-gray-700 dark:text-gray-300">"Les cours sont clairs et bien structurés."</p>
                <p class="mt-4 font-semibold text-red-600 dark:text-orange-400">- Paul, Apprenant</p>
            </div>
            <div
                class="bg-orange-50 dark:bg-gray-800 shadow-lg rounded-xl p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                <p class="italic text-gray-700 dark:text-gray-300">"Un excellent outil pour enseigner."</p>
                <p class="mt-4 font-semibold text-red-600 dark:text-orange-400">- Sophie, Enseignante</p>
            </div>
        </div>
    </section>
 
    <!-- Section Contact -->
    <section id="contact" class="py-16 mx-auto max-w-7xl scroll-reveal">
        <h2 class="text-center text-3xl sm:text-4xl font-bold text-blue-900 dark:text-orange-400 mb-12"><i
                class="fas fa-envelope mr-2"></i>Contactez-nous</h2>
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-6 max-w-2xl mx-auto">
            <form action="#" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="name" class="block text-gray-700 dark:text-gray-300 font-semibold"><i
                            class="fas fa-user mr-2"></i>Nom</label>
                    <input type="text" id="name" name="name"
                        class="w-full mt-2 p-3 border border-orange-200 dark:border-orange-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 dark:focus:ring-orange-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-200"
                        required>
                </div>
                <div>
                    <label for="email" class="block text-gray-700 dark:text-gray-300 font-semibold"><i
                            class="fas fa-envelope mr-2"></i>Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full mt-2 p-3 border border-orange-200 dark:border-orange-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 dark:focus:ring-orange-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-200"
                        required>
                </div>
                <div>
                    <label for="message" class="block text-gray-700 dark:text-gray-300 font-semibold"><i
                            class="fas fa-comment mr-2"></i>Message</label>
                    <textarea id="message" name="message" rows="4"
                        class="w-full mt-2 p-3 border border-orange-200 dark:border-orange-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 dark:focus:ring-orange-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-200"
                        required></textarea>
                </div>
                <button type="submit"
                    class="w-full bg-red-500 hover:bg-red-600 dark:bg-orange-500 dark:hover:bg-orange-600 text-white font-semibold py-3 rounded-lg shadow-lg transition duration-300"><i
                        class="fas fa-paper-plane mr-2"></i>Envoyer</button>
            </form>
        </div>
    </section>

    <!-- Section Appel à l'Action -->
    <section
        class="py-16 bg-gradient-to-r from-red-500 to-red-700 dark:from-gray-800 dark:to-gray-700 text-center mx-auto max-w-7xl scroll-reveal">
        <h2 class="text-3xl sm:text-4xl font-bold text-white mb-6"><i class="fas fa-rocket mr-2"></i>Commencez votre
            aventure d’apprentissage</h2>
        <p class="text-lg text-gray-200 dark:text-gray-300 mb-8">Inscrivez-vous dès maintenant et accédez à des cours
            de qualité.</p>
        <a href="{{ route('register') }}"
            class="inline-block bg-orange-500 hover:bg-orange-600 dark:bg-orange-600 dark:hover:bg-orange-700 text-white font-semibold py-3 px-8 rounded-lg shadow-lg transition duration-300"><i
                class="fas fa-user-plus mr-2"></i>S'inscrire Maintenant</a>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-900 dark:bg-gray-900 text-white p-6 text-center scroll-reveal">
        <p class="text-gray-200 dark:text-gray-300">© {{ date('Y') }} CFPC-Learning - Tous droits réservés</p>
        <div class="mt-2 space-x-4">
            <a href="#privacy" class="hover:text-orange-300 dark:hover:text-orange-400 transition">Politique de
                confidentialité</a>
            <a href="#terms" class="hover:text-orange-300 dark:hover:text-orange-400 transition">Conditions
                d'utilisation</a>
        </div>
    </footer>

    <style>
        /* Animations personnalisées */
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .scroll-reveal {
            opacity: 0;
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        .scroll-reveal.visible {
            animation: fadeInUp 0.6s ease-out forwards;
        }
    </style>

    <script>
        // Animation au scroll avec répétition
        document.addEventListener('DOMContentLoaded', () => {
            const elements = document.querySelectorAll('.scroll-reveal');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    } else {
                        entry.target.classList.remove('visible');
                    }
                });
            }, {
                threshold: 0.2
            });

            elements.forEach(element => observer.observe(element));
        });
    </script>
</body>

</html>
