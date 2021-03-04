<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Main extends Controller
{
    public function index()
    {
        helper('form', 'url');

        $data = [];

        if (session()->has('erro')) {
            $data['erro'] = session('erro');
        }
        return view('formulario', $data);
    }

    public function submeter()
    {

        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(site_url('main/index'));
        }

        $val = $this->validate([
            'nome' => 'required',
            'apelido' => 'required'
        ]);

        if (!$val) {
            //return redirect()->back()->withInput()->with('erro', $this->validator);
            return redirect()->back()->with('erro', $this->validator->listErrors())->withInput();
        } else {
            //sucesso na validação
            echo 'Fomulário ok!';
        }
    }
}
