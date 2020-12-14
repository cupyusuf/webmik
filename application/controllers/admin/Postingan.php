<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Postingan extends MY_Controller
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
        $data['postingan/add'] = $this->db->get('tbl_article')->result_array();
        $data = array(
            'title' => 'Kelola Manga | WebMik',
            'fmanga' => $this->model_post->get_all_data(),
        );
        $this->template->load('layouts/template', 'admin/posting/index', $data);
    }

    // Add a new item
    public function add()
    {
        $this->form_validation->set_rules('judul','Judul','required');
        $this->form_validation->set_rules('tipe','Tipe','required');

        if($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Kelola Manga | WebMik',
                'fmanga' => $this->model_post->get_all_data(),
            );
            $this->template->load('layouts/template', 'admin/posting/add', $data);
        } else {
            $judul = $this->input->post('judul', TRUE);
            $tipe = $this->input->post('tipe', TRUE);
            $content = $this->input->post('content', TRUE);
            
            $data = [
                'judul' => $judul,
                'tipe' => $tipe,
                'content' => $content,
            ];
            
            $this->db->insert('tbl_article',$data);
            $this->session->set_flashdata('alerts', 'Postingan Berhasil Ditambahkan !!!');
            redirect('admin/postingan');
        }
    }

    // Upload image summernote
    function upload_image() {
        if(isset($_FILES["image"]["name"])){
            $config['upload_path'] = './assets/uploads/manga-gratis/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('image')){
                $this->upload->display_errors();
                return FALSE;
            }else{
                $data = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/uploads/manga-gratis/'.$data['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= TRUE;
                $config['quality']= '100%';
                $config['width']= 900;
                $config['height']= 900;
                $config['new_image']= './assets/uploads/manga-gratis/'.$data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                echo base_url().'assets/uploads/manga-gratis/'.$data['file_name'];
            }
        }
    }

    // Delete image Summernote
    function delete_image() {
        $src = $this->input->post('src');
        $file_name = str_replace(base_url(), '', $src);
        if(unlink($file_name))
        {
            echo 'File Delete Successfully';
        }
    }

     //Delete one item
     public function delete( $id_article = NULL )
     {
         $data = array('id_article'=>$id_article);
         $this->model_post->delete($data);
         $this->session->set_flashdata('alerts', 'Postingan Berhasil Dihapus !!!');
         redirect('admin/postingan');
     }
}