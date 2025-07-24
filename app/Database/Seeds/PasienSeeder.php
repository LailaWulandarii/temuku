<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PasienSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'Angelina Jolie',
                'keluhan' => 'Merasa sesak nafas saat batuk',

            ],
            [
                'nama' => 'dr. Sinta',
                'keluhan' => 'Merasa mulas terus menerus',
            ],
        ];
        $this->db->table('pasien')->insertBatch($data);
    }
}
