@extends('layouts.admin')

@section('content')
<div class="container py-8 mx-7 ml-7">
    <h1 class="text-3xl font-bold ml-4 text-blue-900">Tous les utilisateurs</h1>

    <div class="bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md p-4">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-200 dark:bg-gray-600">
                    <th class="py-2 px-4 text-left">Nom</th>
                    <th class="py-2 px-4 text-left">Email</th>
                    <th class="py-2 px-4 text-left">Rôle</th>
                    <th class="py-2 px-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="border-b border-gray-200 dark:border-gray-600">
                    <td class="py-2 px-4">{{ $user->name }}</td>
                    <td class="py-2 px-4">{{ $user->email }}</td>
                    <td class="py-2 px-4">{{ $user->role }}</td>
                    <td class="py-2 px-4">
                        <a href="#" class="text-blue-500 hover:text-blue-700 font-bold mr-2">Voir</a>
                        <a href="#" class="text-green-500 hover:text-green-700 font-bold mr-2">Modifier</a>
                        <a href="#" class="text-red-500 hover:text-red-700 font-bold">Supprimer</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection
