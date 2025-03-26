<?php

namespace App\Http\Controllers;
use App\Models\Cour;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $cours = Cour::paginate(3);// Récupérer tous les cours
        // $cours = Cour::all();// Récupérer tous les cours
        return view('welcome', compact('cours'));
    }

    function dashboard() {
        $userCount = User::count();
        $coursCount = Cour::count();
        $studentCount = User::where('role', 'student')->count();
        $teacherCount = User::where('role', 'teacher')->count();
        $recentRegistrations = User::where('created_at', '>=', now()->subDays(30))->count();
        $monthlyCourses = Cour::where('created_at', '>=', now()->startOfMonth())->count();
        // $orderCount = Order::count();
        // $revenue = Order::sum('total');
        $newUsers = User::latest()->take(5)->get();
        return view('admin/dashboard', compact('userCount','coursCount','newUsers','studentCount','teacherCount', 'recentRegistrations', 'monthlyCourses'));
    }
}
