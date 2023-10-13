<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AbsensiModel extends CI_Model
{

  public function save_absensi($data)
  {
    // Simpan data siswa ke database
    $this->db->insert('absensi', $data);
  }

  public function get_absensi()
  {
    $this->db->select('absensi.id_absensi, absensi.nis, siswa.nama_siswa, absensi.id_jadwal, absensi.id_kelas, absensi.keterangan, absensi.tanggal');
    $this->db->from('absensi');
    $this->db->join('siswa', 'siswa.nis = absensi.nis', 'left');
    $this->db->join('jadwal', 'jadwal.id_jadwal = absensi.id_jadwal', 'left');
    $this->db->join('kelas', 'kelas.id_kelas = absensi.id_kelas', 'left');
    $this->db->order_by('absensi.id_absensi', 'desc'); // Mengurutkan berdasarkan id_absensi secara descending
    $query = $this->db->get();
    return $query->result_array();
  }

  public function hapus_absensi($id_absensi)
  {
    // Hapus data siswa dari tabel siswa berdasarkan nis
    $this->db->where('id_absensi', $id_absensi);
    $this->db->delete('absensi');
  }

  public function update_absensi($id_absensi, $data)
  {
    $this->db->where('id_absensi', $id_absensi);
    $this->db->update('absensi', $data);
  }

  // Tambahkan metode lainnya sesuai kebutuhan
}
