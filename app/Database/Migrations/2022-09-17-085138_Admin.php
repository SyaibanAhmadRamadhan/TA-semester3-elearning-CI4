<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
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
            'email'       => [
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

		// Membuat tabel news
		$this->forge->createTable('admin', TRUE);
		$this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('admin');
    }
}
