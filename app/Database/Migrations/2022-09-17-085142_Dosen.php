<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dosen extends Migration
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
            'nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'alamat'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 100
			],
			'tgl_lahir' => [
				'type'           => 'TEXT',
				'null'           => true,
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
		$this->forge->createTable('dosen', TRUE);
		$this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('dosen');
    }
}
