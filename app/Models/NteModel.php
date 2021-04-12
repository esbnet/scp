<?php namespace App\Models;

use CodeIgniter\Model;

class NteModel extends Model {

    protected $table = 'scp_nte';
    
    protected $allowedFields = ['id','nome'];

    public function getMunicipiobyId($id) {

        return $this->asArray()
                    ->where(['id' => $id])
                    ->first();
    }

    public function getAll() {

        return $this->findAll();

    }

}
