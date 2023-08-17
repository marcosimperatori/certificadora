<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Clientes extends Migration
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
            'razao' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'ativo' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'cidade' => [
                'type' => 'INT',
                'constraint' => 9,
                'unsigned'       => true
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
        $this->forge->addUniqueKey('razao');
        $this->forge->addForeignKey('cidade', 'municipio', 'id', 'CASCADE', 'NO ACTION', 'cliente_cidade');
        $this->forge->createTable('clientes');
    }

    public function down()
    {
        $this->forge->dropTable('clientes');
    }
}
