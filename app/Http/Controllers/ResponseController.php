<?php

namespace App\Http\Controllers;

class ResponseController extends Controller
{
    public function normal()
    {
        $cadena = 'Alguna cadena de respuesta';
        $statusCode = 404;
        return response($cadena, $statusCode)
            ->header('Content-Type', 'text/plain')
            ->header('X-Foo-Bar', 'Una cabecera personalizada');
    }

    public function json()
    {
        $datos = [
            'nombre' => 'Pedro',
            'edad' => 12
        ];

        return response()->json($datos, 200);
    }

    public function view()
    {
        return view('ejemplos.ejemplo1');
    }
}
