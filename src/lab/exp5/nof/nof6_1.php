<?php
session_start(); 
?>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">

<SCRIPT language="JavaScript"
        type="text/javascript">
<!--
function checkAnswer1()
{
element = document.getElementById('nr').style;
    element.display = 'none';
element = document.getElementById('msr').style;
    element.display = 'none';
element = document.getElementById('nm2r').style;
    element.display = 'none';
element = document.getElementById('ndr').style;
    element.display = 'none';
element = document.getElementById('nw').style;
    element.display = 'none';
element = document.getElementById('msw').style;
    element.display = 'none';
element = document.getElementById('nm2w').style;
    element.display = 'none';
element = document.getElementById('ndw').style;
    element.display = 'none';

  var s = "?";
  var result = "nd";

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
if(document.quizform.cc[3].checked == true)
{
s = document.quizform.cc[3].value;
}

// no choice was selected
  if("?" == s)
  {
    alert("Please make a selection.");
    return false;
  }

  // check if we have the correct
  // choice selected
 
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


function checkAnswer2()
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
  var rey = document.volu.rey.value;

if(rey <= 2100)
{
r="a";
}
else if((rey > 2100 ) && (rey <=4000))
{
r="b";
}
else if(rey > 4000)
{
r="c";
}

if(document.quizform2.cc[0].checked == true)
{
s = document.quizform2.cc[0].value;
}
if(document.quizform2.cc[1].checked == true)
{
s = document.quizform2.cc[1].value;
}
if(document.quizform2.cc[2].checked == true)
{
s = document.quizform2.cc[2].value;
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
  if(s == r)
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

function check_re()
{
 element = document.getElementById('re_w').style;
    element.display = 'none';
element = document.getElementById('re_r').style;
    element.display = 'none';

re_user =document.volu.rey.value;
re_server = document.volu.re_chk.value;


//alert(re_user+" "+re_server);

re_server_low = re_server*0.998;
re_server_high = re_server*1.002;
//alert(re_server_low+" "+re_server_high);
if(Math.abs((re_server-re_user)) <= 50)
{
element = document.getElementById('re_r').style;
    element.display = 'inline';
}
else
{
element = document.getElementById('re_w').style;
    element.display = 'inline';
alert("Check your calculations");
}
}

function check_fric()
{
 element = document.getElementById('fric_w').style;
    element.display = 'none';
element = document.getElementById('fric_r').style;
    element.display = 'none';
fric_user =document.volu.fric.value;
fric_server = document.volu.fric_chk.value;

//alert(fric_user+" "+fric_server);

fric_server_low = fric_server*0.95;
fric_server_high = fric_server*1.05;
//alert(fric_server_low+" "+fric_server_high);
if((fric_server_low < fric_user) && (fric_server_high > fric_user))
{
element = document.getElementById('fric_r').style;
    element.display = 'inline';
}
else
{
element = document.getElementById('fric_w').style;
    element.display = 'inline';
alert("Check your calculations");
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
<a href=index.html><img border=0 src=img/vlabs.jpg style="margin-left:20%"></a><br>
</div>

<div id="content">
<center>
<?php
include_once("config.inc.php");

	$time = $_GET["timer"];
	$message = "2$".$time;
	$eid = $_SESSION['eid'];
	$resu = $_SESSION['result'];
	$percent = $_SESSION['percent'];
	$dia = $_SESSION['pdia'];
	$length = $_SESSION['plen'];
	$length = ($length * 2.54)/100;

	// Reynolds no check 
	$dia = ($dia*2.54)/100;
	$rho = 1000;
	$mu = pow(10, -3);
	$pi = 22/7;                                 //22/7
	$area = ($pi *($dia * $dia))/4;
	$vel = $_SESSION['vel'];
	//echo $vel;
	$re_check= ($rho * $vel * $dia )/$mu;

	$re_check = $_SESSION['re'];
	$fric_check = $_SESSION['f'];
	$dummy = $_SESSION['dummy'];

        $h2 =  7 + 5 * (mt_rand(0,10000)/10000);
	$h2 = round($h2, 1);
         $h1 = $dummy + $h2;
	$h1 = round($h1, 1);
	
	$h1c = $h1." cm";
	$h2c = $h2." cm";
	
	echo "<INPUT style=\"position:relative;bottom:200px;width:120px;height:50px;background-color:#D0F18F;color:#53760D;font:24px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;\" TYPE=text VALUE=\"$h1c \" NAME=h1>";
	echo "<img src=img/mano.jpg>";
	echo "<INPUT style=\"position:relative;bottom:120px;width:120px;height:50px;background-color:#D0F18F;color:#53760D;font:24px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;\" TYPE=text VALUE=\"$h2c \" NAME=h2><br><br>";
?>
</center>

<img src="img/qi.jpg"><br>Check the dimensions of the Reynolds number computed and check
the appropriate box below that indicate its dimensions.
<FORM name="quizform">

<INPUT TYPE="RADIO" VALUE="n" NAME="cc" onClick="checkAnswer1();">
N <img style="display:none;" id="nr" src="img/rg.png"><img id="nw" style="display:none;" src="img/wg.png"><BR>

<INPUT TYPE="RADIO" VALUE="ms" NAME="cc" onClick="checkAnswer1();">
m/s <img style="display:none;"  id="msr" src="img/rg.png"><img id="msw" style="display:none;" src="img/wg.png"><BR>

<INPUT TYPE="RADIO" VALUE="nm2" NAME="cc" onClick="checkAnswer1();">
N/m<sup>2</sup> <img style="display:none;"  id="nm2r" src="img/rg.png"><img id="nm2w" style="display:none;" src="img/wg.png"><BR>

<INPUT TYPE="RADIO" VALUE="nd" NAME="cc" onClick="checkAnswer1();">
Dimensionless <img style="display:none;"  id="ndr" src="img/rg.png"><img id="ndw" style="display:none;" src="img/wg.png"><BR>
<INPUT TYPE="hidden" VALUE="<?php echo $result; ?>" NAME="result">
</FORM>

<FORM name="volu" action="nof7.php"  method="post">
 <h2>Calculate and enter the value of the Reynolds number  and Friction factor you have just computed:</h2>
<h3>Reynolds no &nbsp;<INPUT style="width:90px;height:30px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="" NAME="rey"> <INPUT TYPE="button" VALUE="Check" NAME="re_check" onClick="check_re();"><img style="display:none;" id="re_r" src="img/rg.png"><img id="re_w" style="display:none;" src="img/wg.png"></h3>
<INPUT TYPE="hidden" VALUE="<?php echo $re_check; ?>" name="re_chk"> 
<INPUT TYPE="hidden" VALUE="<?php echo $fric_check; ?>" name=fric_chk> 
<INPUT TYPE="hidden" VALUE="<?php echo $eid; ?>" name=eid>
<INPUT TYPE="hidden" VALUE="<?php echo $h1; ?>" name=h1> 
<INPUT TYPE="hidden" VALUE="<?php echo $h2; ?>" name=h2> 
<INPUT TYPE="hidden" VALUE="<?php echo $time; ?>" name=time> 
<INPUT TYPE="hidden" VALUE="<?php echo $vel; ?>" name=v1>
<INPUT TYPE="hidden" VALUE="<?php echo $resu; ?>" name=result> 
<h3>Friction factor <INPUT style="width:90px;height:30px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="" NAME="fric"> <INPUT TYPE="button" VALUE="Check" NAME="fric_check" onClick="check_fric();"><img style="display:none;" id="fric_r" src="img/rg.png"><img id="fric_w" style="display:none;" src="img/wg.png"></h3>
</FORM>

<img src="img/qi.jpg"><br>According to the classification of the regimes from Reynolds number
what is the nature of flow? Check the appropriate box below:
<FORM name="quizform2">

<INPUT TYPE="RADIO" VALUE="a" NAME="cc" onClick="checkAnswer2();">
Laminar <img style="display:none;" id="ar" src="img/rg.png"><img id="aw" style="display:none;" src="img/wg.png"><BR>

<INPUT TYPE="RADIO" VALUE="b" NAME="cc" onClick="checkAnswer2();">
Transition <img style="display:none;"  id="br" src="img/rg.png"><img id="bw" style="display:none;" src="img/wg.png"><BR>

<INPUT TYPE="RADIO" VALUE="c" NAME="cc" onClick="checkAnswer2();">
Turbulent <img style="display:none;"  id="cr" src="img/rg.png"><img id="cw" style="display:none;" src="img/wg.png"><BR>
<INPUT TYPE="hidden" VALUE="<?php echo $resu; ?>" NAME="result">

<input type="image" src="img/next.jpg" alt="Submit button">
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
