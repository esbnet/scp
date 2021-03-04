<?php namespace App\Models;

use CodeIgniter\Model;

class FormaSuprimentoModel extends Model {

    protected $table = 'scp_forma_suprimento';
    
    protected $allowedFields = ['id','Nome'];

    public function getUsersbyName($nome) {

        return $this->asArray()
                    ->where(['Nome' => $nome])
                    ->first();
    }

    public function getUsersbyId($id) {

        return $this->asArray()
                    ->where(['id' => $id])
                    ->first();
    }

    public function getAll() {

        return $this
            ->OrderBy('Nome Asc')
            ->findAll();

    }

}
