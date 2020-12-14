<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends MY_Controller
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
            'title' => 'Profile | WebMik',
            'user' => $this->Model_kelolauser->getAllUser(),
        );
        $this->template->load('layouts/template', 'admin/profile', $data);
    }

    //Update one item
    public function edit( $id = NULL )
    {
        $data = array(
            'id' => $id,
            'username' => $this->input->post('username'),
            'id_role' => $this->input->post('id_role'),
            'id_paket' => $this->input->post('id_paket'),
        );
        $this->Model_kelolauser->edit($data);
        $this->session->set_flashdata('alerts', 'Data Berhasil Diedit !!!');
        redirect('admin/kelolaUser');
    }

    //Delete one item
    public function delete( $id = NULL )
    {
        $data = array('id'=>$id);
        $this->Model_kelolauser->delete($data);
        $this->session->set_flashdata('alerts', 'Data Berhasil Dihapus !!!');
        redirect('admin/kelolaUser');
    }
}