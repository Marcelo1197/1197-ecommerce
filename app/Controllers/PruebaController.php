<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class PruebaController extends BaseController {
    public function index() {
        return view('testing');
    }
}