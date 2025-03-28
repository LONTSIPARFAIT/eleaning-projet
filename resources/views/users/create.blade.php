@extends('layouts.admin')

@section('title', 'Créer un utilisateur')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-orange-100 dark:bg-gradient-to-br dark:from-gray-900 dark:to-gray-800 py-8 px-4 sm:px-6 lg:px-8 flex items-center justify-center">
    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-6 sm:p-8 max-w-lg w-full scroll-reveal border border-blue-200 dark:border-gray-700">
        <h1 class="text-3xl font-bold text-blue-800 dark:text-orange-400 text-center mb-6 animate-fade-in-down">Ajouter un Utilisateur</h1>

        <form action="{{ route('users.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="animate-fade-in-up">
                <label for="name" class="block text-blue-900 dark:text-orange-400 font-semibold">Nom</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full border-blue-300 dark:border-gray-600 focus:border-red-500 dark:focus:border-orange-500 focus:ring-red-500 dark:focus:ring-orange-500 rounded-md shadow-sm p-2 transition duration-200 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-200" required>
                @error('name')
                    <span class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="animate-fade-in-up">
                <label for="email" class="block text-blue-900 dark:text-orange-400 font-semibold">Email</label>
                <input type="email" name="email" id="email" class="mt-1 block w-full border-blue-300 dark:border-gray-600 focus:border-red-500 dark:focus:border-orange-500 focus:ring-red-500 dark:focus:ring-orange-500 rounded-md shadow-sm p-2 transition duration-200 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-200" required>
                @error('email')
                    <span class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="animate-fade-in-up">
                <label for="password" class="block text-blue-900 dark:text-orange-400 font-semibold">Mot de passe</label>
                <input type="password" name="password" id="password" class="mt-1 block w-full border-blue-300 dark:border-gray-600 focus:border-red-500 dark:focus:border-orange-500 focus:ring-red-500 dark:focus:ring-orange-500 rounded-md shadow-sm p-2 transition duration-200 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-200" required>
                @error('password')
                    <span class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="animate-fade-in-up">
                <label for="password_confirmation" class="block text-blue-900 dark:text-orange-400 font-semibold">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full border-blue-300 dark:border-gray-600 focus:border-red-500 dark:focus:border-orange-500 focus:ring-red-500 dark:focus:ring-orange-500 rounded-md shadow-sm p-2 transition duration-200 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-200" required>
            </div>

            <div class="animate-fade-in-up">
                <label for="role" class="block text-blue-900 dark:text-orange-400 font-semibold">Rôle</label>
                <select name="role" id="role" class="mt-1 block w-full border-blue-300 dark:border-gray-600 focus:border-red-500 dark:focus:border-orange-500 focus:ring-red-500 dark:focus:ring-orange-500 rounded-md shadow-sm p-2 transition duration-200 bg-orange-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200">
                    <option value="student">Étudiant</option>
                    <option value="teacher">Enseignant</option>
                    <option value="admin">Administrateur</option>
                </select>
                @error('role')
                    <span class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="animate-fade-in-up">
                <label for="date_de_naissance" class="block text-blue-900 dark:text-orange-400 font-semibold">Date de Naissance</label>
                <input id="date_de_naissance" type="date" name="date_de_naissance" class="mt-1 block w-full border-blue-300 dark:border-gray-600 focus:border-red-500 dark:focus:border-orange-500 focus:ring-red-500 dark:focus:ring-orange-500 rounded-md shadow-sm p-2 transition duration-200 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-200" required />
                @error('date_de_naissance')
                    <span class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="animate-fade-in-up">
                <label for="lieu_de_naissance" class="block text-blue-900 dark:text-orange-400 font-semibold">Lieu de Naissance</label>
                <input id="lieu_de_naissance" type="text" name="lieu_de_naissance" placeholder="ex: Bafoussam" class="mt-1 block w-full border-blue-300 dark:border-gray-600 focus:border-red-500 dark:focus:border-orange-500 focus:ring-red-500 dark:focus:ring-orange-500 rounded-md shadow-sm p-2 transition duration-200 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-200" required />
                @error('lieu_de_naissance')
                    <span class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="animate-fade-in-up">
                <label for="sexe" class="block text-blue-900 dark:text-orange-400 font-semibold">Sexe</label>
                <select id="sexe" name="sexe" class="mt-1 block w-full border-blue-300 dark:border-gray-600 focus:border-red-500 dark:focus:border-orange-500 focus:ring-red-500 dark:focus:ring-orange-500 rounded-md shadow-sm p-2 transition duration-200 bg-orange-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200" required>
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                    <option value="autre">Autre</option>
                </select>
                @error('sexe')
                    <span class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 animate-fade-in-up">
                <button type="submit" class="bg-red-500 hover:bg-red-600 dark:bg-orange-500 dark:hover:bg-orange-600 text-white p-3 rounded-lg shadow-md transition duration-300 ease-in-out w-full sm:w-auto">
                    Créer Utilisateur
                </button>
                <a href="{{ route('users.index') }}" class="text-blue-500 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300 underline text-center w-full sm:w-auto">
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