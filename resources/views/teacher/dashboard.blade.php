@extends('layouts.admin')

@section('title', 'Tableau de Bord de l\'Enseignant')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 bg-gradient-to-br from-blue-50 to-orange-100" x-data="{ activeSection: 'cours' }">
    <!-- Header -->
    <div class="animate-slide-in-down bg-white rounded-lg shadow-xl p-6 mb-8 border-l-4 border-red-500">
        <h1 class="text-2xl sm:text-3xl font-bold mb-4 text-blue-900">Tableau de Bord de l'Enseignant</h1>
        <p class="text-lg sm:text-xl text-blue-700">
            Bienvenue, <span class="font-bold text-orange-600">{{ Auth::user()->name ?? 'Enseignant' }}</span> !
            Gérez vos cours et vos étudiants ici.
        </p>
    </div>

    <!-- Statistiques -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-orange-50 shadow-lg rounded-xl p-6 transform transition-all duration-300 hover:scale-105 animate-slide-in-up border border-blue-200">
            <h3 class="text-lg font-bold text-blue-900 mb-2">Mes Cours</h3>
            <p class="text-4xl font-bold text-red-600">{{ $cours }}</p>
        </div>
        <div class="bg-orange-50 shadow-lg rounded-xl p-6 transform transition-all duration-300 hover:scale-105 animate-slide-in-up border border-blue-200">
            <h3 class="text-lg font-bold text-blue-900 mb-2">Nombre d'Étudiants</h3>
            <p class="text-4xl font-bold text-red-600">{{ $studentsCount }}</p>
        </div>
        <div class="bg-orange-50 shadow-lg rounded-xl p-6 transform transition-all duration-300 hover:scale-105 animate-slide-in-up border border-blue-200">
            <h3 class="text-lg font-bold text-blue-900 mb-2">Devoirs à Venir</h3>
            <p class="text-4xl font-bold text-red-600">{{ $assignmentsCount ?? 14 }}</p>
        </div>
        <div class="bg-orange-50 shadow-lg rounded-xl p-6 transform transition-all duration-300 hover:scale-105 animate-slide-in-up border border-blue-200">
            <h3 class="text-lg font-bold text-blue-900 mb-2">Prochains Examens</h3>
            <p class="text-4xl font-bold text-red-600">{{ $examsCount ?? 12 }}</p>
        </div>
    </div>

    <!-- Derniers Cours Créés -->
    <div class="mt-8">
        <h2 class="text-xl sm:text-2xl font-semibold mb-4 text-blue-800 animate-fade-in">Derniers Cours Créés</h2>
        <div class="bg-orange-50 shadow-lg rounded-xl p-6 animate-slide-in-up border border-blue-200">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-blue-100 text-blue-900">
                        <th class="py-3 px-4 font-semibold rounded-tl-xl">Titre</th>
                        <th class="py-3 px-4 font-semibold rounded-tr-xl">Date de Création</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($newCourses as $cours)
                        <tr class="border-b border-blue-200 transition-all duration-300 hover:bg-red-100">
                            <td class="py-3 px-4 text-gray-700">{{ $cours->title }}</td>
                            <td class="py-3 px-4 text-gray-700">{{ $cours->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="py-3 px-4 text-gray-600 text-center">Aucun cours créé récemment.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Gestion des Devoirs -->
    <div class="mt-8">
        <h2 class="text-xl sm:text-2xl font-semibold mb-4 text-blue-800 animate-fade-in">Gestion des Devoirs</h2>
        <div class="bg-orange-50 shadow-lg rounded-xl p-6 animate-slide-in-up border border-blue-200">
            <a href="{{ route('assignments.create') }}" class="text-red-500 hover:text-red-600 hover:underline font-semibold transition-colors duration-200">Créer un Nouveau Devoir</a>
            <ul class="mt-4 space-y-3">
                @forelse ($assignments ?? [] as $assignment)
                    <li class="border-b border-red-300 py-2 transition-all duration-300 hover:bg-red-100">
                        <span class="text-gray-700">{{ $assignment->title }} - Échéance : {{ $assignment->due_date->format('d/m/Y') }}</span>
                    </li>
                @empty
                    <li class="text-gray-700 py-2">
                        <strong>Pour le </strong> - Échéance : 12-06-2023
                    </li>
                @endforelse
            </ul>
        </div>
    </div>

    <!-- Messages et Notifications -->
    <div class="mt-8">
        <h2 class="text-xl sm:text-2xl font-semibold mb-4 text-blue-800 animate-fade-in">Messages & Notifications</h2>
        <div class="bg-orange-50 shadow-lg rounded-xl p-6 animate-slide-in-up border border-blue-200">
            <p class="text-gray-700">Nouveaux messages : <span class="font-bold text-red-600">3</span></p>
            <a href="#" class="text-red-500 hover:text-red-600 hover:underline transition-colors duration-200 mt-2 inline-block">Voir tous les messages</a>
        </div>
    </div>

    <!-- Calendrier Scolaire -->
    <div class="mt-8">
        <h2 class="text-xl sm:text-2xl font-semibold mb-4 text-blue-800 animate-fade-in">Calendrier Scolaire</h2>
        <div class="bg-orange-50 shadow-lg rounded-xl p-6 animate-slide-in-up border border-blue-200">
            <a href="{{ route('calendar') }}" class="text-red-500 hover:text-red-600 hover:underline transition-colors duration-200">Voir le Calendrier</a>
        </div>
    </div>
</div>

<!-- Inclusion d'Alpine.js -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<style>
    /* Animations personnalisées avec Tailwind */
    @keyframes slideInDown {
        from { opacity: 0; transform: translateY(-30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes slideInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-slide-in-down {
        animation: slideInDown 0.6s ease-out;
    }
    .animate-slide-in-up {
        animation: slideInUp 0.6s ease-out;
    }
    .animate-fade-in {
        animation: slideInUp 0.8s ease-out;
    }
</style>
@endsection