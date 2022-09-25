<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Addres extends Migration
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
            'id_admin' => [
                'type' => 'INT',
                'constraint' => 12,
                'unsigned'       => true,
                'null' => true
            ],
            'nip_dosen' => [
                'type' => 'VARCHAR',
                'constraint' => 12,
                'null' => true
            ],
            'nim_mahasiswa' => [
                'type' => 'VARCHAR',
                'constraint' => 12,
                'null' => true
            ],
            'id_desa' => [
                'type' => 'TEXT',
                'constraint' => '12'
            ],
            'id_kecamatan' => [
                'type' => 'INT',
                'constraint' => 12,
                'null' => true
            ],
            'id_kabupaten' => [
                'type' => 'INT',
                'constraint' => 12,
                'unsigned'       => true,
                'null' => true
            ],
            'id_provinsi' => [
                'type' => 'INT',
                'constraint' => 2,
                'null' => true
            ],
            'detail_alamat'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 100
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

        $this->forge->addForeignKey('id_admin', 'admin', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('nip_dosen', 'dosen', 'nip', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('nim_mahasiswa', 'mahasiswa', 'nim', 'CASCADE', 'CASCADE');
        // $this->forge->addForeignKey('id_desa','wilayah_desa','id');
        $this->forge->addForeignKey('id_kabupaten', 'wilayah_kabupaten', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_provinsi', 'wilayah_provinsi', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_kecamatan', 'wilayah_kecamatan', 'id', 'CASCADE', 'CASCADE');

        // Membuat tabel mahasiswa
        $this->forge->createTable('addres', TRUE);
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('addres');
    }
}
