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

  <!-- Navbar fixée en haut -->
  <nav class="fixed top-0 left-0 right-0 bg-gradient-to-r from-red-500 to-red-700 p-6 shadow-lg z-50">
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
  <div class="relative pt-24 my-20 mx-auto max-w-7xl bg-center bg-cover" style="background-image: url('img/home1.jpg'); min-height: 80vh; height: 60vh;">
    <div class="absolute inset-0 bg-slate-100 opacity-10 rounded-lg"></div>
    <div class="relative flex flex-col justify-center items-start h-full text-left px-8">
        <h1 class="relative text-4xl md:text-6xl font-bold text-white mb-6"
        x-data="{
          fullText: 'Bienvenue sur Perfect-Learning',
          displayed: '',
          async animate() {
            while (true) {
              // Affichage lettre par lettre
              for (let i = 1; i <= this.fullText.length; i++) {
                this.displayed = this.fullText.slice(0, i);
                await new Promise(resolve => setTimeout(resolve, 100));
              }
              await new Promise(resolve => setTimeout(resolve, 1000));

              // Effacement lettre par lettre
              for (let i = this.fullText.length; i >= 0; i--) {
                this.displayed = this.fullText.slice(0, i);
                await new Promise(resolve => setTimeout(resolve, 100));
              }
              await new Promise(resolve => setTimeout(resolve, 1500));
            }
          }
        }"
        x-init="animate()">

      <!-- Élément invisible servant à fixer la hauteur -->
      <span class="opacity-0">Bienvenue sur Perfect-Learning</span>

      <!-- Texte animé positionné en absolu pour éviter le reflow -->
      <span class="absolute top-0 left-0" x-text="displayed"></span>
    </h1>
      <p class="mt-4 text-lg md:text-xl text-gray-200 max-w-2xl">
        Découvrez nos cours et apprenez à votre rythme avec des ressources adaptées à tous les niveaux. Rejoignez notre communauté d'apprenants dès aujourd'hui !
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

  <!-- Section des cours -->
  <section id="cours" class="py-12 mx-auto max-w-7xl">
    <h2 class="text-center text-3xl font-bold text-gray-800 mb-8">Nos Cours Disponibles</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      @foreach ($cours->take(4) as $cour)
        <div class="bg-white shadow-lg rounded-lg p-6 hover:scale-105 transition transform hover:shadow-2xl">
          <h3 class="text-2xl font-semibold text-red-600">{{ $cour->title }}</h3>
          <p class="mt-2 text-gray-700">{{ $cour->description }}</p>
          <p class="mt-2 text-gray-600">Durée : {{ $cour->duration }} minutes</p>
          <p class="mt-2 text-gray-600">Prix : {{ $cour->price }} €</p>
          <form action="{{ route('cours.subscribe', $cour->id) }}" method="POST">
            @csrf
            <button type="submit" class="mt-4 bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded transition transform hover:-translate-y-1 duration-300">
              S'abonner
            </button>
          </form>
        </div>
      @endforeach
    </div>
    <div class="mt-8">
      {{ $cours->links() }}
    </div>
  </section>

  <!-- Section Fonctionnalités -->
  <section id="features" class="py-12 mx-auto max-w-7xl">
    <h2 class="text-center text-3xl font-bold text-gray-800 mb-8">Fonctionnalités Principales</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <div class="bg-gray-50 shadow-lg rounded-lg p-6 hover:shadow-2xl transition transform hover:-translate-y-1 duration-300">
        <h3 class="text-xl font-semibold text-red-600">Accessible 24/7</h3>
        <p class="mt-2 text-gray-700">Accédez à vos cours à tout moment, où que vous soyez.</p>
      </div>
      <div class="bg-gray-50 shadow-lg rounded-lg p-6 hover:shadow-2xl transition transform hover:-translate-y-1 duration-300">
        <h3 class="text-xl font-semibold text-red-600">Interactivité</h3>
        <p class="mt-2 text-gray-700">Participez à des forums et des discussions avec d'autres étudiants.</p>
      </div>
      <div class="bg-gray-50 shadow-lg rounded-lg p-6 hover:shadow-2xl transition transform hover:-translate-y-1 duration-300">
        <h3 class="text-xl font-semibold text-red-600">Certificats</h3>
        <p class="mt-2 text-gray-700">Recevez des certificats à la fin de chaque cours pour valoriser vos compétences.</p>
      </div>
    </div>
  </section>

  <!-- Section Témoignages -->
  <section id="testimonials" class="py-12 mx-auto max-w-7xl">
    <h2 class="text-center text-3xl font-bold text-gray-800 mb-8">Ce que disent nos utilisateurs</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-2xl transition transform hover:-translate-y-1 duration-300">
        <p class="italic text-gray-700">"Une expérience d'apprentissage incroyable !"</p>
        <p class="mt-4 font-semibold text-red-600">- Étudiant 1</p>
      </div>
      <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-2xl transition transform hover:-translate-y-1 duration-300">
        <p class="italic text-gray-700">"Les cours sont très bien structurés."</p>
        <p class="mt-4 font-semibold text-red-600">- Étudiant 2</p>
      </div>
      <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-2xl transition transform hover:-translate-y-1 duration-300">
        <p class="italic text-gray-700">"J'ai beaucoup appris grâce à cette plateforme."</p>
        <p class="mt-4 font-semibold text-red-600">- Étudiant 3</p>
      </div>
    </div>
  </section>

  <!-- Section Appel à l'Action -->
  <section class="py-16 bg-gray-100 text-center mx-auto max-w-7xl">
    <h2 class="text-3xl font-bold text-gray-800">Prêt à commencer votre apprentissage ?</h2>
    <p class="mt-4 text-lg text-gray-600">Rejoignez notre communauté d'apprenants dès aujourd'hui.</p>
    <a href="{{ route('register') }}" class="mt-6 inline-block bg-red-600 hover:bg-red-800 text-white font-semibold py-3 px-8 rounded shadow transition transform hover:-translate-y-1 duration-300">
      S'inscrire Maintenant
    </a>
  </section>

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
