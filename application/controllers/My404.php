<?php
class My404 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['title'] = 'KPAD Ungaran';
        $data['listKegiatan'] = $this->perpus->getListKegiatan();

        // $this->load->view('err404', $data);

        $this->load->view('template/navbar', $data);
        $this->load->view('err404');
        $this->load->view('template/footer');
    }
}
