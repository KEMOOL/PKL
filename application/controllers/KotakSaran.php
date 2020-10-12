<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KotakSaran extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Kotak Saran';
        $data['listKegiatan'] = $this->perpus->getListKegiatan();

        $this->load->view('template/navbar', $data);
        $this->load->view('kotakSaran');
        $this->load->view('template/footer');
    }

    public function simpanSaran()
    {
        $this->perpus->simpanSaran();

        return $this->output->set_output(json_encode($this->input->post('ditujukan')));
    }
}
