<?php
	session_start(); 
	ini_set('display_errors', 1);
	$ua12 = $_POST["a12"];
	$ua21 = $_POST["a21"];
	$ur2 = $_POST["r2"];
	$mod = $_POST["mod"];
	$eid = $_SESSION['eid'];
	
	include "connection/connect.php";
	$con_obj = new connection();
	include 'classes/experiment.php';
	$usr_obj = new users($con_obj);
	
	if($mod=="2")
	{
		$usr = $usr_obj->getxgle($eid);
		if (mysqli_num_rows($usr) > 0)
		{
			$row=mysqli_num_rows($usr);
			while($row = mysqli_fetch_assoc($usr))
			{
				$xd=$row['x'];
    			$ged=$row['ge'];
				$x[] = $xd;
				$ge[] = $ged;
			}
		}

		$usr1 = $usr_obj->getcntxcount($eid);
		if (mysqli_num_rows($usr1) > 0)
		{
			$row1=mysqli_num_rows($usr1);
			$mes_val ="";
			while($row1 = mysqli_fetch_assoc($usr1))
			{
				$cx=$row1['cntx'];
			}
		}


		$sumx = 0;
		$sumy = 0;
		$sumxy = 0;
		$sumxx = 0;
		$sumyy = 0;
		for($i=0;$i<=$cx - 1; $i++)
		{    
			$sumx = $sumx + $x[$i];
			$sumy = $sumy + 1/$ge[$i];
			$sumxy = $sumxy + $x[$i]*(1/$ge[$i]);
			$sumxx = $sumxx + pow($x[$i],2);
			$sumyy = $sumyy + pow((1/$ge[$i]),2);
		}
		//$cx = 1;
		
		$Sxy = $sumxy - $sumx*$sumy/$cx;
		$Sxx = $sumxx - (pow($sumx,2)/$cx);
		$Syy = $sumyy - (pow($sumy,2)/$cx);
		$SSr = $Syy - pow($Sxy,2)/$Sxx;
		$r2 = 1- $SSr/$Syy;
		$m = $Sxy/$Sxx;
		$c = ($sumy - $m*$sumx)/$cx;
		$a12 = $c;
		$a21 = $m + $c;
		if(abs($c-$ua12/$c)>0.05)
		{ $result="1"; }
		else
		{ $result="2"; }
	}

	elseif($mod == "1")
	{
		$usr2 = $usr_obj->getxgle($eid);
		if (mysqli_num_rows($usr2) > 0)
		{
			$row2=mysqli_num_rows($usr2);
			while($row2 = mysqli_fetch_assoc($usr2))
			{
				$xd=$row2['x'];
    			$ged=$row2['ge'];
				$x[] = $xd;
				$ge[] = $ged;
			}
		}

		$usr3 = $usr_obj->getcntxcount($eid);
		if (mysqli_num_rows($usr3) > 0)
		{
			$row3=mysqli_num_rows($usr3);
			$mes_val ="";
			while($row3 = mysqli_fetch_assoc($usr3))
			{
				$cx=$row3['count(x)'];
			}
		}

		$sumx = 0;
		$sumy = 0;
		$sumxy = 0;
		$sumxx = 0;
		$sumyy = 0;
		for($i=0;$i<=$cx - 1; $i++)
		{    
			$sumx = $sumx + $x[$i];
			$sumy = $sumy + $ge[$i];
			$sumxy = $sumxy + $x[$i]*$ge[$i];
			$sumxx = $sumxx + pow($x[$i],2);
		$sumyy = $sumyy + pow($ge[$i],2);
		}
		$Sxy = $sumxy - $sumx*$sumy/$cx;
		$Sxx = $sumxx - (pow($sumx,2)/$cx);
		$Syy = $sumyy - (pow($sumy,2)/$cx);
		$SSr = $Syy - pow($Sxy,2)/$Sxx;
		$r2 = 1- $SSr/$Syy;
		$m = $Sxy/$Sxx;
		$c = ($sumy - $m*$sumx)/$cx;
		$a12 = $c;
		$a21 = $m + $c;

		if(abs($c-$ua12/$c)>0.05)
		{ $result="1"; }
		
		else
		{ $result="2"; }
	}

	if($result==1)
	{
		echo "<center><h1>Error in Calculations ; do it again.</h1>";
		
		if($mod=="1")
		{
			echo "<br><a href=vle10.php?mod=1><img src=images/re.jpg></a></center>"; 
		}
		elseif($mod=="2")
		{
			echo "<br><a href=vle10.php?mod=2><img src=images/re.jpg></a></center>";
		}
	}
	
	elseif($result==2)
	{
		echo "<center><h1>Calculations are correct Do you think the other model will give better R2??</h1>";
		echo "<br><a href=vle9.php?mod=mod><img src=images/cmod.jpg></a><br><br><br><a href=index.php?mode=restart><img src=images/r.jpg><a href=http://iitb.vlab.co.in><img src=images/end.jpg></a></center>";
	}
?>
	

