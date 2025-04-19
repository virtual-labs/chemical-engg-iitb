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


 element = document.getElementById('ar').style;
    element.display = 'none';
element = document.getElementById('br').style;
    element.display = 'none';

element = document.getElementById('cr').style;
    element.display = 'none';
element = document.getElementById('dr').style;
    element.display = 'none';
element = document.getElementById('er').style;
    element.display = 'none';
element = document.getElementById('aw').style;
    element.display = 'none';
element = document.getElementById('bw').style;
    element.display = 'none';
element = document.getElementById('cw').style;
    element.display = 'none';
element = document.getElementById('dw').style;
    element.display = 'none';
element = document.getElementById('ew').style;
    element.display = 'none';



  var s = "?";

  var result = document.quizform.result.value;



if(document.quizform.cc[0].checked == true)
{
s = document.quizform.cc[0].value;
}
if(document.quizform.cc[1].checked == true)
{
s = document.quizform.cc[1].value;
}
if(document.quizform.cc[2].checked == true)
{
s = document.quizform.cc[2].value;
}
if(document.quizform.cc[3].checked == true)
{
s = document.quizform.cc[3].value;
}
if(document.quizform.cc[4].checked == true)
{
s = document.quizform.cc[4].value;
}
 
// no choice was selected
  //
  if("?" == s)
  {
    alert("Please make a selection.");
    return false;
  }

  // check if we have the correct
  // choice selected
  //
  if(s == result)
  {
   
    img =s+"r";
	 element = document.getElementById(img).style;
    element.display = 'inline';
  }
  else
  {

    img =s+"w";	
	
    element = document.getElementById(img).style;
    element.display = 'inline';
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
<?php


include_once("config.inc.php");

	$dia = $_POST["dia"];
	$valve = $_POST["valve"];

	$length = $_POST["length"];
	$ftype = $_POST["ftype"];
	$fden = $_POST["fden"];
	$fvisc = $_POST["fvisc"];
	$message = "0$".$dia." ".$fden." ".$fvisc." ".$valve;
	
	
	if ($valve == 6)
	{	
	$kf = 0.35;
	}	
	elseif($valve == 7)
	{
	$kf = 0.5;
	}
	elseif($valve == 8)
	{
	$kf = 0.6;
	}
	elseif($valve == 9)
	{	
	$kf = 0.7;
	}
	elseif($valve == 10)
	{
	$kf = 1;
	}












	
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
 $result = mysqli_query($cid,"INSERT INTO fm_exp (
`eid` ,
`name` ,
`fluid`,
`date` 
)
VALUES ('','Shauvik De','$ftype','$date')") or die("mysqli Login Error: ".mysqli_error()); 





 # Check for errors.
 if (!$result) {

  die("ERROR: " . mysqli_error() . "\n");

 } 
else

 {
mysqli_select_db ($cid,$db);
$stuff = mysqli_query($cid,"SELECT * FROM `fm_exp` where date='$date'") or die("mysqli Login Error: ".mysqli_error()); 

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
 $result = mysqli_query($cid,"UPDATE fm_exp
SET eid='$eid' 
WHERE Srno='$srno'") or die("mysqli Login Error: ".mysqli_error()); 


 # Check for errors.
 if (!$result) {

  die("ERROR: " . mysqli_error() . "\n");

 } 
else

 {

$_SESSION['eid'] = $eid;
$_SESSION['kf'] = $kf;
$_SESSION['dia'] = $dia;
$_SESSION['length'] = $length;	
$_SESSION['fden'] = $fden;
$_SESSION['fvisc'] = $fvisc;

}













?>

<p>





<INPUT TYPE="hidden" VALUE="<?php echo $resu; ?>" NAME="result">
</FORM>
<a href= fm3.php?mode=><img border=0 src="next.jpg"></a>
</p>
</div>


<div id="footer">
Cellulose lab IIT Bombay
</div>
</div>
</body>
</html>

