@extends('layouts.admin')

@section('title', 'Ajouter un Exercice')

@section('content')
<div class="container mx-auto p-8">
    <h1 class="text-3xl font-extrabold text-gray-800 mb-6">Ajouter un Exercice</h1>

    <form action="" method="POST" class="bg-white shadow-lg rounded-lg p-6">
        {{-- {{ route('admin.exercises.store') }} --}}
        @csrf
        <input type="hidden" name="cours_id" value="{{ $cours_id }}">
        
        <div class="mb-6">
            <label for="title" class="block text-lg font-medium text-gray-700 mb-2">Titre</label>
            <input type="text" name="title" id="title" class="border border-gray-300 rounded-lg w-full p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
        </div>
        
        <div class="mb-6">
            <label for="content" class="block text-lg font-medium text-gray-700 mb-2">Contenu de l'Exercice</label>
            <textarea name="content" id="content" rows="5" class="border border-gray-300 rounded-lg w-full p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none" required></textarea>
        </div>
        
        <div class="mb-6">
            <label for="duration" class="block text-lg font-medium text-gray-700 mb-2">Durée (en minutes)</label>
            <input type="number" name="duration" id="duration" class="border border-gray-300 rounded-lg w-full p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
        </div>
        
        <div class="flex justify-end">
            <button type="submit" class="bg-green-500 text-white font-bold px-6 py-2 rounded-lg hover:bg-green-600 transition duration-200">Créer</button>
            <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded ml-2">Retour</a>
        </div>
    </form>
</div>
@endsection
