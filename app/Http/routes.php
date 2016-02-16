<?php

/*
 * No es buena idea poner las rutas y sus respectivas
 * acciones de forma explicita es por ello que estas
 * acciones pueden ser movidas a controladores
 */
Route::get('/', ['uses' => 'EjemploController@ejemplo1']);

Route::get('listar/todos/los/usuarios', ['uses' => 'EjemploController@ejemplo2']);

Route::get('usuarios/{id}/productos/{nombreProducto}', ['uses' => 'EjemploController@ejemplo3']);

Route::get('usuarios/{username?}', ['uses' => 'EjemploController@ejemplo4']);

Route::get('usuarios/regex/{id}', ['uses' => 'EjemploController@ejemplo5'])->where('id', '[0-9]+');

Route::get('html/{name}', ['uses' => 'EjemploController@ejemplo6']);

Route::get('productos/listar', ['uses' => 'EjemploController@ejemplo7']);

Route::post('ruta/post/{var1}', ['uses' => 'EjemploController@ejemploPost']);


/**
 * EJERCICIO: Crear un controlador llamado EjercicioController
 * mover las siguientes dos rutas a dicho controlador
 */
Route::put('ruta/put/{var1}', function(Illuminate\Http\Request $request, $var1) {
    $nombre = $request->get('nombre');
    $edad = $request->get('edad');

    return "Respuesta PUT: Nombre: $nombre, Edad: $edad, Var1: $var1";
});

Route::delete('ruta/delete/{var1}', function (Illuminate\Http\Request $request, $var1) {
    $nombre = $request->get('nombre');
    $edad = $request->get('edad');

    return "Respuesta DELETE: Nombre: $nombre, Edad: $edad, Var1: $var1";
});
