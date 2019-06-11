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

Route::post('registrarDonador', 'DonacionesPracticaController@registrarDonador');
Route::post('registrarBeneficiario', 'DonacionesPracticaController@registrarBeneficiario');
Route::get('obtenerDonadores', 'DonacionesPracticaController@obtenerDonadores');
Route::get('obtenerBeneficiario','DonacionesPracticaController@obtenerBeneficiario');
Route::post('donacionfinal', 'DonacionesPracticaController@donacionfinal');
Route::get('consultarDonaciones/{id}','DonacionesPracticaController@consultarDonaciones');

