@extends('layouts.admin')

@section('title', 'Tous les cours')
@section('content')
    <div class="container mx-auto my-8">
        <div class="flex flex-col md:flex-row justify-between items-center mb-6">
            <h1 class="text-3xl font-bold ml-4 text-blue-900">Liste des cours</h1>
            <a href="{{ route('cours.create') }}" class="mt-4 md:mt-0 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Créer un nouveau cours</a>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="overflow-x-auto sm:hidden"> <!-- Défilement horizontal uniquement sur mobile -->
                <table class="min-w-full text-left table-auto text-sm"> <!-- Texte plus petit en mobile -->
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-2 py-1">Titre</th>
                            <th class="px-2 py-1">Description</th>
                            <th class="px-2 py-1">Durée</th>
                            <th class="px-2 py-1">Prix</th>
                            <th class="px-2 py-1">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cours as $cour)
                            <tr class="border-b hover:bg-gray-100">
                                <td class="border px-2 py-1">{{ $cour->title }}</td>
                                <td class="border px-2 py-1">{{ $cour->description }}</td>
                                <td class="border px-2 py-1">{{ $cour->duration }} minutes</td>
                                <td class="border px-2 py-1">{{ $cour->price }} €</td>
                                <td class="border px-2 py-1">
                                    <div class="flex space-x-1">
                                        <a href="{{ route('cours.show', $cour) }}"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded-md text-xs">Voir</a>
                                        <a href="{{ route('cours.edit', $cour) }}"
                                            class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded-md text-xs">Modifier</a>
                                        <form action="{{ route('cours.destroy', $cour) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded-md text-xs" onclick="return confirm('Voulez-vous supprimer ?')">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="hidden sm:block"> <!-- Tableau normal pour les écrans plus grands -->
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
            </div>
            <div class="mt-4">
                <a href="{{ url('/dashboard') }}" class="bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-md text-sm">Retour</a>
            </div>
        </div>
    </div>
@endsection