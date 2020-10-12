<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PermintaanBuku extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Permintaan Buku';
        $data['listKegiatan'] = $this->perpus->getListKegiatan();

        $this->load->view('template/navbar', $data);
        $this->load->view('permintaanBuku');
        $this->load->view('template/footer');
    }

    public function simpanPermintaan()
    {
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '2048';
        $config['upload_path'] = './assets/img/permintaanBuku';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->do_upload('image');

        $this->perpus->simpanPermintaan();

        return $this->output->set_output(json_encode('sukses'));
    }
}
