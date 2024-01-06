<?php

namespace App\Controllers;

use App\Models\ProductoModel;

class HomeController extends BaseController
{
    public function index(): string
    {

        $productos = new ProductoModel();

        $resultado = $productos->findAll();

        return view('home/index', [
            'productos' => $resultado
        ]);

    }
}
