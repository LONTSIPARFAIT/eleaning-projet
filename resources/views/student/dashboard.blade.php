@extends('layouts.admin')

@section('title', 'Ma page')
@section('content')
<div class="container mx-auto ml-5 py-8">
    <h1 class="text-3xl font-bold mb-4">Tableau de Bord de l'Étudiant</h1>
    <p class="text-xl">Bienvenue, <span class="font-bold">{{ Auth::user()->name }}</span> ! Voici vos cours et ressources.</p>

    <section class="mt-6 ml-5">
        <h2 class="text-2xl font-semibold">Mes Cours</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
            @foreach ($cours as $cour)
            <div class="bg-white shadow-lg rounded-lg p-4">
                <h3 class="font-bold">{{ $cour->title }}</h3>
                <p>{{ $cour->description }}</p>
                <a href="#" class="mt-2 inline-block bg-teal-600 hover:bg-teal-700 text-white font-semibold py-1 px-4 rounded">Voir le Cours</a>
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection
