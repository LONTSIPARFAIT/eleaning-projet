@extends('layouts.admin')

@section('content')
    <section
        class="py-8 bg-gradient-to-br from-blue-50 to-orange-100 dark:bg-gradient-to-br dark:from-gray-900 dark:to-gray-800">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2
                class="text-3xl sm:text-4xl font-bold text-blue-800 dark:text-orange-400 mb-6 animate-fade-in-down flex justify-center items-center gap-2">
                <svg class="w-8 h-8 text-red-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                    </path>
                </svg>
                Mes Cours
            </h2>

            @if ($courses->isEmpty())
                <p
                    class="mt-4 text-gray-600 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-lg p-4 shadow-md animate-fade-in">
                    Vous n'êtes abonné à aucun cours.</p>
            @else
                <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                    @foreach ($courses as $course)
                        <!-- Corrigé $cours en $courses -->
                        <div
                            class="bg-orange-50 dark:bg-gray-700 shadow-lg rounded-xl p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl animate-slide-in-up border border-blue-200 dark:border-orange-600">
                            <h3 class="text-xl font-semibold text-blue-900 dark:text-orange-400">{{ $course->title }}</h3>
                            <p class="mt-2 text-gray-700 dark:text-gray-300 line-clamp-2">{{ $course->description }}</p>
                            <div class="mt-3 space-y-2">
                                <p class="text-sm text-gray-600 dark:text-gray-300 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-red-500 dark:text-orange-500" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Durée : {{ $course->duration }} minutes
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-300 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-red-500 dark:text-orange-500" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                    Prix : {{ $course->price }} €
                                </p>
                            </div>
                            <a href="{{ route('course.show', $course->id) }}"
                                class="mt-4 inline-block bg-red-500 hover:bg-red-600 dark:bg-orange-500 dark:hover:bg-orange-600 text-white font-semibold py-2 px-4 rounded-lg transition-all duration-300 hover:shadow-lg flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M19 12a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                Voir le Cours
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <style>
        /* Animations personnalisées avec Tailwind */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
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

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .animate-fade-in-down {
            animation: fadeInDown 0.6s ease-out;
        }

        .animate-slide-in-up {
            animation: slideInUp 0.6s ease-out;
        }

        .animate-fade-in {
            animation: fadeIn 0.8s ease-out;
        }
    </style>
@endsection
