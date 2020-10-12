<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{
    function _remap($idKegiatan)
    {
        $this->index($idKegiatan);
    }
    public function index($idKegiatan)
    {
        $kegiatan = $this->perpus->getDetailKegiatan($idKegiatan);

        if ($kegiatan) {
            $data['title'] = 'Kegiatan';
            $data['kegiatan'] = $kegiatan;
            $data['listKegiatan'] = $this->perpus->getListKegiatan();

            $this->load->view('template/navbar', $data);
            $this->load->view('kegiatan');
            $this->load->view('template/footer');
        } else {
            redirect(base_url());
        }
    }
}
