<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        $student = Auth::user();
        $studentCourses = $student->cours; // Suppose une relation many-to-many entre User et Course
        $studentAssignments = Assignment::whereHas('course', function ($query) use ($student) {
            $query->whereIn('id', $student->courses->pluck('id'));
        })->orderBy('due_date', 'asc')->take(5)->get();
        $cours = auth()->user()->cours; // Assurez-vous que la relation est définie
        return view('student.dashboard', compact('cours', 'studentCourses'));
    }

    public function showCours()
    {
        $user = Auth::user(); // Récupère l'utilisateur authentifié
        $cours = $user->cours; // Récupère les cours auxquels l'utilisateur est abonné

        return view('student.cours', compact('cours'));
    }
}
