<?php
session_start(); 
?>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">


<SCRIPT language="JavaScript"
        type="text/javascript">
<!--




function check_re()
{
 element = document.getElementById('re_w').style;
    element.display = 'none';
element = document.getElementById('re_r').style;
    element.display = 'none';

efca =document.volu.efca.value;
efc = document.volu.efc.value;
// ab = Math.abs((efca*100-efc)/efca);
ab = Math.abs(((efca-efc)*100)/efca);
if(ab <= 5)
{
alert("efficiency of column value is correct");


}
else
{

alert("Incorrect answer Try again");
}


}

function check_re2()
{


efba =document.volu.efba.value;
efb = document.volu.efb.value;
// Math.abs((efba*100-efb)/efba;
ac = Math.abs(((efba-efb)*100)/efba);
if(ac <= 5)
{
alert("efficiency of bubble pot value is correct");


}
else
{
alert("Incorrect answer Try again");
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
<center>
<?php
$yc = $_SESSION['y_c'];
$yb =$_SESSION['y_b'];




?>

</center>






<FORM name="volu" action="gla9.php"  method="post">
 <h2>Calculation of efficiency</h2>
<p>Using the values obtained by titration, input parameters, and reaction stoichiometry  calculate the efficiency of column and bubble pot.  Express the efficiency as the percentage of CO<sub>2</sub> absorbed to the total input.
</p> 
<h3>Enter the efficiency of column : <INPUT style="width:90px;height:50px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="" NAME="efc"> <input type="hidden" value="<?php echo $yc; ?>" name="efca" /> % <INPUT TYPE="button" VALUE="Check" NAME="re_check" onClick="check_re();"><img style="display:none;" id="re_r" src="rg.png"><img id="re_w" style="display:none;" src="wg.png"></h3>

<h3>Enter the efficiency of bubble pot:	<INPUT style="width:90px;height:50px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="" NAME="efb"> <input type="hidden" value="<?php echo $yb; ?>" name="efba" /> % <INPUT TYPE="button" VALUE="Check" NAME="re_check" onClick="check_re2();"><img style="display:none;" id="re_r2" src="rg.png"><img id="re_w2" style="display:none;" src="wg.png"></h3>




</FORM>



<center><a href="http://iitb.vlab.co.in"><img border=0 src=home.jpg></a>&nbsp;&nbsp;&nbsp;<a href=http://iitb.vlab.co.in/?sub=8&brch=116><img border=0 src=end.jpg></a><br><br><a href=gla2.php?mode=rerun><img border=0 src=re.jpg></a>&nbsp;&nbsp;&nbsp;<a href=gla1.php?mode=restart><img border=0 src=r.jpg></a></center>






<INPUT TYPE="hidden" VALUE="" NAME="result">
</FORM>

<p>



</p>
</div>


<div id="footer">
<p align="center">Virtual labs IIT Bombay</p>
</div>
</div>
</body>
</html>

