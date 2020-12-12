<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
class Akses extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $thisalerts;
        if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }
    }

    // List all your items
    public function index()
    {
        $data = array(
            'title' => 'Hak Akses | WebMik',
            'akses' => $this->Model_akses->getAllAkses(),
        );
        $this->template->load('layouts/template', 'admin/akses', $data);
    }

    // Add a new item
    public function add()
    {
        $data = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
        );
        $this->Model_akses->Add($data);
        $this->session->set_flashdata('alerts', 'Data Berhasil Di tambahkan !!!');
        redirect('admin/akses');
    }

    //Update one item
    public function edit( $id_genre = NULL )
    {
        $data = array(
            'id' => $id,
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
        );
        $this->Model_akses->edit($data);
        $this->session->set_flashdata('alerts', 'Data Berhasil Diedit !!!');
        redirect('admin/akses');
    }

    //Delete one item
    public function delete( $id = NULL )
    {
        $data = array('id'=>$id);
        $this->Model_akses->delete($data);
        $this->session->set_flashdata('alerts', 'Data Berhasil Dihapus !!!');
        redirect('admin/akses');
    }
}