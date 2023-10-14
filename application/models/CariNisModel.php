<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CariNisModel extends CI_Model
{
    public function get_rekapitulasi_where_nis($nis)
    {
        $this->db->select('absensi.id_absensi, absensi.nis, siswa.nama_siswa, absensi.id_jadwal, absensi.id_kelas, absensi.keterangan, absensi.tanggal, kelas.nama_kelas');
        $this->db->from('absensi');
        $this->db->join('siswa', 'siswa.nis = absensi.nis', 'left');
        $this->db->join('jadwal', 'jadwal.id_jadwal = absensi.id_jadwal', 'left');
        $this->db->join('kelas', 'kelas.id_kelas = absensi.id_kelas', 'left');
        $this->db->where('absensi.nis', $nis);

        $query = $this->db->get();
        return $query->result_array();
    }
}
