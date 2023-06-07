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

Route::get('/home', function () {
    return view('layout');
});

Route::get('/bandas', function () {
    return view('bandas');
});

Route::get('/albuns', function () {
    return view('bandas');
});


//Route::get('/bandas', 'BandaController@index')->name('bandas.index');
//Route::get('/albuns', 'AlbumController@index')->name('albuns.index');
