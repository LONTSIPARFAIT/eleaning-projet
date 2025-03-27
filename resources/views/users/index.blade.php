@extends('layouts.admin')

@section('title', 'Liste des utilisateurs')

@section('content')
<div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-blue-50 to-orange-100 min-h-screen">
    <h1 class="text-3xl font-bold mb-6 text-blue-900 animate-fade-in-down flex items-center gap-2">
        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 1.857h10M9 5a4 4 0 11-8 0 4 4 0 018 0zM15 5a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
        Tous les utilisateurs
    </h1>

    <div class="flex justify-end mb-6 scroll-reveal">
        <a href="{{ route('users.create') }}" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Ajouter un utilisateur
        </a>
    </div>

    <!-- Conteneur avec débordement horizontal -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-x-auto scroll-reveal border border-blue-200">
        <table class="min-w-full table-auto divide-y divide-gray-200">
            <thead class="bg-red-600 text-white">
                <tr>
                    <th class="py-3 px-4 text-left text-sm font-semibold">Nom</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold">Email</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold">Rôle</th>
                    <th class="py-3 px-4 text-left text-center text-sm font-semibold">Gestion de rôle</th>
                    <th class="py-3 px-4 text-left text-center text-sm font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($users as $user)
                    <tr class="hover:bg-orange-50 bg-white dark:bg-gray-800 transition duration-200">
                        <td class="py-3 px-4 text-sm text-gray-700">{{ $user->name }}</td>
                        <td class="py-3 px-4 text-sm text-gray-700">{{ $user->email }}</td>
                        <td class="py-3 px-4 text-sm text-gray-700">{{ $user->role }}</td>
                        <td class="py-3 px-4 text-sm">
                            <form action="{{ route('users.updateRole', $user->id) }}" method="POST" class="inline-block w-full">
                                @csrf
                                @method('PUT')
                                <select name="role" onchange="this.form.submit()" class="bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-md w-full text-sm border-blue-300 focus:border-red-500 focus:ring-red-500 transition duration-200">
                                    <option value="student" {{ $user->role == 'student' ? 'selected' : '' }}>Étudiant</option>
                                    <option value="teacher" {{ $user->role == 'teacher' ? 'selected' : '' }}>Enseignant</option>
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrateur</option>
                                </select>
                            </form>
                        </td>
                        <td class="py-3 px-4 text-sm">
                            <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3">
                                <a href="{{ route('users.show', $user->id) }}" class="text-blue-500 hover:text-blue-700 font-semibold transition duration-200 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M19 12a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                    Voir
                                </a>
                                <a href="{{ route('users.edit', $user->id) }}" class="text-green-500 hover:text-green-700 font-semibold transition duration-200 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    Modifier
                                </a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 font-semibold transition duration-200 flex items-center gap-1" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 0a2 2 0 00-2 2h8a2 2 0 00-2-2m-6 0V5m6 2H5m14 0h-3"></path></svg>
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6 scroll-reveal">
        {{ $users->links('pagination::tailwind') }}
    </div>
</div>

<style>
    /* Animations personnalisées */
    @keyframes fadeInUp {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeInDown {
        0% { opacity: 0; transform: translateY(-20px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    .scroll-reveal {
        opacity: 0;
        transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    }
    .scroll-reveal.visible {
        animation: fadeInUp 0.6s ease-out forwards;
    }
    .animate-fade-in-down {
        animation: fadeInDown 0.6s ease-out;
    }
</style>

<script>
    // Animation au scroll avec répétition
    document.addEventListener('DOMContentLoaded', () => {
        const elements = document.querySelectorAll('.scroll-reveal');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                } else {
                    entry.target.classList.remove('visible');
                }
            });
        }, { threshold: 0.2 });

        elements.forEach(element => observer.observe(element));
    });
</script>
@endsection