<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Enums\UserRole;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
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
            'date_de_naissance' => 'required|date',
            'sexe' => 'required|in:homme,femme,autre',
            'lieu_de_naissance' => 'required|string|max:255',
            'profile_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Vérification de l'âge (doit être supérieur à 15 ans)
        $dob = new \DateTime($request->date_de_naissance);
        $today = new \DateTime();
        $age = $today->diff($dob)->y;

        if ($age < 15) {
            throw ValidationException::withMessages(['date_de_naissance' => 'Vous devez avoir au moins 15 ans pour vous inscrire.']);
        }

        // Création d'un nouvel utilisateur
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => UserRole::STUDENT->value,
            'date_de_naissance' => $request->date_de_naissance,
            'lieu_de_naissance' => $request->lieu_de_naissance,
            'sexe' => $request->sexe,
        ]);

        // Gestion de la photo de profil
        if ($request->hasFile('profile_photo')) {
            $profilePhotoPath = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = $profilePhotoPath;
            $user->save(); // Sauvegarde de l'utilisateur avec la photo
        }

        // Événement d'enregistrement (peut être utilisé si besoin)
        // event(new Registered($user));

        // Connecter l'utilisateur
        Auth::login($user);

        // Rediriger vers le tableau de bord de l'étudiant
        return redirect()->route('student.dashboard');
    }
}
