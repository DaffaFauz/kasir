<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProdukSeeder extends Seeder
{
    public function run()
    {
        //
        $data = [
            [
                'kode_produk' => '1111',
                'nama_produk' => 'Sari Roti',
                'id_kategori' => 1,
                'id_satuan' => 1,
                'harga_beli' => 5000,
                'harga_jual' => 6000,
                'stok' => 200,
            ],
            [
                'kode_produk' => '2222',
                'nama_produk' => 'Yakult',
                'id_kategori' => 2,
                'id_satuan' => 1,
                'harga_beli' => 1500,
                'harga_jual' => 2500,
                'stok' => 200,
            ],
            
        ];
        $this->db->table('produk')->insertBatch($data);
    }
}
