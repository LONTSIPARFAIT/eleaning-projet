<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-red-600 leading-tight">
            {{ __('Gestion des cours') }}
        </h2>
    </x-slot>
  
    <div class="container mx-auto px-4 py-6">
        <!-- Entête -->
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-8">
            <h4 class="text-lg font-medium text-gray-800">Admin</h4>
            <a href="{{ route('cours.create') }}" class="mt-4 sm:mt-0 bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded shadow">
                Créer un nouveau cours
            </a>
        </div>
  
        <!-- Cartes de statistiques -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Utilisateurs -->
            <div class="bg-white border border-red-100 hover:shadow-lg rounded-lg p-6">
                <h3 class="text-red-600 text-lg font-bold mb-2">Utilisateurs</h3>
                <p class="text-4xl font-extrabold text-gray-800">{{ $userCount }}</p>
                <a href="{{ route('users.index') }}" class="block mt-4 text-red-600 hover:underline">
                    Voir tous les utilisateurs
                </a>
            </div>
            <!-- Cours -->
            <div class="bg-white border border-red-100 hover:shadow-lg rounded-lg p-6">
                <h3 class="text-red-600 text-lg font-bold mb-2">Cours</h3>
                <p class="text-4xl font-extrabold text-gray-800">{{ $coursCount }}</p>
                <a href="{{ route('cours.index') }}" class="block mt-4 text-red-600 hover:underline">
                    Voir tous les cours
                </a>
            </div>
            <!-- Commandes -->
            <div class="bg-white border border-red-100 hover:shadow-lg rounded-lg p-6">
                <h3 class="text-red-600 text-lg font-bold mb-2">Commandes</h3>
                <p class="text-4xl font-extrabold text-gray-800">4</p>
                <a href="#" class="block mt-4 text-red-600 hover:underline">
                    Voir toutes les commandes
                </a>
            </div>
            <!-- Nombre d'étudiants -->
            <div class="bg-white border border-red-100 hover:shadow-lg rounded-lg p-6">
                <h3 class="text-red-600 text-lg font-bold mb-2">Nombre d'étudiants</h3>
                <p class="text-4xl font-extrabold text-gray-800">{{ $studentCount }}</p>
                <a href="#" class="block mt-4 text-red-600 hover:underline">
                    Voir tous les étudiants
                </a>
            </div>
            <!-- Nombre d'enseignants -->
            <div class="bg-white border border-red-100 hover:shadow-lg rounded-lg p-6">
                <h3 class="text-red-600 text-lg font-bold mb-2">Nombre d'enseignants</h3>
                <p class="text-4xl font-extrabold text-gray-800">{{ $teacherCount }}</p>
                <a href="#" class="block mt-4 text-red-600 hover:underline">
                    Voir tous les enseignants
                </a>
            </div>
            <!-- Revenus -->
            <div class="bg-white border border-red-100 hover:shadow-lg rounded-lg p-6">
                <h3 class="text-red-600 text-lg font-bold mb-2">Revenus</h3>
                <p class="text-4xl font-extrabold text-gray-800">330 €</p>
                <a href="#" class="block mt-4 text-red-600 hover:underline">
                    Voir les rapports
                </a>
            </div>
        </div>
  
        <!-- Derniers utilisateurs inscrits -->
        <div class="mt-10">
            <h2 class="text-xl font-bold text-red-600 mb-4">Derniers utilisateurs inscrits</h2>
            <div class="bg-white rounded-lg shadow overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-red-600">
                        <tr>
                            <th class="py-3 px-4 text-left text-white font-bold">Nom</th>
                            <th class="py-3 px-4 text-left text-white font-bold">Email</th>
                            <th class="py-3 px-4 text-left text-white font-bold">Date d'inscription</th>
                            <th class="py-3 px-4 text-left text-white font-bold">Rôle</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($newUsers as $user)
                            <tr>
                                <td class="py-3 px-4">{{ $user->name }}</td>
                                <td class="py-3 px-4">{{ $user->email }}</td>
                                <td class="py-3 px-4">{{ $user->created_at->format('d/m/Y H:i') }}</td>
                                <td class="py-3 px-4">{{ $user->role }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </x-app-layout>
  