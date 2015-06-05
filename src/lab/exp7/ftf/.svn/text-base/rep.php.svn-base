<?php
require('mysql_table.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
    //Title
    $this->SetFont('Arial','',18);
    $this->Cell(0,6,'World populations',0,1,'C');
    $this->Ln(10);
    //Ensure table header is output
    parent::Header();
}
}

//Connect to database
mysql_connect('localhost','root','vlab');
mysql_select_db('cell');

$pdf=new PDF();
$pdf->AddPage();
//First table: put all columns automatically
$pdf->Table('SELECT * FROM vle_data WHERE eid=1881668 AND flag=1');
$pdf->AddPage();
//Second table: specify 3 columns

  
$pdf->Output();
?>

View the r
