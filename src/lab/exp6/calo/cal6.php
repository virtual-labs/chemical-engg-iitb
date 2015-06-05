<?php
session_start(); 
?>
<html>
<head>
<title></title>
<link rel="stylesheet" href="css/jquery.stopwatch.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/cal5.jquery.stopwatch.js"></script>
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
<?
include_once("config.inc.php");

$t1 = $_POST["t1"];
$t2 = $_POST["t2"];
$t3 = $_POST["t3"];
$v1 = $_POST["v1"];
$v2 = $_POST["v2"];
$hm = $_POST["hm"];
$mfr = $_POST["mfr"];
$eid = $_POST["eid"];
$kal = $_POST["kal"];
$time = $_POST["timer"];


 # Inherit database connection information from variables defined in config.inc.php
 global $db, $db_host, $db_user, $db_password;

 # Connect to the database and report any errors on connect.
 $cid = mysql_connect($db_host,$db_user,$db_password);

 if (!$cid) {
  die("ERROR: " . mysql_error() . "\n");
 } 
   date_default_timezone_set('Asia/Calcutta');
$date = date('l jS \of F Y h:i:s A');


 # Setup SQL statement and add the account into the system.
mysql_select_db ("$db");
 $result = mysql_query("INSERT INTO cal_data (
`eid` ,
`t1` ,
`t2`,
`t3` ,
`v1` ,
`v2` ,
`hm` ,
`mfr` ,
`time` ,
`date`
)
VALUES ('$eid','$t1','$t2','$t3','$v1','$v2','$hm','$mfr','$time','$date')") or die("MySQL Login Error: ".mysql_error()); 
	
?>

<div id="top">
<a href=index.html><img border=0 src=vlabs.jpg style="margin-left:20%"></a><br>
<center>
<h1></h1>

</center>
</div>

<center>

<?
$_SESSION['count'] = $_SESSION['count'] + 1;
$i_left = 4 - $_SESSION['count'];
if($_SESSION['count'] < 4)
{
echo "<h1>No of iterations left : $i_left<br><a href=cal4.php?k=$kal><img border=0 src=re.jpg></a><br>";
}
else
{
echo "<br><a href=http://vlabs.iitb.ac.in/che/cal/calqa.html><img border=0 src=home.jpg></a>&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;<a href=cal_report.php?mode=$eid><img border=0 src=download.jpg></a>&nbsp;&nbsp;&nbsp;<a href=http://iitb.vlab.co.in/?sub=8&brch=116><img border=0 src=end.jpg></a><br><br><br></center>";
}
?>
</form>
</center>

	<script type="text/javascript">
		$(function() {
			$('#clock1').stopwatch();
		});
	</script>
<div id="footer">
<p align="center">Virtual labs IIT Bombay</p>
</div>
</div>
</body>
</html>
