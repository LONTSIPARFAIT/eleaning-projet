<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestion des cours') }}
        </h2>
    </x-slot>

    <div class="mt-4 ml-6">
        <h4 class="text-gray-500 text-2xl">Admin</h4>
        <ul class="mt-4 ml-6">
            {{-- <li><a href="{{ route('cours.index') }}">View Cours</a></li> --}}
            <li  class=""><a href="{{ route('cours.create') }}" class="bg-blue-500 hover:bg-green-500 text-white p-3 rounded">Creer un nouveau cours</a></li>
        </ul>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md p-4">
                            <h3 class="text-lg font-bold mb-2">Utilisateurs</h3>
                            <p class="text-4xl font-bold">{{ $userCount }}</p>
                            <a href="{{ route('admin.users.index') }}" class="text-blue-500 hover:text-blue-700 font-bold">
                                Voir tous les utilisateurs
                            </a>
                        </div>
                        <div class="bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md p-4">
                            <h3 class="text-lg font-bold mb-2">Cours</h3>
                            <p class="text-4xl font-bold">{{ $coursCount }}</p>
                            <a href="{{ route('cours.index') }}" class="text-blue-500 hover:text-blue-700 font-bold">
                                Voir tous les cours
                            </a>
                        </div>
                        <div class="bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md p-4">
                            <h3 class="text-lg font-bold mb-2">Commandes</h3>
                            <p class="text-4xl font-bold">4</p>
                            <a href="#" class="text-blue-500 hover:text-blue-700 font-bold">
                                Voir toutes les commandes
                            </a>
                        </div>
                        <div class="bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md p-4">
                            <h3 class="text-lg font-bold mb-2">Revenus</h3>
                            <p class="text-4xl font-bold">330 €</p>
                            <a href="#" class="text-blue-500 hover:text-blue-700 font-bold">
                                Voir les rapports
                            </a>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h2 class="text-lg font-bold mb-4">Derniers utilisateurs inscrits</h2>
                        <div class="bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md p-4">
                            <table class="w-full">
                                <thead>
                                    <tr class="bg-gray-200 dark:bg-gray-600">
                                        <th class="py-2 px-4 text-left">Nom</th>
                                        <th class="py-2 px-4 text-left">Email</th>
                                        <th class="py-2 px-4 text-left">Date d'inscription</th>
                                        <th class="py-2 px-4 text-left">Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($newUsers as $user)
                                        <tr class="border-b border-gray-200 dark:border-gray-600">
                                            <td class="py-2 px-4">{{ $user->name }}</td>
                                            <td class="py-2 px-4">{{ $user->email }}</td>
                                            <td class="py-2 px-4">{{ $user->created_at->format('d/m/Y H:i') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
