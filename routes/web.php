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

    Route::get('/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/', [UserController::class, 'store'])->name('users.store');

    Route::get('/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    //ROTA DE EDITAR SENHA DO USERS
    Route::get('/{user}/edit-password', [UserController::class, 'editPassword'])->name('users.edit_password');
    Route::put('/{user}/update-password', [UserController::class, 'updatePassword'])->name('users.update_password');
});


//ROTA DE STATUS USERS
Route::prefix('status-users')->group(function () {
    Route::get('/', [StatusUsersController::class, 'index'])->name('status_users.index');

    Route::get('/create', [StatusUsersController::class, 'create'])->name('status_users.create');
    Route::post('/', [StatusUsersController::class, 'store'])->name('status_users.store');

    Route::get('/{status}', [StatusUsersController::class, 'show'])->name('status_users.show');
    Route::get('/{status}/edit', [StatusUsersController::class, 'edit'])->name('status_users.edit');
    Route::put('/{status}', [StatusUsersController::class, 'update'])->name('status_users.update');
    Route::delete('/{status}', [StatusUsersController::class, 'destroy'])->name('status_users.destroy');
});

//ROTA DE CADASTRAR CURSOS
Route::prefix('cursos')->group(function () {
    Route::get('/', [CursosController::class, 'index'])->name('cursos.index');
    Route::get('/create', [CursosController::class, 'create'])->name('cursos.create');
    Route::get('/{curso}', [CursosController::class, 'show'])->name('cursos.show');
    Route::post('/', [CursosController::class, 'store'])->name('cursos.store');
    Route::get('/{curso}/edit', [CursosController::class, 'edit'])->name('cursos.edit');
    Route::put('/{curso}', [CursosController::class, 'update'])->name('cursos.update');
    Route::delete('/{curso}', [CursosController::class, 'destroy'])->name('cursos.destroy');
});

//ROTA DE STATUS CURSOS
Route::prefix('cursos-status')->group(function () {
    Route::get('/', [CursosStatusController::class, 'index'])->name('cursos_statuses.index');
    Route::get('/create', [CursosStatusController::class, 'create'])->name('cursos_statuses.create');
    Route::post('/', [CursosStatusController::class, 'store'])->name('cursos_statuses.store');
    Route::get('/{cursosstatus}', [CursosStatusController::class, 'show'])->name('cursos_statuses.show');
    Route::get('/{cursosstatus}/edit', [CursosStatusController::class, 'edit'])->name('cursos_statuses.edit');
    Route::put('/{cursosstatus}', [CursosStatusController::class, 'update'])->name('cursos_statuses.update');
    Route::delete('/{cursosstatus}', [CursosStatusController::class, 'destroy'])->name('cursos_statuses.destroy');
});

//ROTA DE GRUPO CURSOS
Route::prefix('cursos-grupos')->group(function () {
    Route::get('/cursos/{curso}', [CursosGrupoController::class, 'index'])->name('cursos_grupo.index');
    Route::get('/create/{curso}', [CursosGrupoController::class, 'create'])->name('cursos_grupo.create');
    Route::post('/{curso}', [CursosGrupoController::class, 'store'])->name('cursos_grupo.store');
    Route::get('/{grupo}', [CursosGrupoController::class, 'show'])->name('cursos_grupo.show');
    Route::get('/{grupo}/edit', [CursosGrupoController::class, 'edit'])->name('cursos_grupo.edit');
    Route::put('/{grupo}', [CursosGrupoController::class, 'update'])->name('cursos_grupo.update');
    Route::delete('/{grupo}', [CursosGrupoController::class, 'destroy'])->name('cursos_grupo.destroy');
});


//ROTA DE MODULOS
Route::prefix('modulos')->group(function () {
    Route::get('/cursos-grupos/{grupo}', [ModulosController::class, 'index'])->name('modulos.index');
    Route::get('/create/{grupo}', [ModulosController::class, 'create'])->name('modulos.create');
    Route::post('/create/{grupo}', [ModulosController::class, 'store'])->name('modulos.store');
    Route::get('/{modulo}', [ModulosController::class, 'show'])->name('modulos.show');
    Route::get('/{modulo}/edit', [ModulosController::class, 'edit'])->name('modulos.edit');
    Route::put('/{modulo}', [ModulosController::class, 'update'])->name('modulos.update');
    Route::delete('/{modulo}', [ModulosController::class, 'destroy'])->name('modulos.destroy');
});

//ROTA DE AULAS
Route::prefix('aulas')->group(function () {
    Route::get('/modulos/{modulo}', [AulasController::class, 'index'])->name('aulas.index');
    Route::get('/create/{modulo}', [AulasController::class, 'create'])->name('aulas.create');
    Route::post('/create/{modulo}', [AulasController::class, 'store'])->name('aulas.store');
    Route::get('/{aula}', [AulasController::class, 'show'])->name('aulas.show');
    Route::get('/{aula}/edit', [AulasController::class, 'edit'])->name('aulas.edit');
    Route::put('/{aula}', [AulasController::class, 'update'])->name('aulas.update');
    Route::delete('/{aula}', [AulasController::class, 'destroy'])->name('aulas.destroy');
});
