<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('general.welcome');
});

// Rota de teste
Route::get('/test', function () {
    return view('general.testhome');
});

//!--------------------------------------------------------------------------------------------------------------

// Rotas para users
Route::middleware(['auth'])->group(function () {
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/create', [UserController::class, 'create']);
    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users/{user}/edit', [UserController::class, 'edit']);
    Route::put('/users/{user}', [UserController::class, 'update']);
    Route::delete('/users/{user}', [UserController::class, 'destroy']);
});

// Rotas para bandas
Route::middleware(['auth'])->group(function () {
    Route::get('/bandas', [BandaController::class, 'index']);
    Route::get('/bandas/create', [BandaController::class, 'create']);
    Route::post('/bandas', [BandaController::class, 'store']);
    Route::get('/bandas/{banda}/edit', [BandaController::class, 'edit']);
    Route::put('/bandas/{banda}', [BandaController::class, 'update']);
    Route::delete('/bandas/{banda}', [BandaController::class, 'destroy']);
});

// Rotas para álbuns
Route::middleware(['auth'])->group(function () {
    Route::get('/bandas/{banda}/albuns', [AlbumController::class, 'index']);
    Route::get('/albuns/create', [AlbumController::class, 'create']);
    Route::post('/albuns', [AlbumController::class, 'store']);
    Route::get('/albuns/{album}/edit', [AlbumController::class, 'edit']);
    Route::put('/albuns/{album}', [AlbumController::class, 'update']);
    Route::delete('/albuns/{album}', [AlbumController::class, 'destroy']);
});

// Rotas de autenticação
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm']);
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'showRegistrationForm']);
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
