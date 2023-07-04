<?php
class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel'); // Load the UserModel
    }

    public function index()
    {
        $this->load->model('UserModel');
        $data['users'] = $this->UserModel->get_all_users();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('administrator/akun', $data);
        $this->load->view('admin/footer');
    }

    public function create()
    {
        // Mengambil data yang dikirimkan melalui formulir
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $passwords = MD5($this->input->post('passwords'));
        $level = $this->input->post('level');

        // Load model User dan panggil metode untuk menyimpan data
        $this->load->model('UserModel');
        $this->UserModel->simpan_data($nama, $username, $passwords, $level);

        // Redirect ke halaman yang diinginkan setelah operasi selesai
        redirect('administrator/Users');
    }


    public function update($id)
    {
        $where = array('id' => $id);
        $data['users'] = $this->UserModel->edit_data($where, 'user')->result();

        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('administrator/Users', $data);
        $this->load->view('admin/footer');
    }

    public function update_aksi($id)
    {
        // tangkap data yang akan diupdate dengan metode post
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = MD5($this->input->post('password'));

        // data dimasukkan ke dalam array
        $data = array(
            'nama' => $nama,
            'username' => $username,
            'passwords' => $password,
        );

        // panggil metode update_data dari UserModel dengan argumen yang benar
        $where = array('id' => $id);
        $this->UserModel->update_data($where, $data, 'user');

        // setelah berhasil diupdate, tampilkan pesan sukses dan redirect ke halaman yang diinginkan
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        User Berhasil Diupdate!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('administrator/Users');
    }

    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->UserModel->hapus_data($where, 'user');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            User Berhasil Dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('administrator/Users');
    }
}
