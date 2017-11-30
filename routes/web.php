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
    Route::get('/regu_peserta/rekap_nilai', 'ReguPesertaController@lihatRekapNilai');
    Route::get('/regu_peserta/rekap_nilai_semua', 'ReguPesertaController@lihatRekapNilaiSemuaRegu');
});

// Route list for juri
Route::group(['middleware' => ['auth', 'juri']], function () {
    Route::get('/juri', 'JuriController@index');
    Route::get('/juri/{no_regu}', 'JuriController@tampilkanFormPenilaian');
    Route::post('/juri/{no_regu}/{aspek_penilaian}', 'JuriController@updateNilai');
    Route::post('/juri/{no_regu}', 'JuriController@submitNilai');
});

//Route list for panitia
Route::group(['middleware' => ['auth', 'panitia']], function () {
    Route::get('/panitia', 'PanitiaController@index');
    Route::post('/panitia', 'PanitiaController@konfirmasi');
});
