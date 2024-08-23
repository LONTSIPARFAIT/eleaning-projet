<!-- resources/views/admin/courses/edit.blade.php -->
@extends('layouts.admin')

@section('content')
    <h1 class="text-3xl font-bold mb-4 ml-4 text-blue-900">Editer le Cours</h1>

    <form action="{{ route('cours.update', $cour) }}" method="POST" class="space-y-6  m-6">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title" class="block font-medium mb-1">Titre</label>
            <input type="text" class="w-full px-2 py-1 border  rounded focus:outline-none focus:ring focus:border-blue-500 @error('title') border-red-500 @enderror" id="title" name="title" value="{{ old('title', $cour->title) }}" required>
            @error('title')
                <div class="text-red-500 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description" class="block font-medium mb-1">Description</label>
            <textarea  class="w-full px-2 py-1 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-500 @error('description') border-red-500 @enderror" id="description" name="description" rows="3" required>{{ old('description', $cour->description) }}</textarea>
            @error('description')
                <div class="text-red-500 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="duration" class="block font-medium mb-1">Duration (minutes)</label>
            <input type="number" cclass="w-full px-2 py-1 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-500 @error('duration') border-red-500 @enderror" id="duration" name="duration" value="{{ old('duration', $cour->duration) }}" required>
            @error('duration')
                <div class="text-red-500 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price"  class="block font-medium mb-1">Prix (€)</label>
            <input type="number" step="0.01" class="w-full px-2 py-1 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-500 @error('price') border-red-500 @enderror" id="price" name="price" value="{{ old('price', $cour->price) }}" required>
            @error('price')
                <div class="text-red-500 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Modifier le cours</button>
        <a href="http://127.0.0.1:8000/cours" class="bg-blue-400 text-white px-4 py-2 rounded hover:bg-red-600">Retour</button>
    </form>
@endsection
