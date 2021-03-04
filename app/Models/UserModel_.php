<?php

namespace App\Models;

use CodeIgniter\Model;

class My_UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $returnType = User::class;
    protected $useSoftDeletes = true;
    

    protected $allowedFields = [
        'email', 'username', 'password_hash', 'reset_hash', 'reset_at', 'reset_expires', 'activate_hash',
        'status', 'status_message', 'active', 'force_pass_reset', 'permissions', 'deleted_at',
    ];

    public function getUserById($id)
    {
        return $this->asArray()
            ->where(['user_id' => $id])
            ->first();
    }

    public function getUserName($username)
    {
        return $this->asArray()
            ->where(['user_user' => $username])
            ->first();
    }

    public function getAllUsers()
    {
        return $this->findAll();
    }
}
