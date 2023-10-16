<?php

class Admin extends CI_Controller
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
		$this->load->view("sidebar");
		$this->load->view("content", $data);

		$this->load->view("footer");
	}

	function datasiswa()
	{
		$data['siswa'] = $this->SiswaModel->get_siswa();
		$data['kelas'] = $this->KelasModel->get_kelas();

		$this->load->view("head");
		$this->load->view("sidebar");

		$this->load->view("datasiswa", $data);
		// $this->load->view('modaledit', $data);
		$this->load->view('modal_input_siswa', $data);


		$this->load->view("footer");
	}


	public function hapus_siswa($nis)
	{
		// Pastikan $nis tidak kosong
		if (!$nis) {
			redirect('datasiswa'); // Arahkan kembali ke halaman admin jika nis kosong
		}

		// Hapus data siswa dari database
		$this->SiswaModel->hapus_siswa($nis);

		$this->session->set_flashdata('message', 'Data siswa berhasil dihapus!');
		$this->session->set_flashdata('toast', 'success');
		redirect(site_url('admin/datasiswa'));
	}


	function data_kelas()
	{

		$data['kelas'] = $this->KelasModel->get_kelas();

		$this->load->view("head");
		$this->load->view("sidebar");

		$this->load->view("datakelas", $data);

		$this->load->view('modal_input_kelas', $data);


		$this->load->view("footer");
	}


	public function hapus_kelas($id_kelas)
	{
		// Pastikan $nis tidak kosong
		if (!$id_kelas) {
			redirect('admin'); // Arahkan kembali ke halaman admin jika nis kosong
		}

		// Hapus data siswa dari database
		$this->KelasModel->hapus_kelas($id_kelas);



		$this->session->set_flashdata('message', 'Data kelas berhasil dihapus!');
		$this->session->set_flashdata('toast', 'success');
		redirect(site_url('admin/data_kelas'));
	}


	public function save_kelas()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('id_kelas', 'ID Kelas', 'required|is_unique[kelas.id_kelas]');
		$this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');

		if ($this->form_validation->run() == FALSE) {
			// Jika validasi gagal, tampilkan halaman tambah kelas dengan error
			echo "<script>alert('ID Kelas Sudah Ada Silahkan Cari ID Kelas lain.');</script>";
			echo "<script>window.location.href = '" . site_url('admin/data_kelas') . "';</script>";
		} else {
			// Jika validasi berhasil, simpan data kelas ke database
			$data = array(
				'id_kelas' => $this->input->post('id_kelas'),
				'nama_kelas' => $this->input->post('nama_kelas'),
			);

			$this->load->model('KelasModel');
			$this->KelasModel->save_kelas($data);

			$this->session->set_flashdata('message', 'Data kelas berhasil disimpan!');
			$this->session->set_flashdata('toast', 'success');
			redirect(site_url('admin/data_kelas'));
		}
	}




	public function update_kelas()
	{
		// Validasi input

		$id_kelas = $this->input->post('id_kelas');
		// Jika validasi berhasil, simpan data siswa ke database
		$data = array(
			'id_kelas' => $this->input->post('id_kelas'),
			'nama_kelas' => $this->input->post('nama_kelas'),


		);


		// Simpan data siswa ke dalam database melalui model siswa
		$this->load->model('KelasModel');
		$this->KelasModel->update_kelas($id_kelas, $data);



		$this->session->set_flashdata('message', 'Data kelas berhasil diupdate!');
		$this->session->set_flashdata('toast', 'success');
		redirect(site_url('admin/data_kelas'));
	}


	function data_guru()
	{
		$data['guru'] = $this->GuruModel->get_guru();
		$data['kelas'] = $this->KelasModel->get_kelas();

		$this->load->model('GuruModel');

		$this->load->view("head");
		$this->load->view("sidebar");

		$this->load->view("dataguru", $data);

		$this->load->view('modal_input_guru', $data);


		$this->load->view("footer");
	}

	public function hapus_guru($nip)
	{
		// Pastikan $nip tidak kosong
		if (!$nip) {
			redirect('admin'); // Arahkan kembali ke halaman admin jika nip kosong
		}

		// Hapus data guru dari database
		$this->GuruModel->hapus_guru($nip);

		$this->session->set_flashdata('message', 'Data guru berhasil dihapus!');
		$this->session->set_flashdata('toast', 'success');
		redirect(site_url('admin/data_guru'));
	}

	public function save_guru()
	{

		// Jika validasi berhasil, simpan data kelas ke database
		$data = array(
			'nip' => $this->input->post('nip'),
			'nama_guru' => $this->input->post('nama_guru'),
			'id_kelas' => $this->input->post('id_kelas'),
			'tgl_lhr_guru' => $this->input->post('tgl_lhr_guru'),
			'jk_guru' => $this->input->post('jk_guru'),
			'agama_guru' => $this->input->post('agama_guru'),
			'alamat_guru' => $this->input->post('alamat_guru'),
		);

		$this->load->model('GuruModel');
		$this->GuruModel->save_Guru($data);


		$this->session->set_flashdata('message', 'Data guru berhasil ditambahkan!');
		$this->session->set_flashdata('toast', 'success');
		redirect(site_url('admin/data_guru'));
	}
	public function update_guru()
	{
		// Validasi input

		$nip = $this->input->post('nip');
		// Jika validasi berhasil, simpan data siswa ke database
		$data = array(
			'nip' => $this->input->post('nip'),
			'nama_guru' => $this->input->post('nama_guru'),
			'id_kelas' => $this->input->post('id_kelas'),
			'tgl_lhr_guru' => $this->input->post('tgl_lhr_guru'),
			'jk_guru' => $this->input->post('jk_guru'),
			'agama_guru' => $this->input->post('agama_guru'),
			'alamat_guru' => $this->input->post('alamat_guru'),
		);


		// Simpan data siswa ke dalam database melalui model siswa
		$this->load->model('GuruModel');
		$this->GuruModel->update_guru($nip, $data);

		$this->session->set_flashdata('message', 'Data guru berhasil diupdate!');
		$this->session->set_flashdata('toast', 'success');
		redirect(site_url('admin/data_guru'));
	}


	function data_pelajaran()
	{

		$data['mata_pelajaran'] = $this->PelajaranModel->get_pelajaran();

		$this->load->view("head");
		$this->load->view("sidebar");

		$this->load->view("datapelajaran", $data);

		$this->load->view('modal_input_pelajaran', $data);


		$this->load->view("footer");
	}

	public function hapus_pelajaran($id_matapelajaran)
	{
		// Pastikan $nis tidak kosong
		if (!$id_matapelajaran) {
			redirect('admin'); // Arahkan kembali ke halaman admin jika nis kosong
		}

		// Hapus data siswa dari database
		$this->PelajaranModel->hapus_pelajaran($id_matapelajaran);


		$this->session->set_flashdata('message', 'Mata pelajaran berhasil dihapus!');
		$this->session->set_flashdata('toast', 'success');
		redirect(site_url('admin/data_pelajaran'));
	}

	public function save_pelajaran()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('id_matapelajaran', 'id_matapelajaran');
		$this->form_validation->set_rules('nama_matapelajaran', 'nama_matapelajaran', 'required');

		if ($this->form_validation->run() == FALSE) {
			// Jika validasi gagal, tampilkan halaman tambah kelas dengan error
			echo "<script>alert('ID Pelajaran Sudah Ada Silahkan Cari ID Pelajaran Lainnya.');</script>";
			echo "<script>window.location.href = '" . site_url('admin/data_pelajaran') . "';</script>";
		} else {
			// Jika validasi berhasil, simpan data kelas ke database
			$data = array(
				'id_matapelajaran' => $this->input->post('id_matapelajaran'),
				'nama_matapelajaran' => $this->input->post('nama_matapelajaran'),
			);

			$this->load->model('PelajaranModel');
			$this->PelajaranModel->save_pelajaran($data);

			$this->session->set_flashdata('message', 'Mata pelajaran berhasil ditambahkan!');
			$this->session->set_flashdata('toast', 'success');
			redirect(site_url('admin/data_pelajaran'));
		}
	}

	public function update_pelajaran()
	{
		// Validasi input

		$id_matapelajaran = $this->input->post('id_matapelajaran');
		// Jika validasi berhasil, simpan data siswa ke database
		$data = array(
			'id_matapelajaran' => $this->input->post('id_matapelajaran'),
			'nama_matapelajaran' => $this->input->post('nama_matapelajaran')


		);


		// Simpan data siswa ke dalam database melalui model siswa
		$this->load->model('PelajaranModel');
		$this->PelajaranModel->update_pelajaran($id_matapelajaran, $data);
		$this->PelajaranModel->update_pelajaran($nama_matapelajaran, $data);


		$this->session->set_flashdata('message', 'Mata pelajaran berhasil diupdate!');
		$this->session->set_flashdata('toast', 'success');
		redirect(site_url('admin/data_pelajaran'));
	}

	function data_jadwal()
	{
		$data['jadwal'] = $this->JadwalModel->get_jadwal();
		$data['mata_pelajaran'] = $this->PelajaranModel->get_pelajaran();

		$this->load->view("head");
		$this->load->view("sidebar");

		$this->load->view("datajadwal", $data);
		// $this->load->view('modaledit', $data);
		$this->load->view('modal_input_jadwal', $data);


		$this->load->view("footer");
	}

	public function hapus_jadwal($id_jadwal)
	{
		// Pastikan $nis tidak kosong
		if (!$id_jadwal) {
			redirect('admin/data_jadwal'); // Arahkan kembali ke halaman admin jika nis kosong
		}

		// Hapus data siswa dari database
		$this->JadwalModel->hapus_jadwal($id_jadwal);


		$this->session->set_flashdata('message', 'Data jadwal berhasil dihapus!');
		$this->session->set_flashdata('toast', 'success');
		redirect(site_url('admin/data_jadwal'));
	}

	public function save_jadwal()
	{

		// Jika validasi berhasil, simpan data kelas ke database
		$data = array(
			'id_jadwal' => $this->input->post('id_jadwal'),
			'hari' => $this->input->post('hari'),
			'id_matapelajaran' => $this->input->post('id_matapelajaran'),
			'open' => $this->input->post('open'),
		);

		$this->load->model('JadwalModel');
		$this->JadwalModel->save_jadwal($data);

		$this->session->set_flashdata('message', 'Data jadwal berhasil disimpan!');
		$this->session->set_flashdata('toast', 'success');
		redirect(site_url('admin/data_jadwal'));
	}

	public function update_jadwal()
	{
		// Validasi input

		$id_jadwal = $this->input->post('id_jadwal');
		// Jika validasi berhasil, simpan data siswa ke database
		$data = array(
			'id_jadwal' => $this->input->post('id_jadwal'),
			'hari' => $this->input->post('hari'),
			'id_matapelajaran' => $this->input->post('id_matapelajaran'),
			'open' => $this->input->post('open')


		);


		// Simpan data siswa ke dalam database melalui model siswa
		$this->load->model('JadwalModel');
		$this->JadwalModel->update_jadwal($id_jadwal, $data);
		$this->JadwalModel->update_jadwal($hari, $data);
		$this->JadwalModel->update_jadwal($id_matapelajaran, $data);
		$this->JadwalModel->update_jadwal($open, $data);


		$this->session->set_flashdata('message', 'Data jadwal berhasil diupdate!');
		$this->session->set_flashdata('toast', 'success');
		redirect(site_url('admin/data_jadwal'));
	}


	public function hapus_rekapitulasi($nis)
	{
		// Pastikan $nis tidak kosong
		if (!$nis) {
			redirect('admin'); // Arahkan kembali ke halaman admin jika nis kosong
		}

		// Hapus data siswa dari database
		$this->RekapitulasiModel->hapus_rekapitulasi($nis);

		$this->session->set_flashdata('message', 'Rekapitulasi berhasil dihapus!');
		$this->session->set_flashdata('toast', 'success');
		redirect(site_url('guru/data_rekapitulasi'));
	}

	public function save_rekapitulasi()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nis', 'nis', 'required|is_unique[rekapitulasi.nis]');
		$this->form_validation->set_rules('nama_siswa', 'nama_siswa', 'required');
		$this->form_validation->set_rules('tgl_rekap', 'tgl_rekap', 'required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required');



		if ($this->form_validation->run() == FALSE) {
			// Jika validasi gagal, tampilkan halaman tambah kelas dengan error
			echo "<script>alert('Nis Siswa Sudah Ada Silahkan Cari Nis Siswa lain.');</script>";
			echo "<script>window.location.href = '" . site_url('admin/data_rekapitulasi') . "';</script>";
		} else {
			// Jika validasi berhasil, simpan data kelas ke database
			$data = array(
				'nis' => $this->input->post('nis'),
				'nama_siswa' => $this->input->post('nama_siswa'),
				'tgl_rekap' => $this->input->post('tgl_rekap'),
				'keterangan' => $this->input->post('keterangan'),
			);

			$this->load->model('RekapitulasiModel');
			$this->RekapitulasiModel->save_rekapitulasi($data);

			$this->session->set_flashdata('message', 'Rekapitulasi berhasil ditambahkan!');
			$this->session->set_flashdata('toast', 'success');
			redirect(site_url('admin/data_rekapitulasi'));
		}
	}

	public function update_rekapitulasi()
	{
		// Validasi input

		$nis = $this->input->post('nis');
		// Jika validasi berhasil, simpan data siswa ke database
		$data = array(
			'nis' => $this->input->post('nis'),
			'nama_siswa' => $this->input->post('nama_siswa'),
			'tgl_rekap' => $this->input->post('tgl_rekap'),
			'keterangan' => $this->input->post('keterangan'),
		);

		// Simpan data siswa ke dalam database melalui model siswa
		$this->load->model('RekapitulasiModel');
		$this->RekapitulasiModel->update_rekapitulasi($nis, $data);
		$this->RekapitulasiModel->update_rekapitulasi($nama_siswa, $data);
		$this->RekapitulasiModel->update_rekapitulasi($tgl_rekap, $data);
		$this->RekapitulasiModel->update_rekapitulasi($keterangan, $data);



		$this->session->set_flashdata('message', 'Rekapitulasi berhasil diupdate!');
		$this->session->set_flashdata('toast', 'success');
		redirect(site_url('admin/data_rekapitulasi'));
	}

	public function rekapitulasi__construct()
	{
		parent::__construct();
		// Load library dan helper yang diperlukan
		$this->load->library('pdf');
		$this->load->helper('url');
	}
}
