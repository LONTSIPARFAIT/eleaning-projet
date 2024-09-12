@extends('layouts.admin')

@section('title', 'Voir un cours')

@section('content')
<div class="container">
    <div class="p-4 border mb-4">
        <h1 class="text-2xl font-bold">{{ $cour->title }}</h1>
        <p class="text-gray-600">{{ $cour->description }}</p>
        <p class="text-gray-600">Durée : {{ $cour->duration }} minutes</p>
        <p class="text-gray-600">Prix : {{ $cour->price }} €</p>

        <a href="{{ route('cours.edit', $cour) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">Éditer</a>

        <form action="{{ route('cours.destroy', $cour) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Êtes-vous sûr?')">Supprimer</button>
        </form>

        <a href="{{ route('cours.index') }}" class="bg-blue-400 text-white px-4 py-2 rounded hover:bg-blue-600">Retour</a>
    </div>

    <div class="p-4 border mb-4 relative">
        <h2 class="text-xl font-bold">Leçons</h2>

        <div class="absolute top-4 right-4">
            <a href="{{ route('lessons.create', ['cours_id' => $cour->id]) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Ajouter une leçon</a>
            <a href="{{ route('cours.lessons.index', ['cours_id' => $cour->id]) }}" class="bg-green-500 py-2 px-4 hover:bg-blue-600 text-white font-bold rounded mb-4">Voir toutes les leçons</a>
        </div>

        @if ($cour->lessons->isEmpty())
            <p>Aucune leçon disponible pour ce cours.</p>
        @else
            <ul>
                @foreach ($cour->lessons as $index => $lesson)
                    <li class="mb-2">
                        <h3 class="font-bold">Leçon {{ $index + 1 }} : {{ $lesson->title }}</h3>
                        <p>{{ $lesson->description }}</p>
                        <p>Durée : {{ $lesson->duration }} minutes</p>
                        <a href="{{ route('lessons.show', $lesson->id) }}" class="bg-blue-400 text-white px-4 py-2 rounded hover:bg-blue-600">Voir</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="p-4 border mb-4 relative">
        <h2 class="text-xl font-bold">Exercices</h2>

        <div class="absolute top-4 right-4">
            <a href="{{ route('exercises.create', ['cours_id' => $cour->id]) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Ajouter un exercice</a>
            <a href="#" class="bg-green-500 py-2 px-4 hover:bg-blue-600 text-white font-bold rounded mb-4">Voir tous les exercices</a>
        </div>

        @if ($cour->exercises->isEmpty())
            <p>Aucun exercice disponible pour ce cours.</p>
        @else
            <ul>
                @foreach ($cour->exercises as $index => $exercise)
                    <li class="mb-2">
                        <h3 class="font-bold">Exercice {{ $index + 1 }} : {{ $exercise->title }}</h3>
                        <p>{{ $exercise->content }}</p>
                        <p>Durée : {{ $exercise->duration }} minutes</p>
                        <a href="{{ route('exercises.show', $exercise) }}" class="bg-blue-400 text-white px-4 py-2 rounded hover:bg-blue-600">Voir</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="p-4 border mb-4 relative">
        <h2 class="text-xl font-bold">Questionnaire</h2>

        <div class="absolute top-4 right-4">
            <a href="{{ route('quizzes.create', ['lesson_id' => $cour->id]) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Ajouter un Questionnaire</a>
            <a href="#" class="bg-green-500 py-2 px-4 hover:bg-blue-600 text-white font-bold rounded mb-4">Voir tous les Questionnaire</a>
            {{-- {{ route('quizzes.index', ['lesson_id' => $cour->id]) }} --}}
        </div>

        @if ($cour->quizzes && $cour->quizzes->isNotEmpty())
            <ul>
                @foreach (optional($cour->quizzes) as $index => $quiz)
                {{-- @foreach ($cour->quizzes as $index => $quiz) --}}
                    <li class="mb-2">
                        <h3 class="font-bold">Quiz {{ $index + 1 }} : {{ $quiz->title }}</h3>
                        <a href="{{ route('quizzes.show', $quiz) }}" class="bg-blue-400 text-white px-4 py-2 rounded hover:bg-blue-600">Voir</a>
                    </li>
                @endforeach
            </ul>
        @else
            <p>Aucun Questionnaire disponible pour ce cours.</p>
        @endif
    </div>
</div>
@endsection
