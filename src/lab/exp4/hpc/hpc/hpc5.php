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


if(Math.abs((efca*100-efc)/efca) <= 5)
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


if(Math.abs((efba*100-efb)/efba) <= 5)
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



function newt_raph($C0)
{
$conv_criterion=1;
$tolerance=pow(10,-8);
$i=1;

while(($i<1000)&&($conv_criterion>$tolerance))
  {
 # echo "The number is " . $i . "<br />";
   $Fx= flooding($C0);
   $JFx= jac($C0);
    $Cnew=$C0-$Fx/$JFx;
    $conv_criterion=($Cnew-$C0)/$C0;
    $C0=$Cnew;
  $i++;
  }
return $C0;
}

function flooding($G)
{
$ptype = $_SESSION['ptype'];
$ptype= explode(",", $ptype);
$Fpd = $ptype[0];
$Fp=$ptype[1];
$L = $_SESSION['LL'];

$P = $_SESSION['p'];

$rhol=62.4; #lb/ft3
$rhog=0.072696; #lb/ft3
$C3 = 7.4*pow(10,-8);
$C4 = 2.7*pow(10,-5);
$muL=1;#cP
$delPt=0.115*pow($Fp,0.7);
$ut=$G/($rhog*3600); #ft/s
$Fs = $ut*pow($rhog,0.5);                     
if($P<=1)        
{         
$Gf = 986*$Fs*pow(($Fpd/20),0.5);                
$Lf = $L*(62.4/$rhol)*pow(($Fpd/20),0.5) *pow($muL,0.1);
}
else
{

    $Gf = 986*$Fs*pow(($Fpd/20),0.5) *pow(10,0.3)*$rhog;
    if($Fpd>200)
	{
        $Lf = $L*(62.4/$rhol)*pow(($Fpd/20),0.5) *pow($muL,0.2);
	}
    else
	{
        $Lf = $L*(62.4/$rhol)*pow((20/$Fpd),0.5) *pow($muL,0.1);
	}
 }
$delPd = $C3*pow($Gf,2)*pow(10,($C4*$Lf));           
$delPl = 0.4*pow(($Lf/20000),0.1) *pow((($C3*pow($Gf,2))*pow(10,($C4*$Lf))),4);  
$FofG=$delPd + $delPl-$delPt; 

return $FofG;

}

function jac($C0)
{
    $eps=$C0/1000;
    if ($eps==0)
        $eps=1/1000;
    $Cp=$C0;
    $Cp=$Cp+$eps;
    $Fp=flooding($Cp);
    $Cn=$C0;
    $Cn=$Cn-$eps;
    $Fn=flooding($Cn);
    $J=($Fp-$Fn)/(2*$eps);
return $J;
}

$rhoG=1.165; #lb/ft3
$ptype = $_SESSION['ptype'];
$ptype= explode(",", $ptype);
$Fpd = $ptype[0];
$Fp=$ptype[1];
$G0=100; #lb/ft2/hr
$G_flooding=newt_raph($G0);
$G_flooding = $G_flooding/(737.3039*$rhoG);
$G_loading=0.6*$G_flooding;
//$G_loading=$G_loading/(737.3039*$rhoG);
#$conv_criterion=1;
#$tolerance=pow(10,-8);



?>

</center>






<FORM name="volu" action="gla9.php"  method="post">
 <h2>Calculation of flooding and loading point</h2>
<h3>Enter the gas flooding point : <INPUT style="width:90px;height:50px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="" NAME="efc"> <input type="hidden" value="<? echo $G_flooding; ?>" name="efca" /> m/sec <INPUT TYPE="button" VALUE="Check" NAME="re_check" onClick="check_re();"><img style="display:none;" id="re_r" src="rg.png"><img id="re_w" style="display:none;" src="wg.png"></h3>

<h3>Enter the gas loading point:	<INPUT style="width:90px;height:50px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="" NAME="efb"> <input type="hidden" value="<? echo $G_loading; ?>" name="efba" /> m/sec <INPUT TYPE="button" VALUE="Check" NAME="re_check" onClick="check_re2();"><img style="display:none;" id="re_r2" src="rg.png"><img id="re_w2" style="display:none;" src="wg.png"></h3>

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

