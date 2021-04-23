<?php

namespace App\Controllers\Cadastros;

use CodeIgniter\Controller;
use App\Models\Forma_SuprimentoModel;

class Forma_Suprimento extends Controller {

    public function index() {
        $model = new Forma_SuprimentoModel();

        $data = [
            'forma_suprimento'  => $model->getAll(),
            'title' => 'Manutenção de Forma de Suprimento',
            'session' => \Config\Services::session()
        ];

        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/navbar');
        echo view('cadastros/forma_suprimento');
        echo view('template/footer');
    }

    //Grava um novo registro
    public function create() {
        helper('form');

        $model = new Forma_SuprimentoModel();

        $data = [
            'disciplinas'  => $model->getAll(),
            'title' => 'Manutenção de Forma de Suprimento',
            'session' => \Config\Services::session()
        ];

        if (!$data['session']->get('logged_in')) {
            return redirect('login/login');
        }

        $model->save([
            'Nome' => $this->request->getVar('nome'),
        ]);

        $data['forma_suprimento'] = $model->getAll();

        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/navbar');
        echo view('cadastros/forma_suprimento');
        echo view('template/footer');

    }

    //Apaga um registro com Id específico
    public function delete($Id) {

        $data['session'] = \Config\Services::session();

        $model = new Forma_SuprimentoModel();
        $model->delete($Id);

        return redirect('forma_suprimento');

    }

}
