<?php

namespace App\Controllers;

use App\Models\CoreModel;

use CodeIgniter\Controller;

class Ajax extends Controller
{
    public function index()
    {
        redirect('/');
    }

    public function carencias()
    {

        $modelCore = new CoreModel();

        if (!$this->input->is_ajax_request()) {
            redirect('/#');
        } else {
            $busca = $this->input->post('term');
            $data['response'] = 'false';

            $query = $modelCore->auto_complete_carencia($busca);

            if ($query) {
                $data['response'] = 'true';
                $data['message'] = array();

                foreach ($query as $row) {
                    $data['message'][] = array(
                        ['id'] => $row->disciplina_id,
                        ['disciplina'] => $row->disciplina_nome,
                        ['temp'] => $row->temp,
                        ['mat'] => $row->mat,
                        ['vesp'] => $row->vesp,
                        ['not'] => $row->not,
                        ['total'] => $row->total,
                    );
                }

                echo json_encode($data);
            } else {
                echo json_encode($data);
            }
        }
    }
}
