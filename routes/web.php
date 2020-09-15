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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
//ruta para los usuarios
Route::resource('/usuarios', 'UserController');
//ruta para los roles
Route::resource('/group', 'RoleController');

//ruta para los autos
Route::resource('/automoviles', 'AutomovilController');
//ruta para los motos
Route::resource('/motos', 'MotosController');
//ruta para las ciclas
Route::resource('/bicicletas', 'BicicletasController');

//ruta para el parqueadero autos
Route::resource('/parkingAutos', 'ParkingAutosController');
//ruta para la salida autos
Route::resource('/salidaAutos', 'SalidaAutosController');

//ruta para el parqueadero de motos
Route::resource('/parkingMotos', 'ParkingMotosController');
//ruta para la salida motos
Route::resource('/salidaMotos', 'salidaMotosController');

//ruta para el parqueadero de ciclas
Route::resource('/parkingCiclas', 'parkingCiclasController');
//ruta para la salida ciclas
Route::resource('/salidaCiclas', 'salidaCiclasController');

//ruta para parking
Route::resource('/parking', 'ParkingController');

//ruta para tarifas
Route::resource('/tarifas', 'TarifaController');