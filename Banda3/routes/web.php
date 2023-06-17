<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\BandaController;
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
Route::get('/', [BandaController::class, 'index'])->name('bandas');
// Rota para a página do usuário (home)
Route::get('/home', [BandaController::class, 'index'])->name('bandas');
//Rota para a blade fallback
Route::fallback([UserController::class, 'fallback'])->name('fallback');

//*------------------------------------------------------------------*/


// Rotas relacionadas com Bandas
Route::post('/banda', [BandaController::class, 'postAdicionarBanda'])->name('post-adicionar-banda');
Route::get('/banda', [BandaController::class, 'adicionarBanda'])->name('adicionar-banda');


//!------------------------------Erros------------------------------------*/

// Rotas relacionadas com users
Route::post('/create_user',   [UserController::class, 'createUser'])->name('create_user');
Route::get('/registar',   [UserController::class, 'addUser'])->name('add_user');

//Rota que aceita um parâmetro id na URL e direciona a solicitação para o método index do controlador AlbumController.
Route::get('/bandas/{id}/albums', [AlbumController::class, 'index'])->name('albuns.album');

// Rotas relacionadas com Albuns
Route::post('/album', [AlbumController::class, 'postAdicionarAlbum'])->name('post-adicionar-Album');
Route::get('/album', [AlbumController::class, 'adicionarAlbum'])->name('adicionar-Album');

//! (A defenir) Rota para a blade que mostra os albuns de uma banda (Acedida por botão na /home "Ver Álbuns")
