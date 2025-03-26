@extends('layouts.admin')

@section('title', 'Tableau de Bord de l\'Étudiant')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 bg-gradient-to-br from-gray-50 to-gray-100" x-data="{ openCourse: null }">
    <!-- Header avec animation d'entrée -->
    <div class="animate-fade-in-down">
        <h1 class="text-2xl sm:text-3xl font-bold mb-4 text-indigo-900 drop-shadow-md">Tableau de Bord de l'Étudiant</h1>
        <p class="text-lg sm:text-xl text-indigo-700">
            Bienvenue,
            <span class="font-bold text-teal-500">{{ Auth::user()->name ?? 'Étudiant' }}</span> !
            Voici vos cours et ressources.
        </p>
    </div>

    <!-- Section Cours -->
    <section class="mt-6">
        <h2 class="text-xl sm:text-2xl font-semibold mb-4 text-indigo-800 animate-fade-in">Mes Cours</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
            @if($cours->isEmpty())
                <p class="mt-4 text-gray-500 animate-fade-in">Vous n'êtes abonné à aucun cours.</p>
            @else
                @foreach ($cours as $cour)
                    <div
                        class="bg-white shadow-lg rounded-xl p-4 sm:p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl animate-fade-in-up border border-indigo-100"
                        x-on:mouseover="openCourse = {{ $cour->id }}"
                        x-on:mouseleave="openCourse = null"
                    >
                        <h3 class="font-bold text-lg text-indigo-900">{{ $cour->title }}</h3>
                        <p class="text-gray-600 mt-2 line-clamp-2">{{ $cour->description }}</p>
                        <div class="mt-3 space-y-2">
                            <p class="text-sm text-gray-500">Durée : {{ $cour->duration }} minutes</p>
                            <p class="text-sm text-gray-500">Prix : {{ $cour->price }} €</p>
                        </div>
                        <a
                            href="{{ route('course.show', $cour->id) }}"
                            class="mt-4 inline-block bg-teal-500 hover:bg-teal-600 text-white font-semibold py-2 px-4 rounded-lg transition-all duration-200 hover:shadow-md"
                        >
                            Voir le Cours
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </section>

    <!-- Section Devoirs -->
    <section class="mt-8">
        <h2 class="text-xl sm:text-2xl font-semibold mb-4 text-indigo-800 animate-fade-in">Devoirs à Rendre</h2>
        <div class="bg-white shadow-lg rounded-xl p-4 sm:p-6 animate-fade-in-up border border-indigo-100">
            {{-- @if($assignments->isEmpty()) --}}
                {{-- <p class="mt-4 text-gray-500">Aucun devoir à rendre pour le moment.</p> --}}
            {{-- @else --}}
                <ul class="space-y-3">
                    {{-- @foreach ($assignments as $assignment) --}}
                        <li class="border-b border-indigo-200 py-2 flex flex-col sm:flex-row sm:items-center sm:justify-between transition-all duration-300 hover:bg-indigo-50">
                            {{-- {{ $assignment->title }} --}}
                            <strong class="text-indigo-900">sds</strong>
                            <span class="text-sm text-gray-600 mt-1 sm:mt-0">
                                {{-- Échéance : {{ $assignment->due_date->format('d/m/Y') }} --}}
                            </span>
                        </li>
                    {{-- @endforeach --}}
                </ul>
            {{-- @endif --}}
        </div>
    </section>

    <!-- Section Ressources -->
    <section class="mt-8">
        <h2 class="text-xl sm:text-2xl font-semibold mb-4 text-indigo-800 animate-fade-in">Mes Ressources Pédagogiques</h2>
        <div class="bg-white shadow-lg rounded-xlp-4 sm:p-6 animate-fade-in-up border border-indigo-100">
            <ul class="space-y-3">
                {{-- @foreach ($resources as $resource) --}}
                    <li class="border-b border-indigo-200 py-2 transition-all duration-300 hover:bg-indigo-50">
                        {{-- {{ $resource->link }} --}}
                        <a
                            href=""
                            class="text-teal-500 hover:text-teal-600 hover:underline transition-colors duration-200"
                        >
                            {{-- {{ $resource->title }} --}}qsqs
                        </a>
                    </li>
                {{-- @endforeach --}}
            </ul>
        </div>
    </section>

    <!-- Section Calendrier -->
    <section class="mt-8">
        <h2 class="text-xl sm:text-2xl font-semibold mb-4 text-indigo-800 animate-fade-in">Calendrier Scolaire</h2>
        <div class="bg-white shadow-lg rounded-xl p-4 sm:p-6 animate-fade-in-up border border-indigo-100">
            {{-- <a
                href="{{ route('calendar') }}"
                class="text-teal-600 hover:text-teal-800 hover:underline transition-colors duration-200"
            > --}}
            <a
                href=""
                class="text-teal-500 hover:text-teal-600 hover:underline transition-colors duration-200"
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
    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-down {
        animation: fadeInDown 0.5s ease-out;
    }
    .animate-fade-in-up {
        animation: fadeInUp 0.5s ease-out;
    }
    .animate-fade-in {
        animation: fadeInUp 0.7s ease-out;
    }
</style>
@endsection