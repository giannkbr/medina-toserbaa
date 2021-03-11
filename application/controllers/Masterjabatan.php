<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Masterjabatan extends CI_Controller {

    public
    function __construct() {
        parent::__construct();
        // jalankan helper
        is_logged_in();
        $this->load->model('M_jabatan');
    }


    public
    function index() {
        $data['title'] = 'Data jabatan';
        $data['user'] = $this -> db -> get_where('admin', ['username' => $this -> session -> userdata('username')]) -> row_array();
        $data['jabatan'] = $this -> M_jabatan -> tampil_data() -> result_array();

        $this -> load -> view('admin/jabatan/data', $data);
    }

    public
    function tambahjabatan() {
        $data['title'] = 'Tambah jabatan';
        $data['user'] = $this -> db -> get_where('admin', ['username' => $this -> session -> userdata('username')]) -> row_array();
        $data['jabatan'] = $this -> M_jabatan -> tampil_data() -> result_array();

        $this -> load -> view('admin/jabatan/tambahjabatan', $data);
    }

    public
    function tambahjabatanAct() {
        $data['title'] = 'Tambah jabatan';
        $data['user'] = $this -> db -> get_where('admin', ['username' => $this -> session -> userdata('username')]) -> row_array();


        $this -> form_validation -> set_rules('nama_jabatan', 'nama_jabatan', 'required', [
            'required' => 'Harap isi kolom Nama Jabatan',
        ]);

        if ($this -> form_validation -> run() == false) {
            $this -> load -> view('admin/jabatan/tambahjabatan');
        } else {
            $nama_jabatan = $this -> input -> post('nama_jabatan', true);
            $data = [
                'nama_jabatan' => htmlspecialchars($this -> input -> post('nama_jabatan', true)),
            ];

            $this -> db -> insert('jabatan', $data);

            $this -> session -> set_flashdata('success-reg', 'Berhasil!');
            redirect(base_url('Masterjabatan'));
        }
    }

    public
    function hapusjabatan($id) {
        $data['jabatan'] = $this -> M_jabatan -> jabatanWhere(['id_jabatan' => $this -> uri -> segment(3)]) -> row_array();
        $where = array('id_jabatan' => $id);
        $this -> M_jabatan -> delete_jabatan($where, 'jabatan');
        $this -> session -> set_flashdata('user-delete', 'berhasil');
        redirect('Masterjabatan');
    }

    public function 
    updatejabatan($id)
    {   
        $data['title'] = 'Edit jabatan';
        $data['user'] = $this -> db -> get_where('admin', ['username' => $this -> session -> userdata('username')]) -> row_array();
        $where = array('id_jabatan' => $id);
        $data['jabatan'] = $this->M_jabatan->update_jabatan($where, 'jabatan')->result();

        $this->load->view('admin/jabatan/editjabatan', $data);
    }

    public function 
    editjabatan()
	{
        $id = $this->input->post('id_jabatan');
        $nama_jabatan = $this->input->post('nama_jabatan');


        $data = array(
            'id_jabatan' => $id,
            'nama_jabatan' => $nama_jabatan,
        );

        $where = array(
            'id_jabatan' => $id,
        );

        $this -> M_jabatan -> update_data($where, $data, 'jabatan');
        $this -> session -> set_flashdata('success-reg', 'Berhasil!');
        redirect('Masterjabatan');

        $this->load->view('admin/jabatan/editjabatan');

	}

}
/* End of file Masterjabatan.php */