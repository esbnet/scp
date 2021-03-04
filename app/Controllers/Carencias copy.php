<?php

namespace App\Controllers;

use App\Models\CarenciaModel;
use App\Models\DisciplinaModel;
use App\Models\MotivoAfastamentoModel;

use CodeIgniter\Controller;

class Carencias extends Controller
{

    //Exibe todos os registros
    public function index()
    {
        $model = new CarenciaModel();

        $data = [
            'carencias'  => $model->getCarencia(),
            'title' => 'Lista de Carências',
            'session' => \Config\Services::session(),
            'styles' => [
                'vendor/datatables/dataTables.bootstrap4.min.css',
            ],
            'scripts' => [
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js',
            ],

        ];

        echo view('layout/header', $data);
        echo view('carencias/index');
        echo view('layout/footer');
    }

    //Exibe registro pelo Id
    public function view($Id = NULL)
    {
        $model = new CarenciaModel();

        $data['carencias'] = $model->getCarencia($Id);
        $data['session'] = \Config\Services::session();

        if (empty($data['carencias'])) {
            var_dump($data);
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Carência não encontrada: ' . $Id);
        }

        echo view('templates/header', $data);
        echo view('carencias/view', $data);
        echo view('templates/footer', $data);
    }

    //Grava um novo registro
    public function create()
    {

        $data['session'] = \Config\Services::session();

        if (!$data['session']->get('logged_in')) {
            return redirect('login/login');
        }

        $model = new CarenciaModel();

        if ($this->request->getMethod() === 'post' && $this->validate([
            'UEId' => 'required|min_length[3]|max_length[9]',
            'Matricula' => 'required|min_length[8]|max_length[9]',
            'DisciplinaId'  => 'required'
        ])) {
            $model->save([
                'UEid' => $this->request->getPost('UEid'),
                'DisciplinaId' => $this->request->getPost('DisciplinaId'),
                'Matricula' => $this->request->getPost('Matricula'),
                'Nome' => $this->request->getPost('Nome'),
                'Mat' => $this->request->getPost('Mat'),
                'Vestp' => $this->request->getPost('Vestp'),
                'Not' => $this->request->getPost('Not'),
                'Total' => $this->request->getPost('Total'),
            ]);

            echo view('carencias/success');
        } else {
            echo view('templates/header', ['title' => 'Registre uma nova carência']);
            echo view('carencias/carencia_create');
            echo view('templates/footer');
        }
    }

    //Apaga um registro com Id específico
    public function delete($Id)
    {
        $data['session'] = \Config\Services::session();

        $model = new CarenciaModel();
        $model->delete($Id);
    }

    //Exibe um registro para edição
    public function edit($id)
    {
        helper(['form', 'url']);

        $modelCarencia = new CarenciaModel();
        $modelMotivoAfastamento = new MotivoAfastamentoModel();
        $modelDisciplina = new DisciplinaModel();
        

        $data = [
            'title' => 'Editar userário',
            'carencia' => $modelCarencia->getUserById($id),
            'motivo_afastamento' => $modelMotivoAfastamento -> getAll(),
            'disciplina' => $modelDisciplina -> getAll()
        ];

        // echo '<pre>';
        // var_dump($this->validate([]));        
        // exit('Parada forçada...');

        if (empty($data['carencia'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Não foi possível encontrar o usuário: ' . $id);
        }

        echo view('layout/header', $data);
        echo view('users/edit');
        echo view('layout/footer');
    }

    //Grava alterações em um registro
    public function update($Id)
    {
        $model = new CarenciaModel();
        $model->update($Id);
    }

    public function real_new()
    {

        helper(['form', 'url']);

        $data['session'] = \Config\Services::session();
        $data['title'] = 'Carência Real';

        // if (!$data['session']->get('logged_in')) {
        //     return redirect('login');
        // }

        echo view('layout/header', $data);
        echo view('carencias/carencia_edit');
        echo view('layout/footer');
    }

    public function logout()
    {
        $data['session'] = \Config\Services::session();
        $data['session']->destroy();
        return redirect('login');
    }
}
