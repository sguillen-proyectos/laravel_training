<?php

Route::get('salida/normal', ['uses' => 'ResponseController@normal']);
Route::get('salida/json', ['uses' => 'ResponseController@json']);
Route::get('salida/view', ['uses' => 'ResponseController@view']);

/*
 * EJERCICIO crear una ruta que devuelva en formato JSON
 * un array de objetos con los siguientes atributos:
 * nombre, direccion, telefono.
 * Que la respuesta devuelva un status code 500
 */
