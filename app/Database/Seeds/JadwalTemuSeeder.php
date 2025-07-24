<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JadwalTemuSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_dokter' => 1,
                'id_pasien' => 1,
                'waktu_jadwal' => '2025-07-25 09:00:00',
            ],
            [
                'id_dokter' => 2,
                'id_pasien' => 2,
                'waktu_jadwal' => '2025-07-26 09:00:00',
            ],
        ];
        $this->db->table('jadwal_temu')->insertBatch($data);
    }
}
