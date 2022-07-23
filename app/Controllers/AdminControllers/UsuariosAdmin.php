<?php

namespace App\Controllers\AdminControllers;
use CodeIgniter\Controller;
use App\Models\UsuariosModel;

class UsuariosAdmin extends Controller
{
    public function __construct() {
        if (!(session()->get('email') == "admin@gmail.com")) {
            return redirect()->to('/');
        }
        helper(['url', 'form']); //para poder utilizar nuestro Helpers/Form_helper que muestra los errores en nuestra view
    }

    public function index()
    {
        $usuarios = new UsuariosModel();
        $data['usuarios'] = $usuarios->orderBy('id_usuario', 'DESC')->findAll();

        echo view('admin/header');
        echo view('admin/usuarios_admin', $data);
        echo view('admin/footer');
    }

    public function eliminarUsuario() {
        $model = new UsuariosModel();
        $idUsuarioEliminar = $this->request->getPost('idUsuarioEliminar');
        $bajaLogica = ['baja' => true];
        $model->update($idUsuarioEliminar, $bajaLogica);
        return redirect()->to(base_url('admin/usuarios'));
    }

    public function altaUsuario() {
        $model = new UsuariosModel();
        $idUsuarioAlta = $this->request->getPost('idUsuarioAlta');
        $altaLogica = ['baja' => false];
        $model->update($idUsuarioAlta, $altaLogica);
        return redirect()->to(base_url('admin/usuarios'));
    }
}
