<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ConsultasModel;

class ConsultaController extends BaseController {
    public function __construct() {
        if (!session()->get('logueado')) {
            return redirect()->to('/');
        }
        helper(['url', 'form']); //para poder utilizar nuestro Helpers/Form_helper que muestra los errores en nuestra view
    }

    public function index() {
        echo view('partes/header');
        echo view('paginas/consulta');
        echo view('partes/footer');
    }

    public function registrarConsulta() {
        $validation = $this->validate([ //internamente usa $this->request->...
            'tituloConsulta' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ingresa el titulo de la consulta por favor'
                ]
            ],
            'mensajeConsulta' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ingresa su consulta por favor'
                ]
            ]
        ]);

        if (!$validation) { //Si el formulario no pasa alguna validacion
            echo view('partes/header');
            echo view('paginas/consulta', ["validation" => $this->validator]);
            echo view('partes/footer');
        } else { //Si pasa la validacion
            $usuarioId = session()->get('id_usuario');
            $tituloConsulta = $this->request->getPost('tituloConsulta');
            $mensajeConsulta = $this->request->getPost('mensajeConsulta');

            //Aca colocamos las claves del array tal cual los nombres de los campos de la tabla productos de la base de datos
            $data = [
                'usuario_id' => $usuarioId,
                'titulo' => $tituloConsulta,
                'mensaje' => $mensajeConsulta,
                'contestado' => false
            ];

            $model = new ConsultasModel();
            $consultaOk = $model->save($data);

            if (!$consultaOk) { //si no se pudo cargar la consulta en nuestra bd           
               return redirect()->back()->with('consulta_fail', 'Algo sucedio! Intenta enviar de nuevo la consulta');
                
            } else { //si se pudo cargar el producto en nuestra bd
                return redirect()->back()->with('consulta_ok', 'Se ha enviado tu consulta exitosamente!');
            };

        }
    }


}