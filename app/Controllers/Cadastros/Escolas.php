<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\EscolaModel;
use App\Models\MunicipioModel;
use App\Models\NteModel;
use CodeIgniter\Validation\Validation;

class Escolas extends Controller
{

  public function index()
  {

    $modelEscola = new EscolaModel();
    $modelNte = new NteModel();

    $data = [
      'validation' =>  \Config\Services::validation(),
      'ues' => $modelEscola->getAll(),
      'ntes' => $modelNte->getAll(),
      'title' => 'Manutenção de Escolas',
      'session' => \Config\Services::session(),
      'styles' => [
        'vendor/datatables/dataTables.bootstrap4.min.css',
      ],
      'scripts' => [
        'vendor/datatables/jquery.dataTables.min.js',
        'vendor/datatables/dataTables.bootstrap4.min.js',
        'vendor/datatables/app.js'
      ]
    ];

    // echo '<pre>';
    // print_r($data['ues']);
    // exit();

    echo view('layout/header', $data);
    echo view('escolas/index');
    echo view('layout/footer');

  }

  //Grava um novo registro
  public function new()
  {
    helper('form');

    $modelMunicipio = new MunicipioModel();

    $data = [
      'municipios' => $modelMunicipio->getAll(),
      'title' => 'Adicionar Escola',
      'session' => \Config\Services::session()
    ];

    if (!$data['session']->get('logged_in')) {
      return redirect('login/login');
    }

    echo view('template/header', $data);
    echo view('template/sidebar');
    echo view('template/navbar');
    echo view('escolas/form');
    echo view('template/footer');
  }


  //Grava alterações em um registro

  //Grava alterações em um registro
  public function edit($Id = NULL)
  {

    $modelEscola = new EscolaModel();
    $modelMunicipio = new MunicipioModel();
    $modelNte = new NteModel();

    $ues = $modelEscola->getEscolabyId($Id);

    if (is_null($ues) || empty($ues)) {

      var_dump($ues);
      echo '<pre>';
      echo print_r($ues);
      exit();

      throw new \CodeIgniter\Exceptions\PageNotFoundException('Escola não encontrada para o ID:' . $Id);
    } else {

      $data = [
        'msg' => '',
        'erros' => '',
        'session' => \Config\Services::session(),
        'validation' => \Config\Services::validation(),

        'title' => 'Editar de Escola',
        'ues' => $modelEscola->getEscolabyId($Id),
        'municipios' => $modelMunicipio->getAll(),
        'ntes' => $modelNte->getAll(),

        'styles' => [
          'vendor/datatables/dataTables.bootstrap4.min.css',
        ],
        'scripts' => [
          'vendor/datatables/jquery.dataTables.min.js',
          'vendor/datatables/dataTables.bootstrap4.min.js',
          'vendor/datatables/app.js',
        ]
      ];

      // echo '<pre>';
      // echo print_r($data['ntes']);
      // exit();

      echo view('layout/header', $data);
      echo view('escolas/edit');
      echo view('layout/footer');
    }
  }

  //Exibe um registro para edição
  public function store()
  {

    $modelEscola = new EscolaModel();
    $modelMunicipio = new MunicipioModel();
    $modelNte = new NteModel();

    $data = [
      'msg' => '',
      'erros' => '',
      'session' => \Config\Services::session(),
      'validation' => \Config\Services::validation(),

      'title' => 'Editar de Escola',
      'ues' => $modelEscola->getEscolabyId($this->request->getVar('id')),
      'municipios' => $modelMunicipio->getAll(),
      'ntes' => $modelNte->getAll(),

      'styles' => [
        'vendor/datatables/dataTables.bootstrap4.min.css',
      ],
      'scripts' => [
        'vendor/datatables/jquery.dataTables.min.js',
        'vendor/datatables/dataTables.bootstrap4.min.js',
        'vendor/datatables/app.js',
      ]
    ];

    if ($this->request->getMethod() === 'post') {
      $model = new EscolaModel();
      $dadosEscola = $this->request->getPost();

      //Pega da string o códiogo do NTE 
      $codnte = $this->request->getVar('nte');
      $codnte = substr($codnte, 7, 3);

      if ($model->insert($dadosEscola)) {
        echo '<alert>Escola atualizada com sucesso!</alert>';
        $data['msg'] = 'Escola atualizada com sucesso!';
      } else {

        // echo '<pre>';
        // var_dump($model->errors());
        // exit('... parada forçada');

        echo '<alert>Erro ao tentar atualizar a escola.</alert>';

        $data['msg'] = 'Erro ao tentar atualizar a escola.';

        $data['erros'] = ($model->errors()) ? $model->errors() : $this->session->flashdata('erros');

        echo view('layout/header', $data);
        echo view('escolas/edit');
        echo view('layout/footer');
      }
    }

    // echo '<pre>';
    // echo print_r($erros);
    // exit('Fim...');

  }

  //Grava um novo registro
  public function create()
  {

    helper('form');

    $model = new EscolaModel();

    $data = [
      'disciplinas'  => $model->getAll(),
      'title' => 'Manutenção de Escolas',
      'session' => \Config\Services::session()
    ];

    if (!$data['session']->get('logged_in')) {
      return redirect('login/login');
    }

    $codnte = $this->request->getVar('nte');
    $codnte = substr($codnte, 7, 2);

    $model->save([
      'Id' => $this->request->getVar('id'),
      'UeID' => $this->request->getVar('UeID'),
      'OU' => $this->request->getVar('Ou'),
      'Ue' => $this->request->getVar('Ue'),
      'CodNte' => $codnte,
      'Nte' => $this->request->getVar('nte'),
      'Municipio' => $this->request->getVar('municipio'),
      'Tipo' => $this->request->getVar('tipo'),
      'DepAdm' => $this->request->getVar('departamento'),
      'Situacao'  => $this->request->getVar('Situacao'),
    ]);

    return redirect('escolas');
  }

  //Apaga um registro com Id específico
  public function delete($Id)
  {

    $data['session'] = \Config\Services::session();

    $model = new EscolaModel();
    $model->delete($Id);

    return redirect('escolas');
  }
}
