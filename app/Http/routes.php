<?php

Route::get('/', function() {
    return view('welcome');
});


// Ruta que retornará el formulario de login
Route::get('login', ['uses' => 'Auth\AuthController@login']);
// Esta ruta hace referencia al metodo postLogin que hereda AuthController
// que es donde Laravel hará todo automaticamente
Route::post('auth/login', ['uses' => 'Auth\AuthController@postLogin']);
// Esta ruta usa el metodo getLogout que hereda AuthController para cerrar sesión
Route::get('auth/logout', ['uses' => 'Auth\AuthController@getLogout']);


Route::get('entradas', ['uses' => 'EntradaController@index']);

/*
 * Este grupo de urls require previa autenticacion
 * Para requerir previa autenticación se usa el middleware auth
 */
Route::group(['middleware' => 'auth'], function() {
    Route::get('admin/entradas', ['uses' => 'EntradaController@entradas']);
    Route::get('admin/entradas/{id}/editar', ['uses' => 'EntradaController@edit']);
    Route::post('admin/entradas/{id}/editar', ['uses' => 'EntradaController@update']);
});

/*
 * Bien todo puede estar en un solo grupo pero para diferenciar
 * contextos es mejor agrupar rutas por contexto, un grupo por ejemplo
 * para entradas y otro grupo para usuarios
 */
Route::group(['middleware' => 'auth'], function() {
    // Forma normal de ver datos
    Route::get('admin/users', ['uses' => 'UserController@index']);

    // ================== DataTable Ajax ==============
    // Retorna la vista
    Route::get('admin/users2', ['uses' => 'UserController@index2']);
    // Obtiene los registros
    Route::get('admin/users2/ajax', ['uses' => 'UserController@indexAjax']);
    // ================== DataTable Ajax ==============

    Route::get('admin/users/create', ['uses' => 'UserController@create']);
    Route::get('admin/users/{id}/edit', ['uses' => 'UserController@edit']);
    Route::post('admin/users/create', ['uses' => 'UserController@store']);
    Route::put('admin/users/{id}/edit', ['uses' => 'UserController@update']);
    Route::delete('admin/users/{id}', ['uses' => 'UserController@destroy']);
});

