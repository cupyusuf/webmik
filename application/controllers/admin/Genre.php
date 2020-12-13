<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
class Genre extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }
    }

    // List all your items
    public function index()
    {
        $data = array(
            'title' => 'Genre | WebMik',
            'genre' => $this->model_genre->getAllGenre(),
        );
        $this->template->load('layouts/template', 'admin/genre', $data);
    }

    // Add a new item
    public function add()
    {
        $data = array(
            'name_genre' => $this->input->post('name_genre'),
        );
        $this->model_genre->Add($data);
        $this->session->set_flashdata('alerts', 'Genre Berhasil Ditambahkan !!!');
        redirect('admin/genre');
    }

    //Update one item
    public function edit( $id_genre = NULL )
    {
        $data = array(
            'id_genre' => $id_genre,
            'name_genre' => $this->input->post('name_genre'),
        );
        $this->Model_genre->edit($data);
        $this->session->set_flashdata('alerts', 'Genre Berhasil Diedit !!!');
        redirect('admin/genre');
    }

    //Delete one item
    public function delete( $id_genre = NULL )
    {
        $data = array('id_genre'=>$id_genre);
        $this->Model_genre->delete($data);
        $this->session->set_flashdata('alerts', 'Genre Berhasil Dihapus !!!');
        redirect('admin/genre');
    }
}