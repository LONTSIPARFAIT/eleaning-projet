@extends('layouts.admin')

@section('title', 'Tous les cours')

@section('content')
    <div
        class="min-h-screen bg-gradient-to-br from-blue-50 to-orange-100 dark:bg-gradient-to-br dark:from-gray-900 dark:to-gray-800 py-8 px-4 sm:px-6 lg:px-8">
        <div class="container mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-center mb-6 scroll-reveal">
                <h1
                    class="text-3xl font-bold text-blue-800 dark:text-orange-400 animate-fade-in-down flex items-center gap-2">
                    <svg class="w-8 h-8 text-red-600 dark:text-orange-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                        </path>
                    </svg>
                    Liste des cours
                </h1>
                <a href="{{ route('cours.create') }}"
                    class="mt-4 md:mt-0 bg-red-500 hover:bg-red-600 dark:bg-orange-500 dark:hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Créer un nouveau cours
                </a>
            </div>

            <div
                class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-6 scroll-reveal border border-blue-200 dark:border-gray-700">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-left table-auto divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-red-600 dark:bg-orange-600 text-white">
                            <tr>
                                <th class="px-4 py-3 text-sm font-semibold">Titre</th>
                                <th class="px-4 py-3 text-sm font-semibold">Description</th>
                                <th class="px-4 py-3 text-sm font-semibold">Durée</th>
                                {{-- <th class="px-4 py-3 text-sm font-semibold">Prix</th> --}}
                                <th class="px-4 py-3 text-sm font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($cours as $cour)
                                <tr class="hover:bg-orange-50 dark:hover:bg-gray-700 transition duration-200">
                                    <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-300">{{ $cour->title }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-300">
                                        {{ Str::limit($cour->description, 50) }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-300">{{ $cour->duration }}
                                        Heures</td>
                                    {{-- <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-300">
                                        {{ number_format($cour->price, 2) }} €</td> --}}
                                    <td class="px-4 py-3 text-sm">
                                        <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2">
                                            <a href="{{ route('cours.show', $cour) }}"
                                                class="bg-blue-500 hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md text-sm transition duration-200 flex items-center gap-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M19 12a7 7 0 11-14 0 7 7 0 0114 0z">
                                                    </path>
                                                </svg>
                                                Voir
                                            </a>
                                            <a href="{{ route('cours.edit', $cour) }}"
                                                class="bg-orange-500 hover:bg-orange-600 dark:bg-orange-600 dark:hover:bg-orange-700 text-white font-bold py-2 px-4 rounded-md text-sm transition duration-200 flex items-center gap-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                    </path>
                                                </svg>
                                                Modifier
                                            </a>
                                            <form action="{{ route('cours.destroy', $cour) }}" method="POST"
                                                class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600" onclick="return confirm('Êtes-vous sûr?')">Supprimer</button>
                                                <button type="submit"
                                                    class="text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 font-semibold transition duration-200 flex items-center gap-1"
                                                    onclick="confirmDelete(event, this)">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 0a2 2 0 00-2 2h8a2 2 0 00-2-2m-6 0V5m6 2H5m14 0h-3">
                                                        </path>
                                                    </svg>
                                                    Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-3 text-center text-gray-600 dark:text-gray-300">Aucun
                                        cours disponible.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-6 flex justify-center scroll-reveal">
                    <a href="{{ route('dashboard') }}"
                        class="bg-orange-500 hover:bg-orange-600 dark:bg-orange-600 dark:hover:bg-orange-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Retour au tableau de bord
                    </a>
                </div>
            </div>

            {{-- @if ($cours->hasPages()) --}}
            <div class="mt-6 scroll-reveal">
                {{-- {{ $cours->links('pagination::tailwind') }} --}}
            </div>
            {{-- @endif --}}
        </div>
    </div>

    <style>
        /* Animations personnalisées */
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInDown {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmDelete(event, button) {
            event.preventDefault(); // Empêche la soumission immédiate du formulaire
            Swal.fire({
                title: 'Êtes-vous sûr ?',
                text: "Vous êtes sur le point de supprimer ce cours. Cette action est irréversible !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444', // Rouge Tailwind red-500
                cancelButtonColor: '#3b82f6', // Bleu Tailwind blue-500
                confirmButtonText: 'Oui, supprimer',
                cancelButtonText: 'Annuler',
                customClass: {
                    popup: 'rounded-xl',
                    title: 'text-blue-900 dark:text-orange-400 font-bold',
                    content: 'text-gray-700 dark:text-gray-300',
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
            }, {
                threshold: 0.2
            });

            elements.forEach(element => observer.observe(element));
        });
    </script>
@endsection
