<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UsuariosModel;

class UserPanelController extends BaseController {
    public function __construct() {
        helper(['url', 'form']);
        if (!session()->get('logueado')) {
            return redirect()->to('/');
        }
    }

    public function index() {
        $userModel = new UsuariosModel();
        $userActualId = session()->get('id_usuario');

        $data['userData'] = $userModel->find($userActualId);
        return view('user/mi_cuenta', $data);
    }
}