<?php

namespace App\Models;

use CodeIgniter\Model;

class SatuanModel extends Model
{
    protected $table            = 'satuan';
    protected $primaryKey       = 'id_satuan';
    protected $allowedFields    = ['nama_satuan'];

    public function getSatuan($idsatuan = false)
    {
        if ($idsatuan == false) {
            return $this->findAll();
        }
        return $this->where(['id_satuan' => $idsatuan])->first();
    }
}
