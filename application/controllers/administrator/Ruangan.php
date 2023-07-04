<?php
class Ruangan extends CI_Controller
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
    $this->load->model('RuanganModel');
    
  }
  
  public function detail($kode)
  {

    $this->load->model('RuanganModel');
    $data['ruangan'] = $this->RuanganModel->getRuanganByKode($kode);

    $this->load->model('RuanganModel');
    $data['sub_ruang'] = $this->RuanganModel->getSubRuangData($kode);
    // Replace with your method to get data from the sub_ruang table
    // Memuat view dengan data ruangan
    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');
    $this->load->view('administrator/jenis_ruangan', $data);
    $this->load->view('admin/footer');
  }

  public function tambahRuangan() {
    $this->load->model('SubRuangModel'); // Load model SubRuangModel
    
    // Ambil data dari form
    $nama_ruangan = $this->input->post('nama_ruangan');
    $kode_utama = $this->input->post('kode_utama');
    
    // Cek apakah nama ruangan sudah ada di database
    if ($this->SubRuangModel->cekNamaRuangan($nama_ruangan)) {
      // Jika nama ruangan sudah ada, tampilkan pesan error atau lakukan aksi sesuai kebutuhan
      echo "Nama ruangan sudah ada di database.";
      return; // Hentikan proses penyimpanan data
  }
  
  // Mendapatkan objek ruangan berdasarkan kode utama
  $ruangan = $this->RuanganModel->getRuanganByKode($kode_utama);
  
  if (!$ruangan) {
      // Jika ruangan dengan kode utama tidak ditemukan, tampilkan pesan error atau lakukan aksi sesuai kebutuhan
      echo "Ruangan dengan kode utama tidak ditemukan.";
      return; // Hentikan proses penyimpanan data
  }
    
    // Buat array data untuk disimpan ke database
    $data = array(
        'nama' => $nama_ruangan,
        'kode_utama' => $kode_utama
    );
    
    // Panggil fungsi di model untuk menyimpan data ke database
    $this->SubRuangModel->tambahSubRuang($data);
    
    // Redirect ke halaman lain setelah data disimpan
    redirect('administrator/ruangan/detail/' . $data['kode_utama']);
// Ganti 'administrator/ruangan' dengan halaman tujuan setelah data disimpan
}
  
  
  
    public function updateData()
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

    public function update()
    {
        // Memperoleh data dari permintaan POST
        $kodeRuang = $this->input->post('kode_ruang');
        $nama = $this->input->post('nama');
        $kodeUtama = $this->input->post('kode_utama');

        // Memuat model SubRuangModel
    $this->load->model('SubRuangModel');

        // Memanggil metode updateSubRuang() dalam model dengan parameter yang diterima dari permintaan POST
        $result = $this->SubRuangModel->updateSubRuang($kodeRuang, $nama, $kodeUtama);

        // Menentukan pesan berdasarkan hasil operasi database
        if ($result) {
            $message = 'Data berhasil diperbarui';
        } else {
            $message = 'Gagal memperbarui data';
        }

        // Load view dengan pesan
    // Redirect ke halaman detail ruangan dengan menggunakan kode_utama sebagai parameter
    redirect('administrator/ruangan/detail/' . $kodeUtama);
    }
  
    public function delete($kode)
    {
        // Memuat model RuanganModel
        $this->load->model('SubRuangModel');
    
        // Memanggil fungsi hapusRuangan() dalam model untuk menghapus ruangan berdasarkan kode ruangan
        $result = $this->SubRuangModel->deleteRuangan($kode);
    
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
