<!-- resources/views/admin/dashboard.blade.php -->
<x-app-layout>
    <!-- En-tête avec dégradé rouge -->
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-white leading-tight bg-gradient-to-r from-red-600 to-red-800 p-4 rounded-lg shadow-md">
            {{ __('Gestion des cours') }}
        </h2>
    </x-slot>

    <!-- Conteneur principal avec deux colonnes -->
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-6">
                <!-- Colonne gauche : Navigation -->
                <div class="lg:w-1/4 bg-white rounded-xl shadow-lg p-6 border border-gray-200">
                    <h4 class="text-slate-700 text-xl font-bold mb-4">Admin</h4>
                    <ul class="space-y-3">
                        <li>
                            <a href="{{ route('cours.create') }}" class="block bg-red-600 hover:bg-red-800 text-white px-4 py-2 rounded-lg shadow-md transition duration-300 ease-in-out">
                                Créer un nouveau cours
                            </a>
                        </li>
                        <!-- Ajout d'autres liens pour la navigation (exemples) -->
                        <li>
                            <a href="{{ route('users.index') }}" class="block bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg transition duration-300 ease-in-out">
                                Gérer les utilisateurs
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('cours.index') }}" class="block bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg transition duration-300 ease-in-out">
                                Gérer les cours
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg transition duration-300 ease-in-out">
                                Rapports
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Colonne droite : Contenu principal -->
                <div class="lg:w-3/4 bg-white rounded-xl shadow-lg p-8 border border-gray-200">
                    <!-- Cards de statistiques -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        <!-- Utilisateurs -->
                        <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                            <div class="flex items-center space-x-4">
                                <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-700">Utilisateurs</h3>
                                    <p class="text-3xl font-bold text-gray-900">{{ $userCount }}</p>
                                    <a href="{{ route('users.index') }}" class="text-red-600 hover:text-red-800 font-medium">Voir tous les utilisateurs</a>
                                </div>
                            </div>
                        </div>

                        <!-- Cours -->
                        <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                            <div class="flex items-center space-x-4">
                                <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-700">Cours</h3>
                                    <p class="text-3xl font-bold text-gray-900">{{ $coursCount }}</p>
                                    <a href="{{ route('cours.index') }}" class="text-red-600 hover:text-red-800 font-medium">Voir tous les cours</a>
                                </div>
                            </div>
                        </div>

                        <!-- Commandes -->
                        <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                            <div class="flex items-center space-x-4">
                                <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18l-2 13H5L3 3zm4 18a2 2 0 100-4 2 2 0 000 4zm10 0a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-700">Commandes</h3>
                                    <p class="text-3xl font-bold text-gray-900">4</p>
                                    <a href="#" class="text-red-600 hover:text-red-800 font-medium">Voir toutes les commandes</a>
                                </div>
                            </div>
                        </div>

                        <!-- Nombre d'étudiants -->
                        <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                            <div class="flex items-center space-x-4">
                                <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-700">Nombre d'étudiants</h3>
                                    <p class="text-3xl font-bold text-gray-900">{{ $studentCount }}</p>
                                    <a href="#" class="text-red-600 hover:text-red-800 font-medium">Voir tous les étudiants</a>
                                </div>
                            </div>
                        </div>

                        <!-- Nombre d'enseignants -->
                        <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                            <div class="flex items-center space-x-4">
                                <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-700">Nombre d'enseignants</h3>
                                    <p class="text-3xl font-bold text-gray-900">{{ $teacherCount }}</p>
                                    <a href="#" class="text-red-600 hover:text-red-800 font-medium">Voir tous les enseignants</a>
                                </div>
                            </div>
                        </div>

                        <!-- Revenus -->
                        <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                            <div class="flex items-center space-x-4">
                                <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-700">Revenus</h3>
                                    <p class="text-3xl font-bold text-gray-900">330 €</p>
                                    <a href="#" class="text-red-600 hover:text-red-800 font-medium">Voir les rapports</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fin des cards -->

                    <!-- Tableau des derniers utilisateurs inscrits -->
                    <div class="mt-10">
                        <h2 class="text-xl font-semibold mb-4 text-gray-700">Derniers utilisateurs inscrits</h2>
                        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-red-600 text-white">
                                        <tr>
                                            <th class="py-3 px-6 text-left text-sm font-medium">Nom</th>
                                            <th class="py-3 px-6 text-left text-sm font-medium">Email</th>
                                            <th class="py-3 px-6 text-left text-sm font-medium">Date d'inscription</th>
                                            <th class="py-3 px-6 text-left text-sm font-medium">Rôle</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-100">
                                        @foreach ($newUsers as $user)
                                            <tr class="hover:bg-red-50 transition-colors duration-200">
                                                <td class="py-4 px-6">{{ $user->name }}</td>
                                                <td class="py-4 px-6">{{ $user->email }}</td>
                                                <td class="py-4 px-6">{{ $user->created_at->format('d/m/Y H:i') }}</td>
                                                <td class="py-4 px-6">{{ $user->role }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Fin du tableau -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
