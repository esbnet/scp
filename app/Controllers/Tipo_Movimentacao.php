<?php

namespace App\Controllers\Cadastros;

use CodeIgniter\Controller;
use App\Models\Tipo_MovimentacaoModel;

class Tipo_Movimentacao extends Controller {

    public function index() {
        $model = new Tipo_MovimentacaoModel();

        $data = [
            'tipo_movimentacao'  => $model->getAll(),
            'title' => 'Manutenção de Tipo Movimentação',
            'session' => \Config\Services::session()
        ];

        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/navbar');
        echo view('cadastros/tipo_movimentacao');
        echo view('template/footer');
    }

    //Grava um novo registro
    public function create() {
        helper('form');

        $model = new Tipo_MovimentacaoModel();

        $data = [
            'tipo_movimentacao'  => $model->getAll(),
            'title' => 'Manutenção de Tipo Movimentação',
            'session' => \Config\Services::session()
        ];

        if (!$data['session']->get('logged_in')) {
            return redirect('login/login');
        }

        $model->save([
            'Nome' => $this->request->getVar('nome'),
        ]);

        $data['tipo_movimentacao'] = $model->getAll();

        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/navbar');
        echo view('cadastros/tipo_movimentacao');
        echo view('template/footer');

    }

    //Apaga um registro com Id específico
    public function delete($Id) {

        $data['session'] = \Config\Services::session();

        $model = new Tipo_MovimentacaoModel();
        $model->delete($Id);

        return redirect('tipo_movimentacao');

    }

}
