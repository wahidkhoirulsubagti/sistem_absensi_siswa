<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GuruModel extends CI_Model
{

  public function save_guru($data)
  {
    // Simpan data siswa ke database
    $this->db->insert('guru', $data);
  }

  public function get_guru()
  {
    $query = $this->db->select('nip, nama_guru, id_kelas, tgl_lhr_guru, jk_guru, agama_guru, alamat_guru')
      ->get('guru');
    return $query->result_array();
  }
  public function hapus_guru($nip)
  {
    // Hapus data siswa dari tabel siswa berdasarkan nis
    $this->db->where('nip', $nip);
    $this->db->delete('guru');
  }
  
  public function update_guru($nip, $data){
    $this->db->where('nip', $nip);
    $this->db->update('guru', $data);
}

  // Tambahkan metode lainnya sesuai kebutuhan
}
