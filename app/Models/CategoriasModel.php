<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriasModel extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'id_categoria';
    protected $allowedFields = ['categoria', 'eliminado'];
}