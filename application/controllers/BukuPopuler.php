<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BukuPopuler extends CI_Controller
{
    public function index()
    {
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'bukuPopuler/index';
        $config['total_rows'] = $this->perpus->countTotalBukuPopuler();
        $config['per_page'] = 12;

        $config['full_tag_open'] = '<nav><ul class="pagination pagination-circle pg-dark justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'Awal';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Akhir';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

        $data['title'] = 'Buku Populer';
        $data['listKegiatan'] = $this->perpus->getListKegiatan();
        $data['buku'] = $this->perpus->getListBukuPopulerLimit($config['per_page'], $this->uri->segment(3));

        $this->load->view('template/navbar', $data);
        $this->load->view('bukuPopuler', $data);
        $this->load->view('template/footer');
    }
}
