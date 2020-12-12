<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Manga extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "2") {
            redirect('', 'refresh');
        }
        elseif ($this->session->userdata('id_paket') != "1") {
            redirect('member/home', 'refresh');
        }
        
    }

    public function index()
    {
        $data = array(
            'title' => 'Manga | WebMik',
            'manga' => $this->model_manga->get_all_data(),
        );
        $this->template->load('layouts/templateUser', 'member/manga', $data);
    }

    public function detail($id_manga)
    {        
        $data = array(
            'title' => 'Baca Manga',
            'manga' => $this->model_manga->get_data($id_manga),
            'albums' => $this->model_albums->get_image($id_manga),
            'isi' => 'member/manga/detail/',
            );
            $this->template->load('layouts/templateUser', 'member/detail', $data, FALSE);
    }
}