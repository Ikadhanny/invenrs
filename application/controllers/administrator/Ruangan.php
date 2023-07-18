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

}
