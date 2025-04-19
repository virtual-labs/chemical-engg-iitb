<?php
session_start(); 
?>
<html>
<head>
<title></title>
<link rel="stylesheet" href="css/jquery.stopwatch.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/cal2.jquery.stopwatch.js"></script>





<SCRIPT language="JavaScript"
        type="text/javascript">
<!--

function checkK()
{



    var result = document.time.kal.value;
    var u_result = document.time.cal.value;

var res = ((u_result-result)*100)/result;

if(Math.abs(res)< 15)
{
alert("Value entered is within bounds.proceed for further calculations");
window.location = "cal2.php?k="+ u_result;
}
else
{
alert("Please check your calculations");
window.location = "cal1.php"

}



}


//-->
</SCRIPT>



















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
include_once("config.inc.php");

$k = $_POST["kal"];
$ik = $_POST["ikal"];


$i = "0.5";
$v = "10";

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
 $result = mysqli_query($cid,"INSERT INTO cal_exp (
`eid` ,
`name` ,
`i`,
`v` ,
`date` 
)
VALUES ('','Srikant','$i','$v','$date')") or die("mysqli Login Error: ".mysqli_error()); 



 # Check for errors.
 if (!$result) {

  die("ERROR: " . mysqli_error() . "\n");

 } 
else

 {
mysqli_select_db ($cid,$db);
$stuff = mysqli_query($cid,"SELECT * FROM `cal_exp` where date='$date'") or die("mysqli Login Error: ".mysqli_error()); 

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
 $result = mysqli_query($cid,"UPDATE cal_exp
SET eid='$eid' 
WHERE Srno='$srno'") or die("mysqli Login Error: ".mysqli_error()); 


 # Check for errors.
 if (!$result) {

  die("ERROR: " . mysqli_error() . "\n");

 } 
else

 {
$_SESSION['eid'] = $eid;
$_SESSION['count'] = 0;
}






?>
<div id="top">
<a href=index.html><img border=0 src=vlabs.jpg style="margin-left:20%"></a><br>
<center>
<h1>Verification</h1>
</center>
</div>

<div id="content">
<h3>Enter the value of K computed using formula</h3>
<center>

	<img border=0 src=caleq2.png>
   
    <form name="time">
<input name=timer type="hidden" value=""><br>
</center>
Where as, <br>
i = Current supplied = 0.5 A <br>
V = voltage =10 V <br>
Cp = specific heat of the water = 4.18x10<sup>3</sup> J/kg/K <br> 
Density of the water = 1000 kg/m<sup>3</sup> <br>
</center>
<center>
<input name="kal" type="hidden" value="<?php echo $k; ?>"><br>
<h3>Enter water equivalent of the calorimeter: <INPUT style="width:90px;height:30px;background-color:#D0F18F;color:#53760D;font:20px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="" NAME="cal"> J/K</h3>
<INPUT TYPE="button" onClick="checkK();" VALUE="Submit Answer">

</form>
</center>
  </div>
	


<div id="footer">
<p align="center">Virtual labs IIT Bombay</p>
</div>
</div>
</body>
</html>
