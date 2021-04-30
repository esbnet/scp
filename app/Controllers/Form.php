<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Form extends Controller
{
    public function index()
    {
        helper(['form', 'url', 'auth']);

        if (!$this->validate([])) {
            echo view('form/Signup', ['validation' => $this->validator,]);
        } else {
            echo view('form/Success');
        }
    }
}
