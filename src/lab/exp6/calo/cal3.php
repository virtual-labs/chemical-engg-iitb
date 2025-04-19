<?php
session_start(); 
?>
<html>
<head>
<title></title>
<link rel="stylesheet" href="css/jquery.stopwatch.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/cal3.jquery.stopwatch.js"></script>
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
if($_GET['k'])
{
$k = $_GET["k"];
}
else
{
$k = $_POST["kal"];
}
?>
<div id="top">
<a href=index.html><img border=0 src=vlabs.jpg style="margin-left:20%"></a><br>
<h1>Determination of Specific heat of Acetone</h1> 
<p>
Now you will determine the specific heat of the acetone using water equivalent of calorimeter. Thermos Flask of 100 ml capacity is filled with acetone. System is heated via electric coil connected to constant voltage and current source. The current supply is switched off at 1-2 degrees rise in temperature.
</p>
<center>
<h1>Select how long current is passed</h1><br>
<img src="cal.jpg">
</center>
</div>
<div id="rightnav">

<FORM name="volu">


<h3>Temperature  <INPUT style="width:80px;height:30px;background-color:#D0F18F;color:#53760D;font:20px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="298.0" NAME="vol" readonly> K</h3>
<h3>Current  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<INPUT style="width:50px;height:30px;background-color:#D0F18F;color:#53760D;font:20px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="0.5" NAME="i" readonly>amperes</h3>
<h3>Voltage &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<INPUT style="width:50px;height:30px;background-color:#D0F18F;color:#53760D;font:20px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="10" NAME="v" readonly>volts</h3>
</FORM>
</div>
<div id="content">

<center>
		<div id="clock1"></div>
		<br /><br />
    
    <form name="time" method="post" action="cal3a.php">
<input name=timer type="hidden" value=""><br>
<input name="kal" type="hidden" value="<?php echo $k; ?>"><br>
<input name="cp" type="hidden" ><br>
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
