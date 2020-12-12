<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends MY_Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Home | WebMik',
            'manga' => $this->model_home->get_all_data(),
        );
        $this->template->load('layout/template', 'home_page', $data);
    }

    public function bacamanga($id_manga)
    {
        $data = array(
			'title' => 'Baca Manga | WebMik',
			'manga' => $this->model_manga->get_data($id_manga),
		);
        $this->template->load('layout/template', 'bacamanga', $data);
	}

    public function contact()
    {
        $data = array(
			'title' => 'Contact | WebMik',
        );
        $this->template->load('layout/template', 'contact', $data);
	}
	
	public function manga()
    {
        $data = array(
			'title' => 'Manga Gratis | WebMik',
			'fmanga' => $this->model_post->get_all_data(),
        );
        $this->template->load('layout/template', 'manga', $data);
	}

	public function vmanga($id_article)
    {
        $data = array(
			'title' => 'Baca Manga | WebMik',
			'manga' => $this->model_post->get_manga($id_article),
		);
        $this->template->load('layout/template', 'vmanga', $data);
	}
	
	public function donasi()
    {
        $data = array(
            'title' => 'Donasi | WebMik',
        );
        $this->template->load('layout/template', 'donasi', $data);
    }
}

/* End of file Home.php */