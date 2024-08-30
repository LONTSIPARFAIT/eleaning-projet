@extends('layouts.admin')

@section('title', 'Exercices')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold">Exercices du Cours</h1>
    <a href="{{ route('admin.exercises.create', $cours_id) }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded mb-4">Ajouter un exercice</a>

    @if ($exercises->isEmpty())
        <p>Aucun exercice disponible.</p>
    @else
        <ul>
            @foreach ($exercises as $index => $exercise)
            <li class="mb-2">
                <h3 class="font-bold">Exercice {{ $index + 1 }} : {{ $exercise->title }}</h3>
                <p>{{ $exercise->content }}</p>
                <p>Durée : {{ $exercise->duration }} minutes</p>
                <a href="{{ route('admin.exercises.show', $exercise) }}" class="bg-blue-400 text-white px-4 py-2 rounded hover:bg-blue-600">Voir</a>
            </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection