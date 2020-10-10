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
        if ($this->uri->segment(2)) {
            $data['title'] = 'Kegiatan';
            $data['kegiatan'] = $this->perpus->getDetailKegiatan($idKegiatan);

            if ($data['kegiatan']) {
                $data['listKegiatan'] = $this->perpus->getListKegiatan();

                $this->load->view('template/navbar', $data);
                $this->load->view('kegiatan');
                $this->load->view('template/footer');
            } else {
                redirect(base_url());
            }
        } else {
            redirect(base_url());
        }
    }
}
