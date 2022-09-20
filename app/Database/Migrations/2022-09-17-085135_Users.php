<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id' => [
                'type'=>'INT',
                'constraint' => 5,
                'unsigned'       => true,
				'auto_increment' => true
            ],
            'id_admin' => [
                'type'=>'INT',
                'constraint' => 12,
                'unsigned'       => true,
                'null'=>true
            ],
            'id_dosen' => [
                'type'=>'INT',
                'constraint' => 12,
                'unsigned'       => true,
                'null'=>true
            ],
            'id_mahasiswa' => [
                'type'=>'INT',
                'constraint' => 12,
                'unsigned'       => true,
                'null'=>true
            ],
			'role'      => [
				'type'           => 'ENUM',
				'constraint'     => ['admin', 'mahasiswa','dosen'],
				'default'        => 'mahasiswa',
			],
			'password'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'created_at' => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			]

        ]);

        // Membuat primary key
		$this->forge->addKey('id', TRUE);

        $this->forge->addForeignKey('id_admin','admin','id','CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_dosen','dosen','id','CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_mahasiswa','mahasiswa','id','CASCADE', 'CASCADE');
		// Membuat tabel mahasiswa
		$this->forge->createTable('user', TRUE);
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}