<x-app-layout>
    <!-- En-tête avec dégradé rouge -->
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-white leading-tight bg-gradient-to-r from-red-600 to-red-800 p-4 rounded-lg shadow-md animate-fade-in-down">
            {{ __('Tableau de Bord Admin') }}
        </h2>
    </x-slot>

    <!-- Contenu principal -->
    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-orange-100 py-12 px-4">

        <!-- Bloc Admin : liens d'action -->
        <div class="container mx-auto flex items-center space-x-4 mb-8 scroll-reveal">
            <h4 class="text-blue-900 text-2xl font-bold">Admin</h4>
            <a href="{{ route('cours.create') }}" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow-md transition duration-300 ease-in-out">
                Créer un nouveau cours
            </a>
        </div>

        <div class="container mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg sm:rounded-xl border border-orange-200 p-8 scroll-reveal">

                <!-- Cards de statistiques -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                    <!-- Utilisateurs -->
                    <div class="bg-orange-50 rounded-xl shadow-md p-6 border border-blue-200 hover:scale-105 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center space-x-4">
                            <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            <div>
                                <h3 class="text-lg font-semibold text-blue-900">Utilisateurs</h3>
                                <p class="text-3xl font-bold text-red-600">{{ $userCount }}</p>
                                <a href="{{ route('users.index') }}" class="text-red-500 hover:text-red-600 font-medium transition duration-300">Voir tous les utilisateurs</a>
                            </div>
                        </div>
                    </div>

                    <!-- Cours -->
                    <div class="bg-orange-50 rounded-xl shadow-md p-6 border border-blue-200 hover:scale-105 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center space-x-4">
                            <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            <div>
                                <h3 class="text-lg font-semibold text-blue-900">Cours</h3>
                                <p class="text-3xl font-bold text-red-600">{{ $coursCount }}</p>
                                <a href="{{ route('cours.index') }}" class="text-red-500 hover:text-red-600 font-medium transition duration-300">Voir tous les cours</a>
                            </div>
                        </div>
                    </div>

                    <!-- Commandes -->
                    <div class="bg-orange-50 rounded-xl shadow-md p-6 border border-blue-200 hover:scale-105 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center space-x-4">
                            <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18l-2 13H5L3 3zm4 18a2 2 0 100-4 2 2 0 000 4zm10 0a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                            <div>
                                <h3 class="text-lg font-semibold text-blue-900">Commandes</h3>
                                <p class="text-3xl font-bold text-red-600">4</p>
                                {{-- {{ route('admin.orders.index') }} --}}
                                <a href="" class="text-red-500 hover:text-red-600 font-medium transition duration-300">Voir toutes les commandes</a>
                            </div>
                        </div>
                    </div>

                    <!-- Nombre d'étudiants -->
                    <div class="bg-orange-50 rounded-xl shadow-md p-6 border border-blue-200 hover:scale-105 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center space-x-4">
                            <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            <div>
                                <h3 class="text-lg font-semibold text-blue-900">Nombre d'étudiants</h3>
                                <p class="text-3xl font-bold text-red-600">{{ $studentCount }}</p>
                                <a href="{{ route('admin.students.index') }}" class="text-red-500 hover:text-red-600 font-medium transition duration-300">Voir tous les étudiants</a>
                            </div>
                        </div>
                    </div>

                    <!-- Nombre d'enseignants -->
                    <div class="bg-orange-50 rounded-xl shadow-md p-6 border border-blue-200 hover:scale-105 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center space-x-4">
                            <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2 2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                            <div>
                                <h3 class="text-lg font-semibold text-blue-900">Nombre d'enseignants</h3>
                                <p class="text-3xl font-bold text-red-600">{{ $teacherCount }}</p>
                                <a href="{{ route('admin.teachers.index') }}" class="text-red-500 hover:text-red-600 font-medium transition duration-300">Voir tous les enseignants</a>
                            </div>
                        </div>
                    </div>

                    <!-- Revenus -->
                    <div class="bg-orange-50 rounded-xl shadow-md p-6 border border-blue-200 hover:scale-105 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center space-x-4">
                            <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <div>
                                <h3 class="text-lg font-semibold text-blue-900">Revenus</h3>
                                <p class="text-3xl font-bold text-red-600">330 €</p>
                                <a href="{{ route('admin.reports') }}" class="text-red-500 hover:text-red-600 font-medium transition duration-300">Voir les rapports</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tableau des derniers utilisateurs inscrits -->
                <div class="mt-10 scroll-reveal">
                    <h2 class="text-xl font-semibold mb-4 text-blue-800">Derniers utilisateurs inscrits</h2>
                    <div class="bg-orange-50 rounded-xl shadow-md overflow-hidden border border-blue-200">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-blue-200">
                                <thead class="bg-red-600 text-white">
                                    <tr>
                                        <th class="py-3 px-6 text-left text-sm font-medium">Nom</th>
                                        <th class="py-3 px-6 text-left text-sm font-medium">Email</th>
                                        <th class="py-3 px-6 text-left text-sm font-medium">Date d'inscription</th>
                                        <th class="py-3 px-6 text-left text-sm font-medium">Rôle</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-blue-100">
                                    @foreach ($newUsers as $user)
                                        <tr class="hover:bg-red-50 transition-colors duration-200">
                                            <td class="py-4 px-6 text-gray-700">{{ $user->name }}</td>
                                            <td class="py-4 px-6 text-gray-700">{{ $user->email }}</td>
                                            <td class="py-4 px-6 text-gray-700">{{ $user->created_at->format('d/m/Y H:i') }}</td>
                                            <td class="py-4 px-6 text-gray-700">{{ $user->role }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Statistiques d'Activité -->
                <div class="mt-10 scroll-reveal">
                    <h2 class="text-xl font-semibold mb-4 text-blue-800">Statistiques d'Activité</h2>
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
                <div class="mt-10 scroll-reveal">
                    <h2 class="text-xl font-semibold mb-4 text-blue-800">Paramètres Système</h2>
                    <div class="bg-orange-50 shadow-lg rounded-xl p-6 border border-blue-200">
                        <p class="text-gray-700 mb-4">Accédez aux options de configuration globale.</p>
                        {{-- {{ route('admin.settings') }} --}}
                        <a href="" class="text-red-500 hover:text-red-600 hover:underline font-semibold transition duration-300">Modifier les Paramètres</a>
                    </div>
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
                        entry.target.classList.remove('visible'); // Réanimer au retour
                    }
                });
            }, { threshold: 0.2 });

            elements.forEach(element => observer.observe(element));
        });
    </script>
</x-app-layout>