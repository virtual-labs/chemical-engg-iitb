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
width: 40%;
margin: 0;
padding: 1em;
}

#content
{
width: 600;
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

<?php
$sys = $_GET["sys"];

if($sys=="0")
{
$flow="335";
$hft = mt_rand(52.0,53.5);
}

if($_GET["mode"]=="start")
{
include_once("config.inc.php");	
 # Inherit database connection information from variables defined in config.inc.php
 global $db, $db_host, $db_user, $db_password;

 # Connect to the database and report any errors on connect.
 $cid = mysqli_connect($db_host,$db_user,$db_password);

 if (!$cid) {
  die("ERROR: " . mysqli_error() . "\n");
 } 
 date_default_timezone_set('Asia/Calcutta');
$date = date('l jS \of F Y h:i:s A');


 # Setup SQL statement and add the account into the system.
mysqli_select_db ($cid,$db);
 $result = mysqli_query($cid,"INSERT INTO htl_exp (
`eid` ,
`name` ,
`sys` ,
`date` 
)
VALUES ('','Anuradha Bhat','$sys','$date')") or die("mysqli Login Error: ".mysqli_error()); 


 # Check for errors.
 if (!$result) {

  die("ERROR: " . mysqli_error() . "\n");

 } 
else

 {
mysqli_select_db ($cid,$db);
$stuff = mysqli_query($cid,"SELECT * FROM `htl_exp` where date='$date'") or die("mysqli Login Error: ".mysqli_error()); 

if (mysqli_num_rows($stuff) > 0) { 

$row=mysqli_num_rows($stuff);


while($row = mysqli_fetch_array($stuff))
  {
  $srno=$row['Srno'];
}
}

}

 $floor = 10000;
 $ceiling = 99999;
 srand((double)microtime()*1000000);
 $random = rand($floor, $ceiling);
$eid = $srno.$random;
 # Setup SQL statement and add the account into the system.
mysqli_select_db ($cid,$db);
 $result = mysqli_query($cid,"UPDATE htl_exp
SET eid='$eid' 
WHERE Srno='$srno'") or die("mysqli Login Error: ".mysqli_error()); 


 # Check for errors.
 if (!$result) {

  die("ERROR: " . mysqli_error() . "\n");

 } 
else

 {

$_SESSION['eid'] = $eid;

}



}







?>
<div id="container">
<div id="top">
<a href=index.html><img border=0 src=vlabs.jpg></a><br>
</div>

<div id="rightnav">
Enter position of valve for hot fluid (% opened)
<br>
<br>

<div id="track1" style="width: 200px; background-color: rgb(204, 204, 204); height: 10px;">
			<div class="selected" id="handle1" style="width: 20px; height: 20px; background-color: #FF4411; cursor: move; left: 0px; position: relative;"></div>
		</div>



		<script type="text/javascript" language="javascript">
		// <![CDATA[
		
			// horizontal slider control
			new Control.Slider('handle1', 'track1', {range: $R(0.000070, 0.000105),
				values: [0.000070,0.000071,0.000072,0.000073,0.000074,0.000075,0.000076,0.000077,0.000078,0.000079,0.000080,0.000081,0.000082,0.000083,0.000084,0.000085,0.000086,0.000087,0.000088,0.000089,0.000090,0.000091,0.000092,0.000093,0.000094,0.000095,0.000096,0.000097,0.000098,0.000099,0.000100,0.000101,0.000102,0.000103,0.000104,0.000105],
				onSlide: function(v){ var f = v; $('fullname').value = f;},
				onChange: function(v){ var f = v; $('fullname').value = f; }
			});
		
		
			
	
		// ]]>
		</script>
	
	
<br><br>

<form action="htl2.php" method="post">
<input type="text" style="width:130px;height:30px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" id="fullname" name="percent" maxlength="5" /><br /><br>
<table>
<tr>
<td align="right">
Cold fluid flow rate : </td><td align="left"><INPUT style="width:50px;height:30px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="<?php echo $flow;?>" NAME="vol"> lph</td></tr>
<tr>
<td align="right">
Hot fluid inlet temperature :</td><td align="left"> <INPUT style="width:50px;height:30px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="<?php echo $hft;?>" NAME="hft"> &deg;C </td></tr>

<tr>
<td align="right">
Cold fluid inlet temperature :</td><td align="left"> <INPUT style="width:50px;height:30px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="<?php echo mt_rand(25.0,26.5);?>" NAME="cft"> &deg;C </td></tr> </table>
<INPUT TYPE="hidden" VALUE="<?php echo $sys; ?>" name=flag> 
<br>

  <INPUT type="image" name="search" src="next.jpg" border="0"></TD>
</form>


</div>
<div id="content">
<?php
$sys = $_GET["sys"];

if($sys=="0")
{
echo "<img src=s_lam.jpg>";
}
?>

</div>


<div id="footer">
<p align="center">Virtual labs IIT Bombay</p>
</div>
</div>
</body>
</html>

