<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Lancamento_Carencia extends Migration
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
			'matricula' => [
				'type'           => 'INT',
				'unsigned'       => TRUE,
				'null' 			 => TRUE,
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
				'type'           => 'BOOL',
			],
			
			'inicio_afastamento' => [
				'type'			 => 'Timestamp',
			],
			'termino_afastamento' => [
				'type'			 => 'Timestamp',
			],
			'motivo_vaga_id' => [
				'type'			 => 'INT',
				'unsigned'       => TRUE,
			],

			'user_id' => [
				'type'           => 'INT',
			],

			'tipo_lancamento_id' => [
				'type'           => 'INT',
			],

			'lancamento_id' => [
				'type'           => 'INT',
			],

			'data_lancamento' => [
				'type'           => 'Timestamp',
			],
			'observacao' => [
				'type'           => 'VARCHAR',
				'constraint'     => 150,
			],

		]);

		$this->forge->addKey('id', TRUE);

		// $this->forge->addForeignKey('ue_id', 'scp_ue', 'ue_id');
		$this->forge->addForeignKey('disciplina_id', 'scp_disciplina', 'id');
		$this->forge->addForeignKey('matricula', 'scp_professor', 'matricula');
		$this->forge->addForeignKey('motivo_vaga_id', 'scp_motivo_carencia', 'id');

		$this->forge->createTable('scp_lancamento_carencia');
	}

	//--------------------------------------------------------------------
	public function down()
	{
		//
		$this->forge->dropTable('scp_lancamento_carencia');
	}
}
