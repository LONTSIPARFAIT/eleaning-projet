@extends('layouts.admin')

@section('title', 'Info user')
@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-4 text-center">Information de l'Utilisateur</h1>
    <div class="bg-white shadow-md rounded-lg p-4">
        <p class="text-xl mb-2"><strong>Nom:</strong> {{ $user->name }}<p>
        <p class="text-lg mb-2"><strong>Email:</strong> {{ $user->email }}</p>
        <p class="text-lg mb-2"><strong>Rôle:</strong> {{ $user->role }}</p>
        <p class="text-lg mb-2"><strong>Date de Naissance:</strong> {{ $user->date_de_naissance ? $user->date_de_naissance : 'Non renseignée' }}</p>
        <p class="text-lg mb-2"><strong>Lieu de Naissance:</strong> {{ $user->lieu_de_naissance }}</p>
        <p class="text-lg mb-2"><strong>Sexe:</strong> {{ ucfirst($user->sexe) }}</p>
        <p class="text-lg mb-2"><strong>Âge:</strong> {{ $user->age ?? 'Non renseigné' }}</p>
        <a href="{{ route('users.index') }}" class="text-blue-500 hover:underline">Retour à la liste</a>
    </div>
</div>
@endsection
