<?php

namespace App\Models;

use CodeIgniter\Model;

class ProvimentoProvidoModel extends Model
{

    protected $table = 'scp_provimento_provido';
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

    public function getProvidoByProvimentoId($provimento_id = NULL)
    {
        return  $this->select([
            'scp_provimento_provido.*',
            'scp_disciplina.nome'
        ])
            ->join('scp_disciplina', 'id = disciplina_id')
            ->where(['scp_provimento' => $provimento_id])
            ->get('scp_provimento_provido')
            ->result();
    }

    public function deleteOldProvimentoProvido($provimento_id = NULL)
    {
        $this->delete('scp_provimento_provido');
    }



    public function getProvidoAll()
    {
        return $this->asArray()->findAll();
    }

    public function getTotalProvido()
    {
        return $this->selectSum('total')
            ->findAll();
    }
}
