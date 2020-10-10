<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BukuPopuler extends CI_Controller
{

    public function index()
    {
        if (!$this->session->userdata('level')) {
            redirect('admin/masuk');
        } else {
            $data['title'] = 'Buku Populer | Admin';
            $data['listKegiatan'] = $this->perpus->getListKegiatan();

            $this->load->view('template/navbarAdmin', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/bukuPopuler');
            $this->load->view('template/footerAdmin');
        }
    }

    public function simpanBukuPopuler()
    {

        $this->perpus->simpanBukuPopuler($this->input->post('id'));

        echo json_encode('sukses');
    }

    public function getListBukuPopuler()
    {
        $data['buku'] = $this->perpus->getListBukuPopuler();
        $data['session'] = $this->session->userdata('level');

        echo json_encode($data);
    }

    public function getDetailBuku()
    {
        $data = $this->perpus->getDetailBukuIsbn();

        echo json_encode($data);
    }

    public function hapusBukuPopuler()
    {
        $data = $this->perpus->hapusBukuPopuler();

        echo json_encode('sukses');
    }
}
