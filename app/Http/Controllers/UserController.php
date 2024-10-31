<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);

        return view('users.index', [
            'users' => $users,
        ]);
    }

    public function create()
    {
        return view('users.create'); // Assurez-vous que ce fichier existe
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role, // Ajoutez le rôle si nécessaire
        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès.');
    }

    public function show($id){
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'date_de_naissance' => 'nullable|date',
            'sexe' => 'nullable|in:homme,femme,autre',
            'lieu_de_naissance' => 'nullable|string|max:255',
            // Ajoutez d'autres validations si nécessaire
        ]);

        // Mise à jour des informations de l'utilisateur
        $user->name = $request->name;
        $user->email = $request->email;
        $user->date_de_naissance = $request->date_de_naissance;
        $user->sexe = $request->sexe;
        $user->lieu_de_naissance = $request->lieu_de_naissance;

        // Si un mot de passe est fourni, le hacher et le mettre à jour
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // Rediriger ou retourner une réponse
        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }

    // UserController.php

    public function updateRole(Request $request, $id){
        $request->validate([
            'role' => 'required|in:student,teacher,admin', // Valider les rôles possibles
        ]);

        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('users.index')->with('success', 'Rôle mis à jour avec succès.');
    }

    public function updateProfilePhoto(Request $request){
        $request->validate([
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $user = Auth::user(); // Vérifiez que l'utilisateur est authentifié
    
        if (!$user) {
            return redirect()->back()->withErrors(['error' => 'Utilisateur non trouvé.']);
        }
    
        // Supprimer l'ancienne photo si elle existe
        if ($user->profile_photo) {
            Storage::disk('public')->delete($user->profile_photo);
        }
    
        $profilePhotoPath = $request->file('profile_photo')->store('profile_photos', 'public');
        $user->profile_photo = $profilePhotoPath;
    
        // Sauvegarder l'utilisateur
        $user->save(); // Cela devrait fonctionner si $user est un modèle valide
    }
}
