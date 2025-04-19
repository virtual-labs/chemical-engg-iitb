<?php
session_start(); 
?>
<html>
<head>
<title></title>
<link rel="stylesheet" href="css/jquery.stopwatch.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.stopwatch.js"></script>
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
width: 300px;
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

<?php
$lperm = $_POST["lmpercent"];
$lper1 = $_POST["lpercent1"];
$lper2 = $_POST["lpercent2"];
$lper3 = $_POST["lpercent3"];
$gper = $_POST["gpercent"];
$gper2 = $_POST["gpercent2"];
$dia = $_POST["dia"];
$length = $_POST["length"];
$dia = $dia*0.0254;
$length = $length*0.0254;
$pi=3.1416;
$max_vl = 10;
$max_v1 = 1;
$max_v2 = 0.1;
$max_v3 = 0.01;
$rhol = 1000;
$rhom = 1487;
$mul = 0.001;
$rhoa = 1.16;
$mua = 0.0000186;
$g = 9.8;

$Ar = $pi*($dia*$dia)/4;
$knob1=$lperm/100.0;
$vl = $max_vl*$knob1+$max_v1*$lper1/100+$max_v2*$lper2/100+$max_v3*$lper3/100;
$liquid_flow_rate= $vl*$Ar*1000000;


$max_va = 20; 
$knob2=$gper/100.0;
$max_va1 = 1; 

		$va2 = $max_va*$knob2;
		$va1 = $max_va1*$gper2/100;
$va=$va2+$va1;
		$air_flow_rate= $va*$Ar*1000000*3.6;
		$air_flow_rate = round($air_flow_rate);
		$Gg=$va*$rhoa;
		$Gl=$vl*$rhol;
		$x=$Gl/$Gg;
		$A=-0.000004*$x*$x + 0.02*$x - 7.812;
		$B=  0.007*$x*$x - 0.280*$x + 3.678; 
		$C= -0.000003*$x*$x + 0.008*$x + 0.923;
		$D = 30.5714-0.37*$x;
		$E= 1.742*pow(2.718,(-0.08*$x));
		$F = 0.498*pow($x,-0.24);
		$Dp = pow(($Gg/94),-1/2.04);
		$Ap = pow(2.718,($Gg+69)/11.36);
		//echo $A." ".$B." ".$C." ".$D." ".$E." ".$F." ".$Ap." ".$Dp." ".$x;
		if ($Gg<=$E)
			$res="stra";
		if (($Gg>$E) & ($x<=$Dp))
			$res="wavy";
		if (($x>$Dp) & (($Gg>$B) || ($Gg>$C)) & ($x<$Ap))
			$res="annular";
		if (($x>$Dp) & ($Gg<=$B) & ($Gg<=$C) & ($Gg>$F) & ($x<=$Ap))
			$res="slug";
		if (($Gg<=$F) & ($Gg>$E) & ($x<$Ap))
			$res="plug";
		if ($x >= $Ap)
			$res="bubbly";
//echo "<h1>$res</h1>";


		$A= 1197000000.0;
		$B=-1.472;
		$C=877.9;

	
		$Rel = $rhol*$vl*$dia/$mul;
		$Rea = $rhoa*$va*$dia/$mua;
		
		if($Rel<=2100.0)
			$fl = 16/$Rel;
			
		if($Rea<=2100.0)
			$fa = 16/$Rea;
			
		if(($Rel>2100.0) & ($Rel<=4000.0))			
			$fl=($A*(pow($Rel,$B))+$C)/100000;
			
		if(($Rea>2100.0) & ($Rea<=4000.0))		
			$fa=($A*(pow($Rea,$B))+$C)/100000;		
		if($Rel>4000.0)
			$fl=0.0791*pow($Rel,-0.25);

		if($Rea>4000.0)
			$fa=0.0791*pow($Rea,-0.25);
			
		//print "liquid side f:$fl Liquid side Re:$Rel ";
		//print "air side f: $fa air side Re: $Rea ";
		$del_PLl = 2*$fl*$rhol*(pow($vl,2))/$dia;
		$del_PLlg = 2*$fa*$rhoa*pow($va,2)/$dia;
		$X=pow(($del_PLl/$del_PLlg),0.5);
		$Yl=1+20/$X+pow($X,-2);
		$Yg=$X*$X*$Yl;
		$del_PL=$Yl*$del_PLl;
		
		$del_P=$del_PL*$length;
		$del_h = $del_P*100/$g/($rhom-$rhol);
		//print "Height difference is $del_h cm";
		$dummy=$del_h;
		//$dummy=$del_h*(1.0+(mt_rand(-50,50))/100);
		//print "h (cm) $dummy ";


		$_SESSION['gg'] = $Gg;
		$_SESSION['gl'] = $Gl;		 
		$_SESSION['dummy'] = $dummy;
		$_SESSION['rel'] = $Rel;
		$_SESSION['rea'] = $Rea;
		$_SESSION['fl'] = $fl;
		$_SESSION['fa'] = $fa;
		$_SESSION['pdrop'] = $del_P;
		$_SESSION['pdropl'] = $del_PLl;
		$_SESSION['pdropa'] = $del_PLlg;
		$_SESSION['x'] = $X;
		$_SESSION['Yl'] = $Yl;
?>
  <div id="container">

<div id="top">
<a href=index.html><img border=0 src=vlabs.jpg></a><br>

Now it is required to evaluate v the average velocity. To do so we must measure the volumetric flow rate of the fluid.

Collect the fluid at the outlet into a measuring beaker and time the duration for collecting the fluid. This should enable you to evaluate v.

Fix a reasonable duration for collecting the fluid. Very short times may result in significant error and very long time makes the experiment unrealistic.
Note the volume collected and the duration of time for the same.
<h3> Air flow rate : <?php echo round($air_flow_rate); ?> lph (These values should be stored for further use)</h3>
</div>
<div id="rightnav">

<img id="b" style="display:none;" src="b.jpg">
<img id="be" src="be.jpg">
<FORM name="volu">


<input name=acc type="hidden" value="<?php echo $liquid_flow_rate; ?>">
<h3>Volume collected  <INPUT style="width:90px;height:30px;background-color:#D0F18F;color:#53760D;font:20px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="" NAME="vol"> ml</h3>
</FORM>
</div>
<div id="content">


		<div id="clock1"></div>
		<br /><br />
    
    <form name="time" method="post" action="2pf4.php">
<input name=timer type="hidden" value=""><br>
<input name=regime type="hidden" value="<?php echo $res; ?>"><br>
<input type="image" src="next.jpg" alt="Submit button">
</form>

  </div>
	<script type="text/javascript">
		$(function() {
			$('#clock1').stopwatch();
		});
	</script>


<div id="footer">
<p align="center">Virtual labs IIT Bombay</p>
</div>
</div>
</body>
</html>
