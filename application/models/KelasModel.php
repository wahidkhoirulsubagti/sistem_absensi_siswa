<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelasModel extends CI_Model {

    public function save_kelas($data)
  {
    // Simpan data siswa ke database
    $this->db->insert('kelas', $data);
  }

  public function get_kelas()
  {
    $query = $this->db->select('id_kelas, nama_kelas')
      ->get('kelas');
    return $query->result_array();
  }
  public function hapus_kelas($id_kelas)
  {
    // Hapus data siswa dari tabel siswa berdasarkan nis
    $this->db->where('id_kelas', $id_kelas);
    $this->db->delete('kelas');
  }
  
  public function update_kelas($id_kelas, $data){
    $this->db->where('id_kelas', $id_kelas);
    $this->db->update('kelas', $data);
}

}
