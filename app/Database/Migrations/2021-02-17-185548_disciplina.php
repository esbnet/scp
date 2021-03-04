<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Disciplina extends Migration
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
            'nome' => [
                'type'           => 'VARCHAR',
                'constraint'     => 60,
            ],
            'area' => [
                'type'           => 'VARCHAR',
                'constraint'     => 30,
            ],
            'polo_id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'null'           => true
                
            ],

        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('polo_id','scp_polo','id');
        $this->forge->createTable('scp_disciplina');

    }

    //--------------------------------------------------------------------
    public function down()
    {
        //
        $this->forge->dropTable('scp_disciplina');
    }
}
