<?php

namespace App\Models;

defined('BASEPATH') or exit('Ação não permitida');

use CodeIgniter\Model;

class CoreModel extends Model
{

  public function get_All($table = NULL, $condicao = NULL)
  {
    if ($table) {

      if (is_array($condicao)) {

        $this->asArray()->where($condicao);
      }

      return $this->asArray()->get($table)->result();
    } else {

      return FALSE;
    }
  }

  public function get_By_id($table, $condicao)
  {

    if ($table && is_array($condicao)) {
      $this->asArray()->where($condicao);
      $this->asArray()->limit(1);

      return $this->asArray()->get($table)->row();
    } else {
      return FALSE;
    }
  }

  public function insert($table = NULL, $data = NULL, $get_last_id = NULL)
  {

    if ($table && is_array($data)) {
      $this->asArray()->insert($table, $data);

      if ($get_last_id) {
        $this->session->set_userdata('last_id', $this->asArray()->insert_id());
      }

      if ($this->asArray()->affected_rows > 0) {
        $this->asArray()->set_flashsata('sucesso', 'Dados registrados com sucesso!');
      } else {
        $this->asArray()->set_flashsata('error', 'Erro ao tentar registrar os dados!');
      }
    } else {
      return FALSE;
    }
  }

  public function update_($table = NULL, $data = NULL, $condicao = NULL)
  {

    if ($table && is_array($data) && is_array($condicao)) {

      if ($this->asArray()->update($table, $data, $condicao)) {
        $this->session->set_flashdata('sucesso', 'Dados registrados com sucesso');
      } else {
        $this->session->set_flashdata('erro', 'Erro ao tentar atualizar os dados');
      }
    } else {
      return FALSE;
    }
  }

  public function delete($table = NULL, $condicao = NULL)
  {
    $this->db_debug = FALSE;

    if ($table && is_array($condicao)) {

      $status = $this->delete($table, $condicao);

      $error = $this->error();

      if (!$status) {
        foreach ($error as $code) {
          if ($code == 1451) {
            $this->session->set_flashdata('error', 'Esse registro não poderá ser excluido, pois está sendo utilizado em outra tabela');
          }
        }
      } else {
        $this->session->set_flashdata('sucesso', 'Registro apagado com sucesso');
      }
      $this->db_debug = FALSE;
    } else {
      return FALSE;
    }
  }
}
