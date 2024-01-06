<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{

    protected $table = 'productos';
    protected $allowedFields = [
        'nombre',
        'precio',
        'stock',
        'descripcion',
        'imagen'
    ];
}