<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupModel extends Model
{
    protected $table = 'groups';

    protected $allowedFields = [
        'group_id',
        'group_name',
        'group_description',
    ];

    public function getGroupById($group_id)
    {
        return $this->asArray()
            ->where(['group_id' => $group_id])
            ->first();
    }

    public function getAllGroups()
    {
        return $this->findAll();
    }
}
