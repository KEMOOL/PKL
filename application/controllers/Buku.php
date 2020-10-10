<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{
    function _remap($id)
    {
        $this->index($id);
    }
    public function index($id)
    {
        if ($id != 'index') {
            $data['listKegiatan'] = $this->perpus->getListKegiatan();
            $data['buku'] = $this->perpus->getDetailBukuId($this->uri->segment(2));
            $data['title'] = $data['buku']['Title'];

            if ($data['buku']) {
                $this->load->view('template/navbar', $data);
                $this->load->view('buku', $data);
                $this->load->view('template/footer');
            } else {
                redirect('my404');
            }
        } else {
            redirect('koleksiBuku');
        }
    }
}
