<?php

namespace App\Models;

use CodeIgniter\Model;

class ProvimentoModel extends Model
{

    protected $table = 'scp_provimento';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id',
        'ue_id',
        'matricula_id',
        'aula_normal',
        'aula_extra',
        'forma_suprimento_id',
        'tipo_movimentacao_id',
        'anuencia',
        'data_anuencia',
        'assuncao',
        'data_assuncao',
        'user_id',
        'data_lancamento',
        'desistencia',
        'observacao',
    ];

    public function getProvimento($id = NULL)
    {
        return  $this->select([
            'scp_provimento.id as provimento_id',
            'scp_provimento.aula_normal',
            'scp_provimento.aula_extra',
            'scp_provimento.anuencia',
            'scp_provimento.data_anuencia',
            'scp_provimento.assuncao',
            'scp_provimento.data_assuncao',
            'scp_provimento.forma_suprimento_id',
            'scp_provimento.tipo_movimentacao_id',
            'scp_provimento.observacao',

            'scp_ue.id as ue_id',
            'scp_ue.ou',
            'scp_ue.ue',
            'scp_ue.municipio',
            'scp_ue.nte_id',

            'scp_professor.matricula AS professor_matricula',
            'scp_professor.nome AS professor_nome',
            'scp_professor.vinculo',
            'scp_professor.matricula_sap AS professor_matricula_sap',
            'scp_professor.cpf',
            'scp_professor.licenca_plena',
            
            'scp_forma_suprimento.nome AS forma_suprimento_nome',

            'scp_tipo_movimentacao.nome AS tipo_movimentacao_nome',

        ])  ->where(['scp_provimento.id' => $id])
            ->join('scp_ue', 'scp_ue.id = scp_provimento.ue_id', 'left')
            ->join('scp_professor', 'scp_professor.matricula = scp_provimento.matricula_id', 'left')
            ->join('scp_forma_suprimento', 'scp_forma_suprimento.id = scp_provimento.forma_suprimento_id', 'left')
            ->join('scp_tipo_movimentacao', 'scp_tipo_movimentacao.id = scp_provimento.tipo_movimentacao_id', 'left')
            ->first();
    }

    public function getProvimentoIndex($id = NULL)
    {
        if ($id === NULL) {

            return  $this->select([
                'scp_provimento.id',
                'scp_provimento.ue_id',
                'scp_provimento.matricula_id',
                'scp_provimento.assuncao',
                'scp_provimento.data_assuncao',
                'scp_ue.ue',
                'scp_professor.nome AS professor_nome',
                'scp_forma_suprimento.nome forma_suprimento_nome'
            ])
                ->join('scp_ue', 'scp_ue.id = scp_provimento.ue_id', 'left')
                ->join('scp_professor', 'scp_professor.matricula = scp_provimento.matricula_id', 'left')
                ->join('scp_forma_suprimento', 'scp_forma_suprimento.id = scp_provimento.forma_suprimento_id', 'left')
                ->findAll();
        } else {

            return $this->asArray()
                ->where(['id' => $id])
                ->first();
        }
    }

}
