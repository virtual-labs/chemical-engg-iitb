<?php
session_start(); 
?>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
	<script type="text/javascript"
  src="dygraph-combined.js"></script>
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
width: 900;
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
<?php
include_once("config.inc.php");

	$time = $_POST["time"];
	$eid = $_POST["eid"];
	$h1 = $_POST["h1"];
	$h2 = $_POST["h2"];
	$v1 = $_POST["v1"];
	$result = $_POST["result"];
	$rey = $_POST["rey"];
	$fric = $_POST["fric"];


 	
 # Inherit database connection information from variables defined in config.inc.php
 global $db, $db_host, $db_user, $db_password;

 # Connect to the database and report any errors on connect.
 $cid = mysql_connect($db_host,$db_user,$db_password);

 if (!$cid) {
  die("ERROR: " . mysql_error() . "\n");
 } 

 # Setup SQL statement and add the account into the system.
mysql_select_db ("$db");
 $result = mysql_query("INSERT INTO data (
`eid` ,
`h1` ,
`h2`,
`time` ,
`vol`,
`result`, 
`re`,
`fric`
)
VALUES ('$eid','$h1','$h2','$time','$v1','$result','$rey','$fric')") or die("MySQL Login Error: ".mysql_error()); 








$mes ="";
$eid =$_POST["eid"];
include_once("config.inc.php");
 	
 # Inherit database connection information from variables defined in config.inc.php
 global $db, $db_host, $db_user, $db_password;

 # Connect to the database and report any errors on connect.
 $cid = mysql_connect($db_host,$db_user,$db_password);

 if (!$cid) {
  die("ERROR: " . mysql_error() . "\n");
 } 
mysql_select_db ($db);
$stuff = mysql_query("SELECT * FROM `data` WHERE eid='".$eid."'") or die("MySQL Login Error: ".mysql_error()); 

 # Check for errors.
if (mysql_num_rows($stuff) > 0)
 { 
 $row=mysql_num_rows($stuff);


while($row = mysql_fetch_array($stuff))
  {
$re=$row['re'];
$fric=$row['fric']; 
$inv_re = 1/$re;
$mes = $mes." + \"".$inv_re.",".$fric."\\n\"";
//echo $mes;
}
}




?>
<h1>Reynolds No vs Friction</h1>

<div id="graphdiv2"
  style="width:800px; height:300px;"></div>
<script type="text/javascript">
  g2 = new Dygraph(
    document.getElementById("graphdiv2"),
        "Reynolds No,Friction\n" 
	<?php 
	echo $mes; ?>, // path to CSV file
    { fillGraph: true,
gridLineColor: '#00FF00',
highlightCircleSize: 10,
strokeWidth: 3,

 }
          // options
  );
</script>
<br><br><br>

<?php



	echo "<center><a href=../list.php?mode=home><img border=0 src=home.jpg></a>&nbsp;&nbsp;&nbsp;<a href=report2.php?mode=$eid><img border=0 src=download.jpg></a><a href=nof9.php?eid=$eid><img border=0 src=end.jpg></a><br><br><a href=nof4.php?mode=rerun><img border=0 src=re.jpg></a>&nbsp;&nbsp;&nbsp;<a href=nof2.php?mode=restart><img border=0 src=r.jpg></a></center>";












?>









<p>



</p>
</div>


<div id="footer">
Cellulose lab IIT Bombay
</div>
</div>
</body>
</html>

