@extends('layouts.admin')

@section('title', 'Tous les cours')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-orange-100 py-8 px-4 sm:px-6 lg:px-8">
    <div class="container mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-center mb-6 scroll-reveal">
            <h1 class="text-3xl font-bold text-blue-800 animate-fade-in-down">Liste des cours</h1>
            <a href="{{ route('cours.create') }}" class="mt-4 md:mt-0 bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                Créer un nouveau cours
            </a>
        </div>

        <div class="bg-white shadow-lg rounded-xl p-6 scroll-reveal border border-blue-200">
            <div class="overflow-x-auto">
                <table class="min-w-full text-left table-auto divide-y divide-gray-200">
                    <thead class="bg-red-600 text-white">
                        <tr>
                            <th class="px-4 py-3 text-sm font-semibold">Titre</th>
                            <th class="px-4 py-3 text-sm font-semibold">Description</th>
                            <th class="px-4 py-3 text-sm font-semibold">Durée</th>
                            <th class="px-4 py-3 text-sm font-semibold">Prix</th>
                            <th class="px-4 py-3 text-sm font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($cours as $cour)
                            <tr class="hover:bg-orange-50 transition duration-200">
                                <td class="px-4 py-3 text-sm text-gray-700">{{ $cour->title }}</td>
                                <td class="px-4 py-3 text-sm text-gray-700">{{ Str::limit($cour->description, 50) }}</td>
                                <td class="px-4 py-3 text-sm text-gray-700">{{ $cour->duration }} minutes</td>
                                <td class="px-4 py-3 text-sm text-gray-700">{{ number_format($cour->price, 2) }} €</td>
                                <td class="px-4 py-3 text-sm">
                                    <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2">
                                        <a href="{{ route('cours.show', $cour) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md text-sm transition duration-200">
                                            Voir
                                        </a>
                                        <a href="{{ route('cours.edit', $cour) }}" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-md text-sm transition duration-200">
                                            Modifier
                                        </a>
                                        <form action="{{ route('cours.destroy', $cour) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            {{-- <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-md text-sm transition duration-200" onclick="return confirm('Voulez-vous vraiment supprimer ce cours ?')">
                                                Supprimer
                                            </button> --}}
                                            <button type="submit" class="text-red-500 hover:text-red-700 font-semibold transition duration-200 flex items-center gap-1" onclick="confirmDelete(event, this)">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 0a2 2 0 00-2 2h8a2 2 0 00-2-2m-6 0V5m6 2H5m14 0h-3"></path></svg>
                                                Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-3 text-center text-gray-600">Aucun cours disponible.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6 flex justify-center scroll-reveal">
                <a href="{{ route('dashboard') }}" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
@endsection
