<?php
defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');
class Masterabsensi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // jalankan helper
        is_logged_in();
    }

    public function messageAlert($type, $title)
    {
        $messageAlert = "const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            type: '" . $type . "',
            title: '" . $title . "'
        });";
        return $messageAlert;
    }


    public function index()
    {
        $this->load->model('M_karyawan');
        $data['title'] = 'Ambil Code Qr';
        $data['user']  = $this->db->get_where('admin', ['username'=> $this->session->userdata('username')])->row_array();
        $data['karyawan'] = $this->M_karyawan->tampil_data()->result_array();
        $this->load->view('admin/absensi/ambilqr', $data);
    }

     public function scanqr()
    {
        $this->load->model('M_karyawan');
        $data['title'] = 'Scan Qr';
        $data['user']  = $this->db->get_where('admin', ['username'=> $this->session->userdata('username')])->row_array();
        $data['karyawan'] = $this->M_karyawan->tampil_data()->result_array();
        $this->load->view('admin/absensi/scanqr', $data);
    }

     public function cetakqr()
    {
        $this->load->model('M_karyawan');
        $data['title'] = 'cetakqr';
        $data['user']  = $this->db->get_where('admin', ['username'=> $this->session->userdata('username')])->row_array();
        $data['karyawan'] = $this->M_karyawan->karyawanWhere(['id' => $this->uri->segment(3)])->row_array();
        $this->load->library('ciqrcode');
        $params['data'] = $data['karyawan']['username'];
        $params['level'] = 'H';
        $params['size'] = 10;
        $params['savename'] = FCPATH . "assets/img/qrcode/" . $data['karyawan']['username'] . 'code.png';
        $this->ciqrcode->generate($params);
        $this->load->view('admin/absensi/cetakqr', $data);
    }

    function cek_id()
    {
        $this->load->model('M_absen');
        $result_code = $this->input->post('username');
        $tgl = date('Y-m-d');
        $jam_msk = date('h:i:s');
        $jam_klr = date('h:i:s');
        $cek_id = $this->M_absen->cek_id($result_code);
        $cek_kehadiran = $this->M_absen->cek_kehadiran($result_code, $tgl);
        if (!$cek_id) {
            $this->session->set_flashdata('messageAlert', $this->messageAlert('error', 'absen gagal data QR tidak ditemukan'));
            redirect($_SERVER['HTTP_REFERER']);

        } elseif ($cek_kehadiran && $cek_kehadiran->jam_masuk != '00:00:00' && $cek_kehadiran->jam_keluar == '00:00:00' && $cek_kehadiran->status == 'masuk' && date('h:i:s') >='11:00:00' ) {
            $data = array(
                'jam_keluar' => $jam_klr,
                'status' => 'pulang',
            );
            $this->M_absen->absen_pulang($result_code, $data);
            $this->session->set_flashdata('messageAlert', $this->messageAlert('success', 'absen pulang'));
            redirect($_SERVER['HTTP_REFERER']);

        } elseif ($cek_kehadiran && $cek_kehadiran->jam_masuk != '00:00:00' && $cek_kehadiran->jam_keluar != '00:00:00' && $cek_kehadiran->status == 'pulang') {
            $this->session->set_flashdata('messageAlert', $this->messageAlert('warning', 'sudah absen pulang'));
            redirect($_SERVER['HTTP_REFERER']);
            return false;

        } elseif ($cek_kehadiran && $cek_kehadiran->jam_masuk != '00:00:00' && $cek_kehadiran->jam_keluar == '00:00:00' && date('h:i:s') >='08:00:00' && date('h:i:s') <='11:00:00') {
            $this->session->set_flashdata('messageAlert', $this->messageAlert('warning', 'sudah absen masuk'));
            redirect($_SERVER['HTTP_REFERER']);
            return false;
        }

        else {
            $data = array(
                'username' => $result_code,
                'tanggal' => $tgl,
                'jam_masuk' => $jam_msk,
                'status' => 'masuk',
            );
            $this->M_absen->absen_masuk($data);
            $this->session->set_flashdata('messageAlert', $this->messageAlert('success', 'absen masuk'));
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

     public function historiabsensi()
    {
        $this->load->model('M_absen');
        $data['title'] = 'histori Absensi';
        $data['user']  = $this->db->get_where('admin', ['username'=> $this->session->userdata('username')])->row_array();
        $data['absensi'] = $this->M_absen->tampil_data()->result_array();
        $this->load->view('admin/absensi/historiabsensi', $data);
    }

    

}
