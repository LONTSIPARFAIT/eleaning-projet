@extends('layouts.admin')

@section('title', 'Créer un cours')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-orange-100 py-8 px-4 sm:px-6 lg:px-8 flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-xl p-6 sm:p-8 max-w-lg w-full scroll-reveal border border-blue-200">
        <h1 class="text-3xl font-bold text-blue-800 text-center mb-6 animate-fade-in-down">Créer un Nouveau Cours</h1>

        <form action="{{ route('cours.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="animate-fade-in-up">
                <label for="title" class="block text-blue-900 font-semibold">Titre</label>
                <input
                    type="text"
                    class="mt-1 block w-full border-blue-300 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm p-2 transition duration-200 @error('title') border-red-500 @enderror"
                    id="title"
                    name="title"
                    value="{{ old('titl') }}"
                    required
                >
                @error('title')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="animate-fade-in-up">
                <label for="description" class="block text-blue-900 font-semibold">Description</label>
                <textarea
                    rows="5"
                    class="mt-1 block w-full border-blue-300 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm p-2 resize-none transition duration-200 @error('description') border-red-500 @enderror"
                    id="description"
                    name="description"
                    required
                >{{ old('description') }}</textarea>
                @error('description')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="animate-fade-in-up">
                <label for="duration" class="block text-blue-900 font-semibold">Durée (Heures)</label>
                <input
                    type="number"
                    min="0"
                    class="mt-1 block w-full border-blue-300 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm p-2 transition duration-200 @error('duration') border-red-500 @enderror"
                    id="duration"
                    name="duration"
                    value="{{ old('duration', 0) }}"
                    required
                >
                @error('duration')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            {{-- <div class="animate-fade-in-up">
                <label for="price" class="block text-blue-900 font-semibold">Prix (€)</label>
                <input
                    type="number"
                    min="0"
                    step="0.01"
                    class="mt-1 block w-full border-blue-300 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm p-2 transition duration-200 @error('price') border-red-500 @enderror"
                    id="price"
                    name="price"
                    value="{{ old('price', 0) }}"
                    required
                >
                @error('price')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div> --}}

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 animate-fade-in-up">
                <button
                    type="submit"
                    class="bg-red-500 hover:bg-red-600 text-white p-3 rounded-lg shadow-md transition duration-300 ease-in-out w-full sm:w-auto"
                >
                    Créer un cours
                </button>
                <a
                    href="{{ route('cours.index') }}"
                    class="bg-orange-500 hover:bg-orange-600 text-white p-3 rounded-lg shadow-md transition duration-300 ease-in-out text-center w-full sm:w-auto"
                >
                    Retour
                </a>
            </div>
        </form>
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
