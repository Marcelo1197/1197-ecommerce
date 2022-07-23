<?php

namespace App\Controllers;


class PaginasController extends BaseController //Controlador para las páginas estáticas
{

    public function view($page = 'principal') {
        $data['title'] = ucfirst($page);
        
        echo view('partes/header', $data);
        echo view('paginas/'.$page);
        echo view('partes/footer');
    }

    public function principal() {
        
        echo view('partes/header');
        echo view('paginas/principal', ['title' => 'Inicio']);
        echo view('partes/footer');
    }

    public function quienes_somos() {
        
        echo view('partes/header');
        echo view('paginas/quienes_somos', ['title' => 'Quienes Somos']);
        echo view('partes/footer');
    }

    public function comercializacion() {
        
        echo view('partes/header');
        echo view('paginas/comercializacion', ['title' => 'Comercializacion']);
        echo view('partes/footer');
    }

    public function terminos_usos() {   
        echo view('partes/header');
        echo view('paginas/terminos_usos', ['title' => 'Terminos y Usos']);
        echo view('partes/footer');
    }
}
