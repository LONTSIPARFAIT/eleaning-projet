<?php

namespace App\Http\Controllers;
use App\Models\Cour;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function dashboard() {
        $userCount = User::count();
        $coursCount = Cour::count();
        // $orderCount = Order::count();
        // $revenue = Order::sum('total');
        $newUsers = User::latest()->take(5)->get();
        return view('dashboard', compact('userCount','coursCount','newUsers'));
    }
}
