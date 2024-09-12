<?php

namespace App\Http\Controllers;
use App\Models\Cour;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('Welcome');
    }
    
    function dashboard() {
        $userCount = User::count();
        $coursCount = Cour::count();
        // $orderCount = Order::count();
        // $revenue = Order::sum('total');
        $newUsers = User::latest()->take(5)->get();
        return view('admin/dashboard', compact('userCount','coursCount','newUsers'));
    }
}
