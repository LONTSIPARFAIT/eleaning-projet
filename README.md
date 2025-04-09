**Gestion des utilisateurs** :
   - Inscription et connexion des utilisateurs.
   - Gestion des rôles : étudiant, enseignant, administrateur.
   - Mise à jour du profil et gestion des photos de profil.

2. **Gestion des cours** :
   - Création, modification et suppression des cours par les enseignants.
   - Abonnement des étudiants aux cours.
   - Affichage des détails des cours, y compris les leçons et exercices associés.

3. **Gestion des leçons** :
   - Ajout, édition et suppression des leçons associées à un cours.
   - Affichage des leçons pour les étudiants.

4. **Gestion des exercices** :
   - Création et gestion des exercices pour les cours.
   - Évaluation des exercices soumis par les étudiants.

5. **Quiz interactifs** :
   - Création de quiz pour les leçons.
   - Soumission des réponses par les étudiants et évaluation automatique.

6. **Tableaux de bord** :
   - Tableau de bord personnalisé pour chaque rôle (étudiant, enseignant, administrateur).
   - Statistiques et gestion des ressources pédagogiques.

## Installation

1. Clonez le dépôt :
   ```bash
   git clone https://github.com/votre-utilisateur/elearning.git
   cd elearning
   ```

2. Installez les dépendances PHP et JavaScript :
   ```bash
   composer install
   npm install
   ```

3. Configurez le fichier `.env` :
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Configurez votre base de données dans le fichier `.env`, puis exécutez les migrations :
   ```bash
   php artisan migrate --seed
   ```

5. Compilez les assets front-end :
   ```bash
   npm run dev
   ```

6. Lancez le serveur de développement :
   ```bash
   php artisan serve
   ```

## Routes principales

- **Page d'accueil** : `/`
- **Tableau de bord étudiant** : `/student/dashboard`
- **Tableau de bord enseignant** : `/teacher/dashboard`
- **Tableau de bord administrateur** : `/admin/dashboard`
- **Gestion des cours** : `/admin/cours`
- **Gestion des leçons** : `/admin/lessons`
- **Gestion des exercices** : `/admin/exercises`

## Technologies utilisées

- **Backend** : Laravel 10
- **Frontend** : Blade, Tailwind CSS, Alpine.js
- **Base de données** : MySQL
- **Build tools** : Vite

## Contribution

Les contributions sont les bienvenues ! Veuillez soumettre une pull request ou ouvrir une issue pour discuter des changements que vous souhaitez apporter.

## Licence

Ce projet est sous licence [MIT](https://opensource.org/licenses/MIT).