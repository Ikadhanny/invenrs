<?php

class Login_model extends CI_Model{
  public function __construct()
    {
        parent::__construct();
    }public function cek_login($username, $passwords)
    {
        $this->db->where('username', $username);
        $this->db->where('passwords', $passwords);
        return $this->db->get('user'); // Ganti 'users' dengan nama tabel yang sesuai di database Anda
    }
    public function getLoginData($user, $pass)
    {
        $u = $user;
        $p = MD5($pass);

        $query_cekLogin = $this->db->get_where('user', array('username' => $u, 'passwords' => $p));

        if (count($query_cekLogin->result()) > 0) {
            foreach ($query_cekLogin->result() as $query_cekLogin){
                foreach ($query_cekLogin->result() as $ck){
                    $sess_data ['logged_in'] = TRUE;
                    $sess_data ['username'] = $ck->username;
                    $sess_data ['passwords'] = $ck->passwords;
                    $sess_data ['level'] = $ck->level;
                    $this->session->set_userdata($sess_data);
                }
                redirect('administrator/auth');
                }
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Username atau password Salah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('administrator/auth');
            }
            }
        }