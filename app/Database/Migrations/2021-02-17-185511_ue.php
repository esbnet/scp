<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ue extends Migration {

	public function up() {

		$this->forge->addField([

			'id' => [
				'type'           => 'INT',
				'unsigned'       => TRUE,
			],

			'nte_id' => [
				'type'           => 'INT',
				'unsigned'       => TRUE,
			],

			'ou' => [
				'type'           => 'INT',
			],

			'ue' => [
				'type'           => 'VARCHAR',
				'constraint'     => 200,
			],

			'municipio' => [
				'type'           => 'VARCHAR',
				'constraint'     => 150,
			],

			'tipo' => [
				'type'           => 'VARCHAR',
				'constraint'     => 50,
			],

			'departamento_administrativo' => [
				'type'           => 'VARCHAR',
				'constraint'     => 50,
			],

			'situacao' => [
				'type'           => 'VARCHAR',
				'constraint'     => 50,
			],

		]);

		$this->forge->addKey('id', TRUE);

		$this->forge->addForeignKey('nte_id', 'scp_nte', 'id');

		$this->forge->createTable('scp_ue');
	}

	//--------------------------------------------------------------------
	public function down() {

		$this->forge->dropTable('scp_ue');

	}
}
