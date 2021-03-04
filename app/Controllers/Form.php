<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Form extends Controller
{
    public function index()
    {
        helper(['form', 'url']);

        if (!$this->validate([])) {
            echo view('Signup', ['validation' => $this->validator]);
            
            echo '<pre>';
            var_dump($this->validator);
            exit('Falhou...');

        } else {
            echo view('Success');

            echo '<pre>';
            var_dump($this->validate([]));
            exit('Passou...');
        }
    }
}
