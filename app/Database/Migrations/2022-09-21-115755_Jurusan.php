<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jurusan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kode' => [
                'type'=>'VARCHAR',
                'constraint' => 5,
				'auto_increment' => true
            ],
			'name_jurusan' => [
				'type' => 'VARCHAR',
				'constraint'=> 255,
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
		$this->forge->addKey('kode', TRUE);

		// Membuat tabel mahasiswa
		$this->forge->createTable('jurusan', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('jurusan');
    }
}
