<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Provimento extends Migration
{

	public function up()
	{

		$this->forge->addField([

			'id' => [
				'type'           => 'INT',
				'unsigned'       => TRUE,
				'auto_increment' => TRUE,
			],
			'ue_id' => [
				'type'           => 'INT',
				'unsigned'       => TRUE,
			],
			'matricula' => [
				'type'           => 'INT',
				'unsigned'       => TRUE,
			],
			'aula_normal' => [
				'type'           => 'BOOL',
			],
			'aula_extra' => [
				'type'           => 'BOOL',
			],
			'forma_suprimento_id' => [
				'type'           => 'INT',
				'unsigned'       => TRUE,
			],
			'tipo_movimentacao_id' => [
				'type'           => 'INT',
				'unsigned'       => TRUE,
			],
			'anuencia' => [
				'type'           => 'BOOL',
			],
			'data_anuencia' => [
				'type'      => 'timestamp',
			],
			'assuncao' => [
				'type'           => 'BOOL',
			],
			'data_assuncao' => [
				'type'      => 'timestamp',
			],
			'user_id' => [
				'type'           => 'INT',
				'unsigned'       => TRUE,
			],
			'data_lancamento' => [
				'type'      => 'timestamp'
			],
			'desistencia' => [
				'type'           => 'BOOL',
			],
			'observacao' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],

		]);

		$this->forge->addKey('id', TRUE);
		
		$this->forge->addForeignKey('matricula','scp_professor','matricula');
		$this->forge->addForeignKey('forma_suprimento_id','scp_forma_suprimento','id');
		$this->forge->addForeignKey('tipo_movimentacao_id','scp_tipo_movimentacao','id');
		$this->forge->addForeignKey('user_id','users','id');
		// gives CONSTRAINT `TABLENAME_users_foreign` FOREIGN KEY(`users_id`) REFERENCES `users`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
		
		$this->forge->createTable('scp_provimento');
	}
	
	//--------------------------------------------------------------------
	public function down()
	{
		$this->forge->dropTable('scp_provimento');
	}
}
