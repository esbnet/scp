<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Book_model;
class Book extends Controller {

    public function index() {

        helper(['form', 'url']);
        $this->Book_model = new Book_model();
        $data['books'] = $this->Book_model->get_all_books();
        return view('book_view', $data);
    }

    public function book_add() {

        helper(['form', 'url']);
        $this->Book_model = new Book_model();

        $data = array(
            'book_isbn' => $this->request->getPost('book_isbn'),
            'book_title' => $this->request->getPost('book_title'),
            'book_author' => $this->request->getPost('book_author'),
            'book_category' => $this->request->getPost('book_category'),
        );
        $insert = $this->Book_model->book_add($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_edit($id) {

        $this->Book_model = new Book_model();

        $data = $this->Book_model->get_by_id($id);

        echo json_encode($data);
    }

    public function book_update() {

        helper(['form', 'url']);
        $this->Book_model = new Book_model();

        $data = array(
            'book_isbn' => $this->request->getPost('book_isbn'),
            'book_title' => $this->request->getPost('book_title'),
            'book_author' => $this->request->getPost('book_author'),
            'book_category' => $this->request->getPost('book_category'),
        );
        $this->Book_model->book_update(array('book_id' => $this->request->getPost('book_id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function book_delete($id) {

        helper(['form', 'url']);
        $this->Book_model = new Book_model();
        $this->Book_model->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

}