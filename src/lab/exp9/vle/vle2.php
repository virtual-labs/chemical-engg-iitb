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
		function genvle()
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

			if ( ( document.vle.hl.value == "" ))
        	{
                alert ( "Please enter heating Load Level" );
                valid = false;
				check=1;
        	}

			if ( ( document.vle.v1.value < 0 ))
        	{
                alert ( "Please enter a non negative number" );
                valid = false;
				check=1;
        	}

			if(check =="0")
			{
				v1 = document.vle.v1.value;
				v2 = document.vle.v2.value;
				hl = document.vle.hl.value;
				send = v1 + ' ' + v2 + ' ' + hl + ' ' + '1';
				//alert("sd" + send);

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
						//alert("sd" + res);
						var vle = res.split(" ");
						document.vle.t.value = vle[0];
						document.vle.rix.value = vle[1];
						document.vle.riy.value = vle[2];
					}
  				}
				xmlhttp.open("GET","genvle.php?val="+send,true);
				xmlhttp.send();
			}
		}

		function addpnt()
		{
			v1 = document.vle.v1.value;
			v2 = document.vle.v2.value;
			hl = document.vle.hl.value;
			rix = document.vle.rix.value;
			riy = document.vle.riy.value;
			t = document.vle.t.value;
			send = v1 + ' ' + v2 + ' ' + hl + ' ' + rix + ' ' + riy + ' ' + t;
			//alert("sd" +send);

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
					//alert("sd" + res); 
				}
  			}
			xmlhttp.open("GET","addpnt.php?val="+send,true);
			xmlhttp.send();

			document.vle.v1.value ="";
			document.vle.v2.value ="";
			document.vle.hl.value="";
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
		background-color: #FFFFFF;
		width: 50%;
		margin: 0;
		padding: 1em;
		}

		#content
		{
		width: 400;
		margin-left: 0px;
		border-left: 0px solid gray;
		margin-right: 0px;
		border-right: 0px solid gray;
		padding: 1em;

		}

		#content2
		{
		width: 800;
		margin-left: 20px;
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
	<?php 
		$val = $_GET["sys"];
		include "connection/connect.php";
		$con_obj = new connection();
		include 'classes/experiment.php';
		$usr_obj = new users($con_obj);

		date_default_timezone_set('Asia/Calcutta');
		$date = date('l jS \of F Y h:i:s A');
		$usr_obj->insertuser($val, $date);

		$usr = $usr_obj->getsrno($val, $date);
		$usr_value = mysqli_fetch_assoc($usr);
		$getval=$usr_value['sys'];
		$getdate=$usr_value['date'];

		if (mysqli_num_rows($usr) > 0)
		{
			$getsrno=$usr_value['Srno'];
		}
		else
		{
			echo "False";
		}

		$floor = 10000;
		$ceiling = 99999;
		srand((double)microtime()*1000000);
		$random = rand($floor, $ceiling);
		$eid = $getsrno.$random;
		$usr_obj->updateeid($eid, $getsrno);

		$_SESSION['eid'] = $eid;
		$_SESSION['sys'] = $val;
	?>

	<div id="container">
		<div id="rightnav">
			<p> <img src="images/vleh.jpg" align="right"> </p>
		</div>
		<div id="content">
			<form name="vle" method="post" action="vle3.php">
				<table style="margin-top:10%">
					<tr>
						<td align="right">
							Enter volume of 1st component V1(ml) </td><td align="left"> <input type="text" style="width:80px;height:30px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" name="v1" maxlength="5" />
						</td>
					</tr> <br/>

					<tr>
						<td align="right">
							Enter volume of 2nd component V2(ml) </td><td align="left"> <input type="text" style="width:80px;height:30px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" name="v2" maxlength="5" />
						</td>
					</tr>
				</table> <br/>
				<br><br>

				Heating Load Level

				<div id="track1" style="width: 200px; background-color: rgb(204, 204, 204); height: 10px;">
					<div class="selected" id="handle1" style="width: 20px; height: 20px; background-color: rgb(0, 0, 255); cursor: move; left: 0px; position: relative;"></div>
				</div>

				<script type="text/javascript" language="javascript">
					// <![CDATA[
					// horizontal slider control
					new Control.Slider('handle1', 'track1', {range: $R(0,10),
						values: [0,1,2,3,4,5,6,7,8,9,10],
						onSlide: function(v){ var f = v; $('fullname').value = f;},
						onChange: function(v){ var f = v; $('fullname').value = f; }
					});
					// ]]>
				</script>
				<br /><br>
				<input type="text" style="width:60px;height:30px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" id="fullname" name="hl" maxlength="5" /><br /><br>
			</div>

			<div id="content2">
				<img src="images/generate.jpg" OnMouseOver="this.style.cursor='pointer';"  onclick="genvle()"> <br><br>
				<input type="button" onclick="addpnt()"value="Add data point"/>
				<input type="reset" value="Reset"/>
				<input type="submit" value="Add data point Proceed to calculations"/>
				<br />

				<p style="color:#003366;font:24px/30px cursive;">
					RI <sub>x</sub>  <input type="text" style="width:90px;height:30px;background-color:#3399FF;color:#003366;font:24px/30px cursive;border:solid 1px #0000FF;" name="rix" maxlength="5" /></h3>
					&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

					RI <sub>y</sub>    <input type="text" style="width:90px;height:30px;background-color:#3399FF;color:#003366;font:24px/30px cursive;border:solid 1px #0000FF;" name="riy" maxlength="5" />
					&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;T <input type="text" style="width:90px;height:30px;background-color:#3399FF;color:#003366;font:24px/30px cursive;border:solid 1px #0000FF;" name="t" maxlength="5" />
				</p>  
			</form>
			</div>
			<div id="footer">
				<p align="center">Virtual labs IIT Bombay</p>
			</div>
		</div>
</body>
</html>