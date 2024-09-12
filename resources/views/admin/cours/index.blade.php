<!-- resources/views/admin/courses/index.blade.php -->
@extends('layouts.admin')

@section('title', 'Tous les cours')
@section('content')
    <div class="container mx-auto my-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold ml-4 text-blue-900">Liste des cours</h1>
            <a href="{{ route('cours.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Creer un nouveau cours</a>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <table class="w-full text-left table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Description</th>
                        <th class="px-4 py-2">Duration</th>
                        <th class="px-4 py-2">Price</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cours as $cour)
                        <tr>
                            <td class="border px-4 py-2">{{ $cour->title }}</td>
                            <td class="border px-4 py-2">{{ $cour->description }}</td>
                            <td class="border px-4 py-2">{{ $cour->duration }} minutes</td>
                            <td class="border px-4 py-2">{{ $cour->price }} €</td>
                            <td class="border px-4 py-2">
                                <div class="flex space-x-2">
                                    <a href="{{ route('cours.show', $cour) }}"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md text-sm">View</a>
                                    <a href="{{ route('cours.edit', $cour) }}"
                                        class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-md text-sm">Edit</a>
                                    <form action="{{ route('cours.destroy', $cour) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-md text-sm" onclick="return confirm('Voulez vous supprimer ??')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    <a href="http://127.0.0.1:8000/dashboard" class="bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-md text-sm" >Retour</a>
                </tbody>
            </table>
        </div>
    </div>
@endsection
