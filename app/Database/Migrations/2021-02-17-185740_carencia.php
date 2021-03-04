<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Carencia extends Migration
{

	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'unsigned'       => TRUE,
				'auto_increment' => TRUE,
				'null' 			 => FALSE,
			],
			'ue_id' => [
				'type'           => 'INT',
				'unsigned'       => TRUE,
				'null' 			 => FALSE,
			],
			'disciplina_id' => [
				'type'           => 'INT',
				'unsigned'       => TRUE,
				'null' 			 => FALSE,
			],
			'matutino' => [
				'type'           => 'INT',
			],
			'vespertino' => [
				'type'           => 'INT',
			],
			'noturno' => [
				'type'           => 'INT',
			],
			'total' => [
				'type'           => 'INT',
			],
			'temporaria' => [
				'type'           => 'Boolean',
			],
			'data_atualizacao' => [
				'type'           => 'Timestamp',
			],
		]);

		$this->forge->addKey('id', TRUE);

		$this->forge->addForeignKey('ue_id','scp_ue','id');
		$this->forge->addForeignKey('disciplina_id','scp_disciplina','id');
		
		$this->forge->createTable('scp_carencia');
	}

	//--------------------------------------------------------------------
	public function down()
	{
		//
		$this->forge->dropTable('scp_carencia');
	}
}
