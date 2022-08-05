<?php
  require('fpdf/fpdf.php');
  $eid = $_GET['eid'];

  include "connection/connect.php";
  $con_obj = new connection();
  include 'classes/experiment.php';
  $usr_obj = new users($con_obj);


  $usr = $usr_obj->getexpeid($eid);
  if (mysqli_num_rows($usr) > 0)
  {
    //echo "True";
    $row=mysqli_num_rows($usr);

    while($row = mysqli_fetch_assoc($usr))
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
    $pdf->Image('images/vlabs.jpg',10,8,70);
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

    $flag = '0';
    $usr = $usr_obj->getedata($eid, $flag);
    if (mysqli_num_rows($usr) > 0)
    {
      //echo "True1";
      $row=mysqli_num_rows($usr);
      $ino = 1;

      while($row = mysqli_fetch_array($usr))
      {
        $v1=$row['v1']; 
        $v2=$row['v2']; 
        $hl=$row['hl']; 
        $rix=$row['rix']; 
        $riy=$row['riy'];
        $t=$row['t'];

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
        $pdf->Cell(100,5,' Heating Load Level : ');
        $pdf->SetFont('Arial','I',10);
        $pdf->Cell(100,5,$hl);
        $pdf->Ln();
        $pdf->Ln();
	
        $pdf->SetFont('Times','B',10);
        $pdf->Cell(100,5,'RIx : ');
        $pdf->SetFont('Arial','I',10);
        $pdf->Cell(100,5,$rix);
        $pdf->Ln();
        $pdf->Ln();
          
        $pdf->SetFont('Times','B',10);
        $pdf->Cell(100,5,'RIy : ');
        $pdf->SetFont('Arial','I',10);
        $pdf->Cell(100,5,$riy);
        $pdf->Ln();
        $pdf->Ln();
	
        $pdf->SetFont('Times','B',10);
        $pdf->Cell(100,5,'temperature : ');
        $pdf->SetFont('Arial','I',10);
        $pdf->Cell(100,5,$t);
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
