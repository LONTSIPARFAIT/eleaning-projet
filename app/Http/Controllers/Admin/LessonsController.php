<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cour;
use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonsController extends Controller
{
    public function index($cours_id)
    {
        // Récupérer les leçons du cours spécifique
        $lessons = Lesson::where('cour_id', $cours_id)->get(); // Assurez-vous que la colonne cours_id existe

        return view('admin.lessons.index', compact('lessons'));
    }

    public function create()
    {
        $cours = Cour::all();
        return view('admin.lessons.create', compact('cours'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|integer|min:1',
            'cours_id' => 'required|exists:cours,id',
        ]);

        Lesson::create($request->all());

        return redirect()->route('admin.lessons.index')->with('success', 'Leçon créée avec succès.');
    }

    // public function show(Lesson $lesson)
    // {
    //     return view('admin.lessons.show', compact('lesson'));
    // }

    public function show($id)
    {
        // $lesson = Lesson::with('quizzes')->findOrFail($id);
        // return view('lessons.show', compact('lesson'));
    }

    public function edit(Lesson $lesson)
    {
        $courses = Cour::all();
        return view('admin.lessons.edit', compact('lesson', 'cours'));
    }

    public function update(Request $request, Lesson $lesson)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|integer|min:1',
            'cours_id' => 'required|exists:cours,id',
        ]);

        $lesson->update($request->all());

        return redirect()->route('admin.lessons.index')->with('success', 'Leçon mise à jour avec succès.');
    }

    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return redirect()->route('admin.lessons.index')->with('success', 'Leçon supprimée avec succès.');
    }
}
