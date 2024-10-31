@extends('layouts.admin')

@section('title', 'Info user')
@section('content')
<div class="flex items-center justify-center min-h-screen bg-blue-300">
    <div class="bg-red-100 shadow-lg rounded-lg p-7 max-w-md w-full text-gray-600">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Information de l'Utilisateur</h1>

        @if ($user->profile_photo)
            <div class="mb-4">
                <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Photo de Profil" class="rounded-full w-32 h-32 object-cover mx-auto" />
            </div>
        @else
            <div class="mb-4 flex items-center justify-center">
                <!-- Icône par défaut -->
                <svg class="h-14 w-14 rounded-full mr-2 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14.5c-3.5 0-6.5-2.5-6.5-6s3-6 6.5-6 6.5 2.5 6.5 6-3 6-6.5 6zm0 0c3.5 0 6.5 1.5 6.5 4.5v1H5v-1c0-3 3-4.5 6.5-4.5z" />
                </svg>
            </div>
        @endif

        <p class="text-lg mb-2"><strong class="text-gray-700">Nom:</strong> {{ $user->name }}</p>
        <p class="text-lg mb-2"><strong class="text-gray-700">Email:</strong> {{ $user->email }}</p>
        <p class="text-lg mb-2"><strong class="text-gray-700">Rôle:</strong> {{ $user->role }}</p>
        <p class="text-lg mb-2"><strong class="text-gray-700">Date de Naissance:</strong> {{ $user->date_de_naissance ? $user->date_de_naissance : 'Non renseignée' }}</p>
        <p class="text-lg mb-2"><strong class="text-gray-700">Lieu de Naissance:</strong> {{ $user->lieu_de_naissance }}</p>
        <p class="text-lg mb-2"><strong class="text-gray-700">Sexe:</strong> {{ ucfirst($user->sexe) }}</p>
        <p class="text-lg mb-2"><strong class="text-gray-700">Âge:</strong> {{ $user->age ?? 'Non renseigné' }}</p>

        <a href="{{ route('users.index') }}" class="mt-4 text-blue-500 hover:underline text-center block">Retour à la liste</a>
    </div>
</div>
@endsection
