<?php
session_start(); 

	$val = $_GET["val"];

$res = explode(" ",$val);
$s = $_SESSION['sys'];
$v1 = $res[0];
$v2 = $res[1];


if($s==1)  //acetone/benzene system
{
    $m1=58;
    $m2=78;
    $d1=0.79;
    $d2=0.8785;
    $x1=(($v1*$d1)/$m1)/(($v1*$d1)/$m1+($v2*$d2)/$m2);
    $y1=-0.1359 * $x1 + 1.4943 ;
    $y=$y1+(rand(0,1)-0.5)*0.02;// 1% error 

    echo $y1;
}
elseif($s==2)
	{

	}

?>
	

