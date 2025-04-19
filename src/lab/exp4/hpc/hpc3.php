
<?php
session_start(); 
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


if(Math.abs((pdropa-pdrop)/pdropa) <= 0.1)
{
alert("Gas mass velocity is correct");
window.location = "hpc4.php";

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
<a href=index.html><img border=0 src=vlabs.jpg></a><br>
</div>


<div id="content">
<center>
<?php


$lper = $_POST["lpercent"];
$gper = $_POST["gpercent"];
$dia = $_POST["dia"]; //inch
$length = $_POST["length"]; //inch
$ptype = $_POST["ptype"];

$_SESSION['ptype'] = $ptype;
//$ptype= explode(",", $ptype);
//echo("ptype: ".$ptype);
//echo($dia);
$diam = $dia*0.0254; //m
$lengthm = $length*0.0254; //m
$pi=3.1416;


//$mul = 0.01; //Poise
$max_vl = 130000/(3600*1000);  //m3/sec

//$mua = 0.0000186;
$g = 9.81; //m/s2

$rho = 13.534 *pow(10,3); //kg/m3
$rhoL = 1000; //kg/m3
$rhoG = 1.165; //kg/m3 
//$Qm = 0.5;

$Ar = $pi*($diam*$diam)/4;

$knob1=$lper/100.0;
$vl = $max_vl*$knob1; //m3/sec
$liquid_flow_rate= ($vl*$rhoL)/$Ar;
$_SESSION['liquid_flow_rate'] = $liquid_flow_rate;

$max_va = 3000000/(1000*3600); //m3/sec 
$knob2=$gper/100.0;
		$va = $max_va*$knob2;
		$air_flow_rate= ($va*$rhoG)/$Ar;
$_SESSION['air_flow_rate'] = $air_flow_rate;
$vel = $va/$Ar;
$del_P = 0.5*$rhoG*($vel*$vel);
//echo "delp".$del_P;
		$del_h = ($del_P)*100/($g*($rho-$rhoG));
		$dummy=$del_h*(1.0+0.1*(mt_rand(1,50))/100) ;
//echo "delh".$del_h;
//echo "dummy".$dummy;
		//$random_no = mt_rand(0,100)/100;		
		//$_SESSION['dummy'] = $dummy;
		
		
$pdrop = $air_flow_rate;

$h2 =  7 + 5 * (rand(1,100000)/100000);
$h1 = $h2 + $dummy;
$h1 = round($h1, 4); 
$h2 = round($h2, 4); 
/*
echo "dia\n".$dia;
echo "area\n".$Ar;
echo "L\n".$vl;
echo "G\n".$va;
echo "liquid_mass_flow\n".$liquid_flow_rate;
echo "air_mass_flow\n".$air_flow_rate;
echo "velocity\n".$vel;
echo "deltap\n".$del_P;
echo "deltah\n".$del_h;
echo "dummy\n".$dummy;
echo "pdrop\n".$pdrop;
*/

	//$h1 = 10 + $dummy/2;
	//$h2 = 10 - $dummy/2;
echo "<INPUT style=\"position:relative;bottom:200px;width:160px;height:50px;background-color:#D0F18F;color:#53760D;font:24px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;\" TYPE=text VALUE=\"$h1 cm \" NAME=h1>";
	echo "<img src=mano.jpg>";
	echo "<INPUT style=\"position:relative;bottom:200px;width:160px;height:50px;background-color:#D0F18F;color:#53760D;font:24px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;\" TYPE=text VALUE=\"$h2 cm\" NAME=h2> <br ><br>";


?>

</center>






<FORM name="volu" action="hpc4.php"  method="post">
 <h2>Record the manometer reading and calculate</h2>
<h3>Calculate Gas mass velocity:	<INPUT style="width:90px;height:50px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="" NAME="pdropa"> <input type="text" value="<?php echo $pdrop; ?>" name="pdrop" /> kg/m<sup>2</sup>-sec<INPUT TYPE="button" VALUE="Check" NAME="re_check" onClick="check_re();"><img style="display:none;" id="re_r" src="rg.png"><img id="re_w" style="display:none;" src="wg.png"></h3>



<input type="image" src="next.jpg" alt="Submit button">


</FORM>










<INPUT TYPE="hidden" VALUE="" NAME="result">
</FORM>

<p>



</p>
</div>


<div id="footer">
Cellulose lab IIT Bombay
</div>
</div>
</body>
</html>

