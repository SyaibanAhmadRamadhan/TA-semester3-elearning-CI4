<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
    public function up()
    {
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
				'constraint'     => 100,
				'default'        => 'John Doe',
			],
			'tgl_lahir' => [
				'type'           => 'TEXT',
				'null'           => true,
			],
			'role'      => [
				'type'           => 'ENUM',
				'constraint'     => ['admin', 'mahasiswa','dosen'],
				'default'        => 'mahasiswa',
			],
        ]);

        // Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel news
		$this->forge->createTable('mahasiswa', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('mahasiswa');
    }
}
