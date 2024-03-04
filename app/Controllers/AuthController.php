<?php

namespace App\Controllers;

use App\Models\UserModel;

use \Config\Services;

class AuthController extends BaseController
{
    public function login()
    {

        // POST
        // dd("logueando...");


        // GET
        return view('auth/login');

    }

    public function login_auth()
    {

        // POST
        dd("logueando...");


    }

    public function register()
    {
        return view('auth/register');
    }
    public function create()
    {

        // POST (API)
        $request = $this->request;

        $user = new UserModel();

        // Verifica si existe el usuario
        $email_existente = $user->where('email', $this->request->getPost('email'))->countAllResults();

        if ($email_existente > 0) {
            return $this->response->setJSON(['almacenamiento' => false]);
        }

        // Hashear password
        $hash_password = password_hash($request->getPost('password'), PASSWORD_BCRYPT);

        $data = [
            'nombre' => $request->getPost('name'),
            'apellido' => $request->getPost('apellido'),
            'telefono' => $request->getPost('telefono'),
            'email' => $request->getPost('email'),
            'password' => $hash_password
        ];


        $resultado = $user->insert($data);

        if ($resultado) {
            return $this->response->setJSON(['almacenamiento' => true]);
        } else {
            return $this->response->setJSON(['almacenamiento' => false]);
        }
    }
    public function logout()
    {
        dd("logout...");
    }
}
