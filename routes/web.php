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

Route::get('/', function () {

    return view('welcome');
});

Route::get('/login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group([
    'middleware' => ['auth', 'regu_peserta']
], function () {
    Route::get('/regu_peserta/', 'ReguPesertaController@index');
});


Route::group([
    'middleware' => ['auth', 'juri']
], function () {
    Route::get('/juri/', 'JuriController@index');
});


Route::group([
    'middleware' => ['auth', 'panitia']
], function () {
    Route::get('/panitia/', 'PanitiaController@index');
});

get('protected', ['middleware' => ['auth', 'admin'], function() {
    return "this page requires that you be logged in and an Admin";
}]);

//Route::get('/home', 'HomeController@index')->name('home');
