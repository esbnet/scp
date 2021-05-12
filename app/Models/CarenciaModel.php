<?php

namespace App\Models;

use CodeIgniter\Model;

class CarenciaModel extends Model
{

    protected $table = 'scp_carencia';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'id',
        'ue_id',
        'disciplina_id',
        'matricula',
        'matutino',
        'vespertino',
        'noturno',
        'total',
        'temporaria',
        'inicio_afastamento',
        'termino_afastamento',
        'motivo_vaga_id',
        'user_id',
        'tipo_lancamento_id',
        'lancamento_id',
        'data_lancamento',
        'observacao',
        'matutino_original',
        'vespertino_original',
        'noturno_original',
        'total_original',
        'houve_provimento'
    ];

    public function getCarencia($id = NULL)
    {

        if ($id === NULL) {
            return $this->findAll();
        }

        return $this->asArray()
            ->where(['Id' => $id])
            ->first();
    }

    public function getCarenciaUE($ueid = NULL)
    {
        $array = ['ue_id = ' => $ueid, 'total >' => 0];

        $carencia = $this->select(
            'scp_carencia.id, 
                scp_carencia.ue_id, 
                scp_carencia.disciplina_id, 
                scp_carencia.matutino,
                scp_carencia.vespertino,
                scp_carencia.noturno,
                scp_carencia.total, 
                scp_carencia.temporaria, 
                scp_disciplina.nome'
        )
            ->join('scp_disciplina', 'scp_disciplina.id = scp_carencia.disciplina_id', 'left')
            ->where($array)
            ->orderby('scp_disciplina.nome asc')
            ->findAll();
        return $carencia;
    }

    public function getCarenciaIndex($id = NULL)
    {

        $carencia = $this->select(
            'scp_carencia.id,
            scp_ue.nte_id,
            scp_ue.municipio,
            scp_ue.id as ue_id,
            scp_ue.ue as escola_nome,
            scp_disciplina.nome as disciplina_nome,
            scp_carencia.total,
            scp_carencia.temporaria'
        )
            ->join('scp_ue', 'scp_ue.id = scp_carencia.ue_id', 'left')
            ->join('scp_disciplina', 'scp_disciplina.id = scp_carencia.disciplina_id', 'left')
            ->where(' total > 0 ')
            ->orderby('scp_ue.nte_id, scp_ue.municipio, escola_nome, disciplina_nome asc')
            ->findAll();

        return $carencia;
    }

    public function getTotalCarenciaReal()
    {

        return $this->selectSum('total')
            ->where(['temporaria' => 0])
            ->findAll();
    }

    public function getTotalCarenciaTemporaria()
    {

        return $this->selectSum('total')
            ->where(['temporaria' => 1])
            ->where("termino_afastamento >=", date('Y-m-d'))
            ->findAll();
    }

    public function getCarenciaByDisciplina($ue_id = NULL, $disciplina_id = NULL, $temporaria = NULL)
    {

        $carencia =  $this
            ->where(['ue_id' => $ue_id])
            ->where(['disciplina_id' => $disciplina_id])
            ->where(['temporaria' => $temporaria])
            ->findAll();

        return $carencia;
    }

    public function getCarenciaRealConsulta($campos = NULL) 
    {

        $nte = $campos['nte'];
        $municipio = $campos['municipio'];
        $ue_id = $campos['ue_id'];
        $ue = $campos['ue'];
        $tipo_carencia = $campos['tipo_carencia'];
        $disciplina = $campos['disciplina'];
        $area_formacao = $campos['area_formacao'];

        if ($tipo_carencia < 2 && $tipo_carencia <> Null  ) {
            $tipo_carencia = [ $tipo_carencia ];
        }else{
            $tipo_carencia = [ 0, 1 ];
        }

        //Não deve trazer registros antigos que não tem mais horas para prover
        $query_local = ['total >' => 0, '  '];

        $carencia = $this->select(
            'scp_ue.nte_id                              as nte_id,
            scp_nte.nome                                as nte_nome,
            scp_ue.municipio                            as municipio,
            scp_carencia.ue_id               as ue_id,
            scp_ue.ue                                   as escola_nome,
            scp_carencia.id                  as carencia_id,
            scp_disciplina.nome                         as disciplina_nome,
            scp_carencia.matutino            as matutino,
            scp_carencia.vespertino          as vespertino,
            scp_carencia.noturno             as noturno,
            scp_carencia.total               as total,
            scp_carencia.temporaria          as temporaria,
            scp_motivo_carencia.motivo                  as motivo,
            scp_carencia.inicio_afastamento  as inicio_afastamento,
            scp_carencia.termino_afastamento as termino_afastamento'
        )
            ->join('scp_ue', 'scp_carencia.ue_id = scp_ue.id' , 'left')
            ->join('scp_nte', 'scp_ue.nte_id = scp_nte.id', 'left')
            ->join('scp_disciplina', 'scp_carencia.disciplina_id = scp_disciplina.id', 'left')
            ->join('scp_professor', 'scp_carencia.matricula = scp_professor.matricula', 'left')
            ->join('scp_motivo_carencia', 'scp_carencia.motivo_vaga_id = scp_motivo_carencia.id', 'left')
            ->like('scp_ue.nte_id', $nte)
            ->like('scp_ue.municipio', $municipio)
            ->like('scp_ue.id', $ue_id)
            ->like('scp_ue.ue', $ue)
            ->like('scp_disciplina.id', $disciplina)
            ->like('scp_disciplina.area', $area_formacao)
            ->where($query_local)
            ->whereIn('scp_carencia.temporaria', $tipo_carencia )
            ->orderby('scp_ue.nte_id, scp_ue.municipio, escola_nome, disciplina_nome asc')
            ->findAll();



            
        return $carencia;
    }

    public function getCarenciaDetalhadaConsulta($nte = "", $municipio = "", $ue_id = "", $ue = "", $tipo_carencia = "",$disciplina = "" ) 
    {
        if ($tipo_carencia < 2 && $tipo_carencia <> Null  ) {
            $tipo_carencia = [ $tipo_carencia ];
        }else{
            $tipo_carencia = [ 0, 1 ];
        }

        //Não deve trazer registros antigos que não tem mais horas para prover
        $query_local = ['total >' => 0, '  '];

        $carencia = $this->select(
            'scp_ue.nte_id                              as nte_id,
            scp_nte.nome                                as nte_nome,
            scp_ue.municipio                            as municipio,
            scp_carencia.ue_id               as ue_id,
            scp_ue.ue                                   as escola_nome,
            scp_carencia.id                  as carencia_id,
            scp_disciplina.nome                         as disciplina_nome,
            scp_carencia.temporaria          as temporaria,
            scp_motivo_carencia.motivo                  as motivo,
            scp_carencia.inicio_afastamento  as inicio_afastamento,
            scp_carencia.termino_afastamento as termino_afastamento'
        )
            ->selectSum(
                'scp_carencia.matutino       as matutino,
                scp_carencia.vespertino      as vespertino,
                scp_carencia.noturno         as noturno,
                scp_carencia.total           as total')

            ->join('scp_ue', 'scp_carencia.ue_id = scp_ue.id' , 'left')
            ->join('scp_nte', 'scp_ue.nte_id = scp_nte.id', 'left')
            ->join('scp_disciplina', 'scp_carencia.disciplina_id = scp_disciplina.id', 'left')
            ->join('scp_professor', 'scp_carencia.matricula = scp_professor.matricula', 'left')
            ->join('scp_motivo_carencia', 'scp_carencia.motivo_vaga_id = scp_motivo_carencia.id', 'left')
            ->like('scp_ue.nte_id', $nte)
            ->like('scp_ue.municipio', $municipio)
            ->like('scp_ue.id', $ue_id)
            ->like('scp_ue.ue', $ue)
            ->like('scp_disciplina.id', $disciplina)
            ->where($query_local)
            ->whereIn('scp_carencia.temporaria', $tipo_carencia )
            ->groupby('disciplina_nome','temporaria')
            ->orderby('scp_ue.nte_id, scp_ue.municipio, escola_nome, disciplina_nome asc')
            ->findAll();

        return $carencia;
    }

    public function getCarenciaTop5Disciplina()
    {

        return $this
            ->select('scp_disciplina.nome as disciplina_nome')->limit(5)
            ->selectSum('scp_carencia.total')
            ->join('scp_disciplina', 'scp_carencia.disciplina_id = scp_disciplina.id')
            ->groupby('disciplina_id')
            ->orderby('total', 'desc')
            ->findAll();

    }

    public function getCarenciaTop5Escola()
    {

        return $this
            ->select('scp_ue.ue as escola_nome')->limit(5)
            ->selectSum('scp_carencia.total')
            ->join('scp_ue', 'scp_carencia.ue_id = scp_ue.id')
            ->groupby('ue_id')
            ->orderby('total', 'desc')
            ->findAll();

    }


}
