@extends('layouts.admin')

@section('title', 'Tableau de Bord Admin')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-orange-100 px-4 py-8">

    <!-- Header -->
    <div class="container mx-auto animate-fade-in-down bg-white rounded-lg shadow-xl p-6 mb-8 border-l-4 border-red-500">
        <h1 class="text-2xl sm:text-3xl font-bold text-blue-900 mb-4">Tableau de Bord Admin</h1>
        <p class="text-lg sm:text-xl text-blue-700">
            Bienvenue, <span class="font-bold text-orange-600">{{ Auth::user()->name ?? 'Administrateur' }}</span> !
            Gérez la plateforme depuis ici.
        </p>
    </div>

    <!-- Statistiques -->
    <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8 scroll-reveal">
        <div class="bg-orange-50 shadow-lg rounded-xl p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-blue-200">
            <h3 class="text-lg font-bold text-blue-900 mb-2">Total des Cours</h3>
            <p class="text-4xl font-bold text-red-600">{{ $totalCourses ?? 25 }}</p>
        </div>
        <div class="bg-orange-50 shadow-lg rounded-xl p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-blue-200">
            <h3 class="text-lg font-bold text-blue-900 mb-2">Utilisateurs</h3>
            <p class="text-4xl font-bold text-red-600">{{ $totalUsers ?? 150 }}</p>
        </div>
        <div class="bg-orange-50 shadow-lg rounded-xl p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-blue-200">
            <h3 class="text-lg font-bold text-blue-900 mb-2">Enseignants</h3>
            <p class="text-4xl font-bold text-red-600">{{ $totalTeachers ?? 10 }}</p>
        </div>
        <div class="bg-orange-50 shadow-lg rounded-xl p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-blue-200">
            <h3 class="text-lg font-bold text-blue-900 mb-2">Étudiants</h3>
            <p class="text-4xl font-bold text-red-600">{{ $totalStudents ?? 140 }}</p>
        </div>
    </div>

    <!-- Gestion des Utilisateurs -->
    <div class="container mx-auto scroll-reveal">
        <h2 class="text-xl sm:text-2xl font-semibold text-blue-800 mb-4">Gestion des Utilisateurs</h2>
        <div class="bg-orange-50 shadow-lg rounded-xl p-6 border border-blue-200">
            <div class="flex justify-between items-center mb-4">
                <p class="text-gray-700">Gérez les comptes des utilisateurs de la plateforme.</p>
                <a href="{{ route('admin.users.index') }}" class="text-red-500 hover:text-red-600 hover:underline font-semibold transition duration-300">Voir tous les utilisateurs</a>
            </div>
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-blue-100 text-blue-900">
                        <th class="py-3 px-4 font-semibold rounded-tl-xl">Nom</th>
                        <th class="py-3 px-4 font-semibold">Rôle</th>
                        <th class="py-3 px-4 font-semibold rounded-tr-xl">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($recentUsers ?? [] as $user)
                        <tr class="border-b border-blue-200 hover:bg-red-100 transition duration-300">
                            <td class="py-3 px-4 text-gray-700">{{ $user->name }}</td>
                            <td class="py-3 px-4 text-gray-700">{{ ucfirst($user->role) }}</td>
                            <td class="py-3 px-4">
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-500 hover:underline">Modifier</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="py-3 px-4 text-gray-600 text-center">Aucun utilisateur récent.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Gestion des Cours -->
    <div class="container mx-auto mt-8 scroll-reveal">
        <h2 class="text-xl sm:text-2xl font-semibold text-blue-800 mb-4">Gestion des Cours</h2>
        <div class="bg-orange-50 shadow-lg rounded-xl p-6 border border-blue-200">
            <div class="flex justify-between items-center mb-4">
                <p class="text-gray-700">Supervisez et modifiez les cours disponibles.</p>
                <a href="{{ route('admin.courses.index') }}" class="text-red-500 hover:text-red-600 hover:underline font-semibold transition duration-300">Voir tous les cours</a>
            </div>
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-blue-100 text-blue-900">
                        <th class="py-3 px-4 font-semibold rounded-tl-xl">Titre</th>
                        <th class="py-3 px-4 font-semibold">Enseignant</th>
                        <th class="py-3 px-4 font-semibold rounded-tr-xl">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($recentCourses ?? [] as $course)
                        <tr class="border-b border-blue-200 hover:bg-red-100 transition duration-300">
                            <td class="py-3 px-4 text-gray-700">{{ $course->title }}</td>
                            <td class="py-3 px-4 text-gray-700">{{ $course->teacher->name ?? 'N/A' }}</td>
                            <td class="py-3 px-4">
                                <a href="{{ route('admin.courses.edit', $course->id) }}" class="text-blue-500 hover:underline">Modifier</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="py-3 px-4 text-gray-600 text-center">Aucun cours récent.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Statistiques d'Activité -->
    <div class="container mx-auto mt-8 scroll-reveal">
        <h2 class="text-xl sm:text-2xl font-semibold text-blue-800 mb-4">Statistiques d'Activité</h2>
        <div class="bg-orange-50 shadow-lg rounded-xl p-6 border border-blue-200">
            <p class="text-gray-700 mb-4">Aperçu rapide de l'activité récente sur la plateforme.</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-lg font-semibold text-red-600">Inscriptions Récentes</h3>
                    <p class="text-3xl font-bold text-blue-900">{{ $recentRegistrations ?? 45 }}</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-red-600">Cours Créés ce Mois</h3>
                    <p class="text-3xl font-bold text-blue-900">{{ $monthlyCourses ?? 8 }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Paramètres Système -->
    <div class="container mx-auto mt-8 scroll-reveal">
        <h2 class="text-xl sm:text-2xl font-semibold text-blue-800 mb-4">Paramètres Système</h2>
        <div class="bg-orange-50 shadow-lg rounded-xl p-6 border border-blue-200">
            <p class="text-gray-700 mb-4">Accédez aux options de configuration globale.</p>
            <a href="{{ route('admin.settings') }}" class="text-red-500 hover:text-red-600 hover:underline font-semibold transition duration-300">Modifier les Paramètres</a>
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
                    entry.target.classList.remove('visible'); // Réanimer au retour
                }
            });
        }, { threshold: 0.2 });

        elements.forEach(element => observer.observe(element));
    });
</script>
@endsection
