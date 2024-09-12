<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    
    public function create($quizId)
    {
        return view('questions.create', compact('quizId'));
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'question_text' => 'required|string',
            'type' => 'required|string|in:multiple_choice,true_false',
        ]);

        // Créer la question
        $question = Question::create($request->all());

        // Créer les réponses
        foreach ($request->answer_text as $index => $answerText) {
            $isCorrect = ($index == $request->correct_answer) ? true : false;
            $question->answers()->create(['answer_text' => $answerText, 'is_correct' => $isCorrect]);
        }

        return redirect()->route('quizzes.show', $question->quiz_id);
    }
}
