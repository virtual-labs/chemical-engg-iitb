<?Php
require('fpdf.php');
$pdf = new FPDF(); 
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);

// Header starts /// 
$pdf->Image('IITB_VLAB_LOGO_60.png',55,10,87);
$pdf->Ln(30);

$pdf->SetFont('Arial','B',14);
$pdf->Cell(25,10,'Institute : ',0,0);
$pdf->SetFont('Arial','',14);
//$pdf->Cell(60,10,'Shri K. J. Somaiya International Institute of Science and Engineering & Management, Mumbai',1,0);
$pdf->Multicell(0,6,"Shri K. J. Somaiya International Institute of Science and Engineering & Management, Mumbai"); 

$pdf->Ln(2);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25,10,'Region : ',0,0);
$pdf->SetFont('Arial','',14);
$pdf->Cell(60,10,'Mumbai',0,0);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(105,10,'NCID : 250',0,0, 'R');

$pdf->Ln(10);
$pdf->Cell(170,10,'Monthly & Annual Report',0,0,'C',false);

$pdf->Ln(30);
$width_cell=array(10,30,20,30);
$pdf->SetFillColor(193,229,252); // Background color of header 

$pdf->Cell($width_cell[0],10,'ID',1,0,'C',true); // First header column 
$pdf->Cell($width_cell[1],10,'NAME',1,0,'C',true); // Second header column
$pdf->Cell($width_cell[2],10,'CLASS',1,0,'C',true); // Third header column 
$pdf->Cell($width_cell[3],10,'MARK',1,1,'C',true); // Fourth header column
//// header is over ///////

$pdf->SetFont('Arial','',10);
// First row of data 
$pdf->Cell($width_cell[0],10,'1',1,0,'C',false); // First column of row 1 
$pdf->Cell($width_cell[1],10,'John Deo',1,0,'C',false); // Second column of row 1 
$pdf->Cell($width_cell[2],10,'Four',1,0,'C',false); // Third column of row 1 
$pdf->Cell($width_cell[3],10,'75',1,1,'C',false); // Fourth column of row 1 
//  First row of data is over 
//  Second row of data 
$pdf->Cell($width_cell[0],10,'2',1,0,'C',false); // First column of row 2 
$pdf->Cell($width_cell[1],10,'Max Ruin',1,0,'C',false); // Second column of row 2
$pdf->Cell($width_cell[2],10,'Three',1,0,'C',false); // Third column of row 2
$pdf->Cell($width_cell[3],10,'85',1,1,'C',false); // Fourth column of row 2 
//   Sedond row is over 
//  Third row of data
$pdf->Cell($width_cell[0],10,'3',1,0,'C',false); // First column of row 3
$pdf->Cell($width_cell[1],10,'Arnold',1,0,'C',false); // Second column of row 3
$pdf->Cell($width_cell[2],10,'Three',1,0,'C',false); // Third column of row 3
$pdf->Cell($width_cell[3],10,'55',1,1,'C',false); // fourth column of row 3

$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World!');
$pdf->Cell(100,10,'Powered by FPDF.',0,1,'C');
$pdf->Ln(30);
$pdf->SetFont('Arial','',16);
$pdf->Cell(60,10,'Max Ruin',1,0,'C',false);
$pdf->SetMargins(25.4,25.4,25.4,25.4);
$pdf->Cell(60,10,'Max Ruin',1,0,'C',false);
$pdf->Output();

?>