<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MataKuliah extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'kode_matkul' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'auto_increment' => true
            ],
            'name_matkul' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'semester' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'sks' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'no_ruang' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned'       => true,
            ],
            'hari' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'masuk' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'selesai' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'kode_jurusan' => [
                'type' => 'VARCHAR',
                'constraint' => 5,
                'null' => true
            ],
            'nip_dosen' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true
            ],
            'id_daftar_kelas' => [
                'type' => 'INT',
                'constraint' => 5,
                'null' => true,
                'unsigned'       => true,
            ],
            'materi' => [
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
        $this->forge->addKey('kode_matkul', TRUE);

        // Membuat tabel mahasiswa
        $this->forge->addForeignKey('id_daftar_kelas', 'daftar_kelas', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('nip_dosen', 'dosen', 'nip', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('kode_jurusan', 'jurusan', 'kode', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('no_ruang', 'ruang', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('mata_kuliah', TRUE);
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('mata_kuliah');
    }
}
