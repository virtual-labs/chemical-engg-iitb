<?php
session_start(); 
?>
<html>
<head>
<title></title>
<link rel="stylesheet" href="css/jquery.stopwatch.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/cal5.jquery.stopwatch.js"></script>
<style type="text/css">
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
width: 300px;
margin: 0;
padding: 1em;
}

#content
{
width: 500px;
margin-left: 150px;
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
<?php


$t1 = $_POST["t1"];
$k = $_POST["kal"];
$temp = $_POST["temp"];
$v1 = $_POST["vol"];
$v2 = $_POST["vol2"];
$t2 = $_POST["temp"];
$cpmix = $_POST["cpmix"];
$hm = $_POST["htmix"];
$mfr = $_POST["mf"];
$eid = $_SESSION['eid']


	
?>

<div id="top">
<a href=index.html><img border=0 src=vlabs.jpg style="margin-left:20%"></a><br>
<center>
<h1>Determination of Specific heat of binary mixture </h1>
<p>To determine heat of mixing you need to calculate Cp of binary solution. For that when binary solution attains new temperature due to heat of mixing it is heated by external source (electric coil connected to constant voltage and current source) to 1-2 degree rise. The current supply is switched off at 1-2 degree temperature rise.
</p><br>
<img src="cal.jpg">
</center>
</div>
<div id="rightnav">


<FORM name="volu">


<h3>Temperature  <INPUT style="width:90px;height:30px;background-color:#D0F18F;color:#53760D;font:20px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="<?php echo $temp; ?>" NAME="vol" readonly=true readonly> K</h3>
<h3>Current  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<INPUT style="width:90px;height:30px;background-color:#D0F18F;color:#53760D;font:20px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="0.5" NAME="i" readonly>amperes</h3>
<h3>Voltage &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<INPUT style="width:90px;height:30px;background-color:#D0F18F;color:#53760D;font:20px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="10" NAME="v" readonly>volts</h3>
 <INPUT TYPE="hidden" VALUE="<?php echo $t1; ?>" NAME="mf">
 <INPUT TYPE="hidden" VALUE="<?php echo $t2; ?>" NAME="t2">
<input name="kal" type="hidden" value="<?php echo $k; ?>"><br>
 <INPUT TYPE="hidden" VALUE="<?php echo $v1; ?>" NAME="v1">
 <INPUT TYPE="hidden" VALUE="<?php echo $v2; ?>" NAME="v2">
 <INPUT TYPE="hidden" VALUE="<?php echo $hm; ?>" NAME="hm">
 <INPUT TYPE="hidden" VALUE="<?php echo $mfr; ?>" NAME="mfr">
 <INPUT TYPE="hidden" VALUE="<?php echo $eid; ?>" NAME="mf">


<input name=cp type="hidden" value=""><br>
<input name=t_amb type="hidden" value=""><br>

</FORM>
</div>
<div id="content">

<center>
		<div id="clock1"></div>
		<br /><br />
    
    <form name="time" method="post" action="cal6.php">
<input name=timer type="hidden" value=""><br>
<input name=itemp type="hidden" value="<?php echo $temp; ?>"><br>
<input name="kal" type="hidden" value="<?php echo $k; ?>"><br>
 <INPUT TYPE="hidden" VALUE="<?php echo $t1; ?>" NAME="t1">
 <INPUT TYPE="hidden" VALUE="<?php echo $t2; ?>" NAME="t2">
<input name="t3" type="hidden"><br>

 <INPUT TYPE="hidden" VALUE="<?php echo $v1; ?>" NAME="v1">
 <INPUT TYPE="hidden" VALUE="<?php echo $v2; ?>" NAME="v2">
 <INPUT TYPE="hidden" VALUE="<?php echo $hm; ?>" NAME="hm">
 <INPUT TYPE="hidden" VALUE="<?php echo $mfr; ?>" NAME="mfr">
 <INPUT TYPE="hidden" VALUE="<?php echo $eid; ?>" NAME="eid">


<input type="image" src="next.jpg" alt="Submit button">
</form>
</center>
  </div>
	<script type="text/javascript">
		$(function() {
			$('#clock1').stopwatch();
		});
	</script>
<div id="footer">
<p align="center">Virtual labs IIT Bombay</p>
</div>
</div>
</body>
</html>
