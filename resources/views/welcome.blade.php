<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-learning App</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

  <!-- Alpine.js CDN -->
  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-100 dark:bg-gray-900 px-4">

  <!-- Navbar avec gestion de visibilité via Alpine.js -->
  <nav x-data="{ visible: false }" 
       x-init="visible = window.scrollY > 0" 
       x-show="visible" 
       x-cloak
       @scroll.window="visible = window.scrollY > 0"
       class="fixed top-0 left-0 right-0 bg-gradient-to-r from-red-500 to-red-700 p-6 shadow-lg z-50 transition duration-300 transform"
       :class="{ 'translate-y-0': visible, '-translate-y-full': !visible }">
    <div class="container mx-auto flex justify-between items-center px-4">
      <a href="#" class="transition transform hover:scale-105">
        <img src="/img/logo-cfpc.jpg" alt="Logo-Elearning App" class="h-16 w-24 rounded shadow-md">
      </a>
      <div class="hidden md:flex space-x-8 text-xl">
        <a href="#home" class="text-white border-b-2 border-transparent hover:border-white transition duration-300">Accueil</a>
        <a href="#cours" class="text-white border-b-2 border-transparent hover:border-white transition duration-300">Cours</a>
        <a href="#about" class="text-white border-b-2 border-transparent hover:border-white transition duration-300">À propos</a>
      </div>
      <div class="flex items-center space-x-4">
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
            <a href="{{ route('login') }}" class="font-semibold bg-white text-red-600 py-2 px-4 rounded border border-red-600 hover:bg-gray-200 transition duration-300">Connexion</a>
            @if (Route::has('register'))
              <a href="{{ route('register') }}" class="font-semibold bg-white text-red-600 py-2 px-4 rounded border border-red-600 hover:bg-gray-200 transition duration-300">Inscription</a>
            @endif
          @endauth
        @endif
      </div>
    </div>
  </nav>

  <!-- Section Héros : texte aligné à gauche et animation Alpine.js -->
  <div class="relative h-screen mx-auto max-w-7xl bg-center bg-cover" style="background-image: url('img/home1.jpg');">
    <div class="absolute inset-0 bg-slate-100 opacity-10 rounded-lg"></div>
    <div class="relative flex flex-col justify-center items-start h-full text-left px-8">
      <h1 class="relative text-4xl md:text-6xl font-bold text-white mb-6"
        x-data="{
          texts: ['Bienvenue sur Perfect-Learning', 'Apprenez, progressez, réussissez !'],
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
      <p class="mt-4 text-lg md:text-xl text-gray-200 max-w-2xl">
        Découvrez nos cours et apprenez à votre rythme avec des ressources adaptées à tous les niveaux. Rejoignez notre communauté d'apprenants dès aujourd'hui !
      </p>
      <div class="mt-8 flex flex-col sm:flex-row gap-4">
        <a href="#courses" class="inline-block bg-red-600 hover:bg-red-800 text-white font-semibold py-3 px-8 rounded shadow transition transform hover:-translate-y-1 duration-300">
          Voir les Cours
        </a>
        <a href="#about" class="inline-block bg-white text-red-600 font-semibold py-3 px-8 rounded border border-red-600 hover:bg-gray-100 transition transform hover:-translate-y-1 duration-300">
          À propos
        </a>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-gradient-to-r from-red-500 to-red-700 text-white p-6 text-center">
    <p>&copy; 2024 Perfect-Learning - Tous droits réservés</p>
    <div class="mt-2">
      <a href="#privacy" class="hover:underline">Politique de confidentialité</a> |
      <a href="#terms" class="hover:underline">Conditions d'utilisation</a>
    </div>
  </footer>
</body>
</html>
