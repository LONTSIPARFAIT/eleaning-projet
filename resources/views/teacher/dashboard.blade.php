<x-app-layout>
    <!-- En-tête avec dégradé rouge -->
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-white leading-tight bg-gradient-to-r from-red-600 to-red-800 p-4 rounded-lg shadow-md animate-fade-in-down">
            {{ __('Tableau de Bord Enseignant') }}
        </h2>
    </x-slot>

    <!-- Contenu principal -->
    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-orange-100 py-12 px-4">
        <div class="container mx-auto max-w-7xl sm:px-6 lg:px-8">

            <!-- Bloc Enseignant : liens d'action -->
            <div class="bg-orange-50 shadow-lg rounded-xl p-6 mb-6 border border-blue-200 scroll-reveal flex justify-between items-center">
                <h4 class="text-blue-900 text-2xl font-bold">Enseignant</h4>
                <a href="{{ route('cours.create') }}" class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-lg shadow-md transition duration-300 ease-in-out">
                    Créer un nouveau cours
                </a>
            </div>

            <!-- Conteneur principal en deux colonnes -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Colonne gauche : Statistiques -->
                <div class="lg:col-span-2 scroll-reveal">
                    <div class="bg-white shadow-lg rounded-xl p-6 border border-orange-200">
                        <h2 class="text-xl font-semibold text-blue-800 mb-6">Statistiques</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="bg-orange-50 rounded-lg p-4 border border-blue-200 hover:scale-105 transition-all duration-300">
                                <h3 class="text-lg font-semibold text-blue-900 flex items-center gap-2">
                                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                    Mes Cours
                                </h3>
                                <p class="text-2xl font-bold text-red-600 mt-2">{{ $teacherCoursesCount ?? 10 }}</p>
                                <a href="{{ route('cours.index') }}" class="text-red-500 hover:text-red-600 text-sm transition duration-300">Voir tous mes cours</a>
                            </div>
                            <div class="bg-orange-50 rounded-lg p-4 border border-blue-200 hover:scale-105 transition-all duration-300">
                                <h3 class="text-lg font-semibold text-blue-900 flex items-center gap-2">
                                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                    Étudiants Inscrits
                                </h3>
                                <p class="text-2xl font-bold text-red-600 mt-2">{{ $enrolledStudentsCount ?? 50 }}</p>
                                <a href="{{ route('teacher.students') }}" class="text-red-500 hover:text-red-600 text-sm transition duration-300">Voir tous les étudiants</a>
                            </div>
                            <div class="bg-orange-50 rounded-lg p-4 border border-blue-200 hover:scale-105 transition-all duration-300">
                                <h3 class="text-lg font-semibold text-blue-900 flex items-center gap-2">
                                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Revenus Générés
                                </h3>
                                <p class="text-2xl font-bold text-red-600 mt-2">{{ $teacherRevenue ?? '250 €' }}</p>
                                <a href="{{ route('teacher.reports') }}" class="text-red-500 hover:text-red-600 text-sm transition duration-300">Voir les rapports</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Colonne droite : Activité et Actions -->
                <div class="space-y-6">
                    <!-- Statistiques d'Activité -->
                    <div class="bg-white shadow-lg rounded-xl p-6 border border-orange-200 scroll-reveal">
                        <h2 class="text-xl font-semibold text-blue-800 mb-4">Activité Récente</h2>
                        <div class="space-y-4">
                            <div>
                                <h3 class="text-lg font-semibold text-red-600 flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                    Nouveaux Inscrits
                                </h3>
                                <p class="text-2xl font-bold text-blue-900">{{ $recentEnrollments ?? 15 }}</p>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-red-600 flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                    Cours Créés ce Mois
                                </h3>
                                <p class="text-2xl font-bold text-blue-900">{{ $monthlyCourses ?? 3 }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Gestion des Cours -->
                    <div class="bg-white shadow-lg rounded-xl p-6 border border-orange-200 scroll-reveal">
                        <h2 class="text-xl font-semibold text-blue-800 mb-4">Gestion</h2>
                        <p class="text-gray-700 mb-4">Gérez vos cours et étudiants.</p>
                        <a href="{{ route('teacher.courses.manage') }}" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow-md transition duration-300">Gérer les Cours</a>
                    </div>
                </div>
            </div>

            <!-- Tableau des derniers inscrits -->
            <div class="mt-6 bg-white shadow-lg rounded-xl p-6 border border-orange-200 scroll-reveal">
                <h2 class="text-xl font-semibold text-blue-800 mb-4">Derniers Étudiants Inscrits</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-red-600 text-white">
                            <tr>
                                <th class="py-3 px-4 text-sm font-medium rounded-tl-lg">Nom</th>
                                <th class="py-3 px-4 text-sm font-medium">Email</th>
                                <th class="py-3 px-4 text-sm font-medium">Cours</th>
                                <th class="py-3 px-4 text-sm font-medium rounded-tr-lg">Date</th>
                            </tr>
                        </thead>
                        <tbody class="bg-orange-50 divide-y divide-blue-200">
                            @foreach ($recentStudents ?? [] as $student)
                                <tr class="hover:bg-red-100 transition-colors duration-200">
                                    <td class="py-3 px-4 text-gray-700">{{ $student->name }}</td>
                                    <td class="py-3 px-4 text-gray-700">{{ $student->email }}</td>
                                    <td class="py-3 px-4 text-gray-700">{{ $student->course_title ?? 'N/A' }}</td>
                                    <td class="py-3 px-4 text-gray-700">{{ $student->enrolled_at->format('d/m/Y') ?? now()->format('d/m/Y') }}</td>
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