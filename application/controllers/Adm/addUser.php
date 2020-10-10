<?php
defined('BASEPATH') or exit('No direct script access allowed');

class addUser extends CI_Controller
{
    public function index()
    {
        $this->perpus->addUser();

        echo json_encode('sukses bro');
    }
}
