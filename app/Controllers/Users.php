<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MyUserModel;
use Myth\Auth\Authorization\GroupModel;

class Users extends Controller
{

  public function index()
  {

    $modelUser = new MyUserModel();

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
      'users' => $modelUser->listUsers(),
    ];

    echo view('layout/header', $data);
    echo view('users/index');
    echo view('layout/footer');
  }

  public function edit($id = NULL)
  {

    helper(['form', 'url']);

    $modelUser = new MyUserModel();
    $modelGroup = new GroupModel();

    if (!$id || !$modelUser->getUserById($id)) {

      exit('Usuário não encontrado - User - edit' . $id);
    } else {

      $data = [
        'title' => 'Editar o usuário',
        'user' => $modelUser->getUserById($id),
        'group' => $modelGroup->getGroupsForUser($id),
      ];
      
      // echo '<pre>';
      // print_r($data['group']);
      // exit('Parada programada - User edit'); 

      echo view('layout/header', $data);
      echo view('users/edit');
      echo view('layout/footer');
    }
  }

/*   public function store()
  {
    $modelUser = new MyUserModel();
    helper(['form', 'url']);

    $val = $this->validate([
      'username' => ['label' => 'Usuário', 'rules' => 'required|min_length[5]|max_length[20]|is_unique[user.username,username]'],
      'email' => ['label' => 'E-mail', 'rules' => 'required|min_length[5]|max_length[70]'],
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
  } */

  
}
