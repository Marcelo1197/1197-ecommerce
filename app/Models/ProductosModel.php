<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductosModel extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    protected $allowedFields = ['nombre_prod', 'descripcion', 'imagen', 'categoria_id', 'precio', 'stock', 'stock_min', 'eliminado'];
}