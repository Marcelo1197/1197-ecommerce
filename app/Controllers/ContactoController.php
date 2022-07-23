<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ContactosModel;
use CodeIgniter\I18n\Time;

class ContactoController extends BaseController {
    public function __construct() {
        helper(['url', 'form']); //para poder utilizar nuestro Helpers/Form_helper que muestra los errores en nuestra view
    }

    public function index() {
        echo view('partes/header');
        echo view('paginas/informacion_contacto');
        echo view('partes/footer');
    }

    public function registrarContacto() {
        $validacion = $this->validate([ //internamente usa $this->request->...
            'nombre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ingrese el titulo de la nombre por favor'
                ]
            ],
            'apellido' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ingrese su apellido por favor'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ingrese su email por favor'
                ]
            ],
            'tituloContacto' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ingrese un titulo para su mensaje por favor'
                ]
            ],
            'mensajeContacto' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ingresa su mensaje de contacto por favor'
                ]
            ]
        ]);

        if (!$validacion) { //Si el formulario no pasa alguna validacion
            echo view('partes/header');
            echo view('paginas/informacion_contacto', ['validation' => $this->validator]);
            echo view('partes/footer');
        } else { //Si pasa la validacion
            $nombre = $this->request->getPost('nombre');
            $apellido = $this->request->getPost('apellido');
            $email = $this->request->getPost('email');
            $tituloContacto = $this->request->getPost('tituloContacto');
            $mensajeContacto = $this->request->getPost('mensajeContacto');
            $fechaHoy = new Time('now', 'America/Argentina/Buenos_Aires', 'es-ar');

            //Aca colocamos las claves del array tal cual los nombres de los campos de la tabla productos de la base de datos
            $data = [
                'nombre' => $nombre,
                'apellido' => $apellido,
                'email' => $email,
                'titulo' =>  $tituloContacto,
                'mensaje' => $mensajeContacto,
                'fecha' => $fechaHoy,
                'contestado' => false
            ];

            $model = new ContactosModel();
            $contactoOk = $model->save($data);

            if (!$contactoOk) { //si no se pudo cargar la consulta en nuestra bd           
               return redirect()->back()->with('contacto_fail', 'Algo sucedio! Intenta enviar de nuevo su mensaje de contacto');
                
            } else { //si se pudo cargar el producto en nuestra bd
                return redirect()->back()->with('contacto_ok', 'Se ha enviado tu mensaje exitosamente!');
            };

        }
    }
}