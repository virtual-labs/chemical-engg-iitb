<?php
session_start(); 
?>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
	


<style type="text/css">


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



</style>










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
</head>
<body>


<div id="container">
<div id="top">
<a href=index.html><img border=0 src=vlabs.jpg></a><br>
</div>


<div id="content">
<?
include_once("config.inc.php");


$hft = $_SESSION['hft'];
//echo "hft ".$hft;
$cft = $_SESSION['cft'];
//echo "<br>cft ".$cft;
$percent = $_SESSION['percent'];
//echo "<br>percent ".$percent;
$thout = $_POST["hft"];
//echo "<br>thout ".$thout;
$tcout = $_POST["cft"];
//echo "<br>tcout ".$tcout;
$eid = $_SESSION['eid'];
//echo "<br>eid ".$eid;
//include_once("config.inc.php");


//$send = $v1.' '.$v2.' '.$hl.' '.'2';


//$message = $send;

/*

	// where is the socket server?
	$host="10.102.26.50";
	$port = 15001;
	// create socket
	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");

	// connect to server
	$socket1 = socket_connect($socket, $host, $port) or die("Could not connect to server\n");

	//send string to server
	socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");


*/


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
 /*$result = mysql_query("INSERT INTO vle_data (
`eid` ,
`v1` ,
`v2`,
`hl` ,
`rix`, 
`riy`,
`t`
)
VALUES ('$eid','$v1','$v2','$hl','$rix','$riy','$t')") or die("MySQL Login Error: ".mysql_error()); */


/*echo "

<form name=\"htl\" method=\"post\" action=\"vle4.php\">
<table>
<col>
<col id=\"middle\">
<col>
<col id=\"middle\">
<thead>

	<tr><th>Percent</th><th>HFT</th><th>CFT</th><th>THOUT</th><th>TCOUT</th></tr>
</thead>
<tbody>";


mysql_select_db ("$db");
$qry = "SELECT percent,hft,cft,thout,tcout FROM `htl_datanew` where eid='$eid'";
echo "<br>" .$qry;
$stuff = mysql_query($qry) or die("MySQL Login Error: ".mysql_error());
echo $stuff; 

if (mysql_num_rows($stuff) > 0) { 

$row=mysql_num_rows($stuff);
echo $row;
$mes_val ="";
$i='0';
while($row = mysql_fetch_array($stuff))
  {
$i++;
  $percent=$row['percent'];
    $hft=$row['hft'];
       $cft=$row['cft'];
       $thout=$row['thout'];
       $tcout=$row['tcout'];
}
}
?>
</tbody>
</table>*/

$SQLCommand="select eid, percent, hft, cft, thout, tcout from htl_datanew where eid='$eid'";
    $result=mysql_query($SQLCommand);
    echo "<table align='center'>
    <tr>
    
    <th>Percentage</th>

<th>HFT</th>
    <th>CFT</th>
    
    <th>THOUT</th>
    <th>TCOUT</th>
</tr>";
    while($row = mysql_fetch_array($result))
        {
  echo "<tr>";
  
  echo "<td style='text-align: center;'>" . $row['percent'] . "</td>";
  echo "<td style='text-align: center;'>" . $row['hft'] . "</td>";
  echo "<td style='text-align: center;'>" . $row['cft'] . "</td>";
  echo "<td style='text-align: center;'>" . $row['thout'] . "</td>";
  echo "<td style='text-align: center;'>" . $row['tcout'] . "</td>";
  echo"</tr>";
  }
echo "</table>";
?>
<br><br>
<center><a href=../list.php?mode=home><img border=0 src=home.jpg></a>&nbsp;&nbsp;&nbsp;<br><br><a href="down.php?mode=<? echo $eid ?>"> <img border=0 src=download.jpg></a>&nbsp;&nbsp;&nbsp;<a href=><img border=0 src=end.jpg></a></center>
<br><br>

</form>
<p>

</p>
</div>

<div id="content2">

<p>

</p>
</div>
<div id="footer">
<p align="center">Virtual labs IIT Bombay</p>
</div>
</div>
</body>
</html>

