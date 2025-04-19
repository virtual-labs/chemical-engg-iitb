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
	<script src="js/prototype.js" type="text/javascript"></script>
		<script src="js/slider2.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/buttons.css" type="text/css" media="screen" />

</head>
<body>

<div id="container">
<div id="top">
<a href=index.html><img border=0 src=vlabs.jpg></a><br>
</div>

<div id="rightnav">

</div>
<div id="content">
<?php

	$dia = $_GET["dia"];
	$length = $_GET["len"];
	$ptype = $_GET["cptype"];
	$press = $_GET["press"];
	$_SESSION['p'] = $press;
	$_SESSION['l'] = $length;

	// echo("ptype: ".$ptype);
	// echo("length: ".$length);
	// echo("dia: ".$dia);

?>


<form action="hpc3.php" name="percent" method="post">
<h3>Enter position of valve for liquid (% opened)</h3>

<div id="track1" style="width: 200px; background-color: rgb(204, 204, 204); height: 10px;">
			<div class="selected" id="handle1" style="width: 20px; height: 15px; background-color: rgb(255, 0, 0); cursor: move; left: 0px; position: relative;"></div>
		</div>



		<script type="text/javascript" language="javascript">
		// <![CDATA[
		
			// horizontal slider control
			new Control.Slider('handle1', 'track1', {range: $R(0, 100),
				values: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100],
				onSlide: function(v){ var f = v; $('liquid').value = f;},
				onChange: function(v){ var f = v; $('liquid').value = f; }
			});
		
		
			
	
		// ]]>
		</script>
	
	
<br><br><input type="text" style="width:40px;height:30px;background-color:#D0F18F;color:#53760D;font:20px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" id="liquid" name="lpercent" maxlength="5" /><br /><br><br>
<h3>Enter position of valve for gas (% opened)</h3>

<div id="track2" style="width: 200px; background-color: rgb(204, 204, 204); height: 10px;">
			<div class="selected" id="handle2" style="width: 20px; height: 15px; background-color: rgb(0, 0, 255); cursor: move; left: 0px; position: relative;"></div>
		</div>



		<script type="text/javascript" language="javascript">
		// <![CDATA[
		
			// horizontal slider control
			new Control.Slider('handle2', 'track2', {range: $R(0, 100),
				values: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100],
				onSlide: function(v){ var f = v; $('gas').value = f;},
				onChange: function(v){ var f = v; $('gas').value = f; }
			});
		
		
			
	
		// ]]>
		</script>


<br><br>



<input type="text" style="width:40px;height:30px;background-color:#D0F18F;color:#53760D;font:20px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" id="gas" name="gpercent" maxlength="5" /><br /><br><br>


<div id="green-button">
			<a href="#" onclick="document.percent.submit()" class="green-button pcb">
				<span>Submit</span>
			</a>
		</div>
</TD>
<input name ="dia" type="hidden" value="<?php echo $dia ?>" >
<input name ="length" type="hidden" value="<?php echo $length ?>" >
<input name ="ptype" type="hidden" value="<?php echo $ptype ?>" >

</form>

<p>

</p>
</div>

<div id="content2">

<p>

</p>
</div>
<div id="footer">
Cellulose lab IIT Bombay
</div>
</div>
</body>
</html>

