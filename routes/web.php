<?php

use App\Http\Controllers\AulasController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\CursosStatusController;
use App\Http\Controllers\CursosGrupoController;
use App\Http\Controllers\ModulosController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\StatusUsersController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('home');

//ROTA DE USUARIOS
Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/', [UserController::class, 'store'])->name('users.store');
});

//ROTA DE CADASTRAR CURSOS
Route::prefix('cursos')->group(function () {
    Route::get('/', [CursosController::class, 'index'])->name('cursos.index');
    Route::get('/create', [CursosController::class, 'create'])->name('cursos.create');
    Route::get('/{cursos}', [CursosController::class, 'show'])->name('cursos.show');
    Route::post('/', [CursosController::class, 'store'])->name('cursos.store');
});

//ROTA DE STATUS CURSOS
Route::prefix('cursos-status')->group(function () {
    Route::get('/', [CursosStatusController::class, 'index'])->name('cursos_statuses.index');
    Route::get('/create', [CursosStatusController::class, 'create'])->name('cursos_statuses.create');
    Route::post('/', [CursosStatusController::class, 'store'])->name('cursos_statuses.store');
    Route::get('/{cursosstatus}', [CursosStatusController::class, 'show'])->name('cursos_statuses.show');
});

//ROTA DE GRUPO CURSOS
Route::prefix('cursos-grupos')->group(function () {
    Route::get('/', [CursosGrupoController::class, 'index'])->name('cursos_grupo.index');
    Route::get('/create', [CursosGrupoController::class, 'create'])->name('cursos_grupo.create');
    Route::post('/', [CursosGrupoController::class, 'store'])->name('cursos_grupo.store');
    Route::get('/{grupo}', [CursosGrupoController::class, 'show'])->name('cursos_grupo.show');
});


//ROTA DE MODULOS
Route::prefix('modulos')->group(function () {
    Route::get('/', [ModulosController::class, 'index'])->name('modulos.index');
    Route::get('/create', [ModulosController::class, 'create'])->name('modulos.create');
    Route::post('/', [ModulosController::class, 'store'])->name('modulos.store');
    Route::get('/{modulo}', [ModulosController::class, 'show'])->name('modulos.show');
});


//ROTA DE STATUS USERS
Route::prefix('status-users')->group(function () {
    Route::get('/', [StatusUsersController::class, 'index'])->name('status_users.index');
    Route::get('/{status}', [StatusUsersController::class, 'show'])->name('status_users.show');
    Route::get('/create', [StatusUsersController::class, 'create'])->name('status_users.create');
    Route::post('/', [StatusUsersController::class, 'store'])->name('status_users.store');
});
