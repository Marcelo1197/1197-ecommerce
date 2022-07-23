<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsultasModel extends Model
{
    protected $table = 'consulta';
    protected $primaryKey = 'id_consulta';
    protected $allowedFields = ['usuario_id', 'titulo', 'mensaje', 'contestado'];
}