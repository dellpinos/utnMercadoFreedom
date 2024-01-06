<?php

namespace App\Controllers;

 use App\Models\ProductoModel;
 use \Config\Services;

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

        $session = Services::session();
        $productos = new ProductoModel();

        // Resto 1 al stock
        $resultado = $productos->find($_POST['id']);
        $resultado['stock'] = $resultado['stock'] -1;
        $respuesta = $productos->update($resultado['id'], $resultado);

        // Mensaje condicional
        if($respuesta) {
            $session->setFlashdata('mensaje', 'Que buena compra!');

        } else {
            $session->setFlashdata('mensaje', 'Ups! Algo salió mal');
        }

        return redirect()->to('/');

    }
}
