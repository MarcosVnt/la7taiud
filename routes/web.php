<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['verify' => true ]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/vacantes', 'VacanteController@index')->name('vacantes.index');
Route::get('/vacantes/create', 'VacanteController@create')->name('vacantes.create');

//subir imagenes
Route::post('/vacantes/imagen', 'VacanteController@imagen')->name('vacantes.imagen');
Route::post('/vacantes/borrarimagen', 'VacanteController@borrarimagen')->name('vacantes.borrar');


Route::get('/publicidad', 'PublicidadController@index')->name('publicidad.index');
Route::get('/publicidad/create', 'PublicidadController@create')->name('publicidad.create');

Route::post('/publicidad/imagen', 'PublicidadController@imagen')->name('publicidad.imagen');
Route::post('/publicidad/borrarimagen', 'PublicidadController@borrarimagen')->name('publicidad.borrar');
Route::post('/publicidad/store', 'PublicidadController@store')->name('publicidad.store');
