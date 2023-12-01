<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Satuan extends Migration
{
    public function up()
    {
        //
        $data = [
            'id_satuan' => [
                'type' => 'int'
            ],
            'nama_satuan' => [
                'type' => 'varchar',
                'constraint' => '20'
            ]
        ];
        $this->forge->addKey('id_satuan', true);
        $this->forge->createTable('satuan');
    }

    public function down()
    {
        //
        $this->forge->dropTable('satuan');
    }
}
