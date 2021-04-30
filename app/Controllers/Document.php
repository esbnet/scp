<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Document extends Controller {

    public function cadastro_usuario() {
        $data = ['title' => 'Cadastro de Usuário',];
        echo view('layout/header', $data);
        echo view('document/cadastro_usuario');
        echo view('layout/footer');
    }

    public function carencia_inclusao() {
        $data = ['title' => 'Inclusão de Carência',];
        echo view('layout/header', $data);
        echo view('document/carencia_inclusao');
        echo view('layout/footer');
    }

    public function carencia_alteracao() {
        $data = ['title' => 'Alteração de Carência',];
        echo view('layout/header', $data);
        echo view('document/carencia_alteracao');
        echo view('layout/footer');
    }

    public function carencia_exclusao() {
        $data = ['title' => 'Exclusão de Carência',];
        echo view('layout/header', $data);
        echo view('document/carencia_exclusao');
        echo view('layout/footer');
    }

    public function carencia_pesquisa() {
        $data = ['title' => 'Pesquisa de Carência',];
        echo view('layout/header', $data);
        echo view('document/carencia_pesquisa');
        echo view('layout/footer');
    }

    public function carencia_relatorio() {
        $data = ['title' => 'Cadastro de Usuário',];
        echo view('layout/header', $data);
        echo view('document/carencia_relatorio');
        echo view('layout/footer');
    }

    //PROVIMENTO
    public function provimento_inclusao() {
        $data = ['title' => 'Cadastro de Usuário',];
        echo view('layout/header', $data);
        echo view('document/cadastro_usuario');
        echo view('layout/footer');
    }

    public function provimento_alteracao() {
        $data = ['title' => 'Cadastro de Usuário',];
        echo view('layout/header', $data);
        echo view('document/cadastro_usuario');
        echo view('layout/footer');
    }

    public function provimento_exclusao() {
        $data = ['title' => 'Cadastro de Usuário',];
        echo view('layout/header', $data);
        echo view('document/cadastro_usuario');
        echo view('layout/footer');
    }

    public function provimento_pesquisa() {
        $data = ['title' => 'Cadastro de Usuário',];
        echo view('layout/header', $data);
        echo view('document/cadastro_usuario');
        echo view('layout/footer');
    }

    public function provimento_relatorio() {
        $data = ['title' => 'Cadastro de Usuário',];
        echo view('layout/header', $data);
        echo view('document/cadastro_usuario');
        echo view('layout/footer');
    }

}