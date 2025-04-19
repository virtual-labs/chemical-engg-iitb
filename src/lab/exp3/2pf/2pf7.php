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
width: 95%;
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
width: 50%;
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


    var rela = document.nof.rela.value;

    var fla = document.nof.fla.value;

  var reaa = document.nof.reaa.value;

    var faa = document.nof.faa.value;
  var delpla = document.nof.delpla.value;

    var delpaa = document.nof.delpaa.value;
  var xa = document.nof.xa.value;

    var yla = document.nof.yla.value;

    var relr = document.nof.relr.value;

    // var flr = document.nof.flr.value;

	var rear = document.nof.flr.value;

//   var rear = document.nof.rear.value;

var flr = document.nof.rear.value;

    var far = document.nof.far.value;
  var delplr = document.nof.delplr.value;

    var delpar = document.nof.delpar.value;
  var xr = document.nof.xr.value;

    var ylr = document.nof.ylr.value;

	
	// console.log("relr-rela: ",relr-rela);
	// console.log("rear: ",rear);
	// console.log("reaa: ",reaa);
	// console.log("rear-reaa: ",rear-reaa);
	// console.log("flr: ",flr);
	// console.log("fla: ",fla);
	// console.log("flr-fla: ",flr-fla);
	// console.log("far-faa: ",far-faa);
	// console.log("delpar-delpaa: ",delpar-delpaa);
	// console.log("delplr-delpla: ",delplr-delpla);
	// console.log("ylr-yla: ",ylr-yla);
	// console.log("xr-xa: ",xr-xa);


if((Math.abs((relr-rela)) <= 50) && (Math.abs((rear-reaa)) <= 50) && (Math.abs((flr-fla)) <= 0.1) && (Math.abs((far-faa)) <= 0.1) && (Math.abs((delpar-delpaa )) <= 1)&& (Math.abs((delplr-delpla)) <= 1) && (Math.abs((ylr-yla)) <= 10) && (Math.abs((xr-xa)) <= 1))
{
alert("All values are correct");


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
<img src="2p.jpg">
</div>
<div id="content">
<?php

		$rel = $_SESSION['rel'];
		//echo "Rel ".$rel;
		$rea = $_SESSION['rea'];
		//echo "<br>Rea ".$rea;
		$fl = $_SESSION['fl'];
		//echo "<br>Fl ".$fl;
		$fa = $_SESSION['fa'];
		//echo "<br>fa ".$fa;
		$pdropl = $_SESSION['pdropl'];
		//echo "<br>Pdropl ".$pdropl;
		$pdropa = $_SESSION['pdropa'];
		//echo "<br>Pdropa ".$pdropa;
		$x = $_SESSION['x'];
		//echo "<br>x ".$x;
		$yl = $_SESSION['Yl'];
		//echo "<br>yl ".$yl;
		$pdrop = $_SESSION['pdrop'];
		//echo "<br>pdrop ".$pdrop;

?>
<br><br>
There are many correlations to theoretically Calculate the pressure drop for the two phase flow. One such method is the Lockhart Martinelii method
First Calculate the gas side and liquid side reynolds numbers
<p>
<form name=nof>

<br><br>
Calculate liquid side reynolds no: <input style="width:80px;height:30px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" type="text" name="relr" />   <br /><br>
Calculate air side reynolds no : <input style="width:80px;height:30px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" type="text" name="rear" />   <br /><br>

From the Reynolds number identify the flow regime (lamiar/transition/turbulent) and use a suitable correlation to find the corresponding friction factors<br><br>

Calculate liquid side friction factor.: <input style="width:80px;height:30px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" type="text" name="flr" />  <br /><br>

Calculate air side friction factor: <input style="width:80px;height:30px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" type="text" name="far" />  <br /><br>

<h3>Using the friction factors Calculate the gas side and liquid side pressure drop.</h3>

Calculate pressure drop per unit length for purely liquid flow: <input style="width:80px;height:30px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" type="text" name="delplr" />   N/m<sup>2</sup> <br /><br>
Calculate pressure drop per unit length for purely air flow: <input style="width:80px;height:30px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" type="text" name="delpar" />  N/m<sup>2</sup> <br /><br>

<h3>Calculate X,Y and the two phase pressure drop using the scheme given alongside</h3>

Calculate X: <input style="width:80px;height:30px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" type="text" name="xr" />   <br /><br>
Calculate Yl: <input style="width:80px;height:30px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" type="text" name="ylr" />  <br /><br>

Calculate 2 phase pressure drop: <input style="width:80px;height:30px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" type="text" name="2pp" />  N/m<sup>2</sup>
<h3>Compare the theoretical pressure drop with the experimental value</h3>

<br /><br>


<input type="hidden" value="<?php echo $rel; ?>" name="rela" />
<input type="hidden" value="<?php echo $fl; ?>" name="fla" />
<input type="hidden" value="<?php echo $rea; ?>" name="reaa" />
<input type="hidden" value="<?php echo $fa; ?>" name="faa" />
<input type="hidden" value="<?php echo $pdropl; ?>" name="delpla" />
<input type="hidden" value="<?php echo $pdropa; ?>" name="delpaa" />
<input type="hidden" value="<?php echo $x; ?>" name="xa" />
<input type="hidden" value="<?php echo $yl; ?>" name="yla" />
<input type="hidden" value="<?php echo $pdrop; ?>" name="dp" />
<input type="button" onClick="check();" VALUE="Verify calculations">

</form>

</p>

<center><a href="http://iitb.vlab.co.in"><img border=0 src=home.jpg></a>&nbsp;&nbsp;&nbsp;<a href=http://iitb.vlab.co.in/?sub=8&brch=116><img border=0 src=end.jpg></a><br><br><a href=2pf2.php?mode=rerun><img border=0 src=re.jpg></a>&nbsp;&nbsp;&nbsp;<a href=2pf1.php?mode=restart><img border=0 src=r.jpg></a></center>
</div>

<div id="content2">

</div>
<div id="footer">
<p align="center">Virtual labs IIT Bombay</p>
</div>
</div>
</body>
</html>

