<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Municipio extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 9,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'codigo_ibge' => [
                'type'           => 'INT',
                'constraint'     => 9,
                'unsigned'       => true,
            ],
            'nome' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'uf' => [
                'type' => 'VARCHAR',
                'constraint' => 2,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('municipio');
    }

    public function down()
    {
        $this->forge->dropTable('municipio');
    }
}
