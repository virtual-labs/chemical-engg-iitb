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
width: 98%;
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
</head>
<body>


<div id="container">
<div id="top">
<a href=index.html><img border=0 src=img/vlabs.jpg style="margin-left:20%"></a><br>
</div>

<div id="content">
<?php


include_once("config.inc.php");

	$dia = $_GET["dia"];
	$length = $_GET["len"];
	

	// get server response




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
//  $result = mysqli_query("INSERT INTO experiment (
// `eid` ,
// `name` ,
// `plen`,
// `pdia` ,
// `date` 
// )
// VALUES ('','Krishna Mohan','$length','$dia','$date')") or die("mysqli Login Error: ".mysqli_error()); 


$result = mysqli_query($cid,"INSERT INTO experiment (
`eid` ,
`name` ,
`plen`,
`pdia` ,
`date` 
) VALUES ('1','Krishna Mohan','$length','$dia','$date')") or die("mysqli Login Error: ".mysqli_error());
//mysqli_close($cid);





 # Check for errors.
 if (!$result) {

  die("ERROR: " . mysqli_error() . "\n");

 } 
else

 {
mysqli_select_db ($cid,$db);
// $stuff = mysqli_query("SELECT * FROM `experiment` where plen='$length' AND date='$date'") or die("mysqli Login Error: ".mysqli_error()); 

$stuff = mysqli_query($cid,"SELECT * FROM `experiment` where plen='$length' AND date='$date'") or die("mysqli Login Error: ".mysqli_error());
//mysqli_close($this->conn);

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
 $result = mysqli_query($cid,"UPDATE experiment
SET eid='$eid' 
WHERE Srno='$srno'") or die("mysqli Login Error: ".mysqli_error()); 




 # Check for errors.
 if (!$result) {

  die("ERROR: " . mysqli_error() . "\n");

 } 
else

 {

$_SESSION['eid'] = $eid;
$_SESSION['plen'] = $length;
$_SESSION['pdia'] = $dia;

}
?>

<p align="justify">
<h1> Objective </h1>
Use the apparatus designed to visualize the nature of flow by opening the valve to various positions. Also, conduct your analysis to measure the friction factor of the pipe in laminar and turbulent regimes.
</p>

<p align="justify">
A couple of manometer placed at each end of the tube will facilitate the measuring of head loss.
To maintain a constant flow and a steady state, a reservoir having a certain head is used. Flow into the pipe from the reservoir is controlled with a valve.
A fine inlet of a capillary allows a dye to flow through the pipe. This allows us a visual aid to analyze the nature of flow regime.
</p>
<h3 align="center"> Your apparatus should now look like this. </h3>
<img src="img/lam.jpg" style="margin-left:25%">
<h3 align="center">We are now ready to use this setup for our analysis!</h3>
<p>
</p>
<br><br>

<a href= nof3.php?mode=><img border=0 src="img/next.jpg" style="margin-left:40%"></a>
</div>

<div id="footer">
<p align="center">Virtual labs IIT Bombay</p>
</div>
</div>
</body>
</html>

