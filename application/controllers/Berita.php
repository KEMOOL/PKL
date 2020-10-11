<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
    public function index()
    {
        $this->load->library('pagination');
        $this->load->library('configpagination');

        $config['base_url'] = base_url() . 'berita/index';
        $config['total_rows'] = $this->perpus->countTotalBerita();
        $config['per_page'] = 1;

        $config = $this->configpagination->config($config);

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
        $id_berita = $this->uri->segment(3);
        if ($id_berita) {
            $berita = $this->perpus->getDetailBerita($id_berita);

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

        // echo json_encode($data);
        return $this->output->set_output(json_encode($data));
    }
}
