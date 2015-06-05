<?php
session_start(); 
?>
<?


$ptype = $_SESSION['ptype'];
$ptype= explode(",", $ptype);
$Fpd = $ptype[0];
$Fp=$ptype[1];
$G0=100; #lb/ft2/hr
$G_flooding=newt_raph($G0);
$G_loading=0.6*$G_flooding;
#$conv_criterion=1;
#$tolerance=pow(10,-8);


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

$P = $_SESSION['p']

$rhoL=62.4; #lb/ft3
$rhoG=0.0727; #lb/ft3
$C3 = 7.4*pow(10,-8);
$C4 = 2.7*pow(10,-5);
$muL=1;#cP
$delPt=0.115*pow($Fp,0.7);
$ut=$G/($rhoG*3600); #ft/s
$Fs = $ut*pow($rhoG,0.5);                     
if($P<=1)        
{         
$Gf = 986*$Fs*pow(($Fpd/20),0.5);                
$Lf = $L*(62.4/$rhoL)*pow(($Fpd/20),0.5) *pow($muL,0.1);
}
else
{

    $Gf = 986*$Fs*pow(($Fpd/20),0.5) *pow(10,0.3)*$rhoG;
    if($Fpd>200)
	{
        $Lf = $L*(62.4/$rhoL)*pow(($Fpd/20),0.5) *pow($muL,0.2);
	}
    else
	{
        $Lf = $L*(62.4/$rhoL)*pow((20/$Fpd),0.5) *pow($muL,0.1);
	}
 
$delPd = $C3*pow(Gf,2)*pow(10,($C4*$Lf));           
$delPl = 0.4*pow(($Lf/20000),0.1) *pow(($C3*pow($Gf,2))*pow(10,(C4*Lf))),4);  
$FofG=$delPd + $delPl-$delPt; 

return $FofG;

}

function jac($C0)
{
    $eps=$C0/1000;
    if $eps==0
        $eps=1/1000;
    $Cp=$C0;
    $Cp=$Cp+$eps;
    $Fp=flooding($Cp);
    $Cn=$C0;
    $Cn=$Cn-$eps;
    $Fn=flooding($Cn);
    $J=($Fp-$Fn)/(2*$eps);
return $J;
)


?>
