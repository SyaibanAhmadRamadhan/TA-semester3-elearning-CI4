<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Semester extends Migration
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
            'semester' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'nim_mahasiswa' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'keterangan'      => [
                'type'           => 'ENUM',
                'constraint'     => ['berlangsung', 'lulus', 'tidak lulus'],
                'default'        => 'berlangsung',
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

        // Membuat tabel news
        $this->forge->addForeignKey('nim_mahasiswa', 'mahasiswa', 'nim', 'CASCADE', 'CASCADE');
        $this->forge->createTable('semester', TRUE);
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('semester');
    }
}
