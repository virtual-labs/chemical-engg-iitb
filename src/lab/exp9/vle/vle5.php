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

	<script type="text/javascript">
		function genri()
		{
			check=0;
			if ( ( document.vle.v1.value == "" ))
			{
				alert ( "Please enter volume of 1st component V1" );
				valid = false;
				check=1;
			}

			if ( ( document.vle.v2.value == "" ))
			{
				alert ( "Please enter volume of 2nd component V2" );
				valid = false;
				check=1;
			}

			if ( ( document.vle.v1.value < 0 ))
        	{
                alert ( "Please enter a non negative number" );
                valid = false;
				check=1;
        	}

			if ( ( document.vle.v2.value < 0 ))
			{
				alert ( "Please enter a non negative number" );
				valid = false;
				check=1;
			}

			if(check =="0")
			{
				v1 = document.vle.v1.value;
				v2 = document.vle.v2.value;
				var send = v1 + ' ' + v2;

				var xmlhttp;

				if (window.XMLHttpRequest)
				{	// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp=new XMLHttpRequest();
				}
				else
				{	// code for IE6, IE5
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange=function()
  				{
  					if (xmlhttp.readyState==4 && xmlhttp.status==200)
    				{
    					var res =xmlhttp.responseText;
						document.vle.ri.value = res;
					}
				}
				xmlhttp.open("GET","measri.php?val="+send,true);
				xmlhttp.send();
			}
		}

		function addpnt()
		{
			v1 = document.vle.v1.value;
			v2 = document.vle.v2.value;
			ri = document.vle.ri.value;
			send = v1 + ' ' + v2 +' ' + ri;

			var xmlhttp;
			if (window.XMLHttpRequest)
			{	// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			}
			else
			{	// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			xmlhttp.onreadystatechange=function()
  			{
  				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					var res =xmlhttp.responseText;     
				}
  			}
			xmlhttp.open("GET","addpntri.php?val="+send,true);
			xmlhttp.send();
			document.vle.v1.value ="";
			document.vle.v2.value ="";
		}

	</script>

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
			<h1>Calibration curve for refractive index</h1><br><br><br>

			<form name="vle" method="post" action="vle6.php">
				<table>
					<tr>
						<td align="right"> Enter volume of 1st component V1(ml) </td>
						<td align="left"> <input type="text" style="width:80px;height:30px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" name="v1" maxlength="5"/>
						</td>
					</tr> <br/>

					<tr>
						<td align="right"> Enter volume of 2nd component V2(ml)</td>
						<td align="left"> <input type="text" style="width:80px;height:30px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" name="v2" maxlength="5" /></td>
					</tr>
				</table> <br><br>

				<h3>RI <input type="text" style="width:146px;height:30px;background-color:#3399FF;color:#003366;font:24px/30px cursive;border:solid 1px #0000FF;" name="ri" maxlength="5" /></h3> <br/><br>

				<input type="button" onclick="genri()"value="Measure RI"/>
				<input type="button" onclick="addpnt()"value="Add data point"/>
				<input type="reset" value="Reset"/>
				<input type="submit" value="Save file and continue"/>
			</form>
			<p></p>
		</div>

		<div id="content2">
			<p></p>
		</div>
		<div id="footer">
			Cellulose lab IIT Bombay
		</div>
	</div>
</body>
</html>