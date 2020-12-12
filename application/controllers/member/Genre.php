<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Genre extends MY_Controller
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
            'title' => 'Genre | WebMik',
            'genre' => $this->model_genre->getAllGenre(),
        );
        $this->template->load('layouts/templateUser', 'member/genre', $data);
    }
}