<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        //
        $data = [
            [
                'nama_kategori' => 'Makanan'
            ],
            [
                'nama_kategori' => 'Minuman'
            ],
            [
                'nama_kategori' => 'Bahan dapur'
            ],
            [
                'nama_kategori' => 'Alat tulis kantor'
            ],
        ];
        $this->db->table('kategori')->insertBatch($data);
    }
}
