<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Model_genre extends CI_Model
{
    public function getAllGenre()
    {
        $this->db->select('*');
        $this->db->from('tbl_genre');
        $this->db->order_by('id_genre', 'desc');
        return $this->db->get()->result();
    }
    public function add($data)
    {
        $this->db->insert('tbl_genre', $data);
    }
    public function edit($data)
    {
        $this->db->where('id_genre', $data['id_genre']);
        $this->db->update('tbl_genre', $data);
    }
    public function delete($data)
    {
        $this->db->where('id_genre', $data['id_genre']);
        $this->db->delete('tbl_genre', $data);
    }
}