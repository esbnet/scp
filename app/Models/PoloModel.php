<?php namespace App\Models;

use CodeIgniter\Model;

class PoloModel extends Model {

    protected $table = 'scp_polo';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','Nome'];
    protected $returnType = 'object';

    protected $validationRules = [
        'Nome' => 'required|numeric|min_length[3]|max_lenght[60]|is_unique' ,
    ];


    public function getPolobyName($nome) {

        return $this->asArray()
                    ->where(['Nome' => $nome])
                    ->first();
    }

    public function getPolobyId($id) {

        return $this->asArray()
                    ->where(['id' => $id])
                    ->first();
    }

    public function getAll() {

        return $this->findAll();

    }

}
