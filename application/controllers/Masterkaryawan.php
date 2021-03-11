<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masterkaryawan extends CI_Controller {
    public
    function __construct() {
        parent::__construct();
        // jalankan helper
        is_logged_in();
        $this -> load -> model('M_karyawan');
        $this -> load -> model('M_jabatan');
    }

    public
    function index() {
        $data['title'] = 'Data Karyawan';
        $data['user'] = $this -> db -> get_where('admin', ['username' => $this -> session -> userdata('username')]) -> row_array();
        $data['karyawan'] = $this -> M_karyawan -> joinJabatan() -> result_array();

        $this -> load -> view('admin/karyawan/datakaryawan', $data);
    }

    public
    function tambahkaryawan() {
        $data['title'] = 'Tambah Karyawan';
        $data['user'] = $this -> db -> get_where('admin', ['username' => $this -> session -> userdata('username')]) -> row_array();
        $data['karyawan'] = $this -> M_karyawan -> tampil_data() -> result_array();
        $data['jabatan'] = $this -> M_jabatan -> tampil_data() -> result_array();


        $this -> load -> view('admin/karyawan/tambahkaryawan', $data);
    }

    public
    function tambahkaryawanAct() {
        $this -> form_validation -> set_rules('nama', 'Nama', 'required|trim|min_length[4]', [
            'required' => 'Harap isi kolom nama.',
            'min_length' => 'Nama terlalu pendek.',
        ]);

        $this -> form_validation -> set_rules('username', 'Username', 'required|trim|min_length[4]', [
            'required' => 'Harap isi kolom username.',
            'min_length' => 'Username terlalu pendek.',
        ]);

        $this -> form_validation -> set_rules('id_jabatan', 'Id_Jabatan', 'required', [
            'required' => 'Harap isi kolom Jabatan.',

        ]);

        $this -> form_validation -> set_rules('password', 'Password', 'required|trim|min_length[6]|matches[retype_password]', [
            'required' => 'Harap isi kolom Password.',
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek',
        ]);
        $this -> form_validation -> set_rules('retype_password', 'Password', 'required|trim|matches[password]', [
            'matches' => 'Password tidak sama!',
        ]);

        if ($this -> form_validation -> run() == false) {
            $this -> load -> view('admin/karyawan/tambahkaryawan');
        } else {
            $email = $this -> input -> post('username', true);
            $data = [
                'nama' => htmlspecialchars($this -> input -> post('nama', true)),
                'username' => htmlspecialchars($email),
                'jabatan' => $this -> input -> post('id_jabatan', true),
                'image' => 'default.jpg',
                'password' => password_hash($this -> input -> post('password'), PASSWORD_DEFAULT),
                'is_active' => 1,
            ];

            //siapkan token

            // $token = base64_encode(random_bytes(32));
            // $user_token = [
            //     'email' => $email,
            //     'token' => $token,
            //     'date_created' => time(),
            // ];

            $this -> db -> insert('karyawan', $data);
            // $this->db->insert('token', $user_token);

            // $this->_sendEmail($token, 'verify');

            $this -> session -> set_flashdata('success-reg', 'Berhasil!');
            redirect(base_url('Masterkaryawan'));
        }
    }

    public
    function hapuskaryawan($id) {
        $data['karyawan'] = $this -> M_karyawan -> karyawanWhere(['id' => $this -> uri -> segment(3)]) -> row_array();
        $gambar_lama = $data['karyawan']['image'];
        unlink(FCPATH.
            'assets/images/'.$gambar_lama);
        $where = array('id' => $id);
        $this -> M_karyawan -> delete_karyawan($where, 'karyawan');
        $this -> session -> set_flashdata('user-delete', 'berhasil');
        redirect('Masterkaryawan');
    }

    public function 
    updatekaryawan($id)
    {   
        $data['title'] = 'Edit Karyawan';
        $data['user'] = $this -> db -> get_where('admin', ['username' => $this -> session -> userdata('username')]) -> row_array();
        $where = array('id' => $id);
        $data['karyawan'] = $this->M_karyawan->update_karyawan($where, 'karyawan')->result();
        $data['jabatan'] = $this -> M_jabatan -> tampil_data() -> result_array();

        $this->load->view('admin/karyawan/editkaryawan', $data);
    }

    public function 
    editkaryawan()
	{
        
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $id_jabatan = $this->input->post('id_jabatan');

        $data = array(
            'id' => $id,
            'nama' => $nama,
            'jabatan' => $id_jabatan
        );

        $where = array(
            'id' => $id,
        );

        $this -> M_karyawan -> update_data($where, $data, 'karyawan');
        $this -> session -> set_flashdata('success-reg', 'Berhasil!');
        redirect('Masterkaryawan');

        $this->load->view('admin/karyawan/editkaryawan');

	}
}