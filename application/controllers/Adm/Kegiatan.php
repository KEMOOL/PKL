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
        if (!$this->session->userdata('level')) {
            redirect('admin/masuk');
        } else {
            $kegiatan = $this->perpus->getDetailKegiatan($idKegiatan);
            if ($kegiatan) {
                $data['title'] = 'Kegiatan | Admin';
                $data['listKegiatan'] = $this->perpus->getListKegiatan();
                $data['kegiatan'] = $kegiatan;

                $this->load->view('template/navbarAdmin', $data);
                $this->load->view('admin/sidebar', $data);
                $this->load->view('admin/kegiatan');
                $this->load->view('template/footerAdmin');
            } else {
                redirect('admin/dashboard');
            }
        }
    }
}
