<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'third_party/dompdf/autoload.php';

use Dompdf\Dompdf;

class Alat extends CI_Controller
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
    $this->load->model('AlatModel');
    $this->AlatModel = new AlatModel(); // Inisialisasi properti AlatModel

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

}
