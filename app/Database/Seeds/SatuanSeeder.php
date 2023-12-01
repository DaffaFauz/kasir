<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SatuanSeeder extends Seeder
{
    public function run()
    {
        //
        $data = [
            [
                'nama_satuan' => 'PCS'
            ],
            [
                'nama_satuan' => 'BOX'
            ],
            [
                'nama_satuan' => 'Lusin'
            ],
            [
                'nama_satuan' => 'Buah'
            ],
            [
                'nama_satuan' => 'KG'
            ],
            [
                'nama_satuan' => 'Unit'
            ],
            [
                'nama_satuan' => 'Bungkus'
            ],
        ];
        $this->db->table('satuan')->insertBatch($data);
    }
}
