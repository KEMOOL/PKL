<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TambahKegiatan extends CI_Controller
{
    public function index()
    {
        if (!$this->session->userdata('level')) {
            redirect('admin/masuk');
        } else {
            $data['title'] = 'Kegiatan | Admin';
            $data['listKegiatan'] = $this->perpus->getListKegiatan();

            $this->load->view('template/navbarAdmin', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/tambahKegiatan');
            $this->load->view('template/footerAdmin');
        }
    }

    public function simpanKegiatan()
    {
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '2048';
        $config['upload_path'] = './assets/img/kegiatan';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $this->upload->do_upload('image1');
        $namaImage1 = $this->upload->data('file_name');
        $this->upload->do_upload('image2');
        $namaImage2 = $this->upload->data('file_name');
        $this->perpus->simpanKegiatan($namaImage1, $namaImage2);

        echo json_encode('sukses');
    }

    public function simpanKegiatanLama($id)
    {
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '2048';
        $config['upload_path'] = './assets/img/kegiatan';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $image1 = basename($_FILES["image1"]["name"]);
        $image2 = basename($_FILES["image2"]["name"]);
        if ($image1 != '') {
            $this->upload->do_upload('image1');
            $namaImage1 = $this->upload->data('file_name');
        }
        if ($image2 != '') {
            $this->upload->do_upload('image2');
            $namaImage2 = $this->upload->data('file_name');
        }
        if (($image1 != '') && ($image2 != '')) {
            $this->perpus->simpanKegiatanLama($id, $namaImage1, $namaImage2);
        } else if ($image1 != '') {
            $this->perpus->simpanKegiatanLama($id, $namaImage1, '');
        } else if ($image2 != '') {
            $this->perpus->simpanKegiatanLama($id, '', $namaImage2);
        } else {
            $this->perpus->simpanKegiatanLama($id, '', '');
        }
        $this->session->set_flashdata('pesan', '<div id="flashData" value="ada"></div>');
        // echo json_encode($this->input->post('isi1'));
        echo json_encode('sukses');
    }

    public function hapusKegiatan()
    {
        $kegiatan = $this->perpus->getDetailKegiatan($this->input->post('id'));

        unlink(FCPATH . 'assets/img/kegiatan/' . $kegiatan['gambar1']);
        unlink(FCPATH . 'assets/img/kegiatan/' . $kegiatan['gambar2']);

        $this->perpus->hapusKegiatan();

        echo json_encode('sukses');
    }
}
