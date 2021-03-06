<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Polo extends Migration {

	public function up() {

		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'unsigned'       => TRUE,
				'auto_increment' => TRUE,
			],
			'Nome' => [
				'type'           => 'VARCHAR',
				'constraint'     => 60,
			],

		]);

		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('scp_polo'); 
	}

	//--------------------------------------------------------------------
	public function down() {
		//
		$this->forge->dropTable('scp_polo');
	}

}
