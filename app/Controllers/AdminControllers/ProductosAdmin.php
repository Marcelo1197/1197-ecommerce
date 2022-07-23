<?php

namespace App\Controllers\AdminControllers;
use CodeIgniter\Controller;
use App\Models\ProductosModel;
use App\Models\CategoriasModel;

class ProductosAdmin extends Controller {

    public function __construct() {
        if (!(session()->get('email') == "admin@gmail.com")) {
            return redirect()->to('/');
        }
        helper(['url', 'form']); //para poder utilizar nuestro Helpers/Form_helper que muestra los errores en nuestra view
    }

    public function index()
    {
        $productos = new ProductosModel();
        $categorias = new CategoriasModel();
        $data['productos'] = $productos->orderBy('id_producto', 'ASC')->findAll();
        $data['categorias'] = $categorias->orderBy('id_categoria', 'ASC')->findAll();
        echo view('admin/header');
        echo view('admin/productos/lista_productos', $data);
        echo view('admin/footer');
    }

    public function altaProductoVista() {
        $categorias = new CategoriasModel();
        $data['categorias'] = $categorias->orderBy('id_categoria', 'ASC')->findAll();
        return view('admin/productos/alta_producto', $data);
    }

    public function productosEliminados()
    {
        $productos = new ProductosModel();
        $categorias = new CategoriasModel();
        $data['productos'] = $productos->orderBy('id_producto', 'ASC')->findAll();
        $data['categorias'] = $categorias->orderBy('id_categoria', 'ASC')->findAll();
        echo view('admin/header');
        echo view('admin/productos_admin', $data);
        echo view('admin/footer');
    }


    public function agregarProducto() {
        //validaciones custom
        $validation = $this->validate([ //internamente usa $this->request->...
            
            'nombreProducto' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ingresa el nombre del producto por favor'
                ]
            ],
            'descripcionProducto' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ingresa una descripcion del producto por favor'
                ]
            ],
            'categoriaId' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ingresa una categoria por favor'
                ]
            ],
            'precio' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ingresa un precio por favor'
                ]
            ],
            'stock' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ingresa una cantidad entera para el stock por favor'
                ]
            ],
            'stockMinimo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ingresa una cantidad entera para el stock minimo por favor'
                ]
            ]
        ]);

        if (!$validation) { //Si el formulario no pasa alguna validacion 
            $productos = new ProductosModel();
            $categorias = new CategoriasModel();
            $data['productos'] = $productos->orderBy('id_producto', 'ASC')->findAll();
            $data['categorias'] = $categorias->orderBy('id_categoria', 'ASC')->findAll();
            $data['validation'] = $this->validator;
            echo view('admin/header');
            echo view('admin/productos_admin', $data);
            echo view('admin/footer');
        } else { //Si el formulario SI pasa la validacion
            //obtenemos la imagen, le asignamos un nombre random y la movemos al directorio assets/uploads
            
            $img = $this->request->getFile('imagen');
            $nombreRandomImg = $img->getRandomName();
            $img->move(ROOTPATH.'public/assets/uploads/', $nombreRandomImg);
           

            $nombreProducto = $this->request->getPost('nombreProducto');
            $descripcion = $this->request->getPost('descripcionProducto');
            $imagen = $nombreRandomImg;
            $categoriaId = $this->request->getPost('categoriaId');
            $precio = $this->request->getPost('precio');
            $stock = $this->request->getPost('stock');
            $stockMinimo = $this->request->getPost('stockMinimo');

            //Aca colocamos las claves del array tal cual los nombres de los campos de la tabla productos de la base de datos
            $data = [
                'nombre_prod' => $nombreProducto,
                'descripcion' => $descripcion,
                'imagen' => $imagen,
                'categoria_id' => $categoriaId,
                'precio' => $precio,
                'stock' => $stock,
                'stock_min' => $stockMinimo,
            ];

            $productosModel = new ProductosModel();
            $productoCargado = $productosModel->save($data);

            if (!$productoCargado) { //si no se pudo cargar el producto en nuestra bd           
               return redirect()->back()->with('fail', 'Algo sucedio! Intenta cargar de nuevo el producto');
                
            } else { //si se pudo cargar el producto en nuestra bd
                return redirect()->back()->with('success', 'Se ha cargado el producto exitosamente!');
            };

        }

    }

    
    public function editarProducto() {

        $validation = $this->validate([ //internamente usa $this->request->...
            
            'nombreProductoEditado' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ingresa el nombre del producto por favor'
                ]
            ],
            'descripcionProductoEditado' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ingresa una descripcion del producto por favor'
                ]
            ],
            'categoriaIdEditado' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ingresa una categoria por favor'
                ]
            ],
            'precioEditado' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ingresa un precio por favor'
                ]
            ],
            'stockEditado' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ingresa una cantidad entera para el stock por favor'
                ]
            ],
            'stockMinimoEditado' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ingresa una cantidad entera para el stock minimo por favor'
                ]
            ]
        ]);

        if (!$validation) { //Si el formulario no pasa alguna validacion
            $productos = new ProductosModel();
            $categorias = new CategoriasModel();
            $data['productos'] = $productos->orderBy('id_producto', 'ASC')->findAll();
            $data['categorias'] = $categorias->orderBy('id_categoria', 'ASC')->findAll();
            $data['validation'] = $this->validator;
            var_dump('no pasa validacion');
            echo view('admin/header');
            echo view('admin/productos_admin', $data);
            echo view('admin/footer');
        } else { //Si el formulario SI pasa la validacion
            //obtenemos la imagen, le asignamos un nombre random y la movemos al directorio assets/uploads
            
            $img = $this->request->getFile('imagenEditado');
            $nombreRandomImg = $img->getRandomName();
            $img->move(ROOTPATH.'public/assets/uploads/', $nombreRandomImg);
           

            $nombreProducto = $this->request->getPostGet('nombreProductoEditado');
            $descripcion = $this->request->getPostGet('descripcionProductoEditado');
            $imagen = $nombreRandomImg;
            $categoriaId = $this->request->getPostGet('categoriaIdEditado');
            $precio = $this->request->getPostGet('precioEditado');
            $stock = $this->request->getPostGet('stockEditado');
            $stockMinimo = $this->request->getPostGet('stockMinimoEditado');

            //Aca colocamos las claves del array tal cual los nombres de los campos de la tabla productos de la base de datos
            $data = [
                'nombre_prod' => $nombreProducto,
                'descripcion' => $descripcion,
                'imagen' => $imagen,
                'categoria_id' => $categoriaId,
                'precio' => $precio,
                'stock' => $stock,
                'stock_min' => $stockMinimo,
            ];

            $model = new ProductosModel();
            $idProductoEditar = $this->request->getPost('idProductoEditar');
            $dataModificada = $data;
            $productoModificado = $model->update($idProductoEditar, $data);

            if (!$productoModificado) { //si no se pudo cargar el producto en nuestra bd           
                return redirect()->back()->with('fail_editado', 'Algo sucedio! Intenta modificar de nuevo el producto');
                 
             } else { //si se pudo modificar correctamente el producto en nuestra base de datos
                return redirect()->back()->with('success_editado', 'Se ha modificado el producto exitosamente!');
             };
        }
    }
    
    public function eliminarProducto() {
        $model = new ProductosModel();
        $idEliminar = $this->request->getPost('idProductoEliminar');
        $bajaLogica = ['eliminado' => 1];
        $model->update($idEliminar, $bajaLogica);
        return redirect()->to(base_url('admin/productos'));
    }
    public function altaProducto() {
        $model = new ProductosModel();
        $idProductoAlta = $this->request->getPost('idProductoAlta');
        $altaLogica = ['eliminado' => 0];
        $model->update($idProductoAlta, $altaLogica);
        return redirect()->to(base_url('admin/productos'));
    }
}
