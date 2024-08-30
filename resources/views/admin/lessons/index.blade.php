@extends('layouts.admin')

@section('title', 'Voir une leçon')
@section('content')

<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Liste des Leçons</h1>
    @if(session('success'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">{{ session('success') }}</div>
    @endif
    <a href="" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4">Créer une nouvelle leçon</a>
    <ul>
        @foreach ($lessons as $lesson)
        <li class="p-4 border rounded mb-4">
            <h3 class="font-bold text-lg">{{ $lesson->title }}</h3>
            <p class="text-gray-600">Durée : {{ $lesson->duration }} minutes</p>
            <a href="" class="bg-blue-400 text-white px-4 py-2 rounded hover:bg-blue-600">View</a>
            <a href="" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Éditer</a>
            <form action="" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600" onclick="return confirm('Êtes-vous sûr?')">Supprimer</button>
            </form>
        </li>
        @endforeach
    </ul>
</div>
@endsection