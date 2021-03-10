<?php

class M_karyawan extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('karyawan');
    }

    public function hitung_data()
    {
        return $this->db->count_all_results('karyawan');
    }

    public function karyawanWhere($where)
    { 
        return $this->db->get_where('karyawan', $where);
    }

    public function detail_karyawan($id = null)
    {
        $query = $this->db->get_where('karyawan', array('id' => $id))->row();
        return $query;
    }

    public function delete_karyawan($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
        $this->db->query("SET @num := 0;");
        $this->db->query("UPDATE karyawan SET id = @num := (@num+1);");
        $this->db->query("ALTER TABLE karyawan AUTO_INCREMENT = 1;");
    }

    public function update_karyawan($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function joinJabatan()
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('jabatan','jabatan.id_jabatan = karyawan.jabatan');
        return $this->db->get();
    }
}
