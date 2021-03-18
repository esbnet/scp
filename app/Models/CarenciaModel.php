<?php

namespace App\Models;

use CodeIgniter\Model;

class CarenciaModel extends Model
{
    protected $table = 'scp_carencia';
    protected $primaryKey = 'id';
    protected $asObject = 'object';

    protected $allowedFields = [
        'id',
        'ue_id',
        'disciplina_id',
        'matutino',
        'vespertino',
        'noturno',
        'total',
        'temporaria',
        'data_atualizacao'
    ];

    public function getCarencia($id = NULL)
    {
        if ($id === NULL) {
            $carencias = $this->findAll();
            return $carencias;
        }

        $carencia = $this->where(['Id' => $id])->first();
        return $carencia;
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

    public function getCarenciaUE($ueid = NULL)
    {
        $array = ['ue_id = ' => $ueid, 'total >' => 0 ];

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

    public function getTotalCarenciaReal()
    {

        return $this->selectSum('Total')
            ->where(['temporaria' => 0])
            ->findAll();
    }

    public function getTotalCarenciaTemporaria()
    {

        return $this->selectSum('Total')
            ->where(['temporaria' => 1])
            ->findAll();
    }
}
