<?php
session_start(); 
?>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">


<SCRIPT language="JavaScript"
        type="text/javascript">
<!--

function checkAnswer()
{

a = document.anz.a.value;
b = document.anz.b.value;
a_res = document.anz.a_res.value;
b_res = document.anz.b_res.value;


if(     (a>(a_res-0.1) ) && (  a< ( a_res+0.1  ) )  &&   (b>(b_res*0.95-0.0005)) && (b<(b_res*1.05+0.0005) )   )

{

alert("Regression correct :) <br>Evalution successful!");

}
else

{
alert("Regression incorrect :( ");
}

}



//-->
</SCRIPT>










	
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
<h1>Post-experiment analysis</h1>

<p>Tabulate Reynolds, 'Re' number against friction factor 'f'. Sort the array in ascending order of the Re. Use of an excel sheet is recommended.
Classify the range of the array as laminar, transition and turbulent according to the Re.
For the laminar range fit f vs Re such that<p>
<center><h2>f = a+b/Re</h2></center>



<?php
include_once("config.inc.php");
$mess="eval";
 $agg_re = "";
$agg_fric="";
/*
// where is the socket server?
	$host="10.102.26.50";
	$port = 8001;
	// create socket
	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");

	// connect to server
	$socket1 = socket_connect($socket, $host, $port) or die("Could not connect to server\n");

	//send string to server
	socket_write($socket, $mess, strlen($mess)) or die("Could not send data to server\n");


	

*/

 $eid = $_GET["eid"];
	
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
$agg_re = $agg_re."#".$re;
$agg_fric = $agg_fric."#".$fric;
}


}

	$message = "4$".$agg_re."#".$agg_fric;



	// where is the socket server?
	$host="10.102.26.50";
	$port = $_SESSION['port'];
	// create socket
	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");

	// connect to server
	$socket1 = socket_connect($socket, $host, $port) or die("Could not connect to server\n");

	//send string to server
	socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
	
	$result = socket_read($socket, 256) or die("Could not read server response\n");

	echo "<h1>Result : $result</h1>";

	$res = explode(" ",$result);
	$a_res = $res[0];
	$b_res = $res[1];














?>

<FORM name="anz" >
 <h2>Calculate and enter the value of the Reynolds number  and Friction factor you have just computed::</h2>
<h3>a <INPUT style="width:90px;height:50px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="" NAME="a"> </h3>
<INPUT TYPE="hidden" VALUE="<?php echo $a_res; ?>" name=a_res>

<INPUT TYPE="hidden" VALUE="<?php echo $b_res; ?>" name=b_res> 



<h3>b <INPUT style="width:90px;height:50px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="" NAME="b"> </h3>
<input type="button" value="Check" onClick="checkAnswer();" >


</FORM>


	 <?php echo "<center><a href=../list.php?mode=home><img border=0 src=home.jpg></a>&nbsp;&nbsp;&nbsp;<a href=report2.php?mode=$eid><img border=0 src=download.jpg></a><br><br>&nbsp;&nbsp;&nbsp;<a href=nof2.php?mode=restart><img border=0 src=r.jpg></a></center>"; ?>




<p>



</p>
</div>


<div id="footer">
Cellulose lab IIT Bombay
</div>
</div>
</body>
</html>

