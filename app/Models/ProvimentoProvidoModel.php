<?php

namespace App\Models;

use CodeIgniter\Model;

class ProvimentoModel extends Model
{

    protected $table = 'scp_provimento';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id',
        'provimento_id',
        'disciplina_id',
        'mat',
        'vesp',
        'not',
        'total',
        'mat_old',
        'vesp_old',
        'not_old',
        'total_old',
        'carencia_old_id',
    ];

    public function getProvido($id = NULL)
    {
        if ($id === NULL) {

            return  $this->select('scp_provimento.*')
                ->join('scp_ue', 'scp_ue.id = scp_provimento.ue_id', 'left')
                ->join('scp_professor', 'scp_professor.matricula = scp_provimento.matricula', 'left')
                ->join('scp_forma_suprimento', 'scp_forma_suprimento.id = scp_provimento.forma_suprimento_id', 'left')
                ->findAll();
        } else {

            return $this->asArray()
                ->where(['id' => $id])
                ->first();
        }
    }
}
