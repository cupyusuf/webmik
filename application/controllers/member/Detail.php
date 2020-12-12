<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Detail extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "2") {
            redirect('', 'refresh');
        }
    }

    public function index($id_manga)
    {
        $data = array(
            'title' => 'Detail Manga | WebMik',
            'manga' => $this->model_manga->get_data($id_manga),
        );
        $this->template->load('layouts/templateUser', 'member/detail', $data);
    }
}