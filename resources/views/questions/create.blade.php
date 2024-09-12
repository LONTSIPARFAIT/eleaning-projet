@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Ajouter une Question</h1>
    <form action="{{ route('quizzes.questions.store', $quizId) }}" method="POST">
        @csrf
        <label for="question_text">Question :</label>
        <input type="text" name="question_text" required>

        <label for="type">Type :</label>
        <select name="type" required>
            <option value="multiple_choice">QCM</option>
            <option value="true_false">Vrai/Faux</option>
        </select>

        <div id="options">
            <h3>Options</h3>
            <label for="answer_text">Réponse :</label>
            <input type="text" name="answer_text[]" required>
            <input type="radio" name="correct_answer" value="0" required> Correcte

            <button type="button" id="addOption">Ajouter une Option</button>
        </div>

        <button type="submit">Ajouter</button>
    </form>
</div>

<script>
    document.getElementById('addOption').onclick = function() {
        const div = document.createElement('div');
        div.innerHTML = `
            <label for="answer_text">Réponse :</label>
            <input type="text" name="answer_text[]" required>
            <input type="radio" name="correct_answer" value="${document.querySelectorAll('input[name="answer_text[]"]').length}" required> Correcte
        `;
        document.getElementById('options').appendChild(div);
    };
</script>
@endsection