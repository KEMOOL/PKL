<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KoleksiBuku extends CI_Controller
{
    public function index()
    {
        if (!$this->session->userdata('level')) {
            redirect('admin/masuk');
        } else {
            $data['title'] = 'Koleksi Buku | Admin';
            $data['listKegiatan'] = $this->perpus->getListKegiatan();

            $this->load->view('template/navbarAdmin', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/koleksiBuku');
            $this->load->view('template/footerAdmin');
        }
    }

    public function getLIstBukuAll()
    {
        $data['buku'] = $this->perpus->getLIstBukuAll();
        $data['session'] = $this->session->userdata('level');

        echo json_encode($data);
    }
}
