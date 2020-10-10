<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Beranda';
        $data['listKegiatan'] = $this->perpus->getListKegiatan();
        $data['komentar'] = $this->perpus->getSelectedKomentar();
        $data['bukuPopuler'] = $this->perpus->getListBukuPopulerLimit(8,0);

        $this->load->view('template/navbar', $data);
        $this->load->view('beranda', $data);
        $this->load->view('template/footer');
    }
}
