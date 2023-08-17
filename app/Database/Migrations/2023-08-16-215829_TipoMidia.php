<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TipoMidia extends Migration
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
            'tipo' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'criado_em' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'atualizado_em' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'deletado_em' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('tipo');
        $this->forge->createTable('tipomidia');
    }

    public function down()
    {
        $this->forge->dropTable('tipomidia');
    }
}
