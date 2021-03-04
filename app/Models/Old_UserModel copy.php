<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel2 extends Model
{
    protected $table = 'user';
    
    protected $allowedFields = ['User','Nome','Password','GroupId' ];

    public function getUsers($user, $password) {

        return $this->asArray()
                    ->where(['User' => $user, 'Password' => md5($password)])
                    ->first();
    }

/*     public function getUsers($user = false, $senha) {

        if ($user === false) {
            return $this->findAll();
        }
    
        return $this->asArray()
                    ->where(['slug' => $id])
                    ->first();
    }
 */

}

