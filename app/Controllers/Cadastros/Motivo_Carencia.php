<?php

namespace App\Controllers\Cadastros;

use CodeIgniter\Controller;
use App\Models\MotivoCarenciaModel;

class MotivoCarencia extends Controller {

    public function index() {
        $model = new MotivoCarenciaModel();

        $data = [
            'motivo_carencia'  => $model->getAll(),
            'title' => 'Manutenção de Motivo - Carência',
            'session' => \Config\Services::session()
        ];

        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/navbar');
        echo view('cadastros/motivo_carencia');
        echo view('template/footer');
    }

    //Grava um novo registro
    public function create() {
        helper('form');

        $model = new MotivoCarenciaModel();

        $data = [
            'motivo_carencia'  => $model->getAll(),
            'title' => 'Manutenção de Motivo - Carência',
            'session' => \Config\Services::session()
        ];

        if (!$data['session']->get('logged_in')) {
            return redirect('login/login');
        }

        $model->save([
            'Motivo' => $this->request->getVar('motivo'),
            'temp' => $this->request->getVar('temp'),
        ]);

        return redirect('motivo_carencia');

    }

    //Apaga um registro com Id específico
    public function delete($Id) {

        $data['session'] = \Config\Services::session();

        $model = new MotivoCarenciaModel();
        $model->delete($Id);

        return redirect('motivo_carencia');

    }

}
