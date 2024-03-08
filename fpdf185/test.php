<?php
require('./fpdf.php');

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Multicell(80,4,"LAMPIRAN FOTO\n\nJAMINAN");
// $pdf->Cell(40,30,'Hello World!');
$pdf->Output('F','./order.pdf');
?>