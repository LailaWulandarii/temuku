<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DokterSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'dr. Albert',
                'spesialisasi' => 'Penyakit Dalam',
                'foto' => 'albert.jpg',
                'ttd' => '1.jpg',
            ],
            [
                'nama' => 'dr. Sinta',
                'spesialisasi' => 'Anak',
                'foto' => 'sinta.jpg',
                'ttd' => '2.jpg',
            ],
        ];
        $this->db->table('dokter')->insertBatch($data);
    }
}
