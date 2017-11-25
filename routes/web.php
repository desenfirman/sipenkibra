<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'AuthController@index')->name('login');
Route::post('/', 'AuthController@login')->name('login');
Route::get('/logout', 'AuthController@logout')->name('logout');

// Route list for regu_peserta
Route::group(['middleware' => ['auth', 'regu_peserta']], function () {
    Route::get('/regu_peserta', 'ReguPesertaController@index');
});

// Route list for juri
Route::group(['middleware' => ['auth', 'juri']], function () {
    Route::get('/juri', 'JuriController@index');
});

//Route list for panitia
Route::group(['middleware' => ['auth', 'panitia']], function () {
    Route::get('/panitia', 'PanitiaController@index');
});
