<?php

namespace App\Models;

use CodeIgniter\Model;

class DisciplinaModel extends Model
{

    protected $table = 'scp_disciplina';

    protected $allowedFields = ['id', 'nome'];

    public function getDisciplinabyName($nome)
    {

        return $this->asArray()
            ->where(['nome' => $nome])
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

        return $this->orderBy('nome', 'asc')
            ->findAll();

        // return $this->asArray()
        //     ->findAll
        //     ->orderBy('Nome', 'asc')
        //     ->first();

    }

    public function getAreas()
    {

        return $this->select('distinct(area)')
                ->orderBy('area', 'asc')
            ->findAll();

        // return $this->asArray()
        //     ->findAll
        //     ->orderBy('Nome', 'asc')
        //     ->first();

    }



}
