<?php

namespace App\Controllers\Cadastros;

use CodeIgniter\Controller;
use App\Models\Motivo_ProvimentoModel;

class Motivo_Provimento extends Controller {

    public function index() {
        $model = new Motivo_ProvimentoModel();

        $data = [
            'motivo_provimento'  => $model->getAll(),
            'title' => 'Manutenção de Motivo - Provimento',
            'session' => \Config\Services::session()
        ];

        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/navbar');
        echo view('cadastros/motivo_provimento');
        echo view('template/footer');
    }

    //Grava um novo registro
    public function create() {
        helper('form');

        $model = new Motivo_ProvimentoModel();

        $data = [
            'motivo_provimento'  => $model->getAll(),
            'title' => 'Manutenção de Motivo - Provimento',
            'session' => \Config\Services::session()
        ];

        if (!$data['session']->get('logged_in')) {
            return redirect('login/login');
        }

        $model->save([
            'Motivo' => $this->request->getVar('motivo'),
            'temp' => $this->request->getVar('temp'),
        ]);

        return redirect('motivo_provimento');

    }

    //Apaga um registro com Id específico
    public function delete($Id) {

        $data['session'] = \Config\Services::session();

        $model = new Motivo_ProvimentoModel();
        $model->delete($Id);

        return redirect('motivo_provimento');

    }

}
