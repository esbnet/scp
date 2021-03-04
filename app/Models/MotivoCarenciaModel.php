<?php

namespace App\Models;

use CodeIgniter\Model;

class MotivoCarenciaModel extends Model
{

    protected $table = 'scp_motivo_carencia';

    protected $allowedFields = ['id', 'Motivo', ['Temp']];

    public function getUsersbyName($Motivo)
    {

        return $this->asArray()
            ->where(['Motivo' => $Motivo])
            ->first();
    }

    public function getUsersbyId($id)
    {

        return $this->asArray()
            ->where(['id' => $id])
            ->first();
    }

    public function getAll()
    {

        return $this->orderBy('Motivo', 'asc')
            ->findAll();
    }
}
