@extends('layouts.admin')

@section('title', 'Tableau de Bord de l\'Enseignant')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 bg-gradient-to-br from-blue-50 to-orange-100"
        x-data="{ activeSection: 'cours' }">
        
        <!-- Bloc Enseignant : Lien pour créer un cours -->
        <div class="bg-orange-50 shadow-lg rounded-xl p-6 mb-6 border border-blue-200 scroll-reveal flex justify-between items-center">
            <h4 class="text-blue-900 text-2xl font-bold">Enseignant</h4>
            <a href="{{ route('cours.create') }}" class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-lg shadow-md transition duration-300 ease-in-out">
                Créer un nouveau cours
            </a>
        </div>

        <!-- Header -->
        <div class="animate-slide-in-down bg-white rounded-lg shadow-xl p-6 mb-8 border-l-4 border-red-500 scroll-reveal">
            <h1 class="text-2xl sm:text-3xl font-bold mb-4 text-blue-900">Tableau de Bord de l'Enseignant</h1>
            <p class="text-lg sm:text-xl text-blue-700">
                Bienvenue, <span class="font-bold text-orange-600">{{ Auth::user()->name ?? 'Enseignant' }}</span> !
                Gérez vos cours et vos étudiants ici.
            </p>
        </div>

        <!-- Statistiques -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8 scroll-reveal">
            <div
                class="bg-orange-50 shadow-lg rounded-xl p-6 transform transition-all duration-300 hover:scale-105 animate-slide-in-up border border-blue-200">
                <h3 class="text-lg font-bold text-blue-900 mb-2">Mes Cours</h3>
                <p class="text-4xl font-bold text-red-600">{{ $teacherCoursesCount ?? 10 }}</p>
            </div>
            <div
                class="bg-orange-50 shadow-lg rounded-xl p-6 transform transition-all duration-300 hover:scale-105 animate-slide-in-up border border-blue-200">
                <h3 class="text-lg font-bold text-blue-900 mb-2">Étudiants Inscrits</h3>
                <p class="text-4xl font-bold text-red-600">{{ $enrolledStudentsCount ?? 50 }}</p>
            </div>
            <div
                class="bg-orange-50 shadow-lg rounded-xl p-6 transform transition-all duration-300 hover:scale-105 animate-slide-in-up border border-blue-200">
                <h3 class="text-lg font-bold text-blue-900 mb-2">Devoirs Assignés</h3>
                <p class="text-4xl font-bold text-red-600">{{ $teacherAssignmentsCount ?? 14 }}</p>
            </div>
            <div
                class="bg-orange-50 shadow-lg rounded-xl p-6 transform transition-all duration-300 hover:scale-105 animate-slide-in-up border border-blue-200">
                <h3 class="text-lg font-bold text-blue-900 mb-2">Revenus Générés</h3>
                <p class="text-4xl font-bold text-red-600">{{ $teacherRevenue ?? '250 €' }}</p>
            </div>
        </div>

        <!-- Derniers Cours Créés -->
        <div class="mt-8 scroll-reveal">
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
                        @forelse ($newCourses as $course)
                            <tr class="border-b border-blue-200 transition-all duration-300 hover:bg-red-100">
                                <td class="py-3 px-4 text-gray-700">{{ $course->title }}</td>
                                <td class="py-3 px-4 text-gray-700">{{ $course->created_at->format('d/m/Y H:i') }}</td>
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
        <div class="mt-8 scroll-reveal">
            <h2 class="text-xl sm:text-2xl font-semibold mb-4 text-blue-800 animate-fade-in">Gestion des Devoirs</h2>
            <div class="bg-orange-50 shadow-lg rounded-xl p-6 animate-slide-in-up border border-blue-200">
                <a href=""
                {{-- {{ route('teacher.assignments.create') }} --}}
                    class="text-red-500 hover:text-red-600 hover:underline font-semibold transition-colors duration-200">Créer un Nouveau Devoir</a>
                <ul class="mt-4 space-y-3">
                    @forelse ($teacherAssignments ?? [] as $assignment)
                        <li class="border-b border-red-300 py-2 transition-all duration-300 hover:bg-red-100">
                            <span class="text-gray-700">{{ $assignment->title }} - Échéance : {{ $assignment->due_date->format('d/m/Y') }}</span>
                        </li>
                    @empty
                        <li class="text-gray-700 py-2">
                            <strong>Devoir Exemple</strong> - Échéance : 12-06-2023
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>

        <!-- Messages et Notifications -->
        <div class="mt-8 scroll-reveal">
            <h2 class="text-xl sm:text-2xl font-semibold mb-4 text-blue-800 animate-fade-in">Messages & Notifications</h2>
            <div class="bg-orange-50 shadow-lg rounded-xl p-6 animate-slide-in-up border border-blue-200">
                <p class="text-gray-700">Nouveaux messages des étudiants : <span class="font-bold text-red-600">{{ $newMessagesCount ?? 3 }}</span></p>
                <a href=""
                {{-- {{ route('teacher.messages') }} --}}
                    class="text-red-500 hover:text-red-600 hover:underline transition-colors duration-200 mt-2 inline-block">Voir tous les messages</a>
            </div>
        </div>

        <!-- Calendrier Scolaire -->
        <div class="mt-8 scroll-reveal">
            <h2 class="text-xl sm:text-2xl font-semibold mb-4 text-blue-800 animate-fade-in">Calendrier Scolaire</h2>
            <div class="bg-orange-50 shadow-lg rounded-xl p-6 animate-slide-in-up border border-blue-200">
                <a href=""
                {{-- {{ route('teacher.calendar') }} --}}
                    class="text-red-500 hover:text-red-600 hover:underline transition-colors duration-200">Voir le Calendrier</a>
            </div>
        </div>
    </div>

    <!-- Inclusion d'Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <style>
        /* Animations personnalisées avec Tailwind */
        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
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