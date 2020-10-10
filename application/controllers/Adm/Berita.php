<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
    public function index()
    {
        if (!$this->session->userdata('level')) {
            redirect('admin/masuk');
        } else {
            $data['title'] = 'Berita | Admin';
            $data['listKegiatan'] = $this->perpus->getListKegiatan();

            $this->load->view('template/navbarAdmin', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/berita');
            $this->load->view('template/footerAdmin');
        }
    }

    public function simpanBerita()
    {
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '2048';
        $config['upload_path'] = './assets/img/berita';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $this->upload->do_upload('image');
        $namaImage = $this->upload->data('file_name');

        $this->perpus->simpanBerita($namaImage);

        echo json_encode('sukses');
    }

    public function getLIstBerita()
    {
        $data['berita'] = $this->perpus->getLIstBerita();
        $data['session'] = $this->session->userdata('level');

        echo json_encode($data);
    }

    public function hapusBerita()
    {
        $berita = $this->perpus->getDetailBerita($this->input->post('id'));

        unlink(FCPATH . 'assets/img/berita/' . $berita['gambar']);

        $this->perpus->hapusBerita();

        echo json_encode('sukses');
    }
}
