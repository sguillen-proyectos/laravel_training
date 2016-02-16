<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EjemploController extends Controller
{
    public function ejemplo1()
    {
        return 'Ruta a la raiz del proyecto';
    }

    public function ejemplo2()
    {
        return 'Las rutas son un patron definido a gusto del desarrollador';
    }

    public function ejemplo3($id, $nombreProducto)
    {
        return 'Las variables de la ruta son: ' . $id . ' y ' . $nombreProducto;
    }

    public function ejemplo4($username='Valor por Defecto')
    {
        return 'La variable no requerida es: ' . $username;
    }

    public function ejemplo5()
    {
        return 'Si se puede ver esto es que id es solo numérico';
    }

    public function ejemplo6($name)
    {
        $html = "<html>
        <body>
        <h1>Este es un texto html como cadena</h1>
        <h3 style=\"color: #f00\">Pero es una mala práctica!!!</h3>
        Saludos soy: $name
        </body>
        </html>";

        return $html;
    }

    public function ejemplo7(Request $request)
    {
        $pagina = $request->get('page', 1);
        $limite = $request->get('limit', 15);

        return "Página $pagina -> Límite: $limite";
    }

    public function ejemploPost(Request $request, $var1)
    {
        $nombre = $request->get('nombre');
        $edad = $request->get('edad');

        return "Respuesta POST: Nombre: $nombre, Edad: $edad, Var1: $var1";
    }
}
