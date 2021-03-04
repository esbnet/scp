<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TipoMovimentacao extends Migration {

	public function up() {

		$this->forge->addField([

			'id' => [
				'type'           => 'INT',
				'constraint'     => 9,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE,
			],
			'Nome' => [
				'type'           => 'VARCHAR',
				'constraint'     => 20,
			],
			'Temp' => [
				'type'           => 'BOOL',
			],


		]);

		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('scp_tipo_movimentacao');
	}

	//--------------------------------------------------------------------
	public function down() {

		$this->forge->dropTable('scp_tipo_movimentacao');

	}
}
