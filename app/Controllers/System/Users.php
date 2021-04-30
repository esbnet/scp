<?php

namespace App\Controllers\System;

use CodeIgniter\Controller;
use App\Models\Config\UserModel;
use App\Models\Config\GrupoModel;

class Users extends Controller {

    //Lista todos os registros na view cadastro/disciplina
    public function index()
    {
        $model = new UserModel();

        $data = [
            'users'  => $model->getUsers(),
            'title' => 'Manutenção de usuários',
            'session' => \Config\Services::session()
        ];


        // echo '<pre>';
        // dd($data);

        echo view('layout/header', $data);
        echo view('users/index');
        echo view('layout/footer');
    }

    //Grava um novo registro
    public function add() {
        helper('form','url');

        $Grupomodel = new GrupoModel();

        $data = [
            'title' => 'Adicionar usuário',
            'grupos'  => $Grupomodel->getGrupos(),
            'session' => \Config\Services::session()
        ];

        if (!$data['session']->get('logged_in')) {
            return redirect('login/login');
        }

        echo view('layout/header', $data);
        echo view('users/form_add');
        echo view('layout/footer');
    }


    //Grava alterações em um registro
    public function edit($Id = NULL){

        helper('form');

        $Usermodel = new UserModel();
        $Grupomodel = new GrupoModel();

        $data = [
            'title' => 'Editar usuário',
            'users'  => $Usermodel->getUsers($Id),
            'grupos'  => $Grupomodel->getGrupos(),
            'session' => \Config\Services::session()
        ];

        // echo '<pre>';
        // dd($data);
        
        if (empty($data['users'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Grupo não encontrado para o ID:' . $Id);
        }

        echo view('layout/header', $data);
        echo view('users/form_edit');
        echo view('layout/footer');

    }    
    
    //Exibe um registro para edição
    public function store(){

        $modelUser = new UserModel();

        $user = ([
            'id' => $this->request->getVar('id'),
            'name' => $this->request->getVar('name'),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password_hash' => $this->request->getVar('password'),
            'reset_hash' => NULL,
            'reset_at' => NULL,
            'active_hash_at' => NULL,
            'status' => $this->request->getVar('status'),
            'status_message' => NULL,
            'active' => $this->request->getVar('description'),
            'create_at' => date('Y/m/d H:i:s'),
            'updated_at' => date('Y/m/d H:i:s'),
            'deleted_at' => NULL,
        ]);

        $grupo_id = ([
            'grupo_id' => $this->request->getVar('grupo'),
        ]);

        $modelUser->insertUser($user, $grupo_id);

        return redirect()->to(site_url('system/Users'));
    }

    //Apaga um registro com Id específico
    public function remove($Id)
    {

        $Usermodel = new UserModel();
        $Usermodel->delete($Id);

        return redirect()->to(site_url('system/Users'));
    }

    public function insertUser($user = NULL, $grupo_id = NULL) {

        echo '<pre>';
        dd($user);
        dd($grupo_id);

        // return $this->withGroup($grupo_id)
        //     ->save($user);

        } 
    

}
