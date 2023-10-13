<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PelajaranModel extends CI_Model {

    public function save_pelajaran($data)
  {
    // Simpan data siswa ke database
    $this->db->insert('mata_pelajaran', $data);
  }

  public function get_pelajaran()
  {
    $query = $this->db->select('id_matapelajaran, nama_matapelajaran')
      ->get('mata_pelajaran');
    return $query->result_array();
  }
  public function hapus_pelajaran($id_matapelajaran)
  {
    // Hapus data siswa dari tabel siswa berdasarkan nis
    $this->db->where('id_matapelajaran', $id_matapelajaran);
    $this->db->delete('mata_pelajaran');
  }
  
  public function update_pelajaran($id_matapelajaran, $data){
    $this->db->where('id_matapelajaran', $id_matapelajaran);
    $this->db->update('mata_pelajaran', $data);
}

}
