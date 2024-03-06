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
        $shirts = $productos->where('tipo', 1)->get()->getResultArray();
        $caps = $productos->where('tipo', 2)->get()->getResultArray();
        $sneakers = $productos->where('tipo', 3)->get()->getResultArray();
        // $resultado = $productos->findAll();


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
                'shirts' => $shirts,
                'caps' => $caps,
                'sneakers' => $sneakers,
                'mensaje' => $mensaje,
                'user_data' => $user_data
            ]);

        } elseif ($session->has('mensaje_stock')) {
            $mensaje = $session->get('mensaje_stock');

            return view('home/index', [
                'shirts' => $shirts,
                'caps' => $caps,
                'sneakers' => $sneakers,
                'mensaje' => $mensaje,
                'user_data' => $user_data
            ]);

        } else {

            return view('home/index', [
                'shirts' => $shirts,
                'caps' => $caps,
                'sneakers' => $sneakers,
                'user_data' => $user_data
            ]);
        }
    }

    public function contact()
    {

        $session = Services::session();

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

        return view('home/contact', [
            'user_data' => $user_data
        ]);
    }
}
