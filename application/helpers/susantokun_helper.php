<?php 

function konfigurasi($title, $c_des=null)
{
    $CI = get_instance();
    $CI->load->model('Konfigurasi_model');
    $CI->load->model('Auth_model');
    $auth = $CI->Auth_model->get_by_id('id');
    $site = $CI->Konfigurasi_model->listing();
    $data = array(
        'title' => $title.' | '.$site['nama_website'],
        'logo' => $site['logo'],
        'favicon' => $site['favicon'],
        'email' => $site['email'],
        'no_telp' => $site['no_telp'],
        'alamat' => $site['alamat'],
        'facebook' => $site['facebook'],
        'instagram' => $site['instagram'],
        'keywords' => $site['keywords'],
        'metatext' => $site['metatext'],
        'about' => $site['about'],
        'site' => $site,
        'c_judul' => $title,
        'c_des' => $c_des,
        'userdata' => $auth,
    );

    return $data;
}