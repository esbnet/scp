<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Login extends Controller {

    public function login() {
        echo view('login');    
    }

    public function check() {

        $model = new UserModel();

        $user = $_POST["user"];
        $passwod = $_POST["password"];

        $data['users'] = $model->getUserById($user);
        $data['session'] = \Config\Services::session();

        if(empty($data['users'])) {
            return redirect('login');
        } else {
            $sessionData = [
                'user' => $user,
                'logged_in' => TRUE
            ];

            $data['session']->set($sessionData);

            return redirect('home', $data);
        }
    }
}
