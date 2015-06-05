<?php
require('fpdf.php');



$eid = $_GET["mode"];

# Database name
$db = "cell";

# Internet address or hostname of database host
$db_host = "localhost";

# Database username
$db_user = "root";

# Database password
$db_password = "";

 # Connect to the database and report any errors on connect.
 $cid = mysql_connect($db_host,$db_user,$db_password);

 if (!$cid) {

  die("ERROR: " . mysql_error() . "\n");

 } 
mysql_select_db ($db);
$stuff = mysql_query("SELECT * FROM `cal_exp` WHERE eid='".$eid."'") or die("MySQL Login Error: ".mysql_error()); 

 # Check for errors.
if (mysql_num_rows($stuff) > 0)
 { 
 $row=mysql_num_rows($stuff);


while($row = mysql_fetch_array($stuff))
  {
$name=$row['name'];
$i=$row['i']; 
$v=$row['v'];
$date=$row['date'];

}
}


$pdf=new FPDF();
$pdf->AddPage();


  //Logo
    $pdf->Image('vlabs.jpg',10,8,70);
    //Arial bold 15
    $pdf->SetFont('Arial','B',15);
    //Move to the right
    $pdf->Cell(80);
    //Title
    $pdf->Cell(40,10,'Calorimetry',1,0,'C');
    //Line break
    $pdf->Ln(20);


$pdf->SetFont('Times','B',18);
$pdf->SetTextColor(51,153,255);
$pdf->Cell(40,10,'Report for '.$name);
$pdf->Ln();

$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(128);
$pdf->Cell(40,10,'Current : '.$i.' A');
$pdf->Ln();

$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(128);
$pdf->Cell(40,10,'Voltage: '.$v.' V');
$pdf->Ln();

$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(128);
$pdf->Cell(40,10,'Density of Benzene: 0.8765 g/ml');
$pdf->Ln();

$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(128);
$pdf->Cell(40,10,'Density of Acetone: 0.7925 g/ml');
$pdf->Ln();


$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(128);
$pdf->Cell(100,5,'Date of experiment : '.$date);
$pdf->Ln();
$pdf->Ln();





 # Connect to the database and report any errors on connect.
 $cid = mysql_connect($db_host,$db_user,$db_password);

 if (!$cid) {

  die("ERROR: " . mysql_error() . "\n");

 } 
mysql_select_db ($db);
$stuff = mysql_query("SELECT * FROM `cal_data` WHERE eid='".$eid."'") or die("MySQL Login Error: ".mysql_error()); 

 # Check for errors.
if (mysql_num_rows($stuff) > 0)
 { 
 $row=mysql_num_rows($stuff);
$ino = 1;

while($row = mysql_fetch_array($stuff))
  {
$t1=$row['t1']; 
$t2=$row['t2']; 
$t3=$row['t3']; 
$v1=$row['v1']; 
$v2=$row['v2']; 
$time=$row['time']; 


$pdf->SetFont('Arial','U',16);
$pdf->SetTextColor(128);
$pdf->Cell(40,10,'Iteration '.$ino);
$pdf->Ln();
$pdf->Ln();
$ino = $ino + 1;

	$pdf->SetFont('Times','B',10);
$pdf->Cell(100,5,' Temperature before mixing : ');
$pdf->SetFont('Arial','I',10);
$pdf->Cell(100,5,$t1.' K');
$pdf->Ln();
$pdf->Ln();
	$pdf->SetFont('Times','B',10);
$pdf->Cell(100,5,'Temperature after mixing : ');
$pdf->SetFont('Arial','I',10);
$pdf->Cell(100,5,$t2.' K');
$pdf->Ln();
$pdf->Ln();

	$pdf->SetFont('Times','B',10);
$pdf->Cell(100,5,'Temperature after heating : ');
$pdf->SetFont('Arial','I',10);
$pdf->Cell(100,5,$t3.' K');
$pdf->Ln();
$pdf->Ln();


	$pdf->SetFont('Times','B',10);
$pdf->Cell(100,5,' Volume of Benzene : ');
$pdf->SetFont('Arial','I',10);
$pdf->Cell(100,5,$v1.' ml');
$pdf->Ln();
$pdf->Ln();
	
	$pdf->SetFont('Times','B',10);
$pdf->Cell(100,5,'Volume of Acetone : ');
$pdf->SetFont('Arial','I',10);
$pdf->Cell(100,5,$v2.' ml');
$pdf->Ln();
$pdf->Ln();
	
	$pdf->SetFont('Times','B',10);
$pdf->Cell(100,5,'Time of Heating : ');
$pdf->SetFont('Arial','I',10);
$pdf->Cell(100,5,$time.' sec');
$pdf->Ln();
$pdf->Ln();
	
$pdf->Ln();
$pdf->Ln();	
$pdf->Ln();
$pdf->Ln();	


}
}





$pdf->Output();





?>
