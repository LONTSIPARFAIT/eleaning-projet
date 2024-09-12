@extends('layouts.admin')

@section('title', 'Voir une leçon')

@section('content')
<div class="container">
    <div class="p-4 border mb-4">
        <h1 class="text-2xl font-bold">{{ $lesson->title }}</h1>
        <p class="text-gray-600">{{ $lesson->description }}</p>
        <p class="text-gray-600">Durée : {{ $lesson->duration }} minutes</p>

        <a href="{{ route('lessons.edit', $lesson) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">Éditer</a>

        <form action="{{ route('lessons.destroy', $lesson) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Êtes-vous sûr?')">Supprimer</button>
        </form>

        <a href="{{ route('lessons.index') }}" class="bg-blue-400 text-white px-4 py-2 rounded hover:bg-blue-600">Retour</a>
    </div>

    <div class="p-4 border mb-4 relative">
        <h2 class="text-xl font-bold">Quizzes associés</h2>

        <div class="absolute top-4 right-4">
            <a href="{{ route('quizzes.create', ['lesson_id' => $lesson->id]) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Ajouter un quiz</a>
            <a href="{{ route('quizzes.index', ['lesson_id' => $lesson->id]) }}" class="bg-green-500 py-2 px-4 hover:bg-blue-600 text-white font-bold rounded mb-4">Voir tous les quizzes</a>
        </div>

        @if ($lesson->quizzes->isEmpty())
            <p>Aucun quiz disponible pour cette leçon.</p>
        @else
            <ul>
                @foreach ($lesson->quizzes as $index => $quiz)
                    <li class="mb-2">
                        <h3 class="font-bold">Quiz {{ $index + 1 }} : {{ $quiz->title }}</h3>
                        <a href="{{ route('quizzes.show', $quiz) }}" class="bg-blue-400 text-white px-4 py-2 rounded hover:bg-blue-600">Voir</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
@endsection