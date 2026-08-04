<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreationpermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Typeincidents\TypeincidentsController;
use App\Http\Controllers\Typeincidents\SubtypeIncidentsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\ProjectSelectionController;
use App\Http\Controllers\Divers\RequeteCmController;
use App\Http\Controllers\RequeteCm\RequetesCmController;
use App\Http\Controllers\Referentiels\SitesController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Login — formulaire unique (email + mot de passe + projet)
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'showForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

/*
|--------------------------------------------------------------------------
| Routes invités uniquement
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {

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

    // Profil
    Route::get('/account/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/account/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/account/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::put('/account', [ProfileController::class, 'updateAccount'])->name('profile.account.update');

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

        //  GESTION DES UTILISATEURS 
        Route::get('/Utilisateur', [UserController::class, 'index'])->name('utilisateur');
        Route::post('/Utilisateur', [UserController::class, 'store'])->name('users.store');
        Route::get('/utilisateur/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/utilisateur/{user}', [UserController::class, 'update'])->name('utilisateur.update');
        Route::delete('/utilisateur/{user}', [UserController::class, 'destroy'])->name('utilisateur.destroy');

        // GESTION DES PROJETS 
        Route::get('/creationprojet', [ProjectController::class, 'index'])->name('creationprojet');
        Route::resource('projects', ProjectController::class);

        //  GESTION DES PERMISSIONS 
        Route::get('/gestprofil', [CreationpermissionController::class, 'create'])->name('gestprofil');
        Route::post('/createrole', [RoleController::class, 'store'])->name('roles.store');
        Route::get('/permissions', [CreationpermissionController::class, 'index'])->name('permissions.index');
        Route::post('/permissions', [CreationpermissionController::class, 'store'])->name('permissions.store');
        Route::put('/permissions/{permission}', [CreationpermissionController::class, 'update'])->name('permissions.update');
        Route::put('/roles/{permission}', [RoleController::class, 'update'])->name('role.update');
        Route::delete('/permissions/{id}', [CreationpermissionController::class, 'destroy'])->name('permissions.destroy');

    });
});

    /*
    |----------------------------------------------------------------------
    | Routes pour la gestion des types d'incidents
    |----------------------------------------------------------------------
    */
Route::get('/incident-types/data',[TypeincidentsController::class,'getData'])
        ->name('incident-types.data');
Route::post('/incident-types', [TypeincidentsController::class, 'store'])
        ->name('incident-types.store');
Route::get('/incident-typeshow/{id}', [TypeincidentsController::class, 'show'])->name('incident-types.show');
Route::get('/updateincident-types/{id}', [TypeincidentsController::class, 'update'])->name('incident-types.update');

Route::get('/updatetypeincidents/', [TypeincidentsController::class, 'updatesecond'])->name('incidentypes.update');


Route::get('/incident-types/{id}', [TypeincidentsController::class, 'destroy'])->name('incident-types.destroy');
Route::get('/incident-typesaffiche/', [TypeincidentsController::class, 'afficherliste'])
    ->name('incident-types.list');
Route::get('/updateincident-types/status/{id}', [TypeincidentsController::class, 'updateStatus'])
    ->name('incident-types.status');

    /*
    |----------------------------------------------------------------------
    | Routes pour la gestion des sous types d'incidents
    |----------------------------------------------------------------------
    */

Route::get('/incident-soustypes/data',[SubtypeIncidentsController::class,'getData'])->name('incident-soustypes.data');
Route::get('/incident-soustypes/{id}', [SubtypeIncidentsController::class, 'show'])->name('incident-soustypes.show');
Route::get('/updateincident-soustypes/{id}', [SubtypeIncidentsController::class, 'update'])->name('incident-soustypes.update');
Route::post('/incident-soustypesincident', [SubtypeIncidentsController::class, 'store'])->name('incident-sub-types.store');
Route::get('/supprimerincident-soustypes/{id}', [SubtypeIncidentsController::class, 'destroy'])->name('incident-soustypes.destroy');
Route::get('/updateincident-soustypes/status/{id}', [SubtypeIncidentsController::class, 'updateStatus'])->name('incident-soustypes.status')
;

Route::get('/incident-soustypeslist/by-type/{id}', [SubtypeIncidentsController::class, 'getByType']);


    /*
    |----------------------------------------------------------------------
    | Routes pour la gestion des requetescm
    |----------------------------------------------------------------------
    */
Route::get('/lesrequetescm/',[RequetesCmController::class,'index'])->name('lesrequetescm');

/*
    |----------------------------------------------------------------------
    | Routes pour la gestion des sites
    |----------------------------------------------------------------------
    */

//Route::get('/sites/{id}', [SitesController::class, 'show'])->name('sites.show');
Route::get('/siteslist/by-project/{id}', [SitesController::class, 'getListesitesparid'])->name('sites.list.by-project');

Route::get('/datatable', [RequetesCmController::class,'datatablethird'])->name('cm.datatable');
Route::post('/cm-requests/store', [RequetesCmController::class, 'store'])
        ->name('cm_requests.store');


