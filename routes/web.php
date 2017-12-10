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

Route::get('/', 'AuthController@lihatDashboard')->name('login');
Route::post('/', 'AuthController@login')->name('login');
Route::get('/logout', 'AuthController@logout')->name('logout');

// Route list for regu_peserta
Route::group(['middleware' => ['auth', 'regu_peserta']], function () {
    Route::get('/regu_peserta', 'ReguPesertaController@lihatDashboard');
    Route::get('/regu_peserta/rekap_nilai', 'ReguPesertaController@lihatRekapNilai');
    Route::get('/regu_peserta/rekap_nilai_semua', 'ReguPesertaController@lihatRekapNilaiSemuaRegu');
    Route::get('/regu_peserta/lihat_peringkat', 'ReguPesertaController@lihatPeringkat');
});

// Route list for juri
Route::group(['middleware' => ['auth', 'juri']], function () {
    Route::get('/juri', 'JuriController@lihatDashboard');
    Route::get('/juri/{no_regu}', 'JuriController@tampilkanFormPenilaian');
    Route::post('/juri/{no_regu}/{aspek_penilaian}', 'JuriController@updateNilai');
    Route::post('/juri/{no_regu}', 'JuriController@submitNilai');
});

//Route list for panitia
Route::group(['middleware' => ['auth', 'panitia']], function () {
    Route::get('/panitia', 'PanitiaController@lihatDashboard');
    Route::get('/panitia/tambah_regu_peserta', function () {
        return view('panitia.tambah_regu_peserta');
    });
    Route::get('/panitia/tambah_juri', function () {
        return view('panitia.tambah_juri');
    });
    Route::post('/panitia/tambah_regu_peserta', 'PanitiaController@tambahReguPeserta');
    Route::post('/panitia/tambah_juri', 'PanitiaController@tambahjuri');
    Route::post('/panitia', 'PanitiaController@konfirmasi');
});

Route::post('/tambah_panitia', 'RegistrasiPanitiaController@tambahPanitia');
Route::get('/tambah_panitia', function () {
    return view('panitia.registrasi_panitia');
});
