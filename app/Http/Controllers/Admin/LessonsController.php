<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cour;
use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonsController extends Controller
{
    public function index()
    {
        $lessons = Lesson::all();
        return view('admin.lessons.index', compact('lessons'));
    }

    public function create()
    {
        $courses = Cour::all();
        return view('admin.lessons.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|integer|min:1',
            'cours_id' => 'required|exists:courses,id',
        ]);

        Lesson::create($request->all());

        return redirect()->route('admin.lessons.index')->with('success', 'Leçon créée avec succès.');
    }

    public function show(Lesson $lesson)
    {
        return view('admin.lessons.show', compact('lesson'));
    }

    public function edit(Lesson $lesson)
    {
        $courses = Cour::all();
        return view('admin.lessons.edit', compact('lesson', 'courses'));
    }

    public function update(Request $request, Lesson $lesson)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|integer|min:1',
            'cours_id' => 'required|exists:courses,id',
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