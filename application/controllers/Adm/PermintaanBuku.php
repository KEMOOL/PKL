<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PermintaanBuku extends CI_Controller
{

    public function index()
    {
        if (!$this->session->userdata('level')) {
            redirect('admin/masuk');
        } else {
            $data['title'] = 'Kotak Saran | Admin';
            $data['listKegiatan'] = $this->perpus->getListKegiatan();

            $this->load->view('template/navbarAdmin', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/permintaanBuku');
            $this->load->view('template/footerAdmin');
        }
    }

    public function getListPermintaanBuku()
    {
        $data = $this->perpus->getListPermintaanBuku();

        echo json_encode($data);
    }
}
