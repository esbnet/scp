<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Professor extends Migration {

	public function up() {

		$this->forge->addField([

			'matricula' => [
				'type'           => 'INT',
				'unsigned'       => TRUE,
				'auto_increment' => TRUE,
			],

			'matricula_sap' => [
				'type'           => 'VARCHAR',
				'constraint'     => 9,
			],

			'cpf' => [
				'type'           => 'INT',
				'constraint'     => 11,
			],

			'nome' => [
				'type'           => 'VARCHAR',
				'constraint'     => 150,
			],

			'cargo' => [
				'type'           => 'VARCHAR',
				'constraint'     => 150,
			],

			'vinculo' => [
				'type'           => 'VARCHAR',	
				'constraint'     => 30,
			],

			'licenca_plena' => [
				'type'           => 'VARCHAR',
				'constraint'     => 150,
			],
		]);

		$this->forge->addKey('matricula', TRUE);
		$this->forge->createTable('scp_professor');
	}

	//--------------------------------------------------------------------
	public function down()
	{
		$this->forge->dropTable('scp_professor');
	}
}
