<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // jalankan helper
        is_logged_in();
    }

    public function database()
    {
        $data['title'] = 'Dashboard';
        $data['user']  = $this->db->get_where('admin', ['username'
        => $this->session->userdata('username')])->row_array();

        $this->load->view('admin/settings/database', $data);
    }

    public function backupDatabase(){
        $this->load->dbutil();

        // the rules
        $rules = [
            'format' => 'zip',
            'filename' => 'backup.sql'
        ];

        $backup =& $this->dbutil->backup($rules);

        // database + tanggal backup
        $dbname = 'backup-on-'. date("Y-m-d-H-i-s").'.zip';
        $save = './backup'.$dbname;

        $this->load->helper('file');
        write_file($save, $backup);

        $this->load->helper('download');
        force_download($dbname, $backup);
    }

}

/* End of file Setting.php */
