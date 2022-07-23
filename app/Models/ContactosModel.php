<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactosModel extends Model
{
    protected $table = 'contacto';
    protected $primaryKey = 'id_contacto';
    protected $allowedFields = ['nombre', 'apellido', 'email', 'titulo', 'mensaje', 'fecha', 'contestado'];
}