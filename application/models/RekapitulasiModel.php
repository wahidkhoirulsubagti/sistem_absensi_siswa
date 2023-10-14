<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RekapitulasiModel extends CI_Model
{

  public function save_rekapitulasi($data)
  {
    // Simpan data siswa ke database
    $this->db->insert('rekapitulasi', $data);
  }

  public function get_rekapitulasi()
  {
    $this->db->select('absensi.id_absensi, absensi.nis, siswa.nama_siswa, absensi.id_jadwal, absensi.id_kelas, absensi.keterangan, absensi.tanggal, kelas.nama_kelas');
    $this->db->from('absensi');
    $this->db->join('siswa', 'siswa.nis = absensi.nis', 'left');
    $this->db->join('jadwal', 'jadwal.id_jadwal = absensi.id_jadwal', 'left');
    $this->db->join('kelas', 'kelas.id_kelas = absensi.id_kelas', 'left');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_rekapitulasi_counts()
  {
    $this->db->select('nis, keterangan, COUNT(*) as count');
    $this->db->from('absensi');
    $this->db->group_by('nis, keterangan');
    $query = $this->db->get();

    $results = $query->result_array();

    $countData = array();

    foreach ($results as $row) {
      $nis = $row['nis'];
      $keterangan = $row['keterangan'];
      $count = $row['count'];

      if (!isset($countData[$nis])) {
        $countData[$nis] = array();
      }

      $countData[$nis][$keterangan] = $count;
    }

    return $countData;
  }


  public function hapus_rekapitulasi($nis)
  {
    // Hapus data rekapitulasi dari tabel siswa berdasarkan nis
    $this->db->where('nis', $nis);
    $this->db->delete('rekapitulasi');
  }

  public function update_rekapitulasi($nis, $data)
  {
    $this->db->where('nis', $nis);
    $this->db->update('rekapitulasi', $data);
  }

  // Tambahkan metode lainnya sesuai kebutuhan
}
