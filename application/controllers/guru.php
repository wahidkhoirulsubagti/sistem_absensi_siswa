<?php
class Guru extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('KelasModel');
        $this->load->model('SiswaModel');
        $this->load->model('GuruModel');
        $this->load->model('PelajaranModel');
        $this->load->model('JadwalModel');
        $this->load->model('AbsensiModel');
        $this->load->model('RekapitulasiModel');
        $this->load->model('M_login');

        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
    }

    function index()
    {
        $data['siswa'] = $this->SiswaModel->get_siswa();
        $data['kelas'] = $this->KelasModel->get_kelas();

        $data['siswa'] = $this->M_login->siswa();
        $data['guru'] = $this->M_login->guru();
        $data['absensi'] = $this->M_login->absensi();
        $data['rekapitulasi'] = $this->M_login->rekapitulasi();

        $this->load->view("head");
        $this->load->view("guru/sidebar");
        $this->load->view("content", $data);

        $this->load->view("footer");
    }

    function data_absensi()
    {

        $data['absensi'] = $this->AbsensiModel->get_absensi();
        $data['kelas'] = $this->KelasModel->get_kelas();
        $data['jadwal'] = $this->JadwalModel->get_jadwal();
        $data['siswa'] = $this->SiswaModel->get_siswa();

        $this->load->view("head");
        $this->load->view("guru/sidebar");

        $this->load->view("dataabsensi", $data);

        $this->load->view('modal_input_absensi', $data);
        $this->load->view("footer");
    }


    public function save_absensi()
    {
        $this->load->library('form_validation');
        $data = array(
            'nis' => $this->input->post('nis_siswa'),
            'id_jadwal' => $this->input->post('id_jadwal'),
            'id_kelas' => $this->input->post('id_kelas'),
            'keterangan' => $this->input->post('keterangan'),
            'tanggal' => $this->input->post('tanggal_input'),
        );

        $this->load->model('AbsensiModel');
        $this->AbsensiModel->save_absensi($data);

        // Set pesan alert
        echo "<script>alert('Data Absensi berhasil disimpan.');</script>";
        echo "<script>window.location.href = '" . site_url('guru/data_absensi') . "';</script>";
    }

    public function update_absensi()
    {
        // Validasi input
        $id_absensi = $this->input->post('id_absensi');

        // Jika validasi berhasil, simpan data siswa ke database
        $data = array(
            'id_absensi' => $this->input->post('id_absensi'),
            'nis' => $this->input->post('nis'),
            'id_jadwal' => $this->input->post('id_jadwal'),
            // 'id_kelas' => $this->input->post('id_kelas'),
            'keterangan' => $this->input->post('keterangan'),
            'tanggal' => $this->input->post('tanggal'),
        );


        // Simpan data siswa ke dalam database melalui model siswa
        $this->load->model('AbsensiModel');
        $this->AbsensiModel->update_absensi($id_absensi, $data);
        $this->AbsensiModel->update_absensi($nis, $data);
        $this->AbsensiModel->update_absensi($id_jadwal, $data);
        $this->AbsensiModel->update_absensi($id_kelas, $data);
        $this->AbsensiModel->update_absensi($keterangan, $data);
        $this->AbsensiModel->update_absensi($tanggal, $data);
        $this->AbsensiModel->update_absensi($nip, $data);

        // Redirect ke halaman sukses atau halaman lain yang diinginkan
        redirect('guru/data_absensi');
    }


    public function hapus_absensi($id_absensi)
    {
        // Pastikan $nis tidak kosong
        if (!$id_absensi) {
            redirect('admin'); // Arahkan kembali ke halaman admin jika nis kosong
        }

        // Hapus data siswa dari database
        $this->AbsensiModel->hapus_absensi($id_absensi);

        // Redirect kembali ke halaman admin atau halaman lain yang diinginkan
        redirect('guru/data_absensi');
    }




    function data_rekapitulasi()
    {
        $data['rekapitulasi'] = $this->RekapitulasiModel->get_rekapitulasi();
        $data['rekapitulasi_counts'] = $this->RekapitulasiModel->get_rekapitulasi_counts();

        $this->load->view("head");

        $this->load->view("guru/sidebar");
        $this->load->view("datarekapitulasi", $data);
        $this->load->view('modal_input_rekapitulasi', $data);

        $this->load->view("footer");
    }
}
