<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ProductosModel;
use App\Models\CategoriasModel;

class ProductosController extends BaseController {

    public function __construct() {
        helper(['url', 'form']); //para poder utilizar nuestro Helpers/Form_helper que muestra los errores en nuestra view
    }

    public function index()
    {
        $productos = new ProductosModel();
        $categorias = new CategoriasModel();
        $data['categorias'] = $categorias->where('eliminado !=', true)->findAll();
        $data['productos'] = $productos->where('eliminado !=', true)->orderBy('id_producto', 'ASC')->findAll();
        $data['activo'] = 'todos';
        echo view('partes/header');
        echo view('paginas/productos', $data);
        echo view('partes/footer');
    }

    public function mostrarCategoria($id) {
        $productos = new ProductosModel();
        $categorias = new CategoriasModel();
        //$condicionesBusqueda = ['categoria_id' => $id, 'eliminado !=', 'SI']
        //$data['categorias'] = $categorias->where($condicionesBusqueda)->findAll();
        $data['categorias'] = $categorias->where('eliminado !=', true)->findAll();
        $data['productos'] = $productos->where(['categoria_id' => $id, 'eliminado !=' => true])->orderBy('id_producto', 'ASC')->findAll();
        $data['activo'] = $id;
        echo view('partes/header');
        echo view('paginas/productos', $data);
        echo view('partes/footer');
    }
  
}
