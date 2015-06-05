<?php
session_start(); 

	$ua12 = $_POST["a12"];
	$ua21 = $_POST["a21"];
	$ur2 = $_POST["r2"];
	$mod = $_POST["mod"];
	




if($mod=="2")
{
include_once("config.inc.php");

# Inherit database connection information from variables defined in config.inc.php
 global $db, $db_host, $db_user, $db_password;
$eid = $_SESSION['eid'];
 # Connect to the database and report any errors on connect.
 $cid = mysql_connect($db_host,$db_user,$db_password);

mysql_select_db ("$db");
$stuff = mysql_query("SELECT x , ge FROM vle_data WHERE eid='".$eid."' ORDER BY x ASC") or die("MySQL Login Error: ".mysql_error()); 

if (mysql_num_rows($stuff) > 0) { 

$row=mysql_num_rows($stuff);
$mes_val ="";
while($row = mysql_fetch_array($stuff))
  {

  $xd=$row['x'];
    $ged=$row['ge'];
   
$x[] = $xd;
   
$ge[] = $ged;

//echo $xd." ####".$ged;


}


}



mysql_select_db ("$db");
$stuff = mysql_query("SELECT count(x) FROM vle_data WHERE eid='".$eid."' ORDER BY x ASC") or die("MySQL Login Error: ".mysql_error()); 

if (mysql_num_rows($stuff) > 0) { 

$row=mysql_num_rows($stuff);
$mes_val ="";
while($row = mysql_fetch_array($stuff))
  {

  $cx=$row['count(x)'];
   
   



}


}
//echo "count ".$cx;


$sumx = 0;
$sumy = 0;
$sumxy = 0;
$sumxx = 0;
$sumyy = 0;
for($i=0;$i<=$cx - 1; $i++)
{    
    $sumx = $sumx + $x[$i];
    $sumy = $sumy + 1/$ge[$i];
    $sumxy = $sumxy + $x[$i]*(1/$ge[$i]);
    $sumxx = $sumxx + pow($x[$i],2);
   $sumyy = $sumyy + pow((1/$ge[$i]),2);
}
$Sxy = $sumxy - $sumx*$sumy/$cx;
$Sxx = $sumxx - (pow($sumx,2)/$cx);
$Syy = $sumyy - (pow($sumy,2)/$cx);
$SSr = $Syy - pow($Sxy,2)/$Sxx;
$r2 = 1- $SSr/$Syy;

$m = $Sxy/$Sxx;



$c = ($sumy - $m*$sumx)/$cx;
 $a12 = $c;
$a21 = $m + $c;

if(abs($c-$ua12/$c)>0.05)
{

$result="1";
}
else
{
$result="2";
}






}

elseif($mod == "1")

{





include_once("config.inc.php");

# Inherit database connection information from variables defined in config.inc.php
 global $db, $db_host, $db_user, $db_password;
$eid = $_SESSION['eid'];
 # Connect to the database and report any errors on connect.
 $cid = mysql_connect($db_host,$db_user,$db_password);

mysql_select_db ("$db");
$stuff = mysql_query("SELECT x , ge FROM vle_data WHERE eid='".$eid."' ORDER BY x ASC") or die("MySQL Login Error: ".mysql_error()); 

if (mysql_num_rows($stuff) > 0) { 

$row=mysql_num_rows($stuff);
$mes_val ="";
while($row = mysql_fetch_array($stuff))
  {

  $xd=$row['x'];
    $ged=$row['ge'];
   
$x[] = $xd;
   
$ge[] = $ged;

//echo $xd." ####".$ged;


}


}



mysql_select_db ("$db");
$stuff = mysql_query("SELECT count(x) FROM vle_data WHERE eid='".$eid."' ORDER BY x ASC") or die("MySQL Login Error: ".mysql_error()); 

if (mysql_num_rows($stuff) > 0) { 

$row=mysql_num_rows($stuff);
$mes_val ="";
while($row = mysql_fetch_array($stuff))
  {

  $cx=$row['count(x)'];
   
   



}


}
//echo "count ".$cx;


$sumx = 0;
$sumy = 0;
$sumxy = 0;
$sumxx = 0;
$sumyy = 0;
for($i=0;$i<=$cx - 1; $i++)
{    
    $sumx = $sumx + $x[$i];
    $sumy = $sumy + $ge[$i];
    $sumxy = $sumxy + $x[$i]*$ge[$i];
    $sumxx = $sumxx + pow($x[$i],2);
   $sumyy = $sumyy + pow($ge[$i],2);
}
$Sxy = $sumxy - $sumx*$sumy/$cx;
$Sxx = $sumxx - (pow($sumx,2)/$cx);
$Syy = $sumyy - (pow($sumy,2)/$cx);
$SSr = $Syy - pow($Sxy,2)/$Sxx;
$r2 = 1- $SSr/$Syy;

$m = $Sxy/$Sxx;



$c = ($sumy - $m*$sumx)/$cx;
 $a12 = $c;
$a21 = $m + $c;

if(abs($c-$ua12/$c)>0.05)
{

$result="1";
}
else
{
$result="2";
}



}


	


	if($result==1)
	{
	echo "<center><h1>Error in Calculations ; do it again.</h1>";
	if($mod=="1")
	{
	echo "<br><a href=vle10.php?mod=1><img border=0 src=rerun.jpg></a></center>"; 
	}
	elseif($mod=="2")
	{
	echo "<br><a href=vle10.php?mod=2><img border=0 src=rerun.jpg></a></center>";
	}
	}
	elseif($result==2)
	{
	echo "<center><h1>Calculations are correct Do you think the other model will give better R2??</h1>";
	echo "<br><a href=vle9.php?mod=mod><img border=0 src=cmod.jpg></a><br><br><br><a href=index.php?mode=restart><img border=0 src=r.jpg><a href=http://iitb.vlab.co.in><img border=0 src=end.jpg></a></center>";
	}
	
?>
	

