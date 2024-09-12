<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $cours = auth()->user()->cours; // Assurez-vous que la relation est définie
        return view('student.dashboard', compact('cours'));
    }
}
