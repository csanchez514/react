<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
header('Access-Control-Allow-Origin:*');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('listado','calificacion@index');
Route::get('listado/{id}','calificacion@show');
Route::post('listado','calificacion@store');
Route::put('listado/{id}','calificacion@update');
Route::delete('listado/{id}','calificacion@delete');
Route::get('ver','ControladorCedula@ver');
Route::put('save/{id}/{id2}','ControladorCedula@save');
Route::get('inventario','ControladorInventario@index');
Route::post('guardar','ControladorInventario@store');
Route::get('buscarUsuario','ControladorTabla@index');
Route::get('buscar/{id}','ControladorTabla@show');
Route::resource('usuarios','Prueba');
