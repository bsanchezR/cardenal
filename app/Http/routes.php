<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/usuario', function () {
    return view('usuario.usuarioCrear');
});

Route::resource('user', 'userController');
Route::resource('cliente', 'clienteController');
Route::resource('marcas', 'marcaController');
Route::resource('pedidos', 'pedidoController');
Route::resource('modelos', 'modeloController');
Route::resource('colors', 'colorController');
Route::resource('persianas', 'persianaController');
Route::post('agregar/{id}', ['as' => 'agregar.pedidos', 'uses' => 'pedidoController@agregar']);

Route::get('cotizacion/{id}', ['as' => 'cotizar.pedidos', 'uses' => 'pedidoController@cotiza']);

Route::get('model/{id}', ['as' => 'modelos.pedidos', 'uses' => 'pedidoController@get_modelos']);

Route::get('colo/{id}', ['as' => 'colores.pedidos', 'uses' => 'pedidoController@get_colores']);

Route::get('marc/{id}', ['as' => 'marcas.pedidos', 'uses' => 'pedidoController@get_marcas']);

Route::get('get_id/{id}', ['as' => 'get.pedidos', 'uses' => 'pedidoController@get_id']);

Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@logout');

// Registration Routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

// Password Reset Routes...
Route::get('password/reset', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');
