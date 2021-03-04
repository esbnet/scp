<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfessorModel extends Model
{

    protected $table = 'scp_professor';

    protected $allowedFields = [
        'matricula',
        'matricula_sap',
        'cpf',
        'nome',
        'cargo',
        'vinculo',
        'licenca_plena',
    ];

    public function getProfessorbyName($nome)
    {

        return $this->asArray()
            ->where(['nome' => $nome])
            ->first();
    }

    public function getProfessorbyId($id)
    {

        return $this->asArray()
            ->where(" matricula = $id OR Cpf = $id OR matricula_sap = $id")
            ->first();
    }

    public function getAll()
    {
        return $this->findAll();
    }
}
