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


    var gga = document.nof.gga.value;

    var gla = document.nof.gla.value;

 var ggr = document.nof.ggr.value;

    var glr = document.nof.glr.value;


var ans = document.nof.ans.value;
var res = document.nof.res.value;
if(ans == res && (Math.abs((gla-glr)) <= 10) && (Math.abs((gga == ggr)) <= 1))
{
alert("All values are correct");
window.location = "2pf6.php";

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
<a href=index.html><img border=0 src=vlabs.jpg></a><br>
</div>

<div id="rightnav">

</div>
<div id="content">
<?
$gg = $_SESSION['gg'];
$gl = $_SESSION['gl'];
$res = $_SESSION['res'];
?>
<p>
<h3>In order to verify the flow pattern observed we refer to this graph. Calculate the values of the liquid and gas mass fluxes (G<sub>G</sub> and G<sub>L</sub>) using the values of the air flow rate and liquid flow rate calculated earlier and their corresponding densities. Plot the values on the following graph and check whether the flow regime is same as that of the flow regime observed.</h3>
<img src="flow3.png">
<form name=nof>

<br><br>
Enter G<sub>G</sub> value: <input style="width:80px;height:30px;background-color:#D0F18F;color:#53760D;font:20px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" type="text" name="len" />  kg/m<sup>2</sup>s <br /><br>
Enter G<sub>L</sub> value.: <input style="width:80px;height:30px;background-color:#D0F18F;color:#53760D;font:20px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" type="text" name="len" />  kg/m<sup>2</sup>s <br /><br>
<input type="hidden" value="<? echo $gg; ?>" name="gga" />
<input type="hidden" value="<? echo $gl; ?>" name="gla" />

Select the correct observed flow pattern from the above graph : <select name="ans" style="width:150px;height:40px;background-color:#D0F18F;color:#53760D;font:20px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;">
<option value="">Select value</option>
<option value="stra">stratified</option>
<option value="wavy">wavy</option>
<option value="annular">annular</option>
<option value="slug">slug</option>
<option value="plug">plug</option>
<option value="bubbly">bubbly</option>
</select>
<br><br>
<input type="hidden" value="<? echo $res; ?>" name="res" />
<input type="hidden" value="<? echo $gg; ?>" name="ggr" />
<input type="hidden" value="<? echo $gl; ?>" name="glr" />


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

