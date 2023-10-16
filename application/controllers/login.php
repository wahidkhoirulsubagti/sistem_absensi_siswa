<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('M_login');
    }

    public function index()
    {
        $this->load->view("head");
        $this->load->view('v_login');
        // $this->load->view("footer");

    }

    function aksi_login()
    {
        $username = $this->input->post('user_name');
        $password = $this->input->post('password');
        $where = array(
            'user_name' => $username,
            'password' => $password
        );
        $query = $this->M_login->cek_login("user", $where);
        if ($query->num_rows() > 0) {
            $user = $query->row(); // Mengambil data pengguna dari hasil query

            $data_session = array(
                'nama' => $user->user_name,
                'status' => "login",
                'level' => $user->level
            );
            $nama = $user->user_name; // Nama pengguna yang berhasil login

            $this->session->set_userdata($data_session);

            $this->session->set_flashdata('message', "Login Berhasil sebagai $nama!");
            $this->session->set_flashdata('toast', 'success');

            // Misalkan level '1' akan dialihkan ke halaman admin
            // Dan level '2' akan dialihkan ke halaman user
            if ($user->level == '1') {
                redirect(base_url("admin"));
            } elseif ($user->level == '2') {
                redirect(base_url("guru"));
            } elseif ($user->level == '3') {
                redirect(base_url("siswa"));
            } else {
                echo "Level pengguna tidak valid";
            }
        } else {
            $this->session->set_flashdata('message', "Username atau password salah!");
            $this->session->set_flashdata('toast', 'error');
            redirect(base_url('login'));
        }
    }


    public function logout()
    {
        $this->session->sess_destroy();
        $message = 'Logout berhasil!';
        $this->session->set_flashdata('message', $message);
        $this->session->set_flashdata('toast', 'success');
        redirect(base_url('login?message=' . urlencode($message)));
    }
}
