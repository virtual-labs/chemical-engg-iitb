<?php
session_start(); 
?>
<html>
<head>
<title></title>
<link rel="stylesheet" href="css/jquery.stopwatch.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.stopwatch.js"></script>
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
width: 300px;
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

<div id="top">
<b><p style= "font-family: cursive: Apple Chancery; font-size: 2.5em; color: #00ff00;">Flow Measurement by Venturimeter and Orificemeter</p>  </b>

Now, it is required to evaluate "v" (average velocity). To do so, we must measure the volumetric flow rate of the fluid.

Collect the fluid at the outlet into a measuring beaker and time the duration for collecting the fluid. This should enable you to evaluate "v".

Fix a reasonable duration for collecting the fluid. Very short time may result in significant error and very long time makes the experiment unrealistic.
Note the volume collected and duration of time for the same.
</div>
<div id="rightnav">

<?php
$lper = $_POST['lpercent'];
$max_v = 1;
$So=0.000154;
$knob=$lper/100.0;
$vo = $max_v*$knob;
$_SESSION['vo'] = $vo;
$volcal= $vo*$So*1000000;
?>

<img id="b" style="display:none;" src="b.jpg">
<img id="be" src="be.jpg">
<FORM name="volu">


<input name=acc type="hidden" value="<?php echo $volcal; ?>">
<h3>Volume collected  <INPUT style="width:90px;height:30px;background-color:#D0F18F;color:#53760D;font:20px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="" NAME="vol"> ml</h3>
</FORM>
</div>
<div id="content">


		<div id="clock1"></div>
		<br /><br />
    
    <form name="time" method="get" action="ori8.php">
<input name=timer type="hidden" value=""><br>
<input type="image" src="next.jpg" alt="Submit button">
</form>

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
