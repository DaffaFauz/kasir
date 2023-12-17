<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        //
        $data = [
            [
                'nama_user' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => sha1('123'),
                'level' => 1,
            ],
            [
                'nama_user' => 'Kasir',
                'email' => 'kasir@gmail.com',
                'password' => sha1('123'),
                'level' => 2,
            ],
        ];
        $this->db->table('user')->insertBatch($data);
    }
}
