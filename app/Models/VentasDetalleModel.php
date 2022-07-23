<?php  
namespace App\Models;
use CodeIgniter\Model;

class VentasDetalleModel extends Model{
    protected $table = 'ventas_detalle';
    protected $primaryKey = 'id_ventas_detalle';
    protected $allowedFields = ['venta_id','producto_id','cantidad','precio','total'];
    

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    //protected $useSoftDeletes = true;

    protected $useTimestamps = false;
    //protected $createdField  = '';
    protected $updatedField  = 'fecha_venta';
    //protected $deletedField  = 'contestado_consulta';

	//protected $skipValidation = false;
}
