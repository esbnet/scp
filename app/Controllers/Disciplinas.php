<?php

namespace App\Controllers\Cadastros;

use CodeIgniter\Controller;
use App\Models\DisciplinaModel;

class Disciplinas extends Controller {

    protected $model;

    public function __construct(){
        helper('form');
        $this->model = new DisciplinaModel();
    }

    //Lista todos os registros na view cadastro/disciplina
    public function index()
    {
        $model = new DisciplinaModel();

        $data = [
            'disciplinas'  => $model->getAll(),
            'title' => 'Manutenção de Disciplinas',
            'session' => \Config\Services::session()
        ];

        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/navbar');
        echo view('disciplinas/disciplina');
        echo view('template/footer');
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

        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/navbar');
        echo view('disciplinas/form');
        echo view('template/footer');
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

        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/navbar');
        echo view('disciplinas/form', $data);
        echo view('template/footer');
    }    
    
    //Exibe um registro para edição
    public function store(){

        helper('from');
        $model = new DisciplinaModel();

        $data = ['session' => \Config\Services::session()];

        // $rules = [
        //     'Nome' => 'required|min_lenght(3)|max_lenght(150)',
        // ];

        // if ($this->validate($rules)) {
        // }

        $model->save([
            'id' => $this->request->getVar('id'),
            'Nome' => $this->request->getVar('Nome'),
        ]);

        return redirect('disciplinas');
    }

    //Apaga um registro com Id específico
    public function delete($Id)
    {
        $data['session'] = \Config\Services::session();

        $model = new DisciplinaModel();
        $model->delete($Id);

        return redirect('disciplinas');
    }
}
