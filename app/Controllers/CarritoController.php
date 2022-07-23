<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ProductosModel;
use App\Models\CategoriasModel;

class CarritoController extends BaseController {

    public function __construct() {
        helper(['url', 'form']); //para poder utilizar nuestro Helpers/Form_helper que muestra los errores en nuestra view
    }
    
    public function index() {
        if (!session()->get('logueado')) {
            return redirect()->to('/');
        }
        $data['itemsCarrito'] = session('carrito'); //un array con todos los items del carrito, donde cada item es otro array
        $data['total'] = $this->total();
        echo view('partes/header');
        //echo view('probando', $data);
        echo view('paginas/carrito', $data);
        echo view('partes/footer');
    }

    public function agregarAlCarrito() {
        $productosModel = new ProductosModel();
        $idProducto = $this->request->getPost('idProducto');
        $productoAgregado = $productosModel->find($idProducto); //rescatamos el producto de la BD

        $item = array( //guardamos sus datos en un array
            'id_producto' => $productoAgregado['id_producto'],
            'nombre_prod' => $productoAgregado['nombre_prod'],
            'descripcion' => $productoAgregado['descripcion'],
            'imagen' => $productoAgregado['imagen'],
            'categoria_id' => $productoAgregado['categoria_id'],
            'precio' => $productoAgregado['precio'],
            'cantidad' => 1
        );

        $session = session(); //instanciamos una session

        if ($session->has('carrito')) { //preguntamos si la session tiene una key/clave 'carrito' (ya que es un array)
            $posicionItem = $this->existeEnCarrito($idProducto);
            $carrito = session('carrito');

            if ($posicionItem == -1) { //o sea, si no existe el producto en el carrito
                array_push($carrito, $item);
            } else { //si dio algo distinto de -1, significa que si existe ese producto y obtuvimos el indice
                $carrito[$posicionItem]['cantidad']++;
            }
            $session->set('carrito', $carrito); //en cualquiera de los dos casos, debemos actualizar el carrito por lo tanto colocamos el set fuera del if-else 

        } else { //sino tiene un carrito creado, lo creamos y agregamos el producto en cuestion
            $itemsCarrito[] = $item;
            $session->set('carrito', $itemsCarrito); //? porque lo transforma en un array si ya es un array  
        }

        return redirect()->to(base_url('carrito-compras'));
    }
   


    
    public function eliminarDelCarrito() {
        $idProducto = $this->request->getPost('idProductoEliminar');
        $posicionItem = $this->existeEnCarrito($idProducto);
        $carrito = session('carrito');
        unset($carrito[$posicionItem]); //remuevo el item del array que está en carrito, por lo cual se actualiza
        $session = session(); //creo una nueva session
        $session->set('carrito', $carrito); //actualizo el carrito, reemplazando la session anterior de 'carrito'
        return redirect()->to(base_url('carrito-compras'));
    }

    /*
    actualizarCarrito() se dispara cuando apretamos el boton
    traemos nuestro carrito con session('carrito') y lo guardamos en $carrito
    recorremos y actualizamos cada item['cantidad'] del carrito con el valor que traemos del input $_POST['cantidadUpdate']
    creamos una nueva session, le asignamos el nuevo valor con $carrito y actualizamos pagina, como en eliminarDelCarrito()
    */
    public function actualizarCarrito() {
        $carrito = session('carrito');
        foreach( $carrito as $posicion => $itemCarrito) {
            $_SESSION['carrito'][$posicion]['cantidad'] = $_POST['cantidadUpdate'][$posicion];
        }
        
        foreach( $carrito as $posicion => $itemCarrito) {
            if ( $_SESSION['carrito'][$posicion]['cantidad'] == 0) {
                unset($_SESSION['carrito'][$posicion]);
            }
           
        }
        
        return redirect()->to(base_url('carrito-compras'));
    }

    public function vaciarCarrito() {
        $session = session();
        $session->remove('carrito');
        return redirect()->to(base_url('carrito-compras'));
    }

    private function existeEnCarrito($id) { //te devuelve la posicion del item en el array de datos session('carrito)
        $posicionItem = -1;
        foreach(session('carrito') as $posicion => $itemCarrito) {
            if ($itemCarrito['id_producto'] == $id) {
                $posicionItem = $posicion;
            }
        }
        return $posicionItem;
    }

    private function total() {
        $totalCarrito = 0;
        $carrito = session('carrito');
        if ($carrito) {
          foreach($carrito as $itemCarrito) {
            $totalCarrito += $itemCarrito['precio'] * $itemCarrito['cantidad'];
        }  
        }
        
        return $totalCarrito;
    }

}
