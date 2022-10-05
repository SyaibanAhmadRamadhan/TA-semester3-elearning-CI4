<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AbsensiMahasiswa extends Migration
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
            'nim_mahasiswa' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'kode_matkul' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'absen_dosen_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned'  => true,
                'null' => true
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
        $this->forge->addForeignKey('nim_mahasiswa', 'mahasiswa', 'nim', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('kode_matkul', 'mata_kuliah', 'kode_matkul', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('absen_dosen_id', 'absensi_dosen', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('absensi_mahasiswa', TRUE);
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('absensi_mahasiswa');
    }
}
