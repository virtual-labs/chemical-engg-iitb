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


    var cp = document.time.cp.value;
    var result = cp;
    var k = document.time.kal.value;
    var u_result = document.time.cal.value;

var res = ((u_result-result)*100)/result;

if(Math.abs(res)< 5)
{
alert("Value entered is within bounds.proceed for further calculations");
window.location = "cal3.php?k="+ k;
}
else
{
alert("Please check your calculations");
window.location = "cal2.php?k="+ k;

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
$k = $_POST["kal"];
$cp = $_POST["cp"];
$_SESSION['cp1']=$cp;
?>
<div id="top">
<a href=index.html><img border=0 src=vlabs.jpg style="margin-left:20%"></a><br>
<center>
<h1>Verification</h1>
</center>
</div>

<div id="content">
<h3>Use the formula to determine the Specific heat of the benzene.</h3>

<b>Data :</b><br>
Density of benzene = 876.5 kg/m<sup>3</sup><br>
Volume of benzene in flask = 100 ml<br>
Water equivalent of calorimeter = <?php echo $k ?> J/K<br><br>
<center>
			<img border=0 src=caleq2.png>	
    
    <form name="time">
<input name=timer type="hidden" value=""><br>
<input name="kal" type="hidden" value="<?php echo $k; ?>"><br>
<input name="cp" type="hidden" value="<?php echo $cp; ?>"><br>
<h3>Enter specific heat of benzene : <INPUT style="width:90px;height:30px;background-color:#D0F18F;color:#53760D;font:20px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="" NAME="cal"> x10<sup>3</sup> J/kg/K</h3>
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
