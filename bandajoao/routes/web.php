<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BandaController;
use App\Http\Controllers\AlbumController;

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


// Função da landing page
Route::get('/', function () {
    return view('home');
});

// Rota fallback
Route::fallback(function () {
    return view('fallback');
});

Route::get('/home_add_user',   [UserController::class, 'addUser'])->name('add_user');
Route::post('/create_user',   [UserController::class, 'createUser'])->name('create_user');

//! -----------------------------------------------------------------------------------------------


// Rotas para visualizar bandas
Route::get('/bandas/{banda}', [BandaController::class, 'show'])->name('bandas.show');
Route::get('/bandas', [BandaController::class, 'index'])->name('bandas.index');

// Rotas para criar e armazenar bandas (apenas para administradores)
Route::get('/bandas/create', [BandaController::class, 'create'])->name('bandas.create')->middleware('admin');
Route::post('/bandas', [BandaController::class, 'store'])->name('bandas.store')->middleware('admin');

// Rotas para editar e atualizar bandas (apenas para administradores e usuários autenticados)
Route::get('/bandas/{banda}/edit', [BandaController::class, 'edit'])->name('bandas.edit')->middleware('admin,auth');
Route::put('/bandas/{banda}', [BandaController::class, 'update'])->name('bandas.update')->middleware('admin,auth');

// Rota para excluir bandas (apenas para administradores)
Route::delete('/bandas/{banda}', [BandaController::class, 'destroy'])->name('bandas.destroy')->middleware('admin');

// Rotas para visualizar álbuns de uma banda
Route::get('/bandas/{banda}/albuns', [AlbumController::class, 'index'])->name('albuns.index');
Route::get('/bandas/{banda}/albuns/{album}', [AlbumController::class, 'show'])->name('albuns.show');

// Rotas para criar e armazenar álbuns (apenas para administradores)
Route::get('/bandas/{banda}/albuns/create', [AlbumController::class, 'create'])->name('albuns.create')->middleware('admin');
Route::post('/bandas/{banda}/albuns', [AlbumController::class, 'store'])->name('albuns.store')->middleware('admin');

// Rotas para editar e atualizar álbuns (apenas para administradores e usuários autenticados)
Route::get('/bandas/{banda}/albuns/{album}/edit', [AlbumController::class, 'edit'])->name('albuns.edit')->middleware('admin,auth');
Route::put('/bandas/{banda}/albuns/{album}', [AlbumController::class, 'update'])->name('albuns.update')->middleware('admin,auth');

// Rota para excluir álbuns (apenas para administradores)
Route::delete('/bandas/{banda}/albuns/{album}', [AlbumController::class, 'destroy'])->name('albuns.destroy')->middleware('admin');

