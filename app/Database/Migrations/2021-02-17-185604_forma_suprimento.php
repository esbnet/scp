<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FormaSuprimento extends Migration {
	
	public function up() {

		$this->forge->addField([

			'id' => [
				'type'           => 'INT',
				'unsigned'       => TRUE,
				'auto_increment' => TRUE,
			],

			'Nome' => [
				'type'           => 'VARCHAR',
				'constraint'     => 50,
			],

		]);

		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('scp_forma_suprimento');
	}

	//--------------------------------------------------------------------
	public function down() {

		$this->forge->dropTable('scp_forma_suprimento');

	}

}
