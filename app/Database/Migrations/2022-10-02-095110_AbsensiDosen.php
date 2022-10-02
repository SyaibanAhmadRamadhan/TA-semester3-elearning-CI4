<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AbsensiDosen extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nip_dosen' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'kode_matkul' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'rangkuman' => [
                'type' => 'LONGTEXT'
            ],
            'status' => [
                'type'           => 'ENUM',
                'constraint'     => ['hadir', 'tidak hadir'],
                'default'        => 'tidak hadir',
            ],
            'keterangan' => [
                'type'           => 'ENUM',
                'constraint'     => ['berlangsung', 'selesai'],
                'default'        => 'berlangsung',
            ],
            'pertemuan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'tanggal_masuk' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'waktu_masuk' => [
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

        // Membuat tabel mahasiswa
        $this->forge->addForeignKey('nip_dosen', 'dosen', 'nip', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('kode_matkul', 'mata_kuliah', 'kode_matkul', 'CASCADE', 'CASCADE');

        $this->forge->createTable('absensi_dosen', TRUE);
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('absensi_dosen');
    }
}
