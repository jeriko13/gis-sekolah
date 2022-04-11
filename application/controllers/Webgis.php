<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Webgis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_sekolah');
    }
    public function index()
    {
        $data = array(
            'title'     => 'Web SIG Sekolah',
            'sekolah'   => $this->m_sekolah->tampil(),
            'isi'       => 'v_webgis'
        );
        $this->load->view('front-end/v_wrapper', $data, FALSE);
    }
    public function list_sekolah()
    {
        $data = array(
            'title'     => 'Web SIG Sekolah',
            'sekolah'   => $this->m_sekolah->tampil(),
            'isi'       => 'v_list_sekolah'
        );
        $this->load->view('front-end/v_wrapper', $data, FALSE);
    }
    public function about()
    {
        $data = array(
            'title'     => 'Web SIG Sekolah',
            'isi'       => 'v_about'
        );
        $this->load->view('front-end/v_wrapper', $data, FALSE);
    }
    public function detail($id_sekolah)
    {
        $data = array(
            'title'     => 'Detail Sekolah',
            'sekolah'   => $this->m_sekolah->detail($id_sekolah),
            'isi'       => 'v_detail'
        );
        $this->load->view('front-end/v_wrapper', $data, FALSE);
    }
}
