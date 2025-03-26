@extends('layouts.admin')

@section('title', 'Tableau de Bord de l\'Étudiant')
@section('content')
<div class="container mx-auto ml-5 py-8">
    <h1 class="text-3xl font-bold mb-4">Tableau de Bord de l'Étudiant</h1>
    <p class="text-xl">Bienvenue, <span class="font-bold">{{ Auth::user()->name }}</span> ! Voici vos cours et ressources.</p>

    <section class="mt-6">
        <h2 class="text-2xl font-semibold mb-4">Mes Cours</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @if($cours->isEmpty())
                <p class="mt-4">Vous n'êtes abonné à aucun cours.</p>
            @else
                @foreach ($cours as $cour)
                    <div class="bg-white shadow-lg rounded-lg p-4">
                        <h3 class="font-bold">{{ $cour->title }}</h3>
                        <p class="text-gray-600">{{ $cour->description }}</p>
                        <p class="mt-2">Durée : {{ $cour->duration }} minutes</p>
                        <p class="mt-2">Prix : {{ $cour->price }} €</p>
                        <a href="#" class="mt-2 inline-block bg-teal-600 hover:bg-teal-700 text-white font-semibold py-1 px-4 rounded">Voir le Cours</a>
                    </div>
                @endforeach
            @endif
        </div>
    </section>

    <section class="mt-8">
        <h2 class="text-2xl font-semibold mb-4">Devoirs à Rendre</h2>
        <div class="bg-white shadow-lg rounded-lg p-4">
            {{-- @if($assignments->isEmpty())
                <p class="mt-4">Aucun devoir à rendre pour le moment.</p>
            @else --}}
                <ul>
                    {{-- @foreach ($assignments as $assignment) --}}
                        <li class="border-b py-2">
                            <strong>Pour le </strong> - Échéance : 12-06-2023
                            {{-- <strong>{{ $assignment->title }}</strong> - Échéance : {{ $assignment->due_date->format('d/m/Y') }} --}}
                        </li>
                    {{-- @endforeach --}}
                </ul>
            {{-- @endif --}}
        </div>
    </section>

    <section class="mt-8">
        <h2 class="text-2xl font-semibold mb-4">Mes Ressources Pédagogiques</h2>
        <div class="bg-white shadow-lg rounded-lg p-4">
            <ul>
                {{-- @foreach ($resources as $resource) --}}
                    <li class="border-b py-2">
                        <a href="Cours" class="text-teal-600 hover:underline">pour les etudiant de GL</a>
                        {{-- <a href="{{ $resource->link }}" class="text-teal-600 hover:underline">{{ $resource->title }}</a> --}}
                    </li>
                {{-- @endforeach --}}
            </ul>
        </div>
    </section>

    <section class="mt-8">
        <h2 class="text-2xl font-semibold mb-4">Calendrier Scolaire</h2>
        <div class="bg-white shadow-lg rounded-lg p-4">
            <a href="#" class="text-teal-600 hover:underline">Voir le Calendrier Scolaire</a>
            {{-- <a href="{{ route('calendar') }}" class="text-teal-600 hover:underline">Voir le Calendrier Scolaire</a> --}}
        </div>
    </section>
</div>
@endsection
