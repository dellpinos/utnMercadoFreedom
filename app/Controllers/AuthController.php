<?php

namespace App\Controllers;

use App\Models\UserModel;

use \Config\Services;

class AuthController extends BaseController
{
    public function login()
    {

        return view('auth/login');
    }

    public function login_auth()
    {

        // POST (API)
        $request = $this->request;

        $user = new UserModel();

        // Verifica si existe el usuario
        $usuario = $user->where('email', $this->request->getPost('email'))->first();


        if (!$usuario > 0) {
            return $this->response->setJSON(['mensaje' => "Usuario inexistente"]);
        }

    
        if(password_verify($request->getPost('password'), $usuario['password'])) {
            
            // Loguear y redirigir
            $session = Services::session();

            $data = [
                'email' => $usuario['email'],
                'nombre' => $usuario['nombre']
            ];

            $session->set($data);


            return $this->response->setJSON(['mensaje' => true]);
            
        } else {

            return $this->response->setJSON(['mensaje' => "Password incorrecto"]);
        }



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
            return $this->response->setJSON(['mensaje' => "Email ya registrado"]);
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
            
            $session = Services::session();
            
            $dataSesion = [
                'email' => $request->getPost('email'),
                'nombre' => $request->getPost('name')
            ];
            
            $session->set($dataSesion);
            
            return $this->response->setJSON(['mensaje' => true]);

        } else {
            return $this->response->setJSON(['mensaje' => "Algo salió mal"]);
        }
    }

    public function logout()
    {
        $session = Services::session();
        $session->destroy();
        return redirect()->to('/');
    }
}
