<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-white leading-tight bg-blue-600 p-4 rounded">
      {{ __('Gestion des cours') }}
    </h2>
  </x-slot>

  <!-- Bloc Admin : lien d'action -->
  <div class="mt-4 ml-6">
    <h4 class="text-blue-600 text-2xl font-bold">Admin</h4>
    <ul class="mt-4 ml-6">
      <li>
        <a href="{{ route('cours.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white p-3 rounded">
          Créer un nouveau cours
        </a>
      </li>
    </ul>
  </div>

  <!-- Contenu principal -->
  <div class="py-12 bg-white">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-blue-500">
        <div class="p-6 text-blue-700 bg-white">
          <!-- Cards de statistiques -->
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <div class="hover:bg-blue-50 bg-white rounded-lg shadow-md p-4 border border-blue-200">
              <h3 class="text-lg font-bold mb-2 text-blue-600">Utilisateurs</h3>
              <p class="text-4xl font-bold">{{ $userCount }}</p>
              <a href="{{ route('users.index') }}" class="text-blue-500 hover:text-blue-700 font-bold">
                Voir tous les utilisateurs
              </a>
            </div>
            <div class="hover:bg-blue-50 bg-white rounded-lg shadow-md p-4 border border-blue-200">
              <h3 class="text-lg font-bold mb-2 text-blue-600">Cours</h3>
              <p class="text-4xl font-bold">{{ $coursCount }}</p>
              <a href="{{ route('cours.index') }}" class="text-blue-500 hover:text-blue-700 font-bold">
                Voir tous les cours
              </a>
            </div>
            <div class="hover:bg-blue-50 bg-white rounded-lg shadow-md p-4 border border-blue-200">
              <h3 class="text-lg font-bold mb-2 text-blue-600">Commandes</h3>
              <p class="text-4xl font-bold">4</p>
              <a href="#" class="text-blue-500 hover:text-blue-700 font-bold">
                Voir toutes les commandes
              </a>
            </div>
            <div class="hover:bg-blue-50 bg-white rounded-lg shadow-md p-4 border border-blue-200">
              <h3 class="text-lg font-bold mb-2 text-blue-600">Nombre d'étudiants</h3>
              <p class="text-4xl font-bold">{{ $studentCount }}</p>
              <a href="#" class="text-blue-500 hover:text-blue-700 font-bold">
                Voir tous les étudiants
              </a>
            </div>
            <div class="hover:bg-blue-50 bg-white rounded-lg shadow-md p-4 border border-blue-200">
              <h3 class="text-lg font-bold mb-2 text-blue-600">Nombre d'enseignants</h3>
              <p class="text-4xl font-bold">{{ $teacherCount }}</p>
              <a href="#" class="text-blue-500 hover:text-blue-700 font-bold">
                Voir tous les enseignants
              </a>
            </div>
            <div class="hover:bg-blue-50 bg-white rounded-lg shadow-md p-4 border border-blue-200">
              <h3 class="text-lg font-bold mb-2 text-blue-600">Revenus</h3>
              <p class="text-4xl font-bold">330 €</p>
              <a href="#" class="text-blue-500 hover:text-blue-700 font-bold">
                Voir les rapports
              </a>
            </div>
          </div>
          <!-- Tableau des derniers utilisateurs inscrits -->
          <div class="mt-8">
            <h2 class="text-lg font-bold mb-4 text-blue-600">Derniers utilisateurs inscrits</h2>
            <div class="bg-white rounded-lg shadow-md p-4 border border-blue-200">
              <!-- Ajout de l'overflow-x-auto pour le scroll horizontal sur mobile -->
              <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-blue-300">
                  <thead class="bg-blue-600 text-white">
                    <tr>
                      <th class="py-2 px-4 text-left">Nom</th>
                      <th class="py-2 px-4 text-left">Email</th>
                      <th class="py-2 px-4 text-left">Date d'inscription</th>
                      <th class="py-2 px-4 text-left">Rôle</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-blue-200">
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
          <!-- Fin du tableau -->
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
