@extends('layouts.admin')

@section('title', 'Voir un cours')

@section('content')
<div class="container">
    <div class="p-4 border mb-4">
        <h1 class="text-2xl font-bold">{{ $cour->title }}</h1>
        <p class="text-gray-600">{{ $cour->description }}</p>
        <p class="text-gray-600">Durée : {{ $cour->duration }} minutes</p>
        <p class="text-gray-600">Prix : {{ $cour->price }} €</p>

        <a href="{{ route('admin.cours.edit', $cour) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">Éditer</a>

        <form action="{{ route('admin.cours.destroy', $cour) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Êtes-vous sûr?')">Supprimer</button>
        </form>
        
        <a href="{{ route('admin.cours.index') }}" class="bg-blue-400 text-white px-4 py-2 rounded hover:bg-blue-600">Retour</a>
    </div>

    <div class="p-4 border mb-4">
        <h2 class="text-xl font-bold">Leçons</h2>
        @if ($cour->lessons->isEmpty())
            <p>Aucune leçon disponible pour ce cours.</p>
        @else
            <ul>
                @foreach ($cour->lessons as $index => $lesson)
                <li class="mb-2">
                    <h3 class="font-bold">Leçon {{ $index + 1 }} : {{ $lesson->title }}</h3>
                    <p>{{ $lesson->description }}</p>
                    <p>Durée : {{ $lesson->duration }} minutes</p>
                    <a href="#" class="bg-blue-400 text-white px-4 py-2 rounded hover:bg-blue-600">Voir</a>
                    {{-- <a href="{{ route('admin.lessons.show', $lesson) }}" class="bg-blue-400 text-white px-4 py-2 rounded hover:bg-blue-600">Voir</a> --}}
                </li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="p-4 border mb-4">
        <h2 class="text-xl font-bold">Exercices</h2>
        <a href="#" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded mb-4">Ajouter un exercice</a>
        {{-- <a href="{{ route('admin.exercises.create', ['cours_id' => $cour->id]) }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded mb-4">Ajouter un exercice</a> --}}
        @if (empty($cour))
            <p>Aucun exercice disponible pour ce cours.</p>
        @else
            <ul>
                {{-- @foreach ($cour->exercises as $exercise) --}}
                <li class="mb-2">
                    <h3 class="font-bold">algebre</h3>
                    <p>devoir a faire</p>
                    {{-- <h3 class="font-bold">{{ $exercise->title }}</h3>
                    <p>{{ $exercise->description }}</p> --}}
                    <a href="#" class="bg-blue-400 text-white px-4 py-2 rounded hover:bg-blue-600">Voir</a>
                    {{-- <a href="{{ route('admin.exercises.show', $exercise) }}" class="bg-blue-400 text-white px-4 py-2 rounded hover:bg-blue-600">Voir</a> --}}
                </li>
                {{-- @endforeach --}}
            </ul>
        @endif
    </div>
</div>
@endsection