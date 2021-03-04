<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

//defined('BASEPATH') or exit('Ação não permitida');

class Login extends Controller
{

    public function index()
    {

        // echo "<pre>";
        // print_r($_POST);
        // exit('parada programada...');

        echo view('layout/header_login');
        echo view('Login/index');
    }

    public function auth()
    {
        $model = new UserModel();

        $username = $_POST["user"];
        $passwod = $_POST["password"];

        $data['user'] = $model->getUserName($username);
        $data['session'] = \Config\Services::session();

        if (empty($data['user'])) {

            $this->session->set_flashdata('error', 'Verifique seu usuário ou senha');

            // echo "<pre>";
            // print_r($data['user']);
            // exit('parada programada...');

            return redirect('login');
        } else {
            $sessionData = [
                'user' => $username,
                'logged_in' => TRUE
            ];

            $data['session']->set($sessionData);

            return redirect('home', $data);
        }
    }

    public function logout()
    {
        $data['session'] = \Config\Services::session();
        $data['session']->destroy();
        return redirect('login');
    }
}
