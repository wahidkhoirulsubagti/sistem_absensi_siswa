<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cari_nis extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('CariNisModel');
    }

    public function index()
    {
        $this->load->view("head");
        $this->load->view('siswa/input_cari_nis');
    }

    public function cari_rekapitulasi_siswa()
    {
        //
    }
}
