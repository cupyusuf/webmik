<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Model_albums extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('tbl_manga.*,COUNT(tbl_albums.id_manga) as total_image');
        $this->db->from('tbl_manga');
        $this->db->join('tbl_albums', 'tbl_albums.id_manga = tbl_manga.id_manga', 'left');
        $this->db->group_by('tbl_manga.id_manga');
        $this->db->order_by('tbl_manga.id_manga', 'desc');
        return $this->db->get()->result();
    }

    public function get_data($id_image)
    {
        $this->db->select('*');
        $this->db->from('tbl_albums');
        $this->db->where('id_image', $id_image);
        return $this->db->get()->row();
    }

    public function get_image($id_manga)
    {
        $this->db->select('*');
        $this->db->from('tbl_albums');
        $this->db->where('id_manga', $id_manga);
        return $this->db->get()->result();
    }

    public function add($data)
    {
        $this->db->insert('tbl_albums', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_image', $data['id_image']);
        $this->db->delete('tbl_albums', $data);
    }
}