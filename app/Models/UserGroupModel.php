<?php

namespace App\Models;

use CodeIgniter\Model;

class UserGroupModel extends Model
{
    protected $table = 'users_groups';

    protected $allowedFields = [
        'users_groups_id',
        'users_groups_user_id',
        'users_groups_group_id',
    ];

    public function getGroupById($users_groups_id)
    {
        return $this->asArray()
            ->where(['users_groups_id' => $users_groups_id])
            ->first();
    }

    public function getAllGroups()
    {
        return $this->findAll();
    }
}
