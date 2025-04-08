@extends('layouts.admin')

@section('title', 'Voir une leçon')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-orange-100 py-4 px-2 sm:px-4 sm:py-8">
    <div class="container mx-auto max-w-4xl">
        <!-- Détails de la leçon -->
        <div class="p-4 sm:p-6 md:p-8 bg-white shadow-lg rounded-xl mb-6 scroll-reveal border border-blue-200">
            <h1 class="text-2xl sm:text-3xl font-bold text-blue-800 mb-4 animate-fade-in-down flex items-center gap-2">
                <svg class="w-6 sm:w-8 h-6 sm:h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                {{ $lesson->title }}
            </h1>
            <p class="text-gray-600 mb-2">{{ $lesson->description }}</p>
            <p class="text-gray-600 mb-4">Durée : {{ $lesson->duration }} heures</p>

            <div class="flex flex-col sm:flex-row gap-4 animate-fade-in-up">
                <a href="{{ route('lessons.show', $lesson) }}" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    Éditer
                </a>
                <form action="{{ route('lessons.destroy', $lesson) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out flex items-center gap-2" onclick="confirmDelete(event, this)">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 0a2 2 0 00-2 2h8a2 2 0 00-2-2m-6 0V5m6 2H5m14 0h-3"></path></svg>
                        Supprimer
                    </button>
                </form>
                <a href="{{ route('lessons.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Retour
                </a>
            </div>
        </div>

        <!-- Quizzes associés -->
        <div class="p-4 sm:p-6 md:p-8 bg-white shadow-lg rounded-xl mb-6 scroll-reveal border border-blue-200 relative">
            <h2 class="text-xl sm:text-2xl font-bold text-blue-800 mb-4 animate-fade-in-down flex items-center gap-2">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Quizzes associés
            </h2>

            <div class="absolute top-4 right-4 flex flex-col sm:flex-row gap-2 animate-fade-in-up">
                <a href="{{ route('quizzes.create', ['lesson_id' => $lesson->id]) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    Ajouter un quiz
                </a>
                <a href="{{ route('quizzes.index', ['lesson_id' => $lesson->id]) }}" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M19 12a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    Voir tous les quizzes
                </a>
            </div>

            @if ($lesson->quizzes->isEmpty())
                <p class="text-gray-600">Aucun quiz disponible pour cette leçon.</p>
            @else
                <ul class="space-y-4">
                    @foreach ($lesson->quizzes as $index => $quiz)
                        <li class="border-b pb-4 animate-fade-in-up">
                            <h3 class="font-bold text-blue-900 text-sm sm:text-base">Quiz {{ $index + 1 }} : {{ $quiz->title }}</h3>
                            <a href="{{ route('quizzes.show', $quiz) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-3 rounded-md transition duration-200 inline-flex items-center gap-1 mt-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M19 12a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                Voir
                            </a>
                        </li>
                    @endforeach
                </ul>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmDelete(event, button) {
        event.preventDefault(); // Empêche la soumission immédiate du formulaire
        Swal.fire({
            title: 'Êtes-vous sûr ?',
            text: "Vous êtes sur le point de supprimer cette leçon. Cette action est irréversible !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444', // Rouge Tailwind red-500
            cancelButtonColor: '#3b82f6', // Bleu Tailwind blue-500
            confirmButtonText: 'Oui, supprimer',
            cancelButtonText: 'Annuler',
            customClass: {
                popup: 'rounded-xl',
                title: 'text-blue-900 font-bold',
                content: 'text-gray-700',
                confirmButton: 'shadow-md transition duration-200',
                cancelButton: 'shadow-md transition duration-200'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                button.closest('form').submit(); // Soumet le formulaire si confirmé
            }
        });
    }
</script>

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