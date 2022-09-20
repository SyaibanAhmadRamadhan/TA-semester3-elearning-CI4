<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Admin extends Seeder
{
    public function run()
    {
        $admin = [
            [
                'email' => 'admin@gmail.com'
            ]
        ];

        foreach($admin as $x){
            $this->db->table('admin')->insert($x);
        }
    }
}
