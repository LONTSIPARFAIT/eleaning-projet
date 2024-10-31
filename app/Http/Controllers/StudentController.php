<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        $cours = auth()->user()->cours; // Assurez-vous que la relation est définie
        return view('student.dashboard', compact('cours'));
    }

    public function showCours()
    {
        $user = Auth::user(); // Récupère l'utilisateur authentifié
        $cours = $user->cours; // Récupère les cours auxquels l'utilisateur est abonné

        return view('student.cours', compact('cours'));
    }
}
