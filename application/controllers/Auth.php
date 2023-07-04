<?php 

    class Auth extends CI_Controller{
        public function index()
        {
            // $this->load->view('admin/header'); // Menampilkan view header untuk halaman login
            $this->load->view('administrator/login'); // Menampilkan view login untuk halaman login
            // $this->load->view('admin/footer'); // Menampilkan view footer untuk halaman login
        }
        public function proses_login()
        {
            $this->form_validation->set_rules('username','username','required',[
                'required' => 'Username wajib diisi!'
            ]); // Menjalankan validasi form untuk field username, dengan aturan wajib diisi
            $this->form_validation->set_rules('passwords','passwords','required',[
                'required' => 'passwords wajib diisi!'
            ]); // Menjalankan validasi form untuk field passwords, dengan aturan wajib diisi

            if ($this->form_validation->run() == FALSE) { // Jika validasi form gagal
                // $this->load->view('admin/header'); // Menampilkan view header untuk halaman login
                $this->load->view('administrator/login'); // Menampilkan view login untuk halaman login
                // $this->load->view('admin/footer'); // Menampilkan view footer untuk halaman login
            }else { // Jika validasi form berhasil
                $username = $this->input->post('username'); // Mengambil nilai inputan dari field username
                $passwords = $this->input->post('passwords'); // Mengambil nilai inputan dari field passwords

                // nama variabel untuk input username dan passwords
                $user =  $username;
                $pass = MD5($passwords);
                
                $cek = $this->Login_model->cek_login($user, $pass); // Memeriksa login dengan memanggil method cek_login pada model Login_model

                if ($cek->num_rows() > 0){ // Jika login berhasil
                    foreach ($cek->result() as $ck) {
                        $sess_data['username'] = $ck->username; // Menyimpan data username ke dalam session
                        $sess_data['passwords'] = $ck->passwords; // Menyimpan data passwords ke dalam session
                        $sess_data['level'] = $ck->level; // Menyimpan data level ke dalam session
                
                        $this->session->set_userdata($sess_data); // Menyimpan data session ke dalam session userdata
                    }
                    // Memilih level admin atau user saat login
                    if ($sess_data['level'] == 'admin') {
                        redirect('administrator/home'); // Redirect ke halaman Dashboard administrator
                    } else if ($sess_data['level'] == 'user'){
                        redirect('user/home'); // Redirect ke halaman Dashboard user
                    } else {
                        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Username atau password Salah!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>'); // Menyimpan pesan error dalam session flashdata
                        redirect('Auth'); // Redirect ke halaman login administrator
                    }
                    
                }else {  // Jika kredensial login salah, menampilkan pesan error dan mengalihkan ke halaman login
                    $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Username atau passwords Salah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
                        redirect('Auth');
                }
            }
        }
        public function logout()
        {
           // Menghancurkan sesi dan mengalihkan ke halaman login
            $this->session->sess_destroy();
            redirect('Auth');
        }
    }