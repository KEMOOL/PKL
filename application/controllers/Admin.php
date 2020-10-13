<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        if (!$this->session->userdata('level')) {
            redirect('admin/masuk');
        }
        $data['title'] = 'Dashboard | Admin';
        $data['listKegiatan'] = $this->perpus->getListKegiatan();

        $this->load->view('template/navbarAdmin', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/dashboard');
        $this->load->view('template/footerAdmin');
    }

    public function addUser()
    {
        $this->perpus->addUser();

        return $this->output->set_output(json_encode('sukses bro'));
    }
    //
    public function Arsip()
    {
        if (!$this->session->userdata('level')) {
            redirect('admin/masuk');
        }
        $data['title'] = 'Arsip | Admin';
        $data['listKegiatan'] = $this->perpus->getListKegiatan();

        $this->load->view('template/navbarAdmin', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/arsip');
        $this->load->view('template/footerAdmin');
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

        return $this->output->set_output(json_encode($this->upload->display_errors()));
    }

    public function getLIstArsip()
    {
        $data['arsip'] = $this->perpus->getLIstArsip();
        $data['session'] = $this->session->userdata('level');

        return $this->output->set_output(json_encode($data));
    }

    public function hapusArsip()
    {
        $arsip = $this->perpus->getDetailArsip($this->input->post('id'));

        unlink(FCPATH . 'assets/img/arsip/' . $arsip['gambar']);

        $this->perpus->hapusArsip();

        return $this->output->set_output(json_encode('sukses'));
    }
    //
    public function Berita()
    {
        if (!$this->session->userdata('level')) {
            redirect('admin/masuk');
        }
        $data['title'] = 'Berita | Admin';
        $data['listKegiatan'] = $this->perpus->getListKegiatan();

        $this->load->view('template/navbarAdmin', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/berita');
        $this->load->view('template/footerAdmin');
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
        // $this->session->set_flashdata('pesan', '<div id="flashData" value="ada"></div>');

        return $this->output->set_output(json_encode('sukses'));
    }

    public function getLIstBerita()
    {
        $data['berita'] = $this->perpus->getLIstBerita();
        $data['session'] = $this->session->userdata('level');

        return $this->output->set_output(json_encode($data));
    }

    public function hapusBerita()
    {
        $berita = $this->perpus->getDetailBerita($this->input->post('id'));

        unlink(FCPATH . 'assets/img/berita/' . $berita['gambar']);

        $this->perpus->hapusBerita();

        return $this->output->set_output(json_encode('sukses'));
    }
    //
    public function bukuPopuler()
    {
        if (!$this->session->userdata('level')) {
            redirect('admin/masuk');
        }
        $data['title'] = 'Buku Populer | Admin';
        $data['listKegiatan'] = $this->perpus->getListKegiatan();

        $this->load->view('template/navbarAdmin', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/bukuPopuler');
        $this->load->view('template/footerAdmin');
    }

    public function simpanBukuPopuler()
    {
        $buku = $this->perpus->getDetailBukuPopuler($this->input->post('id'));
        if (!$buku) {
            $this->perpus->simpanBukuPopuler($this->input->post('id'));
            return $this->output->set_output(json_encode('sukses'));
        }
        return $this->output->set_output(json_encode('gagal'));
    }

    public function getListBukuPopuler()
    {
        $data['buku'] = $this->perpus->getListBukuPopuler();
        $data['session'] = $this->session->userdata('level');

        return $this->output->set_output(json_encode($data));
    }

    public function getDetailBuku()
    {
        $data = $this->perpus->getDetailBukuIsbn();

        return $this->output->set_output(json_encode($data));
    }

    public function hapusBukuPopuler()
    {
        $this->perpus->hapusBukuPopuler();

        return $this->output->set_output(json_encode('sukses'));
    }
    //
    public function dashboard()
    {
        if (!$this->session->userdata('level')) {
            redirect('admin/masuk');
        }
        $data['title'] = 'Dashboard | Admin';
        $data['listKegiatan'] = $this->perpus->getListKegiatan();

        $this->load->view('template/navbarAdmin', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/dashboard');
        $this->load->view('template/footerAdmin');
    }

    public function getDataPengunjung()
    {
        $data = $this->perpus->getDataPengunjung();

        return $this->output->set_output(json_encode($data));
    }

    public function getDataJenisPengunjung()
    {
        $data = $this->perpus->getDataJenisPengunjung();

        return $this->output->set_output(json_encode($data));
    }

    public function getTotalKoleksiBuku()
    {
        $data = $this->perpus->getTotalKoleksiBuku();

        return $this->output->set_output(json_encode($data));
    }

    public function getTotalPengunjung()
    {
        $data = $this->perpus->getTotalPengunjung();

        return $this->output->set_output(json_encode($data));
    }

    public function getTotalAnggota()
    {
        $data = $this->perpus->getTotalAnggota();

        return $this->output->set_output(json_encode($data));
    }

    public function getTotalKomentar()
    {
        $data = $this->perpus->getTotalKomentar();

        return $this->output->set_output(json_encode($data));
    }

    public function getSelectTampilStatistik($waktu)
    {
        $data['data'] = $this->perpus->getSelectTampilStatistik($waktu);
        $data['jenisKelamin'] = $this->perpus->getSelectTampilStatistikJenisKelamin($waktu);
        $data['jenisKelaminNull'] = $this->perpus->getSelectTampilStatistikJenisKelaminNull($waktu);

        return $this->output->set_output(json_encode($data));
    }
    public function getSelectTampilStatistikAnggota()
    {
        $data['line'] = $this->perpus->getSelectTampilStatistikAnggotaLine();
        $data['pie']['noNull'] = $this->perpus->getSelectTampilStatistikAnggotaPie();
        $data['pie']['null'] = $this->perpus->getSelectTampilStatistikAnggotaPieNull();

        return $this->output->set_output(json_encode($data));
    }
    //
    public function kegiatan($idKegiatan)
    {
        if (!$this->session->userdata('level')) {
            redirect('admin/masuk');
        }
        $kegiatan = $this->perpus->getDetailKegiatan($idKegiatan);
        if (!$kegiatan) {
            redirect('admin/dashboard');
        }
        $data['title'] = 'Kegiatan | Admin';
        $data['listKegiatan'] = $this->perpus->getListKegiatan();
        $data['kegiatan'] = $kegiatan;

        $this->load->view('template/navbarAdmin', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/kegiatan');
        $this->load->view('template/footerAdmin');
    }
    //
    public function koleksiBuku()
    {
        if (!$this->session->userdata('level')) {
            redirect('admin/masuk');
        }
        $data['title'] = 'Koleksi Buku | Admin';
        $data['listKegiatan'] = $this->perpus->getListKegiatan();

        $this->load->view('template/navbarAdmin', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/tesServerSide');
        $this->load->view('template/footerAdmin');
    }

    public function getLIstBukuAll()
    {
        $data['buku'] = $this->perpus->getLIstBukuAll();
        $data['session'] = $this->session->userdata('level');

        return $this->output->set_output(json_encode($data));
    }
    //
    public function kotakSaran()
    {
        if (!$this->session->userdata('level')) {
            redirect('admin/masuk');
        }
        $data['title'] = 'Kotak Saran | Admin';
        $data['listKegiatan'] = $this->perpus->getListKegiatan();

        $this->load->view('template/navbarAdmin', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/kotakSaran');
        $this->load->view('template/footerAdmin');
    }

    public function getListSaran($Bagian)
    {
        $data['komentar'] = $this->perpus->getListSaran($Bagian);
        $data['session'] = $this->session->userdata('level');

        return $this->output->set_output(json_encode($data));
    }

    public function tampilkanKomentar()
    {
        $this->perpus->tampilkanKomentar();

        return $this->output->set_output(json_encode('sukses'));
    }
    public function getYangDitampilkan()
    {
        $data = $this->perpus->getYangDitampilkan();

        return $this->output->set_output(json_encode($data));
    }

    public function hapusKomentar()
    {
        $this->perpus->hapusKomentar();

        return $this->output->set_output(json_encode('sukses'));
    }

    public function hapusTampilkanKomentar()
    {
        $this->perpus->hapusTampilkanKomentar();

        return $this->output->set_output(json_encode('sukses'));
    }
    //
    public function masuk()
    {
        if ($this->session->userdata('level')) {
            redirect('admin/dashboard');
        }
        $this->load->view('admin/masuk');
    }

    public function cekMasuk()
    {
        $user = $this->perpus->cekMasuk($this->input->post('username'));

        if (password_verify($this->input->post('password'), $user['password'])) {
            if ($user['level'] == 'admin') {
                $data = [
                    'level' => $user['level']
                ];
                $this->session->set_userdata($data);
            } else {
                $data = [
                    'level' => $user['level']
                ];
                $this->session->set_userdata($data);
            }
            $this->session->set_userdata($data);
            return $this->output->set_output(json_encode('sukses'));
        }
        return $this->output->set_output(json_encode('gagal'));
    }

    public function gantiPassword()
    {
        $user = $this->perpus->cekMasuk($this->session->userdata('level'));
        if (password_verify($this->input->post('passwordLama'), $user['password'])) {
            $this->perpus->gantiPassword();
            return $this->output->set_output(json_encode('sukses'));
        } else {
            return $this->output->set_output(json_encode('gagal'));
        }
    }

    public function keluar()
    {
        $this->session->sess_destroy();
        redirect('admin/masuk');
    }
    //
    public function permintaanBuku()
    {
        if (!$this->session->userdata('level')) {
            redirect('admin/masuk');
        }
        $data['title'] = 'Permintaan Buku | Admin';
        $data['listKegiatan'] = $this->perpus->getListKegiatan();

        $this->load->view('template/navbarAdmin', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/permintaanBuku');
        $this->load->view('template/footerAdmin');
    }

    public function getListPermintaanBuku()
    {
        $data['buku'] = $this->perpus->getListPermintaanBuku();
        $data['session'] = $this->session->userdata('level');

        return $this->output->set_output(json_encode($data));
    }

    public function getDetailPermintaanBuku()
    {
        $data = $this->perpus->getDetailPermintaanBuku();

        return $this->output->set_output(json_encode($data));
    }
    public function hapusPermintaanBuku()
    {
        $buku = $this->perpus->getDetailPermintaanBuku();

        unlink(FCPATH . 'assets/img/permintaanBuku/' . $buku['gambar']);

        $this->perpus->hapusPermintaanBuku();

        return $this->output->set_output(json_encode('sukses'));
    }
    //
    public function tambahKegiatan()
    {
        if (!$this->session->userdata('level')) {
            redirect('admin/masuk');
        }
        $data['title'] = 'Kegiatan | Admin';
        $data['listKegiatan'] = $this->perpus->getListKegiatan();

        $this->load->view('template/navbarAdmin', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/tambahKegiatan');
        $this->load->view('template/footerAdmin');
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
        $data = $this->perpus->getKegiatanBaru();

        return $this->output->set_output(json_encode($data));
    }

    public function simpanKegiatanLama($idKegiatan)
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
            $this->perpus->simpanKegiatanLama($idKegiatan, $namaImage1, $namaImage2);
            $this->session->set_flashdata('pesan', '<div id="flashData" value="ada">12345678</div>');
        } else if ($image1 != '') {
            $this->perpus->simpanKegiatanLama($idKegiatan, $namaImage1, '');
            $this->session->set_flashdata('pesan', '<div id="flashData" value="ada">12345678</div>');
        } else if ($image2 != '') {
            $this->perpus->simpanKegiatanLama($idKegiatan, '', $namaImage2);
            $this->session->set_flashdata('pesan', '<div id="flashData" value="ada">12345678</div>');
        } else {
            $this->perpus->simpanKegiatanLama($idKegiatan, '', '');
        }
        return $this->output->set_output(json_encode('sukses'));
    }

    public function hapusKegiatan()
    {
        $kegiatan = $this->perpus->getDetailKegiatan($this->input->post('id'));

        unlink(FCPATH . 'assets/img/kegiatan/' . $kegiatan['gambar1']);
        unlink(FCPATH . 'assets/img/kegiatan/' . $kegiatan['gambar2']);

        $this->perpus->hapusKegiatan();
        $this->session->set_flashdata('pesan', '<div id="flashData" value="ada">12345678</div>');

        return $this->output->set_output(json_encode('sukses'));
    }

    //
    //
    public function tesServerSide()
    {
        if (!$this->session->userdata('level')) {
            redirect('admin/masuk');
        }
        $data['title'] = 'Buku Populer | Admin';
        $data['listKegiatan'] = $this->perpus->getListKegiatan();

        $this->load->view('template/navbarAdmin', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/tesServerSide');
        $this->load->view('template/footerAdmin');
    }

    public function get_data_user()
    {
        $list = $this->perpus->get_datatables();
        $data = array();
        $nomor = $this->input->post('start');
        foreach ($list as $buku) {
            $nomor++;
            $row = array();
            $row[] = $nomor;
            $row[] = $buku->Title;
            $row[] = $buku->ISBN;
            $row[] = $buku->Author;
            $row[] = $buku->Publisher;
            $aksi = "<a href='" . base_url() . "buku/" .
                $buku->ID .
                "'target='_blank'><button class='btn btn-rounded btn-outline-info btn-sm'>detail</button></a>";
            if ($this->session->userdata('level') == "admin") {
                $aksi .= "<button type='button' class='btn btn-outline-success btn-rounded btn-sm' id='tampilkan' onclick='simpanBukuPopulerKoleksi(" .
                    $nomor .
                    ")'>Tampilkan</button>";
            }
            $row[] = $aksi;

            $data[] = $row;
        }

        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->perpus->count_all(),
            "recordsFiltered" => $this->perpus->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        return $this->output->set_output(json_encode($output));
    }
}
