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

}
