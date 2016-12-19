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

// Route::get('/usuario', function () {
//     return view('usuario.usuarioCrear');
// });

Route::resource('user', 'userController');
Route::resource('cliente', 'clienteController');
Route::resource('marcas', 'marcaController');
Route::resource('tienda', 'tiendaController');
Route::resource('pedidos', 'pedidoController');
Route::resource('compras', 'comprasController', ['except' => ['store', 'create']]);
Route::resource('instalacion', 'instaController', ['except' => ['store', 'create']]);

Route::resource('admin', 'adminController', ['except' => ['store', 'create']]);

Route::resource('produccion', 'prodController', ['except' => ['store', 'create']]);
Route::resource('general', 'generalController', ['except' => ['store', 'create']]);
Route::resource('modelos', 'modeloController');
Route::resource('colors', 'colorController');
Route::resource('persianas', 'persianaController');

Route::post('agregar/{id}', ['as' => 'agregar.pedidos', 'uses' => 'pedidoController@agregar']);

Route::post('imagen', ['as' => 'imagen.agregar', 'uses' => 'imagesController@store']);

Route::get('cotizacion/{id}', ['as' => 'cotizar.pedidos', 'uses' => 'pedidoController@cotiza']);

Route::get('model/{id}', ['as' => 'modelos.pedidos', 'uses' => 'pedidoController@get_modelos']);

Route::get('colo/{id}', ['as' => 'colores.pedidos', 'uses' => 'pedidoController@get_colores']);

Route::get('marc/{id}', ['as' => 'marcas.pedidos', 'uses' => 'pedidoController@get_marcas']);

Route::get('get_id/{id}', ['as' => 'get.pedidos', 'uses' => 'pedidoController@get_id']);

Route::get('login',  ['as' => 'login','uses' =>'Auth\AuthController@getLogin']);
Route::post('login', 'Auth\AuthController@postLogin');
// Route::get('logout', 'Auth\AuthController@logout');
Route::get('/logout', function()
    {
        Auth::logout();
    Session::flush();
        return Redirect::to('/');
    });

// Registration Routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

// Password Reset Routes...
Route::get('password/reset', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');


Route::resource('almacens', 'almacenController');

Route::resource('citas', 'citaController');
Route::resource('citas_instala', 'cita_instalaController');
// Route::post('asignar/{id}', ['as' => 'asignar.citas', 'uses' => 'citaController@asignar']);

Route::get('asignar', ['uses' => 'citaController@asignar', 'as' => 'asignar']);

Route::resource('cupons', 'cuponController');

Route::get('usar/{id}', ['uses' => 'cuponController@usar', 'as' => 'usar']);

Route::get('vendedoresSinCita/{id}', ['uses' => 'citaController@vendedoresSinCita', 'as' => 'vendedoresSinCita']);

Route::get('instalaSinCita/{id}', ['uses' => 'cita_instalaController@vendedoresSinCita', 'as' => 'instalaSinCita']);

Route::get('monto_pedidos/{id}', ['uses' => 'pedidoController@monto', 'as' => 'monto.pedidos']);

Route::get('asignarCita/{id}', ['uses' => 'citaController@asignarCita', 'as' => 'asignarCita']);

Route::get('asignar_instalaCita/{id}', ['uses' => 'cita_instalaController@asignarCita', 'as' => 'asignar_instalaCita']);

Route::get('hechoCita/{id}', ['uses' => 'citaController@hecho', 'as' => 'hechoCita']);

Route::get('hecho_instalaCita/{id}', ['uses' => 'cita_instalaController@hecho', 'as' => 'hecho_instalaCita']);

Route::get('errorCita/{id}', ['uses' => 'citaController@error', 'as' => 'errorCita']);

Route::get('error_instalaCita/{id}', ['uses' => 'cita_instalaController@error', 'as' => 'error_instalaCita']);

Route::get('cita_instalaPedido/{id}', ['uses' => 'cita_instalaController@crear_cita', 'as' => 'cita_instalaPedido']);

Route::get('vendedorCitas/{id}', ['uses' => 'citaController@vendedorCitas', 'as' => 'vendedorCitas']);

Route::get('vendedor_instalaCitas/{id}', ['uses' => 'cita_instalaController@vendedorCitas', 'as' => 'vendedor_instalaCitas']);


Route::get('send/{id}', ['as' => 'send', 'uses' => 'MailController@send'] );
Route::get('contact', ['as' => 'contact', 'uses' => 'MailController@index'] );

Route::resource('mermas', 'mermaController');
