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


Route::group(['as'=>'admin.','prefix' => 'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('/vacantes', 'VacanteController@index')->name('vacantes.index');
    Route::get('/vacantes/create', 'VacanteController@create')->name('vacantes.create');
    
    //subir imagenes
    Route::post('/vacantes/imagen', 'VacanteController@imagen')->name('vacantes.imagen');
    Route::post('/vacantes/borrarimagen', 'VacanteController@borrarimagen')->name('vacantes.borrar');
    
    
    Route::get('/publicidad', 'PublicidadController@index')->name('publicidads.index');
    Route::get('/publicidad/create', 'PublicidadController@create')->name('publicidads.create');
    
    Route::post('/publicidad/imagen', 'PublicidadController@imagen')->name('publicidads.imagen');
    Route::post('/publicidad/borrarimagen', 'PublicidadController@borrarimagen')->name('publicidads.borrar');
    Route::post('/publicidad/store', 'PublicidadController@store')->name('publicidads.store');
    Route::post('/publicidad/update', 'PublicidadController@update')->name('publicidads.update');

    Route::get('/publicidad/{publicidad}/edit', 'PublicidadController@edit')->name('publicidads.edit');

    Route::get('/publicidad/{publicidad}', 'PublicidadController@show')->name('publicidads.show');
    Route::delete('/publicidad/{publicidad}', 'PublicidadController@destroy')->name('publicidads.destroy');
    
    // Cambiar estado de la Publicidad
    Route::post('/publicidad/{publicidad}', 'PublicidadController@estado')->name('publicidads.estado');

    


    Route::get('/establecimientos', 'EstablecimientoController@index')->name('establecimientos.index');

    Route::get('establecimientos/profile', 'EstablecimientoController@profile')->name('establecimientos.profile');
    Route::get('/establecimientos/{establecimiento}', 'EstablecimientoController@show')->name('establecimientos.show');
    Route::post('/establecimientos/update/', 'EstablecimientoController@update')->name('establecimientos.update');
    



});

Route::group(['as'=>'user.','prefix' => 'user','namespace'=>'User','middleware'=>['auth','user']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
});



Route::group(['middleware' => ['auth', 'verified']], function() {


    Route::get('/vacantes', 'VacanteController@index')->name('vacantes.index');
    Route::get('/vacantes/create', 'VacanteController@create')->name('vacantes.create');
    
    //subir imagenes
    Route::post('/vacantes/imagen', 'VacanteController@imagen')->name('vacantes.imagen');
    Route::post('/vacantes/borrarimagen', 'VacanteController@borrarimagen')->name('vacantes.borrar');
    
    
    Route::get('/publicidad', 'PublicidadController@index')->name('publicidads.index');
    Route::get('/publicidad/create', 'PublicidadController@create')->name('publicidads.create');
    
    Route::post('/publicidad/imagen', 'PublicidadController@imagen')->name('publicidads.imagen');
    Route::post('/publicidad/borrarimagen', 'PublicidadController@borrarimagen')->name('publicidads.borrar');
    Route::post('/publicidad/store', 'PublicidadController@store')->name('publicidads.store');
    Route::post('/publicidad/update', 'PublicidadController@update')->name('publicidads.update');

    Route::get('/publicidad/{publicidad}/edit', 'PublicidadController@edit')->name('publicidads.edit');

    Route::get('/publicidad/{publicidad}', 'PublicidadController@show')->name('publicidads.show');
    Route::delete('/publicidad/{publicidad}', 'PublicidadController@destroy')->name('publicidads.destroy');
    
    // Cambiar estado de la Publicidad
    Route::post('/publicidad/{publicidad}', 'PublicidadController@estado')->name('publicidads.estado');

    


    Route::get('/establecimientos', 'EstablecimientoController@index')->name('establecimientos.index');

    Route::get('/establecimientos/profile', 'EstablecimientoController@profile')->name('establecimientos.profile');
    Route::get('/establecimientos/create', 'EstablecimientoController@create')->name('establecimientos.create');

    Route::post('/establecimientos/update/{establecimiento}', 'EstablecimientoController@update')->name('establecimientos.update');
   
    Route::get('/cartas/{establecimiento}', 'EstablecimientoController@cartas')->name('establecimientos.cartas');
    Route::get('/cartas/familias/{carta}', 'EstablecimientoController@cartafamilias')->name('establecimientos.cartafamilias');
    Route::get('/cartas/familias/platos/{familia}', 'EstablecimientoController@familiaplatos')->name('establecimientos.familiaplatos');
    
    Route::post('/cartas/store', 'CartaController@store')->name('cartas.store');
    Route::post('/subcartas/store', 'FamiliaController@store')->name('subcartas.store');
    Route::post('/platos/store', 'PlatoController@store')->name('plato.store');


    

});

Route::get('/vacantes/{vacante}', 'VacanteController@show')->name('vacantes.show');




