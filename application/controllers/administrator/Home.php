<?php
class Home extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    if (!isset($this->session->userdata['username'])) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
         Anda Belum Login!
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>');
      redirect('Auth');
    }
  }
  public function index()
  {
    $this->load->model('RuanganModel');
    $data['ruang'] = $this->RuanganModel->getRuangan();
    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');
    $this->load->view('administrator/home', $data);
    $this->load->view('admin/footer');
  }

  public function tambahRuangan()
{
    // Memastikan metode HTTP adalah POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Mengambil data dari form
        $namaRuangan = $this->input->post('nama_ruangan');

        // Validasi data
        if (empty($namaRuangan)) {
            // Jika nama ruangan kosong, tampilkan pesan error sebagai pop-up
            $data['message'] = 'Nama ruangan harus diisi.';
        } else {
            // Memuat model RuanganModel
            $this->load->model('RuanganModel');

            // Memeriksa apakah nama ruangan sudah ada dalam database
            if ($this->RuanganModel->isNamaRuanganExists($namaRuangan)) {
                // Jika nama ruangan sudah ada, tampilkan pesan error sebagai pop-up
                $data['message'] = 'Nama ruangan sudah ada dalam database.';
            } else {
                // Jika data valid, tambahkan ruangan ke database
                $this->RuanganModel->tambahRuangan($namaRuangan);

                // Setelah berhasil menambahkan ruangan, arahkan pengguna kembali ke halaman daftar ruangan
                redirect('administrator/home');
            }
        }
    }

    // Jika tidak ada metode POST atau terdapat kesalahan validasi, tampilkan form tambah ruangan
    $data['message'] = 'Nama ruangan sudah ada';
    $data['ruang'] = $this->RuanganModel->getRuangan();
    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');
    $this->load->view('administrator/home', $data);
    $this->load->view('admin/footer');
}



  public function update()
  {
    // Memperoleh data dari permintaan POST
    $kode = $this->input->post('kode');
    $nama = $this->input->post('nama');

    // Memuat model RuanganModel
    $this->load->model('RuanganModel');

    // Memanggil metode updateRuangan() dalam model dengan parameter yang diterima dari permintaan POST
    $result = $this->RuanganModel->updateRuangan($kode, $nama);

    // Menentukan pesan berdasarkan hasil operasi database
    if ($result) {
      $message = 'Ruangan berhasil diperbarui';
    } else {
      $message = 'Gagal memperbarui ruangan';
    }

    // Load view dengan pesan
    $this->load->model('RuanganModel');
    $data['ruang'] = $this->RuanganModel->getRuangan();
    $data['message'] = $message;
    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');
    $this->load->view('administrator/home', $data);
    $this->load->view('admin/footer');
  }

  public function deletee()
{
    // Memperoleh data dari permintaan POST
    $kode = $this->input->post('kode');

    // Memuat model RuanganModel
    $this->load->model('RuanganModel');

    // Memanggil metode deleteRuangan() dalam model dengan parameter yang diterima dari permintaan POST
    $result = $this->RuanganModel->deleteRuangan($kode);

    // Menentukan respons berdasarkan hasil operasi database
    if ($result) {
        $message = 'Ruangan berhasil dihapus';
    } else {
        $message = 'Gagal menghapus ruangan';
    }

    // Menyimpan pesan sebagai flashdata
    $this->session->set_flashdata('message', $message);

    // Redirect ke halaman administrator home
    redirect('administrator/home');
}

  


public function delete($kode)
{
    // Memuat model RuanganModel
    $this->load->model('RuanganModel');

    // Memanggil fungsi hapusRuangan() dalam model untuk menghapus ruangan berdasarkan kode ruangan
    $result = $this->RuanganModel->deleteRuangan($kode);

    // Menentukan pesan berdasarkan hasil operasi database
    if ($result) {
        $message = 'Ruangan berhasil dihapus.';
    } else {
        $message = 'Gagal menghapus ruangan.';
    }

    // Memuat kembali halaman daftar ruangan dengan pesan hasil operasi
    redirect('administrator/home?message=' . urlencode($message));
}

}
