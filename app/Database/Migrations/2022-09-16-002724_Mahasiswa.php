<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
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
            'name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
            'email'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
            'NISN'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'NPSN'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'no_telepon'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100'
			],
            'gender'       => [
				'type'           => 'ENUM',
				'constraint'     => ['pria','wanita']
			],
            'wali'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100'
			],
			'tgl_lahir' => [
				'type'           => 'TEXT',
				'null'           => true,
			],
			'picture'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
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

		// Membuat tabel mahasiswa
		$this->forge->createTable('mahasiswa', TRUE);
		$this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('mahasiswa');
    }
}
