<?php 
 class Alat extends CI_Controller{
   function __construct(){
      parent::__construct();
      if (!isset($this->session->userdata['username'])){
         $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
         Anda Belum Login!
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>');
       redirect('Auth');
      }
   }
    public function detail($kodeRuang)
    {
     // Load the SubRuangModel
    $this->load->model('SubRuangModel');

    $ambilSubRuang = $this->SubRuangModel->getSubRuangData($kodeRuang);
    // Get the sub ruangan data
    $data['sub_ruang'] = $ambilSubRuang[0];

    $kode = $this->uri->segment(4);
    // Pass the $kode variable to the view
    $data['kode'] = $kode;

    // Load the model 'AlatModel'
    $this->load->model('AlatModel');

    // Get the data from the model
    $data['alat'] = $this->AlatModel->getDaftarAlat($ambilSubRuang[0]->{'kode_ruang'});
    
      // Memuat view 'administrator/sub_ruang'
    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');
    $this->load->view('administrator/jenis_alat', $data);
    $this->load->view('admin/footer');
    }

    public function simpanAlat() {
      $kode_ruang = $this->input->post('kode_ruang'); // Ganti dengan method yang sesuai untuk mengambil kode ruang dari database

      $data = array(
          'kode_ruang' => $kode_ruang,
          'nama' => $this->input->post('nama'),
          'merk' => $this->input->post('merk'),
          'tipe' => $this->input->post('tipe'),
          'sumber' => $this->input->post('sumber'),
          'seri' => $this->input->post('seri'),
          'tahun' => $this->input->post('tahun'),
          // 'keterangan_alat' => $this->input->post('keterangan_alat'),
          // 'sumber_dana' => $this->input->post('sumber_dana')
      );
      $this->load->model('AlatModel'); // Load model AlatModel

      $this->AlatModel->simpanDataAlat($data); // Panggil method simpanDataAlat pada model

      // Get the ID from $data['sub_ruangan'] if it exists
    // Ambil kode ruang dari database
   
    redirect('administrator/alat/detail/' . $kode_ruang); // Redirect ke halaman daftar alat

  }
  
 }
