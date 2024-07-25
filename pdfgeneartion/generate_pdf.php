<?php
require_once('../vendor\tecnickcom\tcpdf\tcpdf.php');

// Extend TCPDF with custom header and footer
class MYPDF extends TCPDF {
    public function Header() {
        // Header content goes here
    }

    public function Footer() {
        // Footer content goes here
    }
}

// Create a PDF instance
$pdf = new MYPDF();

// Add a page
$pdf->AddPage();

// Add content to the PDF (use the HTML generated in generate_question_paper.php)
ob_start();
include 'generate_question_paper.php';
$html = ob_get_clean();
$pdf->writeHTML($html);

// Output PDF to browser or save to a file
$pdf->Output('question_paper.pdf', 'D');
