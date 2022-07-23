<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ProductosModel;
use App\Models\VentasCabeceraModel;
use App\Models\VentasDetalleModel;
use CodeIgniter\I18n\Time;

class VentasController extends BaseController {

    public function __construct(){
        if (!session()->get('logueado')) {
            return redirect()->to('/');
        }
        helper(['form', 'url']);
        $db = \Config\Database::connect();
        //$id_vc = $db->table('ventas_cabecera');
        $this->session = session();
    } 

    public function grabarCompra(){
            $db = \Config\Database::connect();
            $ventaCabeceraModel = new VentasCabeceraModel();
            $ventaDetallesModel = new VentasDetalleModel();
            $db->table('ventas_detalle');
            $carrito = session('carrito');
            $fechaHoy = new Time('now', 'America/Argentina/Buenos_Aires', 'es-ar');

            if ($carrito){
                $id_session = $this->session = session()->get('id_usuario');
                $datosVentaCabecera = [
                    'fecha' => $fechaHoy->toDateString(),
                    'usuario_id' => $id_session,
                    'total_venta' => $this->totalCarrito(),
                ];
                $ventaCabeceraInsertada = $ventaCabeceraModel->insert($datosVentaCabecera);
            
                foreach($carrito as $item){
                    $datosVentaDetalle = [
                        'venta_id' => $ventaCabeceraInsertada,
                        'producto_id' =>  $item['id_producto'],
                        'cantidad' => $item['cantidad'],
                        'precio' => $item['precio'],
                        'fecha_venta' => $fechaHoy->toDateString(),
                        'total' => $item['cantidad']*$item['precio']
                    ];
                    $ventaDetallesModel->insert($datosVentaDetalle); 
                }
                session()->remove('carrito');
                session()->setFlashdata('compra_ok', '¡COMPRA EXITOSA! En breves enviaremos por email información de su compra.');
                return redirect()->to(base_url('carrito-compras'));
            } else{
                session()->setFlashdata('compra_fail', '¡Hubo un error en su compra! Por favor, intentelo nuevamente.');
                return redirect()->to(base_url('carrito-compras'));
            }

        }

        private function totalCarrito() {
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