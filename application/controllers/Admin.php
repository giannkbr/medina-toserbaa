<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // jalankan helper
        is_logged_in();
    }


    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user']  = $this->db->get_where('admin', ['username'
        => $this->session->userdata('username')])->row_array();

        $this->load->view('admin/dashboard', $data);
    }

}
