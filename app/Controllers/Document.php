<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Document extends Controller {

    public function cadastro_usuario() {
        $data = ['title' => 'Como Cadastrar Usuário',];
        echo view('layout/header', $data);
        echo view('document/cadastro_usuario');
        echo view('layout/footer');
    }

    public function carencia_inclusao() {
        $data = ['title' => 'Como Incluir Carência',];
        echo view('layout/header', $data);
        echo view('document/carencia_inclusao');
        echo view('layout/footer');
    }

    public function carencia_alteracao() {
        $data = ['title' => 'Como Alterar Carência',];
        echo view('layout/header', $data);
        echo view('document/carencia_alteracao');
        echo view('layout/footer');
    }

    public function carencia_exclusao() {
        $data = ['title' => 'Como Excluir Carência',];
        echo view('layout/header', $data);
        echo view('document/carencia_exclusao');
        echo view('layout/footer');
    }

    public function carencia_pesquisa() {
        $data = ['title' => 'Como Pesquisa Carência',];
        echo view('layout/header', $data);
        echo view('document/carencia_pesquisa');
        echo view('layout/footer');
    }

    public function carencia_relatorio() {
        $data = ['title' => 'Como Gerar Relatório de Carência',];
        echo view('layout/header', $data);
        echo view('document/carencia_relatorio');
        echo view('layout/footer');
    }

    //PROVIMENTO
    public function provimento_inclusao() {
        $data = ['title' => 'Como Incluir Provimento',];
        echo view('layout/header', $data);
        echo view('document/provimento_inclusao');
        echo view('layout/footer');
    }

    public function provimento_alteracao() {
        $data = ['title' => 'Como Alterar Provimento',];
        echo view('layout/header', $data);
        echo view('document/provimento_alteracao');
        echo view('layout/footer');
    }

    public function provimento_exclusao() {
        $data = ['title' => 'Como Excluir Provimento',];
        echo view('layout/header', $data);
        echo view('document/provimento_exclusao');
        echo view('layout/footer');
    }

    public function provimento_pesquisa() {
        $data = ['title' => 'Como Pesquisar Provimento',];
        echo view('layout/header', $data);
        echo view('document/provimento_pesquisa');
        echo view('layout/footer');
    }

    public function provimento_relatorio() {
        $data = ['title' => 'Como Gerar Relatório de Provimento',];
        echo view('layout/header', $data);
        echo view('document/provimento_relatorio');
        echo view('layout/footer');
    }

}