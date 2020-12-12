<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Model_kelolauser extends CI_Model
{
    public function getAllUser()
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->order_by('id', 'desc');
        return $this->db->get()->result();
    }
    public function add($data)
    {
        $this->db->insert('tbl_user', $data);
    }
    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('tbl_user', $data);
    }
    public function delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('tbl_user', $data);
    }
}