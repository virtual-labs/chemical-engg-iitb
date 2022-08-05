<?php
  session_start(); 
  //ini_set('display_errors', 1);
  $usr_val = $_POST["percent1"];
  $eid = $_SESSION['eid'];
  include "connection/connect.php";
  $con_obj = new connection();
  include 'classes/experiment.php';
  $usr_obj = new users($con_obj);

  $flag = '0';
  //echo "flag: ".$usr_val." , eid: ".$eid;
  $usr = $usr_obj->getedata($eid, $flag);
  if (mysqli_num_rows($usr) > 0)
  {
    $row=mysqli_num_rows($usr);
    $mes_val ="";

    while($row = mysqli_fetch_array($usr))
    {
      $vle_t=$row['t'];
      $vle_rix=$row['rix'];
      $vle_riy=$row['riy'];
      $Srno=$row['Srno'];
      $mes_val= $mes_val.$vle_t." ".$vle_rix." ".$vle_riy."%";
      // echo "<br>snos: ".$Srno;
      // echo "<br>mes: ".$mes_val;

      $P=1;
      $A1=14.3916;
      $B1=2795.82;
      $C1=-43.15;
      $A2=13.8594;
      $B2=2773.78;
      $C2=-53.08;
      $m=1;

      $T=$vle_t+273;
      $P_sat1=exp($A1-$B1/($T+$C1))/101.325;
      $P_sat2=exp($A2-$B2/($T+$C2))/101.325;
      $x=(1.4943-$vle_rix)/0.1359;
      $y=(1.4943-$vle_riy)/0.1359;

      if($x<=0.01||($x-0.99)>=0) //To remove divide by zero case...
        continue;

      $G1= $P*$y/($P_sat1*$x);
      $G2=$P*(1-$y)/($P_sat2*(1-$x));
      $ge=($x*log($G1)+(1-$x)*log($G2))/($x*(1-$x)); //Ge/RTx1x2
      $g1log=log($G1);
      $g2log=log($G2);

      $x = round($x,4);
      $y = round($y,4);
      $g1log = round($g1log,4);
      $g2log = round($g2log,4);
      $ge = round($ge,4);
      $gy= $g1log - $g2log;
      //echo "<br>x: ".$x."<br>y: ".$y."<br>g1log: ".$g1log."<br>g2log: ".$g2log."<br>ge: ".$ge."<br>gy: ".$gy."<br>srno: ".$Srno;
      $usrin = $usr_obj->updatevledata($x,$y,$g1log,$g2log,$ge,$gy,$Srno);
    }
  }

  $qrgy = '0';
  $usr1 = $usr_obj->getvlexdata($eid,$qrgy);
  if (mysqli_num_rows($usr1) > 0)
  {
    $row1=mysqli_num_rows($usr1);
    $mes_val ="";
    while($rows = mysqli_fetch_array($usr1))
    {
      $x=$rows['x'];
      $gy=$rows['gy'];
      $x1[] = $x;
      $gy1[] = $gy;
      //echo "<br> x1:".$x1[];
    }
  }

  $usr2 = $usr_obj->getvlexdatamore($eid,$qrgy);
  if (mysqli_num_rows($usr2) > 0)
  {
    $row2=mysqli_num_rows($usr2);
    $mes_val ="";
    while($rows2 = mysqli_fetch_array($row2))
    {
      $x=$rows2['x'];
      $gy=$rows2['gy'];
      $x2[] = $x;
      $gy2[] = $gy;
    }
  }

  $usr3 = $usr_obj->getvlexdatacount($eid,$qrgy);
  if (mysqli_num_rows($usr3) > 0)
  {
    $row3=mysqli_num_rows($usr3);
    $mes_val ="";
    while($row3 = mysqli_fetch_array($usr3))
    {
      $count_x1=$row3['cntx'];
    }
  }

  $usr4 = $usr_obj->getvlexdatamorecount($eid,$qrgy);
  if (mysqli_num_rows($usr4) > 0)
  {
    $row4=mysqli_num_rows($usr4);
    $mes_val ="";
    while($row4 = mysqli_fetch_array($usr4))
    {
      $count_x2=$row4['count(x)'];
    }
  }


  $array = array(1, 2, 3, 4, 5);
  
  // Append an item (note that the new key is 5, instead of 0).
  $array[] = 6;
  //echo "x1";
  //print_r($x1);
  //echo "x2";
  //print_r($x2);
  //echo "gy1";
  //print_r($gy1);
  //echo "gy2";
  //print_r($gy2);

  for($i=0;$i<=299; $i++)
  {
    $a[$i]= $i;
	}			
  $t = $a;
  //print_r($t);
	$p1 = $_POST["percent1"];
	//$p2 = $_POST["percent2"];
	//$message = $p1." ".$p2;


  $a1 = 0;
  for($i=0;$i<=$count_x1 - 2; $i++)
  {
    $a1 = $a1 + 0.5 * ($x1[$i+1]-$x1[$i])*($gy1[$i+1]+$gy1[$i]);
  }

  $a2 = 0;
  for($i=0;$i<=$count_x2 - 2; $i++)
  {
    $a2 = $a2 + 0.5 * ($x2[$i+1]-$x2[$i])*($gy2[$i+1]+$gy2[$i]);
  }
  //echo "a1: ".$a1. " a2: ".$a2;
  if($a2 == 0)
  {}
  else
  {
    $p = abs($a1/$a2);
    //echo $p;
  }
  
	$sys = $_SESSION['sys'];
	if($usr_val<0.8*$p && $usr_val>1.2*$p )
	{
    echo "<center><h1>Error in Calculations ; do it again.</h1>";
    echo "<a href=vle7.php><img border=0 src=images/next.jpg></a></center>";
	}
	elseif($usr_val>=0.8*$p && $usr_val<=1.2*$p)
	{

    echo "<center><h1>Calculations are correct and data consistency error is within bounds.</h1>";
    echo "<a href=vle9.php?mod=$sys><img border=0 src=images/next.jpg></a></center>";
	}
	else
	{
    echo "<center><h1>The error entered exceeds the suggested limits , do the runs again.</h1>";
	  echo "<a href=vle2.php?sys=$sys><img border=0 src=images/next.jpg></a></center>";
	}

?>
	

