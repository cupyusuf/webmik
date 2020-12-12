<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->model('model_home');
        $this->load->model('model_post');
        $this->load->model('model_post');
        $this->load->model('Model_kelolauser');
        $this->load->model('model_dasbor');
        $this->load->model('model_genre');
        $this->load->model('model_albums');
        $this->load->model('model_manga');
        $this->load->model('Model_akses');
        $this->load->library('upload');
        $this->load->library('form_validation');
        $this->userdata = $this->session->userdata('userdata');
        $this->session->set_flashdata('segment', explode('/', $this->uri->uri_string()));
        $this->load->database();
        // Payment Gateway		
        $params = array('server_key' => 'SB-Mid-server-ACb3fhrTl9FqCZlBhskSB2Wm', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
        $this->load->helper('url');	
        // End payement Gateway
		$this->load->library('veritrans');
        $this->veritrans->config($params);
    }
    public function check_login()
    {
        // pengecekan jika tidak ada email dari session maka diarahkan untuk login
        if (!$this->session->userdata('is_login')) {
            redirect('auth/login');
        }
    }
}