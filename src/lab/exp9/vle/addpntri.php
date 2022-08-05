<?php
    session_start(); 
    include "connection/connect.php";
    $con_obj = new connection();
    include 'classes/experiment.php';
    $usr_obj = new users($con_obj);

    $val = $_GET["val"];
    $res = explode(" ",$val);
    $v1 = $res[0];
    $v2 = $res[1];
    $ri = $res[2];
    $eid = $_SESSION['eid'];
    $date = date('l jS \of F Y h:i:s A');

    $usr_obj->insertvaluecalib($eid,$v1,$v2,$ri);
?>
	

