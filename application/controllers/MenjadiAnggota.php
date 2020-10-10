<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MenjadiAnggota extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Menjadi Anggota Perpustakaan';
        $data['listKegiatan'] = $this->perpus->getListKegiatan();

        $this->load->view('template/navbar', $data);
        $this->load->view('panduan/menjadiAnggota');
        $this->load->view('template/footer');
    }
}
