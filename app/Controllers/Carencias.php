<?php

namespace App\Controllers;

use App\Models\NteModel;
use App\Models\CarenciaModel;
use App\Models\EscolaModel;
use App\Models\DisciplinaModel;
use App\Models\ProfessorModel;
use App\Models\MotivoCarenciaModel;
use App\Models\UserModel;

class Carencias extends BaseController
{

    //Exibe todos os registros
    public function index_old()
    {
        helper(['form', 'url']);

        $modelLancamentoCarencia = new CarenciaModel();

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

    //Exibe tela para inserção de carência
    public function carencia()
    {

        $modelDisciplina = new DisciplinaModel();
        $modelMotivo = new MotivoCarenciaModel();

        $data = [
            'title' => 'Incluir Carência',
            'disciplinas' => $modelDisciplina->getAll(),
            'motivos' => $modelMotivo->getAll(),
            'tipo_carencia' => 0
        ];

        if (session()->has('erro')) {
            $data['erro'] = session('erro');
        }

        echo view('/layout/header', $data);
        echo view('/carencias/carencia');
        echo view('/layout/footer');
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
    public function add()
    {

        $modelLancamentoCarencia = new CarenciaModel();

        $lancamento_carencia = [
            'id' => $this->request->getPost('id'),
            'ue_id' => substr($this->request->getPost('ueid'),  0, 8),
            'disciplina_id' => $this->request->getPost('disciplina_id'),
            'matricula' => $this->request->getPost('matricula'),
            'matutino' => $this->request->getPost('matutino'),
            'vespertino' => $this->request->getPost('vespertino'),
            'noturno' => $this->request->getPost('noturno'),
            'total' => $this->request->getPost('total'),
            'temporaria' =>  $this->request->getPost('temporaria'),
            'inicio_afastamento' => $this->request->getPost('inicio_afastamento'),
            'termino_afastamento' => $this->request->getPost('termino_afastamento'),
            'motivo_vaga_id' => $this->request->getPost('motivo_vaga_id'),
            'user_id' => $this->request->getPost('user'),
            'tipo_lancamento_id' => 2, //Update
            'lancamento_id' => 0, //registro atual
            'data_lancamento' => date('Y/m/d H:i:s'),
            'observacao' => $this->request->getPost('observacao'),
            'matutino_original' => $this->request->getPost('matutino'),
            'vespertino_original' => $this->request->getPost('vespertino'),
            'noturno_original' => $this->request->getPost('noturno'),
            'total_original' => $this->request->getPost('total'),
        ];

        // echo ('<pre>');
        // dd($lancamento_carencia['ue_id']);
        // exit('Update!');

        $modelLancamentoCarencia->insert($lancamento_carencia);

        $_SESSION ['msg'] = "<div id='message' class='alert alert-success alert-dismissible fade show'  role='alert'>Carência gravada com sucesso!</div>";
        header("Locarion: carencias/carencia");

        return redirect()->to(site_url('Carencias/carencia'));
    }

    //Exibe um registro para edição
    public function edit($id)
    {

        $modelLancamentoCarencia = new CarenciaModel();
        $modelMotivoAfastamento = new MotivoCarenciaModel();
        $modelDisciplina = new DisciplinaModel();
        $modelEscola = new EscolaModel();
        $modelProfessor = new ProfessorModel();
        $modelUser = new UserModel();

        $data = [
            'title' => 'Editar Carência',
            'carencia' => $modelLancamentoCarencia->getCarencia($id),
            'motivos' => $modelMotivoAfastamento->getAll(),
            'disciplinas' => $modelDisciplina->getAll()
        ];

        $data['user'] =  $modelUser->getUserById($data['carencia']['user_id']);
        
        if (empty($data['carencia'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Não foi possível encontrar a carência: ' . $id);
        }
        
        $ue_id = $data['carencia']['ue_id'];
        $matricula = $data['carencia']['matricula'];
        
        $escola = $modelEscola->getEscolabyUEId($ue_id);
        $professor = $modelProfessor->getProfessorByMatricula($matricula);

        $data['ue'] = $escola;
        $data['professor'] = $professor;

        // echo '<pre>';
        // dd($data);
        // exit('Parada forçada...');

        echo view('layout/header', $data);

        //Impede a edição da carência para grupos que não seja CPG
        // if (in_groups(3, 5)) {
            // echo '<pre>No grupo';
            // dd(in_groups(3, 5));
            echo view('carencias/carenciaEdit');
        // } else {
            // echo '<pre>Fora do grupo';
            // dd(in_groups(3, 5));
            // echo view('carencias/carenciaView');
        // }
        echo view('layout/footer');
    }

    //Grava um novo registro
    public function update()
    {

        $modelLancamentoCarencia = new CarenciaModel();

        $lancamento_carencia = [
            'id' => $this->request->getPost('id'),
            'ue_id' => substr($this->request->getPost('ueid'),  0, 8),
            'disciplina_id' => $this->request->getPost('disciplina_id'),
            'matricula' => $this->request->getPost('matricula'),
            'matutino' => $this->request->getPost('matutino'),
            'vespertino' => $this->request->getPost('vespertino'),
            'noturno' => $this->request->getPost('noturno'),
            'total' => $this->request->getPost('total'),
            'temporaria' =>  $this->request->getPost('temporaria'),
            'inicio_afastamento' => $this->request->getPost('inicio_afastamento'),
            'termino_afastamento' => $this->request->getPost('termino_afastamento'),
            'motivo_vaga_id' => $this->request->getPost('motivo_vaga_id'),
            'user_id' => $this->request->getPost('user_id'),
            'tipo_lancamento_id' => 2, //Update
            'lancamento_id' => 0, //registro atual
            'data_lancamento' => date('Y/m/d H:i:s'),
            'observacao' => $this->request->getPost('observacao'),
        ];

        // echo ('<pre>');
        // dd($lancamento_carencia);
        // exit('Update!');

        $modelLancamentoCarencia->save($lancamento_carencia);

        $_SESSION ['msg'] = "<div id='message' class='alert alert-success alert-dismissible fade show'  role='alert'>Carência atualizada com sucesso!</div>";
        header("Locarion: Carencias");

        return redirect()->to(site_url('Carencias'));
    }

    //Apaga um registro com Id específico
    public function delete($Id)
    {
        $model = new CarenciaModel();
        $model->delete($Id);

        $_SESSION ['msg'] = "<div id='message' class='alert alert-success alert-dismissible fade show'  role='alert'>Carência <strong>EXCLUIDA</strong> com sucesso!</div>";
        header("Locarion: Carencias");

        return redirect()->to(site_url('/Carencias'));
    }

    //Grava alterações em um registro
    public function update_old($Id)
    {

        $modelLancamentoCarencia = new CarenciaModel();
        $modelCarencia = new CarenciaModel();

        $lancamento = [
            'ue_id' => substr($this->request->getPost('ueid'),  0, 8),
            'matricula_id' => $this->request->getPost('matricula_Id'),
            'aula_normal' => is_null($this->request->getPost('AulaNormal')) ? 0 : -1,
            'aula_extra' => is_null($this->request->getPost('AulaExtra')) ? 0 : -1,
            'forma_suprimento_id' => $this->request->getPost('FormaSupId'),
            'tipo_movimentacao_id' => $this->request->getPost('TipoMovId'),
            'anuencia' => is_null($this->request->getPost('Anuencia')) ? 0 : -1,
            'data_anuencia' => is_null($this->request->getPost('DataAnuencia')) ? '00-00-0000' : $this->request->getPost('DataAnuencia'),
            'assuncao' => is_null($this->request->getPost('Assuncao')) ? 0 : -1,
            'data_assuncao' => is_null($this->request->getPost('DataAssuncao')) ? '00-00-0000' : $this->request->getPost('DataAssuncao'),
            'user_id' => $_SESSION['logged_in'],
            'data_lancamento' => date('d/m/Y G:i:s'),
            'desistencia' => 0,
            'Observacao' => $this->request->getPost('Observacao'),
        ];

        //Salva o cabeçalho do provimento
        // $modelProvimento->save($provimento);

        $modelLancamentoCarencia->update($Id);
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

        echo json_encode([$encontrado]);
    }


    public function index()
    {

        helper(['form', 'url']);

        $nteModel = new NteModel();
        $disciplinaModel = new DisciplinaModel();

        $data = [
            'title' => 'Pesquisa de Carências',
            'ntes' => $nteModel->getAll(),
            'disciplinas' => $disciplinaModel->getAll(),
            'carencias' => [],
            'areas' => $disciplinaModel->getAreas(),
            'session' => \Config\Services::session(),
            'styles' => [
                'vendor/datatables/dataTables.bootstrap4.min.css',
                // 'vendor/datatables/dataTables.basestyle.min.css',
                'https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-html5-1.7.0/datatables.min.css',
                'https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css',
                'https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css',
                'https://cdn.datatables.net/fixedcolumns/3.3.2/css/fixedColumns.dataTables.min.css',

            ],
            'scripts' => [

                'https://code.jquery.com/jquery-3.5.1.js',
                'https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js',
                'https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js',
                'https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js',
                'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js',
                'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js',
                'https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js',
                // 'https://cdn.datatables.net/fixedcolumns/3.3.2/js/dataTables.fixedColumns.min.js',

                // 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js',
                // 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js',
                // 'https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-html5-1.7.0/datatables.min.js',

                // 'vendor/datatables/jquery.dataTables.min.js',
                //  'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js',
            ],
        ];

        // echo '<pre>';
        // dd($data);
        // exit('ecnotrou...');

        echo view('layout/header', $data);
        echo view('carencias/index');
        echo view('layout/footer');
    }


    //Pega os dados dos campos, cria o critério e aplica na consulta no model
    public function consulta_carencia()
    {

        //Pega parâmetros enviados pro Ajax
        $campos = [
            'nte' => $_POST['nte'],
            'municipio' => $_POST['municipio'],
            'ue_id' => $_POST['ue_id'],
            'ue' => $_POST['ue'],
            'tipo_carencia' => $_POST['tipo_carencia'],
            'disciplina' => $_POST['disciplina'],
            'area_formacao' => $_POST['area_formacao'],
        ];

        $tipo_consulta = $_POST['tipo_consulta'];

        $modelCarencia = new CarenciaModel();

        if ($tipo_consulta == "real") {
            $carencias = $modelCarencia->getCarenciaRealConsulta($campos);
        } else {
            $carencias = $modelCarencia->getCarenciaDetalhadaConsulta($campos);
        }

        if ($carencias) {
            foreach ($carencias as $carencia) {

                $id = $carencia['carencia_id'];
                $edit = "<a title='Exibe o registro para edição' class='btn btn-light btn-circle btn-sm' style='color: #0D47A1' href='/Carencias/edit/{$id}'><i class='fas fa-edit'></i></a>";

                $result[] = [
                    $edit,
                    $carencia['nte_nome'],
                    $carencia['municipio'],
                    $carencia['ue_id'],
                    $carencia['escola_nome'],
                    $carencia['disciplina_nome'],
                    $carencia['matutino'],
                    $carencia['vespertino'],
                    $carencia['noturno'],
                    $carencia['total'],
                    $carencia['temporaria'],
                    $carencia['motivo'],
                    $carencia['inicio_afastamento'],
                    $carencia['termino_afastamento']
                ];
            }
        } else {
            $result = "";
        }

        $carencias = ['dataSet' => $result];

        echo json_encode($result);
    }

    //Pesquisa escola para incluir carência
    public function motivoCarenciaTipo($tipo)
    {

        $modelMotivo = new MotivoCarenciaModel();
        $motivos = $modelMotivo->getAllByTipoCarencia($tipo);

        if ($motivos) {
            $encontrado['success'] = 'true';
            $encontrado['message'] = 'Motivos por tipo informado localizado';
            $encontrado['motivos'] = $motivos;
        } else {
            $encontrado['success'] = 'false';
            $encontrado['message'] = 'Motivos por tio informado não foi encontrado';
            $encontrado['motivos'] = "";
        }

        echo json_encode([$encontrado]);
    }

}
