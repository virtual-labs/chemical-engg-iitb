<?php
require('fpdf.php');



$eid = $_GET['eid'];

# Database name
$db = "cell";

# Internet address or hostname of database host
$db_host = "localhost";

# Database username
$db_user = "root";

# Database password
$db_password = "vlab";

 # Connect to the database and report any errors on connect.
 $cid = mysql_connect($db_host,$db_user,$db_password);

 if (!$cid) {

  die("ERROR: " . mysql_error() . "\n");

 } 
mysql_select_db ($db);
$stuff = mysql_query("SELECT * FROM `vle_exp` WHERE eid='".$eid."'") or die("MySQL Login Error: ".mysql_error()); 

 # Check for errors.
if (mysql_num_rows($stuff) > 0)
 { 
 $row=mysql_num_rows($stuff);


while($row = mysql_fetch_array($stuff))
  {
$name=$row['name'];
$sys=$row['sys']; 
$date=$row['date'];
}
}

if($sys=="1")
{
$sys="Acetone-Benzene";
}
elseif($sys=="2")
{
$sys="Ethanol-N-Heptane";
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
    $pdf->Cell(70,10,'Vapour Liquid Equilibrium',1,0,'C');
    //Line break
    $pdf->Ln(20);


$pdf->SetFont('Times','B',18);
$pdf->SetTextColor(51,153,255);
$pdf->Cell(40,10,'Report for '.$name);
$pdf->Ln();



$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(128);
$pdf->Cell(40,10,'System : '.$sys);
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
$stuff = mysql_query("SELECT * FROM `vle_calib` WHERE eid='".$eid."'") or die("MySQL Login Error: ".mysql_error()); 

 # Check for errors.
if (mysql_num_rows($stuff) > 0)
 { 
 $row=mysql_num_rows($stuff);
$ino = 1;

while($row = mysql_fetch_array($stuff))
  {
$v1=$row['v1']; 
$v2=$row['v2']; 
$ri=$row['ri']; 



$pdf->SetFont('Arial','U',16);
$pdf->SetTextColor(128);
$pdf->Cell(40,10,'Iteration '.$ino);
$pdf->Ln();
$pdf->Ln();
$ino = $ino + 1;

	$pdf->SetFont('Times','B',10);
$pdf->Cell(100,5,' Volume 1 is: ');
$pdf->SetFont('Arial','I',10);
$pdf->Cell(100,5,$v1);
$pdf->Ln();
$pdf->Ln();
	$pdf->SetFont('Times','B',10);
$pdf->Cell(100,5,'Volume 2 is : ');
$pdf->SetFont('Arial','I',10);
$pdf->Cell(100,5,$v2);
$pdf->Ln();
$pdf->Ln();
	
	
	$pdf->SetFont('Times','B',10);
$pdf->Cell(100,5,'RI : ');
$pdf->SetFont('Arial','I',10);
$pdf->Cell(100,5,$ri);
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
