<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Cour;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function index($cours_id)
    {
        $exercises = Exercise::where('cour_id', $cours_id)->get();
        return view('admin.exercises.index', compact('exercises', 'cours_id'));
    }

    public function create($cours_id)
    {
        return view('admin.exercises.create', compact('cours_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string', // Validation pour le contenu
            'duration' => 'required|integer',
            'cour_id' => 'required|exists:cour,id',
        ]);

        Exercise::create($request->all());
        return redirect()->route('admin.exercises.index', $request->cours_id)->with('success', 'Exercice créé avec succès.');
    }

    public function show(Exercise $exercise)
    {
        return view('admin.exercises.show', compact('exercise'));
    }

    public function edit(Exercise $exercise)
    {
        return view('admin.exercises.edit', compact('exercise'));
    }

    public function update(Request $request, Exercise $exercise)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'duration' => 'required|integer',
        ]);

        $exercise->update($request->all());
        return redirect()->route('admin.exercises.index', $exercise->cours_id)->with('success', 'Exercice mis à jour avec succès.');
    }

    public function destroy(Exercise $exercise)
    {
        $exercise->delete();
        return redirect()->route('admin.exercises.index', $exercise->cours_id)->with('success', 'Exercice supprimé avec succès.');
    }
}