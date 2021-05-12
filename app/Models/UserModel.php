<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id', 
        'user', 
        'username', 
        'name', 
        'password', 
        'group_id'];

    public function getUserById($user_id)
    {
        return $this->asArray()
            ->where(['id' => $user_id])
            ->first();
    }

    public function getAllUsers()
    {
        return $this->findAll();
    }

    public function insertUser($user = NULL, $grupo_id = NULL) {

        echo '<pre>';
        dd($user);
        dd($grupo_id);

        return $this->withGroup($grupo_id)
            ->save($user);

        } 
    
}
