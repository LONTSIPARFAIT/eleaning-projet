@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>{{ $quiz->title }}</h1>
    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <form action="{{ route('quizzes.submit', $quiz->id) }}" method="POST">
        @csrf
        @foreach ($quiz->questions as $question)
            <div>
                <h3>{{ $question->question_text }}</h3>
                @if ($question->type === 'multiple_choice')
                    @foreach ($question->answers as $answer)
                        <input type="radio" name="answer[{{ $question->id }}]" value="{{ $answer->id }}">{{ $answer->answer_text }}<br>
                    @endforeach
                @elseif ($question->type === 'true_false')
                    <input type="radio" name="answer[{{ $question->id }}]" value="true"> Vrai<br>
                    <input type="radio" name="answer[{{ $question->id }}]" value="false"> Faux<br>
                @endif
            </div>
        @endforeach
        <button type="submit">Soumettre</button>
    </form>
</div>
@endsection