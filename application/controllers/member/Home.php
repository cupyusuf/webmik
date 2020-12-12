<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "2") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data = array(
            'title' => 'Dasbor | WebMik',
            'total_genre' => $this->model_dasbor->total_genre(),
            'total_manga' => $this->model_dasbor->total_manga(),
            'total_pengguna' => $this->model_dasbor->total_pengguna(),
            'total_posting' => $this->model_dasbor->total_posting(),
        );
        $this->template->load('layouts/templateUser', 'member/dashboard', $data);
    }
}