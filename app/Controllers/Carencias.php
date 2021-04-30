<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\EscolaModel;
use App\Models\LancamentoCarenciaModel;
use App\Models\DisciplinaModel;
use App\Models\MotivoCarenciaModel;
use App\Models\ProfessorModel;

class Carencias extends Controller
{

    //Exibe todos os registros
    public function index()
    {
        $carenciaModel = new CarenciaModel();

        $data = [
            'carencias'  => $carenciaModel->paginate(5),
            'title' => 'Relação de Carências',
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

        // echo '<pre>';
        // print_r($data['carencias']);
        // exit('=============================');

        echo view('layout/header', $data);
        echo view('carencias/index');
        echo view('layout/footer');
    }    //Exibe todos os registros


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
    // public function store()
    // {

    //     $model = new CarenciaModel();

    //     //Critérios de validação
    //     $val = $this->validate([
    //         'ue_id' => 'required|min_length[3]|max_length[9]',
    //         'cadastro' => 'required|min_length[8]|max_length[9]',
    //         'disciplina_id'  => 'required'
    //     ]);

    //     $carencia = [
    //         'ue_id' => substr($this->request->getPost('ue_id'),  0, 8),
    //         'disciplina_id' => $this->request->getPost('disciplina_id'),
    //         'matutino' => $this->request->getPost('matutino'),
    //         'vespertino' => $this->request->getPost('vespertino'),
    //         'noturno' => $this->request->getPost('noturno'),
    //         'total' => $this->request->getPost('total'),
    //         'teporario' => 'Não',
    //         'atualizacao' => date('d/m/y h:m:s'),
    //     ];

    //     if ($model->save($carencia) == true) {
    //         $encontrado['success'] = 'true';
    //         $encontrado['message'] = 'Código informado localizado';
    //     } else {
    //         $encontrado['success'] = 'false';
    //         $encontrado['message'] = 'O código informado não foi encontrado';
    //     };

    //     echo json_encode([$encontrado]);

    //     // return redirect()->to(site_url('carencias'));

    //     // echo '<pre>';
    //     // var_dump($carencia);
    //     // exit();

    // }

    //Apaga um registro com Id específico
    public function delete($Id)
    {
        $model = new CarenciaModel();
        $model->delete($Id);

        return redirect()->to(site_url('carencias/'));
    }

    //Grava alterações em um registro
    public function update($Id)
    {
        $model = new CarenciaModel();
        $model->update($Id);
    }

    //Exibe formulário de cadastro de carência
    public function new()
    {
        $data = [
            'title' => 'Incluir Carência',
        ];

        if (session()->has('erro')) {
            $data['erro'] = session('erro');
        }

        echo view('layout/header', $data);
        echo view('carencias/carencia_new_escola');
        echo view('layout/footer');
    }


    public function nova_carencia_real()
    {
        helper('form', 'url');

        $modelDisciplina = new DisciplinaModel();
        $modelMotivo = new MotivoCarenciaModel();

        $data = [
            'title' => 'Incluir Carência',
            'disciplinas' => $modelDisciplina->getAll(),
            'motivos' => $modelMotivo->getAll()
        ];

        if (session()->has('erro')) {
            $data['erro'] = session('erro');
        }

        echo view('layout/header', $data);
        echo view('carencias/carencia');
        echo view('layout/footer');
    }

    public function professorView()
    {
    }

    public function carenciaView()
    {
    }

    //Pesquisa escola para incluir carência
    public function pesquisaEscola($codigoEscola)
    {

        $modelEscola = new EscolaModel();
        $Ue = $modelEscola->getEscolabyUEId($codigoEscola);

        if ($Ue) {
            $encontrado['success'] = 'true';
            $encontrado['message'] = 'Código informado localizado';
            $encontrado['escola'] = $Ue;
        } else {
            $encontrado['success'] = 'false';
            $encontrado['message'] = 'O código informado não foi encontrado';
        }

        echo json_encode([$encontrado]);
    }


    //Pesquisa professor para incluir carência
    public function pesquisaProfessor($codigoProfessor)
    {

        $modelProfessor = new ProfessorModel();
        $Professor = $modelProfessor->getProfessorbyId($codigoProfessor);

        if ($Professor) {
            $encontrado['success'] = 'true';
            $encontrado['message'] = 'Código informado localizado';
            $encontrado['professor'] = $Professor;
        } else {
            $encontrado['success'] = 'false';
            $encontrado['message'] = 'Matrícula informada não encontrada';
        }

        echo json_encode([$encontrado]);
    }

    //Pesquisa carências para uma determinada escola
    public function  pesquisaCarenciasByUeid($ueid)
    {

        $modelCarencia = new CarenciaModel();
        $Carencias = $modelCarencia->getCarenciaUE($ueid);

        if ($Carencias) {
            $encontrado['success'] = 'true';
            $encontrado['message'] = 'Código informado localizado';
            $encontrado['carencias'] = $Carencias;
        } else {
            $encontrado['success'] = 'false';
            $encontrado['message'] = 'Código informada não encontrada';
            $encontrado['carencias'] = "";
        }

        echo ('<pre>');
        dd($encontrado['carencias']);
        exit('cacrencias encontradas');

        echo json_encode([$encontrado]);
    }

}
