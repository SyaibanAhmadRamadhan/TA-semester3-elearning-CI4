<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dosen extends Migration
{
	public function up()
	{
		$this->db->disableForeignKeyChecks();
		$this->forge->addField([
			'nip' => [
				'type' => 'VARCHAR',
				'constraint' => 20,
				'auto_increment' => true
			],
			'kode_dosen' => [
				'type' => 'VARCHAR',
				'constraint' => 20,
			],
			'name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'email'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'kode_jurusan'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
				'null'			 => true
			],
			'asal_universitas'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'no_telepon'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100'
			],
			'gender'       => [
				'type'           => 'ENUM',
				'constraint'     => ['pria', 'wanita']
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
		$this->forge->addKey('nip', TRUE);

		// Membuat tabel dosen
		$this->forge->addForeignKey('kode_jurusan', 'jurusan', 'kode', 'CASCADE', 'CASCADE');
		$this->forge->createTable('dosen', TRUE);
		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		$this->forge->dropTable('dosen');
	}
}
