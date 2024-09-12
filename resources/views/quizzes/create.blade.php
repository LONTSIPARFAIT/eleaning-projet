@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Créer un Quiz</h1>
    <form action="{{ route('quizzes.store') }}" method="POST">
        @csrf
        <input type="hidden" name="lesson_id" value="{{ $lessonId }}">
        <label for="title">Titre :</label>
        <input type="text" name="title" required>
        <button type="submit">Créer</button>
    </form>
</div>
@endsection