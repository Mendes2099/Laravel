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

// Rota para a página de álbum (album)
Route::get('/album', [AlbumController::class, 'album'])->name('album');

// Rotas relacionadas com users
Route::post('/create_user',   [UserController::class, 'createUser'])->name('create_user');
Route::get('/home_add_user',   [UserController::class, 'addUser'])->name('add_user');

// Banda
Route::post('/banda', [BandaController::class, 'postAdicionarBanda'])->name('post-adicionar-banda');
Route::get('/banda', [BandaController::class, 'adicionarBanda'])->name('adicionar-banda');
//!------------------------------Erros------------------------------------*/


//Rota que aceita um parâmetro id na URL e direciona a solicitação para o método index do controlador AlbumController.
Route::get('/bandas/{id}/albums', [AlbumController::class, 'index'])->name('albuns.album');
