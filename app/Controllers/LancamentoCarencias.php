<?php

namespace App\Controllers;

use App\Models\LancamentoCarenciaModel;
use App\Models\CarenciaModel;
use App\Models\EscolaModel;
use App\Models\DisciplinaModel;
use App\Models\ProfessorModel;
use App\Models\MotivoCarenciaModel;

class LancamentoCarencias extends BaseController
{

    //Exibe todos os registros
    public function index()
    {
        $modelLancamentoCarencia = new LancamentoCarenciaModel();

        $data = [
            'carencias'  => $modelLancamentoCarencia->getCarenciaIndex(),
            'title' => 'Relação de Carências',
            'session' => \Config\Services::session(),
            'styles' => [
                // 'vendor/datatables/dataTables.basestyle.min.css',
                'vendor/datatables/dataTables.bootstrap4.min.css',
            ],
            'scripts' => [
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js',
            ],
        ];

        // echo '<pre>';
        // dd($data['carencias']);
        // exit();

        echo view('layout/header', $data);
        echo view('carencias/index');
        echo view('layout/footer');
    }

    //Exibe registro pelo Id
    public function view($Id = NULL)
    {
        $model = new LancamentoCarenciaModel();

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
    public function store()
    {

        $modelLancamentoCarencia = new lancamentoCarenciaModel();
        $modelCarencia = new CarenciaModel;

        //Validação dos campos
        // $val = $this->validate([
        //     'ue_id' => 'required|min_length[3]|max_length[9]',
        //     'cadastro' => 'required|min_length[8]|max_length[9]',
        //     'disciplina_id'  => 'required'
        // ]);

        $lancamento_carencia = [
            'id' => $this->request->getPost('id'),
            'ue_id' => substr($this->request->getPost('ueid'),  0, 8),
            'disciplina_id' => $this->request->getPost('disciplina_id'),
            'matricula' => $this->request->getPost('matricula'),
            'matutino' => $this->request->getPost('matutino'),
            'vespertino' => $this->request->getPost('vespertino'),
            'noturno' => $this->request->getPost('noturno'),
            'total' => $this->request->getPost('total'),
            'temporaria' => $this->request->getPost('temporaria'),
            'inicio_afastamento' => $this->request->getPost('inicio_afastamento'),
            'termino_afastamento' => $this->request->getPost('termino_afastamento'),
            'motivo_vaga_id' => $this->request->getPost('motivo_vaga_id'),
            'user_id' => 0,
            'tipo_lancamento_id' => 1,
            'lancamento_id' => 1,
            'data_lancamento' => date('Y/m/d H:i:s'),
            'observacao' => $this->request->getPost('observacao'),
        ];
        //Salva o lançamento
        $modelLancamentoCarencia->save($lancamento_carencia);

        // echo ('<pre>');
        // dd($lancamento_carencia);
        // exit('Chegou no metodo store!');

        //Procura na tabela carencia acumulada por disciplina para adicionar ou atualizar
        $findcarencia = $modelCarencia->getCarenciaByDisciplina(
            $lancamento_carencia['ue_id'],
            $lancamento_carencia['disciplina_id'],
            $lancamento_carencia['temporaria']
        );

        if (count($findcarencia) == 0) { //ADD
            // Grava um novo registro de carência
            $carencia = [
                'ue_id' => substr($this->request->getPost('ueid'),  0, 8),
                'disciplina_id' => $this->request->getPost('disciplina_id'),
                'matutino' => $this->request->getPost('matutino'),
                'vespertino' => $this->request->getPost('vespertino'),
                'noturno' => $this->request->getPost('noturno'),
                'total' => $this->request->getPost('total'),
                'temporaria' => $this->request->getPost('temporaria'),
                'atualizacao' => date('Y/m/d H:i:s'),
            ];
            $modelCarencia->save($carencia);
        } elseif (count($findcarencia) == 1) { //UPDATE
            //Atualiza um registro de carência existente
            $carencia = [
                'id' => intval($findcarencia[0]['id']),
                'ueid' => intval(substr($this->request->getPost('ueid'),  0, 8)),
                'disciplina_id' => $this->request->getPost('disciplina_id'),
                'matutino' => intval($this->request->getPost('matutino')) + intval($findcarencia[0]['matutino']),
                'vespertino' => intval($this->request->getPost('vespertino')) + intval($findcarencia[0]['vespertino']),
                'noturno' => intval($this->request->getPost('noturno')) + intval($findcarencia[0]['noturno']),
                'total' => intval($this->request->getPost('total')) + intval($findcarencia[0]['total']),
                'temporaria' => $this->request->getPost('temporaria'),
                'atualizacao' => date('Y-m-d H:i:s'),
            ];
            $modelCarencia->save($carencia);
        } else {
            echo 'ATENÇÃO! ERRO GRAVE NA APLICAÇÃO. ENTRE EM CONTATO COM O DESENVOLVEROR.';
            echo 'Encontrado mais de um registro de carência para o mesma UE/DISCIPLINA/TEMPORARIA.';
            exit('_____________');
        }

        print ("<script type='text/javascript'>Swal.fire({
            title: 'Atenção!',
            text:
                'Carência gravada com sucesso!',
            icon: 'error',
            confirmButtonText: 'Voltar',
        });</script>");

        return redirect()->to(site_url('LancamentoCarencias'));
    }

    //Apaga um registro com Id específico
    public function delete($Id)
    {
        $model = new LancamentoCarenciaModel();
        $model->delete($Id);

        return redirect()->to(site_url('carencias/'));
    }

    //Exibe um registro para edição
    public function edit($id)
    {

        $modelLancamentoCarencia = new LancamentoCarenciaModel();
        $modelMotivoAfastamento = new MotivoCarenciaModel();
        $modelDisciplina = new DisciplinaModel();
        $modelEscola = new EscolaModel();
        $modelProfessor = new ProfessorModel();

        $data = [
            'title' => 'Editar a carência',
            'lancamento_carencia' => $modelLancamentoCarencia->getCarencia($id),
            'motivos' => $modelMotivoAfastamento->getAll(),
            'disciplinas' => $modelDisciplina->getAll()
        ];

        if (empty($data['lancamento_carencia'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Não foi possível encontrar a carência: ' . $id);
        }


        $ue_id = $data['lancamento_carencia']['ue_id'];
        $matricula = $data['lancamento_carencia']['matricula'];

        $escola = $modelEscola->getEscolabyUEId($ue_id);
        $professor = $modelProfessor->getProfessorbyId($matricula);

        $data['ue'] = $escola;
        $data['professor'] = $professor;
        
        // echo '<pre>';
        // dd($data);
        // exit('Parada forçada...');


        echo view('layout/header', $data);
        echo view('carencias/carenciaEdit');
        echo view('layout/footer');
    }

    //Grava alterações em um registro
    public function update($Id)
    {
        $model = new LancamentoCarenciaModel();
        $model->update($Id);
    }

    //Chama a primeira view para informar
    public function real_new()
    {
        helper('form', 'url');

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

    //Exibe formulário de cadastro de carência
    public function new()
    {
        helper('form', 'url');

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

    public function carencia()
    {

        // echo '<pre>';
        // exit('Chegou na inclusãop da carencia');
        helper('form');

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

        echo view('/layout/header', $data);
        echo view('/carencias/carencia');
        echo view('/layout/footer');
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
            $encontrado['escola'] = "";
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
            $encontrado['message'] = 'Matrícula localizada.';
            $encontrado['professor'] = $Professor;
        } else {
            $encontrado['success'] = 'false';
            $encontrado['message'] = 'Não existe professor com a matrícula informada.';
            $encontrado['professor'] = "";
        }

        // echo '<pre>';
        // dd($Professor);
        // exit('ecnotrou...');


        echo json_encode([$encontrado]);
    }
}
