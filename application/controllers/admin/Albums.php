<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
class Albums extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }
    }    

    public function index()
    {
        $data = array(
            'title' => 'Kelola Albums Manga | WebMik',
            'manga' => $this->model_albums->get_all_data(),
        );
        $this->template->load('layouts/template', 'admin/albums/index', $data);
    }

    public function add($id_manga)
    {
        $this->form_validation->set_rules('info','Info Image','required',array('required' => '%s please fill out this field')    
        );
        
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/uploads/albums/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);

            $field_name = "image";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => ' Add Image Manga',
                    'error_upload' => $this->upload->display_errors(),
                    'manga' => $this->model_manga->get_data($id_manga),
                    'albums' => $this->model_albums->get_image($id_manga),
                    'isi' => 'admin/albums/add',
                );
                $this->template->load('layouts/template', 'admin/albums/add', $data, FALSE);
            } else {
                $upload_data = array('uploads'=> $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/uploads/albums/' . $upload_data['uploads'][filename];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_manga' => $id_manga,
                    'info' => $this->input->post('info'),
                    'image' => $upload_data['uploads']['file_name'],
                );
                $this->model_albums->add($data);
                $this->session->set_flashdata('alerts', 'Gambar Berhasil Ditambahkan !!!');
                redirect('admin/albums/add/' . $id_manga);
            }
        } 
        
        $data = array(
            'title' => ' Add Image Manga',
            'manga' => $this->model_manga->get_data($id_manga),
            'albums' => $this->model_albums->get_image($id_manga),
            'isi' => 'admin/albums/add/',
            );
            $this->template->load('layouts/template', 'admin/albums/add', $data,FALSE);
    }

    //Delete one item
    public function delete( $id_manga, $id_image)
    {
        // Delete Image
        $albums = $this->model_albums->get_data($id_image);
        if ($albums->image != "") {
            unlink('./assets/uploads/albums/' . $albums->image);
        }
        // End Delete Image
        $data = array('id_image'=>$id_image);
        $this->model_albums->delete($data);
        $this->session->set_flashdata('alerts', 'Gambar Berhasil Dihapus !!!');
        redirect('admin/albums/add/' . $id_manga);
    }
}