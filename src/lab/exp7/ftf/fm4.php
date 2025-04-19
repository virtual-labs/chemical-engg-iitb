<?php
session_start(); 
?>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
	






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
element = document.getElementById('dr').style;
    element.display = 'none';
element = document.getElementById('er').style;
    element.display = 'none';
element = document.getElementById('aw').style;
    element.display = 'none';
element = document.getElementById('bw').style;
    element.display = 'none';
element = document.getElementById('cw').style;
    element.display = 'none';
element = document.getElementById('dw').style;
    element.display = 'none';
element = document.getElementById('ew').style;
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
if(document.quizform.cc[3].checked == true)
{
s = document.quizform.cc[3].value;
}
if(document.quizform.cc[4].checked == true)
{
s = document.quizform.cc[4].value;
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
width: 10%;
margin: 0;
padding: 1em;
}

#content
{

margin-left: 0px;
border-left: 0px solid gray;
margin-right: 0px;
border-right: 0px solid gray;
padding: 1em;
#max-width: 36em;
}


#content2
{

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
<?php


include_once("config.inc.php");

	$time = $_GET["timer"];
	$v = $_GET["v"];
	
	$percent = $_GET["percent"];
	
	$D = $_SESSION['dia'];
	$den = $_SESSION['fden'];
	$visc = $_SESSION['fvisc'];
	$len = $_SESSION['length'];
	$kf = $_SESSION['kf'];

	$e = 0.0174;
	$a = 3.14*pow($D,2)/4;
	$u = ($v*$time*pow(10,-6))/$a;
	$re = $D*$u*$den/$visc;
	$f2 = 0.1*pow(log(($e/(3.7*$D))+ (5.74/pow($re,0.9))),(-2));
	$f3 = $kf*($D/4)*$len;
	$f = $f2+$f3;
	$dp = 2*$f*$len*pow($u,2)*$den/$D;

	















	
	$res[0] = $f;
	$res[1] = $dp;

  echo("res0: ".$res[0]);
  echo("res1: ".$res[1]);
	
echo "<h2>Friction factor : ".round($res[0],4)."</h2><br><br>";
	$time = $time." sec"; 
	$v = $v." ml";

echo "<h2>Pressure drop through pipe  : ".round($res[1],8)." bar</h2><br><br>";

?>

<FORM name="volu" action="fm5.php?pres=<?php echo round($res[1],4);?>"  method="post">
 <h2>Determine the values of the Reynolds number,Friction factor,Theortical pressure drop you have just computed::</h2>

<h3>Volume collected <INPUT style="width:90px;height:50px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="<?php echo $v ; ?>" NAME="vol"> </h3>

<h3>Time <INPUT style="width:90px;height:50px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="<?php echo $time; ?>" NAME="time"> </h3>
<h3>Friction factor : <INPUT style="width:90px;height:50px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="" NAME="press"> </h3>

<h3>Reynolds no	<INPUT style="width:90px;height:50px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="" NAME="rey"> </h3>
<INPUT TYPE="hidden" VALUE="<?php echo $result; ?>" NAME="result">


<h3>Pipe roughness : <INPUT style="width:90px;height:50px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="" NAME="press"> </h3>



<input type="image" src="next.jpg" alt="Submit button">


</FORM>

</div>


<div id="footer">
Cellulose lab IIT Bombay
</div>
</div>
</body>
</html>

