<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Nte extends Migration {

	public function up() {

		$this->forge->addField([

			'id' => [
				'type'           => 'INT',
				'constraint'     => 9,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE,
			],

			'nome' => [
				'type'           => 'VARCHAR',
				'constraint'     => 50,
			],


		]);

		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('scp_Nte');
	}

	//--------------------------------------------------------------------
	public function down() {

		$this->forge->dropTable('scp_Nte');

	}
}
