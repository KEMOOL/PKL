<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masuk extends CI_Controller
{
    public function index()
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
}
