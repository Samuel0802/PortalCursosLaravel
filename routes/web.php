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

Route::get('/',[MainController::class, 'index'])->name('home');

//ROTA DE USUARIOS
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users-create', [UserController::class, 'create'])->name('users.create');
Route::post('/users-store',[UserController::class, 'store'])->name('users.store');

//ROTA DE CADASTRAR CURSOS
Route::get('/cursos', [CursosController::class, 'index'])->name('cursos.index');
Route::get('/create-curso', [CursosController::class, 'create'])->name('cursos.create');
Route::post('/store-curso', [CursosController::class, 'store'])->name('cursos.store');


//ROTA DE STATUS CURSOS
Route::get('/cursos-status', [CursosStatusController::class, 'index'])->name('cursosstatus.index');
Route::get('/cursosstatus-create', [CursosStatusController::class, 'create'])->name('cursosstatus.create');
Route::post('/cursosstatus-store', [CursosStatusController::class, 'store'])->name('cursosstatus.store');


//ROTA DE GRUPO CURSOS
Route::get('/cursos-grupo', [CursosGrupoController::class, 'index'])->name('cursosgrupo.index');
Route::get('/cursosgrupo-create', [CursosGrupoController::class, 'create'])->name('cursosgrupo.create');
Route::post('/cursosgrupo-store', [CursosGrupoController::class, 'store'])->name('cursosgrupo.store');

//ROTA DE AULAS
Route::get('/aulas', [AulasController::class, 'index'])->name('aulas.index');
Route::get('/aulas-create', [AulasController::class, 'create'])->name('aulas.create');
Route::post('/aulas-store', [AulasController::class, 'store'])->name('aulas.store');

//ROTA DE MODULOS
Route::get('/modulos', [ModulosController::class, 'index'])->name('modulos.index');
Route::get('/modulos-create', [ModulosController::class, 'create'])->name('modulos.create');
Route::post('/modulos-store', [ModulosController::class, 'store'])->name('modulos.store');


//ROTA DE STATUS USERS
Route::get('/status-users', [StatusUsersController::class, 'index'])->name('statususers.index');
Route::get('/status-users-create', [StatusUsersController::class, 'create'])->name('statususers.create');
Route::post('/status-users-store', [StatusUsersController::class, 'store'])->name('statususers.store');

