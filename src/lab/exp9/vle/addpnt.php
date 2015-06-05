<?php
session_start(); 
include_once("config.inc.php");

	$val = $_GET["val"];

$res = explode(" ",$val);

$v1 = $res[0];
$v2 = $res[1];
$hl = $res[2];
$rix = $res[3];
$riy = $res[4];
$t = $res[5];
$eid = $_SESSION['eid'];

 # Inherit database connection information from variables defined in config.inc.php
 global $db, $db_host, $db_user, $db_password;

 # Connect to the database and report any errors on connect.
 $cid = mysql_connect($db_host,$db_user,$db_password);

 if (!$cid) {
  die("ERROR: " . mysql_error() . "\n");
 } 
 
$date = date('l jS \of F Y h:i:s A');


 # Setup SQL statement and add the account into the system.
mysql_select_db ("$db");
 $result = mysql_query("INSERT INTO vle_data (
`eid` ,
`v1` ,
`v2`,
`hl` ,
`rix`, 
`riy`,
`t`
)
VALUES ('$eid','$v1','$v2','$hl','$rix','$riy','$t')") or die("MySQL Login Error: ".mysql_error()); 





 # Check for errors.
 if (!$result) {

  die("ERROR: " . mysql_error() . "\n");

 } 
else

 {

echo "done";
}


?>
	

