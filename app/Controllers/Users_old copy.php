<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Users extends Controller
{
    public function layout()
    {
        echo view('layout/header');
        echo view('carencias/form');
        echo view('layout/footer');
    }

    public function index()
    {
        $modelUser = new UserModel();

        $data = [
            'title' => 'Usuários cadastrados',
            'styles' => [
                'vendor/datatables/dataTables.bootstrap4.min.css',
            ],
            'scripts' => [
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js',
            ],
            'users' => $modelUser->getAllUsers(),
        ];

        // echo '<pre>';
        // print_r($data['users']);        
        // exit('Parada forçada...');

        echo view('layout/header', $data);
        echo view('users/index');
        echo view('layout/footer');
    }

    public function logout()
    {
        $data['session'] = \Config\Services::session();
        $data['session']->destroy();
        return redirect('login');
    }

    public function edit($user_id = NULL)
    {

        helper(['form', 'url']);

        $modelUser = new UserModel();

        $data = [
            'title' => 'Editar userário',
            'user' => $modelUser->getUserById($user_id),
        ];

        // echo '<pre>';
        // var_dump($this->validate([]));        
        // exit('Parada forçada...');

        if (empty($data['user'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Não foi possível encontrar o usuário: ' . $user_id);
        }

        echo view('layout/header', $data);
        echo view('users/edit');
        echo view('layout/footer');
    }

    public function new()
    {

        helper(['form', 'url']);

        $data = [
            'title' => 'Inserir userário',
        ];

        echo view('layout/header', $data);
        echo view('users/edit');
        echo view('layout/footer');
    }

    public function store()
    {
        $modelUser = new UserModel();
        helper(['form', 'url']);

        $val = $this->validate([
            'user_user' => ['label' => 'Usuário', 'rules' => 'required|min_length[5]|max_length[20]|is_unique[user.user_user,user_user]'],
            'user_name' => ['label' => 'Nome', 'rules' => 'required|min_length[5]|max_length[70]'],
            'user_password' => ['label' => 'Senha', 'rules' => 'required|min_length[5]|max_length[15]'],
            'user_confirm' => ['label' => 'Confirmação', 'rules' => 'required|min_length[5]|max_length[15]|matches[user_password]'],
            'user_group_id' => ['label' => 'Grupo', 'rules' => 'required|numeric'],
        ]);

        if ($val) {

            $modelUser->save([
                'user_id' => $this->request->getVar('user_id'),
                'user_user' => $this->request->getVar('user_user'),
                'user_name' => $this->request->getVar('user_name'),
                'user_password' => $this->request->getVar('user_password'),
                'user_group_id' => $this->request->getVar('user_group_id'),
            ]);

            return redirect('users');
        } else {
            $data = ['title' => 'Erro ao Gravar o Usuário'];
            $retorno_erros = [\Config\Services::validation()->getErrors()];

            echo '<pre>';
            print_r($data);        
            exit('Parada forçada...');

            echo view('layout/header');
            echo view('users/edit', $data, $retorno_erros[0]);
            echo view('layout/footer');
        }
    }

    //Apaga um registro com Id específico
    public function delete($user_id)
    {

        // echo '<pre>';
        // print_r($user_id);        
        // exit('Parada forçada...');


        // $data['session'] = \Config\Services::session();

        $model = new UserModel();

        $model->delete($user_id);

        return redirect('users');
    }
}


// 'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
// 'email'            => ['type' => 'varchar', 'constraint' => 255],
// 'username'         => ['type' => 'varchar', 'constraint' => 30, 'null' => true],
// 'password_hash'    => ['type' => 'varchar', 'constraint' => 255],
// 'reset_hash'       => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
// 'reset_at'         => ['type' => 'datetime', 'null' => true],
// 'reset_expires'    => ['type' => 'datetime', 'null' => true],
// 'activate_hash'    => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
// 'status'           => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
// 'status_message'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
// 'active'           => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 0],
// 'force_pass_reset' => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 0],
// 'created_at'       => ['type' => 'datetime', 'null' => true],
// 'updated_at'       => ['type' => 'datetime', 'null' => true],
// 'deleted_at'       => ['type' => 'datetime', 'null' => true],
