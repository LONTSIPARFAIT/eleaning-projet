@extends('layouts.admin')

@section('title', 'Tous les cours')
@section('content')
    <div class="container mx-auto my-8">
        <div class="flex flex-col md:flex-row justify-between items-center mb-6">
            <h1 class="text-3xl font-bold ml-4 text-blue-900">Liste des cours</h1>
            <a href="{{ route('cours.create') }}" class="mt-4 md:mt-0 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Créer un nouveau cours</a>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6 overflow-x-auto"> <!-- Défilement horizontal pour les petits écrans -->
            <table class="min-w-full text-left table-auto">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">Titre</th>
                        <th class="px-4 py-2">Description</th>
                        <th class="px-4 py-2">Durée</th>
                        <th class="px-4 py-2">Prix</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cours as $cour)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="border px-4 py-2">{{ $cour->title }}</td>
                            <td class="border px-4 py-2">{{ $cour->description }}</td>
                            <td class="border px-4 py-2">{{ $cour->duration }} minutes</td>
                            <td class="border px-4 py-2">{{ $cour->price }} €</td>
                            <td class="border px-4 py-2">
                                <div class="flex space-x-2">
                                    <a href="{{ route('cours.show', $cour) }}"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-md text-sm">Voir</a>
                                    <a href="{{ route('cours.edit', $cour) }}"
                                        class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-md text-sm">Modifier</a>
                                    <form action="{{ route('cours.destroy', $cour) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-md text-sm" onclick="return confirm('Voulez-vous supprimer ?')">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                <a href="{{ url('/dashboard') }}" class="bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-md text-sm">Retour</a>
            </div>
        </div>
    </div>
@endsection