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

<SCRIPT language="JavaScript"
        type="text/javascript">
<!--

function check()
{


    var ares = document.nof.ares.value;

    var res = document.nof.res.value;



if(Math.abs((ares-res)) <= 0.1)
{
alert("Your answer is correct");
window.location = "ori6.php";

}
else
{

alert("Invalid answer Try again");
}



}


//-->
</SCRIPT>


</head>
<body>


<div id="container">
<div id="top">
<b><p style= "font-family: cursive: Apple Chancery; font-size: 2.5em; color: #00ff00;">Flow Measurement by Venturimeter and Orificemeter</p>  </b>
</div>

<div id="rightnav">
<p>

</p>
</div>
<div id="content">
<?php
$dummy = $_SESSION['dummy'];

?>
<p>
<form name=nof>

Calculate the Venturi co-efficient: 
<INPUT style="width:90px;height:30px;background-color:#D0F18F;color:#53760D;font:20px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="" NAME="ares"> 
<br><br>
<input type="hidden" value="<?php echo $dummy; ?>" name="res" />
<input type="button" onClick="check();" VALUE="Submit">

</form>

</p>
</div>

<div id="content2">

</div>
<div id="footer">
<p align="center">Virtual labs IIT Bombay</p>
</div>
</div>
</body>
</html>

