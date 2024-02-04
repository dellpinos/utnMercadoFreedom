<?php

namespace App\Controllers;

use App\Models\ProductoModel;
use \Config\Services;

class HomeController extends BaseController
{
    public function index(): string
    {

        $session = Services::session();
        $productos = new ProductoModel();
        $resultado = $productos->findAll();

        if($session->has('mensaje')) {
            $mensaje = $session->get('mensaje');

            return view('home/index', [
                'productos' => $resultado,
                'mensaje' => $mensaje
            ]);
            
        }elseif ($session->has('mensaje_stock')) {
            $mensaje = $session->get('mensaje_stock');

            return view('home/index', [
                'productos' => $resultado,
                'mensaje' => $mensaje
            ]);
        } 

         else {

            return view('home/index', [
                'productos' => $resultado
            ]);
        }
    }

    public function contact() {

        return view('home/contact');
    }
}
