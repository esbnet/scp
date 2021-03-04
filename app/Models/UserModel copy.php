<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'user_id';

    protected $allowedFields = [
        'user_id', 
        'user_user', 
        'user_name', 
        'user_password', 
        'user_group_id'];

    public function getUserById($user_id)
    {
        return $this->asArray()
            ->where(['user_id' => $user_id])
            ->first();
    }

    public function getAllUsers()
    {
        return $this->findAll();
    }



    
}
