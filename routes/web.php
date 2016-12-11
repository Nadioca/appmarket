<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//controladores
//Route::get('Producto','Producto\ProductoController@index');
Route::resource('marcas','Producto\MarcaController');
Route::resource('productos','Producto\ProductoController');

//vistas
Route::get('panel','Desktop\Administrador@panel');
Route::get('acceso','Desktop\Administrador@acceso');
Route::get('reportes','Desktop\Administrador@reportes');

//blades y bootstrap
Route::get('dashboards','Desktop\DashboardsController@index');

//rutas de autenticacion
Auth::routes();

Route::get('/home', 'HomeController@index');
