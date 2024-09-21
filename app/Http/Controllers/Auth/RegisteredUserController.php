<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Enums\UserRole;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validation des données d'inscription
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            // Ajout de la validation pour les nouveaux champs
            'date_de_naissance' => 'required|date',
            'sexe' => 'required|in:homme,femme,autre',
        ]);

        // Création d'un nouvel utilisateur
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => UserRole::STUDENT->value, // Assigner le rôle par défaut
            // Enregistrement des nouveaux champs
            'date_de_naissance' => $request->date_de_naissance,
            'lieu_de_naissance' => $request->lieu_de_naissance, // Enregistrement du lieu de naissance
            'sexe' => $request->sexe,
        ]);

        // Événement d'enregistrement (peut être utilisé si besoin)
        // event(new Registered($user));

        // Connecter l'utilisateur
        Auth::login($user);

        // Rediriger vers le tableau de bord de l'étudiant
        return redirect()->route('student.dashboard');
    }
}
