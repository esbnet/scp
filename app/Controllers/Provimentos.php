<?php

namespace App\Controllers;

use App\Models\NteModel;
use App\Models\CarenciaModel;
use App\Models\EscolaModel;
use App\Models\DisciplinaModel;
use App\Models\ProfessorModel;
use App\Models\TipoMovimentacaoModel;
use App\Models\FormaSuprimentoModel;
use App\Models\ProvimentoModel;
use App\Models\ProvimentoProvidoModel;
use App\Models\UserModel;

class Provimentos extends BaseController
{

    //Exibe todos os registros
    public function index_old()
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

    //Grava um novo registro
    public function store()
    {

        $modelProvimento = new provimentoModel();
        $modelCarencia = new CarenciaModel();
        $modelProvimentoProvido = new ProvimentoProvidoModel();

        //Pega os dados do formulário e passa para os campos
        $provimento = [
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
            'user_id' => user()->id,
            'data_lancamento' => date('Y/m/d H:i:s'),
            'desistencia' => 0,
            'Observacao' => $this->request->getPost('Observacao'),
        ];

        //Salva o cabeçalho do provimento
        $modelProvimento->save($provimento);

        //Salva as disciplinas providas
        $provimento_id = $modelProvimento->getInsertID();

        //Pega os dados da tabela com os provimentos
        $provido_disciplina_id = $this->request->getPost('disciplina_id[]');
        $provido_temporaria = $this->request->getPost('temporaria[]');
        $provido_mat_prov = $this->request->getPost('mat_prov[]');
        $provido_vesp_prov = $this->request->getPost('vesp_prov[]');
        $provido_not_prov = $this->request->getPost('not_prov[]');
        $carencia_id = $this->request->getPost('carencia_id[]');
    
        //pega o número de linhas na tabela
        $tamanho_array = count($provido_not_prov);

        
        for ($i = 0; $i < ($tamanho_array); $i++) {
            
            //soma os três novos peíodos da carência
            $totalProvidoDisciplina = intval($provido_mat_prov[$i]) + intval($provido_vesp_prov[$i]) + intval($provido_not_prov[$i]);            

            //Se foi informado algum valor a prover, o sistema faz o abatimento e atualiza a carência 
            if ($totalProvidoDisciplina > 0) {
                
                $carencia = $modelCarencia->getCarencia($carencia_id[$i]);
                // dd($carencia);

                //Valores antigos para salvar no provimento
                $mat_old = $carencia['matutino'];
                $vesp_old = $carencia['vespertino'];
                $not_old = $carencia['noturno'];
                $total_old = $carencia['total'];
                $carencia_old_id = $carencia['id'];

                //Calcula as horas que restaram na carência
                $carencia['matutino'] = $carencia['matutino'] - $provido_mat_prov[$i];
                $carencia['vespertino'] = $carencia['vespertino'] - $provido_vesp_prov[$i];
                $carencia['noturno'] = $carencia['noturno'] - $provido_not_prov[$i];
                $carencia['total'] = $carencia['total'] - $totalProvidoDisciplina;

                
                $carencia['user_id'] = user()->id;
                $carencia['tipo_lancamento_id'] = 3;
                $carencia['lancamento_id'] = $provimento_id;
                $carencia['data_lancamento'] = date('Y/m/d H:i:s');
                
                $carencia['houve_provimento'] = 1;
                // echo '<pre>';
                // dd($carencia[0]);
                // exit('-------------------------------------------------');
                
                //Grava horas restantes na carência
                $modelCarencia->save($carencia);

                //Monta registro do provimento
                $provido = [
                    'provimento_id' => $provimento_id,
                    'disciplina_id' => $provido_disciplina_id[$i],
                    'mat' => $provido_mat_prov[$i],
                    'vesp' => $provido_vesp_prov[$i],
                    'not' => $provido_not_prov[$i],
                    'total' => $totalProvidoDisciplina,
                    'mat_old' => $mat_old,
                    'vesp_old' => $vesp_old,
                    'not_old' => $not_old,
                    'total_old' => $total_old,
                    'carencia_old_id' => $carencia_old_id,
                ];

                //Grava disciplina e horas providas relacionada ao provimento
                $modelProvimentoProvido->insert($provido);

            }
        }

        $_SESSION ['msg'] = "<div id='message' class='alert alert-success alert-dismissible fade show'  role='alert'>Provimento <strong>gravado</strong> com sucesso!</div>";
        header("Locarion: carencias/carencia");

        return redirect()->to(site_url('provimentos'));

        //=========================================================================
    }

    //Grava um registro editado
    public function save_edit()
    {

        $modelProvimento = new provimentoModel();

        $provimento = [
            'id' => $this->request->getPost('provimento_id'),
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
            'user_id' => user()->id,
            'data_lancamento' => date('Y/m/d H:i:s'),
            'desistencia' => 0,
            'observacao' => $this->request->getPost('Observacao'),
        ];

        // echo '<pre>';
        // dd($provimento);
        // exit('-------------------------------------------------');

        //Salva o cabeçalho do provimento
        $modelProvimento->update($provimento['id'], $provimento);

        $_SESSION ['msg'] = "<div id='message' class='alert alert-success alert-dismissible fade show'  role='alert'>Provimento <strong>atualizado</strong> com sucesso!</div>";
        header("Locarion: carencias/carencia");

        return redirect()->to(site_url('provimentos'));

        //=========================================================================
    }

    //Apaga um registro com Id específico
    public function delete($id = NULL)
    {

        $modelProvimento = new provimentoModel();
        $modelCarencia = new CarenciaModel();
        $modelProvimentoProvido = new ProvimentoProvidoModel();

        //Pega todos as disciplinas relativas ao provimento
        $disciplinas_providos = [$modelProvimentoProvido->getProvimentoByProvimentoId($id)];

        // echo '<pre>';
        // dd($disciplinas_providos);
        // exit('-------------------------------------------------');

        //Percorre todas as disciplinas e faz a devolução das horas
        foreach ($disciplinas_providos as $provido) {

            //Localiza a origem da carência
            $carencia = $modelCarencia->getCarencia($provido['carencia_old_id']);


            //Soma a carência atual com a carência do provimento
            $carencia['matutino'] = intval($carencia['matutino']) + intval($provido['mat']);
            $carencia['vespertino'] = intval($carencia['vespertino']) + intval($provido['vesp']);
            $carencia['noturno'] = intval($carencia['noturno']) + intval($provido['not']);
            $carencia['total'] = intval($carencia['total']) + intval($provido['total']);

            //Registra a devolução da carênca
            $modelCarencia->save($carencia);

            //Apaga a disciplina do provimento
            $modelProvimentoProvido->delete($provido['id']);
        }

        //Excluir o provimento definitivamento 
        $modelProvimento->delete($id);

        $_SESSION ['msg'] = "<div id='message' class='alert alert-danger alert-dismissible fade show'  role='alert'>Provimento <strong>EXCLUÍDO</strong> com sucesso!</div>";
        header("Locarion: carencias/carencia");

        return redirect()->to(site_url('provimentos/'));
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
        // $modelCarencia = new CarenciaModel();
        $modelProvimentoProvido = new ProvimentoProvidoModel();
        $modelUser = new UserModel();

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
            'provimento' => $modelProvimento->getProvimento($provimento_id),

            // 'carencia' => $modelCarencia->getUserById($id),

        ];

        $data['user'] =  $modelUser->getUserById($data['provimento']['user_id']);

        // dd($data);

        $id_provimento = intval($data['provimento']['provimento_id']);
        $data['provimento_provido'] = $modelProvimentoProvido->getProvidoByProvimentoId($id_provimento);

        // echo '<pre>';
        // dd($data);
        // exit('Parada forçada...');

        if (empty($data['provimento'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Não foi possível encontrar o provimento: ' . $provimento_id);
        }

        echo view('layout/header', $data);
        echo view('provimentos/provimentoEdit');
        echo view('layout/footer');
    }

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

        //Verifica se a escola informada para prover existe
        if ($Ue) {
            $encontrado['success'] = 'true';
            $encontrado['message'] = 'Código informado localizado';
            $encontrado['escola'] = $Ue;

            //Recuperar carencias para a escola caso houver
            $modelCarencia = new CarenciaModel();
            $Carencias = $modelCarencia->getCarenciaUE($codigoEscola);

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

    public function index()
    {

        helper(['form', 'url']);

        $nteModel = new NteModel();
        $disciplinaModel = new DisciplinaModel();

        $data = [
            'title' => 'Pesquisa de Provimentos',
            'ntes' => $nteModel->getAll(),
            'disciplinas' => $disciplinaModel->getAll(),
            'carencias' => [],
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

                'vendor/datatables/app.js',
            ],
        ];

        // echo '<pre>';
        // dd($data);
        // exit('ecnotrou...');

        echo view('layout/header', $data);
        echo view('provimentos/index');
        echo view('layout/footer');
    }

    //Pega os dados dos campos, cria o critério e aplica na consulta no model
    public function consulta_provimento()
    {

        //Pega parâmetros enviados pro Ajax
        $campos = [
            'nte' => $_POST['nte'],
            'municipio' => $_POST['municipio'],
            'ue_id' => $_POST['ue_id'],
            'ue' => $_POST['escola_nome'],
            'matricula' => $_POST['matricula'],
            'professor_nome' => $_POST['professor_nome'],
            'anuencia' => $_POST['anuencia'],
            'assuncao' => $_POST['assuncao'],
        ];

        $modelProvimento = new ProvimentoModel();
        $provimentos = $modelProvimento->getProvimentoConsulta($campos);

        if ($provimentos) {
            foreach ($provimentos as $provimento) {

                $id = $provimento['provimento_id'];
                $edit = "<a title='Exibe o registro para edição' class='btn btn-light btn-circle btn-sm' style='color: #0D47A1' href='/provimentos/edit/{$id}'><i class='fas fa-edit'></i></a>";

                $result[] = [
                    $edit,
                    $provimento['nte_nome'],
                    $provimento['ue_municipio'],
                    $provimento['ue_id'],
                    $provimento['escola_nome'],
                    $provimento['professor_matricula'],
                    $provimento['professor_cpf'],
                    $provimento['professor_nome'],
                    $provimento['aula_normal'],
                    $provimento['aula_extra'],
                    $provimento['anuencia'],
                    $provimento['data_anuecia'],
                    $provimento['assuncao'],
                    $provimento['data_assuncao'],
                    $provimento['forma_suprimento'],
                    $provimento['tipo_movimentacao'],
                    $provimento['user_id'],
                    $provimento['data_lancamento'],
                    $provimento['observacao'],
                ];
            }
        } else {
            $result = "";
        }

        echo json_encode($result);
    }

    //Pega os dados dos campos, cria o critério e aplica na consulta no model
    public function teste()
    {

        $campos = [];

        $modelProvimento = new ProvimentoModel();

        $provimentos = $modelProvimento->getProvimentoConsulta($campos);
        echo '<pre>';
        dd($provimentos);

        if ($provimentos) {
            foreach ($provimentos as $provimento) {
                $result[] = [
                    $provimento['nte_nome'],
                    $provimento['ue_municipio'],
                    $provimento['ue_id'],
                    $provimento['escola_nome'],
                    $provimento['professor_matricula'],
                    $provimento['professor_cpf'],
                    $provimento['professor_nome'],
                    $provimento['aula_normal'],
                    $provimento['aula_extra'],
                    $provimento['forma_suprimento'],
                    $provimento['tipo_movimentacao'],
                    $provimento['anuencia'],
                    $provimento['data_anuecia'],
                    $provimento['assuncao'],
                    $provimento['data_assuncao'],
                    $provimento['user_id'],
                    $provimento['data_lancamento'],
                    $provimento['observacao'],
                    $provimento['provimento_id'],
                ];
            }
        } else {
            $result = "";
        }

        echo '<pre>';
        dd($provimentos);
        exit('-------');

        echo json_encode($result);
    }



}
