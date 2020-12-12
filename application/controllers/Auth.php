<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller {   
    public function check_account()
    {
        //validasi login
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');

        //ambil data dari database untuk validasi login
        $query = $this->Auth_model->check_account($email, $password);

        if ($query === 1) {
            $this->session->set_flashdata('error', 'Email yang Anda masukkan tidak terdaftar.');
        } elseif ($query === 2) {
            $this->session->set_flashdata('alert', 'Akun yang Anda masukkan tidak aktif, silakan hubungi Administrator.'
            );
        } elseif ($query === 3) {
            $this->session->set_flashdata('alert', 'Password yang Anda masukkan salah.');
        } else {
            //membuat session dengan nama userData yang artinya nanti data ini bisa di ambil sesuai dengan data yang login
            $userdata = array(
              'is_login'    => true,
              'id'          => $query->id,
              'password'    => $query->password,
              'id_role'     => $query->id_role,
              'username'    => $query->username,
              'first_name'  => $query->first_name,
              'last_name'   => $query->last_name,
              'email'       => $query->email,
              'phone'       => $query->phone,
              'photo'       => $query->photo,
              'created_on'  => $query->created_on,
              'last_login'  => $query->last_login,
              'id_paket'     => $query->id_paket,
            );
            $this->session->set_userdata($userdata);
            return true;
        }
    }
    public function login()
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'     => 'Login | '.$site['nama_website'],
            'favicon'   => $site['favicon'],
            'site'      => $site
        );
        //melakukan pengalihan halaman sesuai dengan levelnya
        if ($this->session->userdata('id_role') == "1") {
            redirect('admin/home');
        }
        if ($this->session->userdata('id_role') == "2") {
            redirect('member/home');
        }

        //proses login dan validasi nya
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|max_length[50]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[22]');
            $error = $this->check_account();

            if ($this->form_validation->run() && $error === true) {
                $data = $this->Auth_model->check_account($this->input->post('email'), $this->input->post('password'));

                //jika bernilai TRUE maka alihkan halaman sesuai dengan level nya
                if ($data->id_role == '1') {
                    redirect('admin/home');
                } elseif ($data->id_role == '2') {
                    redirect('member/home');
                }
            } else {
                $this->template->load('authentication/layouts/template', 'authentication/login', $data);
            }
        } else {
            $this->template->load('authentication/layouts/template', 'authentication/login', $data);
        }
    }

    public function register()
    {
      $site = $this->Konfigurasi_model->listing();
      $data = array(
          'title'     => 'Register | '.$site['nama_website'],
          'favicon'   => $site['favicon'],
          'site'      => $site
      );
      $this->template->load('authentication/layouts/template', 'authentication/register', $data);
    }

    public function check_register()
    {
      $site = $this->Konfigurasi_model->listing();
      $data = array(
          'title'     => 'Register | '.$site['nama_website'],
          'favicon'   => $site['favicon'],
          'site'      => $site
      );
      $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[50]');
      $this->form_validation->set_rules('first_name', 'Firts Name', 'trim|required|min_length[5]|max_length[50]');
      $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[5]|max_length[50]');
      $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|max_length[50]');
      $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[20]');
      
      if ($this->form_validation->run() == false) {
        $this->template->load('authentication/layouts/template', 'authentication/register', $data);
      }
      else {
        $this->Auth_model->reg();
        $this->session->set_flashdata('alerts', 'Pendaftaran berhasil, Anda sudah bisa login.');
        redirect('auth/login','refresh',$data);
      }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}