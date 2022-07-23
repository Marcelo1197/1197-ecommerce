<?php

namespace App\Controllers\AdminControllers;
use CodeIgniter\Controller;
use App\Models\VentasCabeceraModel;
use App\Models\VentasDetalleModel;
use App\Models\UsuariosModel;
use App\Models\ProductosModel;

class FacturasAdmin extends Controller
{
    public function __construct() {
        if (!(session()->get('email') == "admin@gmail.com")) {
            return redirect()->to('/');
        }
        helper(['url', 'form']); //para poder utilizar nuestro Helpers/Form_helper que muestra los errores en nuestra view
    }

    public function index()
    {
        $modelCabecera = new VentasCabeceraModel();
        $modelDetalle = new VentasDetalleModel();
        $modelUsuarios = new UsuariosModel();
        $modelProductos = new ProductosModel();
        $data['ventasCabecera'] = $modelCabecera->findAll();
        $data['ventasDetalle'] = $modelDetalle->findAll();
        $data['clientes'] = $this->datosClientesVentas();
        $data['productos'] = $this->datosProductosVentas($data['ventasDetalle'], $modelProductos->findAll());

        $data['query'] = $this->ventasCabeceraConDetalles();

        echo view('admin/header');
        echo view('admin/facturas_admin', $data);
        echo view('admin/footer');
    }


    public function cabeceraYDetalles() {
        $modelCabecera = new VentasCabeceraModel();
        $modelDetalle = new VentasDetalleModel();
        $ventasCabecera = $modelCabecera->orderBy('id_ventas_cabecera', 'ASC')->findAll();
        $ventasDetalle = $modelDetalle->orderBy('venta_id', 'ASC')->findAll();
        
        $ventas = array();
        foreach($ventasCabecera as $key => $cabecera) {
            foreach( $ventasDetalle as $detalle) {
                if ($cabecera['id_ventas_cabecera'] == $detalle['venta_id']) {
                    array_push($ventasCabecera[$key], $detalle['venta_id']);
                }
            }
        }

    }

    private function datosClientesVentas2($ventasCabecera, $clientes) { //retorno en un array unicamente aquellos clientes que facturaron, para no pasar todos los usuarios de la bd a la vista
        $datosClientes = [];
        foreach($clientes as $keyCliente => $cliente) {
            foreach($ventasCabecera as $keyCabecera => $cabecera) {
                if($cliente['id_usuario']  == $cabecera['usuario_id'] ) {
                    $datosClientes[$keyCliente + 1] = $cliente; //hago coincidir la posicion del 'cliente' en el array con la id del mismo, para mostrar más fácilmente en la vista
                }
            }
        }
        return $datosClientes;        
    }

    private function datosClientesVentas() {
        $db = \Config\Database::connect();
        $clientesVentasIndexado = [];
        $queryClientesVentas = $db->query('
            SELECT * from usuarios 
            INNER JOIN ventas_cabecera
            ON ventas_cabecera.usuario_id = usuarios.id_usuario'
        )->getResultArray(); //traigo solamente aquellos usuarios que realizaron compras

        foreach($queryClientesVentas as $cliente) { //creo un array indexado de clientes, donde cada key del array es el id del usuario
            $clientesVentasIndexado[$cliente['id_usuario']] = $cliente;
        }

        return $clientesVentasIndexado;

    }

    private function datosProductosVentas($ventasDetalle, $productos) { //retorno en un array unicamente aquellos productos que fueron facturados, para no pasar todos los productos de la bd a la vista
        $datosProductos = [];
        foreach($productos as $keyProducto => $producto) {
            foreach($ventasDetalle as $keyDetalle => $detalle) {
                if($producto['id_producto'] == $detalle['producto_id'] ) {
                    $datosProductos[$keyProducto + 1] = $producto; //hago coincidir la posicion del producto en el array con la id del mismo, para mostrar más fácilmente en la vista
                }
            }
        }
        return $datosProductos;        
    }

    private function ventasCabeceraConDetalles() {
        $db = \Config\Database::connect();
        $queryCabeceraConDetalles = $db->query('SELECT * from ventas_detalle INNER JOIN ventas_cabecera ON ventas_detalle.venta_id = ventas_cabecera.id_ventas_cabecera')->getResultArray();
        $cabeceraDetallesByID = [];
        foreach($queryCabeceraConDetalles as $cabeceraConDetalles) {
            if (isset($cabeceraDetallesByID[$cabeceraConDetalles['venta_id']])) {
                array_push($cabeceraDetallesByID[$cabeceraConDetalles['venta_id']], $cabeceraConDetalles);
            } else {
                $cabeceraDetallesByID[$cabeceraConDetalles['venta_id']] = array($cabeceraConDetalles);
            }
        }

        return $cabeceraDetallesByID;
    }

}
