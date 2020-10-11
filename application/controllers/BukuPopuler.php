<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BukuPopuler extends CI_Controller
{
    public function index()
    {
        $this->load->library('pagination');
        $this->load->library('configpagination');

        $config['base_url'] = base_url() . 'bukuPopuler/index';
        $config['total_rows'] = $this->perpus->countTotalBukuPopuler();
        $config['per_page'] = 12;

        $config = $this->configpagination->config($config);

        $this->pagination->initialize($config);

        $data['title'] = 'Buku Populer';
        $data['listKegiatan'] = $this->perpus->getListKegiatan();
        $data['buku'] = $this->perpus->getListBukuPopulerLimit($config['per_page'], $this->uri->segment(3));

        $this->load->view('template/navbar', $data);
        $this->load->view('bukuPopuler', $data);
        $this->load->view('template/footer');
    }
}
