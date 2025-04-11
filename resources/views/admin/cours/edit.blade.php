@extends('layouts.admin')

@section('title', 'Éditer un cours')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-orange-100 py-8 px-4 sm:px-6 lg:px-8 flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-xl p-6 sm:p-8 max-w-lg w-full scroll-reveal border border-blue-200">
        <h1 class="text-3xl font-bold text-blue-800 text-center mb-6 animate-fade-in-down flex items-center justify-center gap-2">
            <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
            Éditer le Cours
        </h1>

        <form action="{{ route('cours.update', $cour) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="animate-fade-in-up">
                <label for="title" class="block text-blue-900 font-semibold flex items-center gap-2">
                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    Titre
                </label>
                <input
                    type="text"
                    class="mt-1 block w-full border-blue-300 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm p-2 transition duration-200 @error('title') border-red-500 @enderror"
                    id="title"
                    name="title"
                    value="{{ old('title', $cour->title) }}"
                    required
                >
                @error('title')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="animate-fade-in-up">
                <label for="description" class="block text-blue-900 font-semibold flex items-center gap-2">
                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H5a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-4M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    Description
                </label>
                <textarea
                    rows="6"
                    class="mt-1 block w-full border-blue-300 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm p-2 resize-none transition duration-200 @error('description') border-red-500 @enderror"
                    id="description"
                    name="description"
                    required
                >{{ old('description', $cour->description) }}</textarea>
                @error('description')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="animate-fade-in-up">
                <label for="duration" class="block text-blue-900 font-semibold flex items-center gap-2">
                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Durée (Heure)
                </label>
                <input
                    type="number"
                    min="0"
                    class="mt-1 block w-full border-blue-300 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm p-2 transition duration-200 @error('duration') border-red-500 @enderror"
                    id="duration"
                    name="duration"
                    value="{{ old('duration', $cour->duration) }}"
                    required
                >
                @error('duration')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            {{-- <div class="animate-fade-in-up">
                <label for="price" class="block text-blue-900 font-semibold flex items-center gap-2">
                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Prix (€)
                </label>
                <input
                    type="number"
                    min="0"
                    step="0.01"
                    class="mt-1 block w-full border-blue-300 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm p-2 transition duration-200 @error('price') border-red-500 @enderror"
                    id="price"
                    name="price"
                    value="{{ old('price', $cour->price) }}"
                    required
                >
                @error('price')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div> --}}

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 animate-fade-in-up">
                <button
                    type="submit"
                    class="bg-red-500 hover:bg-red-600 text-white font-bold p-3 rounded-lg shadow-md transition duration-300 ease-in-out w-full sm:w-auto flex items-center justify-center gap-2"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Modifier le cours
                </button>
                <a
                    href="{{ route('cours.index') }}"
                    class="bg-orange-500 hover:bg-orange-600 text-white font-bold p-3 rounded-lg shadow-md transition duration-300 ease-in-out text-center w-full sm:w-auto flex items-center justify-center gap-2"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
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
