<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function index()
    {
        // Hapus session user
        $this->session->unset_userdata('user');

        // Redirect ke halaman login
        redirect('http://localhost/Wahid/login');
    }

}
