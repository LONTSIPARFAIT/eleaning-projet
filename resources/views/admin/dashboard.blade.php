<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

  <!-- Styles & Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-white">
  <div class="min-h-screen">
    
    <!-- (Optionnel) En-tête secondaire -->
    @if (isset($header))
      <header class="bg-white border-b border-red-600 shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
          {{ $header }}
        </div>
      </header>
    @endif

    <!-- Contenu Principal : Sidebar et zone de contenu -->
    <main class="py-6">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row">
        
        <!-- Sidebar de Navigation -->
        <aside class="w-full md:w-1/4 p-4" x-data="{ open: false }">
          <div class="bg-white shadow rounded-lg p-6 border border-red-600">
            <div class="flex items-center justify-between">
              <div class="flex items-center">
                <!-- Logo -->
                <a href="{{ route('welcome') }}">
                  <x-application-logo class="block h-9 w-auto fill-current text-red-600" />
                </a>
                <span class="ml-2 text-xl font-bold text-red-600">Navigation</span>
              </div>
              <!-- Bouton Toggle pour mobile -->
              <button @click="open = !open" class="md:hidden text-red-600 focus:outline-none">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                  <!-- Icône hamburger (affiché quand le menu est fermé) -->
                  <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                  <!-- Icône croix (affiché quand le menu est ouvert) -->
                  <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>

            <!-- Liens de Navigation et Dropdown (visible par défaut sur md, repliable sur mobile) -->
            <div :class="{'block': open, 'hidden': !open}" class="mt-4 md:block">
              <div class="flex flex-col space-y-4 text-red-600">
                @if (Route::has('login'))
                  @auth
                    @if (auth()->user()->role === 'student')
                      <x-nav-link :href="route('student.dashboard')" :active="request()->routeIs('student.dashboard')">
                        {{ __('Dashboard Étudiant') }}
                      </x-nav-link>
                    @elseif (auth()->user()->role === 'teacher')
                      <x-nav-link :href="route('teacher.dashboard')" :active="request()->routeIs('teacher.dashboard')">
                        {{ __('Dashboard Enseignant') }}
                      </x-nav-link>
                    @elseif (auth()->user()->role === 'admin')
                      <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard Admin') }}
                      </x-nav-link>
                    @else
                      <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Dashboard') }}
                      </x-nav-link>
                    @endif
                  @else
                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                      {{ __('Connexion') }}
                    </x-nav-link>
                    @if (Route::has('register'))
                      <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                        {{ __('Inscription') }}
                      </x-nav-link>
                    @endif
                  @endauth
                @endif
              </div>

              <!-- Dropdown Réglages / Profil -->
              <div class="mt-6">
                <x-dropdown align="right" width="48">
                  <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md 
                          text-red-600 bg-white hover:bg-red-600 hover:text-white focus:outline-none transition ease-in-out duration-150">
                      @if (Auth::user()->profile_photo)
                        <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Photo de Profil" class="h-10 w-10 rounded-full mr-2">
                      @else
                        <svg class="h-10 w-10 rounded-full mr-2 text-red-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 14.5c-3.5 0-6.5-2.5-6.5-6s3-6 6.5-6 6.5 2.5 6.5 6-3 6-6.5 6zm0 0c3.5 0 6.5 1.5 6.5 4.5v1H5v-1c0-3 3-4.5 6.5-4.5z" />
                        </svg>
                      @endif
                      <div>{{ Auth::user()->name }}</div>
                      <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 9l-7 7-7-7" />
                      </svg>
                    </button>
                  </x-slot>
                  
                  <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                      {{ __('Profile') }}
                    </x-dropdown-link>
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Se Déconnecter') }}
                      </x-dropdown-link>
                    </form>
                  </x-slot>
                </x-dropdown>
              </div>
            </div>
          </div>
        </aside>

        <!-- Zone de contenu principal -->
        <div class="w-full md:w-3/4 p-4">
          <div class="bg-white shadow rounded-lg p-6 border border-red-600">
            {{ $slot }}
          </div>
        </div>
      </div>
    </main>

    <!-- Footer en rouge avec texte blanc -->
    <footer class="bg-red-600 text-white p-6 text-center">
      <p>&copy; 2024 Perfect-coding - Tous droits réservés - 2024</p>
      <div>
        <a href="#privacy" class="text-white hover:underline">Politique de confidentialité</a> |
        <a href="#terms" class="text-white hover:underline">Conditions d'utilisation</a>
      </div>
    </footer>
  </div>
  
  <!-- AlpineJS pour le comportement interactif -->
  <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>
