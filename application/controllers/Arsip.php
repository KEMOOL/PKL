<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Arsip extends CI_Controller
{
    public function index()
    {
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'arsip/index';
        $config['total_rows'] = $this->perpus->countTotalArsip();
        $config['per_page'] = 2;

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
