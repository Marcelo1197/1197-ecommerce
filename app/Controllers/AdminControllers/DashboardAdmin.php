<?php

namespace App\Controllers\AdminControllers;
use CodeIgniter\Controller;
use App\Models\VentasCabeceraModel;

class DashboardAdmin extends Controller
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
        $data['totalVentas'] = $this->totalVentas();
        $data['ventasPorMes'] = $this->ventasPorMesJSON();

        echo view('admin/header');
        echo view('admin/dashboard_admin',  $data);
        echo view('admin/footer');
    }

    private function totalVentas() { //devuelvo la cantidad total de ventas del año actual
        $db = \Config\Database::connect();
        $builder = $db->table('ventas_cabecera');
        $totalVentas = $builder->where('year(fecha)', date('Y'))->countAllResults();

        return $totalVentas;
    }

    private function ventasPorMesJSON() { //devuelvo el total de ventas de cada mes del año actual en formato JSON
        $db = \Config\Database::connect();
        $resultadoQuery = $db->query("SELECT MONTH(fecha), COUNT(*) FROM ventas_cabecera WHERE YEAR (fecha) = YEAR (CURDATE()) GROUP BY MONTH(fecha);");
        $ventasPorMesQuery = $resultadoQuery->getResultArray(); 

        $ventasPorMes = [
            'enero' => 0,
            'febrero' => 0,
            'marzo' => 0,
            'abril' => 0,
            'mayo' => 0,
            'junio' => 0,
            'julio' => 0,
            'agosto' => 0,
            'septiembre' => 0,
            'octubre' => 0,
            'noviembre' => 0,
            'diciembre' => 0,
        ];
        
        foreach($ventasPorMesQuery as $dataMes) {
            switch ($dataMes["MONTH(fecha)"]) {
                case 1:
                    $ventasPorMes['enero'] = $dataMes["COUNT(*)"];
                    break;
                case 2:
                    $ventasPorMes['febrero'] = $dataMes["COUNT(*)"];
                    break;
                case 3:
                    $ventasPorMes['marzo'] = $dataMes["COUNT(*)"];
                    break;
                case 4:
                    $ventasPorMes['abril'] = $dataMes["COUNT(*)"];
                    break;
                case 5:
                    $ventasPorMes['mayo'] = $dataMes["COUNT(*)"];
                    break;
                case 6:
                    $ventasPorMes['junio'] = $dataMes["COUNT(*)"];
                    break;
                case 7:
                    $ventasPorMes['julio'] = $dataMes["COUNT(*)"];
                    break;
                case 8:
                    $ventasPorMes['agosto'] = $dataMes["COUNT(*)"];
                    break;
                case 9:
                    $ventasPorMes['septiembre'] = $dataMes["COUNT(*)"];
                    break;
                case 10:
                    $ventasPorMes['octubre'] = $dataMes["COUNT(*)"];
                    break;
                case 11:
                    $ventasPorMes['noviembre'] = $dataMes["COUNT(*)"];
                    break;
                case 12:
                    $ventasPorMes['diciembre'] = $dataMes["COUNT(*)"];
                    break;
            }
        }

        return  json_encode($ventasPorMes);
    }

}
