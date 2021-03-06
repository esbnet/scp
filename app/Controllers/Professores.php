<?php

namespace App\Controllers\Cadastros;

use CodeIgniter\Controller;
use App\Models\ProfessorModel;

class Professores extends Controller {

    public function index() {

        $model = new ProfessorModel();

        $data = [
            'professores'  => $model->getAll(),
            'title' => 'Manutenção de Professores',
            'session' => \Config\Services::session()
        ];

        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/navbar');
        echo view('professor/professor');
        echo view('template/footer');
    }

    //Grava um novo registro
    public function create() {

        helper('form');

        $model = new ProfessorModel();

        $data = [
            'disciplinas'  => $model->getAll(),
            'title' => 'Manutenção de Professores',
            'session' => \Config\Services::session()
        ];

        if (!$data['session']->get('logged_in')) {
            return redirect('login/login');
        }

        $model->save([
            'Nome' => $this->request->getVar('nome'),
        ]);

        $data['disciplinas'] = $model->getAll();

        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/navbar');
        echo view('professor/professor');
        echo view('template/footer');

    }

    //Apaga um registro com Id específico
    public function delete($Id) {

        $data['session'] = \Config\Services::session();

        $model = new ProfessorModel();
        $model->delete($Id);

        return redirect('professor');

    }

}
