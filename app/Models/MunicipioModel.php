<?php namespace App\Models;

use CodeIgniter\Model;

class MunicipioModel extends Model {

    protected $table = 'scp_municipio';
    
    protected $allowedFields = ['id','Municipio'];

    public function getMunicipiobyName($municipio) {

        return $this->asArray()
                    ->where(['Municipio' => $municipio])
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
