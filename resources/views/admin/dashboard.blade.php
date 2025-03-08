<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Gestion des cours') }}
      </h2>
  </x-slot>

  <div class="mt-4 ml-6">
      <h4 class="text-gray-500 text-2xl">Admin</h4>
      <ul class="mt-4 ml-6">
          <li>
              <a href="{{ route('cours.create') }}" class="bg-red-500 hover:bg-red-700 text-white p-3 rounded">Créer un nouveau cours</a>
          </li>
      </ul>
  </div>

  <div class="py-12 bg-red-100">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100 bg-green-100">
                  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
                      <div class="hover:bg-gray-100 bg-red-100 dark:bg-gray-700 rounded-lg shadow-md p-4">
                          <h3 class="text-lg font-bold mb-2">Utilisateurs</h3>
                          <p class="text-4xl font-bold">{{ $userCount }}</p>
                          <a href="{{ route('users.index') }}" class="text-red-500 hover:text-red-700 font-bold">Voir tous les utilisateurs</a>
                      </div>
                      <div class="hover:bg-gray-100 bg-red-100 dark:bg-gray-700 rounded-lg shadow-md p-4">
                          <h3 class="text-lg font-bold mb-2">Cours</h3>
                          <p class="text-4xl font-bold">{{ $coursCount }}</p>
                          <a href="{{ route('cours.index') }}" class="text-red-500 hover:text-red-700 font-bold">Voir tous les cours</a>
                      </div>
                      <div class="hover:bg-gray-100 bg-red-100 dark:bg-gray-700 rounded-lg shadow-md p-4">
                          <h3 class="text-lg font-bold mb-2">Commandes</h3>
                          <p class="text-4xl font-bold">4</p>
                          <a href="#" class="text-red-500 hover:text-red-700 font-bold">Voir toutes les commandes</a>
                      </div>
                      <div class="hover:bg-gray-100 bg-red-100 dark:bg-gray-700 rounded-lg shadow-md p-4">
                          <h3 class="text-lg font-bold mb-2">Nombre d'étudiants</h3>
                          <p class="text-4xl font-bold">{{ $studentCount }}</p>
                          <a href="#" class="text-red-500 hover:text-red-700 font-bold">Voir tous les étudiants</a>
                      </div>
                      <div class="hover:bg-gray-100 bg-red-100 dark:bg-gray-700 rounded-lg shadow-md p-4">
                          <h3 class="text-lg font-bold mb-2">Nombre d'enseignants</h3>
                          <p class="text-4xl font-bold">{{ $teacherCount }}</p>
                          <a href="#" class="text-red-500 hover:text-red-700 font-bold">Voir tous les enseignants</a>
                      </div>
                      <div class="hover:bg-gray-100 bg-red-100 dark:bg-gray-700 rounded-lg shadow-md p-4">
                          <h3 class="text-lg font-bold mb-2">Revenus</h3>
                          <p class="text-4xl font-bold">330 €</p>
                          <a href="#" class="text-red-500 hover:text-red-700 font-bold">Voir les rapports</a>
                      </div>
                  </div>

                  <div class="mt-8">
                    <h2 class="text-lg font-bold mb-4">Derniers utilisateurs inscrits</h2>
                    <div class="bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md p-4">
                        <div class="overflow-x-auto sm:hidden"> <!-- Défilement horizontal uniquement sur mobile -->
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-red-600 font-bold dark:bg-gray-600">
                                    <tr>
                                        <th class="py-2 px-4 text-left">Nom</th>
                                        <th class="py-2 px-4 text-left">Email</th>
                                        <th class="py-2 px-4 text-left">Date d'inscription</th>
                                        <th class="py-2 px-4 text-left">Rôle</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-600">
                                    @foreach ($newUsers as $user)
                                        <tr>
                                            <td class="py-2 px-4">{{ $user->name }}</td>
                                            <td class="py-2 px-4">{{ $user->email }}</td>
                                            <td class="py-2 px-4">{{ $user->created_at->format('d/m/Y H:i') }}</td>
                                            <td class="py-2 px-4">{{ $user->role }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="hidden sm:block"> <!-- Afficher le tableau complet sur les écrans plus grands -->
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-red-600 font-bold dark:bg-gray-600">
                                    <tr>
                                        <th class="py-2 px-4 text-left">Nom</th>
                                        <th class="py-2 px-4 text-left">Email</th>
                                        <th class="py-2 px-4 text-left">Date d'inscription</th>
                                        <th class="py-2 px-4 text-left">Rôle</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-600">
                                    @foreach ($newUsers as $user)
                                        <tr>
                                            <td class="py-2 px-4">{{ $user->name }}</td>
                                            <td class="py-2 px-4">{{ $user->email }}</td>
                                            <td class="py-2 px-4">{{ $user->created_at->format('d/m/Y H:i') }}</td>
                                            <td class="py-2 px-4">{{ $user->role }}</td>
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
  </div>
</x-app-layout>