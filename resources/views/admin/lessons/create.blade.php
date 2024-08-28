@extends('layouts.admin')

@section('title', 'Creer une leçon')
@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Créer une nouvelle leçon</h1>

    <form action="{{ route('admin.lessons.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-sm font-bold mb-2">Titre</label>
            <input type="text" id="title" name="title" class="border rounded w-full py-2 px-3" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-bold mb-2">Description</label>
            <textarea id="description" name="description" class="border rounded w-full py-2 px-3" rows="4" required></textarea>
        </div>

        <div class="mb-4">
            <label for="duration" class="block text-sm font-bold mb-2">Durée (en minutes)</label>
            <input type="number" id="duration" name="duration" class="border rounded w-full py-2 px-3" required>
        </div>

        <div class="mb-4">
            <label for="cours_id" class="block text-sm font-bold mb-2">Cours</label>
            <select id="cours_id" name="cours_id" class="border rounded w-full py-2 px-3" required>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Créer la leçon</button>
        <a href="{{ route('admin.lessons.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500 ml-2">Retour</a>
    </form>
</div>
@endsection