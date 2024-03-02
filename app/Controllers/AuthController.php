<?php

namespace App\Controllers;

use App\Models\UserModel;
use \Config\Services;

class AuthController extends BaseController
{
    public function login()
    {
        // GET
        // dd("Vista Login");

        // POST
        // dd("logueando...");

        return view('auth/login');
    }
    public function register()
    {
        return view('auth/register');
    }
    public function create()
    {
        dd("creando usuario...");
    }
    public function logout()
    {
        dd("logout...");
    }
}