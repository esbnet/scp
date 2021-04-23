<?php

namespace App\Controllers\Cadastros;

use CodeIgniter\Controller;
use App\Models\DisciplinaModel;

class Disciplinas extends Controller {

    // public function __construct(){
    //     helper('form');
    //     $this->model = new DisciplinaModel();
    // }

    //Lista todos os registros na view cadastro/disciplina
    public function index()
    {
        $model = new DisciplinaModel();

        $data = [
            'disciplinas'  => $model->getAll(),
            'title' => 'Manutenção de Disciplinas',
            'session' => \Config\Services::session()
        ];

        echo view('layout/header', $data);
        echo view('disciplinas/index');
        echo view('layout/footer');
    }

    //Grava um novo registro
    public function new() {
        helper('form');

        $data = [
            'title' => 'Adicionar Disciplinas',
            'session' => \Config\Services::session()
        ];

        if (!$data['session']->get('logged_in')) {
            return redirect('login/login');
        }

        echo view('layout/header', $data);
        echo view('disciplinas/form');
        echo view('layout/footer');
    }


    //Grava alterações em um registro
    public function edit($Id = NULL){

        $model = new DisciplinaModel();

        $data = [
            'disciplinas'  => $model->getDiciplinabyId($Id),
            'title' => 'Editar de Disciplinas',
            'session' => \Config\Services::session()
        ];

        if (empty($data['disciplinas'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Disciplina não encontrada para o ID:' . $Id);
        }

        echo view('layout/header', $data);
        echo view('disciplinas/form');
        echo view('layout/footer');

    }    
    
    //Exibe um registro para edição
    public function store(){

        helper('from');
        $model = new DisciplinaModel();

        // $rules = [
        //     'Nome' => 'required|min_lenght(3)|max_lenght(150)',
        // ];

        // if ($this->validate($rules)) {
        // }

        $model->save([
            'id' => $this->request->getVar('id'),
            'nome' => $this->request->getVar('nome'),
        ]);

        return redirect()->to(site_url('disciplinas'));
    }

    //Apaga um registro com Id específico
    public function remove($Id)
    {

        $model = new DisciplinaModel();
        $model->delete($Id);

        return redirect()->to(site_url('/cadastros/disciplinas'));
    }
}
