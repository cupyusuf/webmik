<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Model_post extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_article');
        
        $this->db->order_by('id_article', 'desc');
        return $this->db->get()->result();
    }
    
    public function get_manga($id_article)
    {
        $this->db->select('*');
        $this->db->from('tbl_article');
        $this->db->where('id_article',$id_article);
        $query = $this->db->get();
        return $query->result();
    }

    public function add($data)
    {
        $this->db->insert('tbl_article', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_article', $data['id_article']);
        $this->db->update('tbl_article', $data);
    }
    
    public function delete($data)
    {
        $this->db->where('id_article', $data['id_article']);
        $this->db->delete('tbl_article', $data);
    }
}