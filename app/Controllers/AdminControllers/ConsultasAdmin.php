<?php

namespace App\Controllers\AdminControllers;
use CodeIgniter\Controller;
use App\Models\ConsultasModel;

class ConsultasAdmin extends Controller
{
    public function __construct() {
        if (!(session()->get('email') == "admin@gmail.com")) {
            return redirect()->to('/');
        }
        helper(['url', 'form']); //para poder utilizar nuestro Helpers/Form_helper que muestra los errores en nuestra view
    }
    
    public function index()
    {
        $model = new ConsultasModel();
        $data['consultas'] = $model->orderBy('id_consulta', 'ASC')->findAll();
        echo view('admin/header');
        echo view('admin/consultas_admin', $data);
        echo view('admin/footer');
    }
    
    public function consultaResuelta() {
        $model = new ConsultasModel();
        $contestado = ['contestado' => true];
        $idResuelta = $this->request->getPost('idConsultaResuelta');
        $model->update($idResuelta, $contestado);
        return redirect()->to(base_url('admin/consultas'));
    }
    public function consultaNoResuelta() {
        $model = new ConsultasModel();
        $contestado = ['contestado' => false];
        $idNoResuelta = $this->request->getPost('idConsultaNoResuelta');
        $model->update($idNoResuelta, $contestado);
        return redirect()->to(base_url('admin/consultas'));
    }
}
