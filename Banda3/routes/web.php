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

// Rota welcome
Route::get('/', [BandaController::class, 'index']);
Route::get('/bandas', [BandaController::class, 'bandas'])->name('bandas');

// Rota home
Route::get('/home', [BandaController::class, 'index'])->name('bandas');

// Rota fallback
Route::fallback([UserController::class, 'fallback'])->name('fallback');

// Rotas relacionadas com Bandas
Route::post('/banda', [BackofficeController::class, 'postAdicionarBanda'])->name('post-adicionar-banda')->middleware('auth');
Route::get('/banda', [BackofficeController::class, 'adicionarBanda'])->name('adicionar-banda')->middleware('auth');

// Rotas relacionadas com users
Route::post('/create_user', [UserController::class, 'createUser'])->name('create_user');
Route::get('/registar', [UserController::class, 'addUser'])->name('add_user');

// Rota para exibir os álbuns de uma banda específica
Route::get('/bandas/{id}/albums', [AlbumController::class, 'index'])->name('albuns.album');

// Rotas relacionadas com albuns
Route::post('/album', [BackofficeController::class, 'postAdicionarAlbum'])->name('post-adicionar-Album')->middleware('auth');
Route::get('/album', [BackofficeController::class, 'adicionarAlbum'])->name('adicionar-Album')->middleware('auth');

// Rota para o dashboard
Route::get('/backoffice', [BackofficeController::class, 'backoffice'])->name('backoffice')->middleware('auth');

// Rota para apagar banda
Route::get('/apagar-banda{id}', [BackofficeController::class, 'apagarBanda'])->name('apagar-banda')->middleware('auth');

// Rota para apagar album
Route::get('/apagar-album{id}', [BackofficeController::class, 'apagarAlbum'])->name('apagar-album')->middleware('auth');

// Rotas de edição
// Banda
Route::get('/editarBanda/{id}', [BackofficeController::class, 'editarBanda'])->name('editar-banda')->middleware('auth');
Route::post('/atualizarBanda', [BackofficeController::class, 'atualizarBanda'])->name('atualizarBanda')->middleware('auth');
// Album
Route::get('/editarAlbum/{id}', [BackofficeController::class, 'editarAlbum'])->name('editar-album')->middleware('auth');
Route::post('/atualizarAlbum', [BackofficeController::class, 'atualizarAlbum'])->name('atualizarAlbum')->middleware('auth');
