<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserRole;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    // public function store(LoginRequest $request): RedirectResponse
    // {
    //     $request->authenticate();

    //     $request->session()->regenerate();

    //     return redirect()->intended(RouteServiceProvider::HOME);
    // }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);



        if (Auth::attempt($request->only('email', 'password'))) {
            // Vérification du rôle après connexion
            if (auth()->user()->hasRole(UserRole::ADMIN)) {
                return redirect()->route('admin.dashboard');
            } elseif (auth()->user()->hasRole(UserRole::TEACHER)) {
                return redirect()->route('teacher.dashboard');
            } else {
                return redirect()->route('student.dashboard');
            }
            } elseif (auth()->user()->hasRole(UserRole::TEACHER)) {
                return redirect()->route('teacher.dashboard');
            } else {
                return redirect()->route('student.dashboard');
            }

            // $user = auth()->user();

            // if ($user->role === 'admin') {
            //     return redirect()->route('admin.dashboard'); // Assurez-vous d'avoir cette route
            // } elseif ($user->role === 'student') {
            //     return redirect()->route('student.dashboard'); // Assurez-vous d'avoir cette route
            // } elseif ($user->role === 'teacher') {
            //     return redirect()->route('teacher.dashboard'); // Assurez-vous d'avoir cette route
            // }
        
            // return abort(403); 

        }

        return back()->withErrors([
            'email' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.',
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
