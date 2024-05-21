<?php
session_start();
error_reporting(0);
?>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">

<SCRIPT language="JavaScript"
        type="text/javascript">
<!--
function check_re()
{
 element = document.getElementById('re_w').style;
    element.display = 'none';
element = document.getElementById('re_r').style;
    element.display = 'none';

pdropa =document.volu.pdropa.value;
pdrop = document.volu.pdrop.value;

if(Math.abs((pdropa-pdrop)) <= 3)
{
alert("pressure drop are correct");
window.location = "ori5.php";
}
else
{
alert("Incorrect answer Try again");
}
}
//-->
</SCRIPT>
	
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
width: 900;
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
</head>
<body>
<div id="container">
<div id="top">
<b><p style= "font-family: cursive: Apple Chancery; font-size: 2.5em; color: #00ff00;">Flow Measurement by Venturimeter and Orificemeter</p>  </b>
</div>

<div id="rightnav">
<p align="justify">
Next part of the experiment is to measure the pressure drop across the meter. The fluid in the manometer is chloroform (density=1487 kg/m<sup>3</sup>).</p>
<p align="justify">
Calculate the experimental pressure drop from the height difference in the two arms of the manometer. 
Round up the heights to one decimal point in cm after the box.
</p>
</div>
<div id="content">
<center>
<?php
$v = $_SESSION['v'];
$g = 9.8;
$rho = 1000;
$rhom = 1487;
$Sv=0.000176;
$So=0.000154;
$Bv=0.4848;
$Bo=0.4904;
$pi=3.1416;
$dummy=0.975*(1.0+0.01*(mt_rand(-50,50))/100);
//$dummy=0.975;
$del_P=($v*$v)*((1-pow($Bv,4))*$rho)/(($dummy*$dummy)*2);
$del_h=100*$del_P/($rhom-$rho)/$g;

$dummy1=$del_h*(1.0+0.1*(mt_rand(-50,50))/100);
//$dummy1=$del_h;
$_SESSION['dummy'] = $dummy;

$pdrop = $del_P;
$h2 =  7 + 5 * (rand(0,100000)/100000);
//$h2 =  7 + 5;
$h2 = round($h2,1)." cm";
//$h2 = round($h2,1);
$h1 = $h2 + $dummy1;
$h1 = round($h1,1)." cm";

echo "<INPUT style=\"position:relative;bottom:200px;width:120px;height:30px;background-color:#D0F18F;color:#53760D;font:24px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;\" TYPE=text VALUE=\"$h1 \" NAME=h1> ";
	echo "<img src=mano.jpg>";
	echo "<INPUT style=\"position:relative;bottom:120px;width:120px;height:30px;background-color:#D0F18F;color:#53760D;font:24px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;\" TYPE=text VALUE=\"$h2\" NAME=h2><br><br>";
?>
</center>

<FORM name="volu" action="ori5.php"  method="post">
 <h2>Record the manometer reading for pressure drop and calculate the same.</h2>
<h3>Enter the observed pressure drop:	<INPUT style="width:90px;height:30px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="" NAME="pdropa"> <input type="hidden" value="<?php echo $pdrop; ?>" name="pdrop" /><INPUT TYPE="button" VALUE="Check" NAME="re_check" onClick="check_re();"><img style="display:none;" id="re_r" src="rg.png"><img id="re_w" style="display:none;" src="wg.png"></h3>

<input type="image" src="next.jpg" alt="Submit button">
</FORM>
<INPUT TYPE="hidden" VALUE="" NAME="result">
</FORM>
<p>
</p>
</div>
<div id="footer">
<p align="center">Virtual labs IIT Bombay</p>
</div>
</div>
</body>
</html>
