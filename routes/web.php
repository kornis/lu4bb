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
    return view('cuestionario.index');
})->name('index');

Route::group(['prefix' =>'admin'] ,function(){

	Route::resource('crear_pregunta', 'preguntaController');
});

Route::get('/cuestionario/{reiniciar?}','frontController@cuestionario'
)->name('cuestionario');

Route::post('/consultar','chequearController@consulta')->name('consultar');
