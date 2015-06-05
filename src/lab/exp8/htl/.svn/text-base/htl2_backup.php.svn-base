<?php
session_start(); 
?>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
	
	<style type="text/css" media="screen">

body
{
 font-family: "Helvetica Neue", "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;
        font-size: 14px;
        margin-top: .5em; color: #666;

}
#container
{
width: 90%;
margin: 10px auto;
background-color: #fff;
color: #333;
border: 10px solid gray;
line-height: 130%;
}

#top
{
padding: .5em;
background-color: #FFFFFF;
border-bottom: 0px solid gray;
}

#top h1
{
padding: 0;
margin: 0;
}

#leftnav
{
float: left;
width: 160px;
margin: 0;
padding: 1em;
}

#rightnav
{
float: right;
width: 40%;
margin: 0;
padding: 1em;
}

#content
{
width: 800;
margin-left: 0px;
border-left: 0px solid gray;
margin-right: 0px;
border-right: 0px solid gray;
padding: 1em;
#max-width: 36em;
}


#content2
{
width: 800;
margin-left: 0px;
border-left: 0px solid gray;
margin-right: 0px;
border-right: 0px solid gray;
border-top: 0px solid gray;
padding: 1em;
#max-width: 36em;
}

#footer
{
clear: both;
margin: 0;
padding: .5em;
color: #333;
background-color: #ddd;
border-top: 0px solid gray;
}

#leftnav p, #rightnav p { margin: 0 0 1em 0; }
#content h2 { margin: 0 0 .5em 0; }




</style> 
	<script src="js/prototype.js" type="text/javascript"></script>
		<script src="js/slider2.js" type="text/javascript"></script>

</head>
<body>

<div id="container">
<div id="top">
<a href=index.html><img border=0 src=vlabs.jpg></a><br>
</div>

<div id="rightnav">
<?
include_once("config.inc.php");	

	$flag = $_POST["flag"];
	$hft = $_POST["hft"];
	$cft = $_POST["cft"];
	$percent = $_POST["percent"];
	
	

if($flag=="0")
{





}
elseif($flag=="1")
{

}

function lam($hf_T1,$cf_t1,$vp)
{

// SaiRam 

// Contents: Dimensions, Properties of fluids, Properties of Pipe, Inputs (V's and inlet T's), Derived numbers, Heat transfer coefficients
// Functions to find outlet temperatures 

// Dimensions
$L=0.85;                      // length 
$hf_Di=0.01;                  // inner dia of tube - hot fluid through tube
$hf_Do=0.0127;                // outer dia of tube
$cf_D= 0.0220;                // dia of shell - cold fluid through shell 
$Ai=3.14*hf_Di*L;             // surface area for heat transfer, tube-side
$Ao=3.14*hf_Do*L;             // surface area for heat transfer, shell-side
$Alm=($Ao-$Ai)/log($Ao/$Ai);      // log-mean surface area 

// Properties of fluids: specific heat (Cp), density (rho), thermal conductivity (k), viscosity (mew)
$cf_Cp=4184; 
$hf_Cp=2200;

$cf_rho=1000;
$hf_rho=1113.2;

$hf_k=0.26;
$cf_k=0.58;

$hf_mew=0.0161;
$cf_mew=0.001002;

// Property of Pipe: thermal conductivity (k)
$pipe_k=16.2;

//cf_t1 = input ("Steady state value of cold fluid inlet temperature"); // =25 **** from php
// hf_T1 = 52; //input ('Steady state value of hot fluid inlet temperature'); // =52  **** from php

$cf_V  = 0.000093; // input ('Enter a cold fluid flow-rate'); range needs to be fixed (this is speed in m/s)
$hf_V = 0.270/360000*vp; // based on max possible value for 'u'
// hf_V  = 0.0000250519; //input('Enter a hot fluid flow-rate'); // range needs to be fixed //0.0000250519

// linear velocities 
$hf_u=4/3.14*$hf_V/pow($hf_Di,2);
$cf_u=4/3.14*$cf_V/((pow$cf_D,2)-pow($hf_Do,2));

// Derived for fluids : Prandtl, Reynolds, Nusselt numbers and heat transfer coefficients
// Prandtl numbers  
$hf_Pr=$hf_Cp*$hf_mew/$hf_k; 
$cf_Pr=$cf_Cp*$cf_mew/$cf_k;

// Reynolds numbers 
$hf_Re=$hf_Di*$hf_u*$hf_rho/$hf_mew;
$cf_Re=($cf_D-$hf_Do)*$cf_u*$cf_rho/$cf_mew;

// Nusselt number from Seider-Tate Equation
$hf_Nu=1.86*pow($hf_Re,(1/3))*pow($hf_Pr,(1/3)); // has to be returned
$cf_Nu=17; // %Seider-Tate Equation === must use the correlation found on cheresources (NOT REQUIRED)

// heat transfer coefficients (h's and U) 
$hf_h=$hf_Nu*$hf_k/$hf_Di;// 638.3809; %    
$cf_h=5000; // %cf_Nu*cf_k/(cf_D-hf_Do); //will remain fixed throughout experiment

$Ui = 1/(1/$hf_h+($hf_Do-$hf_Di)*$Ai/$pipe_k/$Alm+$Ai/$Ao/$cf_h); //overall, tube-side



function jac($C0)
{
    $eps=$C0/1000;
    if ($eps==0)
        $eps=1/1000;
    $Cp=$C0;
    $Cp=$Cp+$eps;
    $Fp=flooding($Cp);
    $Cn=$C0;
    $Cn=$Cn-$eps;
    $Fn=flooding($Cn);
    $J=($Fp-$Fn)/(2*$eps);
return $J;
}




function newt_raph($C0)
{
$conv_criterion=1;
$tolerance=pow(10,-8);
$i=1;

while(($i<1000)&&($conv_criterion>$tolerance))
  {
 # echo "The number is " . $i . "<br />";
   $Fx= flooding($C0);
   $JFx= jac($C0);
    $Cnew=$C0-$Fx/$JFx;
    $conv_criterion=abs($Cnew-$C0)/$C0;
    $C0=$Cnew;
  $i++;
  }
return $C0;
}





x=[hf_T1 cf_t1];
function y = energy_balance(x)
delta_T1=hf_T1-cf_t1; 
delta_T2=x(1)-x(2); 
lmtd=(delta_T1-delta_T2)/log(delta_T1/delta_T2); 
 y(1)= (hf_rho*hf_V*hf_Cp)*(hf_T1-x(1)) - Ui*Ai*lmtd; //%T2;
 y(2)=(cf_rho*cf_V*cf_Cp)*(-cf_t1+x(2)) - Ui*Ai*lmtd; //%t2;
//y(1)= delta_T1/delta_T2 - exp(Ui*Ai*(delta_T1-delta_T2)/((hf_rho*hf_V*hf_cp)*(hf_T1-x(1))));
//y(2)= delta_T1/delta_T2 - exp(Ui*Ai*(delta_T1-delta_T2)/((cf_rho*cf_V*cf_cp)*(-cf_t1+x(2))));
endfunction

Tout =fsolve([hf_T1-1,cf_t1+1],energy_balance); 
heat_load=(hf_rho*hf_V*hf_Cp)*(hf_T1-Tout(1));
delta_1=hf_T1-cf_t1;
delta_2=Tout(1)-Tout(2);
lmt=(delta_1-delta_2)/log(delta_1/delta_2);

To=[Tout(1) Tout(2) heat_load lmt hf_V*1000*3600 Ui hf_h hf_Nu hf_Re]
endfunction



}

$eid = $_SESSION['eid'];


 # Inherit database connection information from variables defined in config.inc.php
 global $db, $db_host, $db_user, $db_password;

 # Connect to the database and report any errors on connect.
 $cid = mysql_connect($db_host,$db_user,$db_password);

 if (!$cid) {
  die("ERROR: " . mysql_error() . "\n");
 } 

 date_default_timezone_set('Asia/Calcutta');
$date = date('l jS \of F Y h:i:s A');


 # Setup SQL statement and add the account into the system.
mysql_select_db ("$db");
 $result = mysql_query("INSERT INTO htl_data (
`eid` ,
`v1` ,
`v2` ,
`v3` ,
`v4` ,
`v5` ,
`v6` ,
`v7` ,
`v8` ,
`v9` ,
`date` 
)
VALUES ('$eid','$res[0]','$res[1]','$res[2]','$res[3]','$res[4]','$res[5]','$res[6]','$res[7]','$res[8]','$date')") or die("MySQL Login Error: ".mysql_error()); 


 # Check for errors.
 if (!$result) {

  die("ERROR: " . mysql_error() . "\n");

 } 
else
 {


}








?>

<p style="color:#003366;font:24px/30px cursive;"> Hot fluid outlet temp :<input type="text" style="width:102px;height:40px;background-color:#3399FF;color:#003366;font:24px/30px cursive;border:solid 1px #0000FF;" name="hft" value="<? echo round($res[0],1); ?>" /></h3></p>
<p style="color:#003366;font:24px/30px cursive;"> Cold fluid outlet temp : <input type="text" style="width:102px;height:40px;background-color:#3399FF;color:#003366;font:24px/30px cursive;border:solid 1px #0000FF;" name="cft" value="<? echo round($res[1],1); ?>" /></h3></p>
<p style="color:#003366;font:24px/30px cursive;"> Hot fluid volumetric flow rate : <input type="text" style="width:102px;height:40px;background-color:#3399FF;color:#003366;font:24px/30px cursive;border:solid 1px #0000FF;" name="hfflw" value="<? echo $res[4]; ?>" /></h3></p>
</p>

<center><a href=../list.php?mode=home><img border=0 src=home.jpg></a>&nbsp;&nbsp;&nbsp;<a href="htl1.php?sys=<? echo $flag;?>&mode=rerun"><img border=0 src=re.jpg></a><br><br><a href="report2.php?mode=<? echo $eid ?>"> <img border=0 src=download.jpg></a>&nbsp;&nbsp;&nbsp;<a href=><img border=0 src=end.jpg></a></center>
</div>
<div id="content">
<?
$sys = $flag;

if($sys=="0")
{
echo "<img src=s_lam.jpg>";
}
elseif($sys=="1")
{
echo "<img src=s_turb.jpg>";
}


?>

</div>


<div id="footer">
Cellulose lab IIT Bombay
</div>
</div>
</body>
</html>

