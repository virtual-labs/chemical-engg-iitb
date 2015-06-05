<?php
session_start(); 
?>
<html>
<head>
<title></title>
<link rel="stylesheet" href="css/jquery.stopwatch.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.stopwatch.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/themes/base/jquery-ui.css" type="text/css" media="all" />


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


<style>
	#demo-frame > div.demo { padding: 10px !important; };
	</style>
	<script>
	$(function() {
		$( "#slider" ).slider({
			value:0,
			min: 0,
			max: 100,
			step: 1,
			slide: function( event, ui ) {
				$( "#percent" ).val(ui.value );
			}
		});
		$( "#percent" ).val( $( "#slider" ).slider( "value" ) );
	});
	</script>




</head>
<body>
  <div id="container">

<div id="top">
<a href=index.html><img border=0 src=vlabs.jpg></a><br>

<h1>Flow rate measurement</h1>
</div>
<div id="rightnav">

<img id="b" style="display:none;" src="b.jpg">
<img id="be" src="be.jpg">
<FORM name="volu">



<h3>Volume collected  <INPUT style="width:90px;height:50px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="" NAME="vol"> ml</h3>



</FORM>
</div>


<div id="content">


	
    
    <form name="time" method="get" action="fm4.php">

<h3>Percentage valve opening  : <INPUT style="width:90px;height:50px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" id="percent" TYPE="text" VALUE="" NAME="percent" readonly> <div class="demo">

	<input type="text" id="amount" style="border:0; color:#f6931f; font-weight:bold;" />
</p>

<div id="slider"></div>

</div><!-- End demo --></h3><br><br>

	<div id="clock1"></div>
		<br /><br />
<input name=timer type="hidden" value=""><br>
<input name=v type="hidden" value="">
<input name=vol type="hidden" value="">


<input type="image" src="next.jpg" alt="Submit button">
</form>

  </div>
	<script type="text/javascript">
		$(function() {
			$('#clock1').stopwatch();
		});
	</script>


<div id="footer">
Cellulose lab IIT Bombay
</div>
</div>
</body>
</html>
