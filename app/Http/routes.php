<?php

Route::get('/', function() {
    return 'Ruta a la raiz del proyecto';
});

/*
 * El formato de las rutas debe ser
 * Route::httpMethod($patron, Closure o Controller);
 */
Route::get('listar/todos/los/usuarios', function() {
    return 'Las rutas son un patron definido a gusto del desarrollador';
});

/*
 * El patrón puede definir una o más variables de entrada
 * dichas variables serán pasadas a la función o método
 * asociado a la ruta
 */
Route::get('usuarios/{id}/productos/{nombreProducto}', function($id, $nombreProducto) {
    return 'Las variables de la ruta son: ' . $id . ' y ' . $nombreProducto;
});

/*
 * Es posible que no necesariamente una variable en la ruta
 * sea obligatoria, de ser así, se adiciona el símbolo '?' al
 * final de la variable para poder definirla como opcional
 * pero es necesario definir un valor por defecto
 */
Route::get('usuarios/{username?}', function($username='Valor por Defecto') {
    return 'La variable no requerida es: ' . $username;
});

/*
 * Si se desea que una variable este relacionada con una
 * expresión regular, entonces se hace uso del método 'where'
 * para definir la variable y la expresión regular asociada
 * En caso de que la variable no cumpla esta expresion regular
 * ocurrirá una exception del tipo "Route not found"
 */
Route::get('usuarios/regex/{id}', function($id) {
    return 'Si se puede ver esto es que id es solo numérico';
})->where('id', '[0-9]+');

/*
 * En realidad una ruta responde al browser del cliente con
 * cadenas de texto plana previamente procesadas por Laravel.
 * Sin embargo, poner la respuesta html en una variable en texto
 * plano no es una buena práctica -- de lo posible evitemosla --
 * más adelante se verá la forma correcta de responder al browser
 * del cliente en diferentes formatos: texto plano, html, json, etc.
 */
Route::get('html/{name}', function($name) {
    $html = "<html>
    <body>
    <h1>Este es un texto html como cadena</h1>
    <h3 style=\"color: #f00\">Pero es una mala práctica!!!</h3>
    Saludos soy: $name
    </body>
    </html>";

    return $html;
});


/*
 * Hacemos uso de la clase Request para obtener los valores de variables
 * que no se encuentren en el patron. Entonces es necesario definir el tipo
 * de la variable $request explicitamente para que Laravel pueda realizar
 * la inyección de dependencia, por ejemplo:
 * Route::get('ruta/{var1}/{var2}', function(Request $request, $var1, $var2) {
 *     ...
 * });
 */
use Illuminate\Http\Request;

/*
 * Es posible que algunas variables para el método GET se deseen
 * pasar a través del querystring de la url, es decir,
 * http://example.com/productos/listar?page=23&limit=10
 */
Route::get('productos/listar', function(Request $request) {
    $pagina = $request->get('page', 1);
    $limite = $request->get('limit', 15);

    return "Página $pagina -> Límite: $limite";
});


/*
 * Hasta ahora solo se hicieron ejemplos de rutas
 * para el método GET, probemos con otros métodos
 * e.g. POST, PUT, DELETE, que nos serán de utilidad
 * cuando hagamos servicios RESTful.
 * Es necesario notar que no existen diferencias
 * en la definición del patron de las rutas.
 * Con la diferencia de que es necesario inyectar
 * $request para obtener datos
 */
Route::post('ruta/post/{var1}', function(Request $request, $var1) {
    $nombre = $request->get('nombre');
    $edad = $request->get('edad');

    return "Respuesta POST: Nombre: $nombre, Edad: $edad, Var1: $var1";
});
// PUT
Route::put('ruta/put/{var1}', function(Request $request, $var1) {
    $nombre = $request->get('nombre');
    $edad = $request->get('edad');

    return "Respuesta PUT: Nombre: $nombre, Edad: $edad, Var1: $var1";
});
// DELETE
Route::delete('ruta/delete/{var1}', function(Request $request, $var1) {
    $nombre = $request->get('nombre');
    $edad = $request->get('edad');

    return "Respuesta DELETE: Nombre: $nombre, Edad: $edad, Var1: $var1";
});

