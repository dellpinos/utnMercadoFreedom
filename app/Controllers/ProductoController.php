<?php

namespace App\Controllers;

 use App\Models\ProductoModel;

class ProductoController extends BaseController
{
    public function find($id)
    {

        $productos = new ProductoModel();

        $resultado = $productos->find($id);

        return view('producto/index', [
            'producto' => $resultado
        ]);
    }

    public function update()
    {

        $productos = new ProductoModel();

        $resultado = $productos->find($_POST['id']);

        $resultado['stock'] = $resultado['stock'] -1;

        $productos->update($resultado['id'], $resultado);

        $resultado_todos = $productos->findAll();

        return view('home/index', [
            'productos' => $resultado_todos,
            'mensaje' => "Que buena compra!"
        ]);

    }
}
