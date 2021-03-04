<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class VagaMotivo extends Migration {

	public function up() {

		//
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'unsigned'       => TRUE,
				'auto_increment' => TRUE,
			],
			'Motivo' => [
				'type'           => 'VARCHAR',
				'constraint'     => 60,
			],

			'Temp' => [
				'type'           => 'BOOL',
			],

		]);

		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('scp_motivo_carencia');
	}

	//--------------------------------------------------------------------
	public function down() {
		//
		$this->forge->dropTable('scp_motivo_carencia'); 
	}

}
