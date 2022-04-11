<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sekolah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_sekolah');
    }


    public function index()
    {
        $data = array(
            'title' => 'Data Sekolah',
            'sekolah' => $this->m_sekolah->tampil(),
            'isi' => 'v_datasekolah'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }
    public function input()
    {
        $this->user_login->cek_login();
        $this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah', 'required', array(
            'required' => '%s harus di isi !!!'
        ));

        $this->form_validation->set_rules('alamat', 'Alamat', 'required', array(
            'required' => '%s harus di isi !!!'
        ));

        $this->form_validation->set_rules('status_sekolah', 'Status Sekolah', 'required', array(
            'required' => '%s harus di isi !!!'
        ));

        $this->form_validation->set_rules('kepala_sekolah', 'Kepala Sekolah', 'required', array(
            'required' => '%s harus di isi !!!'
        ));

        $this->form_validation->set_rules('latitude', 'Latitude', 'required', array(
            'required' => '%s harus di isi !!!'
        ));

        $this->form_validation->set_rules('longitude', 'Longitude', 'required', array(
            'required' => '%s harus di isi !!!'
        ));

        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required', array(
            'required' => '%s harus di isi !!!'
        ));

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']          = './gambar/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|icon';
            $config['max_size']             = 2000;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'title'        => 'Input Data Sekolah',
                    'error_upload' => $this->upload->display_errors(),
                    'isi'          => 'v_input_datasekolah'
                );
                $this->load->view('layout/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library']    = 'gd2';
                $config['source_image']     = './gambar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'nama_sekolah'   => $this->input->post('nama_sekolah'),
                    'alamat'         => $this->input->post('alamat'),
                    'status_sekolah' => $this->input->post('status_sekolah'),
                    'kepala_sekolah' => $this->input->post('kepala_sekolah'),
                    'latitude'       => $this->input->post('latitude'),
                    'longitude'      => $this->input->post('longitude'),
                    'keterangan'     => $this->input->post('keterangan'),
                    'gambar'         => $upload_data['uploads']['file_name'],
                );
                $this->m_sekolah->simpan($data);
                $this->session->set_flashdata('pesan', 'Data berhasil Disimpan.');
                redirect('sekolah');
            }
        }
        $data = array(
            'title'        => 'Input Data Sekolah',
            'isi'          => 'v_input_datasekolah'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }




    public function edit($id_sekolah)
    {
        $this->user_login->cek_login();

        $this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah', 'required', array(
            'required' => '%s harus di isi !!!'
        ));

        $this->form_validation->set_rules('alamat', 'Alamat', 'required', array(
            'required' => '%s harus di isi !!!'
        ));

        $this->form_validation->set_rules('status_sekolah', 'Status Sekolah', 'required', array(
            'required' => '%s harus di isi !!!'
        ));

        $this->form_validation->set_rules('kepala_sekolah', 'Kepala Sekolah', 'required', array(
            'required' => '%s harus di isi !!!'
        ));

        $this->form_validation->set_rules('latitude', 'Latitude', 'required', array(
            'required' => '%s harus di isi !!!'
        ));

        $this->form_validation->set_rules('longitude', 'Longitude', 'required', array(
            'required' => '%s harus di isi !!!'
        ));

        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required', array(
            'required' => '%s harus di isi !!!'
        ));

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']          = './gambar/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|icon';
            $config['max_size']             = 2000;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'title' => 'Edit Data Sekolah',
                    'sekolah' => $this->m_sekolah->detail($id_sekolah),
                    'isi' => 'v_edit_datasekolah'
                );
                $this->load->view('layout/v_wrapper', $data, FALSE);
            } else {
                // Edit dengan Ubah Gambar
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library']    = 'gd2';
                $config['source_image']     = './gambar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_sekolah'     => $id_sekolah,
                    'nama_sekolah'   => $this->input->post('nama_sekolah'),
                    'alamat'         => $this->input->post('alamat'),
                    'status_sekolah' => $this->input->post('status_sekolah'),
                    'kepala_sekolah' => $this->input->post('kepala_sekolah'),
                    'latitude'       => $this->input->post('latitude'),
                    'longitude'      => $this->input->post('longitude'),
                    'keterangan'     => $this->input->post('keterangan'),
                    'gambar'         => $upload_data['uploads']['file_name'],
                );
                $this->m_sekolah->edit($data);
                $this->session->set_flashdata('pesan', 'Data berhasil Disimpan.');
                redirect('sekolah');
            }
            // Edit Tanpa Ubah Gambar

            $data = array(
                'id_sekolah'     => $id_sekolah,
                'nama_sekolah'   => $this->input->post('nama_sekolah'),
                'alamat'         => $this->input->post('alamat'),
                'status_sekolah' => $this->input->post('status_sekolah'),
                'kepala_sekolah' => $this->input->post('kepala_sekolah'),
                'latitude'       => $this->input->post('latitude'),
                'longitude'      => $this->input->post('longitude'),
                'keterangan'     => $this->input->post('keterangan'),

            );
            $this->m_sekolah->edit($data);
            $this->session->set_flashdata('pesan', 'Data berhasil Disimpan.');
            redirect('sekolah');
        }
        $data = array(
            'title'        => 'Edit Data Sekolah',
            'sekolah' => $this->m_sekolah->detail($id_sekolah),
            'isi'          => 'v_edit_datasekolah'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }
    public function hapus($id_sekolah)
    {
        $this->user_login->cek_login();
        $data = array('id_sekolah' => $id_sekolah);
        $this->m_sekolah->hapus($data);
        $this->session->set_flashdata('pesan', 'Data berhasil Dihapus!!!');
        redirect('sekolah');
    }
}
