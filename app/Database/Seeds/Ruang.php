<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Ruang extends Seeder
{
    public function run()
    {
        $admin = [
            [
                'no_ruang' => '304',
                'lantai' => '3',
            ],
            [
                'no_ruang' => '204',
                'lantai' => '2',
            ]
        ];

        foreach ($admin as $x) {
            $this->db->table('ruang')->insert($x);
        }
    }
}
