@extends('layouts.admin')

@section('title', 'Creer un user')
@section('content')
<div class="container py-8 mx-7 ml-7">
    <h1 class="text-3xl font-bold text-blue-900">Ajouter un Utilisateur</h1>

    <form action="{{ route('users.store') }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Nom</label>
            <input type="text" name="name" id="name" class="border rounded w-[30rem] p-2" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="border rounded w-[30rem] p-2" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700">Mot de passe</label>
            <input type="password" name="password" id="password" class="border rounded w-[30rem] p-2" required>
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700">Confirmer le mot de passe</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="border rounded w-[30rem] p-2" required>
        </div>
        <div class="mb-4">
            <label for="role" class="block text-gray-700">Rôle</label>
            <select name="role" id="role" class="border rounded w-[30rem] p-2">
                <option value="student" >Étudiant</option>
                <option value="teacher" >Enseignant</option>
                <option value="admin">Administrateur</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white p-3 rounded">Créer Utilisateur</button>
    </form>
</div>
@endsection
