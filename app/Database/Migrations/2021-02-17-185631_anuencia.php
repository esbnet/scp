<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Anuencia extends Migration
{
	public function up() {

		//
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE,
			],
			'ProvimentoId' => [
				'type'           => 'INT',
				'constraint'     => 5,
			],

			'DataAnuencia' => [
				'type'           => 'DATE',
			],


		]);

		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('scp_Anuencia');
	}

	//--------------------------------------------------------------------
	public function down() {
		//
		$this->forge->dropTable('scp_Anuencia');
	}
}
