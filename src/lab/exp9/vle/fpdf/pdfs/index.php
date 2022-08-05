<?php
session_start();
require('WriteHTML.php');

$pdf=new PDF_HTML();

$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);

$pdf->AddPage();
$pdf->SetFont('Arial','B',10); 
$pdf->WriteHTML3("Nodal Center ID:");

$pdf->Output(); 

?>
