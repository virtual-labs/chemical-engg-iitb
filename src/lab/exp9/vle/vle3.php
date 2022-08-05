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
	
		ol
		{
			margin:0;
			padding: 0 1.5em;
		}

		table
		{
			color:#FFF;
			background:#C00;
			border-collapse:collapse;
			width:647px;
			border:5px solid #900;
		}

		thead
		{

		}

		thead th
		{
			padding:1em 1em .5em;
			border-bottom:1px dotted #FFF;
			font-size:120%;
			text-align:left;
		}

		thead tr
		{

		}

		td
		{
			padding:.5em 1em;
		}

		tbody tr.odd td
		{
			background:transparent url(tr_bg.png) repeat top left;
		}

		tfoot
		{

		}

		tfoot td
		{

			padding-bottom:1.5em;
		}

		tfoot tr
		{

		}

		* html tr.odd td
		{
			background:#C00;
			filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='tr_bg.png', sizingMethod='scale');
		}

		#middle
		{
			background-color:#900;
		}


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
			<a href=index.html><img border=0 src=images/vlabs.jpg></a><br>
		</div>
		<div id="content">
			<?php
				$v1 = $_POST["v1"];
				$v2 = $_POST["v2"];
				$hl = $_POST["hl"];
				$rix = $_POST["rix"];
				$riy = $_POST["riy"];
				$t = $_POST["t"];
				$flag = '0';
				$eid = $_SESSION['eid'];

				include "connection/connect.php";
				$con_obj = new connection();
				include 'classes/experiment.php';
				$usr_obj = new users($con_obj);

				$send = $v1.' '.$v2.' '.$hl.' '.'2';
				$message = $send;
				$usr_obj->insertvalue($eid,$v1,$v2,$hl,$rix,$riy,$t,$flag);

				echo "
						<form name=\"vle\" method=\"post\" action=\"vle4.php\">
							<table>
								<col>
								<col id=\"middle\">
								<col>
								<col id=\"middle\">
								<thead>
									<tr><th>Temperature(T)</th><th>RIx</th><th>RIy</th><th>Select to reject reading</th></tr>
								</thead>
								<tfoot>
									<tr>
										<td colspan=\"3\"><ol><li>Reject the values which you feel are not needed</li></ol></td>
									</tr>
								</tfoot>
								<tbody>";

								$usr = $usr_obj->geteid($eid);
								if (mysqli_num_rows($usr) > 0)
								{
									$row=mysqli_num_rows($usr);
									$mes_val ="";
									$i='0';

									while($row = mysqli_fetch_array($usr))
									{
										$i++;
										$vle_t=$row['t'];
										$vle_rix=$row['rix'];
										$vle_riy=$row['riy'];
										$srno=$row['Srno'];
										$mes_val= $mes_val.$vle_t." ".$vle_rix." ".$vle_riy."%";
										
										if($i%2)
										{
											echo "<tr><td>$vle_t</td><td>$vle_rix</td><td>$vle_riy</td><td><input type=checkbox name=\"a[$i]\" value=\"$srno\"> Reject</td></tr>";
										}
										else
										{
											echo "<tr class=odd><td>$vle_t</td><td>$vle_rix</td><td>$vle_riy</td><td><input type=checkbox name=\"a[$i]\" value=\"$srno\"> Reject</td></tr>";
										}
									}
								}
								else
								{
									echo "False";
								}

								
			?>
			<?php //echo "i is : ".$i; ?>
			<input type="hidden" name="i" value="<?php echo $i;?>"/>
			</tbody>
			</table>
			<br><br>
			<input type="submit" value="Save and download selected data "/>
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