<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table            = 'tbl_setting';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama_toko', 'slogan', 'alamat', 'no_telpon', 'deskripsi'];

    public function getSetting()
    {
        return $this->where(['id' => 1])->first();
    }
}
