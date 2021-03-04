<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Desistencia extends Migration {

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

			'DataDesistencia' => [
				'type'           => 'DATE',
			],

			'UserId' => [
				'type'           => 'INT',
				'constraint'     => 2,
			],

			'DataLanc' => [
				'type'           => 'DATE',
			],

		]);

		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('scp_Desistencia');
	}

	//--------------------------------------------------------------------
	public function down() {
		//
		$this->forge->dropTable('scp_Desistencia');
	}

}
