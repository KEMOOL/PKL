<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function index()
    {
    }

    public function sejarah()
    {
        $data['title'] = 'Sejarah';
        $data['listKegiatan'] = $this->perpus->getListKegiatan();

        $this->load->view('template/navbar', $data);
        $this->load->view('sejarah');
        $this->load->view('template/footer');
    }

    public function visiMisi()
    {
        $data['title'] = 'Visi Misi';
        $data['listKegiatan'] = $this->perpus->getListKegiatan();

        $this->load->view('template/navbar', $data);
        $this->load->view('visiMisi');
        $this->load->view('template/footer');
    }

    public function strukturOrganisasi()
    {
        $data['title'] = 'Struktur Organisasi';
        $data['listKegiatan'] = $this->perpus->getListKegiatan();

        $this->load->view('template/navbar', $data);
        $this->load->view('strukturOrganisasi');
        $this->load->view('template/footer');
    }
}
