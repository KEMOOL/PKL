<?php

class Perpus_model extends CI_Model
{
    public function getTotalKoleksiBuku()
    {
        $this->db->select('*');
        $this->db->from('catalogs');

        return $this->db->get()->num_rows();
    }

    public function getTotalPengunjung()
    {
        $this->db->select('*');
        $this->db->from('memberguesses');

        return $this->db->get()->num_rows();
    }

    public function getTotalAnggota()
    {
        $this->db->select('*');
        $this->db->from('members');

        return $this->db->get()->num_rows();
    }

    public function getTotalKomentar()
    {
        $this->db->select('*');
        $this->db->from('saran');

        return $this->db->get()->num_rows();
    }

    public function getSelectTampilStatistik($waktu)
    {
        if ($waktu == 4) {
            $sql = 'SELECT DAY(CreateDate) AS "tahun", COUNT(CreateDate) AS "total" FROM `memberguesses` WHERE MONTH(CreateDate) = MONTH(DATE_SUB(CURDATE(), INTERVAL 1 MONTH)) AND YEAR(CreateDate) = YEAR(CURDATE()) GROUP by DAY(CreateDate)';
            // SELECT * FROM `memberguesses` WHERE MONTH(CreateDate) = MONTH(DATE_SUB(CURDATE(), INTERVAL 1 MONTH)) AND YEAR(CreateDate) = YEAR(CURDATE())
        } elseif ($waktu == 5) {
            $sql = 'SELECT MONTH(CreateDate) AS "tahun", COUNT(CreateDate) AS "total" FROM `memberguesses` WHERE YEAR(CreateDate) = YEAR(DATE_SUB(CURDATE(), INTERVAL 1 YEAR)) GROUP BY MONTH(CreateDate)';
        } elseif ($waktu == 6) {
            $sql = 'SELECT YEAR(CreateDate) AS "tahun", COUNT(CreateDate) AS "total" FROM `memberguesses` GROUP BY YEAR(CreateDate)';
        }
        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function getSelectTampilStatistikJenisKelamin($waktu)
    {
        if ($waktu == 4) {
            $sql = 'SELECT JenisKelamin_id, COUNT(JenisKelamin_id) AS total FROM `memberguesses` WHERE MONTH(CreateDate) = MONTH(DATE_SUB(CURDATE(), INTERVAL 1 MONTH)) AND YEAR(CreateDate) = YEAR(CURDATE()) GROUP BY JenisKelamin_id';
        } elseif ($waktu == 5) {
            $sql = 'SELECT JenisKelamin_id, COUNT(JenisKelamin_id) AS total FROM `memberguesses` WHERE YEAR(CreateDate) = YEAR(DATE_SUB(CURDATE(), INTERVAL 1 YEAR)) GROUP BY JenisKelamin_id';
        } elseif ($waktu == 6) {
            $sql = 'SELECT JenisKelamin_id, COUNT(JenisKelamin_id) AS total FROM `memberguesses` GROUP BY JenisKelamin_id';
        }
        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function getSelectTampilStatistikJenisKelaminNull($waktu)
    {
        if ($waktu == 4) {
            $sql = 'SELECT * FROM `memberguesses` WHERE MONTH(CreateDate) = MONTH(DATE_SUB(CURDATE(), INTERVAL 1 MONTH)) AND YEAR(CreateDate) = YEAR(CURDATE()) AND JenisKelamin_id IS NULL';
        } elseif ($waktu == 5) {
            $sql = 'SELECT * FROM `memberguesses` WHERE YEAR(CreateDate) = YEAR(DATE_SUB(CURDATE(), INTERVAL 1 YEAR)) AND JenisKelamin_id IS NULL';
        } elseif ($waktu == 6) {
            $sql = 'SELECT * FROM `memberguesses`WHERE JenisKelamin_id IS NULL';
        }
        $query = $this->db->query($sql);

        return $query->num_rows();
    }

    public function getSelectTampilStatistikAnggotaLine()
    {
        $sql = 'SELECT YEAR(CreateDate) AS "tahun", COUNT(CreateDate) AS "total" FROM `members` GROUP BY YEAR(CreateDate)';
        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function getSelectTampilStatistikAnggotaPie()
    {
        $sql = 'SELECT JenisAnggota_id AS id, COUNT(JenisAnggota_id) AS "total" FROM `members` WHERE JenisAnggota_id IS NOT NULL GROUP BY JenisAnggota_id';
        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function getSelectTampilStatistikAnggotaPieNull()
    {
        $sql = 'SELECT * FROM `members` WHERE JenisAnggota_id IS NULL';
        $query = $this->db->query($sql);

        return $query->num_rows();
    }

    public function getListKegiatan()
    {
        $this->db->select('*');
        $this->db->from('kegiatan');

        return $this->db->get()->result_array();
    }

    public function getDetailKegiatan($idKegiatan)
    {
        $this->db->select('*');
        $this->db->from('kegiatan');
        $this->db->where('id=', $idKegiatan);

        return $this->db->get()->row_array();
    }

    public function getKegiatanBaru()
    {
        $this->db->select('*');
        $this->db->from('kegiatan');
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->row_array();
    }

    public function getListPermintaanBuku()
    {
        $this->db->select('*');
        $this->db->from('permintaanbuku');

        return $this->db->get()->result_array();
    }

    public function getDetailPermintaanBuku()
    {
        $this->db->select('*');
        $this->db->from('permintaanbuku');
        $this->db->where('id=', $this->input->post('id'));

        return $this->db->get()->row_array();
    }

    public function getListSaran($Bagian)
    {
        $this->db->select('*');
        $this->db->from('saran');
        if ($Bagian != '0') {
            $this->db->where('ditujukan=', $Bagian);
        }

        return $this->db->get()->result_array();
    }

    public function getYangDitampilkan()
    {
        $this->db->select('*');
        $this->db->from('tampilkomentar');

        return $this->db->get()->result_array();
    }

    public function getListKomentar()
    {
    }

    public function getKomentar()
    {
    }

    public function getSelectedKomentar()
    {
        $this->db->select('*');
        $this->db->from('saran');
        $this->db->join('tampilkomentar', 'saran.idkomentar = tampilkomentar.idkomentar');

        return $this->db->get()->result_array();
    }

    public function getLIstBerita()
    {
        $this->db->select('*');
        $this->db->from('berita');

        return $this->db->get()->result_array();
    }

    public function getLIstBeritaTerbaru()
    {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->limit(10);
        $this->db->order_by('id', 'DESC');

        return $this->db->get()->result_array();
    }

    public function getLIstArsipTerbaru()
    {
        $this->db->select('*');
        $this->db->from('arsip');
        $this->db->limit(10);
        $this->db->order_by('id', 'DESC');

        return $this->db->get()->result_array();
    }

    public function getDetailBerita($idBerita)
    {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->where('id=', $idBerita);

        return $this->db->get()->row_array();
    }

    public function getLIstArsip()
    {
        $this->db->select('*');
        $this->db->from('arsip');

        return $this->db->get()->result_array();
    }

    public function getDetailArsip($idArsip)
    {
        $this->db->select('*');
        $this->db->from('arsip');
        $this->db->where('id=', $idArsip);

        return $this->db->get()->row_array();
    }

    public function getListBukuAll()
    {
        // $this->db->select('*');
        // $this->db->from('catalogs');

        // return $this->db->get()->result_array();

        return $this->db->get('catalogs', 1000, 0)->result_array();
    }

    public function getListBuku($limit, $star)
    {
        return $this->db->get('catalogs', $limit, $star)->result_array();
    }

    public function getListBukuCari($cari)
    {
        // $this->db->select('*');
        // $this->db->from('catalogs');
        // $this->db->like('ID', $cari);
        // $this->db->or_like('Title', $cari);
        // $this->db->or_like('Author', $cari);
        // // $this->db->or_like('Publisher', $cari);
        // // $this->db->or_like('PublishLocation', $cari);
        // // $this->db->or_like('PublishYear', $cari);

        // return $this->db->get()->result_array();
        $cari = explode("%20", $cari);
        $cari = implode("%", $cari);
        $sql = 'SELECT * FROM `catalogs` WHERE Title LIKE "%' . $cari . '%"';
        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function getListBeritaLimit($limit, $star)
    {
        return $this->db->get('berita', $limit, $star)->result_array();
    }

    public function getListArsipLimit($limit, $star)
    {
        return $this->db->get('arsip', $limit, $star)->result_array();
    }

    public function getDetailBukuId($idBuku)
    {
        $this->db->select('*');
        $this->db->from('catalogs');
        $this->db->like('ID', $idBuku);

        return $this->db->get()->row_array();
    }

    public function getDetailBukuIsbn()
    {
        $isbn = $this->input->post('isbn');
        $sql = 'SELECT * FROM catalogs WHERE ISBN LIKE "' . $isbn . '"';
        $query = $this->db->query($sql);

        return $query->row_array();
    }

    public function getListBukuPopuler()
    {
        $this->db->select('*');
        $this->db->from('bukupopuler');
        $this->db->join('catalogs', 'bukupopuler.idbuku = catalogs.ID');

        return $this->db->get()->result_array();
    }

    public function getDetailBukuPopuler($idBuku)
    {
        $this->db->select('*');
        $this->db->from('bukupopuler');
        $this->db->where('idbuku', $idBuku);
        $this->db->where('tanggal', tanggal());

        return $this->db->get()->row_array();
    }

    public function getListBukuPopulerLimit($limit, $star)
    {
        $this->db->select('*');
        $this->db->from('bukupopuler');
        $this->db->join('catalogs', 'bukupopuler.idbuku = catalogs.ID');
        $this->db->limit($limit, $star);
        $this->db->order_by('bukupopuler.id', 'DESC');

        return $this->db->get()->result_array();
    }

    public function getDataPengunjung()
    {
        $sql = 'SELECT COUNT(CreateDate) AS "total" FROM `members` GROUP BY YEAR(CreateDate)';
        $query = $this->db->query($sql);

        return $query->result_array();
    }

    // public function getDataJenisPengunjung()
    // {
    //     $sql = 'SELECT COUNT(JenisAnggota_id) AS "total" FROM `members` WHERE JenisAnggota_id IS NOT NULL GROUP BY JenisAnggota_id';
    //     $query = $this->db->query($sql);

    //     return $query->result_array();
    // }

    public function simpanSaran()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'jeniskelamin' => $this->input->post('jenisKelamin'),
            'ditujukan' => $this->input->post('ditujukan'),
            'isi' => $this->input->post('isi')
        ];

        $this->db->insert('saran', $data);
    }

    public function simpanPermintaan()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'judul' => $this->input->post('judulBuku'),
            'pengarang' => $this->input->post('pekerjaan'),
            'penerbit' => $this->input->post('pengarang'),
            'gambar' => $this->upload->data('file_name'),
            'komentar' => $this->input->post('komentarBuku'),
            'tanggal' => tanggal()
        ];

        $this->db->insert('permintaanbuku', $data);
    }

    public function simpanBerita($namaImage)
    {
        $data = [
            'gambar' => $namaImage,
            'judul' => $this->input->post('judul'),
            'isi' => $this->input->post('isi'),
            'tanggal' => tanggal()
        ];

        $this->db->insert('berita', $data);
    }

    public function simpanArsip($namaImage)
    {
        $data = [
            'gambar' => $namaImage,
            'judul' => $this->input->post('judul'),
            'isi' => $this->input->post('isi'),
            'tanggal' => tanggal()
        ];

        $this->db->insert('arsip', $data);
    }

    public function simpanBukuPopuler($idBuku)
    {
        $data = [
            'idbuku' => $idBuku,
            'tanggal' => tanggal()
        ];

        $this->db->insert('bukupopuler', $data);
    }

    public function simpanKegiatan($namaImage1, $namaImage2)
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'isi1' => $this->input->post('isi1'),
            'isi2' => $this->input->post('isi2'),
            'gambar1' => $namaImage1,
            'gambar2' => $namaImage2
        ];

        $this->db->insert('kegiatan', $data);
    }

    public function simpanKegiatanLama($idKegiatan, $image1, $image2)
    {
        $this->db->set('isi1', $this->input->post('isi1'));
        $this->db->set('isi2', $this->input->post('isi2'));
        if ($image1 != '') {
            $this->db->set('gambar1', $image1);
        }
        if ($image2 != '') {
            $this->db->set('gambar2', $image2);
        }
        $this->db->where('id', $idKegiatan);
        $this->db->update('kegiatan');
    }

    public function hapusKegiatan()
    {
        $this->db->where('id', $this->input->post('id'));
        $this->db->delete('kegiatan');
    }

    public function hapusKomentar()
    {
        $this->db->where('idkomentar', $this->input->post('id'));
        $this->db->delete('saran');

        $this->db->where('idkomentar', $this->input->post('id'));
        $this->db->delete('tampilkomentar');
    }

    public function hapusBukuPopuler()
    {
        $this->db->where('idbuku', $this->input->post('id'));
        $this->db->where('tanggal', $this->input->post('tanggal'));
        $this->db->delete('bukupopuler');
    }

    public function hapusPermintaanBuku()
    {
        $this->db->where('id', $this->input->post('id'));
        $this->db->delete('permintaanbuku');
    }

    public function hapusBerita()
    {
        $this->db->where('id', $this->input->post('id'));
        $this->db->delete('berita');
    }

    public function hapusArsip()
    {
        $this->db->where('id', $this->input->post('id'));
        $this->db->delete('arsip');
    }

    public function hapusTampilkanKomentar()
    {
        $this->db->where('idkomentar', $this->input->post('id'));
        $this->db->delete('tampilkomentar');
    }

    public function tampilkanKomentar()
    {
        $data = [
            'idkomentar' => $this->input->post('id')
        ];

        $this->db->insert('tampilkomentar', $data);
    }

    public function cekMasuk($username)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username=', $username);

        return $this->db->get()->row_array();
    }

    public function gantiPassword()
    {
        $this->db->set('password', password_hash($this->input->post('passwordBaru'), PASSWORD_DEFAULT));
        $this->db->where('level', $this->session->userdata('level'));
        $this->db->update('user');
    }

    public function countTotalCatalog()
    {
        return $this->db->get('catalogs')->num_rows();
    }

    public function countTotalBukuPopuler()
    {
        return $this->db->get('bukupopuler')->num_rows();
    }

    public function countTotalCari()
    {
        $cari = $this->input->get('pencarian');
        $this->db->select('*');
        $this->db->from('catalogs');
        $this->db->like('ID', $cari);
        $this->db->like('Title', $cari);
        $this->db->like('Author', $cari);
        $this->db->like('Publisher', $cari);
        $this->db->like('PublishLocation', $cari);
        $this->db->like('PublishYear', $cari);

        return $this->db->get()->num_rows();
    }

    public function countTotalBerita()
    {
        return $this->db->get('berita')->num_rows();
    }

    public function countTotalArsip()
    {
        return $this->db->get('arsip')->num_rows();
    }

    // public function addUser()
    // {
    //     $data = [
    //         'username' => htmlspecialchars($this->input->post('username')),
    //         'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
    //     ];

    //     $this->db->insert('user', $data);
    // }

    var $table = 'catalogs'; //nama tabel dari database
    var $column_order = array(null, 'Title', 'ISBN', 'Author', 'Edition', 'Publisher', 'PublishLocation', 'PublishYear', 'Publikasi', 'Subject', 'PhysicalDescription', 'ISBN', 'CallNumber', 'Note', 'Languages', 'DeweyNo', 'ApproveDateOPAC', 'IsOPAC', 'IsBNI', 'IsKIN', 'IsRDA', 'CoverURL', 'Branch_id', 'Worksheet_id', 'CreateBy', 'CreateDate', 'CreateTerminal', 'UpdateBy', 'UpdateDate', 'UpdateTerminal', 'MARC_LOC', 'PRESERVASI_ID', 'QUARANTINEDBY', 'QUARANTINEDDATE', 'QUARANTINEDTERMINAL', 'Member_id', 'KIILastUploadDate'); //field yang ada di table user

    var $column_search = array('Title', 'ISBN', 'Author', 'Publisher'); //field yang diizin untuk pencarian 
    var $order = array('ID' => 'asc'); // default order 

    private function _get_datatables_query()
    {

        $this->db->from('catalogs');

        $index = 0;

        foreach ($this->column_search as $item) // loop column 
        {
            if ($this->input->post('search')['value']) // if datatable send POST for search
            {

                if ($index === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $this->input->post('search')['value']);
                } else {
                    $this->db->or_like($item, $this->input->post('search')['value']);
                }

                if (count($this->column_search) - 1 == $index) //last loop
                    $this->db->group_end(); //close bracket
            }
            $index++;
        }
        $isOrder = $this->input->post('order');
        if (isset($isOrder)) // here order processing
        {
            $this->db->order_by($this->column_order[$this->input->post('order')['0']['column']], $this->input->post('order')['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($this->input->post('length') != -1)
            $this->db->limit($this->input->post('length'), $this->input->post('start'));
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}
