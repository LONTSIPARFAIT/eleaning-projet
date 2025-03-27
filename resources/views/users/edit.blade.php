@extends('layouts.admin')

@section('title', 'Modifier utilisateur')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-orange-100 py-8 px-4 sm:px-6 lg:px-8 flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-xl p-6 sm:p-8 max-w-lg w-full scroll-reveal border border-blue-200">
        <h1 class="text-3xl font-bold text-blue-800 text-center mb-6 animate-fade-in-down flex items-center justify-center gap-2">
            <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
            Modifier l'Utilisateur
        </h1>

        <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="animate-fade-in-up">
                <label for="name" class="block text-blue-900 font-semibold flex items-center gap-2">
                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    Nom
                </label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="mt-1 block w-full border-blue-300 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm p-2 transition duration-200" required>
                @error('name')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="animate-fade-in-up">
                <label for="email" class="block text-blue-900 font-semibold flex items-center gap-2">
                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    Email
                </label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="mt-1 block w-full border-blue-300 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm p-2 transition duration-200" required>
                @error('email')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="animate-fade-in-up">
                <label for="date_de_naissance" class="block text-blue-900 font-semibold flex items-center gap-2">
                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Date de Naissance
                </label>
                <input type="date" id="date_de_naissance" name="date_de_naissance" value="{{ old('date_de_naissance', $user->date_de_naissance) }}" class="mt-1 block w-full border-blue-300 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm p-2 transition duration-200" required>
                @error('date_de_naissance')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="animate-fade-in-up">
                <label for="lieu_de_naissance" class="block text-blue-900 font-semibold flex items-center gap-2">
                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Lieu de Naissance
                </label>
                <input type="text" id="lieu_de_naissance" name="lieu_de_naissance" value="{{ old('lieu_de_naissance', ucfirst($user->lieu_de_naissance)) }}" class="mt-1 block w-full border-blue-300 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm p-2 transition duration-200" required>
                @error('lieu_de_naissance')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="animate-fade-in-up">
                <label for="sexe" class="block text-blue-900 font-semibold flex items-center gap-2">
                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                    Sexe
                </label>
                <select name="sexe" id="sexe" class="mt-1 block w-full border-blue-300 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm p-2 transition duration-200 bg-orange-50" required>
                    <option value="homme" {{ old('sexe', $user->sexe) == 'homme' ? 'selected' : '' }}>Homme</option>
                    <option value="femme" {{ old('sexe', $user->sexe) == 'femme' ? 'selected' : '' }}>Femme</option>
                    <option value="autre" {{ old('sexe', $user->sexe) == 'autre' ? 'selected' : '' }}>Autre</option>
                </select>
                @error('sexe')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="animate-fade-in-up">
                <label for="role" class="block text-blue-900 font-semibold flex items-center gap-2">
                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Rôle
                </label>
                <select name="role" id="role" class="mt-1 block w-full border-blue-300 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm p-2 transition duration-200 bg-orange-50" required>
                    <option value="student" {{ old('role', $user->role) == 'student' ? 'selected' : '' }}>Étudiant</option>
                    <option value="teacher" {{ old('role', $user->role) == 'teacher' ? 'selected' : '' }}>Enseignant</option>
                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Administrateur</option>
                </select>
                @error('role')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 animate-fade-in-up">
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white p-3 rounded-lg shadow-md transition duration-300 ease-in-out w-full sm:w-auto flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Mettre à jour
                </button>
                <a href="{{ route('users.index') }}" class="text-blue-500 hover:text-blue-700 underline text-center w-full sm:w-auto flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Retour à la liste
                </a>
            </div>
        </form>
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