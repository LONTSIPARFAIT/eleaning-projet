<x-app-layout>
    <!-- En-tête avec dégradé rouge -->
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-white leading-tight bg-gradient-to-r from-red-600 to-red-800 dark:from-gray-800 dark:to-gray-700 p-4 rounded-lg shadow-md animate-fade-in-down">
            <svg class="w-6 h-6 inline-block mr-2 text-white dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
            {{ __('Tableau de Bord Admin') }}
        </h2>
    </x-slot>

    <!-- Contenu principal -->
    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-orange-100 dark:bg-gradient-to-br dark:from-gray-900 dark:to-gray-800 py-12 px-4">
        <div class="container mx-auto max-w-7xl sm:px-6 lg:px-8">

            <!-- Bloc Admin : liens d'action -->
            <div class="bg-orange-50 dark:bg-gray-800 shadow-lg rounded-xl p-6 mb-6 border border-blue-200 dark:border-orange-600 scroll-reveal flex justify-between items-center">
                <h4 class="text-blue-900 dark:text-orange-400 text-2xl font-bold">
                    <svg class="w-6 h-6 inline-block mr-2 text-blue-900 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2"></path></svg>
                    Admin
                </h4>
                <a href="{{ route('cours.create') }}" class="bg-red-500 hover:bg-red-600 dark:bg-orange-500 dark:hover:bg-orange-600 text-white px-6 py-2 rounded-lg shadow-md transition duration-300 ease-in-out">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Créer un nouveau cours
                </a>
            </div>

            <!-- Conteneur principal en deux colonnes -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Colonne gauche : Statistiques -->
                <div class="lg:col-span-2 scroll-reveal">
                    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-6 border border-orange-200 dark:border-orange-600">
                        <h2 class="text-xl font-semibold text-blue-800 dark:text-orange-400 mb-6">
                            <svg class="w-6 h-6 inline-block mr-2 text-blue-800 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                            Statistiques
                        </h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="bg-orange-50 dark:bg-gray-700 rounded-lg p-4 border border-blue-200 dark:border-orange-600 hover:scale-105 transition-all duration-300">
                                <h3 class="text-lg font-semibold text-blue-900 dark:text-orange-400 flex items-center gap-2">
                                    <svg class="w-6 h-6 text-red-500 dark:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                    Utilisateurs
                                </h3>
                                <p class="text-2xl font-bold text-red-600 dark:text-orange-400 mt-2">{{ $userCount }}</p>
                                <a href="{{ route('users.index') }}" class="text-red-500 dark:text-orange-500 hover:text-red-600 dark:hover:text-orange-600 text-sm transition duration-300">
                                    <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    Voir tous les utilisateurs
                                </a>
                            </div>
                            <div class="bg-orange-50 dark:bg-gray-700 rounded-lg p-4 border border-blue-200 dark:border-orange-600 hover:scale-105 transition-all duration-300">
                                <h3 class="text-lg font-semibold text-blue-900 dark:text-orange-400 flex items-center gap-2">
                                    <svg class="w-6 h-6 text-red-500 dark:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                    Cours
                                </h3>
                                <p class="text-2xl font-bold text-red-600 dark:text-orange-400 mt-2">{{ $coursCount }}</p>
                                <a href="{{ route('cours.index') }}" class="text-red-500 dark:text-orange-500 hover:text-red-600 dark:hover:text-orange-600 text-sm transition duration-300">
                                    <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    Voir tous les cours
                                </a>
                            </div>
                            {{-- <div class="bg-orange-50 dark:bg-gray-700 rounded-lg p-4 border border-blue-200 dark:border-orange-600 hover:scale-105 transition-all duration-300">
                                <h3 class="text-lg font-semibold text-blue-900 dark:text-orange-400 flex items-center gap-2">
                                    <svg class="w-6 h-6 text-red-500 dark:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18l-2 13H5L3 3zm4 18a2 2 0 100-4 2 2 0 000 4zm10 0a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                                    Commandes
                                </h3>
                                <p class="text-2xl font-bold text-red-600 dark:text-orange-400 mt-2">4</p>
                                <a href="" class="text-red-500 dark:text-orange-500 hover:text-red-600 dark:hover:text-orange-600 text-sm transition duration-300">
                                    <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    Voir toutes les commandes
                                </a>
                            </div> --}}
                            <div class="bg-orange-50 dark:bg-gray-700 rounded-lg p-4 border border-blue-200 dark:border-orange-600 hover:scale-105 transition-all duration-300">
                                <h3 class="text-lg font-semibold text-blue-900 dark:text-orange-400 flex items-center gap-2">
                                    <svg class="w-6 h-6 text-red-500 dark:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                    Étudiants
                                </h3>
                                <p class="text-2xl font-bold text-red-600 dark:text-orange-400 mt-2">{{ $studentCount }}</p>
                                <a href="" class="text-red-500 dark:text-orange-500 hover:text-red-600 dark:hover:text-orange-600 text-sm transition duration-300">
                                    <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    Voir tous les étudiants
                                </a>
                            </div>
                            <div class="bg-orange-50 dark:bg-gray-700 rounded-lg p-4 border border-blue-200 dark:border-orange-600 hover:scale-105 transition-all duration-300">
                                <h3 class="text-lg font-semibold text-blue-900 dark:text-orange-400 flex items-center gap-2">
                                    <svg class="w-6 h-6 text-red-500 dark:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                                    Formateir
                                </h3>
                                <p class="text-2xl font-bold text-red-600 dark:text-orange-400 mt-2">{{ $teacherCount }}</p>
                                <a href="" class="text-red-500 dark:text-orange-500 hover:text-red-600 dark:hover:text-orange-600 text-sm transition duration-300">
                                    <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    Voir tous les enseignants
                                </a>
                            </div>
                            {{-- <div class="bg-orange-50 dark:bg-gray-700 rounded-lg p-4 border border-blue-200 dark:border-orange-600 hover:scale-105 transition-all duration-300">
                                <h3 class="text-lg font-semibold text-blue-900 dark:text-orange-400 flex items-center gap-2">
                                    <svg class="w-6 h-6 text-red-500 dark:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Revenus
                                </h3>
                                <p class="text-2xl font-bold text-red-600 dark:text-orange-400 mt-2">330 €</p>
                                <a href="" class="text-red-500 dark:text-orange-500 hover:text-red-600 dark:hover:text-orange-600 text-sm transition duration-300">
                                    <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    Voir les rapports
                                </a>
                            </div> --}}
                        </div>
                    </div>
                </div>

                <!-- Colonne droite : Activité et Paramètres -->
                <div class="space-y-6">
                    <!-- Statistiques d'Activité -->
                    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-6 border border-orange-200 dark:border-orange-600 scroll-reveal">
                        <h2 class="text-xl font-semibold text-blue-800 dark:text-orange-400 mb-4">
                            <svg class="w-6 h-6 inline-block mr-2 text-blue-800 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                            Activité Récente
                        </h2>
                        <div class="space-y-4">
                            <div>
                                <h3 class="text-lg font-semibold text-red-600 dark:text-orange-400 flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                    Inscriptions Récentes
                                </h3>
                                <p class="text-2xl font-bold text-blue-900 dark:text-orange-400">{{ $recentRegistrations ?? 45 }}</p>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-red-600 dark:text-orange-400 flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                    Cours Créés ce Mois
                                </h3>
                                <p class="text-2xl font-bold text-blue-900 dark:text-orange-400">{{ $monthlyCourses ?? 8 }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Paramètres Système -->
                    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-6 border border-orange-200 dark:border-orange-600 scroll-reveal">
                        <h2 class="text-xl font-semibold text-blue-800 dark:text-orange-400 mb-4">
                            <svg class="w-6 h-6 inline-block mr-2 text-blue-800 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            Paramètres
                        </h2>
                        <p class="text-gray-700 dark:text-gray-300 mb-4">Options de configuration globale.</p>
                        <a href="" class="bg-red-500 hover:bg-red-600 dark:bg-orange-500 dark:hover:bg-orange-600 text-white px-4 py-2 rounded-lg shadow-md transition duration-300">
                            <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            Modifier les Paramètres
                        </a>
                    </div>
                </div>
            </div>

            <!-- Tableau des derniers utilisateurs -->
            <div class="mt-6 bg-white dark:bg-gray-800 shadow-lg rounded-xl p-6 border border-orange-200 dark:border-orange-600 scroll-reveal">
                <h2 class="text-xl font-semibold text-blue-800 dark:text-orange-400 mb-4">
                    <svg class="w-6 h-6 inline-block mr-2 text-blue-800 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    Derniers Utilisateurs Inscrits
                </h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-red-600 dark:bg-orange-600 text-white">
                            <tr>
                                <th class="py-3 px-4 text-sm font-medium rounded-tl-lg">
                                    <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    Nom
                                </th>
                                <th class="py-3 px-4 text-sm font-medium">
                                    <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    Email
                                </th>
                                <th class="py-3 px-4 text-sm font-medium">
                                    <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    Date
                                </th>
                                <th class="py-3 px-4 text-sm font-medium rounded-tr-lg">
                                    <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                                    Rôle
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-orange-50 dark:bg-gray-700 divide-y divide-blue-200 dark:divide-orange-600">
                            @foreach ($newUsers as $user)
                                <tr class="hover:bg-red-100 dark:hover:bg-gray-600 transition-colors duration-200">
                                    <td class="py-3 px-4 text-gray-700 dark:text-gray-300">{{ $user->name }}</td>
                                    <td class="py-3 px-4 text-gray-700 dark:text-gray-300">{{ $user->email }}</td>
                                    <td class="py-3 px-4 text-gray-700 dark:text-gray-300">{{ $user->created_at->format('d/m/Y') }}</td>
                                    <td class="py-3 px-4 text-gray-700 dark:text-gray-300">{{ $user->role }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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
                        entry.target.classList.remove('visible');
                    }
                });
            }, { threshold: 0.2 });

            elements.forEach(element => observer.observe(element));
        });
    </script>
</x-app-layout>
