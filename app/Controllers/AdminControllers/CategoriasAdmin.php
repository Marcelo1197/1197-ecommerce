<?php

namespace App\Controllers\AdminControllers;
use CodeIgniter\Controller;
use App\Models\CategoriasModel;

class CategoriasAdmin extends Controller
{
    public function __construct() {
        if (!(session()->get('email') == "admin@gmail.com")) {
            return redirect()->to('/');
        }
        helper(['url', 'form']); //para poder utilizar nuestro Helpers/Form_helper que muestra los errores en nuestra view
    }

    public function index()
    {
        $categorias = new CategoriasModel();
        $data['categorias'] = $categorias->orderBy('id_categoria', 'ASC')->findAll();

        echo view('admin/header');
        echo view('admin/categorias_admin', $data);
        echo view('admin/footer');
    }

    public function agregarCategoria() {
        //validaciones custom
        $validacion = $this->validate([ //internamente usa $this->request->...
            'nombreCategoria' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ingresa el nombre de la categoria por favor'
                ]
            ]
        ]);

        if (!$validacion) { //Si el formulario no pasa alguna validacion
            $categorias = new CategoriasModel();
            $data['categorias'] = $categorias->orderBy('id_categoria', 'ASC')->findAll();
            $data['validation'] = $this->validator;
            echo view('admin/header');
            echo view('admin/categorias_admin', $data);
            echo view('admin/footer');
        } else { //Si pasa la validacion
            $nombreCategoria = $this->request->getPost('nombreCategoria');

            //Aca colocamos las claves del array tal cual los nombres de los campos de la tabla productos de la base de datos
            $data = [
                'categoria' => $nombreCategoria,
            ];

            $categoriasModel = new CategoriasModel();
            $categoriaCargada = $categoriasModel->save($data);

            if (!$categoriaCargada) { //si no se pudo cargar el producto en nuestra bd           
               return redirect()->back()->with('fail', 'Algo sucedio! Intenta cargar de nuevo la categoria');
                
            } else { //si se pudo cargar el producto en nuestra bd
                return redirect()->back()->with('success', 'Se ha cargado la nueva categoria exitosamente!');
            };

        }

    }

    public function eliminarCategoria() {
        $model = new CategoriasModel();
        $idEliminar = $this->request->getPost('idCategoriaEliminar');
        $bajaLogica = ['eliminado' => 1];
        $model->update($idEliminar, $bajaLogica);
        return redirect()->to(base_url('admin/categorias'));
    }
    public function habilitarCategoria() {
        $model = new CategoriasModel();
        $idHabilitar = $this->request->getPost('idCategoriaHabilitar');
        $altaLogica = ['eliminado' => 0];
        $model->update($idHabilitar, $altaLogica);
        return redirect()->to(base_url('admin/categorias'));
    }
}
