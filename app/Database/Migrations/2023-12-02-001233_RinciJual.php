<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RinciJual extends Migration
{
    public function up()
    {
        //
        $data = [
            'id_rinci' => [
                'type' => 'int'
            ],
            'no_faktur' => [
                'type' => 'varchar',
                'constraint' => '20'
            ],
            'kode_produk' => [
                'type' => 'varchar',
                'constraint' => '20'
            ],
            'harga_jual' => [
                'type' => 'decimal',
                'constraint' => '10', '2'
            ],
            'qty' => [
                'type' => 'int',
            ],
            'total_harga' => [
                'type' => 'decimal',
                'constraint' => '10', '2'
            ],
        ];
        $this->forge->addField($data);
        $this->forge->addKey('id_rinci', true);
        $this->forge->createTable('rinci_jual');
    }

    public function down()
    {
        //
        $this->forge->dropTable('rinci_jual');
    }
}
