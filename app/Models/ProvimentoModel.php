<?php

namespace App\Models;

use CodeIgniter\Model;

class ProvimentoModel extends Model
{

    protected $table = 'scp_provimento';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id',
        'Ue_Id',
        'Disciplina_Id',
        'Matricula_Id',
        'Mat',
        'Vesp',
        'Not',
        'Total',
        'AulaNormal',
        'AulaExtra',
        'FormaSup_Id',
        'TipoMov_Id',
        'Anuencia',
        'DataAnuencia',
        'Assuncao',
        'DataAssuncao',
        'User_Id',
        'DataLanc',
        'MatOld',
        'VespOld',
        'NotOld',
        'TotalOld',
        'CarenciaOld_Id',
        'Desistencia',
        'Observacao',
    ];

    public function getProvimento($id = NULL)
    {

        if ($id === NULL) {
            return $this->findAll();
        } else {

            return $this->asArray()
                ->where(['Id' => $id])
                ->first();
        }
    }
}
