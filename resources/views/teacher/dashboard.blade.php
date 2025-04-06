@extends('layouts.admin')

@section('title', 'Tableau de Bord de l\'Formateur')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 bg-gradient-to-br from-blue-50 to-orange-100 dark:bg-gradient-to-br dark:from-gray-900 dark:to-gray-800" x-data="{ activeSection: 'cours' }">

        <!-- Header -->
        <div class="animate-slide-in-down bg-white dark:bg-gray-800 rounded-lg shadow-xl p-6 mb-8 border-l-4 border-red-500 dark:border-orange-500 scroll-reveal">
            <h1 class="text-2xl sm:text-3xl font-bold mb-4 text-blue-900 dark:text-orange-400 flex items-center gap-2">
                <svg class="w-8 h-8 text-red-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                Tableau de Bord du Formateur
            </h1>
            <p class="text-lg sm:text-xl text-blue-700 dark:text-gray-300">
                Bienvenue, <span class="font-bold text-orange-600 dark:text-orange-400">{{ Auth::user()->name ?? 'Enseignant' }}</span> !
                Gérez vos cours et vos apprenants ici.
            </p>
        </div>

        <!-- Bloc Enseignant : Lien pour créer un cours -->
        <div class="bg-orange-50 dark:bg-gray-800 shadow-lg rounded-xl p-6 mb-6 border border-blue-200 dark:border-orange-600 scroll-reveal flex justify-between items-center">
            <h4 class="text-blue-900 dark:text-orange-400 text-2xl font-bold flex items-center gap-2">
                <svg class="w-6 h-6 text-red-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                Enseignant
            </h4>
            <a href="{{ route('cours.create') }}" class="bg-red-500 hover:bg-red-600 dark:bg-orange-500 dark:hover:bg-orange-600 text-white px-6 py-2 rounded-lg shadow-md transition duration-300 ease-in-out flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Créer un nouveau cours
            </a>
        </div>

        <!-- Statistiques -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8 scroll-reveal">
            <div class="bg-orange-50 dark:bg-gray-700 shadow-lg rounded-xl p-6 transform transition-all duration-300 hover:scale-105 animate-slide-in-up border border-blue-200 dark:border-orange-600">
                <h3 class="text-lg font-bold text-blue-900 dark:text-orange-400 mb-2 flex items-center gap-2">
                    <svg class="w-6 h-6 text-red-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    Mes Cours
                </h3>
                <p class="text-4xl font-bold text-red-600 dark:text-orange-400">{{ $teacherCoursesCount ?? 10 }}</p>
            </div>
            <div class="bg-orange-50 dark:bg-gray-700 shadow-lg rounded-xl p-6 transform transition-all duration-300 hover:scale-105 animate-slide-in-up border border-blue-200 dark:border-orange-600">
                <h3 class="text-lg font-bold text-blue-900 dark:text-orange-400 mb-2 flex items-center gap-2">
                    <svg class="w-6 h-6 text-red-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 1.857h10M9 5a4 4 0 11-8 0 4 4 0 018 0zM15 5a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    Étudiants Inscrits
                </h3>
                <p class="text-4xl font-bold text-red-600 dark:text-orange-400">{{ $enrolledStudentsCount ?? 50 }}</p>
            </div>
            <div class="bg-orange-50 dark:bg-gray-700 shadow-lg rounded-xl p-6 transform transition-all duration-300 hover:scale-105 animate-slide-in-up border border-blue-200 dark:border-orange-600">
                <h3 class="text-lg font-bold text-blue-900 dark:text-orange-400 mb-2 flex items-center gap-2">
                    <svg class="w-6 h-6 text-red-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Devoirs Assignés
                </h3>
                <p class="text-4xl font-bold text-red-600 dark:text-orange-400">{{ $teacherAssignmentsCount ?? 14 }}</p>
            </div>
            <div class="bg-orange-50 dark:bg-gray-700 shadow-lg rounded-xl p-6 transform transition-all duration-300 hover:scale-105 animate-slide-in-up border border-blue-200 dark:border-orange-600">
                <h3 class="text-lg font-bold text-blue-900 dark:text-orange-400 mb-2 flex items-center gap-2">
                    <svg class="w-6 h-6 text-red-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Revenus Générés
                </h3>
                <p class="text-4xl font-bold text-red-600 dark:text-orange-400">{{ $teacherRevenue ?? '250 €' }}</p>
            </div>
        </div>

        <!-- Derniers Cours Créés -->
        <div class="mt-8 scroll-reveal">
            <h2 class="text-xl sm:text-2xl font-semibold mb-4 text-blue-800 dark:text-orange-400 animate-fade-in flex items-center gap-2">
                <svg class="w-6 h-6 text-red-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                Derniers Cours Créés
            </h2>
            <div class="bg-orange-50 dark:bg-gray-700 shadow-lg rounded-xl p-6 animate-slide-in-up border border-blue-200 dark:border-orange-600">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-blue-100 dark:bg-gray-600 text-blue-900 dark:text-orange-400">
                            <th class="py-3 px-4 font-semibold rounded-tl-xl">Titre</th>
                            <th class="py-3 px-4 font-semibold rounded-tr-xl">Date de Création</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($newCourses as $course)
                            <tr class="border-b border-blue-200 dark:border-orange-600 transition-all duration-300 hover:bg-red-100 dark:hover:bg-gray-600">
                                <td class="py-3 px-4 text-gray-700 dark:text-gray-300">{{ $course->title }}</td>
                                <td class="py-3 px-4 text-gray-700 dark:text-gray-300">{{ $course->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="py-3 px-4 text-gray-600 dark:text-gray-300 text-center">Aucun cours créé récemment.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Gestion des Devoirs -->
        <div class="mt-8 scroll-reveal">
            <h2 class="text-xl sm:text-2xl font-semibold mb-4 text-blue-800 dark:text-orange-400 animate-fade-in flex items-center gap-2">
                <svg class="w-6 h-6 text-red-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                Gestion des Devoirs
            </h2>
            <div class="bg-orange-50 dark:bg-gray-700 shadow-lg rounded-xl p-6 animate-slide-in-up border border-blue-200 dark:border-orange-600">
                <a href="" {{-- {{ route('teacher.assignments.create') }} --}}
                    class="text-red-500 dark:text-orange-500 hover:text-red-600 dark:hover:text-orange-600 hover:underline font-semibold transition-colors duration-200 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    Créer un Nouveau Devoir
                </a>
                <ul class="mt-4 space-y-3">
                    @forelse ($teacherAssignments ?? [] as $assignment)
                        <li class="border-b border-red-300 dark:border-orange-600 py-2 transition-all duration-300 hover:bg-red-100 dark:hover:bg-gray-600">
                            <span class="text-gray-700 dark:text-gray-300">{{ $assignment->title }} - Échéance : {{ $assignment->due_date->format('d/m/Y') }}</span>
                        </li>
                    @empty
                        <li class="text-gray-700 dark:text-gray-300 py-2">
                            <strong>Devoir Exemple</strong> - Échéance : 12-06-2023
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>

        <!-- Messages et Notifications -->
        <div class="mt-8 scroll-reveal">
            <h2 class="text-xl sm:text-2xl font-semibold mb-4 text-blue-800 dark:text-orange-400 animate-fade-in flex items-center gap-2">
                <svg class="w-6 h-6 text-red-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                Messages & Notifications
            </h2>
            <div class="bg-orange-50 dark:bg-gray-700 shadow-lg rounded-xl p-6 animate-slide-in-up border border-blue-200 dark:border-orange-600">
                <p class="text-gray-700 dark:text-gray-300">Nouveaux messages des étudiants : <span class="font-bold text-red-600 dark:text-orange-400">{{ $newMessagesCount ?? 3 }}</span></p>
                <a href="" {{-- {{ route('teacher.messages') }} --}}
                    class="text-red-500 dark:text-orange-500 hover:text-red-600 dark:hover:text-orange-600 hover:underline transition-colors duration-200 mt-2 inline-block flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M19 12a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    Voir tous les messages
                </a>
            </div>
        </div>

        <!-- Calendrier Scolaire -->
        <div class="mt-8 scroll-reveal">
            <h2 class="text-xl sm:text-2xl font-semibold mb-4 text-blue-800 dark:text-orange-400 animate-fade-in flex items-center gap-2">
                <svg class="w-6 h-6 text-red-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                Calendrier Scolaire
            </h2>
            <div class="bg-orange-50 dark:bg-gray-700 shadow-lg rounded-xl p-6 animate-slide-in-up border border-blue-200 dark:border-orange-600">
                <a href="" {{-- {{ route('teacher.calendar') }} --}}
                    class="text-red-500 dark:text-orange-500 hover:text-red-600 dark:hover:text-orange-600 hover:underline transition-colors duration-200 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M19 12a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    Voir le Calendrier
                </a>
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
        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .scroll-reveal {
            opacity: 0;
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        .scroll-reveal.visible {
            animation: fadeInUp 0.6s ease-out forwards;
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

    <script>
        // Animation au scroll avec répétition (comme pour l'admin)
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