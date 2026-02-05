<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' || false }" :class="{ 'dark': darkMode }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('img/logo11.png') }}">
    <title>CFPC-Learning - Plateforme d'Apprentissage en Ligne</title>
    <meta name="description" content="Plateforme d'apprentissage en ligne avec des cours interactifs pour tous les niveaux. Apprenez à votre rythme avec CFPC-Learning.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Alpine.js CDN -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Variables CSS pour une meilleure maintenabilité */
        :root {
            --primary-red: #dc2626;
            --primary-orange: #f97316;
            --light-bg: linear-gradient(135deg, #f0f9ff 0%, #ffedd5 100%);
            --dark-bg: linear-gradient(135deg, #111827 0%, #1f2937 100%);
        }

        /* Amélioration des animations */
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }

        @keyframes typewriter {
            from { width: 0; }
            to { width: 100%; }
        }

        /* Classes utilitaires */
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .typewriter {
            overflow: hidden;
            white-space: nowrap;
            border-right: 3px solid var(--primary-orange);
            animation: typewriter 3.5s steps(40, end), blink-caret 0.75s step-end infinite;
        }

        @keyframes blink-caret {
            from, to { border-color: transparent; }
            50% { border-color: var(--primary-orange); }
        }

        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .dark .glass-effect {
            background: rgba(17, 24, 39, 0.7);
            border: 1px solid rgba(249, 115, 22, 0.3);
        }

        /* Styles spécifiques */
        .hero-overlay {
            background: linear-gradient(135deg, rgba(220, 38, 38, 0.8) 0%, rgba(249, 115, 22, 0.6) 100%);
        }

        .dark .hero-overlay {
            background: linear-gradient(135deg, rgba(17, 24, 39, 0.8) 0%, rgba(31, 41, 55, 0.9) 100%);
        }

        .stat-card {
            background: linear-gradient(135deg, #fff 0%, #fef3c7 100%);
            transition: all 0.3s ease;
        }

        .dark .stat-card {
            background: linear-gradient(135deg, #1f2937 0%, #374151 100%);
        }

        .course-card {
            background: linear-gradient(145deg, #ffffff 0%, #fef3c7 100%);
            border-left: 4px solid var(--primary-red);
        }

        .dark .course-card {
            background: linear-gradient(145deg, #1f2937 0%, #111827 100%);
            border-left: 4px solid var(--primary-orange);
        }

        /* Section stats */
        .stat-item {
            position: relative;
            overflow: hidden;
        }

        .stat-item::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: var(--primary-orange);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .stat-item:hover::after {
            transform: scaleX(1);
        }

        /* Optimisation mobile */
        @media (max-width: 640px) {
            .hero-title {
                font-size: 2.5rem;
                line-height: 1.2;
            }

            .section-padding {
                padding: 3rem 1rem;
            }

            .stat-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
        }

        @media (min-width: 641px) and (max-width: 1024px) {
            .hero-title {
                font-size: 3.5rem;
            }

            .stat-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>

<body class="antialiased bg-gradient-to-br from-blue-50 to-orange-100 dark:from-gray-900 dark:to-gray-800 transition-colors duration-300 overflow-x-hidden">

    <!-- Navigation améliorée -->
    <nav x-data="{ mobileOpen: false, scrolled: false }"
         @scroll.window="scrolled = window.scrollY > 50"
         :class="{ 'bg-white/90 dark:bg-gray-900/90 backdrop-blur-md shadow-lg': scrolled, 'bg-transparent': !scrolled }"
         class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 border-b border-orange-200/20 dark:border-orange-600/20">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <a href="/" class="flex items-center space-x-3 group">
                    <div class="relative overflow-hidden rounded-lg">
                        <img src="/img/logo1.jpg" alt="CFPC-Learning"
                             class="h-12 w-16 object-cover transition-transform duration-300 group-hover:scale-110">
                        <div class="absolute inset-0 bg-orange-500/20 group-hover:bg-transparent transition-colors duration-300"></div>
                    </div>
                    <span class="text-xl font-bold text-red-600 dark:text-orange-400">CFPC-Learning</span>
                </a>

                <!-- Menu Desktop -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/"
                       class="text-gray-700 dark:text-gray-300 hover:text-red-600 dark:hover:text-orange-400 font-medium transition-colors duration-300 relative group">
                        <i class="fas fa-home mr-2"></i>Accueil
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-red-600 dark:bg-orange-400 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="#cours"
                       class="text-gray-700 dark:text-gray-300 hover:text-red-600 dark:hover:text-orange-400 font-medium transition-colors duration-300 relative group">
                        <i class="fas fa-book mr-2"></i>Cours
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-red-600 dark:bg-orange-400 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="#stats"
                       class="text-gray-700 dark:text-gray-300 hover:text-red-600 dark:hover:text-orange-400 font-medium transition-colors duration-300 relative group">
                        <i class="fas fa-chart-line mr-2"></i>Chiffres
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-red-600 dark:bg-orange-400 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="#about"
                       class="text-gray-700 dark:text-gray-300 hover:text-red-600 dark:hover:text-orange-400 font-medium transition-colors duration-300 relative group">
                        <i class="fas fa-info-circle mr-2"></i>À propos
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-red-600 dark:bg-orange-400 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="#contact"
                       class="text-gray-700 dark:text-gray-300 hover:text-red-600 dark:hover:text-orange-400 font-medium transition-colors duration-300 relative group">
                        <i class="fas fa-envelope mr-2"></i>Contact
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-red-600 dark:bg-orange-400 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                </div>

                <!-- Actions -->
                <div class="flex items-center space-x-4">
                    @auth
                        @php
                            $dashboardRoutes = [
                                'student' => ['route' => 'student.dashboard', 'icon' => 'fa-user-graduate', 'text' => 'Dashboard apprenant'],
                                'teacher' => ['route' => 'teacher.dashboard', 'icon' => 'fa-chalkboard-teacher', 'text' => 'Dashboard formateur'],
                                'admin' => ['route' => 'dashboard', 'icon' => 'fa-user-shield', 'text' => 'Dashboard Admin']
                            ];
                            $userDashboard = $dashboardRoutes[auth()->user()->role] ?? ['route' => 'home', 'icon' => 'fa-home', 'text' => 'Dashboard'];
                        @endphp

                        <a href="{{ route($userDashboard['route']) }}"
                           class="hidden md:inline-flex items-center px-4 py-2 bg-gradient-to-r from-red-500 to-orange-500 text-white rounded-lg hover:from-red-600 hover:to-orange-600 transition-all duration-300 shadow-md hover:shadow-lg">
                            <i class="{{ $userDashboard['icon'] }} mr-2"></i>{{ $userDashboard['text'] }}
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="hidden md:inline-flex items-center px-4 py-2 bg-gradient-to-r from-red-500 to-orange-500 text-white rounded-lg hover:from-red-600 hover:to-orange-600 transition-all duration-300 shadow-md hover:shadow-lg">
                            <i class="fas fa-sign-in-alt mr-2"></i>Connexion
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="hidden md:inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 text-red-600 dark:text-orange-400 rounded-lg hover:bg-orange-50 dark:hover:bg-gray-700 transition-all duration-300 shadow-md border border-red-200 dark:border-orange-600">
                                <i class="fas fa-user-plus mr-2"></i>Inscription
                            </a>
                        @endif
                    @endauth

                    <!-- Dark Mode Toggle -->
                    <button @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode)"
                            class="p-2 rounded-full bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm hover:bg-orange-100 dark:hover:bg-gray-700 transition-colors duration-300 shadow-md">
                        <span x-show="!darkMode" class="text-gray-700">
                            <i class="fas fa-moon text-lg"></i>
                        </span>
                        <span x-show="darkMode" class="text-orange-400" x-cloak>
                            <i class="fas fa-sun text-lg"></i>
                        </span>
                    </button>

                    <!-- Menu Mobile Toggle -->
                    <button @click="mobileOpen = !mobileOpen"
                            class="md:hidden p-2 rounded-lg bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm">
                        <span x-show="!mobileOpen">
                            <i class="fas fa-bars text-gray-700 dark:text-gray-300 text-xl"></i>
                        </span>
                        <span x-show="mobileOpen">
                            <i class="fas fa-times text-gray-700 dark:text-gray-300 text-xl"></i>
                        </span>
                    </button>
                </div>
            </div>

            <!-- Menu Mobile -->
            <div x-show="mobileOpen" x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-4"
                 class="md:hidden mt-4 pb-4 border-t border-orange-200/20 dark:border-orange-600/20">
                <div class="pt-4 space-y-3">
                    <a href="/" @click="mobileOpen = false"
                       class="block px-4 py-3 rounded-lg hover:bg-orange-50 dark:hover:bg-gray-700 transition-colors duration-300">
                        <i class="fas fa-home mr-3 text-red-600 dark:text-orange-400"></i>Accueil
                    </a>
                    <a href="#cours" @click="mobileOpen = false"
                       class="block px-4 py-3 rounded-lg hover:bg-orange-50 dark:hover:bg-gray-700 transition-colors duration-300">
                        <i class="fas fa-book mr-3 text-red-600 dark:text-orange-400"></i>Cours
                    </a>
                    <a href="#stats" @click="mobileOpen = false"
                       class="block px-4 py-3 rounded-lg hover:bg-orange-50 dark:hover:bg-gray-700 transition-colors duration-300">
                        <i class="fas fa-chart-line mr-3 text-red-600 dark:text-orange-400"></i>Chiffres
                    </a>
                    <a href="#about" @click="mobileOpen = false"
                       class="block px-4 py-3 rounded-lg hover:bg-orange-50 dark:hover:bg-gray-700 transition-colors duration-300">
                        <i class="fas fa-info-circle mr-3 text-red-600 dark:text-orange-400"></i>À propos
                    </a>
                    <a href="#contact" @click="mobileOpen = false"
                       class="block px-4 py-3 rounded-lg hover:bg-orange-50 dark:hover:bg-gray-700 transition-colors duration-300">
                        <i class="fas fa-envelope mr-3 text-red-600 dark:text-orange-400"></i>Contact
                    </a>

                    @guest
                        <div class="pt-4 space-y-3 border-t border-orange-200/20 dark:border-orange-600/20">
                            <a href="{{ route('login') }}" @click="mobileOpen = false"
                               class="block px-4 py-3 bg-gradient-to-r from-red-500 to-orange-500 text-white text-center rounded-lg hover:from-red-600 hover:to-orange-600 transition-all duration-300">
                                <i class="fas fa-sign-in-alt mr-2"></i>Connexion
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" @click="mobileOpen = false"
                                   class="block px-4 py-3 bg-white dark:bg-gray-800 text-red-600 dark:text-orange-400 text-center rounded-lg hover:bg-orange-50 dark:hover:bg-gray-700 transition-all duration-300 border border-red-200 dark:border-orange-600">
                                    <i class="fas fa-user-plus mr-2"></i>Inscription
                                </a>
                            @endif
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section améliorée -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden pt-16">
        <!-- Background avec effet parallax -->
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-br from-red-500/20 via-orange-500/10 to-transparent"></div>
            <img src="/img/home1.jpg" alt="CFPC-Learning Background"
                 class="w-full h-full object-cover transform scale-110">
            <div class="absolute inset-0 hero-overlay"></div>
        </div>

        <!-- Contenu Hero -->
        <div class="relative z-10 container mx-auto px-4 py-20">
            <div class="max-w-4xl mx-auto text-center">
                <!-- Badge -->
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-white/10 dark:bg-gray-800/50 backdrop-blur-sm mb-8 animate-float">
                    <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse mr-2"></span>
                    <span class="text-white font-medium">Plateforme d'apprentissage N°1</span>
                </div>

                <!-- Titre principal -->
                <h1 class="hero-title text-5xl md:text-7xl font-bold text-white mb-6 leading-tight" x-data="{
                    texts: ['Bienvenue sur CFPC-Learning', 'Apprenez à votre rythme', 'Progressez chaque jour', 'Réussissez votre avenir'],
                    currentText: '',
                    index: 0,
                    charIndex: 0,
                    isDeleting: false,
                    init() {
                        this.type();
                    },
                    type() {
                        const current = this.texts[this.index];
                        if (this.isDeleting) {
                            this.currentText = current.substring(0, this.charIndex--);
                            if (this.charIndex < 0) {
                                this.isDeleting = false;
                                this.index = (this.index + 1) % this.texts.length;
                                setTimeout(() => this.type(), 500);
                                return;
                            }
                        } else {
                            this.currentText = current.substring(0, this.charIndex++);
                            if (this.charIndex > current.length) {
                                this.isDeleting = true;
                                setTimeout(() => this.type(), 2000);
                                return;
                            }
                        }
                        setTimeout(() => this.type(), this.isDeleting ? 50 : 100);
                    }
                }">
                    <span class="block">Transformez votre apprentissage avec</span>
                    <span class="block text-orange-300 mt-2 typewriter" x-text="currentText"></span>
                </h1>

                <!-- Description -->
                <p class="text-xl md:text-2xl text-gray-200 mb-10 max-w-3xl mx-auto leading-relaxed">
                    Rejoignez notre communauté de plus de 10,000 apprenants et accédez à des cours interactifs,
                    des certifications reconnues et un accompagnement personnalisé.
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center mb-16">
                    <a href="#cours"
                       class="group px-8 py-4 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-xl hover:from-orange-600 hover:to-red-600 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 inline-flex items-center justify-center">
                        <i class="fas fa-play-circle text-2xl mr-3 group-hover:scale-110 transition-transform duration-300"></i>
                        <span class="text-lg font-semibold">Découvrir les Cours</span>
                    </a>
                    <a href="{{ route('register') }}"
                       class="group px-8 py-4 bg-white/10 backdrop-blur-sm text-white rounded-xl hover:bg-white/20 transition-all duration-300 border-2 border-white/30 hover:border-white/50 inline-flex items-center justify-center">
                        <i class="fas fa-user-plus text-2xl mr-3 group-hover:rotate-12 transition-transform duration-300"></i>
                        <span class="text-lg font-semibold">Commencer Gratuitement</span>
                    </a>
                </div>

                <!-- Stats en temps réel -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-3xl mx-auto">
                    <div class="stat-card rounded-xl p-6 text-center hover-lift">
                        <div class="text-3xl md:text-4xl font-bold text-red-600 dark:text-orange-400 mb-2" x-data="{ count: 0 }"
                             x-init="setTimeout(() => { let target = 10000; let increment = target / 50; let timer = setInterval(() => { count = Math.min(count + increment, target); if(count >= target) clearInterval(timer); }, 20) }, 500)">
                            <span x-text="Math.floor(count).toLocaleString()"></span>+
                        </div>
                        <p class="text-gray-600 dark:text-gray-400">Apprenants actifs</p>
                    </div>
                    <div class="stat-card rounded-xl p-6 text-center hover-lift">
                        <div class="text-3xl md:text-4xl font-bold text-red-600 dark:text-orange-400 mb-2">50+</div>
                        <p class="text-gray-600 dark:text-gray-400">Cours disponibles</p>
                    </div>
                    <div class="stat-card rounded-xl p-6 text-center hover-lift">
                        <div class="text-3xl md:text-4xl font-bold text-red-600 dark:text-orange-400 mb-2">200+</div>
                        <p class="text-gray-600 dark:text-gray-400">Formateurs experts</p>
                    </div>
                    <div class="stat-card rounded-xl p-6 text-center hover-lift">
                        <div class="text-3xl md:text-4xl font-bold text-red-600 dark:text-orange-400 mb-2">98%</div>
                        <p class="text-gray-600 dark:text-gray-400">Taux de satisfaction</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <a href="#cours" class="text-white">
                <i class="fas fa-chevron-down text-2xl"></i>
            </a>
        </div>
    </section>

    <!-- Section Cours Populaires -->
    <section id="cours" class="py-20 bg-gradient-to-b from-white to-orange-50 dark:from-gray-900 dark:to-gray-800">
        <div class="container mx-auto px-4">
            <!-- En-tête de section -->
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-2 bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 rounded-full font-semibold mb-4">
                    <i class="fas fa-fire mr-2"></i>Populaire
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                    Nos Cours <span class="text-red-600 dark:text-orange-400">Populaires</span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                    Découvrez nos cours les plus appréciés par notre communauté d'apprenants
                </p>
            </div>

            <!-- Filtres -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <button class="px-6 py-3 bg-red-600 text-white rounded-full font-semibold hover:bg-red-700 transition-colors duration-300">
                    Tous les cours
                </button>
                <button class="px-6 py-3 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-full font-semibold hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-300">
                    Développement
                </button>
                <button class="px-6 py-3 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-full font-semibold hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-300">
                    Design
                </button>
                <button class="px-6 py-3 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-full font-semibold hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-300">
                    Business
                </button>
                <button class="px-6 py-3 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-full font-semibold hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-300">
                    Marketing
                </button>
            </div>

            <!-- Grille des cours -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @forelse ($cours->take(6) as $cour)
                    <div class="course-card rounded-2xl shadow-xl hover-lift overflow-hidden group">
                        <!-- Badge -->
                        <div class="absolute top-4 right-4 z-10">
                            @if($cour->is_popular)
                                <span class="px-3 py-1 bg-red-500 text-white text-xs font-bold rounded-full">
                                    <i class="fas fa-star mr-1"></i>Populaire
                                </span>
                            @endif
                        </div>

                        <!-- Image du cours -->
                        <div class="h-48 overflow-hidden">
                            <div class="w-full h-full bg-gradient-to-br from-red-400 to-orange-300 flex items-center justify-center">
                                <i class="fas fa-graduation-cap text-white text-6xl"></i>
                            </div>
                        </div>

                        <!-- Contenu -->
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <span class="px-3 py-1 bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 text-sm font-semibold rounded-full">
                                    {{ $cour->category ?? 'Général' }}
                                </span>
                                <div class="flex items-center text-yellow-500">
                                    <i class="fas fa-star"></i>
                                    <span class="ml-1 text-gray-600 dark:text-gray-400 font-semibold">4.8</span>
                                </div>
                            </div>

                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 group-hover:text-red-600 dark:group-hover:text-orange-400 transition-colors duration-300">
                                {{ $cour->title }}
                            </h3>

                            <p class="text-gray-600 dark:text-gray-400 mb-4 line-clamp-2">
                                {{ $cour->description }}
                            </p>

                            <!-- Infos complémentaires -->
                            <div class="flex items-center justify-between text-sm text-gray-500 dark:text-gray-400 mb-6">
                                <div class="flex items-center">
                                    <i class="far fa-clock mr-2"></i>
                                    <span>{{ $cour->duration }} heures</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="far fa-user mr-2"></i>
                                    <span>{{ $cour->enrollments_count ?? 0 }} inscrits</span>
                                </div>
                                @if($cour->level)
                                    <div class="flex items-center">
                                        <i class="fas fa-signal mr-2"></i>
                                        <span>{{ $cour->level }}</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Actions -->
                            <div class="flex items-center justify-between">
                                <div>
                                    @if($cour->price > 0)
                                        <span class="text-2xl font-bold text-gray-900 dark:text-white">{{ $cour->price }} €</span>
                                    @else
                                        <span class="text-xl font-bold text-green-600 dark:text-green-400">Gratuit</span>
                                    @endif
                                </div>
                                <form action="{{ route('cours.subscribe', $cour->id) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                            class="px-6 py-3 bg-gradient-to-r from-red-500 to-orange-500 text-white font-semibold rounded-lg hover:from-red-600 hover:to-orange-600 transition-all duration-300 transform hover:scale-105 shadow-md">
                                        <i class="fas fa-plus-circle mr-2"></i>S'inscrire
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-orange-100 dark:bg-orange-900/30 rounded-full mb-6">
                            <i class="fas fa-book-open text-3xl text-orange-500"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">Aucun cours disponible</h3>
                        <p class="text-gray-600 dark:text-gray-400 max-w-md mx-auto">
                            Nous préparons actuellement de nouveaux cours passionnants. Revenez bientôt !
                        </p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($cours->hasPages())
                <div class="flex justify-center mt-12">
                    <div class="inline-flex items-center space-x-2 bg-white dark:bg-gray-800 rounded-full px-6 py-3 shadow-lg">
                        {{ $cours->links() }}
                    </div>
                </div>
            @endif

            <!-- Voir tous les cours -->
            <div class="text-center mt-12">
                <a href="{{ route('cours.index') }}"
                   class="inline-flex items-center px-8 py-4 border-2 border-red-600 dark:border-orange-500 text-red-600 dark:text-orange-400 font-semibold rounded-xl hover:bg-red-50 dark:hover:bg-orange-500/10 transition-all duration-300 group">
                    <span>Voir tous les cours</span>
                    <i class="fas fa-arrow-right ml-3 group-hover:translate-x-2 transition-transform duration-300"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Section Fonctionnalités Premium -->
    <section id="features" class="py-20 bg-gradient-to-br from-blue-50 to-red-50 dark:from-gray-900 dark:to-gray-800">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                    Pourquoi choisir <span class="text-red-600 dark:text-orange-400">CFPC-Learning</span> ?
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                    Découvrez les avantages qui font de notre plateforme le choix idéal pour votre apprentissage
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl hover-lift group">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-orange-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-clock text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Flexibilité totale</h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        Apprenez à votre rythme, où et quand vous voulez. Accédez aux cours 24h/24 et 7j/7.
                    </p>
                    <ul class="mt-4 space-y-2">
                        <li class="flex items-center text-gray-600 dark:text-gray-400">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>Accès permanent</span>
                        </li>
                        <li class="flex items-center text-gray-600 dark:text-gray-400">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>Progression sauvegardée</span>
                        </li>
                    </ul>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl hover-lift group">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-users text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Communauté active</h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        Échangez avec des enseignants experts et d'autres apprenants dans des forums dédiés.
                    </p>
                    <ul class="mt-4 space-y-2">
                        <li class="flex items-center text-gray-600 dark:text-gray-400">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>Forums de discussion</span>
                        </li>
                        <li class="flex items-center text-gray-600 dark:text-gray-400">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>Groupes d'étude</span>
                        </li>
                    </ul>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl hover-lift group">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-certificate text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Certifications reconnues</h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        Obtenez des certificats professionnels reconnus par les entreprises à la fin de chaque cours.
                    </p>
                    <ul class="mt-4 space-y-2">
                        <li class="flex items-center text-gray-600 dark:text-gray-400">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>Certifications vérifiables</span>
                        </li>
                        <li class="flex items-center text-gray-600 dark:text-gray-400">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>Reconnues par les employeurs</span>
                        </li>
                    </ul>
                </div>

                <!-- Feature 4 -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl hover-lift group">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-headset text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Support personnalisé</h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        Bénéficiez d'un accompagnement individuel avec nos experts pédagogiques.
                    </p>
                    <ul class="mt-4 space-y-2">
                        <li class="flex items-center text-gray-600 dark:text-gray-400">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>Mentoring individuel</span>
                        </li>
                        <li class="flex items-center text-gray-600 dark:text-gray-400">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>Assistance rapide</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Statistiques -->
    <section id="stats" class="py-20 bg-gradient-to-b from-white to-gray-50 dark:from-gray-900 dark:to-gray-800">
        <div class="container mx-auto px-4">
            <div class="bg-gradient-to-br from-red-600 to-orange-500 rounded-3xl p-8 md:p-12 shadow-2xl">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <!-- Stat 1 -->
                    <div class="text-center stat-item">
                        <div class="text-5xl md:text-6xl font-bold text-white mb-4" x-data="{ count: 0 }"
                             x-init="setTimeout(() => { let target = 10000; let increment = target / 50; let timer = setInterval(() => { count = Math.min(count + increment, target); if(count >= target) clearInterval(timer); }, 20) }, 500)">
                            <span x-text="Math.floor(count).toLocaleString()"></span>+
                        </div>
                        <p class="text-orange-100 text-lg font-semibold">Apprenants satisfaits</p>
                    </div>

                    <!-- Stat 2 -->
                    <div class="text-center stat-item">
                        <div class="text-5xl md:text-6xl font-bold text-white mb-4">98%</div>
                        <p class="text-orange-100 text-lg font-semibold">Taux de réussite</p>
                    </div>

                    <!-- Stat 3 -->
                    <div class="text-center stat-item">
                        <div class="text-5xl md:text-6xl font-bold text-white mb-4">200+</div>
                        <p class="text-orange-100 text-lg font-semibold">Experts formateurs</p>
                    </div>

                    <!-- Stat 4 -->
                    <div class="text-center stat-item">
                        <div class="text-5xl md:text-6xl font-bold text-white mb-4">24/7</div>
                        <p class="text-orange-100 text-lg font-semibold">Support disponible</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section À propos -->
    <section id="about" class="py-20 bg-gradient-to-b from-white to-orange-50 dark:from-gray-900 dark:to-gray-800">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Image -->
                <div class="relative">
                    <div class="relative z-10 rounded-2xl overflow-hidden shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                             alt="Équipe CFPC-Learning" class="w-full h-auto">
                    </div>
                    <div class="absolute -bottom-6 -right-6 w-64 h-64 bg-gradient-to-br from-red-500 to-orange-500 rounded-2xl -z-10"></div>
                </div>

                <!-- Contenu -->
                <div>
                    <span class="inline-block px-4 py-2 bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 rounded-full font-semibold mb-4">
                        À propos de nous
                    </span>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                        Votre succès est <span class="text-red-600 dark:text-orange-400">notre mission</span>
                    </h2>
                    <p class="text-lg text-gray-600 dark:text-gray-400 mb-6">
                        CFPC-Learning est une plateforme d'apprentissage en ligne innovante, conçue pour offrir une expérience éducative exceptionnelle à tous, quel que soit leur niveau ou leur emploi du temps.
                    </p>
                    <div class="space-y-4 mb-8">
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 text-xl mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-bold text-gray-900 dark:text-white">Pédagogie innovante</h4>
                                <p class="text-gray-600 dark:text-gray-400">Méthodes d'apprentissage éprouvées et modernes</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 text-xl mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-bold text-gray-900 dark:text-white">Contenu de qualité</h4>
                                <p class="text-gray-600 dark:text-gray-400">Cours créés par des experts du secteur</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 text-xl mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-bold text-gray-900 dark:text-white">Accompagnement continu</h4>
                                <p class="text-gray-600 dark:text-gray-400">Support et suivi tout au long de votre parcours</p>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('register') }}"
                       class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-red-500 to-orange-500 text-white font-semibold rounded-xl hover:from-red-600 hover:to-orange-600 transition-all duration-300 shadow-lg hover:shadow-xl">
                        <span>Rejoindre la communauté</span>
                        <i class="fas fa-arrow-right ml-3"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Témoignages -->
    <section id="testimonials" class="py-20 bg-gradient-to-b from-gray-50 to-white dark:from-gray-800 dark:to-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                    Ils nous <span class="text-red-600 dark:text-orange-400">font confiance</span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                    Découvrez ce que disent nos apprenants et formateurs
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Témoignage 1 -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl hover-lift">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 rounded-full bg-gradient-to-br from-red-500 to-orange-500 flex items-center justify-center text-white font-bold text-xl mr-4">
                            MS
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 dark:text-white">Marie Sanchez</h4>
                            <p class="text-gray-600 dark:text-gray-400">Développeuse Full-Stack</p>
                        </div>
                    </div>
                    <div class="flex text-yellow-500 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-600 dark:text-gray-400 italic">
                        "CFPC-Learning a transformé ma carrière. Les cours sont clairs, les projets concrets et le support exceptionnel. J'ai doublé mon salaire en 6 mois !"
                    </p>
                </div>

                <!-- Témoignage 2 -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl hover-lift">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 rounded-full bg-gradient-to-br from-blue-500 to-cyan-500 flex items-center justify-center text-white font-bold text-xl mr-4">
                            PD
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 dark:text-white">Pierre Dubois</h4>
                            <p class="text-gray-600 dark:text-gray-400">Designer UX/UI</p>
                        </div>
                    </div>
                    <div class="flex text-yellow-500 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="text-gray-600 dark:text-gray-400 italic">
                        "La qualité des cours et la flexibilité d'apprentissage sont incomparables. Je recommande vivement cette plateforme à tous les passionnés de design."
                    </p>
                </div>

                <!-- Témoignage 3 -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl hover-lift">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 rounded-full bg-gradient-to-br from-green-500 to-emerald-500 flex items-center justify-center text-white font-bold text-xl mr-4">
                            SL
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 dark:text-white">Sophie Lambert</h4>
                            <p class="text-gray-600 dark:text-gray-400">Formatrice Marketing</p>
                        </div>
                    </div>
                    <div class="flex text-yellow-500 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-600 dark:text-gray-400 italic">
                        "En tant que formatrice, je trouve la plateforme exceptionnelle. Les outils pédagogiques sont complets et l'engagement des apprenants est remarquable."
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Contact -->
    <section id="contact" class="py-20 bg-gradient-to-b from-white to-blue-50 dark:from-gray-900 dark:to-gray-800">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                        Contactez-<span class="text-red-600 dark:text-orange-400">nous</span>
                    </h2>
                    <p class="text-xl text-gray-600 dark:text-gray-400">
                        Une question ? Un projet ? Notre équipe est là pour vous aider.
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                    <!-- Info contact 1 -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 text-center hover-lift">
                        <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-orange-500 rounded-xl flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-phone-alt text-2xl text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Téléphone</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-2">+33 1 23 45 67 89</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Lun-Ven, 9h-18h</p>
                    </div>

                    <!-- Info contact 2 -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 text-center hover-lift">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-envelope text-2xl text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Email</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-2">contact@cfpc-learning.fr</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Réponse sous 24h</p>
                    </div>

                    <!-- Info contact 3 -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 text-center hover-lift">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-map-marker-alt text-2xl text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Adresse</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-2">123 Avenue de l'Éducation</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">75000 Paris, France</p>
                    </div>
                </div>

                <!-- Formulaire de contact -->
                <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-2xl p-8 md:p-12">
                    <form action="#" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">
                                    <i class="fas fa-user mr-2"></i>Nom complet
                                </label>
                                <input type="text" id="name" name="name"
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 dark:focus:ring-orange-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-200 transition-colors duration-300"
                                    required>
                            </div>
                            <div>
                                <label for="email" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">
                                    <i class="fas fa-envelope mr-2"></i>Adresse email
                                </label>
                                <input type="email" id="email" name="email"
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 dark:focus:ring-orange-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-200 transition-colors duration-300"
                                    required>
                            </div>
                        </div>
                        <div>
                            <label for="subject" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">
                                <i class="fas fa-tag mr-2"></i>Sujet
                            </label>
                            <input type="text" id="subject" name="subject"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 dark:focus:ring-orange-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-200 transition-colors duration-300"
                                required>
                        </div>
                        <div>
                            <label for="message" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">
                                <i class="fas fa-comment-alt mr-2"></i>Message
                            </label>
                            <textarea id="message" name="message" rows="6"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 dark:focus:ring-orange-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-200 transition-colors duration-300 resize-none"
                                required></textarea>
                        </div>
                        <button type="submit"
                            class="w-full px-8 py-4 bg-gradient-to-r from-red-500 to-orange-500 text-white font-semibold rounded-xl hover:from-red-600 hover:to-orange-600 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                            <i class="fas fa-paper-plane mr-2"></i>Envoyer le message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Section CTA Finale -->
    <section class="py-20 bg-gradient-to-br from-red-600 to-orange-500">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                Prêt à transformer votre carrière ?
            </h2>
            <p class="text-xl text-orange-100 mb-10 max-w-2xl mx-auto">
                Rejoignez plus de 10,000 apprenants qui ont déjà commencé leur parcours d'apprentissage avec CFPC-Learning.
            </p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                <a href="{{ route('register') }}"
                   class="px-10 py-5 bg-white text-red-600 font-bold rounded-2xl hover:bg-orange-50 transition-all duration-300 shadow-2xl hover:shadow-3xl transform hover:-translate-y-1 inline-flex items-center justify-center">
                    <i class="fas fa-rocket text-2xl mr-3"></i>
                    <span class="text-lg">Commencer gratuitement</span>
                </a>
                <a href="#cours"
                   class="px-10 py-5 bg-transparent border-2 border-white text-white font-bold rounded-2xl hover:bg-white/10 transition-all duration-300 inline-flex items-center justify-center">
                    <i class="fas fa-eye text-2xl mr-3"></i>
                    <span class="text-lg">Découvrir les cours</span>
                </a>
            </div>
            <p class="mt-8 text-orange-200">
                <i class="fas fa-shield-alt mr-2"></i>Sans engagement • 14 jours d'essai gratuit • Support 24/7
            </p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-16 pb-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 mb-12">
                <!-- Logo et description -->
                <div class="lg:col-span-2">
                    <a href="/" class="flex items-center mb-6">
                        <img src="/img/logo1.jpg" alt="CFPC-Learning" class="h-12 w-16 rounded-lg mr-4">
                        <span class="text-2xl font-bold">CFPC-Learning</span>
                    </a>
                    <p class="text-gray-400 mb-6 max-w-md">
                        Plateforme d'apprentissage en ligne dédiée à votre réussite. Cours interactifs, certifications reconnues et accompagnement personnalisé.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-red-600 transition-colors duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-red-600 transition-colors duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-red-600 transition-colors duration-300">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-red-600 transition-colors duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>

                <!-- Liens rapides -->
                <div>
                    <h3 class="text-xl font-bold mb-6">Liens rapides</h3>
                    <ul class="space-y-3">
                        <li><a href="/" class="text-gray-400 hover:text-red-400 transition-colors duration-300">Accueil</a></li>
                        <li><a href="#cours" class="text-gray-400 hover:text-red-400 transition-colors duration-300">Nos cours</a></li>
                        <li><a href="#about" class="text-gray-400 hover:text-red-400 transition-colors duration-300">À propos</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-red-400 transition-colors duration-300">Contact</a></li>
                    </ul>
                </div>

                <!-- Catégories -->
                <div>
                    <h3 class="text-xl font-bold mb-6">Catégories</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-red-400 transition-colors duration-300">Développement Web</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-red-400 transition-colors duration-300">Design UX/UI</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-red-400 transition-colors duration-300">Marketing Digital</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-red-400 transition-colors duration-300">Data Science</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="text-xl font-bold mb-6">Contact</h3>
                    <ul class="space-y-3">
                        <li class="flex items-center text-gray-400">
                            <i class="fas fa-map-marker-alt mr-3 text-red-400"></i>
                            <span>123 Avenue de l'Éducation, Paris</span>
                        </li>
                        <li class="flex items-center text-gray-400">
                            <i class="fas fa-phone mr-3 text-red-400"></i>
                            <span>+33 1 23 45 67 89</span>
                        </li>
                        <li class="flex items-center text-gray-400">
                            <i class="fas fa-envelope mr-3 text-red-400"></i>
                            <span>contact@cfpc-learning.fr</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Barre inférieure -->
            <div class="pt-8 border-t border-gray-800">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 mb-4 md:mb-0">
                        © {{ date('Y') }} CFPC-Learning. Tous droits réservés.
                    </p>
                    <div class="flex space-x-6">
                        <a href="#privacy" class="text-gray-400 hover:text-red-400 transition-colors duration-300">
                            Politique de confidentialité
                        </a>
                        <a href="#terms" class="text-gray-400 hover:text-red-400 transition-colors duration-300">
                            Conditions d'utilisation
                        </a>
                        <a href="#cookies" class="text-gray-400 hover:text-red-400 transition-colors duration-300">
                            Cookies
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bouton retour en haut -->
    <button x-data="{ show: false }"
            @scroll.window="show = window.scrollY > 500"
            @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
            x-show="show"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-y-4"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform translate-y-4"
            class="fixed bottom-8 right-8 w-12 h-12 bg-gradient-to-br from-red-500 to-orange-500 text-white rounded-full shadow-2xl hover:shadow-3xl transition-all duration-300 z-40 hover:scale-110">
        <i class="fas fa-chevron-up"></i>
    </button>

    <script>
        // Initialisation des animations au scroll
        document.addEventListener('DOMContentLoaded', function() {
            // Animation des éléments au défilement
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fade-in-up');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            // Observer les éléments avec la classe .animate-on-scroll
            document.querySelectorAll('.scroll-reveal, .stat-card, .course-card, .hover-lift').forEach(el => {
                observer.observe(el);
            });

            // Animation des compteurs
            const counters = document.querySelectorAll('[x-data*="count"]');
            counters.forEach(counter => {
                const target = parseInt(counter.textContent);
                const speed = 200; // Plus rapide
                const updateCount = () => {
                    const count = +counter.innerText;
                    const increment = target / speed;

                    if (count < target) {
                        counter.innerText = Math.ceil(count + increment).toLocaleString();
                        setTimeout(updateCount, 1);
                    } else {
                        counter.innerText = target.toLocaleString();
                    }
                };
                updateCount();
            });
        });
    </script>
</body>

</html>
