<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissoesController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('usuarios')->group(function () {
        Route::get('/', [UsersController::class, 'index'])->name('usuarios');
        Route::get('/editar/{id}', [UsersController::class, 'editar'])->name('usuarios.editar');
        Route::post('/atualizar', [UsersController::class, 'atualizar'])->name('usuarios.atualizar');
        Route::get('/novo', [UsersController::class, 'novo'])->name('usuarios.novo');
        Route::post('/criar', [UsersController::class, 'criar'])->name('usuarios.criar');
        Route::get('/excluir/{id}', [UsersController::class, 'excluir'])->name('usuarios.excluir');
    });

    Route::prefix('permissoes')->group(function () {
        Route::get('/', [PermissoesController::class, 'index'])->name('permissoes');
        Route::get('/editar/{id}', [PermissoesController::class, 'editar'])->name('permissoes.editar');
        Route::post('/atualizar', [PermissoesController::class, 'atualizar'])->name('permissoes.atualizar');
        Route::get('/novo', [PermissoesController::class, 'novo'])->name('permissoes.novo');
        Route::post('/criar', [PermissoesController::class, 'criar'])->name('permissoes.criar');
        Route::get('/excluir/{id}', [PermissoesController::class, 'excluir'])->name('permissoes.excluir');
    });

    Route::prefix('categorias')->group(function () {
        Route::get('/', [CategoriasController::class, 'index'])->name('categorias');
        Route::get('/editar/{id}', [CategoriasController::class, 'editar'])->name('categorias.editar');
        Route::post('/atualizar', [CategoriasController::class, 'atualizar'])->name('categorias.atualizar');
        Route::get('/novo', [CategoriasController::class, 'novo'])->name('categorias.novo');
        Route::post('/criar', [CategoriasController::class, 'criar'])->name('categorias.criar');
        Route::get('/excluir/{id}', [CategoriasController::class, 'excluir'])->name('categorias.excluir');
    });

    Route::prefix('produtos')->group(function () {
        Route::get('/', [ProdutosController::class, 'index'])->name('produtos');
        Route::get('/editar/{id}', [ProdutosController::class, 'editar'])->name('produtos.editar');
        Route::post('/atualizar', [ProdutosController::class, 'atualizar'])->name('produtos.atualizar');
        Route::get('/novo', [ProdutosController::class, 'novo'])->name('produtos.novo');
        Route::post('/criar', [ProdutosController::class, 'criar'])->name('produtos.criar');
        Route::get('/excluir/{id}', [ProdutosController::class, 'excluir'])->name('produtos.excluir');
    });

    Route::prefix('perfil')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

});

require __DIR__.'/auth.php';
