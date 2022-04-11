<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_sekolah');
    }

    public function index()
    {

        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => '%s harus di isi !!!'
        ));

        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s harus di isi !!!'

        ));

        if ($this->form_validation->run()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->user_login->login($username, $password);
        }

        $data = array(
            'title'     => 'Login User',

        );
        $this->load->view('v_login', $data, FALSE);
    }
    public function logout()
    {
        $this->user_login->logout();
    }
}
