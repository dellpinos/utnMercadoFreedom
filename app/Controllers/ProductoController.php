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
        $producto = new ProductoModel();

        // Busco el producto
        $resultado = $producto->find($this->request->getPost('id'));

        // Verifico si hay stock disponible
        if($resultado['stock'] <= 0 ) {
            $session->setFlashdata('mensaje', 'Stock insuficiente');
            return redirect()->to('/');
        }

        // Resto 1 al stock
        $resultado['stock'] = $resultado['stock'] - 1;
        $respuesta = $producto->update($resultado['id'], $resultado);

        // Mensaje condicional
        if($respuesta) {
            $session->setFlashdata('mensaje', 'Que buena compra!');

        } else {
            $session->setFlashdata('mensaje', 'Ups! Algo salió mal');
        }

        return redirect()->to('/');

    }

    public function sumar_stock()
    {
        
        $session = Services::session();
        $producto = new ProductoModel();
        $resultado = $producto->findAll();

        foreach($resultado as $articulo) {

            // Sumo 1 stock a cada producto
            $articulo['stock'] = $articulo['stock'] + 1;
            $producto->update($articulo['id'], $articulo);
        }

        $session->setFlashdata('mensaje_stock', '+ 1 a todo el Stock!');

        return redirect()->to('/');

    }

}
