<?php

namespace App\Controllers;

//defined('BASEPATH') or exit('Ação não permitida');

use CodeIgniter\Controller;

class Sistema extends Controller
{

    public function __construct() 
    {
        //Verificar se o usuário está logado
        //parent::__construct();

    }

    public function index(){

        $data = ['title' => 'Configurações do sistema'];

        echo view('layout/header', $data);
        echo view('sistema/index');
        echo view('layout/footer');


    }

}