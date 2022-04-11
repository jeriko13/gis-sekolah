<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_sekolah');
    }

    public function index()
    {
        $this->user_login->cek_login();
        $data = array(
            'title'     => 'Pemetaan Sekolah',
            'sekolah'   => $this->m_sekolah->tampil(),
            'isi'       => 'v_pemetaan'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }
}
