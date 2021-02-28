<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masterkaryawan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // jalankan helper
        is_logged_in();
    }


    public function index()
    {
        $this->load->model('M_karyawan');
        $data['title'] = 'Data Karyawan';
        $data['user']  = $this->db->get_where('admin', ['username'=> $this->session->userdata('username')])->row_array();
        $data['karyawan'] = $this->M_karyawan->tampil_data()->result_array();

        $this->load->view('admin/Karyawan/datakaryawan', $data);
    }

    public function tambahkaryawan()
    {
     $this->load->model('M_karyawan');
     $data['title'] = 'Tambah Karyawan';
     $data['user']  = $this->db->get_where('admin', ['username'=> $this->session->userdata('username')])->row_array();
     $data['karyawan'] = $this->M_karyawan->tampil_data()->result_array();

     $this->load->view('admin/Karyawan/tambahkaryawan', $data);
 }

    public function tambahkaryawanAct()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[4]', [
            'required' => 'Harap isi kolom nama.',
            'min_length' => 'Nama terlalu pendek.',
        ]);
        
        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[4]', [
            'required' => 'Harap isi kolom username.',
            'min_length' => 'Username terlalu pendek.',
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[retype_password]', [
            'required' => 'Harap isi kolom Password.',
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek',
        ]);
        $this->form_validation->set_rules('retype_password', 'Password', 'required|trim|matches[password]', [
            'matches' => 'Password tidak sama!',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/karyawan/tambahkaryawan');
        } else {
            $email = $this->input->post('username', true);
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'is_active' => 1,
            ];

                //siapkan token

                // $token = base64_encode(random_bytes(32));
                // $user_token = [
                //     'email' => $email,
                //     'token' => $token,
                //     'date_created' => time(),
                // ];

            $this->db->insert('karyawan', $data);
                // $this->db->insert('token', $user_token);

                // $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('success-reg', 'Berhasil!');
            redirect(base_url('Masterkaryawan'));
        }
    }

public function hapuskaryawan($id)
{
    $this->load->model('M_karyawan');
    $data['karyawan'] = $this->M_karyawan->karyawanWhere(['id' => $this->uri->segment(3)])->row_array();
    $gambar_lama = $data['karyawan']['image'];
    unlink(FCPATH . 'assets/images/' . $gambar_lama);
    $where = array('id' => $id);
    $this->M_karyawan->delete_karyawan($where, 'karyawan');
    $this->session->set_flashdata('user-delete', 'berhasil');
    redirect('Masterkaryawan');
}

}
