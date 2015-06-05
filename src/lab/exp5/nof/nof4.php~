<?php
session_start(); 
?>
<html lang="en">
<head>

<SCRIPT language="JavaScript"
        type="text/javascript">
<!--

function checkAnswer()
{


 element = document.getElementById('ar').style;
    element.display = 'none';
element = document.getElementById('br').style;
    element.display = 'none';

element = document.getElementById('cr').style;
    element.display = 'none';
element = document.getElementById('aw').style;
    element.display = 'none';
element = document.getElementById('bw').style;
    element.display = 'none';
element = document.getElementById('cw').style;
    element.display = 'none';



  var s = "?";

  var result = document.quizform.result.value;



if(document.quizform.cc[0].checked == true)
{
s = document.quizform.cc[0].value;
}
if(document.quizform.cc[1].checked == true)
{
s = document.quizform.cc[1].value;
}
if(document.quizform.cc[2].checked == true)
{
s = document.quizform.cc[2].value;
}


 
// no choice was selected
  //
  if("?" == s)
  {
    alert("Please make a selection.");
    return false;
  }

  // check if we have the correct
  // choice selected
  //
  if(s == result)
  {
   
    img =s+"r";
	 element = document.getElementById(img).style;
    element.display = 'inline';
  }
  else
  {

    img =s+"w";	
	
    element = document.getElementById(img).style;
    element.display = 'inline';
  }



}


//-->
</SCRIPT>














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
width: 98%;
margin-left: 0px;
border-left: 0px solid gray;
margin-right: 0px;
border-right: 0px solid gray;
padding: 1em;
#max-width: 36em;
}


#content2
{
width: 98%;
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
<a href=index.html><img border=0 src=img/vlabs.jpg style="margin-left:20%"></a><br>
</div>


<div id="content">

<?php

	$g = 9.8;
	$rho = 1000;
	$mu = 0.001;
	$max_v = 0.414; # max flow rate in m3/s
$A= 1197000000.0;
$B=-1.472;	
$C=877.9;
$pi=3.1416;

$dia = $_SESSION['pdia'];
	$D = $dia*0.0254; // conversion diameter to meter

	$percentage = $_POST["percent"];
	

	$knob=$percentage/100.0;
		$v = $max_v*$knob;
		$Ar = $pi*pow($D,2)/4;
		$flow_rate= $v*$Ar;
		//echo $v;
		//echo "<br>".$Ar;
		//echo "<br>".$flow_rate;




	$vel = $v;
	$_SESSION['vel'] = $vel;
	
	$l = $_SESSION['plen'];
	$l = $l*0.0254;
	$_SESSION['volcal'] = (((22/7*($D*$D))/4)*$vel)*1000000;


	$Re = $rho*$v*$D/$mu; 

		if($Re<=2100.0)
			{
			$f = 16/$Re;
			$del_h = 2*$f*$l*pow($v,2)*$rho/($g*$D)/487;
			$del_h = $del_h*100;  #convert from " m" to " cm"
			$dummy=$del_h*(1.0+0.1*(mt_rand(-50,50)/100));
			
			$v=$v*(1.0+0.01*(mt_rand(-50,50)/100));
			$result = "a";
			}
			else
			{
			$f=0.0014+0.125*pow($Re,-0.32);
			$del_h = 2*$f*$l*pow($v,2)*$rho/($g*$D)/487;
			$del_h = $del_h*100;  #convert from " m" to " cm"
			$dummy=$del_h*(1.0+0.1*(mt_rand(-50,50)/100));
			
			$v=$v*(1.0+0.01*(mt_rand(-50,50)/100));
			$result = "b";
			}
		//if(($Re>2100.0) & ($Re<=4000.0))
		//	{		
		//	$f=($A*pow($Re,$B)+$C)/100000;
		//	$del_h = 2*$f*$l*pow($v,2)*$rho/($g*$D)/487;
		//	$del_h = $del_h*100 ;  #convert from " m" to " cm"
		//	$dummy=$del_h*(1.0+0.1*(mt_rand(-50,50)/100));
		//	$v=$v*(1.0+0.1*(mt_rand(-50,50)/100));
		//	$result = "b";
		//	}
		//if($Re>4000.0)	
		//	{
		//	$f=($A*pow($Re,$B)+$C)/100000;
		//	$del_h = 2*$f*$l*pow($v,2)*$rho/($g*$D)/487;
		//	$del_h = $del_h*100; #convert from " m" to " cm"
		//	$dummy=$del_h*(1.0+0.1*(mt_rand(-50,50)/100));
		//	$v=$v*(1.0+0.01*(mt_rand(-50,50)/100));
		//	$result = "c";
	
			//}
		//echo $dummy;

	$_SESSION['re'] = $Re;

	$_SESSION['f'] = $f;
	$_SESSION['dummy'] = $dummy;

	if($result == "a")
	{
	//echo "<h1>Output:laminar<h1><br>";
	echo "<br><br><br><img src=img/lam.jpg>";
	$res = 'laminar';
	}
	elseif($result == "b")
	{
	//echo "<h1>Output:transient<h1><br>";
	echo "<br><br><br><img src=img/tran.jpg>";
	$res = 'transient';
	}
  	//elseif($result == "c")
	//{
	//echo "<h1>Output:turbulent<h1><br>";
	//echo "<br><br><br><img src=img/turb.jpg>";
	//$res = 'turbulent';
	//}
  	
$_SESSION['result'] = $res;
$_SESSION['percent'] = $percentage;
?>

	

<p>

</p>
</div>

<div id="content2">

<p>

<img src="img/qi.jpg"><BR>From the illustration of the flow pattern of the dye as shown, what
can be inferred about the nature of the flow? Check the
appropriate box below

<FORM name="quizform">

<INPUT TYPE="RADIO" VALUE="a" NAME="cc" onClick="checkAnswer();">
Laminar <img style="display:none;" id="ar" src="img/rg.png"><img id="aw" style="display:none;" src="img/wg.png"><BR>

<INPUT TYPE="RADIO" VALUE="b" NAME="cc" onClick="checkAnswer();">
Transition <img style="display:none;"  id="br" src="img/rg.png"><img id="bw" style="display:none;" src="img/wg.png"><BR>

<INPUT TYPE="RADIO" VALUE="c" NAME="cc" onClick="checkAnswer();">
Turbulent <img style="display:none;"  id="cr" src="img/rg.png"><img id="cw" style="display:none;" src="img/wg.png"><BR>




<INPUT TYPE="hidden" VALUE="<? echo $result; ?>" NAME="result">
</FORM>

<br><br><a href=nof5.php><img border=0 src="img/next.jpg" style="margin-left:40%"></a>
</p>
</div>
<div id="footer">
<p align="center">Virtual labs IIT Bombay</p>
</div>
</div>
</body>
</html>
 
