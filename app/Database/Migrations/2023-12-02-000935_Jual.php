<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jual extends Migration
{
    public function up()
    {
        //
        $data = [
            'id_jual' => [
                'type' => 'int'
            ],
            'no_faktur' => [
                'type' => 'varchar',
                'constraint' => '20'
            ],
            'tanggal_jual' => [
                'type' => 'date',
            ],
            'jam' => [
                'type' => 'time',
            ],
            'grand_total' => [
                'type' => 'decimal',
                'constraint' => '10', '2'
            ],
            'dibayar' => [
                'type' => 'decimal',
                'constraint' => '10', '2'
            ],
            'kembalian' => [
                'type' => 'decimal',
                'constraint' => '10', '2'
            ],
            'id_kasir' => [
                'type' => 'int',
            ],
        ];
        $this->forge->addField($data);
        $this->forge->addKey('id_jual', true);
        $this->forge->createTable('jual');
    }

    public function down()
    {
        //
        $this->forge->dropTable('jual');
    }
}
