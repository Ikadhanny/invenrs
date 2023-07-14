<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PdfController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load required libraries and helpers
        $this->load->helper('download');
    }

    public function downloadPDF()
    {
        // Path to the PDF file
        $pdfFilePath = 'path/to/your/pdf/file.pdf';

        // Check if the file exists
        if (file_exists($pdfFilePath)) {
            // Set the headers for force download
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($pdfFilePath) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($pdfFilePath));
            readfile($pdfFilePath);
            exit;
        } else {
            // If the file does not exist, show an error message or redirect as desired
            echo 'File Tidak Tersedia';
        }
    }
   
}
