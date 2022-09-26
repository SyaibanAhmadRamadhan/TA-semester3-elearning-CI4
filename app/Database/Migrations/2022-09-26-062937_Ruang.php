<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ruang extends Migration
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
            'no_ruang' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'lantai' => [
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
        $this->forge->createTable('ruang', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('ruang');
    }
}
