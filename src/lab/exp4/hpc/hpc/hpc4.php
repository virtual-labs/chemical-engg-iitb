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

pdropa =document.volu.pdropa.value;
pdrop = document.volu.pdrop.value;


if(Math.abs((pdropa*100-pdrop)/pdropa) <= 5)
{
alert("Pressure drop is correct");
window.location = "hpc5.php";

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


$ptype = $_SESSION['ptype'];
$ptype= explode(",", $ptype);
$Fpd = $ptype[0];

//$mul = 0.01; //Poise
$max_vl = 25/(3600*1000);  //m3/sec

//$mua = 0.0000186;


$rho = 13.534 *pow(10,3); //kg/m3
$rhoL = 1000; //kg/m3
$rhoG = 1.165; //kg/m3 
//$g=9.81; //m/s2

$liquid_flow_rate = $_SESSION['liquid_flow_rate'];
$air_flow_rate = $_SESSION['air_flow_rate'];



$P = $_SESSION['p'];

$H = $_SESSION['l'];




$C3 = 7.4 *pow(10,-8);
$mul=1; //cP
$C4 = 2.7 * pow(10,-5);
$rhog=$rhoG*0.0624;
$rhol= $rhoL*0.0624; //lb/ft3  
$air_flow_rate=$air_flow_rate*737.3039;
$L=$liquid_flow_rate*737.3039;
$_SESSION['LL']=$L;

$ut=($air_flow_rate)/($rhog*3600); //ft/sec
//$delPt=0.115*pow($ptype[1],0.7); 
$fs = $ut * pow(($rhog),0.5); //(ft/s) *(lb/ft3)^0.5 
            if ($P<=1)
		{
                 $Gf = 986*$fs*pow(($Fpd/20),0.5);
                 $Lf = $L*(62.4/$rhol)*pow(($Fpd/20),0.5) *pow($mul,0.1);
		}
            else
		{
                 $Gf = 986*$fs*pow(($Fpd/20),0.5)*pow(10,0.3)*$rhog;
		


            if ($Fpd>200)
                     $Lf = $L*(62.4/$rhol)*pow(($Fpd/20),0.5) *pow($mul,0.2);
            else
                     $Lf = $L*(62.4/$rhol)*pow((20/$Fpd),0.5) *pow($mul,0.1);
                }


	$delPd = $C3*pow($Gf,2)*pow(10,($C4*$Lf));
            $delPl = 0.4*pow(($Lf/20000),0.1) *pow(($C3*pow($Gf,2)*pow(10,($C4*$Lf))),4);
            $delP = $delPd + $delPl;
            $delPt=$delP*83.3;
        // $delPt=$delPt*83.3*9.81;  //N/m3
            $delPt=$delPt*$H*0.0254;
            $pdrop=$delPt*9.81*1000/1000;
            $del_h = $delPt/13.534;
$del_h = $del_h/10;
		//$dummy=float($del_h)*(1.0+0.1*(random.random()-0.5));
$dummy=$del_h*(1.0+0.1*(mt_rand(1,50))/100) ;

$h2 =  7 + 5 * (rand(1,100000)/100000);
$h1 = $h2 + $dummy;

//echo"velocity\n".$ut;
//echo"Fs\n".$fs;
//echo"gas loading factor\n".$Gf;
//echo"liquid loading factor\n".$Lf;
//echo "random :\n".mt_rand(1,50)/100;
//echo "deltah\n".$del_h;
//echo "liquid_mass\n".$L;
//echo "air_mass\n".$air_flow_rate;
//echo "deltaPd\n".$delPd;
//echo "deltaPl\n".$delPl;
//echo "deltaP\n".$delP;
//echo "deltaPt\n".$delPt;
//echo "dummy\n".$dummy;
echo "pdrop\n".$pdrop;




	//$h1 = 10 + $dummy/2;
	//$h2 = 10 - $dummy/2;
echo "<INPUT style=\"position:relative;bottom:200px;width:120px;height:50px;background-color:#D0F18F;color:#53760D;font:24px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;\" TYPE=text VALUE=\"$h1 \" NAME=h1>";
	echo "<img src=mano.jpg>";
	echo "<INPUT style=\"position:relative;bottom:120px;width:120px;height:50px;background-color:#D0F18F;color:#53760D;font:24px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;\" TYPE=text VALUE=\"$h2\" NAME=h2><br><br>";


?>

</center>






<FORM name="volu" action="hpc5.php"  method="post">
 <h2>Record the manometer reading and calculate</h2>
<h3>Calculate the pressure drop:	<INPUT style="width:90px;height:50px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="" NAME="pdropa"> N/m<sup>2</sup>  <input type="hidden" value="<?php echo $pdrop; ?>" name="pdrop" /><INPUT TYPE="button" VALUE="Check" NAME="re_check" onClick="check_re();"><img style="display:none;" id="re_r" src="rg.png"><img id="re_w" style="display:none;" src="wg.png"></h3>



<input type="image" src="next.jpg" alt="Submit button">


</FORM>










<INPUT TYPE="hidden" VALUE="" NAME="result">
</FORM>

<p>



</p>
</div>


<div id="footer">
Cellulose lab IIT Bombay
</div>
</div>
</body>
</html>

