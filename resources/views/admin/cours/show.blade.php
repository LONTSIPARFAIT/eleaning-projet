@extends('layouts.admin')

@section('title', 'Voir un cours')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-orange-100 py-8 px-4 sm:px-6 lg:px-8">
    <div class="container mx-auto max-w-4xl">
        <!-- Détails du cours -->
        <div class="bg-white shadow-lg rounded-xl p-6 mb-6 scroll-reveal border border-blue-200">
            <h1 class="text-3xl font-bold text-blue-800 mb-4 animate-fade-in-down">{{ $cour->title }}</h1>
            <p class="text-gray-600 mb-2">{{ $cour->description }}</p>
            <p class="text-gray-600 mb-2">Durée : {{ $cour->duration }} minutes</p>
            <p class="text-gray-600 mb-4">Prix : {{ number_format($cour->price, 2) }} €</p>

            <div class="flex flex-col sm:flex-row gap-4 animate-fade-in-up">
                <a href="{{ route('cours.edit', $cour) }}" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                    Éditer
                </a>
                <form action="{{ route('cours.destroy', $cour) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce cours ?')">
                        Supprimer
                    </button>
                </form>
                <a href="{{ route('cours.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                    Retour
                </a>
            </div>
        </div>

        <!-- Leçons -->
        <div class="bg-white shadow-lg rounded-xl p-6 mb-6 scroll-reveal border border-blue-200 relative">
            <h2 class="text-xl font-bold text-blue-800 mb-4 animate-fade-in-down">Leçons</h2>
            <div class="absolute top-4 right-4 flex gap-2 animate-fade-in-up">
                <a href="{{ route('lessons.create', ['cours_id' => $cour->id]) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                    Ajouter une leçon
                </a>
                <a href="{{ route('cours.lessons.index', ['cours_id' => $cour->id]) }}" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                    Voir toutes les leçons
                </a>
            </div>

            @if ($cour->lessons->isEmpty())
                <p class="text-gray-600">Aucune leçon disponible pour ce cours.</p>
            @else
                <ul class="space-y-4">
                    @foreach ($cour->lessons as $index => $lesson)
                        <li class="border-b pb-4 animate-fade-in-up">
                            <h3 class="font-bold text-blue-900">Leçon {{ $index + 1 }} : {{ $lesson->title }}</h3>
                            <p class="text-gray-600">{{ $lesson->description }}</p>
                            <p class="text-gray-600">Durée : {{ $lesson->duration }} minutes</p>
                            <a href="{{ route('lessons.show', $lesson->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-3 rounded-md transition duration-200 inline-block mt-2">
                                Voir
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <!-- Exercices -->
        <div class="bg-white shadow-lg rounded-xl p-6 mb-6 scroll-reveal border border-blue-200 relative">
            <h2 class="text-xl font-bold text-blue-800 mb-4 animate-fade-in-down">Exercices</h2>
            <div class="absolute top-4 right-4 flex gap-2 animate-fade-in-up">
                <a href="{{ route('exercises.create', ['cours_id' => $cour->id]) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                    Ajouter un exercice
                </a>
                <a href="{{ route('cours.exercises.index', $cour->id) }}" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                    Voir tous les exercices
                </a>
            </div>

            @if ($cour->exercises->isEmpty())
                <p class="text-gray-600">Aucun exercice disponible pour ce cours.</p>
            @else
                <ul class="space-y-4">
                    @foreach ($cour->exercises as $index => $exercise)
                        <li class="border-b pb-4 animate-fade-in-up">
                            <h3 class="font-bold text-blue-900">Exercice {{ $index + 1 }} : {{ $exercise->title }}</h3>
                            <p class="text-gray-600">{{ $exercise->content }}</p>
                            <p class="text-gray-600">Durée : {{ $exercise->duration }} minutes</p>
                            <a href="{{ route('exercises.show', $exercise) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-3 rounded-md transition duration-200 inline-block mt-2">
                                Voir
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <!-- Questionnaires -->
        <div class="bg-white shadow-lg rounded-xl p-6 mb-6 scroll-reveal border border-blue-200 relative">
            <h2 class="text-xl font-bold text-blue-800 mb-4 animate-fade-in-down">Questionnaires</h2>
            <div class="absolute top-4 right-4 flex gap-2 animate-fade-in-up">
                <a href="{{ route('quizzes.create', ['lesson_id' => $cour->id]) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                    Ajouter un questionnaire
                </a>
                <a href="{{ route('cours.quizzes.index', $cour->id) }}" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                    Voir tous les questionnaires
                </a>
            </div>

            @if ($cour->quizzes && $cour->quizzes->isNotEmpty())
                <ul class="space-y-4">
                    @foreach ($cour->quizzes as $index => $quiz)
                        <li class="border-b pb-4 animate-fade-in-up">
                            <h3 class="font-bold text-blue-900">Quiz {{ $index + 1 }} : {{ $quiz->title }}</h3>
                            <a href="{{ route('quizzes.show', $quiz) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-3 rounded-md transition duration-200 inline-block mt-2">
                                Voir
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-600">Aucun questionnaire disponible pour ce cours.</p>
            @endif
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
    .animate-fade-in-up {
        animation: fadeInUp 0.6s ease-out;
    }
</style>

<script>
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