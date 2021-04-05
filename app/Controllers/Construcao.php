<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Construcao extends Controller {

    public function index() {

        helper(['form', 'url']);

        $data = ['message' => 'O recurso solicitado ainda está em construção.',];

        echo view('layout/header', $data);
        echo view('construcao');
        echo view('layout/footer');
    }

}