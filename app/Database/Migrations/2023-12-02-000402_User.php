<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        //
        $data = [
            'id_user' => [
                'type' => 'int',
                'auto_increment' => true
            ],
            'nama_user' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'email' => [
                'type' => 'varchar',
                'constraint' => '100'
            ],
            'password' => [
                'type' => 'varchar',
                'constraint' => '255'
            ],
            'level' => [
                'type' => 'int',
            ],
        ];
        $this->forge->addField($data);
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('user');
    }

    public function down()
    {
        //
        $this->forge->dropTable('user');
    }
}
