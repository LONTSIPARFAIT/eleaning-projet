@extends('layouts.admin')

@section('title', 'Liste des utilisateurs')

@section('content')
<div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold mb-6 text-blue-900">Tous les utilisateurs</h1>

    <div class="flex justify-end mb-4">
        <a href="{{ route('users.create') }}" class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded">
            Ajouter un User
        </a>
    </div>

    <div class="bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md overflow-x-auto">
        <table class="min-w-full table-auto divide-y divide-gray-300">
            <thead class="bg-red-600 text-white">
                <tr>
                    <th class="py-3 px-4 text-left text-sm font-medium">Nom</th>
                    <th class="py-3 px-4 text-left text-sm font-medium">Email</th>
                    <th class="py-3 px-4 text-left text-sm font-medium">Rôle</th>
                    <th class="py-3 px-4 text-left text-sm font-medium">Gestion de rôle</th>
                    <th class="py-3 px-4 text-left text-sm font-medium">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                @foreach ($users as $user)
                <tr class="hover:bg-gray-200 bg-white dark:bg-gray-800">
                    <td class="py-3 px-4 text-sm">{{ $user->name }}</td>
                    <td class="py-3 px-4 text-sm">{{ $user->email }}</td>
                    <td class="py-3 px-4 text-sm">{{ $user->role }}</td>
                    <td class="py-3 px-4 text-sm">
                        <form action="{{ route('users.updateRole', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="role" onchange="this.form.submit()" class="bg-gray-200 rounded-md w-full text-sm">
                                <option value="student" {{ $user->role == 'student' ? 'selected' : '' }}>Étudiant</option>
                                <option value="teacher" {{ $user->role == 'teacher' ? 'selected' : '' }}>Enseignant</option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrateur</option>
                            </select>
                        </form>
                    </td>
                    <td class="py-3 px-4 text-sm">
                        <div class="flex flex-wrap space-x-2">
                            <a href="{{ route('users.show', $user->id) }}" class="text-blue-500 hover:text-blue-700 font-bold">Voir</a>
                            <a href="{{ route('users.edit', $user->id) }}" class="text-green-500 hover:text-green-700 font-bold">Modifier</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 font-bold">Supprimer</button>
                            </form>
                        </div>
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
