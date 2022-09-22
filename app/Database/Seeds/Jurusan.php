<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Jurusan extends Seeder
{
    public function run()
    {
        $admin = [
            [
                'kode' => '230',
                'name_jurusan' => 'sistem informasi'
            ],
            [
                'kode' => '232',
                'name_jurusan' => 'sistem informasi akuntansi'
            ]
        ];

        foreach($admin as $x){
            $this->db->table('jurusan')->insert($x);
        }
    }
}
