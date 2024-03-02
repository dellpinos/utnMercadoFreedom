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

        // Datos de prueba, deben ser seteados en el login/register
        $data = [
            // 'email' => "correo@correo.com",
            'nombre' => "Isaias Ejemplo"
        ];
        $session->set($data);

        $session->destroy();


        $user_data = [];
        if ($session->has('email')) {

            // Leyendo datos de la sesión actual
            $user_data = [
                'nombre' => $session->nombre,
                'email' => $session->email
            ];

        } else {

            $user_data = false;
        }




        if ($session->has('mensaje')) {
            $mensaje = $session->get('mensaje');

            return view('home/index', [
                'productos' => $resultado,
                'mensaje' => $mensaje
            ]);
        } elseif ($session->has('mensaje_stock')) {
            $mensaje = $session->get('mensaje_stock');

            return view('home/index', [
                'productos' => $resultado,
                'mensaje' => $mensaje
            ]);
        } else {

            return view('home/index', [
                'productos' => $resultado,
                'user_data' => $user_data
            ]);
        }
    }

    public function contact()
    {

        return view('home/contact');
    }
}
