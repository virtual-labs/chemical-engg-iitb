<?php


	$val = $_GET["val"];
   //$val = "80"." "."20"." "."4";

   $data = explode(" ",$val);
   $v1 = $data[0];
   $v2 = $data[1]; 
   $p = $data[2];  	
   $m1=58;
   $m2=78;
   $d1=0.79;
   $d2=0.8785;
   $x=($v1*$d1)/$m1/(($v1*$d1)/$m1+($v2*$d2)/$m2);
   $a1=11.75;
   $b1=-5.381  ;
   $c1=68.2;
   $d1=-0.1962  ;
   $a2=80.62 ;
   $b2=-0.3665  ;
   $c2=-0.5579  ;
   $d2=-16.51  ;
   $T1=$a1*exp($b1*$x) + $c1*exp($d1*$x);
   $T2=$a2*exp($b2*$x) + $c2*exp($d2*$x);
   $T3=$T1+($T2-$T1)*($p-2)/6;
   $T = $T3; 
   //echo $T3;
   	 
	
   $z=($v1*$d1)/$m1/(($v1*$d1)/$m1+($v2*$d2)/$m2);//Inlet Concentration

   $a1=-1.508;
   $b1=-0.0257;
   $c1=132.9;
   $d1=-0.0816;
   $a2=-0.0001132;
   $b2=0.09834;
   $c2=18.98;
   $d2=-0.05197;
   $x1=$a1*exp($b1*$T)+$c1*exp($d1*$T);
   $y1=$a2*exp($b2*$T)+$c2*exp($d2*$T);
   $x=$x1;  //(rand()0.5)*0.01;//+ 001  random error
   if($x>1)
   {
       $x=1;
   	}
   if($x<0)
       $x=0;
   
   $y=$y1; //(rand()0.5)*0.01;//+ 0.01  random error
   if($y>1)
	{
       $y=1;
        }
   if($y<0)
	{
       $y=0;
       }
   $RIx = -0.1359 * $x + 1.4943;
   $RIy = -0.1359 * $y + 1.4943 ;
   if($p<=1)
	{
       $RIy=1; //Not enough vapour phase..so giving air RI
       $RIx=-0.1359*$z+1.4943; //x=z input concentration\
	}
   elseif($p>=9)
	{
       $RIx=1; //Not enough liquid phase..so giving air RI
       $RIy=-0.1359*$z+1.4943;
   	}
	$T = round($T,1);
	$RIx = round($RIx,3);
	$RIy = round($RIy,3);

echo $T." ".$RIx." ".$RIy;

/**

	// where is the socket server?
	$host="10.102.26.50";
	$port = 15001;
	// create socket
	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");

	// connect to server
	$socket1 = socket_connect($socket, $host, $port) or die("Could not connect to server\n");

	//send string to server
	socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
	
	$result = socket_read($socket, 256) or die("Could not read server response\n");
	echo $result;

**/
?>
	

