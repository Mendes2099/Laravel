<?php

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

Route::get('/', function () {
    return view('welcome');
});


// Função da landing page
Route::get('/home', function () {
    return view('layout');
});


// Rotas para visualizar bandas
Route::get('/bandas', 'BandaController@index')->name('bandas.index');
Route::get('/bandas/{banda}', 'BandaController@show')->name('bandas.show');

// Rotas para criar e armazenar bandas (apenas para administradores)
Route::get('/bandas/create', 'BandaController@create')->name('bandas.create')->middleware('admin');
Route::post('/bandas', 'BandaController@store')->name('bandas.store')->middleware('admin');

// Rotas para editar e atualizar bandas (apenas para administradores e usuários autenticados)
Route::get('/bandas/{banda}/edit', 'BandaController@edit')->name('bandas.edit')->middleware('admin,auth');
Route::put('/bandas/{banda}', 'BandaController@update')->name('bandas.update')->middleware('admin,auth');

// Rota para excluir bandas (apenas para administradores)
Route::delete('/bandas/{banda}', 'BandaController@destroy')->name('bandas.destroy')->middleware('admin');


// Rotas para visualizar álbuns de uma banda
Route::get('/bandas/{banda}/albuns', 'AlbumController@index')->name('albuns.index');
Route::get('/bandas/{banda}/albuns/{album}', 'AlbumController@show')->name('albuns.show');

// Rotas para criar e armazenar álbuns (apenas para administradores)
Route::get('/bandas/{banda}/albuns/create', 'AlbumController@create')->name('albuns.create')->middleware('admin');
Route::post('/bandas/{banda}/albuns', 'AlbumController@store')->name('albuns.store')->middleware('admin');

// Rotas para editar e atualizar álbuns (apenas para administradores e usuários autenticados)
Route::get('/bandas/{banda}/albuns/{album}/edit', 'AlbumController@edit')->name('albuns.edit')->middleware('admin,auth');
Route::put('/bandas/{banda}/albuns/{album}', 'AlbumController@update')->name('albuns.update')->middleware('admin,auth');

// Rota para excluir álbuns (apenas para administradores)
Route::delete('/bandas/{banda}/albuns/{album}', 'AlbumController@destroy')->name('albuns.destroy')->middleware('admin');

