<?php namespace App\Models;

use CodeIgniter\Model;

class MotivoProvimentoModel extends Model {

    protected $table = 'scp_motivo_provimento';
    
    protected $allowedFields = ['id','Motivo', ['Temp']];

    public function getUsersbyName($Motivo) {

        return $this->asArray()
                    ->where(['Motivo' => $Motivo])
                    ->first();
    }

    public function getUsersbyId($id) {

        return $this->asArray()
                    ->where(['id' => $id])
                    ->first();
    }

    public function getAll() {

        return $this
            ->OrderBy('Motivo Asc')
            ->findAll();

    }

}
