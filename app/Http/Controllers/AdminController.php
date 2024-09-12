<?php

namespace App\Http\Controllers;

use App\Models\Cour;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // function dashboard() {
            $userCount = User::count();
            $coursCount = Cour::count();
            // $orderCount = Order::count();
            // $revenue = Order::sum('total');
            $newUsers = User::latest()->take(5)->get();
        // }
        return view('admin.dashboard', compact('userCount','coursCount','newUsers'));
        // return view('admin.dashboard'); // Créez cette vue
    }
}