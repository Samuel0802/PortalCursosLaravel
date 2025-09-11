<?php

use App\Http\Controllers\AulasController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\CursosStatusController;
use App\Http\Controllers\CursosGrupoController;
use App\Http\Controllers\ModulosController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\StatusUsersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Route;


//PAGINA INICIAL
Route::get('/', [MainController::class, 'index'])->name('home');

//LOGIN
Route::get('/login', [AuthController::class, 'index'])->name('login');

//PROCESSAR OS DADOS DO LOGIN
Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.process');

//PROCESSAR LOGOUT
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//FORMULÁRIO CADASTRAR NOVO USUARIO
Route::get('/register', [AuthController::class, 'create'])->name('register');

//PROCESSAR CADASTRO DE NOVO USUARIO
Route::post('/register', [AuthController::class, 'store'])->name('register.store');

//FORMULÁRIO RECUPERAÇÃO DE SENHA
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

//PROCESSAR RECUPERAÇÃO DE SENHA POR EMAIL
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

//FORMULÁRIO PARA REDEFINIR  A SENHA COM O TOKEN
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showRequestForm'])->name('password.reset');

Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');



//GRUPO DE ROTAS RESTRITAS
Route::group(['middleware' => 'auth'], function () {

    //PAGINA INICIAL DO ADMINISTRATIVO
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('permission:dashboard');

    //PAGINA DE PERFIL DO USUARIO
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'show'])->name('profile.show')->middleware('permission:show.profile');

        //PAGINA DE EDITAR PERFIL DO USUARIO
        Route::get('/{user}/edit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('permission:edit.profile');
        Route::put('/{user}', [ProfileController::class, 'update'])->name('profile.update')->middleware('permission:edit.profile');

        //PAGINA DE EDITAR SENHA DO USUARIO
        Route::get('/{user}/edit-password', [ProfileController::class, 'editPassword'])->name('profile.edit_password')->middleware('permission:edit_password.profile');
        Route::put('/{user}/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update_password')->middleware('permission:edit_password.profile');
    });

    //ROTA DE USUARIOS
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index')->middleware('permission:index.users');

        Route::get('/create', [UserController::class, 'create'])->name('users.create')->middleware('permission:create.users');
        Route::post('/', [UserController::class, 'store'])->name('users.store')->middleware('permission:create.users');

        Route::get('/{user}', [UserController::class, 'show'])->name('users.show')->middleware('permission:show.users');

        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('permission:edit.users');
        Route::put('/{user}', [UserController::class, 'update'])->name('users.update')->middleware('permission:edit.users');

        Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('permission:destroy.users');

        //ROTA DE EDITAR SENHA DO USERS
        Route::get('/{user}/edit-password', [UserController::class, 'editPassword'])->name('users.edit_password')->middleware('permission:edit_password.users');
        Route::put('/{user}/update-password', [UserController::class, 'updatePassword'])->name('users.update_password')->middleware('permission:edit_password.users');
    });


    //ROTA DE STATUS USERS
    Route::prefix('status-users')->group(function () {
        Route::get('/', [StatusUsersController::class, 'index'])->name('status_users.index')->middleware('permission:index.status_users');

        Route::get('/create', [StatusUsersController::class, 'create'])->name('status_users.create')->middleware('permission:index.status_users');
        Route::post('/', [StatusUsersController::class, 'store'])->name('status_users.store')->middleware('permission:index.status_users');

        Route::get('/{status}', [StatusUsersController::class, 'show'])->name('status_users.show')->middleware('permission:index.status_users');
        Route::get('/{status}/edit', [StatusUsersController::class, 'edit'])->name('status_users.edit')->middleware('permission:index.status_users');
        Route::put('/{status}', [StatusUsersController::class, 'update'])->name('status_users.update')->middleware('permission:index.status_users');
        Route::delete('/{status}', [StatusUsersController::class, 'destroy'])->name('status_users.destroy')->middleware('permission:index.status_users');
    });

    //ROTA DE CADASTRAR CURSOS
    Route::prefix('cursos')->group(function () {
        Route::get('/', [CursosController::class, 'index'])->name('cursos.index')->middleware('permission:index.cursos');
        Route::get('/create', [CursosController::class, 'create'])->name('cursos.create')->middleware('permission:create.cursos');
        Route::get('/{curso}', [CursosController::class, 'show'])->name('cursos.show')->middleware('permission:show.cursos');
        Route::post('/', [CursosController::class, 'store'])->name('cursos.store')->middleware('permission:create.cursos');
        Route::get('/{curso}/edit', [CursosController::class, 'edit'])->name('cursos.edit')->middleware('permission:edit.cursos');
        Route::put('/{curso}', [CursosController::class, 'update'])->name('cursos.update')->middleware('permission:edit.cursos');
        Route::delete('/{curso}', [CursosController::class, 'destroy'])->name('cursos.destroy')->middleware('permission:destroy.cursos');
    });

    //ROTA DE STATUS CURSOS
    Route::prefix('cursos-status')->group(function () {
        Route::get('/', [CursosStatusController::class, 'index'])->name('cursos_statuses.index')->middleware('permission:index.cursos_statuses');
        Route::get('/create', [CursosStatusController::class, 'create'])->name('cursos_statuses.create')->middleware('permission:create.cursos_statuses');
        Route::post('/', [CursosStatusController::class, 'store'])->name('cursos_statuses.store')->middleware('permission:create.cursos_statuses');
        Route::get('/{cursosstatus}', [CursosStatusController::class, 'show'])->name('cursos_statuses.show')->middleware('permission:show.cursos_statuses');
        Route::get('/{cursosstatus}/edit', [CursosStatusController::class, 'edit'])->name('cursos_statuses.edit')->middleware('permission:edit.cursos_statuses');
        Route::put('/{cursosstatus}', [CursosStatusController::class, 'update'])->name('cursos_statuses.update')->middleware('permission:edit.cursos_statuses');
        Route::delete('/{cursosstatus}', [CursosStatusController::class, 'destroy'])->name('cursos_statuses.destroy')->middleware('permission:destroy.cursos_statuses');
    });

    //ROTA DE GRUPO CURSOS
    Route::prefix('cursos-grupos')->group(function () {
        Route::get('/cursos/{curso}', [CursosGrupoController::class, 'index'])->name('cursos_grupo.index')->middleware('permission:index.turmas');
        Route::get('/create/{curso}', [CursosGrupoController::class, 'create'])->name('cursos_grupo.create')->middleware('permission:create.turmas');
        Route::post('/{curso}', [CursosGrupoController::class, 'store'])->name('cursos_grupo.store')->middleware('permission:create.turmas');
        Route::get('/{grupo}', [CursosGrupoController::class, 'show'])->name('cursos_grupo.show')->middleware('permission:show.turmas');
        Route::get('/{grupo}/edit', [CursosGrupoController::class, 'edit'])->name('cursos_grupo.edit')->middleware('permission:edit.turmas');
        Route::put('/{grupo}', [CursosGrupoController::class, 'update'])->name('cursos_grupo.update')->middleware('permission:index.turmas');
        Route::delete('/{grupo}', [CursosGrupoController::class, 'destroy'])->name('cursos_grupo.destroy')->middleware('permission:destroy.turmas');
    });


    //ROTA DE MODULOS
    Route::prefix('modulos')->group(function () {
        Route::get('/cursos-grupos/{grupo}', [ModulosController::class, 'index'])->name('modulos.index')->middleware('permission:index.modulos');
        Route::get('/create/{grupo}', [ModulosController::class, 'create'])->name('modulos.create')->middleware('permission:create.modulos');
        Route::post('/create/{grupo}', [ModulosController::class, 'store'])->name('modulos.store')->middleware('permission:create.modulos');
        Route::get('/{modulo}', [ModulosController::class, 'show'])->name('modulos.show')->middleware('permission:show.modulos');
        Route::get('/{modulo}/edit', [ModulosController::class, 'edit'])->name('modulos.edit')->middleware('permission:edit.modulos');
        Route::put('/{modulo}', [ModulosController::class, 'update'])->name('modulos.update')->middleware('permission:edit.modulos');
        Route::delete('/{modulo}', [ModulosController::class, 'destroy'])->name('modulos.destroy')->middleware('permission:destroy.modulos');
    });

    //ROTA DE AULAS
    Route::prefix('aulas')->group(function () {
        Route::get('/modulos/{modulo}', [AulasController::class, 'index'])->name('aulas.index')->middleware('permission:index.aulas');
        Route::get('/create/{modulo}', [AulasController::class, 'create'])->name('aulas.create')->middleware('permission:create.aulas');
        Route::post('/create/{modulo}', [AulasController::class, 'store'])->name('aulas.store')->middleware('permission:create.aulas');
        Route::get('/{aula}', [AulasController::class, 'show'])->name('aulas.show')->middleware('permission:show.aulas');
        Route::get('/{aula}/edit', [AulasController::class, 'edit'])->name('aulas.edit')->middleware('permission:edit.aulas');
        Route::put('/{aula}', [AulasController::class, 'update'])->name('aulas.update')->middleware('permission:edit.aulas');
        Route::delete('/{aula}', [AulasController::class, 'destroy'])->name('aulas.destroy')->middleware('permission:destroy.aulas');
    });
});
