<?php 

    class Auth extends CI_Controller{
        public function index()
        {
            // $this->load->view('admin/header'); // Menampilkan view header untuk halaman login
            $this->load->view('users/login'); // Menampilkan view login untuk halaman login
            // $this->load->view('admin/footer'); // Menampilkan view footer untuk halaman login
        }
        
        public function logout()
        {
           // Menghancurkan sesi dan mengalihkan ke halaman login
            $this->session->sess_destroy();
            redirect('Auth');
        }
    }