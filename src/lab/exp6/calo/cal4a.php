<?php
session_start(); 
?>
<html>
<head>
<title></title>
<link rel="stylesheet" href="css/jquery.stopwatch.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/cal2.jquery.stopwatch.js"></script>
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
$t1 = $_POST["temp"];
$k = $_POST["kal"];
$vol = $_POST["vol"];
$cp1 = $_POST["cp1"];
$cp2 = $_POST["cp2"];

//echo $cp1." dd".$cp2;
//echo "Volume : ".$vol;


$message = "0$".$k." ".$vol;

		

	
    $VolB = $vol;
    $VolA = 100 - $VolB;

    $ldenB = 0.8765;
    $mwB = 78.114;
    $CpmB = $cp1*$mwB;


    $ldenA = 0.7925;
    $mwA = 58.080;
    $CpmA = $cp2*$mwA;

    $vB = $mwB/$ldenB;
    $vA = $mwA/$ldenA;

    $n1 = $VolB/$vB;
    $n2 = $VolA/$vA;

    $x1 = $n1/($n1+$n2);
    $x2 = 1-$x1;

    $Cpm_mix = $x1*$CpmB + $x2*$CpmA;
    $mw_mix = $x1*$mwB + $x2*$mwA;

    $Cp_mix = $Cpm_mix/$mw_mix;
    //$Cp_mix = $Cp_mix*(0.8 + mt_rand(0,1)*0.4);
	
   //echo "cp ".$Cp_mix;  


    $lambda_12 = -75.11;
    $lambda_21 = 1360.00;

    $R = 8.314;

    $m = $ldenB*$VolB + $ldenA*$VolA;

    $tol = 1;
    $iter = 0;
    $Tobs = 298;
    $Tamb = 298;





    while(($tol > 1e-8) && ($iter <= 50))
	{
        $Lambda_12 = ($vA/$vB)*exp(-$lambda_12/($R*$Tobs));
        $Lambda_21 = ($vB/$vA)*exp(-$lambda_21/($R*$Tobs));
        $deltaH_ex = $x1*$x2*($lambda_12*$Lambda_12/($x1 + $Lambda_12*$x2)+$lambda_21*$Lambda_21/($x2+$Lambda_21*$x1)) ;
        $Q = -$deltaH_ex*$m/$mw_mix;
        $Tobs1 = $Tamb + $Q/($m*$Cp_mix + $k);
        $tol = abs(($Tobs1 - $Tobs)/$Tobs);
        $Tobs = $Tobs1;
        $iter = $iter + 1;
	}


	





	$del_t = $Tobs;
	$cpmix = $Cp_mix;
	//echo $cpmix;
	$htmix = $deltaH_ex;
	$mf = $x1;
	$htmix = round($htmix, 2);
	$mf = round($mf, 3);
	$abs_t = round($del_t, 1);

	$vol2 = 100 - $vol;
?>





<div id="top">
<a href=index.html><img border=0 src=vlabs.jpg style="margin-left:20%"></a><br>
<center>
<h1>Heat of Mixing</h1>
<p>Now you can see that total volume of the system is 100 ml. Also note the temperature chanage of the system. </p><br>
<img src="cal.jpg">
</center>
</div>

<div id="content">

<center>
		
    
    <form name="time" method="post" action="cal5.php">
<input name=cpmix type="hidden" value="<?php echo $cpmix; ?>"><br>
<input name=timer type="hidden" value=""><br>
<input name="kal" type="hidden" value="<?php echo $k; ?>"><br>
<input name="t1" type="hidden" value="<?php echo $t1; ?>"><br>
<h3>Volume for benzene: <INPUT style="width:90px;height:30px;background-color:#D0F18F;color:#53760D;font:20px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="<?php echo $vol; ?>" NAME="vol" readonly=true> ml</h3>
<h3>Volume for acetone: <INPUT style="width:90px;height:30px;background-color:#D0F18F;color:#53760D;font:20px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="<?php echo $vol2; ?>" NAME="vol2" readonly=true> ml</h3>
<h3>Temperature of system : <INPUT style="width:90px;height:30px;background-color:#D0F18F;color:#53760D;font:20px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="<?php echo $abs_t; ?>" NAME="temp" readonly=true> K</h3>
<INPUT TYPE="hidden" VALUE="<?php echo $htmix; ?>" NAME="htmix" readonly=true>
 <INPUT TYPE="hidden" VALUE="<?php echo $mf; ?>" NAME="mf" readonly=true>
<input type="image" src="next.jpg" alt="Submit button">
</form>
</center>
  </div>
	


<div id="footer">
<p align="center">Virtual labs IIT Bombay</p>
</div>
</div>
</body>
</html>
