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


    var dia = document.nof.dia.value;

    var len = document.nof.len.value;



if(len <= (4*dia))
{
alert("Please select length greater than 4x diameter");


}
else
{
window.location = "2pf2.php?dia="+dia+"&len="+len;
}



}


//-->
</SCRIPT>


</head>
<body>


<div id="container">
<div id="top">
<a href=index.html><img border=0 src=vlabs.jpg></a><br>
</div>

<div id="rightnav">

</div>
<div id="content">

<p>

To start of the experiment select a suitable pipe length and diameter<br>
After clicking on submit following line should appear:<br>
Next step will be selecting the flow rates<br>
Our system will be water (density=1000 kg/m<sup>3</sup>, viscosity=0.001 Pa.s) and air (density=1.16 kg/m<sup>3</sup>, viscosity=0.0000186 Pa.s)
<p>
<form name=nof>


Enter pipe dia.: <select name="dia" style="width:150px;height:30px;background-color:#D0F18F;color:#53760D;font:20px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;">
<option value="">Select value</option>
<option value="0.405">0.405</option>
<option value="0.540">0.540</option>
<option value="0.675">0.675</option>
<option value="0.840">0.840</option>
<option value="1.050">1.050</option>
<option value="1.315">1.315</option>
<option value="1.660">1.660</option>
<option value="1.900">1.900</option>
<option value="2.375">2.375</option>
<option value="2.875">2.875</option>
<option value="3.500">3.500</option>
<option value="4.000">4.000</option>
</select>   inches
<br><br>
Enter pipe len.: <input style="width:80px;height:30px;background-color:#D0F18F;color:#53760D;font:20px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" type="text" name="len" />   inches<br /><br>
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

