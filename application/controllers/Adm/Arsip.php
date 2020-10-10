<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Arsip extends CI_Controller
{
    public function index()
    {
        if (!$this->session->userdata('level')) {
            redirect('admin/masuk');
        } else {
            $data['title'] = 'Arsip | Admin';
            $data['listKegiatan'] = $this->perpus->getListKegiatan();

            $this->load->view('template/navbarAdmin', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/arsip');
            $this->load->view('template/footerAdmin');
        }
    }

    public function simpanArsip()
    {
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '2048';
        $config['upload_path'] = './assets/img/arsip';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $this->upload->do_upload('image');
        $namaImage = $this->upload->data('file_name');

        $this->perpus->simpanArsip($namaImage);

        echo json_encode($this->upload->display_errors());
    }

    public function getLIstArsip()
    {
        $data['arsip'] = $this->perpus->getLIstArsip();
        $data['session'] = $this->session->userdata('level');

        echo json_encode($data);
    }

    public function hapusArsip()
    {
        $arsip = $this->perpus->getDetailArsip($this->input->post('id'));

        unlink(FCPATH . 'assets/img/arsip/' . $arsip['gambar']);

        $this->perpus->hapusArsip();

        echo json_encode('sukses');
    }
}
