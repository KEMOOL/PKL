<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Arsip extends CI_Controller
{
    public function index()
    {
        $this->load->library('pagination');
        $this->load->library('configpagination');

        $config['base_url'] = base_url() . 'arsip/index';
        $config['total_rows'] = $this->perpus->countTotalArsip();
        $config['per_page'] = 2;

        $config = $this->configpagination->config($config);

        $this->pagination->initialize($config);

        $data['title'] = 'Arsip';
        $data['listKegiatan'] = $this->perpus->getListKegiatan();
        $data['arsip'] = $this->perpus->getListArsipLimit($config['per_page'], $this->uri->segment(3));
        $data['arsipTerbaru'] = $this->perpus->getListArsipTerbaru();

        $this->load->view('template/navbar', $data);
        $this->load->view('listArsip', $data);
        $this->load->view('template/footer');
    }

    public function detail()
    {
        $id_arsip = $this->uri->segment(3);
        if ($id_arsip) {
            $arsip = $this->perpus->getDetailArsip($id_arsip);

            if ($arsip) {
                $data['title'] = 'Arsip';
                $data['listKegiatan'] = $this->perpus->getListKegiatan();
                $data['arsip'] = $arsip;
                $data['listArsip'] = $this->perpus->getListArsipTerbaru();

                $this->load->view('template/navbar', $data);
                $this->load->view('arsip', $data);
                $this->load->view('template/footer');
            } else {
                redirect('my404');
            }
        } else {
            redirect('arsip');
        }
    }
}
