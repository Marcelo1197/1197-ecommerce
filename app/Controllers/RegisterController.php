<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UsuariosModel;

class RegisterController extends BaseController {

    public function __construct() {
        helper(['url', 'form']); //para poder utilizar nuestro Helpers/Form_helper que muestra los errores en nuestra view
    }

    public function index()
    {
        echo view('partes/header');
        echo view('/auth/register');
        echo view('partes/footer');
    }

    public function save() {
        //validaciones custom
        $validation = $this->validate([ //internamente usa $this->request->...
            'nombre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ingresa tu nombre por favor'
                ]
            ],
            'apellido' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ingresa tu apellido por favor'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[usuarios.email]',
                'errors' => [
                    'required' => 'Ingresa tu email por favor',
                    'valid_email' => 'Por favor ingresa un email válido',
                    'is_unique' => 'Este email ya se encuentra registrado'
                ]
            ],
            'usuario' => [
                'rules' => 'required|is_unique[usuarios.usuario]',
                'errors' => [
                    'required' => 'Ingresa tu nombre de usuario por favor',
                    'is_unique' => 'Este nombre de usuario ya se encuentra en uso'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[6]|max_length[200]',
                'errors' => [
                    'required' => 'Ingresa una contraseña por favor',
                    'min_length' => 'La contraseña debe ser de mínimo 6 caracteres',
                    'max_length' => 'La contraseña debe ser de máximo 200 caracteres'
                ]
            ],
            'confpassword' => [
                'rules' => 'required|min_length[6]|max_length[200]|matches[password]',
                'errors' => [
                    'required' => 'Confirma la contraseña por favor',
                    'min_length' => 'La contraseña debe ser de mínimo 6 caracteres',
                    'max_length' => 'La contraseña debe ser de máximo 200 caracteres',
                    'matches' => 'La contraseña no coincide'

                ]
                ],

        ]);

        if (!$validation) { //Si el formulario no pasa alguna validacion
            echo view('partes/header');
            echo view('front/register', ['validation' => $this->validator]);
            echo view('partes/footer');
        } else { //Si pasa la validacion
            $nombre = $this->request->getPost('nombre');
            $apellido = $this->request->getPost('apellido');
            $usuario = $this->request->getPost('usuario');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $data = [
                'nombre' => $nombre,
                'apellido' => $apellido,
                'usuario' => $usuario,
                'email' => $email,
                'pass' => password_hash($password, PASSWORD_DEFAULT)
            ];

            $userModel = new UsuariosModel();
            $registroOk = $userModel->save($data);

            if (!$registroOk) { //si no se pudo guardar el usuario nuevo en nuestra bd            
               return redirect()->back()->with('fail', 'Algo sucedio! Intenta de nuevo');
                
            } else { //si se pudo crear el usuario nuevo exitosamente
                return redirect()->back()->with('success', 'Se ha registrado exitosamente!');
            };

        }

    }
}
