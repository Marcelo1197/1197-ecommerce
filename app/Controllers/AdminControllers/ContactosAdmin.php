<?php

namespace App\Controllers\AdminControllers;
use CodeIgniter\Controller;
use App\Models\ContactosModel;

class ContactosAdmin extends Controller
{
    public function __construct() {
        if (!(session()->get('email') == "admin@gmail.com")) {
            return redirect()->to('/');
        }
        helper(['url', 'form']); //para poder utilizar nuestro Helpers/Form_helper que muestra los errores en nuestra view
    }
    
    public function index()
    {
        $model = new ContactosModel();
        $data['contactos'] = $model->orderBy('id_contacto', 'ASC')->findAll();
        echo view('admin/header');
        echo view('admin/contactos_admin', $data);
        echo view('admin/footer');
    }

    public function contactoResuelto() {
        $model = new ContactosModel();
        $contestado = ['contestado' => true];
        $idResuelto = $this->request->getPost('idContactoResuelto');
        $model->update($idResuelto, $contestado);
        return redirect()->to(base_url('admin/contactos'));
    }
    public function contactoNoResuelto() {
        $model = new ContactosModel();
        $contestado = ['contestado' => false];
        $idNoResuelto = $this->request->getPost('idContactoNoResuelto');
        $model->update($idNoResuelto, $contestado);
        return redirect()->to(base_url('admin/contactos'));
    }
}
