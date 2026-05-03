<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreationpermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Page de login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Route::middleware('auth')->group(function () {

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/finance', function () {
    return view('dashboard/finance');
})->name('finance');


Route::get('/analytics', function () {
    return view('dashboard/analytics');
})->name('analytics');

Route::get('/Utilisateur', [UserController::class,'index'])->name('utilisateur');
Route::post('/Utilisateur', [UserController::class, 'store'])
    ->name('users.store');


Route::get('/utilisateur/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

// Mettre à jour un utilisateur
Route::put('/utilisateur/{user}', [UserController::class, 'update'])->name('utilisateur.update');


Route::get('/creationprojet',[ProjectController::class,'index'] )->name('creationprojet');


Route::get('/gestprofil', 
    //return view('admins/profilpermissions');
    [CreationpermissionController::class,'create']
)->name('gestprofil');

Route::post('/createrole', 
    //return view('admins/profilpermissions');
    [RoleController::class,'store']
)->name('roles.store');


Route::get('/permissions', [CreationpermissionController::class, 'index'])
        ->name('permissions.index');

Route::post('/permissions', [CreationpermissionController::class, 'store'])
        ->name('permissions.store');

Route::put('/permissions/{permission}', [CreationpermissionController::class, 'update'])
        ->name('permissions.update');


Route::put('/roles/{permission}', [RoleController::class, 'update'])
        ->name('role.update');

Route::delete('/permissions/{id}', [CreationpermissionController::class, 'destroy'])
    ->name('permissions.destroy');


    
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])
    ->name('password.reset');

Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])
    ->name('password.update');

Route::resource('projects', ProjectController::class);
//});