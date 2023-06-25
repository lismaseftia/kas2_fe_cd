<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load library dan helper yang dibutuhkan
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index()
    {
        // Redirect ke halaman login
        redirect('auth/login');
    }

    public function login()
    {
        // Validasi input dari form login
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan kembali halaman login dengan error
            $this->load->view('auth/login');
        } else {
            // Proses autentikasi dan login
            // Ganti dengan logika autentikasi sesuai kebutuhan aplikasi Anda
            // Misalnya, mengambil data pengguna dari database berdasarkan email dan password
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            if ($email == 'admin@example.com' && $password == 'password') {
                // Jika autentikasi berhasil, redirect ke halaman utama
                redirect('home');
            } else {
                // Jika autentikasi gagal, tampilkan kembali halaman login dengan error
                $data['error'] = 'Email atau password salah';
                $this->load->view('auth/login', $data);
            }
        }
    }

    public function register()
    {
        // Validasi input dari form register
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan kembali halaman register dengan error
            $this->load->view('auth/register');
        } else {
            // Proses registrasi pengguna
            // Ganti dengan logika registrasi sesuai kebutuhan aplikasi Anda
            // Misalnya, menyimpan data pengguna baru ke database
            // Setelah itu, redirect ke halaman login atau halaman utama
            redirect('auth/login');
        }
    }

    public function logout()
    {
        // Proses logout
        // Ganti dengan logika logout sesuai kebutuhan aplikasi Anda
        redirect('auth/login');
    }
}
