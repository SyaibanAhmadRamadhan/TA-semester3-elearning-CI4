<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Kelas extends Seeder
{
    public function run()
    {
        $admin = [
            [
                'name_kelas' => '19.2B.01',
                'ruang' => '304',
                'semester' => '1'
            ],
            [
                'name_kelas' => '19.3B.12',
                'ruang' => '1621',
                'semester' => '3'
            ]
        ];

        foreach ($admin as $x) {
            $this->db->table('daftar_kelas')->insert($x);
        }
    }
}
