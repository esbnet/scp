<?php

namespace App\Controllers\System;

use CodeIgniter\Controller;
use App\Models\Config\GrupoModel;

class Grupos extends Controller {

    //Lista todos os registros na view cadastro/disciplina
    public function index()
    {
        $model = new GrupoModel();

        $data = [
            'grupos'  => $model->getGrupos(),
            'title' => 'Manutenção de Grupos',
            'session' => \Config\Services::session()
        ];

        echo view('layout/header', $data);
        echo view('grupos/index');
        echo view('layout/footer');
    }

    //Grava um novo registro
    public function new() {
        helper('form','url');

        $data = [
            'title' => 'Adicionar Grupo',
            'session' => \Config\Services::session()
        ];

        if (!$data['session']->get('logged_in')) {
            return redirect('login/login');
        }

        echo view('layout/header', $data);
        echo view('grupos/form_add');
        echo view('layout/footer');
    }


    //Grava alterações em um registro
    public function edit($Id = NULL){

        $model = new GrupoModel();

        $data = [
            'title' => 'Editar Grupo',
            'grupos'  => $model->getGrupos($Id),
            'session' => \Config\Services::session()
        ];

        // echo '<pre>';
        // dd($data);
        
        if (empty($data['grupos'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Grupo não encontrado para o ID:' . $Id);
        }

        echo view('layout/header', $data);
        echo view('grupos/form_edit');
        echo view('layout/footer');

    }    
    
    //Exibe um registro para edição
    public function store(){

        helper('from');
        $model = new GrupoModel();

        $model->save([
            'id' => $this->request->getVar('id'),
            'name' => $this->request->getVar('name'),
            'description' => $this->request->getVar('description'),
        ]);

        return redirect()->to(site_url('system/grupos'));
    }

    //Apaga um registro com Id específico
    public function remove($Id)
    {

        $model = new GrupoModel();
        $model->delete($Id);

        return redirect()->to(site_url('system/grupos'));
    }
}
