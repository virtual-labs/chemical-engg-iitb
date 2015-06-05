<?php
require('fpdf.php');
include_once("config.inc.php");


$eid = $_GET["mode"];

 # Inherit database connection information from variables defined in config.inc.php
 global $db, $db_host, $db_user, $db_password;

 # Connect to the database and report any errors on connect.
 $cid = mysql_connect($db_host,$db_user,$db_password);

 if (!$cid) {

  die("ERROR: " . mysql_error() . "\n");

 } 
mysql_select_db ($db);
$stuff = mysql_query("SELECT * FROM `experiment` WHERE eid='".$eid."'") or die("MySQL Login Error: ".mysql_error()); 

 # Check for errors.
if (mysql_num_rows($stuff) > 0)
 { 
 $row=mysql_num_rows($stuff);


while($row = mysql_fetch_array($stuff))
  {
$name=$row['name'];
$plen=$row['plen']; 
$pdia=$row['pdia'];
$date=$row['date'];

}
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
$pdf->Cell(40,10,'Length '.$plen);
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','U',16);
$pdf->SetTextColor(128);
$pdf->Cell(40,10,'Diameter '.$pdia);
$pdf->Ln();
$pdf->Ln();


$pdf->SetFont('Times','B',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(100,5,'Date of experiment : ');
$pdf->SetFont('Arial','I',10);
$pdf->Cell(100,5,$date);
$pdf->Ln();
$pdf->Ln();
 # Inherit database connection information from variables defined in config.inc.php
 global $db, $db_host, $db_user, $db_password;

 # Connect to the database and report any errors on connect.
 $cid = mysql_connect($db_host,$db_user,$db_password);

 if (!$cid) {

  die("ERROR: " . mysql_error() . "\n");

 } 
mysql_select_db ($db);
$stuff = mysql_query("SELECT * FROM `data` WHERE eid='".$eid."'") or die("MySQL Login Error: ".mysql_error()); 

 # Check for errors.
if (mysql_num_rows($stuff) > 0)
 { 
 $row=mysql_num_rows($stuff);


while($row = mysql_fetch_array($stuff))
  {
$h1=$row['h1']; 
$h2=$row['h2']; 
$time=$row['time']; 
$vol=$row['vol']; 
$result=$row['result'];

	$pdf->SetFont('Times','B',10);
$pdf->Cell(100,5,' Height in manometer 1 is: ');
$pdf->SetFont('Arial','I',10);
$pdf->Cell(100,5,$h1);
$pdf->Ln();
$pdf->Ln();
	$pdf->SetFont('Times','B',10);
$pdf->Cell(100,5,'Height in manometer 2 is : ');
$pdf->SetFont('Arial','I',10);
$pdf->Cell(100,5,$h2);
$pdf->Ln();
$pdf->Ln();
	$pdf->SetFont('Times','B',10);
$pdf->Cell(100,5,' Time : ');
$pdf->SetFont('Arial','I',10);
$pdf->Cell(100,5,$time);
$pdf->Ln();
$pdf->Ln();
	
	$pdf->SetFont('Times','B',10);
$pdf->Cell(100,5,'Volume collected in tank : ');
$pdf->SetFont('Arial','I',10);
$pdf->Cell(100,5,$vol);
$pdf->Ln();
$pdf->Ln();
	
	$pdf->SetFont('Times','B',10);
$pdf->Cell(100,5,'Flow regime : ');
$pdf->SetFont('Arial','I',10);
$pdf->Cell(100,5,$result);
$pdf->Ln();
$pdf->Ln();
	
	
	


}
}













$pdf->Output();
?>
