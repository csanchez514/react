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
Route::get('/formulario', function () {
    return view('formulario');
});
Route::get('/cedula', function () {
    return view('cedula');
});
Route::post('save','ControladorCedula@store');
Route::get('ver','ControladorCedula@ver');
Route::get('Buscador','ControladorPerro@index');
Route::get('Perro','ControladorPerro@buscar');
Route::get('formulario',function () {
    return view('send');
});


