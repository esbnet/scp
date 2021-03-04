<?php

namespace App\Controllers\Cadastros;

use CodeIgniter\Controller;
use App\Models\ClienteModel;

class Clientes extends Controller
{

  public function index()
  {

    $modelCliente = new ClienteModel();

    $data = [
      'title' => 'Cliente cadastrados',
      'styles' => [
        'vendor/datatables/dataTables.bootstrap4.min.css',
      ],
      'scripts' => [
        'vendor/datatables/jquery.dataTables.min.js',
        'vendor/datatables/dataTables.bootstrap4.min.js',
        'vendor/datatables/app.js',
      ],
      'clientes' => $modelCliente->get_All_Cliente(),
    ];

    // echo '<pre>';
    // print_r($data['clientes']);        
    // exit('Parada forçada...');

    echo view('layout/header', $data);
    echo view('clientes/index');
    echo view('layout/footer');
  }

  public function edit($id = NULL)
  {

    $modelCliente = new ClienteModel();

    $data = [
      'cliente'  => $modelCliente->get_Cliente_by_Id($id),

      'title' => 'Atualização de cliente',

      'scripts' => [
        'vendor/mask/jquery.mask.min.js',
        'vendor/mask/app.js',
      ],
    ];

    if (empty($data['cliente'])) {
      $this->session->set_flashdata('errors', 'Cliente não encontrado');
      redirect('clientes');
    } else {

      // echo '<pre>';
      // print_r($data['cliente']);        
      // exit('Parada forçada...');

      echo view('layout/header', $data);
      echo view('clientes/edit');
      echo view('layout/footer');
    }
  }
}
