<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kategori extends Migration
{
    public function up()
    {
        //
        $data = [
            'id_kategori' => [
                'type' => 'int',
                'auto_increment' => true
            ],
            'nama_kategori' => [
                'type' => 'varchar',
                'constraint' => '50'
            ]
        ];
        $this->forge->addField($data);
        $this->forge->addKey('id_kategori', true);
        $this->forge->createTable('kategori');
    }

    public function down()
    {
        //
        $this->forge->dropTable('kategori');
    }
}
