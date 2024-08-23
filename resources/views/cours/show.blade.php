<!-- resources/views/admin/courses/show.blade.php -->
@extends('layouts.admin')

@section('content')

{{-- @extends('layouts.app') --}}

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
            <a href="{{ route('admin.cours.index') }}" class="bg-blue-400 text-white px-4 py-2 rounded hover:bg-blue-600">Retour</a>
        </form>
    </div>

    <div class="p-4 border mb-4">
        <h2 class="text-xl font-bold">Leçons</h2>
        <ul>
            {{-- @foreach ($lessons as $lesson) --}}
            <li class="mb-2">
                <h3 class="font-bold">algebre</h3>
                <p>traail</p>
                <p>Durée : 4 minutes</p>
                <a href="#" class="bg-blue-400 text-white px-4 py-2 rounded hover:bg-blue-600">View</a>
            </li>
            {{-- @endforeach --}}
        </ul>
    </div>

    <div class="p-4 border mb-4">
        <h2 class="text-xl font-bold">Exercices</h2>
        <a href="#" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded mb-4">Ajouter un exercice</a>
        <ul>
            {{-- @foreach ($cour->exercises as $exercise) --}}
            <li class="mb-2">
                <h3 class="font-bold">td</h3>
                <p>facilite la comprehension</p>
                <a href="#" class="bg-blue-400 text-white px-4 py-2 rounded hover:bg-blue-600">View</a>
            </li>
            {{-- @endforeach --}}
        </ul>
    </div>
</div>
@endsection

@endsection
