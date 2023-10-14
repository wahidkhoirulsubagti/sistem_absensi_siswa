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
        $this->load->model('RekapitulasiModel');
    }

    public function index()
    {
        $this->load->view("head");
        $this->load->view('siswa/input_cari_nis');
    }

    public function cari_rekapitulasi_siswa()
    {
        $nis = $this->input->post('nis');

        $data['rekapitulasi'] = $this->CariNisModel->get_rekapitulasi_where_nis($nis);
        $data['rekapitulasi_counts'] = $this->RekapitulasiModel->get_rekapitulasi_counts();

        $this->load->view("head");

        $this->load->view("siswa/datarekapitulasi", $data);
        $this->load->view('modal_input_rekapitulasi', $data);

        $this->load->view("footer");
    }
}
