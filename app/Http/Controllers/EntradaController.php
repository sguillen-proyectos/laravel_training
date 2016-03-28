<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EntradaController extends Controller
{
    public function index(Request $r)
    {
        $entradas = [
            [ 'id' => 1, 'titulo' => 'tit 1', 'contenido' => 'contenido1'],
            [ 'id' => 2, 'titulo' => 'tit 2', 'contenido' => 'contenido2'],
            [ 'id' => 3, 'titulo' => 'tit 3', 'contenido' => 'contenido3'],
        ];
        return view('entradas.index')->with('entradas', $entradas);
    }

    public function entradas(Request $r)
    {
        $entradas = [
            [ 'id' => 1, 'titulo' => 'tit 1', 'contenido' => 'contenido1'],
            [ 'id' => 2, 'titulo' => 'tit 2', 'contenido' => 'contenido2'],
            [ 'id' => 3, 'titulo' => 'tit 3', 'contenido' => 'contenido3'],
        ];
        return view('admin.entradas.index');
    }

    public function edit(Request $r, $id)
    {
        return view('admin.entradas.edit')->with('id', $id);
    }

    public function update(Request $r, $id)
    {
        $data = $r->all();

        return $data;
    }
}
