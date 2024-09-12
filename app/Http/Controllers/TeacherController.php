<?php

namespace App\Http\Controllers;

use App\Models\Cour;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $coursCount = Cour::count(); // Nombre total de cours
        $newCourses = Cour::orderBy('created_at', 'desc')->take(5)->get(); // Derniers cours créés

        return view('teacher.dashboard', compact('coursCount', 'newCourses'));
        // return view('teacher.dashboard'); // Créez cette vue
    }
}
