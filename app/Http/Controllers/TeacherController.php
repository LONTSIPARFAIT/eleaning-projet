<?php

namespace App\Http\Controllers;

use App\Models\Cour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function index()
    {
        // Récupérer les devoirs à évaluer
        //    $assignments = Assignment::whereIn('course_id', $courses->pluck('id'))->where('status', 'pending')->get();
        
        // Récupérer les ressources pédagogiques
        //    $resources = Resource::where('teacher_id', $teacher->id)->get();
        
        // Récupérer l'enseignant authentifié
        $teacher = Auth::user();
        
        // Récupérer les cours enseignés par l'enseignant
        $cours = Cour::where('teacher_id', $teacher->id)->get();

        // Récupérer les cours enseignés par l'enseignant
        $courses = $teacher->cours;
        
        // Récupérer le nombre d'étudiants associés à ces cours
        $studentsCount = $courses->flatMap(function($cour) {
            return $cour->students; // Assurez-vous que vous avez une relation students dans Cour
        })->unique('id')->count();   
        

        // Nombre total de cours
        $newCourses = Cour::orderBy('created_at', 'desc')->take(5)->get(); // Derniers cours créés
            
        // Retourner la vue avec les données nécessaires
        return view('teacher.dashboard', compact('courses','studentsCount', 'newCourses', 'cours'));
    }

    // public function index()
    // {
    //     $teacher = Auth::user();
    //     $teacherCoursesCount = Course::where('teacher_id', $teacher->id)->count();
    //     $enrolledStudentsCount = User::whereHas('courses', function ($query) use ($teacher) {
    //         $query->where('teacher_id', $teacher->id);
    //     })->count();
    //     $teacherAssignmentsCount = Assignment::where('teacher_id', $teacher->id)->count();
    //     $teacherRevenue = Course::where('teacher_id', $teacher->id)->sum('price') ?? '250 €'; // À ajuster
    //     $newCourses = Course::where('teacher_id', $teacher->id)->orderBy('created_at', 'desc')->take(5)->get();
    //     $teacherAssignments = Assignment::where('teacher_id', $teacher->id)->orderBy('due_date', 'asc')->take(5)->get();
    //     $newMessagesCount = 3; // À remplacer par une vraie logique

    //     return view('teacher.dashboard', compact(
    //         'teacherCoursesCount', 'enrolledStudentsCount', 'teacherAssignmentsCount', 'teacherRevenue',
    //         'newCourses', 'teacherAssignments', 'newMessagesCount'
    //     ));
    // }
}

