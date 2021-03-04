<?php

namespace App\Models;

use CodeIgniter\Model;

class DisciplinaModel extends Model
{

    protected $table = 'scp_disciplina';

    protected $allowedFields = ['id', 'Nome'];

    public function getDisciplinabyName($nome)
    {

        return $this->asArray()
            ->where(['Nome' => $nome])
            ->first();
    }

    public function getDiciplinabyId($id)
    {
        return $this->asArray()
            ->where(['id' => $id])
            ->first();
    }

    public function getAll()
    {

        return $this->orderBy('Nome', 'asc')
            ->findAll();

        // return $this->asArray()
        //     ->findAll
        //     ->orderBy('Nome', 'asc')
        //     ->first();

    }
}
