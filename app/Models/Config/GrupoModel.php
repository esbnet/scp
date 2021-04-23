<?php

namespace App\Models\Config;

use CodeIgniter\Model;

class GrupoModel extends Model
{

    protected $table = 'auth_groups';

    protected $allowedFields = [
        'id',
        'name',
        'description'
    ];

    public function getGrupos($id = null)
    {
        if ($id == null) {
            return $this->orderBy('name', 'asc')
                ->findAll();
        } else {
            return $this->asArray()
                ->where(['id' => $id])
                ->first();
        }
    }
    public function getGrupobyName($nome)
    {
        return $this->asArray()
            ->where(['name' => $nome])
            ->first();
    }
}
