@extends('layouts.admin')

@section('title', 'Liste des utilisateur')
@section('content')
<div class="container py-8 mx-7 ml-7">
    <h1 class="text-3xl font-bold ml-4 text-blue-900">Tous les utilisateurs</h1>

    <div class="flex justify-end items-end mx-10 pb-2">
        <a href="{{ route('users.create') }}"  class="bg-red-500 hover:bg-red-700 text-white p-3 rounded">Ajouter un User</a>
    </div>

    <div class="bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md p-4">
        <table class="w-full">
            <thead>
                <tr class="bg-red-600 text-white dark:bg-gray-600">
                    <th class="py-2 px-4 text-left">Nom</th>
                    <th class="py-2 px-4 text-left">Email</th>
                    <th class="py-2 px-4 text-left">Rôle</th>
                    <th class="py-2 px-4 text-left">Gestion de role</th>
                    <th class="py-2 px-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="border-b hover:bg-gray-200 bg-white border-gray-200 dark:border-gray-600">
                    <td class="py-2 px-4">{{ $user->name }}</td>
                    <td class="py-2 px-4">{{ $user->email }}</td>
                    <td class="py-2 px-4">{{ $user->role }}</td>
                    <td class="py-2 px-4">
                        <form action="{{ route('users.updateRole', $user->id) }}" method="POST">
                            {{-- {{ route('users.updateRole', $user->id) }} --}}
                            @csrf
                            @method('PUT')
                            <select name="role" onchange="this.form.submit()" class="bg-gray-200 rounded">
                                <option value="student" {{ $user->role == 'student' ? 'selected' : '' }}>Étudiant</option>
                                <option value="teacher" {{ $user->role == 'teacher' ? 'selected' : '' }}>Enseignant</option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrateur</option>
                            </select>
                        </form>
                    </td>
                    <td class="py-2 px-4">
                        <a href="{{ route('users.show', $user->id) }}" class="text-blue-500 hover:text-blue-700 font-bold mr-2">Voir</a>
                        <a href="{{ route('users.edit', $user->id) }}" class="text-green-500 hover:text-green-700 font-bold mr-2">Modifier</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 font-bold">Supprimer</button>
                        </form>
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
