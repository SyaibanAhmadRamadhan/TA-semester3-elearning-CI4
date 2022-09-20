<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        $admin = [
            [
                'id_admin' => 1,
                'password'=>password_hash('123',PASSWORD_BCRYPT),
                'role'=>'admin'
            ]
        ];

        foreach($admin as $x){
            $this->db->table('user')->insert($x);
        }
    }
}
