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
width: 20%;
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

<SCRIPT language="JavaScript"
        type="text/javascript">
<!--

function check()
{


    var ans = document.nof.ans.value;

    var res = document.nof.res.value;



if(ans == res)
{
alert("Your answer is correct");
window.location = "2pf5.php";

}
else
{
alert("Invalid answer Try again");
}



}


//-->
</SCRIPT>


</head>
<body>


<div id="container">
<div id="top">
<a href=index.html><img border=0 src=vlabs.jpg></a><br>
</div>

<div id="rightnav">
<p>

</p>
</div>
<div id="content">
<?php
$conc_NaOH_bub_in = $_POST["conc_NaOH_bub_in"];
//echo "$conc_NaOH_bub_in";
$gas_flo = $_POST["gas_flo"];
//echo "$gas_flo";
$conc_NaOH_input = $_POST["conc_NaOH_input"];
//echo "$conc_NaOH_input";
$liq_flo = $_POST["liq_flo"];
//echo "$liq_flo";
$vNaOH = 10;
//echo "$vNaOH";
$t = 10; # time of run of experiment (min)
//echo "$t";
$vol_bub = 3;  # vol. of NaOH initially in Bubbling Pot (l)
//echo "$vol_bub";
$conc_HCl = 1 + (mt_rand(0,100)/100)/20;
//echo "$conc_HCl";

$y_c = 0.4 + (mt_rand(0,100)/100)*2/10;  #random efficiency b/w 0.4 & 0.6
//echo "$y_c";

$c_in = $gas_flo/22.4;   # amount of CO2 fed (mol/hr)
//echo "$c_in";

$c = $y_c*$c_in;            # amount of CO2 reacted (mol/hr)
//echo "$c";
$n = 2*$c;
//echo "$n";               # amount oh NaOH reacted (mol/hr)

$conc_NaOH_out = $conc_NaOH_input - $n/$liq_flo;  #conc. of NaOH in outlet stream
//echo "$conc_NaOH_out";

$vHCl_c = $conc_NaOH_out * $vNaOH / $conc_HCl;
//echo "$vHCl_c";
$vHCl_c = round($vHCl_c*10)/10;
//echo "$vHCl_c";
$vHCl_1_c = ($vNaOH * $conc_NaOH_input - $vHCl_c)/2 +$vHCl_c;  #%vol. of HCl used in first titration
//echo "$vHCl_1_c";
$vHCl_1_c = round($vHCl_1_c*10)/10;
//echo "$vHCl_1_c";

$vHCl_c = round($vHCl_c*10)/10;
//echo "$vHCl_c";

$vHCl_2_c = $vHCl_1_c - $vHCl_c;   #vol. of HCl used in second titration
//echo "$vHCl_2_c";

$_SESSION['vHCl_1_c'] = $vHCl_1_c;
$_SESSION['vHCl_2_c'] = $vHCl_2_c;
$_SESSION['y_c'] = $y_c;



$y_b = $y_c + (mt_rand(0,100)/100)*2/10;   # random efficiency
//echo "$y_b";

$mCO2_in_b = ($c_in - $c)*($t/60); # amount of CO2 fed in bubble pot in 10 min (mol)
//echo "$mCO2_in_b";

$mCO2_reac_b = $y_b * $mCO2_in_b;  #amount of CO2 reacted in bubble pot in 10 min (mol)
//echo "$mCO2_reac_b";

$mNaOH_reac_b = $mCO2_reac_b*2;   # amount of NaOH reacted in Bubble pot (mol)
//echo "$mNaOH_reac_b";

$mNaOH_b = $conc_NaOH_bub_in * $vol_bub; # amount of NaOH present initially (mol)
//echo "$mNaOH_b";

$mNaOH_rem_b = $mNaOH_b - $mNaOH_reac_b; # amount of NaOH unreacted (mol)
//echo "$mNaOH_rem_b";

$conc_NaOH_bub_f = $mNaOH_rem_b/$vol_bub;
//echo "$conc_NaOH_bub_f";

$vHCl_b = $conc_NaOH_bub_f * $vNaOH / $conc_HCl;
//echo "$vHCl_b";

$vHCl_1_b = ($vNaOH * $conc_NaOH_bub_in - $vHCl_b)/2 +$vHCl_b;   #vol. of HCl used in first titration
//echo "$vHCl_1_b";

$vHCl_1_b = round($vHCl_1_b*10)/10;
//echo "$vHCl_1_b";

$vHCl_b = round($vHCl_b*10)/10;
//echo "$vHCl_b";

$vHCl_2_b = $vHCl_1_b - $vHCl_b;     #vol. of HCl used in second titration
//echo "$vHCl_2_b";

$_SESSION['vHCl_1_b'] = $vHCl_1_b;
$_SESSION['vHCl_2_b'] = $vHCl_2_b;

$_SESSION['y_b'] = $y_b;

?>
<h1>Schematic of experimental Set-up</h1>

<p>
<img src="s.png">
Now liquid and gas phase enters in column. When steady-state is reached the spent gas from column is allowed to enter in bubble pot. At an interval of 10 min collect 10 ml of samples from column as well as from bubble pot for titration.

<form action="gla4.php" name=nof>



<br><br>
<input type="hidden" value="<?php echo $res; ?>" name="res" />
<input type="submit" VALUE="Proceed to titration ">

</form>

</p>
</div>

<div id="content2">

</div>
<div id="footer">
<p align="center">Virtual labs IIT Bombay</p>
</div>
</div>
</body>
</html>

