<?php
class M_user extends CI_model
{
    public function simpan($data)
    {
        $this->db->insert('tbl_user', $data);
    }
    public function tampil()
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->order_by('id_user', 'asc');
        return $this->db->get()->result();
    }
    public function detail($id_user)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('id_user', $id_user);
        return $this->db->get()->row();
    }
    public function edit($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->update('tbl_user', $data);
    }
    public function hapus($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->delete('tbl_user', $data);
    }
}
