<?php

class M_login extends CI_Model
{
    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function logout()
    {
        $this->session->sess_destroy(); // Menghapus semua data sesi pengguna
        redirect('v_login'); // Mengarahkan pengguna ke halaman login (ganti 'login' dengan URL yang sesuai)
    }

    function siswa()
    {
        $query = $this->db->query('SELECT * FROM siswa');
        return $query->num_rows();
    }

    function guru()
    {
        $query = $this->db->query('SELECT * FROM guru');
        return $query->num_rows();
    }

    function absensi()
    {
        $query = $this->db->query('SELECT * FROM absensi');
        return $query->num_rows();
    }

    function rekapitulasi()
    {
        $query = $this->db->query('SELECT * FROM rekapitulasi');
        return $query->num_rows();
    }

    // function siswa()
    // {
    //     $this->db->select('*');
    //     $this->db->from('siswa');
    //     $query = $this->db->get(); 
    //     return $query->result();
    // }

}
