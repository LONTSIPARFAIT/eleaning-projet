# Elearning Project

Bienvenue dans le projet **Elearning**, une plateforme d'apprentissage en ligne développée avec le framework Laravel. Ce projet offre des fonctionnalités pour les étudiants, enseignants et administrateurs, permettant la gestion des cours, leçons, exercices et quiz.

## Fonctionnalités

- **Gestion des utilisateurs** : Inscription, connexion, gestion des rôles (étudiant, enseignant, administrateur).
- **Gestion des cours** : Création, modification, suppression et abonnement aux cours.
- **Gestion des leçons** : Ajout, édition et affichage des leçons associées aux cours.
- **Gestion des exercices** : Création, édition et suppression des exercices pour les cours.
- **Quiz interactifs** : Création de quiz et soumission des réponses.
- **Tableau de bord** : Différents tableaux de bord pour les étudiants, enseignants et administrateurs.

# Elearning Project

Bienvenue dans le projet **Elearning**, une plateforme d'apprentissage en ligne développée avec le framework Laravel. Ce projet offre des fonctionnalités pour les étudiants, enseignants et administrateurs, permettant la gestion des cours, leçons, exercices et quiz.

## Fonctionnalités

- **Gestion des utilisateurs** : Inscription, connexion, gestion des rôles (étudiant, enseignant, administrateur).
- **Gestion des cours** : Création, modification, suppression et abonnement aux cours.
- **Gestion des leçons** : Ajout, édition et affichage des leçons associées aux cours.
- **Gestion des exercices** : Création, édition et suppression des exercices pour les cours.
- **Quiz interactifs** : Création de quiz et soumission des réponses.
- **Tableau de bord** : Différents tableaux de bord pour les étudiants, enseignants et administrateurs.

## Installation

1. Clonez le dépôt :
   ```bash
   git clone https://github.com/votre-utilisateur/elearning.git
   cd elearning

2. Installez les dépendances PHP et JavaScript :
 ```bash
composer install
npm install`
```

3. Configurez le fichier .env :
 ```bash
cp .env.example .env
php artisan key:generate
```

4. Configurez votre base de données dans le fichier .env, puis exécutez les migrations :
 ```bash
php artisan migrate --seed
```

5. Compilez les assets front-end :
npm run dev

6. Lancez le serveur de développement :
php artisan serve
```

Routes principales
Page d'accueil : /
Tableau de bord étudiant : /student/dashboard
Tableau de bord enseignant : /teacher/dashboard
Tableau de bord administrateur : /admin/dashboard
Gestion des cours : /admin/cours
Gestion des leçons : /admin/lessons
Gestion des exercices : /admin/exercises

Technologies utilisées
Backend : Laravel 10
Frontend : Blade, Tailwind CSS, Alpine.js
Base de données : MySQL
Build tools : Vite

Contribution
Les contributions sont les bienvenues ! Veuillez soumettre une pull request ou ouvrir une issue pour discuter des changements que vous souhaitez apporter.

Licence
Ce projet est sous licence MIT.