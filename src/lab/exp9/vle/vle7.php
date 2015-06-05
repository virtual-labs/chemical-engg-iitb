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

</head>
<body>


<div id="container">
<div id="top">
<a href=index.html><img border=0 src=vlabs.jpg></a><br>
</div>


<div id="content">

<p>
<h1> Calculations </h1>
<h3>Calculate x<sub>1</sub>,y<sub>1</sub> using calibration curve-<br>Calculate &gamma;<sub>1</sub>, &gamma;<sub>2</sub>, using  <br><center>&gamma;<sub>i</sub>= x<sub>i</sub>P<sub>sat</sub>/P*y<sub>i</sub> </center></br>Where P<sub>sat</sub> can be calculated using Antoine equation :-<br>
<center>Log P<sub>sat</sub> = A - B/(T+C)</center><br>
1. Plot ln(&gamma;<sub>1</sub> / &gamma;<sub>2</sub>) vs x<sub>1</sub> and the area under the curve should be zero</br>
2. Plot ln(&gamma;<sub>1</sub>) vs x<sub>1</sub>. Area under the curve should be ln(&gamma;<sub>2</sub>)<h3>
</p><br>
<br>
<h1>Data Consistency Check</h1><br>

<h3>For plot 1, enter ratio of magnitude of positive and negative area </h3><br>

<div id="track1" style="width: 200px; background-color: rgb(204, 204, 204); height: 15px;">
			<div class="selected" id="handle1" style="width: 20px; height: 20px; background-color: rgb(0, 0, 0); cursor: move; left: 0px; position: relative;"></div>
		</div>
<br>

<form action="vle8.php" method="post">
<input type="text" style="width:60px;height:50px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" id="percent1" name="percent1" maxlength="5" readonly/><br /><br>



		<script type="text/javascript" language="javascript">
		// <![CDATA[
		
			// horizontal slider control
			new Control.Slider('handle1', 'track1', {range: $R(0.5, 1.6),
				values: [0.5,0.6,0.7,0.8,0.9,1.0,1.1,1.2,1.3,1.4,1.5,1.6],
				onSlide: function(v){ var f = v; $('percent1').value = f;},
				onChange: function(v){ var f = v; $('percent1').value = f; }
			});
		
		
			
	
		// ]]>
		</script>
	
	

	<script type="text/javascript" language="javascript">
		// <![CDATA[
		
			// horizontal slider control
			new Control.Slider('handle2', 'track2', {range: $R(0, 20),
				values: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20],
				onSlide: function(v){ var f = v; $('percent2').value = f;},
				onChange: function(v){ var f = v; $('percent2').value = f; }
			});
		
		
			
	
		// ]]>
		</script>
	
<br><br>




  <INPUT type="image" name="search" src="next.jpg" border="0"></TD>
</form>


<p>

</p>
</div>

<div id="content2">


</div>
<div id="footer">
Cellulose lab IIT Bombay
</div>
</div>
</body>
</html>

