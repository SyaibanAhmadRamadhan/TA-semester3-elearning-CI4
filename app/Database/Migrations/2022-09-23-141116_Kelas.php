<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kelas extends Migration
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
            'id_kelas' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
                'unsigned' => true,
            ],
            'nip_dosen' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
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

        $this->forge->addForeignKey('id_kelas', 'daftar_kelas', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('nip_dosen', 'dosen', 'nip', 'CASCADE', 'CASCADE');
        // Membuat tabel mahasiswa
        $this->forge->createTable('kelas', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('kelas');
    }
}
