<?php
require('fpdf.php');
include_once("config.inc.php");


$eid = "1881668";


 # Inherit database connection information from variables defined in config.inc.php
 global $db, $db_host, $db_user, $db_password;

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

$pdf->SetFont('Times','U',25);
$pdf->SetTextColor(51,153,255);
$pdf->Cell(40,10,'Report for '.$name);
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','U',16);
$pdf->SetTextColor(128);
$pdf->Cell(40,10,'System '.$sys);
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Times','B',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(100,5,'Date of experiment : ');
$pdf->SetFont('Arial','I',10);
$pdf->Cell(100,5,$date);
$pdf->Ln();
$pdf->Ln();
 
$pdf->Output();
?>
