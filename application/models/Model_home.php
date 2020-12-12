<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Model_home extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_manga');
        $this->db->join('tbl_genre', 'tbl_genre.id_genre = tbl_manga.id_genre', 'left');
        
        $this->db->order_by('id_manga', 'desc');
        return $this->db->get()->result();
    }
    public function get_all_dataCategory()
    {
        $this->db->select('*');
        $this->db->from('tbl_genre');
        $this->db->order_by('id_genre', 'desc');
        return $this->db->get()->result();
    }

    public function category($id_genre)
    {
        $this->db->select('*');
        $this->db->from('tbl_genre');
        $this->db->where('id_genre', $id_genre);
        
        return $this->db->get()->row();
    }
}