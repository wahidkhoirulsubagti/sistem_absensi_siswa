<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SiswaController extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
  }

  public function index()
  {

    $this->load->helper('form');
    $this->load->view('modal_input');
  }

  public function save()
  {
    // Validasi input

    // Jika validasi berhasil, simpan data siswa ke database
    $data = array(
      'nis' => $this->input->post('nis'),
      'nama_siswa' => $this->input->post('nama_siswa'),
      'id_kelas' => $this->input->post('id_kelas'),
      'tgl_lhr_siswa' => $this->input->post('tanggal_lahir'),
      'jk_siswa' => $this->input->post('jenis_kelamin'),
      'agama_siswa' => $this->input->post('agama_siswa'),
      'alamat_siswa' => $this->input->post('alamat_siswa'),
    );

    // Simpan data siswa ke dalam database melalui model siswa
    $this->load->model('SiswaModel');
    $this->SiswaModel->saveSiswa($data);

    // Set pesan alert
    echo "<script>alert('Data siswa berhasil disimpan.');</script>";
    echo "<script>window.location.href = '" . site_url('admin/datasiswa') . "';</script>";
  }

  public function update()
  {
    // Validasi input

    $nis = $this->input->post('nis');
    // Jika validasi berhasil, simpan data siswa ke database
    $data = array(
      'nama_siswa' => $this->input->post('nama_siswa'),
      'id_kelas' => $this->input->post('id_kelas'),
      'tgl_lhr_siswa' => $this->input->post('tanggal_lahir'),
      'jk_siswa' => $this->input->post('jenis_kelamin'),
      'agama_siswa' => $this->input->post('agama_siswa'),
      'alamat_siswa' => $this->input->post('alamat_siswa'),
    );


    // Simpan data siswa ke dalam database melalui model siswa
    $this->load->model('SiswaModel');
    $this->SiswaModel->update_siswa($nis, $data);

    // Set pesan alert
    echo "<script>alert('Data siswa berhasil diupdate.');</script>";
    echo "<script>window.location.href = '" . site_url('admin/datasiswa') . "';</script>";
    // Redirect ke halaman sukses atau halaman lain yang diinginkan
  }
}
