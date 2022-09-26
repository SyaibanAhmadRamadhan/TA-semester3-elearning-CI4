<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MataKuliahMahasiswa extends Migration
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
            'nim_mahasiswa' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'kode_matkul' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
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

        $this->forge->addForeignKey('nim_mahasiswa', 'mahasiswa', 'nim', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('kode_matkul', 'mata_kuliah', 'kode_matkul', 'CASCADE', 'CASCADE');
        // Membuat tabel mahasiswa
        $this->forge->createTable('matkul_mahasiswa', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('matkul_mahasiswa');
    }
}
