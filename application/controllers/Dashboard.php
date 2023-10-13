<?php 

class Dashboard Extends CI_Controller {
   
    public function __contruct() {
        parent::__construct();
        $this->load->helper('url');
    }


    public function index() {

    $data['siswa'] = $this->M_login->siswa();
    $data['guru'] = $this->M_login->guru();
    $data['absensi'] = $this->M_login->absensi();
        // $data['barangmasuk'] = $this->user_m->barangmasuk();
        // $data['barangkeluar'] = $this->user_m->barangkeluar();
        // $data['user'] = $this->user_m->user();

    $this->load->view("head");
     $this->load->view('dashboard');
    $this->load->view("sidebar");
    // $this->load->view('dashboard');
    $this->load->view("content");
    $this->load->view("footer");


    }

}