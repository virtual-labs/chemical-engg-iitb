<?php
require('fpdf.php');


$eid = $_GET["mode"];

# Database name
$db = "chem01";

# Internet address or hostname of database host
$db_host = "db.virtual-labs.ac.in";

# Database username
$db_user = "chem01";

# Database password
$db_password = "KrecEbWen";


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


  //Logo
    $pdf->Image('img/vlabs.jpg',10,8,70);
    //Arial bold 15
    $pdf->SetFont('Arial','B',15);
    //Move to the right
    $pdf->Cell(80);
    //Title
    $pdf->Cell(40,10,'Nature of flow',1,0,'C');
    //Line break
    $pdf->Ln(20);


$pdf->SetFont('Times','B',18);
$pdf->SetTextColor(51,153,255);
$pdf->Cell(40,10,'Report for '.$name);
$pdf->Ln();

$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(128);
$pdf->Cell(40,10,'Fluid chosen : Water');
$pdf->Ln();

$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(128);
$pdf->Cell(40,10,'Viscosity of Water: 1 cp');
$pdf->Ln();

$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(128);
$pdf->Cell(40,10,'Density of Water: 1000 kg/cu.m');
$pdf->Ln();

$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(128);
$pdf->Cell(40,10,'Length : '.$plen.' in');
$pdf->Ln();

$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(128);
$pdf->Cell(40,10,'Diameter : '.$pdia.' in');
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
$stuff = mysql_query("SELECT * FROM `data` WHERE eid='".$eid."'") or die("MySQL Login Error: ".mysql_error()); 

 # Check for errors.
if (mysql_num_rows($stuff) > 0)
 { 
 $row=mysql_num_rows($stuff);
$ino = 1;

while($row = mysql_fetch_array($stuff))
  {
$h1=$row['h1']; 
$h2=$row['h2']; 
$time=$row['time']; 
$vol=$row['vol']; 
$result=$row['result'];
$re=$row['re'];
$fric=$row['fric'];


$pdf->SetFont('Arial','U',16);
$pdf->SetTextColor(128);
$pdf->Cell(40,10,'Iteration '.$ino);
$pdf->Ln();
$pdf->Ln();
$ino = $ino + 1;

	$pdf->SetFont('Times','B',10);
$pdf->Cell(100,5,' Height in manometer 1 is: ');
$pdf->SetFont('Arial','I',10);
$pdf->Cell(100,5,$h1.' cm');
$pdf->Ln();
$pdf->Ln();
	$pdf->SetFont('Times','B',10);
$pdf->Cell(100,5,'Height in manometer 2 is : ');
$pdf->SetFont('Arial','I',10);
$pdf->Cell(100,5,$h2.' cm');
$pdf->Ln();
$pdf->Ln();
	$pdf->SetFont('Times','B',10);
$pdf->Cell(100,5,' Time : ');
$pdf->SetFont('Arial','I',10);
$pdf->Cell(100,5,$time.' s');
$pdf->Ln();
$pdf->Ln();
	
	$pdf->SetFont('Times','B',10);
$pdf->Cell(100,5,'Volume collected in tank : ');
$pdf->SetFont('Arial','I',10);
$pdf->Cell(100,5,$vol.' ml');
$pdf->Ln();
$pdf->Ln();
	
	$pdf->SetFont('Times','B',10);
$pdf->Cell(100,5,'Flow regime : ');
$pdf->SetFont('Arial','I',10);
$pdf->Cell(100,5,$result);
$pdf->Ln();
$pdf->Ln();
	

	$pdf->SetFont('Times','B',10);
$pdf->Cell(100,5,'Reynolds no : ');
$pdf->SetFont('Arial','I',10);
$pdf->Cell(100,5,$re);
$pdf->Ln();
$pdf->Ln();

	$pdf->SetFont('Times','B',10);
$pdf->Cell(100,5,'Friction factor : ');
$pdf->SetFont('Arial','I',10);
$pdf->Cell(100,5,$fric);
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
