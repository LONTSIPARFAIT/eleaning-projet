@extends('layouts.admin')

@section('title', 'Tableau de Bord de l\'Étudiant')

@section('content')
<div class="container mx-auto py-8 px-4 md:px-8">
    <!-- Section Bienvenue -->
    <div class="bg-white rounded-lg shadow-lg p-6 mb-6 transform hover:scale-105 transition duration-300">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Tableau de Bord de l'Étudiant</h1>
        <p class="text-xl text-gray-600">Bienvenue, <span class="font-bold text-indigo-600">{{ Auth::user()->name }}</span> ! Voici vos cours et ressources.</p>
    </div>

    <!-- Mes Cours -->
    <section class="mt-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Mes Cours</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @if($cours->isEmpty())
                <p class="mt-4 text-gray-600">Vous n'êtes abonné à aucun cours.</p>
            @else
                @foreach ($cours as $cour)
                    <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition duration-300">
                        <h3 class="font-bold text-lg text-indigo-600">{{ $cour->title }}</h3>
                        <p class="text-gray-600 mt-2">{{ $cour->description }}</p>
                        <p class="mt-2 text-gray-500">Durée : {{ $cour->duration }} minutes</p>
                        <p class="mt-2 text-gray-500">Prix : {{ $cour->price }} €</p>
                        <a href="#" class="mt-4 inline-block bg-teal-600 hover:bg-teal-700 text-white font-semibold py-2 px-4 rounded transition duration-300">Voir le Cours</a>
                    </div>
                @endforeach
            @endif
        </div>
    </section>

    <!-- Devoirs à Rendre (avec Alpine.js pour toggle) -->
    <section class="mt-8" x-data="{ open: false }">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4 flex justify-between items-center">
            Devoirs à Rendre
            <button @click="open = !open" class="text-sm text-indigo-600 hover:text-indigo-800">Voir</button>
        </h2>
        <div class="bg-white shadow-lg rounded-lg p-6" x-show="open" x-transition>
            @if($assignments->isEmpty())
                <p class="mt-4 text-gray-600">Aucun devoir à rendre pour le moment.</p>
            @else
                <ul class="space-y-2">
                    @foreach ($assignments as $assignment)
                        <li class="border-b py-2 text-gray-600">
                            <strong>{{ $assignment->title }}</strong> - Échéance : {{ $assignment->due_date->format('d/m/Y') }}
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </section>

    <!-- Mes Ressources Pédagogiques -->
    <section class="mt-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Mes Ressources Pédagogiques</h2>
        <div class="bg-white shadow-lg rounded-lg p-6">
            <ul class="space-y-2">
                @foreach ($resources as $resource)
                    <li class="border-b py-2">
                        <a href="{{ $resource->link }}" class="text-teal-600 hover:underline hover:text-teal-800 transition duration-300">{{ $resource->title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    <!-- Calendrier Scolaire -->
    <section class="mt-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Calendrier Scolaire</h2>
        <div class="bg-white shadow-lg rounded-lg p-6">
            <a href="{{ route('calendar') }}" class="text-teal-600 hover:underline hover:text-teal-800 transition duration-300">Voir le Calendrier Scolaire</a>
        </div>
    </section>

    <!-- Statistiques Rapides (optionnel) -->
    <section class="mt-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Statistiques Rapides</h2>
        <div class="bg-white shadow-lg rounded-lg p-6 grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="text-center">
                <p class="text-2xl font-bold text-gray-800">85%</p>
                <p class="text-gray-600">Progression globale</p>
            </div>
            <div class="text-center">
                <p class="text-2xl font-bold text-gray-800">14/20</p>
                <p class="text-gray-600">Dernière note</p>
            </div>
            <div class="text-center">
                <p class="text-2xl font-bold text-gray-800">{{ $cours->count() }}</p>
                <p class="text-gray-600">Cours actifs</p>
            </div>
        </div>
    </section>
</div>

<!-- Inclure Alpine.js -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection
