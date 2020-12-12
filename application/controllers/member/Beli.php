<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beli extends MY_Controller
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
            'title' => 'Beli Manga | WebMik',
        );
    	$this->template->load('layouts/templateUser', 'member/beli', $data);
    }
}