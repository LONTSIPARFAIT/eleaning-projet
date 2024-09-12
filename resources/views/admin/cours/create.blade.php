<!-- resources/views/admin/courses/create.blade.php -->
@extends('layouts.admin')


@section('title', 'Creer un cours')
@section('content')

<h1 class="text-3xl font-bold mb-4 ml-4 text-blue-900">Creer un nouveau cours</h1>

<form action="{{ route('cours.store') }}" method="POST" class="space-y-6  m-6">
    @csrf

    <div class="form-group">
        <label for="title" class="block font-medium mb-1">Title</label>
        <input type="text" class="w-full px-2 py-1 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-500 @error('title') border-red-500 @enderror" id="title" name="title" value="{{ old('title') }}" required>
        @error('title')
            <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="description" class="block font-medium mb-1">Description</label>
        <textarea rows="5" class="w-full px-2 py-1 border resize-none border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-500 @error('description') border-red-500 @enderror" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
        @error('description')
            <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="duration" class="block font-medium mb-1">Duration (minutes)</label>
        <input type="number" min="0" value='0' class="w-full px-2 py-1 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-500 @error('duration') border-red-500 @enderror" id="duration" name="duration" value="{{ old('duration') }}" required>
        @error('duration')
            <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="price" class="block font-medium mb-1">Prix (€)</label>
        <input type="number"  min="0" value='0' step="0.01" class="w-full px-2 py-1 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-500 @error('price') border-red-500 @enderror" id="price" name="price" value="{{ old('price') }}" required>
        @error('price')
            <div class="text-red-500 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="mt-4">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Creer un cours</button>
        <a href="http://127.0.0.1:8000/cours" class="bg-blue-400 text-white px-4 py-2 rounded hover:bg-green-600">Retour</a>
    </div>
</form>
@endsection
