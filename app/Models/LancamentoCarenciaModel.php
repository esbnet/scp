<?php

namespace App\Models;

use CodeIgniter\Model;

class LancamentoCarenciaModel extends Model
{

    protected $table = 'scp_lancamento_carencia';
    protected $primaryKey = 'id';
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
            'scp_lancamento_carencia.id, 
                scp_lancamento_carencia.ue_id, 
                scp_lancamento_carencia.disciplina_id, 
                scp_lancamento_carencia.matutino,
                scp_lancamento_carencia.vespertino,
                scp_lancamento_carencia.noturno,
                scp_lancamento_carencia.total, 
                scp_lancamento_carencia.temporaria, 
                scp_disciplina.nome'
        )
            ->join('scp_disciplina', 'scp_disciplina.id = scp_lancamento_carencia.disciplina_id', 'left')
            ->where($array)
            ->orderby('scp_disciplina.nome asc')
            ->findAll();
        return $carencia;
    }

    public function getCarenciaIndex($id = NULL)
    {

        $carencia = $this->select(
            'scp_lancamento_carencia.id,
            scp_ue.nte_id,
            scp_ue.municipio,
            scp_ue.id as ue_id,
            scp_ue.ue as escola_nome,
            scp_disciplina.nome as disciplina_nome,
            scp_lancamento_carencia.total,
            scp_lancamento_carencia.temporaria'
        )
            ->join('scp_ue', 'scp_ue.id = scp_lancamento_carencia.ue_id', 'left')
            ->join('scp_disciplina', 'scp_disciplina.id = scp_lancamento_carencia.disciplina_id', 'left')
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

    public function getCarenciaConsulta()
    {

        $query = [
            'total >' => 0
        ];

        $carencia = $this->select(
            'scp_ue.nte_id,
            scp_nte.nome,
            scp_ue.municipio,
            scp_ue.id,
            scp_ue.ue as escola_nome,
            scp_lancamento_carencia.id,
            scp_ue.id as ue_id,
            scp_disciplina.nome as disciplina_nome,
            scp_lancamento_carencia.matutino,
            scp_lancamento_carencia.vespertino,
            scp_lancamento_carencia.noturno,
            scp_lancamento_carencia.total,
            scp_lancamento_carencia.temporaria,
            scp_motivo_carencia.motivo,
            scp_lancamento_carencia.inicio_afastamento,
            scp_lancamento_carencia.termino_afastamento'
        )
            ->join('scp_ue', 'scp_ue.id = scp_lancamento_carencia.ue_id', 'left')
            ->join('scp_nte', 'scp_nte.id = scp_ue.nte_id', 'left')
            ->join('scp_disciplina', 'scp_disciplina.id = scp_lancamento_carencia.disciplina_id', 'left')
            ->join('scp_professor', 'scp_professor.matricula = scp_lancamento_carencia.matricula', 'left')
            ->join('scp_motivo_carencia', 'scp_motivo_carencia.id = scp_lancamento_carencia.motivo_vaga_id', 'left')
            ->where($query)
            ->orderby('scp_ue.nte_id, scp_ue.municipio, escola_nome, disciplina_nome asc')
            ->findAll();

        return $carencia;
    }
}
