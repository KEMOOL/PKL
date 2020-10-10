<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Panduan extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Panduan';
        $data['listKegiatan'] = $this->perpus->getListKegiatan();

        $this->load->view('template/navbar', $data);
        $this->load->view('panduan');
        $this->load->view('template/footer');
    }
}
