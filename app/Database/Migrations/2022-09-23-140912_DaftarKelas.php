<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DaftarKelas extends Migration
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
            'name_kelas' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'ruang' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'semester' => [
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
        $this->forge->createTable('daftar_kelas', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('daftar_kelas');
    }
}
