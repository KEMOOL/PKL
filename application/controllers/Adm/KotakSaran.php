<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KotakSaran extends CI_Controller
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
            $this->load->view('admin/kotakSaran');
            $this->load->view('template/footerAdmin');
        }
    }

    public function getListSaran($Bagian)
    {
        $data['komentar'] = $this->perpus->getListSaran($Bagian);
        $data['session'] = $this->session->userdata('level');

        echo json_encode($data);
    }

    public function tampilkanKomentar()
    {
        $this->perpus->tampilkanKomentar();

        echo json_encode('sukses');
    }
    public function getYangDitampilkan()
    {
        $data = $this->perpus->getYangDitampilkan();

        echo json_encode($data);
    }

    public function hapusKomentar()
    {
        $this->perpus->hapusKomentar();

        echo json_encode('sukses');
    }

    public function hapusTampilkanKomentar()
    {
        $this->perpus->hapusTampilkanKomentar();

        echo json_encode('sukses');
    }
}
