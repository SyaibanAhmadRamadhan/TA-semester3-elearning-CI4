<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DaftarGelar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'program_studi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'gelar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'jengjang' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_at' => [
                'type'           => 'DATETIME',
                'null'            => true,
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
                'null'            => true,
            ]

        ]);

        // Membuat primary key
        $this->forge->addKey('id', TRUE);

        // Membuat tabel mahasiswa
        $this->forge->createTable('daftar_gelar', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('daftar_gelar');
    }
}
