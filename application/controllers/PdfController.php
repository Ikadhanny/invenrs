<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'third_party/dompdf/autoload.php';

use Dompdf\Dompdf;

class PdfController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function exportPdf()
    {
        // Load the Dompdf library
        require_once APPPATH . 'third_party/dompdf/autoload.php';

        // Load the AlatModel
        $this->load->model('AlatModel');

        // Generate PDF content
        $pdf = new Dompdf();

        $data['alat'] = $this->AlatModel->getDaftarAlat('subRuang');

        $this->load->view('exportPDF', $data);

        $paper_size = 'A4';
        $orientation = 'portain';
        $html = $this->output->get_output();
        $pdf->set_paper($paper_size, $orientation);

        $pdf->load_html($html);
        $pdf->render();

        // Output the generated PDF to Browser
        $pdf->stream("Daftar_Alat.pdf", array('Attachment' => 0));
    }
}
