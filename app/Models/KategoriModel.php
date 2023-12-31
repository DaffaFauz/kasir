<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table            = 'kategori';
    protected $primaryKey       = 'id_kategori';
    protected $allowedFields    = ['nama_kategori'];

    public function getKategori($idkategori = false)
    {
        if ($idkategori == false) {
            return $this->findAll();
        }
        return $this->where(['id_kategori' => $idkategori])->first();
    }
}
