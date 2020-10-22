<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{
	function _remap($id_buku)
	{
		$this->index($id_buku);
	}
	public function index($id_buku)
	{
		$buku = $this->perpus->getDetailBukuId($id_buku);
		if (!$buku) {
			redirect('koleksiBuku');
		}
		$data['listKegiatan'] = $this->perpus->getListKegiatan();
		$data['buku'] = $buku;
		$data['title'] = $data['buku']['Title'];

		$this->load->view('template/navbar', $data);
		$this->load->view('buku', $data);
		$this->load->view('template/footer');
	}
}
