<?php  
namespace App\Models;
use CodeIgniter\Model;

class VentasCabeceraModel extends Model{
    protected $table = 'ventas_cabecera';
    protected $primaryKey = 'id_venta_cabecera';
    protected $allowedFields = ['usuario_id','total_venta', 'fecha'];
    protected $returnType     = 'array';
    protected $useTimestamps = false;
    protected $updatedField  = 'fecha_venta';

}
