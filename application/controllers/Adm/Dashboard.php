<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        if (!$this->session->userdata('level')) {
            redirect('admin/masuk');
        } else {
            $data['title'] = 'Dashboard | Admin';
            $data['listKegiatan'] = $this->perpus->getListKegiatan();

            $this->load->view('template/navbarAdmin', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/dashboard');
            $this->load->view('template/footerAdmin');
        }
    }

    public function getDataPengunjung()
    {
        $data = $this->perpus->getDataPengunjung();

        echo json_encode($data);
    }

    // public function getDataJenisPengunjung()
    // {
    //     $data = $this->perpus->getDataJenisPengunjung();

    //     echo json_encode($data);
    // }

    public function getTotalKoleksiBuku()
    {
        $data = $this->perpus->getTotalKoleksiBuku();

        echo json_encode($data);
    }

    public function getTotalPengunjung()
    {
        $data = $this->perpus->getTotalPengunjung();

        echo json_encode($data);
    }

    public function getTotalAnggota()
    {
        $data = $this->perpus->getTotalAnggota();

        echo json_encode($data);
    }

    public function getTotalKomentar()
    {
        $data = $this->perpus->getTotalKomentar();

        echo json_encode($data);
    }

    public function getSelectTampilStatistik($waktu)
    {
        $data['data'] = $this->perpus->getSelectTampilStatistik($waktu);
        $data['jenisKelamin'] = $this->perpus->getSelectTampilStatistikJenisKelamin($waktu);
        $data['jenisKelaminNull'] = $this->perpus->getSelectTampilStatistikJenisKelaminNull($waktu);

        echo json_encode($data);
    }
    public function getSelectTampilStatistikAnggota()
    {
        $data['line'] = $this->perpus->getSelectTampilStatistikAnggotaLine();
        $data['pie']['noNull'] = $this->perpus->getSelectTampilStatistikAnggotaPie();
        $data['pie']['null'] = $this->perpus->getSelectTampilStatistikAnggotaPieNull();

        echo json_encode($data);
    }
}
