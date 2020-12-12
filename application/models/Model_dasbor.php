<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class model_dasbor extends CI_Model {

    public function total_genre()
    {
        return $this->db->get('tbl_genre')->num_rows();
    }

    public function total_manga()
    {
        return $this->db->get('tbl_manga')->num_rows();
    }

    public function total_pengguna()
    {
        return $this->db->get('tbl_user')->num_rows();
    }

    public function total_posting()
    {
        return $this->db->get('tbl_article')->num_rows();
    }
}