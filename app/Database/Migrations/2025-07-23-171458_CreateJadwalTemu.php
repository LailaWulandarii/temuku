<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJadwalTemu extends Migration
{
    public function up()
    {
        $this->db->query('SET FOREIGN_KEY_CHECKS=0');
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'id_dokter'  => ['type' => 'INT', 'unsigned' => true],
            'id_pasien'  => ['type' => 'INT', 'unsigned' => true],
            'waktu_jadwal' => ['type' => 'DATETIME', 'null' => false],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_dokter', 'dokter', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_pasien', 'pasien', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('jadwal_temu');

        // Enable foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=1');
    }

    public function down()
    {
        $this->forge->dropTable('jadwal_temu');
    }
}
