<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'email', 'password'];

    public function getUser($id)
    {
        return $this->where(['id_user' => $id])->findAll();
    }
}
