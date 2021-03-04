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
        'observacao'
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

}
