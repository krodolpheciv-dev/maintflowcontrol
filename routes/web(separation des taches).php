<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreationpermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\ProjectSelectionController;
use App\Http\Controllers\Divers\RequeteCmController;
use App\Http\Controllers\Referentiels\SitesController;
use App\Http\Controllers\Typeincidents\TypeincidentsController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Routes invités (accessibles seulement si déconnecté)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {

    // Login
    Route::get('/login', [LoginController::class, 'showForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    // Register
    Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    // Mot de passe oublié
    Route::get('/password/reset', [PasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email', [PasswordController::class, 'sendResetLinkEmail'])->name('password.email');
});

/*
|--------------------------------------------------------------------------
| Réinitialisation de mot de passe (accessible via lien email, sans "auth")
|--------------------------------------------------------------------------
*/
Route::get('/password/reset/{token}', [PasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [PasswordController::class, 'reset'])->name('password.update');

/*
|--------------------------------------------------------------------------
| Routes authentifiées (nécessitent d'être connecté)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    
    Route::get('/account/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/account/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/account/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::put('/account', [ProfileController::class, 'updateAccount'])->name('profile.account.update');

    // Sélection de projet
    Route::get('/select-project', [ProjectSelectionController::class, 'showSelectionForm'])->name('select.project');
    Route::post('/select-project', [ProjectSelectionController::class, 'selectProject'])->name('select.project.submit');

    /*
    |----------------------------------------------------------------------
    | Routes qui nécessitent un projet sélectionné
    |----------------------------------------------------------------------
    */
    Route::middleware('ensure.project')->group(function () {

        // Changement de projet
        Route::get('/switch-project/{projectId}', [ProjectSelectionController::class, 'switchProject'])->name('switch.project');

        // Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Pages simples
        Route::get('/finance', function () {
            return view('dashboard/finance');
        })->name('finance');

        Route::get('/demandecm', function () {
            return view('forms/requetescm');
        })->name('demandecm');

        Route::get('/interventioncm', function () {
            return view('forms/interventioncm');
        })->name('interventioncm');

        Route::get('/validationscm', function () {
            return view('forms/validationscm');
        })->name('validationscm');

        // Routes avec contrôleurs
        Route::get('/requetescm', [RequeteCmController::class, 'index'])->name('requetescm');
        Route::get('/sites', [SitesController::class, 'index'])->name('sites');
        Route::get('/typeincidents', [TypeincidentsController::class, 'index'])->name('typeincidents');

        Route::get('/analytics', function () {
            return view('dashboard/analytics');
        })->name('analytics');

        // ==================== GESTION DES UTILISATEURS ====================
        Route::get('/Utilisateur', [UserController::class, 'index'])->name('utilisateur');
        Route::post('/Utilisateur', [UserController::class, 'store'])->name('users.store');
        Route::get('/utilisateur/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/utilisateur/{user}', [UserController::class, 'update'])->name('utilisateur.update');
        Route::delete('/utilisateur/{user}', [UserController::class, 'destroy'])->name('utilisateur.destroy');

        // ==================== GESTION DES PROJETS ====================
        Route::get('/creationprojet', [ProjectController::class, 'index'])->name('creationprojet');
        Route::resource('projects', ProjectController::class);

        // ==================== GESTION DES PERMISSIONS ====================
        Route::get('/gestprofil', [CreationpermissionController::class, 'create'])->name('gestprofil');
        Route::post('/createrole', [RoleController::class, 'store'])->name('roles.store');
        Route::get('/permissions', [CreationpermissionController::class, 'index'])->name('permissions.index');
        Route::post('/permissions', [CreationpermissionController::class, 'store'])->name('permissions.store');
        Route::put('/permissions/{permission}', [CreationpermissionController::class, 'update'])->name('permissions.update');
        Route::put('/roles/{permission}', [RoleController::class, 'update'])->name('role.update');
        Route::delete('/permissions/{id}', [CreationpermissionController::class, 'destroy'])->name('permissions.destroy');

    });
});