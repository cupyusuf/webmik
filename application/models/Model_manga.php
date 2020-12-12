<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Model_manga extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_manga');
        $this->db->join('tbl_genre', 'tbl_genre.id_genre = tbl_manga.id_genre', 'left');
        
        $this->db->order_by('id_manga', 'desc');
        return $this->db->get()->result();
    }
    
    public function get_data($id_manga)
    {
        $this->db->select('*');
        $this->db->from('tbl_manga');
        $this->db->join('tbl_genre', 'tbl_genre.id_genre = tbl_manga.id_genre', 'left');
        $this->db->where('id_manga', $id_manga);
        
        return $this->db->get()->row();
    }

    public function add($data)
    {
        $this->db->insert('tbl_manga', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_manga', $data['id_manga']);
        $this->db->update('tbl_manga', $data);
    }
    
    public function delete($data)
    {
        $this->db->where('id_manga', $data['id_manga']);
        $this->db->delete('tbl_manga', $data);
    }
}