<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\Admin\CoursController;
use App\Http\Controllers\Admin\LessonsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('welcome');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [HomeController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
// Route::get('/create',[CoursController::class,'create'])->name('cours.index');

// Routes administratives
Route::prefix('admin')->group(function () {
    // Routes pour les cours
    // Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    // Route::resource('cours', CoursController::class)->except(['show']);

    // Routes pour les utilisateurs
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    // Routes pour les leçons
    Route::prefix('lessons')->group(function () {
        Route::get('/', [LessonsController::class, 'index'])->name('lessons.index');
        Route::get('/create', [LessonsController::class, 'create'])->name('lessons.create');
        Route::get('/{id}', [LessonsController::class, 'show'])->name('lessons.show');
        Route::get('/cours/{cours_id}', [LessonsController::class, 'index'])->name('cours.lessons.index');
    });

    // Routes pour les exercices
    Route::prefix('exercises')->name('exercises.')->group(function () {
        Route::get('/cours/{cours_id}/exercises', [ExerciseController::class, 'index'])->name('cours.index');
        Route::get('/cours/{cours_id}/create', [ExerciseController::class, 'create'])->name('create');
        Route::post('/cours/{cours_id}', [ExerciseController::class, 'store'])->name('store');
        Route::get('/{exercise}', [ExerciseController::class, 'show'])->name('show');
        Route::get('/{exercise}/edit', [ExerciseController::class, 'edit'])->name('edit');
        Route::put('/{exercise}', [ExerciseController::class, 'update'])->name('update');
        Route::delete('/{exercise}', [ExerciseController::class, 'destroy'])->name('destroy');
    });
    Route::prefix('admin')->name('admin.')->group(function() {
            Route::resource('cours', CoursController::class)->names([
                'store' => 'cours.store'
            ]);
    });

        Route::resource('cours', CoursController::class)->names([
            'create' => 'cours.create'
        ]);

        Route::resource('cours', CoursController::class)->names([
            'update' => 'cours.update'
        ]);
});

Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'index'])->name('student.dashboard');
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/teacher/dashboard', [TeacherController::class, 'index'])->name('teacher.dashboard');
});

Route::resource('quizzes', QuizController::class);
Route::get('quizzes/{quiz}/questions/create', [QuestionController::class, 'create'])->name('quizzes.questions.create');
Route::post('quizzes/{quiz}/questions', [QuestionController::class, 'store'])->name('quizzes.questions.store');
Route::post('quizzes/{quiz}/submit', [QuizController::class, 'submit'])->name('quizzes.submit');

// Route::resource('lessons', LessonsController::class);
// Route::resource('quizzes', QuizController::class);
// Route::resource('quizzes', QuizController::class);
Route::resource('quizzes.questions', QuestionController::class);
Route::get('lessons/{lessonId}/quizzes', [QuizController::class, 'index'])->name('quizzes.index');

    // // routes/web.php
    // Route::prefix('admin')->name('admin.')->group(function () {
    //     Route::get('/users', [UserController::class, 'index'])->name('users.index');

    //     // // Routes pour les leçons
    //     // Route::get('/lessons', [LessonsController::class, 'index'])->name('admin.lessons.index');
    //     // Route::get('/lessons', [LessonsController::class, 'create'])->name('lessons.create');

    //     // // Route pour afficher une leçon spécifique
    //     // Route::get('/lessons/{id}', [LessonsController::class, 'show'])->name('lessons.show');

    // });

    // Route::prefix('admin/lessons')->group(function () {
    //     // Route pour afficher toutes les leçons
    //     // Route::get('/lessons', [LessonsController::class, 'index'])->name('admin.lessons.index');

    //     // Route pour afficher toutes les leçons d'un cours spécifique
    //     Route::get('/cours/{cours_id}/lessons', [LessonsController::class, 'index'])->name('admin.cours.lessons.index');

    //     // Route pour créer une leçon
    //     Route::get('/lessons/create', [LessonsController::class, 'create'])->name('admin.lessons.create');

    //     // Route pour afficher une leçon spécifique
    //     Route::get('/lessons/{id}', [LessonsController::class, 'show'])->name('admin.lessons.show');
    // });

    // Route::prefix('admin/exercises')->name('admin.exercises.')->group(function () {
    //     // Route pour afficher les exercices d'un cours spécifique
    //     // Route::get('{cours_id}', [ExerciseController::class, 'index'])->name('index');

    //     // Route pour afficher toutes les leçons d'un cours spécifique
    //     Route::get('/cours/{cours_id}/exercise', [ExerciseController::class, 'index'])->name('admin.cours.exercise.index');

    //     // Route pour créer un nouvel exercice
    //     Route::get('{cours_id}/create', [ExerciseController::class, 'create'])->name('create');

    //     // Route pour stocker un nouvel exercice
    //     Route::post('', [ExerciseController::class, 'store'])->name('store');

    //     // Route pour afficher un exercice spécifique
    //     Route::get('exercise/{exercise}', [ExerciseController::class, 'show'])->name('show');

    //     // Route pour éditer un exercice spécifique
    //     Route::get('exercise/{exercise}/edit', [ExerciseController::class, 'edit'])->name('edit');

    //     // Route pour mettre à jour un exercice
    //     Route::put('exercise/{exercise}', [ExerciseController::class, 'update'])->name('update');

    //     // Route pour supprimer un exercice
    //     Route::delete('exercise/{exercise}', [ExerciseController::class, 'destroy'])->name('destroy');
    // });


