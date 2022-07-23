<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UsuariosModel;

class LoginController extends BaseController {

    public function __construct() {
        helper(['url', 'form']);
    }

    public function index()
    {
        echo view('/partes/header');
        echo view('/auth/login');
        echo view('/partes/footer');
    }

    function validacion() {

        $validation = $this->validate([
            'email' => [
                'rules' => 'required|valid_email|is_not_unique[usuarios.email]', //preguntamos si es válido y si existe en nuestra base de datos (si no es unico = existe),
                'errors' => [
                    'required' => 'Ingresa tu email por favor',
                    'valid_email' => 'Por favor ingresa un email válido',
                    'is_not_unique' => 'El email ingresado no está registrado'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[6]|max_length[50]',
                'errors' => [
                    'required' => 'Ingresa una contraseña por favor',
                    'min_length' => 'La contraseña debe ser de mínimo 6 caracteres',
                    'max_length' => 'La contraseña debe ser de máximo 50 caracteres'
                ]
            ]
        ]);

        if (!$validation) { //si  el formulario no pasa la validacion, mandamos los mensajes de error a nuestra view
            echo view('/partes/header');
            echo view('/auth/login', ['validation' => $this->validator]);
            echo view('/partes/footer');
        } else {
            $userModel = new UsuariosModel();
            $session = session(); //creamos una session para que persistan nuestros datos, tdv no la usamos
            $email = $this->request->getPost('email'); //obtenemos el mail y la pass que se envian a traves del POST con el form
            $pass = $this->request->getPost('password');
            $usuario_info = $userModel->where('email', $email)->first(); //traemos la tabla de usuario que matchee con el email enviado en el form

            if($usuario_info){ //si existe esa tabla
                $pass_usuario = $usuario_info['pass'];
                $verify_pass = password_verify($pass, $pass_usuario); //validamos la pass

                if($verify_pass){
                    $sesion_usuario_data = [
                        'id_usuario'       => $usuario_info['id_usuario'],
                        'nombre'     => $usuario_info['nombre'],
                        'email'    => $usuario_info['email'],
                        'logueado'     => TRUE
                    ];
                    $session->set($sesion_usuario_data); //guardamos los datos de la session creada en linea 47
                    if ($usuario_info['email'] == 'admin@gmail.com') {
                        return redirect()->to(base_url("admin/dashboard"));
                    } else {
                        return redirect()->to(base_url("productos"));
                    }
                }else{ //si introducimos mal la pass
                    $session->setFlashdata('fail', 'Contraseña incorrecta, intente de nuevo la pass es'.$pass_usuario); //guardamos en la session un mensaje de error para mostrar en la view
                    return redirect()->to('/login'); //volvemos al login para introducir bien la contraseña
                }
            }
        }
    }

    public function logout() {
        $session = session();
		$session->destroy();
		return redirect()->to('login');
    }

}