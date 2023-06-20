<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\BandaController;
use App\Http\Controllers\BackofficeController;
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

// Rota para a página inicial (welcome)
Route::get('/', [BandaController::class, 'index']);
Route::get('/bandas', [BandaController::class, 'bandas'])->name('bandas');

// Rota para a página do usuário (home)
Route::get('/home', [BandaController::class, 'index'])->name('bandas');

// Rota fallback para lidar com rotas não encontradas
Route::fallback([UserController::class, 'fallback'])->name('fallback');

// Rotas relacionadas com Bandas
Route::post('/banda', [BackofficeController::class, 'postAdicionarBanda'])->name('post-adicionar-banda')->middleware('auth');
Route::get('/banda', [BackofficeController::class, 'adicionarBanda'])->name('adicionar-banda')->middleware('auth');

// Rotas relacionadas com usuários
Route::post('/create_user', [UserController::class, 'createUser'])->name('create_user');
Route::get('/registar', [UserController::class, 'addUser'])->name('add_user');

// Rota para exibir os álbuns de uma banda específica
Route::get('/bandas/{id}/albums', [AlbumController::class, 'index'])->name('albuns.album');

// Rotas relacionadas com Albuns
Route::post('/album', [BackofficeController::class, 'postAdicionarAlbum'])->name('post-adicionar-Album')->middleware('auth');
Route::get('/album', [BackofficeController::class, 'adicionarAlbum'])->name('adicionar-Album')->middleware('auth');



// retorna view dashboard
Route::get('/backoffice', [BackofficeController::class, 'backoffice'])->name('backoffice')->middleware('auth');

// rota apagar banda
Route::get('/apagar-banda{id}', [BackofficeController::class, 'apagarBanda'])->name('apagar-banda')->middleware('auth');

// rota apagar album
Route::get('/apagar-album{id}', [BackofficeController::class, 'apagarAlbum'])->name('apagar-album')->middleware('auth');

// ROTAS PRA EDITAR
// Rota para a blade que permite editar BANDA
Route::get('/editarBanda/{id}', [BackofficeController::class, 'editarBanda'])->name('editar-banda')->middleware('auth');
Route::post('/atualizarBanda', [BackofficeController::class, 'atualizarBanda'])->name('atualizarBanda')->middleware('auth');
// Rota para a blade que permite editar ALBUM
Route::get('/editarAlbum/{id}', [BackofficeController::class, 'editarAlbum'])->name('editar-album')->middleware('auth');
Route::post('/atualizarAlbum', [BackofficeController::class, 'atualizarAlbum'])->name('atualizarAlbum')->middleware('auth');
