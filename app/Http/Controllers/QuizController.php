<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index($lessonId)
    {
        $quizzes = Quiz::where('lesson_id', $lessonId)->get();
        return view('quizzes.index', compact('quizzes', 'lessonId'));
    }

    public function create($lessonId)
    {
        return view('quizzes.create', compact('lessonId'));
    }

    public function store(Request $request)
    {
        $quiz = Quiz::create($request->all());
        return redirect()->route('quizzes.index', $quiz->lesson_id);
    }

    public function show($id)
    {
        $quiz = Quiz::with('questions.answers')->findOrFail($id);
        return view('quizzes.show', compact('quiz'));
    }

    public function submit(Request $reque, $id)
    {
        $quiz = Quiz::with('questions.answers')->findOrFail($id);
        $score = 0;

        foreach ($quiz->questions as $question) {
            $selectedAnswer = $request->input("answer.{$question->id}");

            if ($selectedAnswer) {
                $correctAnswer = $question->answers()->where('is_correct', true)->first();
                if ($correctAnswer && $correctAnswer->id == $selectedAnswer) {
                    $score++;
                }
            }
        }

        // Enregistrez le score (optionnel)
        // Result::create([...]);

        return redirect()->route('quizzes.show', $quiz->id)->with('status', "Vous avez obtenu $score sur {$quiz->questions->count()} !");
    }
}
