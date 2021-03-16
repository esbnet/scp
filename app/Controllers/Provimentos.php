<?php

namespace App\Controllers;

use App\Models\CarenciaModel;
use App\Models\EscolaModel;
use App\Models\DisciplinaModel;
use App\Models\ProfessorModel;
use App\Models\TipoMovimentacaoModel;
use App\Models\FormaSuprimentoModel;
use App\Models\ProvimentoModel;
use App\Models\ProvimentoProvidoModel;

class Provimentos extends BaseController
{

    //Exibe todos os registros
    public function index()
    {
        $provimentoModel = new ProvimentoModel();

        $data = [
            'title' => 'Relação de Provimentos',
            'styles' => [
                'vendor/datatables/dataTables.bootstrap4.min.css',
            ],
            'scripts' => [
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js',
            ],
            'provimentos'  => $provimentoModel->getProvimentoIndex(),
        ];

        // echo '<pre>';
        // echo dd($data);
        // exit(); 

        echo view('layout/header', $data);
        echo view('provimentos/index');
        echo view('layout/footer');
    }
    //=========================================================================

    //Exibe registro pelo Id
    public function view($Id = NULL)
    {
        $model = new provimentoModel();

        $data['provimentos'] = $model->getprovimento($Id);
        $data['session'] = \Config\Services::session();

        if (empty($data['provimentos'])) {
            var_dump($data);
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Carência não encontrada: ' . $Id);
        }

        echo view('templates/header', $data);
        echo view('provimentos/view');
        echo view('templates/footer');
    }
    //=========================================================================

    //Grava um novo registro
    public function store()
    {

        $modelProvimento = new provimentoModel();
        $modelProvimentoProvido = new ProvimentoProvidoModel();

        $val = $this->validate([
            'ue_id' => 'required|max_length[8]',
            'cadastro' => 'required|min_length[8]|max_length[9]',
            'disciplina_id'  => 'required'
        ]);

        $provimento = [
            'Ue_Id' => substr($this->request->getPost('ueid'),  0, 8),
            'matricula' => $this->request->getPost('matricula_Id'),
            'aula_normal' => $this->request->getPost('AulaNormal'),
            'aula_extra' => $this->request->getPost('AulaExtra'),
            'forma_suprimento_id' => $this->request->getPost('FormaSupId'),
            'TipoMov_Id' => $this->request->getPost('TipoMovId'),
            'Anuencia' => $this->request->getPost('Anuencia'),
            'DataAnuencia' => $this->request->getPost('DataAnuencia'),
            'Assuncao' => $this->request->getPost('Assuncao'),
            'DataAssuncao' => $this->request->getPost('DataAssuncao'),
            'User_Id' => $_SESSION['logged_in'],
            'DataLanc' => date('d/m/Y G:i:s'),
            'Desistencia' => 0,
            'Observacao' => $this->request->getPost('Observacao'),
            'mat_prov' => $this->request->getPost('mat_prov'),
            'vesp_prov' => $this->request->getPost('mat_prov'),
            'not_prov' => $this->request->getPost('mat_prov'),
        ];

        echo '<pre>';
        dd($provimento);
        exit('-------------------------------------------------');


        $modelProvimento->save($provimento);
        $this->db->lastInsertId();

        echo '<pre>';
        dd($provimento);
        exit('-------------------------------------------------');

        return redirect()->to(site_url('provimentos'));

        // echo '<pre>';
        // var_dump($provimento);
        // exit();


        //        if ($this->request->getMethod() === 'post' && $val) {


        //          echo view( base_url('provimentos') );
        //      } else {

        $data = ['title' => 'Erro ao Gravar a carência'];

        echo view('layout/header', $data);
        echo view('provimentos/index');
        echo view('layout/footer');
        //    }
        //=========================================================================
    }

    //Apaga um registro com Id específico
    public function delete($Id)
    {
        $model = new provimentoModel();
        $model->delete($Id);

        return redirect()->to(site_url('carencias/'));
    }
    //=========================================================================

    //Exibe um registro para edição
    public function edit($provimento_id = null)
    {
        $session = \Config\Services::session();

        if ($provimento_id == null) {
            $session->set('error', 'Provimento não informado');
            redirect('provimentos');
        }

        helper(['form', 'url']);

        $modelProvimento = new ProvimentoModel();
        $modelTipo_Movimentacao = new TipoMovimentacaoModel();
        $modelDisciplina = new DisciplinaModel();
        $modelFormaSuprimentoModel = new FormaSuprimentoModel();
        // $modelCarencia = new LancamentoCarenciaModel();
        $modelProvimentoProvido = new ProvimentoProvidoModel();

        $data = [
            'title' => 'Editar o provimento',

            'styles' => [
                'vendor/select2/select2.min.css',
                'vendor/autocomplete/jquery-ui.css',
                'vendor/autocomplete/estilo.css',
            ],
            'scripts' => [
                'vendor/autocomplete/jquery-migrate.js',
                'vendor/calcx/jquery-calcx-sample-2.2.8.min.js',
                'vendor/calcx/carencia.js',
                'vendor/select2/select2.min.js',
                'vendor/select2/app.js',
                'vendor/sweetalert3/sweetalert2.js',
                'vendor/autocomplete/jquery-ui.js',
            ],
            'tipos_movimentacao' => $modelTipo_Movimentacao->getAll(),
            'formas_suprimento' => $modelFormaSuprimentoModel->getAll(),
            'disciplinas' => $modelDisciplina->getAll(),
            'provimento' => $modelProvimento->getProvimento($provimento_id)
            // 'carencia' => $modelCarencia->getUserById($id),

        ];

        $id_provimento = intval($data['provimento']['provimento_id']);
        $data['provimento_provido'] = $modelProvimentoProvido->getProvidoByProvimentoId($id_provimento);

        // echo '<pre>';
        // dd($data);
        // exit('Parada forçada...');

        if (empty($data['provimento'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Não foi possível encontrar o provimento: ' . $provimento_id);
        }

        echo view('layout/header', $data);
        echo view('provimentos/edit');
        echo view('layout/footer');
    }

    //Grava alterações em um registro
    public function update($Id)
    {
        $model = new ProvimentoModel();
        $model->update($Id);
    }
    //=========================================================================


    //Chama a primeira view para informar
    public function real_new()
    {
        helper('form', 'url');

        $data = [
            'title' => 'Incluir Carência Real',
        ];

        if (session()->has('erro')) {
            $data['erro'] = session('erro');
        }

        echo view('layout/header', $data);
        echo view('carencias/carencia_new_escola');
        echo view('layout/footer');
    }
    //=========================================================================

    public function provimento()
    {
        $modelDisciplina = new DisciplinaModel();
        $modelFormaSuprimento = new FormaSuprimentoModel();
        $modelTipo_Movimentacao = new TipoMovimentacaoModel();

        $data = [
            'title' => 'Inclusão de provimento',
            'disciplinas' => $modelDisciplina->getAll(),
            'formas_suprimento' => $modelFormaSuprimento->getAll(),
            'tipos_movimentacao' => $modelTipo_Movimentacao->getAll(),

            // 'styles' => [
            //     'vendor/datatables/dataTables.bootstrap4.min.css',
            // ],
            // 'scripts' => [
            //     'vendor/datatables/jquery.dataTables.min.js',
            //     'vendor/datatables/dataTables.bootstrap4.min.js',
            //     'vendor/datatables/app.js',
            // ],
        ];

        echo view('layout/header', $data);
        echo view('provimentos/provimento');
        echo view('layout/footer');
    }
    //=========================================================================

    public function professorView()
    {
    }
    //=========================================================================

    public function carenciaView()
    {
    }
    //=========================================================================

    //Pesquisa escola para incluir carência
    public function pesquisaEscola($codigoEscola)
    {
        $modelEscola = new EscolaModel();
        $Ue = $modelEscola->getEscolabyUEId($codigoEscola);

        // echo '<pre>';
        // print_r($Ue);
        // exit('Localizou a escola');

        //Verifica se a escola informada para prover existe
        if ($Ue) {
            $encontrado['success'] = 'true';
            $encontrado['message'] = 'Código informado localizado';
            $encontrado['escola'] = $Ue;
        } else { //Se a escola informada não existir no banco de dados 
            $encontrado['success'] = 'false';
            $encontrado['message'] = 'O código informado não foi encontrado';
            $encontrado['escola'] = "";
        }

        echo json_encode([$encontrado]);
    }
    //=========================================================================

    //Pesquisa escola para incluir carência
    public function pesquisaEscolaCarencia($codigoEscola)
    {
        $modelEscola = new EscolaModel();
        $Ue = $modelEscola->getEscolabyUEId($codigoEscola);

        // echo '<pre>';
        // print_r($Ue);
        // exit('Localizou a escola');

        //Verifica se a escola informada para prover existe
        if ($Ue) {
            $encontrado['success'] = 'true';
            $encontrado['message'] = 'Código informado localizado';
            $encontrado['escola'] = $Ue;

            //Recuperar carencias para a escola caso houver
            $modelCarencia = new CarenciaModel();
            $Carencias = $modelCarencia->getCarenciaUE($codigoEscola);

            // echo ('<pre>');
            // dd($Carencias);
            // exit('cacrencias encontradas');

            if ($Carencias) {
                $encontrado['carencia_success'] = 'true';
                $encontrado['carencia_message'] = 'Carência localizada.';
                $encontrado['carencia'] = $Carencias;
            } else {
                $encontrado['carencia_success'] = 'false';
                $encontrado['carencia_message'] = 'Não existe carência para a escolar informada.';
                $encontrado['carencia'] = "";
            }
        } else { //Se a escola informada não existir no banco de dados 
            $encontrado['success'] = 'false';
            $encontrado['message'] = 'O código informado não foi encontrado';
            $encontrado['escola'] = "";
        }

        echo json_encode([$encontrado]);
    }
    //=========================================================================

    public function pesquisaEscolaold()
    {

        $ueid = $this->request->getVar('ueid');

        //Verifica se houve submissão via POST
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(site_url('/provimentos/provimento'));
        } else {

            $modelEscola = new EscolaModel();
            $Ue = $modelEscola->getEscolabyUEId($ueid);

            if (empty($Ue)) {
                return redirect()->back()->with('erro', 'Não encontrado escola com o código: ' . $ueid . '. Tente novamente.')->withInput();
            }

            $val = $this->validate([
                'ueid' => 'required|min_length[8]|max_length[9]|numeric'
            ]);

            $data = [
                'title' => 'Incluir Carência Real',
                'ue' => $Ue
            ];

            if (!$val) {
                return redirect()->back()->with('erro', $this->validator->listErrors())->withInput();
            } else {
                // exit('Sucesso...');
                echo view('layout/header', $data);
                echo view('carencias/professorView');
                echo view('layout/footer');
            };
        }
    }
    //=========================================================================

    //Pesquisa escola para incluir carência
    public function pesquisaProfessor()
    {
        $matricula = $this->request->getVar('matricula');

        //Verifica se houve submissão via POST
        if (($this->request->getMethod() !== 'post')) {
            exit('chegou novamente no post');
            return redirect()->to(site_url('carencias/pesquisaEscola'));
        } else {

            $modelProfessor = new ProfessorModel();
            $professor = $modelProfessor->getProfessorbyId($matricula);

            $ue = [
                'UeID' => $_POST['ueid'],
                'OU' => $_POST['ou'],
                'Ue' => $_POST['ue'],
            ];

            $data = [
                'title' => 'Incluir Carência Real',
                'ue' => $ue
            ];

            if (empty($professor)) {

                $ue = ['erro', 'Não encontrado professor com a matrícula: ' . $matricula . '. Tente novamente.'];

                // print_r($data);
                // exit('professor vazio');

                echo view('layout/header', $data);
                echo view('carencias/carencia_new_professor');
                echo view('layout/footer');
            }

            $modelDisciplina = new DisciplinaModel();
            $modeltipos_movimentacaotivo = new TipoMovimentacaoModel();

            //Se encontrar a escola, retornar os campos para o início do form
            if (is_null($professor) || empty($professor)) {
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Professor não encontrada para o ID: ' . $professor);
            } else {

                $data = [
                    'validation' => \Config\Services::validation(),
                    'title' => 'Incluir Carência Real',
                    'professor' => $professor,
                    'ue' => $ue,
                    'disciplinas' => $modelDisciplina->getAll(),
                    'tipos_movimentacao' => $modeltipos_movimentacaotivo->getAll(),
                ];

                helper('from', 'url');

                // exit();

                echo view('layout/header', $data);
                echo view('carencias/carenciaView');
                echo view('layout/footer');
            }
        }
    }
    //=========================================================================

}
