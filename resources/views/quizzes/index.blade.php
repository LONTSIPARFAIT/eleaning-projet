@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Liste des Quizzes</h1>
    <a href="{{ route('quizzes.create', $lessonId) }}">Créer un Quiz</a>
    <ul>
        @foreach ($quizzes as $quiz)
            <li>
                <a href="{{ route('quizzes.show', $quiz->id) }}">{{ $quiz->title }}</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection