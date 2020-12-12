<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Manga extends MY_Controller
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
            'title' => 'Kelola Manga | WebMik',
            'manga' => $this->model_manga->get_all_data(),
        );
        $this->template->load('layouts/template', 'admin/episode/index', $data);
    }

    // Add a new item
    public function add()
    {
        $this->form_validation->set_rules('name_manga','Judul Manga','required',array('required' => '%s please fill out this field'));
        $this->form_validation->set_rules('id_genre','Genre','required',array('required' => '%s please fill out this field'));
        $this->form_validation->set_rules('description','Description','required',array('required' => '%s please fill out this field'));
        
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/uploads/cover-manga/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);

            $field_name = "sampul_manga";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Add Manga',
                    'genre' => $this->model_genre->getAllGenre(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'admin/episode/add',
                );
                $this->template->load('layouts/template', 'admin/episode/add', $data, FALSE);
            } else {
                $upload_data = array('uploads'=> $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/uploads/cover-manga/' . $upload_data['uploads'][filename];
                $this->load->library('image_lib', $config);
                $data = array(
                    'name_manga' => $this->input->post('name_manga'),
                    'id_genre' => $this->input->post('id_genre'),
                    'description' => $this->input->post('description'),
                    'sampul_manga' => $upload_data['uploads']['file_name'],
                );
                $this->model_manga->add($data);
                $this->session->set_flashdata('msg', 'data added successfully !!!');
                redirect('admin/manga');
            }
        } 
        
        $data = array(
            'title' => 'Add Manga',
            'genre' => $this->model_genre->getAllGenre(),
            'isi' => 'admin/episode/add',
        );
        $this->template->load('layouts/template', 'admin/episode/add', $data, FALSE);
    }

    //Update one item
    public function edit( $id_manga = NULL )
    {
        {
            $this->form_validation->set_rules('name_manga','Judul Manga','required',array('required' => '%s please fill out this field'));
            $this->form_validation->set_rules('id_genre','Genre','required',array('required' => '%s please fill out this field'));
            $this->form_validation->set_rules('description','Description','required',array('required' => '%s please fill out this field'));
            
            if ($this->form_validation->run() == TRUE) {
                $config['upload_path'] = './assets/uploads/cover-manga/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size']     = '2000';
                $this->upload->initialize($config);
    
                $field_name = "sampul_manga";
                if (!$this->upload->do_upload($field_name)) {
                    $data = array(
                        'title' => 'Edit Manga',
                        'genre' => $this->model_genre->getAllGenre(),
                        'manga' => $this->model_manga->get_data($id_manga),
                        'error_upload' => $this->upload->display_errors(),
                        'isi' => 'admin/manga/edit',
                    );
                    $this->template->load('layouts/template', 'admin/episode/edit', $data, FALSE);
                } else {
                    // Delete Image
                    $manga = $this->model_manga->get_data($id_manga);
                    if ($manga->sampul_manga != "") {
                    unlink('./assets/uploads/cover-manga/' . $manga->sampul_manga);
                    }
                    // End Delete Image
                    $upload_data = array('uploads'=> $this->upload->data());
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/uploads/cover-manga/' . $upload_data['uploads'][filename];
                    $this->load->library('image_lib', $config);
                    $data = array(
                        'id_manga' => $id_manga,
                        'name_manga' => $this->input->post('name_manga'),
                        'id_genre' => $this->input->post('id_genre'),
                        'description' => $this->input->post('description'),
                        'sampul_manga' => $upload_data['uploads']['file_name'],
                    );
                    $this->model_manga->edit($data);
                    $this->session->set_flashdata('msg', 'data edited successfully !!!');
                    redirect('admin/manga');
                }
                // otherwise change the image
                $data = array(
                    'id_manga' => $id_manga,
                    'name_manga' => $this->input->post('name_manga'),
                    'id_genre' => $this->input->post('id_genre'),
                    'description' => $this->input->post('description'),
                );
                $this->model_manga->edit($data);
                $this->session->set_flashdata('msg', 'data edited successfully !!!');
                redirect('admin/manga');
            } 
            
            $data = array(
                'title' => 'Edit Manga',
                'genre' => $this->model_genre->getAllGenre(),
                'manga' => $this->model_manga->get_data($id_manga),
                'isi' => 'admin/manga/edit',
            );
            $this->template->load('layouts/template', 'admin/episode/edit', $data, FALSE);
        }
    }

    //Delete one item
    public function delete( $id_manga = NULL )
    {
        // Delete Image
        $manga = $this->model_manga->get_data($id_manga);
        if ($manga->sampul_manga != "") {
            unlink('./assets/uploads/cover-manga/' . $manga->sampul_manga);
        }
        // End Delete Image
        $data = array('id_manga'=>$id_manga);
        $this->model_manga->delete($data);
        $this->session->set_flashdata('msg', 'Data deleted successfully !!!');
        redirect('admin/manga');
    }
}