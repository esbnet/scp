<?php

namespace App\Controllers\Cadastros;

use CodeIgniter\Controller;
use App\Models\MunicipioModel;

class Polos extends Controller {

    public function index() {

        $model = new MunicipioModel();

        $data = [
            'polos'  => $model->getAll(),
            'title' => 'Manutenção de Polos',
            'session' => \Config\Services::session()
        ];

        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/navbar');
        echo view('polos/polo');
        echo view('template/footer');
    }

    //Grava um novo registro
    public function new() {
        helper('form');

        $data = [
            'title' => 'Adicionar Polos',
            'session' => \Config\Services::session()
        ];

        if (!$data['session']->get('logged_in')) {
            return redirect('login/login');
        }

        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/navbar');
        echo view('polos/form');
        echo view('template/footer');
    }

    //Grava alterações em um registro
    public function edit($Id = NULL){

        $model = new MunicipioModel();

        $data = [
            'polos'  => $model->getPolobyId($Id),
            'title' => 'Editar de Polos',
            'session' => \Config\Services::session()
        ];

        if (empty($data['polos'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Polo não encontrada para o ID:' . $Id);
        }

        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/navbar');
        echo view('polos/form', $data);
        echo view('template/footer');
    }    
    
    //Exibe um registro para edição
    public function store(){

        helper('from');
        $model = new MunicipioModel();

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

        return redirect('polos');
    }

    //Apaga um registro com Id específico
    public function delete($Id) {
        $data['session'] = \Config\Services::session();

        $model = new MunicipioModel();
        $model->delete($Id);

        return redirect('polos');

    }

}
