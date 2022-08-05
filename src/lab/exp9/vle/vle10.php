<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Virtual Labs</title>

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
			<a href=index.html><img src=images/vlabs.jpg style="margin-left:20%"></a><br>
		</div>
		<div id="content">
			<h1>Enter your model fit parameters equation used</h1><br>

			<form action="vle11.php" method="post">
				A<sub>12</sub>  <input type="text" style="width:60px;height:50px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" id="percent1" name="a12" maxlength="5" /><br /><br>

				A<sub>21</sub>  <input type="text" style="width:60px;height:50px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" id="percent2" name="a21" maxlength="5" /><br /><br>

				R<sup>2</sup> <input type="text" style="width:60px;height:50px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" id="percent2" name="r2" maxlength="5" /><br /><br>

				<!-- <input type="hidden" name="mod" value="<? //echo $mod;?>" > -->
				<input type="hidden" name="mod" value="2" >
  				<input type="image" name="search" src="images/next.jpg" border="0"></td>
			</form>
			<p></p>
		</div>
		<div id="footer">
			Cellulose lab IIT Bombay
		</div>
	</div>
</body>
</html>