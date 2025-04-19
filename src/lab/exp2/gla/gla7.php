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


document.getElementById('y').style.display = 'inline';
document.getElementById('c').style.display = 'none';
document.getElementById('ti').style.display = 'inline';
document.getElementById('add').style.display = 'none';


}
function check2()
{


document.getElementById('o').style.display = 'inline';
document.getElementById('val').style.display = 'inline';
document.getElementById('y').style.display = 'none';
document.getElementById('ti').style.display = 'none';


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
<p>

</p>
</div>
<div id="content">
<h1>Titration of bubble pot sample</h1>
<p>Titrated sample is now further titrated with HCl in presence of Methyl Orange. The (second) end point is obtained by change of color of solution from yellow to Orange.
</p> 
<img id="o" style="display:none;" src="orange.png">
<img id="y" style="display:none;" src="yellow.png">
<img id="p" style="display:none;" src="pink.png">
<img id="c" src="clear.png">
<p>
<form name=nof>

<?php
$vHCl_2_b = $_SESSION['vHCl_2_b'];
?>

<br><br>
<div style="display:none;" id="val">
<h3>Volume of HCl used in second titration <INPUT style="width:90px;height:50px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="<?php echo $vHCl_2_b; ?>" NAME="vol"> ml</h3></div>
<input type="hidden" value="<?php echo $res; ?>" name="res" />
<input type="button" id="add" onClick="check();" VALUE="Add Methyl Orange">
<input type="button" style="display:none;" id="ti" onClick="check2();" VALUE="Perform titration">
</form>

</p>


<form action="gla8.php" name=nxt>



<br><br>
<input type="hidden" value="<?php echo $res; ?>" name="res" />
<input type="submit" VALUE="Proceed">

</form>
</div>

<div id="content2">

</div>
<div id="footer">
<p align="center">Virtual labs IIT Bombay</p>
</div>
</div>
</body>
</html>

