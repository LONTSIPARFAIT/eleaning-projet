@extends('layouts.admin')

@section('title', 'Tableau de Bord de l\'Étudiant')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 bg-gradient-to-br from-blue-50 to-orange-100" x-data="{ openCourse: null }">
    <!-- Bloc Étudiant : Lien pour s'abonner à un cours -->
    <div class="bg-orange-50 shadow-lg rounded-xl p-6 mb-6 border border-blue-200 scroll-reveal flex justify-between items-center">
        <h4 class="text-blue-900 text-2xl font-bold">Étudiant</h4>
        <a href="{{ route('cours.index') }}" class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-lg shadow-md transition duration-300 ease-in-out">
            S’abonner à un cours
        </a>
    </div>


    <!-- Section Cours -->
    <section class="mt-6 scroll-reveal">
        <h2 class="text-xl sm:text-2xl font-semibold mb-4 text-blue-800 animate-fade-in">Mes Cours</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
            @if($studentCourses->isEmpty())
                <p class="mt-4 text-gray-600 animate-fade-in bg-white rounded-lg p-4 shadow-md">Vous n'êtes abonné à aucun cours.</p>
            @else
                @foreach ($studentCourses as $course)
                    <div
                        class="bg-orange-50 shadow-lg rounded-xl p-4 sm:p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl animate-slide-in-up border border-blue-200"
                        x-on:mouseover="openCourse = {{ $course->id }}"
                        x-on:mouseleave="openCourse = null"
                    >
                        <h3 class="font-bold text-lg text-blue-900">{{ $course->title }}</h3>
                        <p class="text-gray-700 mt-2 line-clamp-2">{{ $course->description }}</p>
                        <div class="mt-3 space-y-2">
                            <p class="text-sm text-gray-600">Durée : {{ $course->duration }} minutes</p>
                            <p class="text-sm text-gray-600">Prix : {{ $course->price }} €</p>
                        </div>
                        <a
                            href="{{ route('course.show', $course->id) }}"
                            class="mt-4 inline-block bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg transition-all duration-300 hover:shadow-lg"
                        >
                            Voir le Cours
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </section>

    <!-- Section Devoirs -->
    <section class="mt-8 scroll-reveal">
        <h2 class="text-xl sm:text-2xl font-semibold mb-4 text-blue-800 animate-fade-in">Devoirs à Rendre</h2>
        <div class="bg-orange-50 shadow-lg rounded-xl p-4 sm:p-6 animate-slide-in-up border border-blue-200">
            {{-- @if($assignments->isEmpty()) --}}
                {{-- <p class="mt-4 text-gray-500">Aucun devoir à rendre pour le moment.</p> --}}
            {{-- @else --}}
                <ul class="space-y-3">
                    {{-- @foreach ($assignments as $assignment) --}}
                        <li class="border-b border-red-300 py-2 flex flex-col sm:flex-row sm:items-center sm:justify-between transition-all duration-300 hover:bg-red-100">
                            <strong class="text-blue-900">{{ $studentAssignments->title ?? 'Devoir Exemple' }}</strong>
                            <span class="text-sm text-gray-600 mt-1 sm:mt-0">
                                {{-- Échéance : {{ $studentAssignments->due_date->format('d/m/Y') ?? '12-06-2023' }} --}}
                                Échéance : {{  '12-06-2023' }}
                            </span>
                        </li>
                    {{-- @endforeach --}}
                </ul>
            {{-- @endif --}}
        </div>
    </section>

    <!-- Section Ressources -->
    <section class="mt-8 scroll-reveal">
        <h2 class="text-xl sm:text-2xl font-semibold mb-4 text-blue-800 animate-fade-in">Mes Ressources Pédagogiques</h2>
        <div class="bg-orange-50 shadow-lg rounded-xl p-4 sm:p-6 animate-slide-in-up border border-blue-200">
            <ul class="space-y-3">
                {{-- @foreach ($resources as $resource) --}}
                    <li class="border-b border-red-300 py-2 transition-all duration-300 hover:bg-red-100">
                        <a
                            href=""
                            class="text-red-500 hover:text-red-600 hover:underline transition-colors duration-200"
                        >
                            {{-- {{ $resource->title }} --}} Ressource Exemple
                        </a>
                    </li>
                {{-- @endforeach --}}
            </ul>
        </div>
    </section>

    <!-- Section Calendrier -->
    <section class="mt-8 scroll-reveal">
        <h2 class="text-xl sm:text-2xl font-semibold mb-4 text-blue-800 animate-fade-in">Calendrier Scolaire</h2>
        <div class="bg-orange-50 shadow-lg rounded-xl p-4 sm:p-6 animate-slide-in-up border border-blue-200">
            {{-- <a
                href="{{ route('calendar') }}"
                class="text-teal-600 hover:text-teal-800 hover:underline transition-colors duration-200"
            > --}}
            <a
                href=""
                class="text-red-500 hover:text-red-600 hover:underline transition-colors duration-200"
            >
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