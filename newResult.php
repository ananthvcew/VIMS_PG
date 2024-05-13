<?php
require_once("fpdf186/fpdf.php");

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();
require_once("phpqrcode/phpqrcode-master/qrlib.php");
// $pdf->Cell(30,3,QRcode::png('hi'),1,0,'C')

// $pdf->Image(QRcode::png('hi'), 10, 10, 20, 20, "png");

$pdf->Output();

