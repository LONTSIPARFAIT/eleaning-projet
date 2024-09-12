@extends('layouts.admin')

@section('title', 'Ma page')
@section('content')
<div class="container mx-auto py-8 ml-5">
    <h1 class="text-3xl font-bold mb-4">Tableau de Bord de l'Enseignant</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md p-4">
            <h3 class="text-lg font-bold mb-2">Nombre de Cours</h3>
            <p class="text-4xl font-bold">{{ $coursCount }}</p>
        </div>
    </div>

    <div class="mt-8 ">
        <h2 class="text-lg font-bold mb-4">Derniers Cours Créés</h2>
        <div class="bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md p-4 -mr-5">
            <table class="w-full ">
                <thead>
                    <tr class="bg-gray-200 dark:bg-gray-600">
                        <th class="py-2 px-4 text-left">Titre</th>
                        <th class="py-2 px-4 text-left">Date de Création</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($newCourses as $cours)
                        <tr class="border-b border-gray-200 dark:border-gray-600">
                            <td class="py-2 px-4">{{ $cours->title }}</td>
                            <td class="py-2 px-4">{{ $cours->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection