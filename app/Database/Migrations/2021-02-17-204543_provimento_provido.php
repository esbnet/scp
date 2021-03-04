<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Provimento_Provido extends Migration
{
	public function up()
	{
		//
		
		$this->forge->addField([

			'id' => [
				'type'           => 'INT',
				'unsigned'       => TRUE,
				'auto_increment' => TRUE,
			],
			'provimento_id' => [
				'type'           => 'INT',
				'unsigned'       => TRUE,
			],
			'disciplina_id' => [
				'type'           => 'INT',
				'unsigned'       => TRUE,
			],
			'mat' => [
				'type'           => 'INT',
				'constraint'     => 2,
			],
			'vesp' => [
				'type'           => 'INT',
				'constraint'     => 2,
			],
			'not' => [
				'type'           => 'INT',
				'constraint'     => 2,
			],
			'total' => [
				'type'           => 'INT',
				'constraint'     => 2,
			],
			'mat_old' => [
				'type'           => 'INT',
				'constraint'     => 2,
			],
			'vesp_old' => [
				'type'           => 'INT',
				'constraint'     => 2,
			],
			'not_old' => [
				'type'           => 'INT',
				'constraint'     => 2,
			],
			'total_old' => [
				'type'           => 'INT',
				'constraint'     => 2,
			],
			'carencia_old_id' => [
				'type'           => 'INT',
				'unsigned'       => TRUE,
			],

		]);

		$this->forge->addKey('id', TRUE);

		$this->forge->addForeignKey('provimento_id','scp_provimento','id');
		$this->forge->addForeignKey('disciplina_id','scp_disciplina','id');
		
		$this->forge->createTable('scp_provimento_provido');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('scp_provimento_provido');
	}
}
