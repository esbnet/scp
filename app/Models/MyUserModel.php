<?php

namespace App\Models;

use CodeIgniter\Model;

class MyUserModel extends Model
{
  
  protected $table = 'users';
  protected $primaryKey = 'id';

  protected $allowedFields = [
    'id', 'email', 'username', 'password_hash', 'reset_hash', 'reset_at', 'reset_expires', 'activate_hash',
    'status', 'status_message', 'active', 'force_pass_reset', 'permissions', 'deleted_at',
  ];

  public function getUserById($id)
  {
    return $this->asArray()
      ->where(['id' => $id])
      ->first();
  }

  public function getUserName($username)
  {
    return $this->asArray()
      ->where(['username' => $username])
      ->first();
  }

  function listUsers($id = NULL)
  {

    if ($id === NULL) {
      return $this->findAll();
    }

    return $this->asArray()
      ->where(['id' => $id])
      ->first();
  }
}


// 'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
// 'email'            => ['type' => 'varchar', 'constraint' => 255],
// 'username'         => ['type' => 'varchar', 'constraint' => 30, 'null' => true],
// 'password_hash'    => ['type' => 'varchar', 'constraint' => 255],
// 'reset_hash'       => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
// 'reset_at'         => ['type' => 'datetime', 'null' => true],
// 'reset_expires'    => ['type' => 'datetime', 'null' => true],
// 'activate_hash'    => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
// 'status'           => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
// 'status_message'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
// 'active'           => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 0],
// 'force_pass_reset' => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 0],
// 'created_at'       => ['type' => 'datetime', 'null' => true],
// 'updated_at'       => ['type' => 'datetime', 'null' => true],
// 'deleted_at'       => ['type' => 'datetime', 'null' => true],