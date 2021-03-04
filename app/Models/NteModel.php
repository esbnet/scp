<?php namespace App\Models;

use CodeIgniter\Model;

class NteModel extends Model {

    protected $table = 'nte';
    
    protected $allowedFields = ['id','Nome'];

    public function getMunicipiobyName($Nome) {

        return $this->asArray()
                    ->where(['Municipio' => $Nome])
                    ->first();
    }

    public function getMunicipiobyId($id) {

        return $this->asArray()
                    ->where(['id' => $id])
                    ->first();
    }

    public function getAll() {

        return $this->findAll();

    }

}
