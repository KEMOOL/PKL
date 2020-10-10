<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
    public function index()
    {
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'berita/index';
        $config['total_rows'] = $this->perpus->countTotalBerita();
        $config['per_page'] = 1;

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

        $data['title'] = 'Berita';
        $data['listKegiatan'] = $this->perpus->getListKegiatan();
        $data['berita'] = $this->perpus->getListBeritaLimit($config['per_page'], $this->uri->segment(3));
        $data['beritaTerbaru'] = $this->perpus->getListBeritaTerbaru();

        $this->load->view('template/navbar', $data);
        $this->load->view('listBerita', $data);
        $this->load->view('template/footer');
    }

    public function detail()
    {
        $id = $this->uri->segment(3);
        if ($id) {
            $berita = $this->perpus->getDetailBerita($id);

            if ($berita) {
                $data['title'] = 'Berita';
                $data['listKegiatan'] = $this->perpus->getListKegiatan();
                $data['berita'] = $berita;
                $data['listBerita'] = $this->perpus->getListBeritaTerbaru();

                $this->load->view('template/navbar', $data);
                $this->load->view('berita', $data);
                $this->load->view('template/footer');
            } else {
                redirect('my404');
            }
        } else {

            redirect('berita');
        }
    }

    public function getListBerita()
    {
        $data = $this->perpus->getListBerita();

        echo json_encode($data);
    }
}
