<x-app-layout>
  <x-slot name="header">
    <!-- En-tête avec fond rouge et texte blanc -->
    <h2 class="font-semibold text-xl text-white leading-tight bg-red-600 p-4 rounded">
      {{ __('Gestion des cours') }}
    </h2>
  </x-slot>

  <!-- Bloc Admin : liens d'action -->
  <div class="mt-4 ml-6">
    <h4 class="text-red-600 text-2xl font-bold">Admin</h4>
    <ul class="mt-4 ml-6">
      <li>
        <a href="{{ route('cours.create') }}"
           class="bg-red-500 hover:bg-red-700 text-white p-3 rounded">
          Créer un nouveau cours
        </a>
      </li>
    </ul>
  </div>

  <!-- Contenu principal avec fond neutre pour alléger la page -->
  <div class="py-12 bg-gray-100">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <!-- Conteneur principal avec une légère bordure rouge pour le rappel de la charte -->
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-red-300">
        <div class="p-6 text-gray-800">
          
          <!-- Cards de statistiques -->
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <div class="hover:bg-red-50 bg-white rounded-lg shadow-md p-4 border border-gray-200">
              <h3 class="text-lg font-bold mb-2 text-red-600">Utilisateurs</h3>
              <p class="text-4xl font-bold">{{ $userCount }}</p>
              <a href="{{ route('users.index') }}" class="text-red-500 hover:text-red-700 font-bold">
                Voir tous les utilisateurs
              </a>
            </div>
            
            <div class="hover:bg-red-50 bg-white rounded-lg shadow-md p-4 border border-gray-200">
              <h3 class="text-lg font-bold mb-2 text-red-600">Cours</h3>
              <p class="text-4xl font-bold">{{ $coursCount }}</p>
              <a href="{{ route('cours.index') }}" class="text-red-500 hover:text-red-700 font-bold">
                Voir tous les cours
              </a>
            </div>
            
            <div class="hover:bg-red-50 bg-white rounded-lg shadow-md p-4 border border-gray-200">
              <h3 class="text-lg font-bold mb-2 text-red-600">Commandes</h3>
              <p class="text-4xl font-bold">4</p>
              <a href="#" class="text-red-500 hover:text-red-700 font-bold">
                Voir toutes les commandes
              </a>
            </div>
            
            <div class="hover:bg-red-50 bg-white rounded-lg shadow-md p-4 border border-gray-200">
              <h3 class="text-lg font-bold mb-2 text-red-600">Nombre d'étudiants</h3>
              <p class="text-4xl font-bold">{{ $studentCount }}</p>
              <a href="#" class="text-red-500 hover:text-red-700 font-bold">
                Voir tous les étudiants
              </a>
            </div>
            
            <div class="hover:bg-red-50 bg-white rounded-lg shadow-md p-4 border border-gray-200">
              <h3 class="text-lg font-bold mb-2 text-red-600">Nombre d'enseignants</h3>
              <p class="text-4xl font-bold">{{ $teacherCount }}</p>
              <a href="#" class="text-red-500 hover:text-red-700 font-bold">
                Voir tous les enseignants
              </a>
            </div>
            
            <div class="hover:bg-red-50 bg-white rounded-lg shadow-md p-4 border border-gray-200">
              <h3 class="text-lg font-bold mb-2 text-red-600">Revenus</h3>
              <p class="text-4xl font-bold">330 €</p>
              <a href="#" class="text-red-500 hover:text-red-700 font-bold">
                Voir les rapports
              </a>
            </div>
          </div>
          <!-- Fin des cards -->

          <!-- Tableau des derniers utilisateurs inscrits -->
          <div class="mt-8">
            <h2 class="text-lg font-bold mb-4 text-red-600">Derniers utilisateurs inscrits</h2>
            <div class="bg-white rounded-lg shadow-md p-4 border border-gray-200">
              <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-300">
                  <thead class="bg-red-600 text-white">
                    <tr>
                      <th class="py-2 px-4 text-left">Nom</th>
                      <th class="py-2 px-4 text-left">Email</th>
                      <th class="py-2 px-4 text-left">Date d'inscription</th>
                      <th class="py-2 px-4 text-left">Rôle</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
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
