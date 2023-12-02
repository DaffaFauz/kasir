<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produk extends Migration
{
    public function up()
    {
        //
        $data = [
            'id_produk' => [
                'type' => 'int'
            ],
            'kode_produk' => [
                'type' => 'varchar',
                'constraint' => '20'
            ],
            'id_kategori' => [
                'type' => 'int',
            ],
            'id_satuan' => [
                'type' => 'int',
            ],
            'harga_beli' => [
                'type' => 'decimal',
                'constraint' => '10,2'
            ],
            'harga_jual' => [
                'type' => 'decimal',
                'constraint' => '10,2'
            ],
            'stok' => [
                'type' => 'int',
            ],
        ];
        $this->forge->addField($data);
        $this->forge->addKey('id_produk', true);
        $this->forge->createTable('produk');
    }

    public function down()
    {
        //
        $this->forge->dropTable('produk');
    }
}
