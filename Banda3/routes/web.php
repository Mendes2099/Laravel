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
Route::get('/', [UserController::class, 'user'])->name('user');

// Rota fallback
Route::fallback([UserController::class, 'fallback'])->name('fallback');

//*------------------------------------------------------------------*/

// Rota para a página do usuário (home)
Route::get('/home', [UserController::class, 'user'])->name('user');
// Rota para a página de álbum (album)
Route::get('/album', [AlbumController::class, 'album'])->name('album');
// Rota para a página de banda (banda)
Route::get('/banda', [BandaController::class, 'banda'])->name('banda');

Route::post('/create_user',   [UserController::class, 'createUser'])->name('create_user');
Route::get('/home_add_user',   [UserController::class, 'addUser'])->name('add_user');

//!------------------------------Erros------------------------------------*/

//! Permite adicionar bandas!
Route::get('/adicionar-banda', [BandaController::class, 'adicionarBanda'])->name('adicionar-banda');



