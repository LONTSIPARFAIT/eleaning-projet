@extends('layouts.admin')

@section('title', 'Tableau de Bord de l\'Étudiant')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 bg-gradient-to-br from-blue-50 to-orange-100 dark:bg-gradient-to-br dark:from-gray-900 dark:to-gray-800" x-data="{ openCourse: null }">
    
    <!-- Header avec animation d'entrée -->
    <div class="animate-slide-in-down bg-white dark:bg-gray-800 rounded-lg shadow-xl p-6 mb-6 border-l-4 border-red-500 dark:border-orange-500 scroll-reveal">
        <h1 class="text-2xl sm:text-3xl font-bold mb-4 text-blue-900 dark:text-orange-400 flex items-center gap-2">
            <svg class="w-8 h-8 text-red-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
            Tableau de Bord de le
        </h1>
        <p class="text-lg sm:text-xl text-blue-700 dark:text-gray-300">
            Bienvenue,
            <span class="font-bold text-orange-600 dark:text-orange-400">{{ Auth::user()->name ?? 'Étudiant' }}</span> !
            Voici vos cours et ressources.
        </p>
    </div>

    <!-- Bloc Étudiant : Lien pour s'abonner à un cours -->
    <div class="bg-orange-50 dark:bg-gray-800 shadow-lg rounded-xl p-6 mb-6 border border-blue-200 dark:border-orange-600 scroll-reveal flex justify-between items-center">
        <h4 class="text-blue-900 dark:text-orange-400 text-2xl font-bold flex items-center gap-2">
            <svg class="w-6 h-6 text-red-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            Étudiant
        </h4>
        <a href="{{ route('cours.index') }}" class="bg-red-500 hover:bg-red-600 dark:bg-orange-500 dark:hover:bg-orange-600 text-white px-6 py-2 rounded-lg shadow-md transition duration-300 ease-in-out flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            S’abonner à un cours
        </a>
    </div>

    <!-- Section Cours -->
    <section class="mt-6 scroll-reveal">
        <h2 class="text-xl sm:text-2xl font-semibold mb-4 text-blue-800 dark:text-orange-400 animate-fade-in flex items-center gap-2">
            <svg class="w-6 h-6 text-red-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            Mes Cours
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
            @if($studentCourses->isEmpty())
                <p class="mt-4 text-gray-600 dark:text-gray-300 animate-fade-in bg-white dark:bg-gray-800 rounded-lg p-4 shadow-md">Vous n'êtes abonné à aucun cours.</p>
            @else
                @foreach ($studentCourses as $course)
                    <div
                        class="bg-orange-50 dark:bg-gray-700 shadow-lg rounded-xl p-4 sm:p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl animate-slide-in-up border border-blue-200 dark:border-orange-600"
                        x-on:mouseover="openCourse = {{ $course->id }}"
                        x-on:mouseleave="openCourse = null"
                    >
                        <h3 class="font-bold text-lg text-blue-900 dark:text-orange-400">{{ $course->title }}</h3>
                        <p class="text-gray-700 dark:text-gray-300 mt-2 line-clamp-2">{{ $course->description }}</p>
                        <div class="mt-3 space-y-2">
                            <p class="text-sm text-gray-600 dark:text-gray-300">Durée : {{ $course->duration }} minutes</p>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Prix : {{ $course->price }} €</p>
                        </div>
                        <a
                            href="{{-- {{ route('course.show', $course->id) }} --}}"
                            class="mt-4 inline-block bg-red-500 hover:bg-red-600 dark:bg-orange-500 dark:hover:bg-orange-600 text-white font-semibold py-2 px-4 rounded-lg transition-all duration-300 hover:shadow-lg flex items-center gap-2"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M19 12a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            Voir le Cours
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </section>

    <!-- Section Devoirs -->
    <section class="mt-8 scroll-reveal">
        <h2 class="text-xl sm:text-2xl font-semibold mb-4 text-blue-800 dark:text-orange-400 animate-fade-in flex items-center gap-2">
            <svg class="w-6 h-6 text-red-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            Devoirs à Rendre
        </h2>
        <div class="bg-orange-50 dark:bg-gray-700 shadow-lg rounded-xl p-4 sm:p-6 animate-slide-in-up border border-blue-200 dark:border-orange-600">
            {{-- @if($assignments->isEmpty()) --}}
                {{-- <p class="mt-4 text-gray-500 dark:text-gray-300">Aucun devoir à rendre pour le moment.</p> --}}
            {{-- @else --}}
                <ul class="space-y-3">
                    {{-- @foreach ($assignments as $assignment) --}}
                        <li class="border-b border-red-300 dark:border-orange-600 py-2 flex flex-col sm:flex-row sm:items-center sm:justify-between transition-all duration-300 hover:bg-red-100 dark:hover:bg-gray-600">
                            <strong class="text-blue-900 dark:text-orange-400">{{ $studentAssignments->title ?? 'Devoir Exemple' }}</strong>
                            <span class="text-sm text-gray-600 dark:text-gray-300 mt-1 sm:mt-0">
                                {{-- Échéance : {{ $studentAssignments->due_date->format('d/m/Y') ?? '12-06-2023' }} --}}
                                Échéance : {{ '12-06-2023' }}
                            </span>
                        </li>
                    {{-- @endforeach --}}
                </ul>
            {{-- @endif --}}
        </div>
    </section>

    <!-- Section Ressources -->
    <section class="mt-8 scroll-reveal">
        <h2 class="text-xl sm:text-2xl font-semibold mb-4 text-blue-800 dark:text-orange-400 animate-fade-in flex items-center gap-2">
            <svg class="w-6 h-6 text-red-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0v-6m0 6h-3m3 0h3M4 6h16M4 6a2 2 0 012-2h12a2 2 0 012 2M4 6v12a2 2 0 002 2h12a2 2 0 002-2V6"></path></svg>
            Mes Ressources Pédagogiques
        </h2>
        <div class="bg-orange-50 dark:bg-gray-700 shadow-lg rounded-xl p-4 sm:p-6 animate-slide-in-up border border-blue-200 dark:border-orange-600">
            <ul class="space-y-3">
                {{-- @foreach ($resources as $resource) --}}
                    <li class="border-b border-red-300 dark:border-orange-600 py-2 transition-all duration-300 hover:bg-red-100 dark:hover:bg-gray-600">
                        <a
                            href=""
                            class="text-red-500 dark:text-orange-500 hover:text-red-600 dark:hover:text-orange-600 hover:underline transition-colors duration-200 flex items-center gap-2"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            {{-- {{ $resource->title }} --}} Ressource Exemple
                        </a>
                    </li>
                {{-- @endforeach --}}
            </ul>
        </div>
    </section>

    <!-- Section Calendrier -->
    <section class="mt-8 scroll-reveal">
        <h2 class="text-xl sm:text-2xl font-semibold mb-4 text-blue-800 dark:text-orange-400 animate-fade-in flex items-center gap-2">
            <svg class="w-6 h-6 text-red-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            Calendrier Scolaire
        </h2>
        <div class="bg-orange-50 dark:bg-gray-700 shadow-lg rounded-xl p-4 sm:p-6 animate-slide-in-up border border-blue-200 dark:border-orange-600">
            <a
                href="{{-- {{ route('calendar') }} --}}"
                class="text-red-500 dark:text-orange-500 hover:text-red-600 dark:hover:text-orange-600 hover:underline transition-colors duration-200 flex items-center gap-2"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M19 12a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                Voir le Calendrier Scolaire
            </a>
        </div>
    </section>
</div>

<!-- Inclusion d'Alpine.js -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<style>
    /* Animations personnalisées avec Tailwind */
    @keyframes slideInDown {
        from { opacity: 0; transform: translateY(-30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes slideInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeInUp {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    .scroll-reveal {
        opacity: 0;
        transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    }
    .scroll-reveal.visible {
        animation: fadeInUp 0.6s ease-out forwards;
    }
    .animate-slide-in-down {
        animation: slideInDown 0.6s ease-out;
    }
    .animate-slide-in-up {
        animation: slideInUp 0.6s ease-out;
    }
    .animate-fade-in {
        animation: slideInUp 0.8s ease-out;
    }
</style>

<script>
    // Animation au scroll avec répétition (comme pour l'admin)
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
        }, { threshold: 0.2 });

        elements.forEach(element => observer.observe(element));
    });
</script>
@endsection