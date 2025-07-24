<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDokter extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'nama'        => ['type' => 'VARCHAR', 'constraint' => 100],
            'spesialisasi' => ['type' => 'VARCHAR', 'constraint' => 100],
            'foto'        => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'ttd'        => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('dokter');
    }

    public function down()
    {
        $this->forge->dropTable('dokter');
    }
}
