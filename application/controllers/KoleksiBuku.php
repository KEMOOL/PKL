<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KoleksiBuku extends CI_Controller
{
    public function index()
    {
        $this->load->library('pagination');
        $this->load->library('configpagination');

        $config['base_url'] = base_url() . 'koleksiBuku/index';
        $config['total_rows'] = $this->perpus->countTotalCatalog();
        $config['per_page'] = 12;

        $config = $this->configpagination->config($config);

        $this->pagination->initialize($config);

        $data['title'] = 'Koleksi Buku';
        $data['listKegiatan'] = $this->perpus->getListKegiatan();
        $data['buku'] = $this->perpus->getListBuku($config['per_page'], $this->uri->segment(3));

        $this->load->view('template/navbar', $data);
        $this->load->view('koleksiBuku', $data);
        $this->load->view('template/footer');
    }

    public function cari()
    {

        $data = $this->perpus->getListBukuCari($this->input->post('cari'));
        // echo json_encode($data);
        return $this->output->set_output(json_encode($data));
    }
}
