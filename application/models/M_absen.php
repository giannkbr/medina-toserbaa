<?php

class M_absen extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('absen');
    }

    public function hitung_data()
    {
        return $this->db->count_all_results('absen');
    }

    public function absenWhere($where)
    { 
        return $this->db->get_where('absen', $where);
    }

    public function detail_absen($id = null)
    {
        $query = $this->db->get_where('absen', array('id' => $id))->row();
        return $query;
    }

    public function delete_absen($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
        $this->db->query("SET @num := 0;");
        $this->db->query("UPDATE absen SET id_absen = @num := (@num+1);");
        $this->db->query("ALTER TABLE absen AUTO_INCREMENT = 1;");
    }

    public function update_absen($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function cek_id($username)
    {
        $query_str =
            
            $this->db->where('username', $username)
            ->get('karyawan');
        if ($query_str->num_rows() > 0) {
            return $query_str->row();
        } else {
            return false;
        }
    }

    public function cek_kehadiran($username, $tgl)
    {
        $query_str =
            
            $this->db->where('username', $username)
            ->where('tanggal', $tgl)->get('absen');
        if ($query_str->num_rows() > 0) {
            return $query_str->row();
        } else {
            return false;
        }
    }

    public function absen_masuk($data)
    {
        return $this->db->insert('absen', $data);
    }

     public function absen_pulang($username, $data)
    {
        $tgl = date('Y-m-d');
        return
        
        $this->db->where('username', $username)
            ->where('tanggal', $tgl)
            ->update('absen', $data);
    }

    public function joinAbsen()
    {
        $this->db->select('*');
        $this->db->from('absen');
        $this->db->join('karyawan','karyawan.username = absen.username');
        $this->db->join('jabatan','jabatan.id_jabatan = karyawan.jabatan');
        return $this->db->get();
    }

    public function whereTanggal($awal, $akhir,$table)
    {

        // $this->db->query("SELECT * FROM absen WHERE tanggal BETWEEN  AND ;");
        $this->db->select('*');
        $this->db->from('absen');
        $this->db->where("tanggal BETWEEN '$awal' AND '$akhir'");

        return $this->db->get();
    }
}

