<?php

class M_jabatan extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('jabatan');
    }

    public function hitung_data()
    {
        return $this->db->count_all_results('jabatan');
    }

    public function jabatanWhere($where)
    { 
        return $this->db->get_where('jabatan', $where);
    }

    public function detail_jabatan($id = null)
    {
        $query = $this->db->get_where('jabatan', array('id' => $id))->row();
        return $query;
    }

    public function delete_jabatan($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function update_jabatan($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    
}
