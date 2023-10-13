<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SiswaModel extends CI_Model
{

  public function saveSiswa($data)
  {
    // Simpan data siswa ke database
    $this->db->insert('siswa', $data);
  }

  public function get_siswa()
  {
    $query = $this->db->select('nis, nama_siswa, id_kelas, tgl_lhr_siswa, jk_siswa, agama_siswa, alamat_siswa')
      ->get('siswa');
    return $query->result_array();
  }
  public function hapus_siswa($nis)
  {
    // Hapus data siswa dari tabel siswa berdasarkan nis
    $this->db->where('nis', $nis);
    $this->db->delete('siswa');
  }
  
  public function update_siswa($nis, $data){
    $this->db->where('nis', $nis);
    $this->db->update('siswa', $data);
}

  // Tambahkan metode lainnya sesuai kebutuhan
}
