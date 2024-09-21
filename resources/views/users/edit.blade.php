@extends('layouts.admin')

@section('title', 'Modifier user')
@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-4">Modifier l'utilisateur</h1>

    <form action="{{ route('users.update', $user->id) }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" class="border rounded w-full p-2" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" class="border rounded w-full p-2" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Date de Naissance:</label>
            <input type="date_de_naissance" id="date_de_naissance" name="date_de_naissance" value="{{ $user->date_de_naissance }}" class="border rounded w-full p-2" required>
        </div>

        <div class="mb-4">
            <label for="lieu_de_naissance" class="block text-sm font-medium text-gray-700">Lieu de Naissance:</label>
            <input type="lieu_de_naissance" id="lieu_de_naissance" name="lieu_de_naissance" value=" {{ ucfirst($user->lieu_de_naissance) }}" class="border rounded w-full p-2" required>
        </div>
        
        <div class="mb-4">
            <label for="sexe" class="block text-sm font-medium text-gray-700">Sexe:</label>
                <select name="sexe" id="sexe" class="border rounded w-full p-2">
                    <option value="homme" {{ $user->sexe == 'homme' ? 'selected' : '' }}>Homme</option>
                    <option value="femme" {{ $user->sexe == 'femme' ? 'selected' : '' }}>Femme</option>
                    <option value="autre" {{ $user->sexe == 'autre' ? 'selected' : '' }}>Autre</option>
                </select>
        </div>

        <div class="mb-4">
            <label for="role" class="block text-sm font-medium text-gray-700">Rôle</label>
            <select name="role" id="role" class="border rounded w-full p-2">
                <option value="student" {{ $user->role == 'student' ? 'selected' : '' }}>Étudiant</option>
                <option value="teacher" {{ $user->role == 'teacher' ? 'selected' : '' }}>Enseignant</option>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrateur</option>
            </select>
        </div>

        <button type="submit" class="bg-green-500 text-white rounded px-4 py-2 hover:bg-green-600">Mettre à jour</button>
    </form>

    <a href="{{ route('users.index') }}" class="text-blue-500 hover:underline mt-4 inline-block">Retour à la liste</a>
</div>
@endsection
