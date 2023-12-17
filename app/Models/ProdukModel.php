<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table            = 'produk';
    protected $primaryKey       = 'id_produk';
    protected $allowedFields    = ['kode_produk', 'nama_produk', 'id_kategori', 'id_satuan', 'harga_beli', 'harga_jual', 'stok'];

    public function getProduk($idproduk = false)
    {
        if ($idproduk == false) {
            return $this->join('kategori', 'produk.id_kategori=kategori.id_kategori')->join('satuan', 'produk.id_satuan=satuan.id_satuan')->findAll();
        }
        return $this->where(['id_produk' => $idproduk])->first();
    }
}
