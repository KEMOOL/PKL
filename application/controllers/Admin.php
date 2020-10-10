<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        if (!$this->session->userdata('level')) {
            redirect('admin/masuk');
        } else {
            $data['title'] = 'Dashboard | Admin';
            $data['listKegiatan'] = $this->perpus->getListKegiatan();

            $this->load->view('template/navbarAdmin', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/dashboard');
            $this->load->view('template/footerAdmin');
        }
    }

    public function addUser()
    {
        $this->perpus->addUser();

        echo json_encode('sukses bro');
    }
    //
    public function Arsip()
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
    //
    public function Berita()
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
        // $this->session->set_flashdata('pesan', '<div id="flashData" value="ada"></div>');

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
    //
    public function bukuPopuler()
    {
        if (!$this->session->userdata('level')) {
            redirect('admin/masuk');
        } else {
            $data['title'] = 'Buku Populer | Admin';
            $data['listKegiatan'] = $this->perpus->getListKegiatan();

            $this->load->view('template/navbarAdmin', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/bukuPopuler');
            $this->load->view('template/footerAdmin');
        }
    }

    public function simpanBukuPopuler()
    {
        $buku = $this->perpus->getDetailBukuPopuler($this->input->post('id'));
        if (!$buku) {

            $this->perpus->simpanBukuPopuler($this->input->post('id'));
            echo json_encode('sukses');
        } else {
            echo json_encode('gagal');
        }
    }

    public function getListBukuPopuler()
    {
        $data['buku'] = $this->perpus->getListBukuPopuler();
        $data['session'] = $this->session->userdata('level');

        echo json_encode($data);
    }

    public function getDetailBuku()
    {
        $data = $this->perpus->getDetailBukuIsbn();

        echo json_encode($data);
    }

    public function hapusBukuPopuler()
    {
        $data = $this->perpus->hapusBukuPopuler();

        echo json_encode('sukses');
    }
    //
    public function dashboard()
    {
        if (!$this->session->userdata('level')) {
            redirect('admin/masuk');
        } else {
            $data['title'] = 'Dashboard | Admin';
            $data['listKegiatan'] = $this->perpus->getListKegiatan();

            $this->load->view('template/navbarAdmin', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/dashboard');
            $this->load->view('template/footerAdmin');
        }
    }

    public function getDataPengunjung()
    {
        $data = $this->perpus->getDataPengunjung();

        echo json_encode($data);
    }

    public function getDataJenisPengunjung()
    {
        $data = $this->perpus->getDataJenisPengunjung();

        echo json_encode($data);
    }

    public function getTotalKoleksiBuku()
    {
        $data = $this->perpus->getTotalKoleksiBuku();

        echo json_encode($data);
    }

    public function getTotalPengunjung()
    {
        $data = $this->perpus->getTotalPengunjung();

        echo json_encode($data);
    }

    public function getTotalAnggota()
    {
        $data = $this->perpus->getTotalAnggota();

        echo json_encode($data);
    }

    public function getTotalKomentar()
    {
        $data = $this->perpus->getTotalKomentar();

        echo json_encode($data);
    }

    public function getSelectTampilStatistik($waktu)
    {
        $data['data'] = $this->perpus->getSelectTampilStatistik($waktu);
        $data['jenisKelamin'] = $this->perpus->getSelectTampilStatistikJenisKelamin($waktu);
        $data['jenisKelaminNull'] = $this->perpus->getSelectTampilStatistikJenisKelaminNull($waktu);

        echo json_encode($data);
    }
    public function getSelectTampilStatistikAnggota()
    {
        $data['line'] = $this->perpus->getSelectTampilStatistikAnggotaLine();
        $data['pie']['noNull'] = $this->perpus->getSelectTampilStatistikAnggotaPie();
        $data['pie']['null'] = $this->perpus->getSelectTampilStatistikAnggotaPieNull();

        echo json_encode($data);
    }
    //
    public function kegiatan($idKegiatan)
    {
        if (!$this->session->userdata('level')) {
            redirect('admin/masuk');
        } else {
            $kegiatan = $this->perpus->getDetailKegiatan($idKegiatan);
            if ($kegiatan) {
                $data['title'] = 'Kegiatan | Admin';
                $data['listKegiatan'] = $this->perpus->getListKegiatan();
                $data['kegiatan'] = $kegiatan;

                $this->load->view('template/navbarAdmin', $data);
                $this->load->view('admin/sidebar', $data);
                $this->load->view('admin/kegiatan');
                $this->load->view('template/footerAdmin');
            } else {
                redirect('admin/dashboard');
            }
        }
    }
    //
    public function koleksiBuku()
    {
        if (!$this->session->userdata('level')) {
            redirect('admin/masuk');
        } else {
            $data['title'] = 'Koleksi Buku | Admin';
            $data['listKegiatan'] = $this->perpus->getListKegiatan();

            $this->load->view('template/navbarAdmin', $data);
            $this->load->view('admin/sidebar', $data);
            // $this->load->view('admin/koleksiBuku');
            $this->load->view('admin/tesServerSide');
            $this->load->view('template/footerAdmin');
        }
    }

    public function getLIstBukuAll()
    {
        $data['buku'] = $this->perpus->getLIstBukuAll();
        $data['session'] = $this->session->userdata('level');

        echo json_encode($data);
    }
    //
    public function kotakSaran()
    {
        if (!$this->session->userdata('level')) {
            redirect('admin/masuk');
        } else {
            $data['title'] = 'Kotak Saran | Admin';
            $data['listKegiatan'] = $this->perpus->getListKegiatan();

            $this->load->view('template/navbarAdmin', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/kotakSaran');
            $this->load->view('template/footerAdmin');
        }
    }

    public function getListSaran($Bagian)
    {
        $data['komentar'] = $this->perpus->getListSaran($Bagian);
        $data['session'] = $this->session->userdata('level');

        echo json_encode($data);
    }

    public function tampilkanKomentar()
    {
        $this->perpus->tampilkanKomentar();

        echo json_encode('sukses');
    }
    public function getYangDitampilkan()
    {
        $data = $this->perpus->getYangDitampilkan();

        echo json_encode($data);
    }

    public function hapusKomentar()
    {
        $this->perpus->hapusKomentar();

        echo json_encode('sukses');
    }

    public function hapusTampilkanKomentar()
    {
        $this->perpus->hapusTampilkanKomentar();

        echo json_encode('sukses');
    }
    //
    public function masuk()
    {
        if ($this->session->userdata('level')) {
            redirect('admin/dashboard');
        } else {
            $data['title'] = 'Masuk Staf';
            $this->load->view('admin/masuk');
        }
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
            echo json_encode('sukses');
        } else {
            echo json_encode('gagal');
        }
    }
    public function gantiPassword()
    {
        $user = $this->perpus->cekMasuk($this->session->userdata('level'));
        if (password_verify($this->input->post('passwordLama'), $user['password'])) {
            $this->perpus->gantiPassword();
            echo json_encode('sukses');
        } else {
            echo json_encode('gagal');
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
        } else {
            $data['title'] = 'Permintaan Buku | Admin';
            $data['listKegiatan'] = $this->perpus->getListKegiatan();

            $this->load->view('template/navbarAdmin', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/permintaanBuku');
            $this->load->view('template/footerAdmin');
        }
    }

    public function getListPermintaanBuku()
    {
        $data['buku'] = $this->perpus->getListPermintaanBuku();
        $data['session'] = $this->session->userdata('level');

        echo json_encode($data);
    }

    public function getDetailPermintaanBuku()
    {
        $data = $this->perpus->getDetailPermintaanBuku();

        echo json_encode($data);
    }
    public function hapusPermintaanBuku()
    {
        $buku = $this->perpus->getDetailPermintaanBuku();

        unlink(FCPATH . 'assets/img/permintaanBuku/' . $buku['gambar']);

        $this->perpus->hapusPermintaanBuku();

        echo json_encode('sukses');
    }
    //
    public function tambahKegiatan()
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
        $data = $this->perpus->getKegiatanBaru();

        echo json_encode($data);
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
            $this->session->set_flashdata('pesan', '<div id="flashData" value="ada">12345678</div>');
        } else if ($image1 != '') {
            $this->perpus->simpanKegiatanLama($id, $namaImage1, '');
            $this->session->set_flashdata('pesan', '<div id="flashData" value="ada">12345678</div>');
        } else if ($image2 != '') {
            $this->perpus->simpanKegiatanLama($id, '', $namaImage2);
            $this->session->set_flashdata('pesan', '<div id="flashData" value="ada">12345678</div>');
        } else {
            $this->perpus->simpanKegiatanLama($id, '', '');
        }
        echo json_encode('sukses');
    }

    public function hapusKegiatan()
    {
        $kegiatan = $this->perpus->getDetailKegiatan($this->input->post('id'));

        unlink(FCPATH . 'assets/img/kegiatan/' . $kegiatan['gambar1']);
        unlink(FCPATH . 'assets/img/kegiatan/' . $kegiatan['gambar2']);

        $this->perpus->hapusKegiatan();
        $this->session->set_flashdata('pesan', '<div id="flashData" value="ada">12345678</div>');

        echo json_encode('sukses');
    }

    //
    //
    public function tesServerSide()
    {
        if (!$this->session->userdata('level')) {
            redirect('admin/masuk');
        } else {
            $data['title'] = 'Buku Populer | Admin';
            $data['listKegiatan'] = $this->perpus->getListKegiatan();

            $this->load->view('template/navbarAdmin', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/tesServerSide');
            $this->load->view('template/footerAdmin');
        }
    }

    public function get_data_user()
    {
        $list = $this->perpus->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $buku) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $buku->Title;
            $row[] = $buku->ISBN;
            $row[] = $buku->Author;
            $row[] = $buku->Publisher;
            $aksi = "<a href='" . base_url() . "buku/" .
                $buku->ID .
                "'target='_blank'><button class='btn btn-rounded btn-outline-info btn-sm'>detail</button></a>";
            if ($this->session->userdata('level') == "admin") {
                $aksi .= "<button type='button' class='btn btn-outline-success btn-rounded btn-sm' id='tampilkan' onclick='simpanBukuPopulerKoleksi(" .
                    $no .
                    ")'>Tampilkan</button>";
            }
            $row[] = $aksi;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->perpus->count_all(),
            "recordsFiltered" => $this->perpus->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
}
