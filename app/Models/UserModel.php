<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id_user';
    protected $allowedFields    = ['nama_user', 'email', 'password', 'level'];

    public function getUser($iduser = false)
    {
        if ($iduser == false) {
            return $this->findAll();
        }
        return $this->where(['id_user' => $iduser])->first();
    }
}
