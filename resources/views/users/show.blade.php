@extends('layouts.admin')

@section('title', 'Info utilisateur')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-50 to-orange-100 px-4 sm:px-6 lg:px-8 pt-12 sm:pt-16 lg:pt-20">
    <div class="bg-white shadow-lg rounded-xl p-6 sm:p-8 max-w-md w-full text-gray-600 scroll-reveal border border-blue-200">
        <h1 class="text-2xl font-bold mb-6 text-center text-blue-800 animate-fade-in-down flex items-center justify-center gap-2">
            {{-- <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg> --}}
            Information de l'Utilisateur
        </h1>

        <!-- Photo de profil ou icône par défaut -->
        <div class="mb-6 flex justify-center animate-fade-in-up">
            @if ($user->profile_photo_path)
                <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="Photo de Profil" class="rounded-full w-32 h-32 object-cover shadow-md transition duration-300 hover:scale-105" />
            @else
                <svg class="h-16 w-16 rounded-full text-gray-400 bg-orange-100 p-2 shadow-md" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14.5c-3.5 0-6.5-2.5-6.5-6s3-6 6.5-6 6.5 2.5 6.5 6-3 6-6.5 6zm0 0c3.5 0 6.5 1.5 6.5 4.5v1H5v-1c0-3 3-4.5 6.5-4.5z" />
                </svg>
            @endif
        </div>

        <!-- Informations utilisateur -->
        <div class="space-y-4 animate-fade-in-up">
            <p class="text-lg flex items-center gap-2">
                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                <strong class="text-blue-900 font-semibold">Nom :</strong> {{ $user->name }}
            </p>
            <p class="text-lg flex items-center gap-2">
                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                <strong class="text-blue-900 font-semibold">Email :</strong> {{ $user->email }}
            </p>
            <p class="text-lg flex items-center gap-2">
                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <strong class="text-blue-900 font-semibold">Rôle :</strong> {{ ucfirst($user->role) }}
            </p>
            <p class="text-lg flex items-center gap-2">
                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <strong class="text-blue-900 font-semibold">Date de Naissance :</strong> {{ $user->date_de_naissance ? $user->date_de_naissance : 'Non renseignée' }}
            </p>
            <p class="text-lg flex items-center gap-2">
                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                <strong class="text-blue-900 font-semibold">Lieu de Naissance :</strong> {{ $user->lieu_de_naissance ?? 'Non renseigné' }}
            </p>
            <p class="text-lg flex items-center gap-2">
                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                <strong class="text-blue-900 font-semibold">Sexe :</strong> {{ ucfirst($user->sexe ?? 'Non renseigné') }}
            </p>
            <p class="text-lg flex items-center gap-2">
                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <strong class="text-blue-900 font-semibold">Âge :</strong> {{ $user->age ?? 'Non renseigné' }}
            </p>
        </div>

        <!-- Lien de retour -->
        <div class="mt-6 text-center animate-fade-in-up">
            <a href="{{ route('users.index') }}" class="inline-block bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Retour à la liste
            </a>
        </div>
    </div>
</div>

<style>
    /* Animations personnalisées */
    @keyframes fadeInUp {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeInDown {
        0% { opacity: 0; transform: translateY(-20px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    .scroll-reveal {
        opacity: 0;
        transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    }
    .scroll-reveal.visible {
        animation: fadeInUp 0.6s ease-out forwards;
    }
    .animate-fade-in-down {
        animation: fadeInDown 0.6s ease-out;
    }
    .animate-fade-in-up {
        animation: fadeInUp 0.6s ease-out;
    }
</style>

<script>
    // Animation au scroll avec répétition
    document.addEventListener('DOMContentLoaded', () => {
        const elements = document.querySelectorAll('.scroll-reveal');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                } else {
                    entry.target.classList.remove('visible');
                }
            });
        }, { threshold: 0.2 });

        elements.forEach(element => observer.observe(element));
    });
</script>
@endsection